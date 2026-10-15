<?php
session_start();
if (!isset($_SESSION['User_id'])) {
    header('Location: LoginContainer.php');
    exit;
}
include('Header.php');
require_once('AccountInsightController.php');
$insightName = trim((string)($userDetails['First_Name'] ?? ''));
if ($insightName === '') $insightName = (string)($userDetails['Username'] ?? 'Investor');
?>
<style>
.account-insight{--ai-ink:var(--text-color,#182b3a);--ai-muted:var(--vh-muted,#7b8a97);--ai-line:rgba(128,148,164,.2);--ai-surface:var(--card-bg,#fff);max-width:1500px;margin:0 auto;padding:26px 22px 34px;color:var(--ai-ink)}
.account-insight,.account-insight *{box-sizing:border-box}.ai-eyebrow{display:inline-flex;align-items:center;gap:8px;color:#8b68dc;font-size:10px;font-weight:850;letter-spacing:.16em;text-transform:uppercase}.ai-eyebrow:before{content:"";width:18px;height:2px;border-radius:2px;background:currentColor}
.ai-heading{display:flex;justify-content:space-between;align-items:flex-end;gap:18px;margin-bottom:22px}.ai-heading h1{margin:8px 0;font-size:clamp(27px,3vw,37px);font-weight:850;letter-spacing:-.055em;line-height:1.1;color:var(--ai-ink)}.ai-heading p{margin:0;color:var(--ai-muted);font-size:13px;line-height:1.65}.ai-live{display:inline-flex;align-items:center;gap:8px;border:1px solid var(--ai-line);border-radius:999px;padding:9px 12px;font-size:11px;color:var(--ai-muted);white-space:nowrap}.ai-live i{color:#1ba975}
.ai-hero{position:relative;overflow:hidden;display:grid;grid-template-columns:minmax(0,1.35fr) minmax(210px,.65fr);gap:24px;padding:clamp(22px,3vw,34px);margin-bottom:18px;border-radius:23px;background:linear-gradient(120deg,#17162f 0%,#2c2352 58%,#56398a 100%);color:#fff;box-shadow:0 18px 45px rgba(43,31,82,.16)}.ai-hero:after{content:"";position:absolute;width:310px;height:310px;right:-100px;top:-170px;border:1px solid rgba(255,255,255,.14);border-radius:50%;box-shadow:0 0 0 28px rgba(255,255,255,.035),0 0 0 58px rgba(255,255,255,.025);pointer-events:none}.ai-hero-copy,.ai-hero-side{position:relative;z-index:1}.ai-hero-label{color:#d1c7ee;font-size:11px;font-weight:700}.ai-hero-total{margin:10px 0 8px;color:#fff;font-size:clamp(30px,4vw,46px);font-weight:850;letter-spacing:-.06em;overflow-wrap:anywhere}.ai-hero-copy p{max-width:560px;margin:0;color:#d5d0e6;font-size:12px;line-height:1.7}.ai-hero-side{display:flex;flex-direction:column;justify-content:center;gap:12px}.ai-hero-stat{padding:13px 15px;border:1px solid rgba(255,255,255,.13);border-radius:13px;background:rgba(255,255,255,.07)}.ai-hero-stat span{display:block;color:#c9c1e0;font-size:10px;margin-bottom:6px}.ai-hero-stat strong{font-size:17px;color:#fff;font-weight:800}
.ai-metrics{display:grid;grid-template-columns:repeat(4,minmax(0,1fr));gap:13px;margin-bottom:18px}.ai-metric,.ai-panel{min-width:0;border:1px solid var(--ai-line);border-radius:17px;background:var(--ai-surface);box-shadow:0 7px 24px rgba(20,40,55,.035)}.ai-metric{padding:17px}.ai-metric-top{display:flex;justify-content:space-between;align-items:center;gap:8px}.ai-metric-top span{font-size:11px;color:var(--ai-muted);font-weight:650}.ai-metric-icon{display:grid;place-items:center;width:34px;height:34px;border-radius:11px;background:rgba(119,72,188,.1);color:#865acb}.ai-metric strong{display:block;margin:14px 0 6px;font-size:clamp(17px,2vw,23px);font-weight:850;letter-spacing:-.04em;overflow-wrap:anywhere}.ai-metric small{color:var(--ai-muted);font-size:10px;line-height:1.5}
.ai-grid{display:grid;grid-template-columns:minmax(0,1.1fr) minmax(290px,.9fr);gap:17px;align-items:start}.ai-panel{margin-bottom:17px;overflow:hidden}.ai-panel-head{display:flex;justify-content:space-between;align-items:center;gap:12px;padding:18px 20px;border-bottom:1px solid var(--ai-line)}.ai-panel-head h2{margin:0;font-size:15px;font-weight:850;letter-spacing:-.025em;color:var(--ai-ink)}.ai-panel-head p{margin:5px 0 0;color:var(--ai-muted);font-size:11px}.ai-panel-body{padding:19px}
.ai-allocation{display:flex;height:11px;overflow:hidden;border-radius:999px;background:rgba(128,148,164,.15);margin:7px 0 20px}.ai-allocation span{display:block;height:100%}.ai-alloc-row{display:grid;grid-template-columns:10px minmax(0,1fr) auto;align-items:center;gap:10px;margin:13px 0}.ai-alloc-dot{width:9px;height:9px;border-radius:3px;background:#8054c7}.ai-alloc-row:nth-of-type(3) .ai-alloc-dot{background:#1caa83}.ai-alloc-row:nth-of-type(4) .ai-alloc-dot{background:#e5a64a}.ai-alloc-row span{color:var(--ai-muted);font-size:12px}.ai-alloc-row strong{font-size:12px}.ai-month{padding:12px 0;border-bottom:1px solid var(--ai-line)}.ai-month:last-child{border-bottom:0}.ai-month-head{display:flex;justify-content:space-between;gap:10px;font-size:11px;margin-bottom:8px}.ai-month-head span{color:var(--ai-muted)}.ai-month-bars{display:grid;gap:5px}.ai-bar{height:5px;border-radius:99px;background:rgba(128,148,164,.13);overflow:hidden}.ai-bar span{display:block;height:100%;border-radius:inherit;background:#8a63d2}.ai-bar.withdraw span{background:#e7a54c}.ai-bar.invest span{background:#20a982}
.ai-activity{width:100%;border-collapse:collapse}.ai-activity th{padding:0 8px 12px;text-align:left;color:var(--ai-muted);font-size:9px;font-weight:800;text-transform:uppercase;letter-spacing:.09em}.ai-activity td{padding:12px 8px;border-top:1px solid var(--ai-line);font-size:11px;vertical-align:middle}.ai-activity td:first-child{padding-left:0}.ai-activity td:last-child{padding-right:0;text-align:right;white-space:nowrap;font-weight:800}.ai-activity strong{display:block;font-size:11px}.ai-activity small{display:block;color:var(--ai-muted);font-size:10px;margin-top:4px}.ai-status{display:inline-flex;padding:5px 7px;border-radius:7px;background:rgba(128,148,164,.12);color:var(--ai-muted);font-size:9px;font-weight:800}.ai-status.completed,.ai-status.active{background:rgba(29,170,123,.11);color:#16825e}.ai-status.pending{background:rgba(230,165,74,.14);color:#a66a16}.ai-status.failed{background:rgba(216,75,93,.1);color:#c4495b}
.ai-tips{display:grid;gap:12px}.ai-tip{display:flex;gap:12px;align-items:flex-start;padding:13px;border:1px solid var(--ai-line);border-radius:13px}.ai-tip-icon{flex:0 0 34px;width:34px;height:34px;display:grid;place-items:center;border-radius:10px;background:rgba(119,72,188,.1);color:#865acb}.ai-tip h3{margin:1px 0 5px;font-size:12px;font-weight:850;color:var(--ai-ink)}.ai-tip p{margin:0;color:var(--ai-muted);font-size:11px;line-height:1.65}.ai-note{margin-top:13px;padding:12px 13px;border-radius:11px;background:rgba(230,165,74,.1);color:var(--ai-muted);font-size:10px;line-height:1.65}.ai-empty{padding:18px 0;color:var(--ai-muted);font-size:12px}
@media(max-width:1100px){.ai-metrics{grid-template-columns:repeat(2,minmax(0,1fr))}.ai-grid{grid-template-columns:minmax(0,1fr)}}@media(max-width:650px){.account-insight{padding:20px 13px 26px}.ai-heading{align-items:flex-start;flex-direction:column}.ai-hero{grid-template-columns:1fr;gap:18px;border-radius:18px}.ai-hero-side{display:grid;grid-template-columns:1fr 1fr}.ai-metrics{gap:9px}.ai-metric{padding:13px;border-radius:14px}.ai-metric strong{font-size:17px}.ai-panel-head{padding:15px}.ai-panel-body{padding:14px}.ai-activity th:nth-child(2),.ai-activity td:nth-child(2){display:none}.ai-activity td{padding:11px 5px}.ai-activity td:first-child{padding-left:0}.ai-activity td:last-child{padding-right:0;font-size:10px}}
</style>
<main class="account-insight">
    <header class="ai-heading">
        <div><span class="ai-eyebrow">Your money, made clearer</span><h1>Account insight</h1><p>A practical snapshot of your wallet, investments and money movement, <?php echo $insightEscape($insightName); ?>.</p></div>
        <div class="ai-live"><i class="fas fa-circle"></i> Based on your account records</div>
    </header>

    <section class="ai-hero">
        <div class="ai-hero-copy"><span class="ai-hero-label">Tracked account value</span><div class="ai-hero-total"><?php echo $insightMoney($insightTotalAssets); ?></div><p>Combined view of your wallet balance, recorded investment amounts and estimated stock position value. This is an informational summary, not a guaranteed or real-time liquidation value.</p></div>
        <div class="ai-hero-side">
            <div class="ai-hero-stat"><span>Recorded investment ROI</span><strong><?php echo $insightMoney($insight['roi']); ?></strong></div>
            <div class="ai-hero-stat"><span>Available referral earnings</span><strong><?php echo $insightMoney($insight['referrals']); ?></strong></div>
        </div>
    </section>

    <section class="ai-metrics" aria-label="Account metrics">
        <article class="ai-metric"><div class="ai-metric-top"><span>Wallet balance</span><span class="ai-metric-icon"><i class="fas fa-wallet"></i></span></div><strong><?php echo $insightMoney($insight['wallet']); ?></strong><small>Current balance recorded on your account</small></article>
        <article class="ai-metric"><div class="ai-metric-top"><span>Total deposits</span><span class="ai-metric-icon"><i class="fas fa-arrow-down"></i></span></div><strong><?php echo $insightMoney($insight['deposits']); ?></strong><small><?php echo (int)$insight['depositCount']; ?> deposit records, completed amounts only</small></article>
        <article class="ai-metric"><div class="ai-metric-top"><span>Total withdrawals</span><span class="ai-metric-icon"><i class="fas fa-arrow-up"></i></span></div><strong><?php echo $insightMoney($insight['withdrawals']); ?></strong><small><?php echo (int)$insight['withdrawalCount']; ?> withdrawal requests, completed amounts only</small></article>
        <article class="ai-metric"><div class="ai-metric-top"><span>Invested amount</span><span class="ai-metric-icon"><i class="fas fa-chart-line"></i></span></div><strong><?php echo $insightMoney($insight['invested']); ?></strong><small><?php echo (int)$insight['activePlans']; ?> active · <?php echo (int)$insight['completedPlans']; ?> completed plans</small></article>
    </section>

    <div class="ai-grid">
        <div>
            <section class="ai-panel">
                <div class="ai-panel-head"><div><h2>Portfolio allocation</h2><p>How tracked account value is split across recorded categories</p></div></div>
                <div class="ai-panel-body">
                    <div class="ai-allocation" role="img" aria-label="Portfolio allocation"><span style="width:<?php echo $insightAllocation['wallet']; ?>%;background:#8054c7"></span><span style="width:<?php echo $insightAllocation['investments']; ?>%;background:#1caa83"></span><span style="width:<?php echo $insightAllocation['stocks']; ?>%;background:#e5a64a"></span></div>
                    <div class="ai-alloc-row"><span class="ai-alloc-dot"></span><span>Wallet balance</span><strong><?php echo $insightAllocation['wallet']; ?>%</strong></div>
                    <div class="ai-alloc-row"><span class="ai-alloc-dot" style="background:#1caa83"></span><span>Investment records</span><strong><?php echo $insightAllocation['investments']; ?>%</strong></div>
                    <div class="ai-alloc-row"><span class="ai-alloc-dot" style="background:#e5a64a"></span><span>Stock positions (estimated)</span><strong><?php echo $insightAllocation['stocks']; ?>%</strong></div>
                    <p style="margin:16px 0 0;color:var(--ai-muted);font-size:10px;line-height:1.65">Stock value is estimated from recorded buy price, margin and units; it may not reflect live market value. Categories are not a measure of risk or diversification quality.</p>
                </div>
            </section>

            <section class="ai-panel">
                <div class="ai-panel-head"><div><h2>Recent account activity</h2><p>Latest deposits, withdrawals and investment records</p></div><a href="Account.php" style="font-size:10px;color:#865acb;font-weight:800">View records <i class="fas fa-arrow-right"></i></a></div>
                <div class="ai-panel-body">
                    <?php if (empty($insight['activity'])): ?><div class="ai-empty">Your account activity will appear here when records are available.</div>
                    <?php else: ?><div style="overflow-x:auto"><table class="ai-activity"><thead><tr><th>Activity</th><th>Date</th><th>Status</th><th>Amount</th></tr></thead><tbody>
                    <?php foreach ($insight['activity'] as $activity): $statusClass = strtolower(preg_replace('/[^a-z]/i','',(string)$activity['status'])); ?>
                    <tr><td><strong><?php echo $insightEscape($activity['type']); ?></strong><small><?php echo $insightEscape($activity['description']); ?></small></td><td><?php echo $activity['date'] !== '' ? $insightEscape(date('d M Y', strtotime($activity['date']))) : '—'; ?></td><td><span class="ai-status <?php echo $insightEscape($statusClass); ?>"><?php echo $insightEscape($activity['status']); ?></span></td><td><?php echo ($activity['direction'] === 'out' ? '−' : ($activity['direction'] === 'in' ? '+' : '')) . $insightMoney($activity['amount']); ?></td></tr>
                    <?php endforeach; ?></tbody></table></div><?php endif; ?>
                </div>
            </section>
        </div>

        <aside>
            <section class="ai-panel">
                <div class="ai-panel-head"><div><h2>Money movement</h2><p>Monthly completed inflows, withdrawals and recorded investments</p></div></div>
                <div class="ai-panel-body">
                    <?php if (empty($insight['monthly'])): ?><div class="ai-empty">Monthly activity will appear here when you have account records.</div>
                    <?php else: foreach ($insight['monthly'] as $month => $values): $maxValue=max(1,(float)$values['deposits'],(float)$values['withdrawals'],(float)$values['investments']); ?>
                    <div class="ai-month"><div class="ai-month-head"><strong><?php echo $insightEscape($month); ?></strong><span>In <?php echo $insightMoney($values['deposits']); ?></span></div><div class="ai-month-bars"><div class="ai-bar" title="Deposits"><span style="width:<?php echo min(100,$values['deposits']/$maxValue*100); ?>%"></span></div><div class="ai-bar withdraw" title="Withdrawals"><span style="width:<?php echo min(100,$values['withdrawals']/$maxValue*100); ?>%"></span></div><div class="ai-bar invest" title="Investments"><span style="width:<?php echo min(100,$values['investments']/$maxValue*100); ?>%"></span></div></div></div>
                    <?php endforeach; ?><div style="display:flex;gap:12px;flex-wrap:wrap;margin-top:14px;font-size:9px;color:var(--ai-muted)"><span><i class="fas fa-circle" style="color:#8a63d2"></i> Deposits</span><span><i class="fas fa-circle" style="color:#e7a54c"></i> Withdrawals</span><span><i class="fas fa-circle" style="color:#20a982"></i> Investments</span></div><?php endif; ?>
                </div>
            </section>

            <section class="ai-panel">
                <div class="ai-panel-head"><div><h2>Build healthier money habits</h2><p>Small checks that can improve your decisions</p></div></div>
                <div class="ai-panel-body"><div class="ai-tips">
                    <article class="ai-tip"><span class="ai-tip-icon"><i class="fas fa-piggy-bank"></i></span><div><h3>Keep a cash buffer</h3><p>Set aside accessible funds for essential bills and unexpected costs before committing money to longer-term investments.</p></div></article>
                    <article class="ai-tip"><span class="ai-tip-icon"><i class="fas fa-balance-scale"></i></span><div><h3>Review concentration</h3><p>Check whether too much of your money depends on one plan, company or asset. Diversification can reduce concentration risk, but cannot eliminate losses.</p></div></article>
                    <article class="ai-tip"><span class="ai-tip-icon"><i class="fas fa-calendar-check"></i></span><div><h3>Use goals, not guesses</h3><p>Define your goal, timeline and affordable contribution. Review progress regularly rather than relying on promised returns.</p></div></article>
                    <article class="ai-tip"><span class="ai-tip-icon"><i class="fas fa-file-invoice-dollar"></i></span><div><h3>Check terms and fees</h3><p>Before investing or withdrawing, read fees, lock-in periods, withdrawal rules and the risks stated in the product terms.</p></div></article>
                </div><div class="ai-note"><i class="fas fa-info-circle"></i> Educational information only, not personalised financial advice. Values are calculated from available platform records and may exclude fees, liabilities or live market changes. Investment returns are not guaranteed.</div></div>
            </section>

            <section class="ai-panel">
                <div class="ai-panel-head"><div><h2>Quick actions</h2><p>Go directly to an account task</p></div></div>
                <div class="ai-panel-body" style="display:grid;grid-template-columns:1fr 1fr;gap:9px">
                    <a href="Deposit.php" style="padding:12px;border:1px solid var(--ai-line);border-radius:12px;color:var(--ai-ink);font-size:11px;font-weight:750"><i class="fas fa-plus-circle" style="color:#865acb;margin-right:6px"></i>Deposit</a>
                    <a href="Withdrawal.php" style="padding:12px;border:1px solid var(--ai-line);border-radius:12px;color:var(--ai-ink);font-size:11px;font-weight:750"><i class="fas fa-arrow-up" style="color:#865acb;margin-right:6px"></i>Withdraw</a>
                    <a href="Transfer.php" style="padding:12px;border:1px solid var(--ai-line);border-radius:12px;color:var(--ai-ink);font-size:11px;font-weight:750"><i class="fas fa-exchange-alt" style="color:#865acb;margin-right:6px"></i>Transfer</a>
                    <a href="Profile.php" style="padding:12px;border:1px solid var(--ai-line);border-radius:12px;color:var(--ai-ink);font-size:11px;font-weight:750"><i class="fas fa-user" style="color:#865acb;margin-right:6px"></i>Profile</a>
                </div>
            </section>
        </aside>
    </div>
</main>
<?php include('Footer.php'); ?>
        </div>
    </div>
    <script src="js/lib/jquery/jquery.min.js"></script>
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery.slimscroll.js"></script>
    <script src="js/sidebarmenu.js"></script>
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="js/custom.min.js"></script>
</body>
</html>
