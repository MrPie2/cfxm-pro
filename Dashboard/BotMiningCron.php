<?php
/**
 * Scheduled seven-day simulated bot mining processor.
 *
 * Run from cron/CLI only, e.g.:
 *   php /path/to/cfxm-pro/Dashboard/BotMiningCron.php
 * Suggested schedule: every hour (daily earnings are posted once per elapsed
 * 24-hour period). Keep this file out of browser-triggered workflows.
 */
declare(strict_types=1);
if (PHP_SAPI !== 'cli') {
    http_response_code(403);
    exit("CLI only.\n");
}
require_once __DIR__ . '/../Connect.php';
require_once __DIR__ . '/BotSchema.php';
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
if (!isset($Conn) || !($Conn instanceof mysqli) || !cfxm_ensure_bot_tables($Conn)) {
    fwrite(STDERR, "Bot mining schema/database is unavailable.\n");
    exit(1);
}
date_default_timezone_set(date_default_timezone_get() ?: 'UTC');
$now = new DateTimeImmutable('now');
$processed = 0;
$completed = 0;
$failed = 0;

$idsResult = mysqli_query($Conn, "SELECT id FROM user_trading_bots WHERE mining_status='active' AND starts_at IS NOT NULL AND due_at IS NOT NULL ORDER BY id ASC");
$ids = [];
while ($row = mysqli_fetch_assoc($idsResult)) $ids[] = (int)$row['id'];

foreach ($ids as $botId) {
    try {
        mysqli_begin_transaction($Conn);
        $botStmt = mysqli_prepare($Conn, "SELECT id, investor_id, capital, daily_rate_percent, duration_days, starts_at, due_at, total_earned, mining_status FROM user_trading_bots WHERE id=? LIMIT 1 FOR UPDATE");
        mysqli_stmt_bind_param($botStmt, 'i', $botId);
        mysqli_stmt_execute($botStmt);
        $botResult = mysqli_stmt_get_result($botStmt);
        $bot = $botResult ? mysqli_fetch_assoc($botResult) : null;
        mysqli_stmt_close($botStmt);
        if (!$bot || $bot['mining_status'] !== 'active') {
            mysqli_commit($Conn);
            continue;
        }

        $start = new DateTimeImmutable($bot['starts_at']);
        $due = new DateTimeImmutable($bot['due_at']);
        $duration = max(1, min(365, (int)$bot['duration_days']));
        $elapsedSeconds = max(0, $now->getTimestamp() - $start->getTimestamp());
        $elapsedDays = min($duration, (int)floor($elapsedSeconds / 86400));
        $dailyAmount = round(((float)$bot['capital'] * (float)$bot['daily_rate_percent']) / 100, 2);
        $earnedTotal = (float)$bot['total_earned'];

        for ($day = 1; $day <= $elapsedDays; $day++) {
            $earningDate = $start->modify('+' . $day . ' days')->format('Y-m-d');
            $reference = 'BOT-MINE-' . $botId . '-' . str_replace('-', '', $earningDate);
            $existsStmt = mysqli_prepare($Conn, 'SELECT id FROM trading_bot_ledger WHERE reference=? LIMIT 1');
            mysqli_stmt_bind_param($existsStmt, 's', $reference);
            mysqli_stmt_execute($existsStmt);
            $existsResult = mysqli_stmt_get_result($existsStmt);
            $alreadyCredited = $existsResult && mysqli_num_rows($existsResult) > 0;
            mysqli_stmt_close($existsStmt);
            if ($alreadyCredited) continue;

            $balanceStmt = mysqli_prepare($Conn, 'SELECT Fin_Asset FROM investors WHERE Investor_id=? LIMIT 1 FOR UPDATE');
            mysqli_stmt_bind_param($balanceStmt, 's', $bot['investor_id']);
            mysqli_stmt_execute($balanceStmt);
            $balanceResult = mysqli_stmt_get_result($balanceStmt);
            $account = $balanceResult ? mysqli_fetch_assoc($balanceResult) : null;
            mysqli_stmt_close($balanceStmt);
            if (!$account) throw new RuntimeException('Investor wallet was not found for bot ' . $botId);

            $newBalance = round((float)$account['Fin_Asset'] + $dailyAmount, 2);
            $updateWallet = mysqli_prepare($Conn, 'UPDATE investors SET Fin_Asset=? WHERE Investor_id=?');
            mysqli_stmt_bind_param($updateWallet, 'ds', $newBalance, $bot['investor_id']);
            mysqli_stmt_execute($updateWallet);
            mysqli_stmt_close($updateWallet);

            $entryType = 'simulated_profit';
            $note = 'Simulated bot mining credit for ' . $earningDate . ' at ' . number_format((float)$bot['daily_rate_percent'], 4, '.', '') . '% daily.';
            $ledgerStmt = mysqli_prepare($Conn, 'INSERT INTO trading_bot_ledger (investor_id,bot_id,entry_type,amount,reference,note) VALUES (?,?,?, ?,?,?)');
            mysqli_stmt_bind_param($ledgerStmt, 'sisdss', $bot['investor_id'], $botId, $entryType, $dailyAmount, $reference, $note);
            mysqli_stmt_execute($ledgerStmt);
            mysqli_stmt_close($ledgerStmt);
            $earnedTotal = round($earnedTotal + $dailyAmount, 2);
            $processed++;
        }

        $lastDate = $elapsedDays > 0 ? $start->modify('+' . $elapsedDays . ' days')->format('Y-m-d') : null;
        if ($now >= $due || $elapsedDays >= $duration) {
            $statusStmt = mysqli_prepare($Conn, "UPDATE user_trading_bots SET total_earned=?, last_earning_date=?, mining_status='completed' WHERE id=?");
            $completed++;
        } else {
            $statusStmt = mysqli_prepare($Conn, 'UPDATE user_trading_bots SET total_earned=?, last_earning_date=? WHERE id=?');
        }
        mysqli_stmt_bind_param($statusStmt, 'dsi', $earnedTotal, $lastDate, $botId);
        mysqli_stmt_execute($statusStmt);
        mysqli_stmt_close($statusStmt);
        mysqli_commit($Conn);
    } catch (Throwable $e) {
        try { mysqli_rollback($Conn); } catch (Throwable $ignored) {}
        error_log('CFXM simulated bot mining failed for bot ' . $botId . ': ' . $e->getMessage());
        $failed++;
    }
}
echo json_encode(['success' => $failed === 0, 'bots_checked' => count($ids), 'daily_credits_posted' => $processed, 'bots_completed' => $completed, 'failed_bots' => $failed, 'run_at' => $now->format(DateTimeInterface::ATOM)], JSON_UNESCAPED_SLASHES) . PHP_EOL;
exit($failed === 0 ? 0 : 1);
