<?php
/**
 * Shared schema guard for the AI bot dashboard and plans page.
 * Creates the bot tables if this installation has not acquired a bot yet.
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
                status ENUM('pending_engine','active','paused','closed') NOT NULL DEFAULT 'pending_engine',
                created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
                updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                INDEX idx_user_bots_investor (investor_id),
                INDEX idx_user_bots_status (status)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4",
            "CREATE TABLE IF NOT EXISTS trading_bot_ledger (
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
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4"
        ];

        try {
            foreach ($statements as $sql) {
                if (!mysqli_query($conn, $sql)) {
                    error_log('CFXM bot schema setup failed: ' . mysqli_error($conn));
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
