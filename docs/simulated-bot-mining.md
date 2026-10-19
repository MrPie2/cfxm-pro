# Simulated bot mining

The bot purchase flow starts a seven-day simulated mining cycle immediately after a successful wallet deduction. Daily earnings are calculated as `capital × daily_rate_percent ÷ 100` and posted to the investor's `Fin_Asset` wallet.

## Default plan rates

| Plan | Capital | Daily rate | Daily simulated credit |
| --- | ---: | ---: | ---: |
| AI Scout | $2,000 | 0.0300% | $0.60 |
| Momentum AI | $5,000 | 0.0800% | $4.00 |
| Quant Matrix | $10,000 | 0.1500% | $15.00 |
| Neural Trader | $25,000 | 0.2500% | $62.50 |
| Apex Autonomous | $50,000 | 0.4000% | $200.00 |

Rates are application configuration in `Dashboard/BotController.php`; the rate saved to a purchased bot remains fixed for that bot's cycle.

## Schedule the processor

Run the processor from the command line only. On Linux, edit the crontab for the account that has PHP and database access:

```cron
0 * * * * /usr/bin/php /absolute/path/to/cfxm-pro/Dashboard/BotMiningCron.php >> /var/log/cfxm-bot-mining.log 2>&1
```

Replace the PHP binary and repository path with the actual server paths. The script refuses browser requests. It processes any elapsed full 24-hour periods, catches up missed runs, and stops credits after seven days. Hourly execution makes posting resilient if one run is missed.

## Idempotency and database

Every bot/day credit uses a unique ledger reference such as `BOT-MINE-123-20261020`. The bot row is locked during processing and the wallet update, ledger insert, and bot totals are committed in the same database transaction. The shared `BotSchema.php` helper creates or upgrades the required columns and ledger entry type automatically when the dashboard or purchase endpoint loads.

The simulated credit is recorded as `simulated_profit`, updates `user_trading_bots.total_earned`, and is visible in the dashboard. Do not run this job from a public URL.
