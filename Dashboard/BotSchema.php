<?php
/**
 * Shared schema guard for bot acquisition, simulated mining, and dashboard views.
 * Safe to call repeatedly: legacy installations are upgraded with missing columns.
 */
if (!function_exists('cfxm_ensure_bot_tables')) {
    function cfxm_ensure_bot_tables(mysqli $conn): bool
    {
        $statements = [
            "CREATE TABLE IF NOT EXISTS user_trading_bots (
                id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
                investor_id VARCHAR(100) NOT NULL,
                plan_code VARCHAR(40) NOT NULL,
                plan_name VARCHAR(100) NOT NULL,
                capital DECIMAL(18,2) NOT NULL,
                strategy VARCHAR(160) NOT NULL,
                market_capacity INT UNSIGNED NOT NULL DEFAULT 1,
                daily_rate_percent DECIMAL(8,4) NOT NULL DEFAULT 0.0300,
                duration_days INT UNSIGNED NOT NULL DEFAULT 7,
                starts_at DATETIME NULL,
                due_at DATETIME NULL,
                last_earning_date DATE NULL,
                total_earned DECIMAL(18,2) NOT NULL DEFAULT 0.00,
                status ENUM('pending_engine','active','paused','closed') NOT NULL DEFAULT 'pending_engine',
                mining_status ENUM('active','completed') NOT NULL DEFAULT 'active',
                created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
                updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                INDEX idx_user_bots_investor (investor_id),
                INDEX idx_user_bots_status (status),
                INDEX idx_user_bots_due (mining_status, due_at)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4",
            "CREATE TABLE IF NOT EXISTS trading_bot_ledger (
                id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
                investor_id VARCHAR(100) NOT NULL,
                bot_id BIGINT UNSIGNED NOT NULL,
                entry_type ENUM('acquisition','realized_profit','realized_loss','refund','adjustment','simulated_profit') NOT NULL,
                amount DECIMAL(18,2) NOT NULL,
                reference VARCHAR(160) NOT NULL,
                note VARCHAR(255) NOT NULL DEFAULT '',
                created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
                UNIQUE KEY uq_bot_ledger_reference (reference),
                INDEX idx_bot_ledger_investor (investor_id),
                INDEX idx_bot_ledger_bot (bot_id)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4"
        ];

        try {
            foreach ($statements as $sql) {
                if (!mysqli_query($conn, $sql)) {
                    error_log('CFXM bot schema setup failed: ' . mysqli_error($conn));
                    return false;
                }
            }

            $columns = [
                'daily_rate_percent' => "ALTER TABLE user_trading_bots ADD COLUMN daily_rate_percent DECIMAL(8,4) NOT NULL DEFAULT 0.0300 AFTER market_capacity",
                'duration_days' => "ALTER TABLE user_trading_bots ADD COLUMN duration_days INT UNSIGNED NOT NULL DEFAULT 7 AFTER daily_rate_percent",
                'starts_at' => "ALTER TABLE user_trading_bots ADD COLUMN starts_at DATETIME NULL AFTER duration_days",
                'due_at' => "ALTER TABLE user_trading_bots ADD COLUMN due_at DATETIME NULL AFTER starts_at",
                'last_earning_date' => "ALTER TABLE user_trading_bots ADD COLUMN last_earning_date DATE NULL AFTER due_at",
                'total_earned' => "ALTER TABLE user_trading_bots ADD COLUMN total_earned DECIMAL(18,2) NOT NULL DEFAULT 0.00 AFTER last_earning_date",
                'mining_status' => "ALTER TABLE user_trading_bots ADD COLUMN mining_status ENUM('active','completed') NOT NULL DEFAULT 'active' AFTER status"
            ];
            $existing = [];
            $columnResult = mysqli_query($conn, 'SHOW COLUMNS FROM user_trading_bots');
            if (!$columnResult) return false;
            while ($column = mysqli_fetch_assoc($columnResult)) $existing[$column['Field']] = true;
            foreach ($columns as $name => $sql) {
                if (!isset($existing[$name]) && !mysqli_query($conn, $sql)) {
                    error_log('CFXM bot schema migration failed for ' . $name . ': ' . mysqli_error($conn));
                    return false;
                }
            }

            $ledgerResult = mysqli_query($conn, "SHOW COLUMNS FROM trading_bot_ledger LIKE 'entry_type'");
            $ledgerColumn = $ledgerResult ? mysqli_fetch_assoc($ledgerResult) : null;
            if ($ledgerColumn && strpos((string)$ledgerColumn['Type'], 'simulated_profit') === false) {
                if (!mysqli_query($conn, "ALTER TABLE trading_bot_ledger MODIFY entry_type ENUM('acquisition','realized_profit','realized_loss','refund','adjustment','simulated_profit') NOT NULL")) {
                    error_log('CFXM bot ledger migration failed: ' . mysqli_error($conn));
                    return false;
                }
            }
            return true;
        } catch (Throwable $e) {
            error_log('CFXM bot schema setup failed: ' . $e->getMessage());
            return false;
        }
    }
}
