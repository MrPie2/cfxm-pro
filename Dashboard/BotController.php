<?php
session_start();
header('Content-Type: application/json; charset=utf-8');

function bot_json($status, $success, $message, $extra = []) {
    http_response_code($status);
    echo json_encode(array_merge(['success'=>$success,'message'=>$message], $extra));
    exit;
}
if ($_SERVER['REQUEST_METHOD'] !== 'POST') bot_json(405, false, 'POST requests only.');
if (!isset($_SESSION['User_id'])) bot_json(401, false, 'Please sign in again.');
if (!isset($_SESSION['bot_csrf']) || !isset($_POST['csrf']) || !hash_equals($_SESSION['bot_csrf'], (string)$_POST['csrf'])) bot_json(403, false, 'Security check failed. Refresh the page and try again.');
if (($_POST['action'] ?? '') !== 'acquire') bot_json(400, false, 'Unknown bot action.');

require_once __DIR__ . '/../Connect.php';
require_once __DIR__ . '/BotSchema.php';
if (!cfxm_ensure_bot_tables($Conn)) bot_json(500, false, 'Bot mining storage is unavailable. Please contact support.');
$investorId = (string)$_SESSION['User_id'];
$investorEscaped = mysqli_real_escape_string($Conn, $investorId);
$userQuery = mysqli_query($Conn, "SELECT Investor_id, V_Status, Fin_Asset, Total_Deposit FROM investors WHERE Investor_id='{$investorEscaped}' LIMIT 1");
if (!$userQuery || mysqli_num_rows($userQuery) !== 1) bot_json(404, false, 'Your account could not be found.');
$user = mysqli_fetch_assoc($userQuery);
if ((int)($user['V_Status'] ?? 0) < 1) bot_json(403, false, 'Complete account verification before acquiring a trading bot.');

$plans = [
 'scout'=>['name'=>'AI Scout','capital'=>2000.00,'strategy'=>'Spot trend & momentum','capacity'=>3,'rate'=>0.0300],
 'momentum'=>['name'=>'Momentum AI','capital'=>5000.00,'strategy'=>'Momentum & breakout','capacity'=>8,'rate'=>0.0800],
 'quant'=>['name'=>'Quant Matrix','capital'=>10000.00,'strategy'=>'Quantitative & mean reversion','capacity'=>15,'rate'=>0.1500],
 'neural'=>['name'=>'Neural Trader','capital'=>25000.00,'strategy'=>'Ensemble AI signals','capacity'=>25,'rate'=>0.2500],
 'apex'=>['name'=>'Apex Autonomous','capital'=>50000.00,'strategy'=>'Multi-market adaptive execution','capacity'=>40,'rate'=>0.4000],
];
$planCode = (string)($_POST['plan'] ?? '');
if (!isset($plans[$planCode])) bot_json(422, false, 'Select a valid bot plan.');
$plan = $plans[$planCode];

mysqli_begin_transaction($Conn);
try {
    $createBots = "CREATE TABLE IF NOT EXISTS user_trading_bots (
      id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
      investor_id VARCHAR(100) NOT NULL,
      plan_code VARCHAR(40) NOT NULL,
      plan_name VARCHAR(100) NOT NULL,
      capital DECIMAL(18,2) NOT NULL,
      strategy VARCHAR(160) NOT NULL,
      market_capacity INT UNSIGNED NOT NULL DEFAULT 1,
      status ENUM('pending_engine','active','paused','closed') NOT NULL DEFAULT 'pending_engine',
      created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
      updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
      INDEX idx_user_bots_investor (investor_id),
      INDEX idx_user_bots_status (status)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
    if (!mysqli_query($Conn, $createBots)) throw new Exception('Could not prepare bot records.');
    $createLedger = "CREATE TABLE IF NOT EXISTS trading_bot_ledger (
      id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
      investor_id VARCHAR(100) NOT NULL,
      bot_id BIGINT UNSIGNED NOT NULL,
      entry_type ENUM('acquisition','realized_profit','realized_loss','refund','adjustment') NOT NULL,
      amount DECIMAL(18,2) NOT NULL,
      reference VARCHAR(160) NOT NULL,
      note VARCHAR(255) NOT NULL DEFAULT '',
      created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
      UNIQUE KEY uq_bot_ledger_reference (reference),
      INDEX idx_bot_ledger_investor (investor_id),
      INDEX idx_bot_ledger_bot (bot_id)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
    if (!mysqli_query($Conn, $createLedger)) throw new Exception('Could not prepare bot ledger.');

    $lockQuery = mysqli_query($Conn, "SELECT Fin_Asset, Total_Deposit, V_Status FROM investors WHERE Investor_id='{$investorEscaped}' LIMIT 1 FOR UPDATE");
    if (!$lockQuery || mysqli_num_rows($lockQuery) !== 1) throw new Exception('Could not lock account balance.');
    $lockedUser = mysqli_fetch_assoc($lockQuery);
    if ((int)($lockedUser['V_Status'] ?? 0) < 1) throw new Exception('Account verification is required.');
    // Use one wallet only per purchase: prefer Fin_Asset when it can cover the full price,
    // otherwise use Total_Deposit if that wallet can cover it. Never combine balances.
    $finAsset = max(0, (float)($lockedUser['Fin_Asset'] ?? 0));
    $totalDeposit = max(0, (float)($lockedUser['Total_Deposit'] ?? 0));
    $walletColumn = null;
    $walletBalance = 0.0;
    if ($finAsset >= $plan['capital']) {
        $walletColumn = 'Fin_Asset';
        $walletBalance = $finAsset;
    } elseif ($totalDeposit >= $plan['capital']) {
        $walletColumn = 'Total_Deposit';
        $walletBalance = $totalDeposit;
    } else {
        throw new Exception('INSUFFICIENT_FUNDS');
    }

    $newBalance = round($walletBalance - $plan['capital'], 2);
    // Column name is selected only from this fixed allow-list above.
    $balanceUpdate = mysqli_prepare($Conn, "UPDATE investors SET {$walletColumn}=? WHERE Investor_id=?");
    if (!$balanceUpdate) throw new Exception('Could not update wallet balance.');
    mysqli_stmt_bind_param($balanceUpdate, 'ds', $newBalance, $investorId);
    if (!mysqli_stmt_execute($balanceUpdate) || mysqli_stmt_affected_rows($balanceUpdate) !== 1) { mysqli_stmt_close($balanceUpdate); throw new Exception('Wallet update failed.'); }
    mysqli_stmt_close($balanceUpdate);

    $startsAt = date('Y-m-d H:i:s');
    $dueAt = date('Y-m-d H:i:s', strtotime($startsAt . ' +7 days'));
    $durationDays = 7;
    $dailyRate = $plan['rate'];
    $botInsert = mysqli_prepare($Conn, "INSERT INTO user_trading_bots (investor_id,plan_code,plan_name,capital,strategy,market_capacity,daily_rate_percent,duration_days,starts_at,due_at,status,mining_status) VALUES (?,?,?,?,?,?,?,?,?,?,'active','active')");
    if (!$botInsert) throw new Exception('Could not create bot acquisition.');
    mysqli_stmt_bind_param($botInsert, 'sssdsidiss', $investorId, $planCode, $plan['name'], $plan['capital'], $plan['strategy'], $plan['capacity'], $dailyRate, $durationDays, $startsAt, $dueAt);
    if (!mysqli_stmt_execute($botInsert)) { mysqli_stmt_close($botInsert); throw new Exception('Bot acquisition failed.'); }
    $botId = mysqli_insert_id($Conn);
    mysqli_stmt_close($botInsert);

    $reference = 'BOT-ACQ-' . $botId . '-' . bin2hex(random_bytes(8));
    $ledgerInsert = mysqli_prepare($Conn, "INSERT INTO trading_bot_ledger (investor_id,bot_id,entry_type,amount,reference,note) VALUES (?,?,'acquisition',?,?,?)");
    if (!$ledgerInsert) throw new Exception('Could not create wallet ledger entry.');
    $negativeCapital = -$plan['capital'];
    $note = 'Bot purchase; seven-day simulated mining activated.';
    mysqli_stmt_bind_param($ledgerInsert, 'sidss', $investorId, $botId, $negativeCapital, $reference, $note);
    if (!mysqli_stmt_execute($ledgerInsert)) { mysqli_stmt_close($ledgerInsert); throw new Exception('Wallet ledger entry failed.'); }
    mysqli_stmt_close($ledgerInsert);

    mysqli_commit($Conn);
    unset($_SESSION['bot_csrf']);
    $walletLabel = ($walletColumn === 'Fin_Asset') ? 'Wallet Balance' : 'Deposit Balance';
    bot_json(200, true, $plan['name'] . ' was purchased and simulated mining is active for 7 days at ' . number_format($dailyRate, 4) . '% per day. $' . number_format($plan['capital'], 2) . ' was deducted from your ' . $walletLabel . '.', ['bot_id'=>$botId,'status'=>'active','capital'=>$plan['capital'],'daily_rate_percent'=>$dailyRate,'duration_days'=>7,'starts_at'=>$startsAt,'due_at'=>$dueAt,'wallet_source'=>$walletColumn,'wallet_balance'=>$newBalance]);
} catch (Throwable $e) {
    mysqli_rollback($Conn);
    if ($e->getMessage() === 'INSUFFICIENT_FUNDS') {
        bot_json(422, false, 'Insufficient funds. You need at least $' . number_format($plan['capital'], 2) . ' in either your Wallet Balance or Deposit Balance to buy this bot.');
    }
    error_log('CFXM bot acquisition failed: ' . $e->getMessage());
    bot_json(500, false, 'The bot could not be acquired. No balance change was saved.');
}
