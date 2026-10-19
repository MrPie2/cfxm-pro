-- CFXM Pro bot-engine callback idempotency and settlement event log.
-- Apply once to the CFXM Pro database before deploying Dashboard/BotEngineWebhook.php.
-- The existing acquisition flow creates user_trading_bots and trading_bot_ledger.

CREATE TABLE IF NOT EXISTS trading_bot_engine_events (
  id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  event_id VARCHAR(160) NOT NULL,
  event_type ENUM('bot.activated','bot.paused','trade.closed') NOT NULL,
  bot_id BIGINT UNSIGNED NOT NULL,
  trade_id VARCHAR(160) NULL,
  payload_sha256 CHAR(64) NOT NULL,
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  UNIQUE KEY uq_bot_engine_event_id (event_id),
  UNIQUE KEY uq_bot_engine_trade_id (trade_id),
  KEY idx_bot_engine_events_bot (bot_id),
  KEY idx_bot_engine_events_created (created_at)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
