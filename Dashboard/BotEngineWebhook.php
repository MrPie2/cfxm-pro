<?php
/**
 * Signed callback endpoint for a trusted CFXM Pro trading-engine service.
 *
 * Configure CFXM_BOT_ENGINE_SECRET in the server environment, or place a PHP
 * config array at dirname(__DIR__, 2) . '/private/cfxm_bot_engine.php':
 *     <?php return ['secret' => 'a-long-random-secret'];
 *
 * Never place the signing secret in this repository or in the public web root.
 */
declare(strict_types=1);

header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: no-store');

function engine_reply(int $status, bool $success, string $message, array $extra = []): void
{
    http_response_code($status);
    echo json_encode(array_merge(['success' => $success, 'message' => $message], $extra), JSON_UNESCAPED_SLASHES);
    exit;
}

if (($_SERVER['REQUEST_METHOD'] ?? '') !== 'POST') {
    header('Allow: POST');
    engine_reply(405, false, 'POST requests only.');
}

$rawBody = file_get_contents('php://input');
if (!is_string($rawBody) || $rawBody === '' || strlen($rawBody) > 65536) {
    engine_reply(400, false, 'Request body is missing or too large.');
}

$secret = getenv('CFXM_BOT_ENGINE_SECRET') ?: '';
$configPath = dirname(__DIR__, 2) . '/private/cfxm_bot_engine.php';
if ($secret === '' && is_file($configPath)) {
    $engineConfig = require $configPath;
    if (is_array($engineConfig)) {
        $secret = (string)($engineConfig['secret'] ?? '');
    }
}
if (strlen($secret) < 32) {
    error_log('CFXM bot engine callback disabled: signing secret is not configured securely.');
    engine_reply(503, false, 'Engine callback is not configured.');
}

$timestamp = (string)($_SERVER['HTTP_X_CFXM_TIMESTAMP'] ?? '');
$signature = (string)($_SERVER['HTTP_X_CFXM_SIGNATURE'] ?? '');
if (!ctype_digit($timestamp) || abs(time() - (int)$timestamp) > 300) {
    engine_reply(401, false, 'Signature timestamp is invalid or expired.');
}
$expectedSignature = hash_hmac('sha256', $timestamp . '.' . $rawBody, $secret);
if (!preg_match('/^[a-f0-9]{64}$/i', $signature) || !hash_equals($expectedSignature, strtolower($signature))) {
    engine_reply(401, false, 'Signature verification failed.');
}

$payload = json_decode($rawBody, true);
if (!is_array($payload) || json_last_error() !== JSON_ERROR_NONE) {
    engine_reply(400, false, 'Malformed JSON payload.');
}

$eventId = trim((string)($payload['event_id'] ?? ''));
$eventType = trim((string)($payload['event'] ?? ''));
$botId = filter_var($payload['bot_id'] ?? null, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]);
if ($eventId === '' || strlen($eventId) > 160 || !preg_match('/^[A-Za-z0-9._:-]+$/', $eventId)) {
    engine_reply(422, false, 'A valid event_id is required.');
}
if (!in_array($eventType, ['bot.activated', 'bot.paused', 'trade.closed'], true) || !$botId) {
    engine_reply(422, false, 'Unsupported event or invalid bot_id.');
}

$tradeId = null;
$pnl = null;
if ($eventType === 'trade.closed') {
    $tradeId = trim((string)($payload['trade_id'] ?? ''));
    $currency = strtoupper(trim((string)($payload['currency'] ?? '')));
    if ($tradeId === '' || strlen($tradeId) > 160 || !preg_match('/^[A-Za-z0-9._:-]+$/', $tradeId)) {
        engine_reply(422, false, 'A valid trade_id is required.');
    }
    if ($currency !== 'USD') {
        engine_reply(422, false, 'Only USD-denominated realized P&L is accepted by this endpoint.');
    }
    if (!isset($payload['realized_pnl']) || !is_numeric($payload['realized_pnl'])) {
        engine_reply(422, false, 'realized_pnl must be a numeric, realized amount.');
    }
    $pnl = (float)$payload['realized_pnl'];
    if (!is_finite($pnl) || abs($pnl) > 1000000000000) {
        engine_reply(422, false, 'realized_pnl is outside the accepted range.');
    }
    $pnl = round($pnl, 2);
}

require_once __DIR__ . '/../Connect.php';
if (!isset($Conn) || !($Conn instanceof mysqli)) {
    error_log('CFXM bot engine callback could not initialize database connection.');
    engine_reply(503, false, 'Database service is unavailable.');
}
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    mysqli_begin_transaction($Conn);

    $eventCheck = mysqli_prepare($Conn, 'SELECT id FROM trading_bot_engine_events WHERE event_id = ? LIMIT 1');
    mysqli_stmt_bind_param($eventCheck, 's', $eventId);
    mysqli_stmt_execute($eventCheck);
    $existingEvent = mysqli_stmt_get_result($eventCheck);
    $eventAlreadyProcessed = $existingEvent && mysqli_num_rows($existingEvent) > 0;
    mysqli_stmt_close($eventCheck);
    if ($eventAlreadyProcessed) {
        mysqli_commit($Conn);
        engine_reply(200, true, 'Event already processed.', ['duplicate' => true]);
    }

    $botQuery = mysqli_prepare($Conn, 'SELECT id, investor_id, status FROM user_trading_bots WHERE id = ? LIMIT 1 FOR UPDATE');
    mysqli_stmt_bind_param($botQuery, 'i', $botId);
    mysqli_stmt_execute($botQuery);
    $botResult = mysqli_stmt_get_result($botQuery);
    $bot = $botResult ? mysqli_fetch_assoc($botResult) : null;
    mysqli_stmt_close($botQuery);
    if (!$bot) {
        mysqli_rollback($Conn);
        engine_reply(404, false, 'Bot was not found.');
    }

    if ($eventType === 'bot.activated' && $bot['status'] !== 'pending_engine') {
        mysqli_rollback($Conn);
        engine_reply(409, false, 'Only a bot awaiting engine connection can be activated.');
    }
    if ($eventType === 'bot.paused' && $bot['status'] !== 'active') {
        mysqli_rollback($Conn);
        engine_reply(409, false, 'Only an active bot can be paused.');
    }
    if ($eventType === 'trade.closed' && $bot['status'] !== 'active') {
        mysqli_rollback($Conn);
        engine_reply(409, false, 'Realized trades can only be settled for an active bot.');
    }

    $payloadHash = hash('sha256', $rawBody);
    $eventInsert = mysqli_prepare($Conn, 'INSERT INTO trading_bot_engine_events (event_id, event_type, bot_id, trade_id, payload_sha256) VALUES (?, ?, ?, ?, ?)');
    mysqli_stmt_bind_param($eventInsert, 'ssiss', $eventId, $eventType, $botId, $tradeId, $payloadHash);
    mysqli_stmt_execute($eventInsert);
    mysqli_stmt_close($eventInsert);

    if ($eventType === 'bot.activated' || $eventType === 'bot.paused') {
        $newStatus = $eventType === 'bot.activated' ? 'active' : 'paused';
        $statusUpdate = mysqli_prepare($Conn, 'UPDATE user_trading_bots SET status = ? WHERE id = ?');
        mysqli_stmt_bind_param($statusUpdate, 'si', $newStatus, $botId);
        mysqli_stmt_execute($statusUpdate);
        mysqli_stmt_close($statusUpdate);
        mysqli_commit($Conn);
        engine_reply(200, true, 'Bot status updated.', ['bot_id' => $botId, 'status' => $newStatus]);
    }

    // Event insertion and wallet posting share a transaction. The unique trade_id
    // constraint makes replays safe even if the sender changes event_id on retry.
    $balanceQuery = mysqli_prepare($Conn, 'SELECT Fin_Asset FROM investors WHERE Investor_id = ? LIMIT 1 FOR UPDATE');
    mysqli_stmt_bind_param($balanceQuery, 's', $bot['investor_id']);
    mysqli_stmt_execute($balanceQuery);
    $balanceResult = mysqli_stmt_get_result($balanceQuery);
    $account = $balanceResult ? mysqli_fetch_assoc($balanceResult) : null;
    mysqli_stmt_close($balanceQuery);
    if (!$account) {
        throw new RuntimeException('Investor wallet could not be found.');
    }

    $currentBalance = (float)$account['Fin_Asset'];
    $newBalance = round($currentBalance + $pnl, 2);
    if ($newBalance < 0) {
        throw new RuntimeException('Settlement would make the available wallet balance negative.');
    }

    $balanceUpdate = mysqli_prepare($Conn, 'UPDATE investors SET Fin_Asset = ? WHERE Investor_id = ?');
    mysqli_stmt_bind_param($balanceUpdate, 'ds', $newBalance, $bot['investor_id']);
    mysqli_stmt_execute($balanceUpdate);
    mysqli_stmt_close($balanceUpdate);

    $entryType = $pnl > 0 ? 'realized_profit' : ($pnl < 0 ? 'realized_loss' : 'adjustment');
    $ledgerReference = 'BOT-TRADE-' . $tradeId;
    $note = 'Signed engine callback; realized P&L settlement in USD.';
    $ledgerInsert = mysqli_prepare($Conn, 'INSERT INTO trading_bot_ledger (investor_id, bot_id, entry_type, amount, reference, note) VALUES (?, ?, ?, ?, ?, ?)');
    mysqli_stmt_bind_param($ledgerInsert, 'sisdss', $bot['investor_id'], $botId, $entryType, $pnl, $ledgerReference, $note);
    mysqli_stmt_execute($ledgerInsert);
    mysqli_stmt_close($ledgerInsert);

    mysqli_commit($Conn);
    engine_reply(200, true, 'Realized trade result settled.', [
        'bot_id' => $botId,
        'trade_id' => $tradeId,
        'realized_pnl' => number_format($pnl, 2, '.', ''),
        'wallet_balance' => number_format($newBalance, 2, '.', '')
    ]);
} catch (mysqli_sql_exception $e) {
    if (isset($Conn) && $Conn instanceof mysqli) {
        try { mysqli_rollback($Conn); } catch (Throwable $ignored) {}
    }
    // Duplicate trade IDs are idempotent. Do not disclose SQL or database details.
    if ((int)$e->getCode() === 1062) {
        engine_reply(200, true, 'Duplicate event or trade already processed.', ['duplicate' => true]);
    }
    error_log('CFXM bot engine callback database failure: ' . $e->getMessage());
    engine_reply(500, false, 'Settlement could not be processed.');
} catch (Throwable $e) {
    if (isset($Conn) && $Conn instanceof mysqli) {
        try { mysqli_rollback($Conn); } catch (Throwable $ignored) {}
    }
    error_log('CFXM bot engine callback failure: ' . $e->getMessage());
    engine_reply(422, false, 'Settlement was rejected. No wallet change was saved.');
}
