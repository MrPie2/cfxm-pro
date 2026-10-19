# CFXM Pro bot engine callback

This endpoint is a **settlement adapter**, not a trading strategy or exchange connector. It does not generate trades, invent prices, or accrue daily returns. It accepts signed callbacks from a separately deployed, trusted engine.

## Deployment checklist

1. Apply `database/migrations/2026_10_19_bot_engine_events.sql` to the same MySQL database used by CFXM Pro.
2. Configure a random secret of at least 32 characters on the PHP server as `CFXM_BOT_ENGINE_SECRET`. Alternatively, put a PHP file returning `['secret' => '...']` at `dirname(__DIR__, 2) . '/private/cfxm_bot_engine.php'` (for a typical `public_html/Dashboard` deployment, that resolves outside `public_html`). Never commit the secret or place it under the public web root.
3. Restrict network access to the endpoint to the engine service where possible; use HTTPS only. Rotate the secret if exposed.
4. The engine must send the exact JSON request body and headers described below. The signature is lowercase hex HMAC-SHA256 over `<unix_timestamp>.<raw_request_body>`. Timestamps more than 5 minutes from server time are rejected.

Headers:
- `Content-Type: application/json`
- `X-CFXM-Timestamp: 1792400000` (current Unix timestamp)
- `X-CFXM-Signature: <hex hmac>`

Supported JSON event examples:

```json
{"event_id":"evt-bot-42-activate-1","event":"bot.activated","bot_id":42}
```

```json
{"event_id":"evt-bot-42-pause-1","event":"bot.paused","bot_id":42}
```

```json
{"event_id":"evt-exchange-closed-unique-123","event":"trade.closed","bot_id":42,"trade_id":"exchange-closed-unique-123","currency":"USD","realized_pnl":"12.34"}
```

For `trade.closed`, the engine must send **realized net P&L only**, after fees and reconciliation. Positive P&L credits the wallet; negative P&L debits it. It must not send trade notional, unrealized P&L, deposits, the plan capital, or estimated daily profit. USD is the only accepted settlement currency until explicit wallet-currency conversion is designed. Trade IDs and event IDs must be stable across retries.

## Safety and operational notes

- Events are HMAC authenticated, timestamp checked, size limited, and idempotent by event ID and exchange trade ID.
- Bot status changes and wallet/ledger writes run in MySQL transactions. Only `pending_engine` bots can activate; only active bots can pause or settle trades.
- Losses cannot reduce the available wallet below zero; those events are rejected for reconciliation rather than silently creating a negative balance.
- This endpoint does **not** connect to an exchange or make any bot profitable. Do not activate a bot until its engine has been configured with real credentials, market-data validation, order controls, stop/risk limits, reconciliation, monitoring, and an operational kill switch.
- Test in a staging database with a test bot first. Verify duplicate event/trade callbacks change the wallet exactly once and that invalid signatures/timestamps leave balances unchanged.
