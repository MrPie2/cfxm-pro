<?php
session_start();
include('Header.php');

if (isset($_SESSION['User_id'])) {
    $depositInvestorId = mysqli_real_escape_string($Conn, (string)$_SESSION['User_id']);
    $depositQuery = mysqli_query($Conn, "SELECT Amount_Deposited, Status, Date FROM deposits WHERE Investor_id='$depositInvestorId' ORDER BY Date DESC");
    $depositRows = array();
    $depositStats = array('total' => 0.0, 'successful' => 0.0, 'successCount' => 0, 'pendingCount' => 0, 'failedCount' => 0);
    if ($depositQuery) {
        while ($depositRow = mysqli_fetch_assoc($depositQuery)) {
            $depositRows[] = $depositRow;
            $amount = (float)($depositRow['Amount_Deposited'] ?? 0);
            $depositStats['total'] += $amount;
            if ((string)$depositRow['Status'] === '1') {
                $depositStats['successful'] += $amount;
                $depositStats['successCount']++;
            } elseif ((string)$depositRow['Status'] === '0') {
                $depositStats['failedCount']++;
            } else {
                $depositStats['pendingCount']++;
            }
        }
    }
    $depositEscape = function ($value) {
        return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
    };
    $depositMoney = function ($amount) use ($curAbbr, $exchangerate) {
        return htmlspecialchars((string)$curAbbr, ENT_QUOTES, 'UTF-8') . number_format((float)$amount * (float)$exchangerate, 2, '.', ',');
    };
?>
<style>
.deposit-page{--dp-brand:#7748bc;--dp-brand-dark:#49247e;--dp-muted:var(--vh-muted,#81909b);--dp-border:var(--vh-border,rgba(125,148,162,.22));width:100%;max-width:1500px;margin:0 auto;padding:24px 22px 30px;color:var(--text-color,#142b36);box-sizing:border-box}
.deposit-page *{box-sizing:border-box}
.deposit-page .dp-heading{display:flex;align-items:flex-end;justify-content:space-between;gap:18px;margin-bottom:22px}
.deposit-page .dp-eyebrow{display:block;margin-bottom:8px;color:var(--dp-brand);font-size:10px;font-weight:800;letter-spacing:.17em;text-transform:uppercase}
.deposit-page h1{margin:0 0 8px;font-size:clamp(25px,3vw,35px);line-height:1.15;letter-spacing:-.04em;font-weight:800;color:var(--text-color,#142b36)}
.deposit-page .dp-subtitle{margin:0;color:var(--dp-muted);font-size:13px;line-height:1.65}
.deposit-page .dp-primary{display:inline-flex;align-items:center;justify-content:center;gap:9px;min-height:46px;padding:0 18px;border:0;border-radius:13px;background:linear-gradient(135deg,var(--dp-brand-dark),var(--dp-brand));color:#fff!important;text-decoration:none;font-size:13px;font-weight:750;box-shadow:0 8px 20px rgba(73,36,126,.2);transition:transform .18s ease,box-shadow .18s ease}
.deposit-page .dp-primary:hover{transform:translateY(-2px);box-shadow:0 12px 24px rgba(73,36,126,.26)}
.deposit-page .dp-hero{position:relative;overflow:hidden;display:grid;grid-template-columns:minmax(0,1.4fr) minmax(220px,.6fr);align-items:center;gap:24px;padding:26px 28px;margin-bottom:17px;border-radius:22px;background:linear-gradient(125deg,#12225c 0%,#49247e 58%,#7748bc 100%);color:#fff;box-shadow:0 15px 35px rgba(73,36,126,.17)}
.deposit-page .dp-hero:after{content:"";position:absolute;width:260px;height:260px;right:-70px;top:-155px;border:1px solid rgba(255,255,255,.15);border-radius:50%;box-shadow:0 0 0 25px rgba(255,255,255,.035),0 0 0 55px rgba(255,255,255,.025);pointer-events:none}
.deposit-page .dp-hero h2{position:relative;z-index:1;margin:0 0 10px;font-size:clamp(20px,2.4vw,28px);font-weight:800;letter-spacing:-.03em;color:#fff}
.deposit-page .dp-hero p{position:relative;z-index:1;max-width:540px;margin:0 0 18px;color:rgba(255,255,255,.78);font-size:13px;line-height:1.7}
.deposit-page .dp-hero .dp-primary{background:#fff;color:#49247e!important;box-shadow:none}
.deposit-page .dp-hero-art{position:relative;z-index:1;justify-self:center;display:grid;place-items:center;width:116px;height:116px;border:1px solid rgba(255,255,255,.22);border-radius:32px;background:rgba(255,255,255,.11);box-shadow:inset 0 1px 0 rgba(255,255,255,.14);transform:rotate(-5deg)}
.deposit-page .dp-hero-art i{font-size:47px;color:#fff;transform:rotate(5deg)}
.deposit-page .dp-stats{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:13px;margin-bottom:22px}
.deposit-page .dp-stat{min-width:0;padding:18px 19px;border:1px solid var(--dp-border);border-radius:17px;background:var(--card-bg,var(--bg-color2,#fff));box-shadow:0 5px 18px rgba(20,43,54,.035)}
.deposit-page .dp-stat-top{display:flex;align-items:center;justify-content:space-between;gap:10px;margin-bottom:14px;color:var(--dp-muted);font-size:12px;font-weight:650}
.deposit-page .dp-stat-icon{display:grid;place-items:center;flex:0 0 36px;width:36px;height:36px;border-radius:12px;background:rgba(119,72,188,.11);color:var(--dp-brand);font-size:15px}
.deposit-page .dp-stat strong{display:block;overflow-wrap:anywhere;font-size:clamp(18px,2vw,24px);font-weight:800;letter-spacing:-.035em;color:var(--text-color,#142b36)}
.deposit-page .dp-stat small{display:block;margin-top:6px;color:var(--dp-muted);font-size:11px}
.deposit-page .dp-panel{overflow:hidden;border:1px solid var(--dp-border);border-radius:19px;background:var(--card-bg,var(--bg-color2,#fff));box-shadow:0 7px 25px rgba(20,43,54,.04)}
.deposit-page .dp-panel-head{display:flex;justify-content:space-between;align-items:center;gap:14px;padding:20px 22px;border-bottom:1px solid var(--dp-border)}
.deposit-page .dp-panel-head h2{margin:0 0 5px;font-size:17px;font-weight:800;letter-spacing:-.025em;color:var(--text-color,#142b36)}
.deposit-page .dp-panel-head p{margin:0;color:var(--dp-muted);font-size:12px}
.deposit-page .dp-count{display:inline-flex;align-items:center;justify-content:center;min-width:34px;height:30px;padding:0 10px;border-radius:10px;background:rgba(119,72,188,.1);color:var(--dp-brand);font-size:12px;font-weight:800}
.deposit-page .dp-table-wrap{width:100%;overflow-x:auto}
.deposit-page table{width:100%;min-width:600px;margin:0;border-collapse:collapse}
.deposit-page thead th{padding:14px 22px;background:rgba(125,148,162,.06);color:var(--dp-muted);font-size:10px;font-weight:800;letter-spacing:.09em;text-align:left;text-transform:uppercase;border:0}
.deposit-page tbody td,.deposit-page tbody th{padding:16px 22px;border-top:1px solid var(--dp-border);font-size:12px;vertical-align:middle;text-align:left;color:var(--text-color,#142b36)}
.deposit-page .dp-amount{font-weight:800;font-size:13px;white-space:nowrap}
.deposit-page .dp-ref{display:flex;align-items:center;gap:11px}
.deposit-page .dp-row-icon{display:grid;place-items:center;width:35px;height:35px;flex:0 0 35px;border-radius:12px;background:rgba(14,145,96,.1);color:#15966a}
.deposit-page .dp-row-icon.is-pending{background:rgba(220,151,24,.12);color:#c88a10}
.deposit-page .dp-row-icon.is-failed{background:rgba(220,53,69,.1);color:#dc3545}
.deposit-page .dp-row-title{font-weight:750;font-size:12px}
.deposit-page .dp-row-sub{display:block;margin-top:4px;color:var(--dp-muted);font-size:10px}
.deposit-page .dp-badge{display:inline-flex;align-items:center;gap:6px;padding:6px 9px;border-radius:999px;font-size:10px;font-weight:800;white-space:nowrap}
.deposit-page .dp-badge:before{content:"";width:5px;height:5px;border-radius:50%;background:currentColor}
.deposit-page .dp-badge.success{background:rgba(21,150,106,.11);color:#15966a}
.deposit-page .dp-badge.pending{background:rgba(200,138,16,.12);color:#c88a10}
.deposit-page .dp-badge.failed{background:rgba(220,53,69,.1);color:#dc3545}
.deposit-page .dp-empty{padding:48px 20px;text-align:center}
.deposit-page .dp-empty-icon{display:grid;place-items:center;width:60px;height:60px;margin:0 auto 15px;border-radius:19px;background:rgba(119,72,188,.1);color:var(--dp-brand);font-size:24px}
.deposit-page .dp-empty h3{margin:0 0 7px;font-size:16px;font-weight:800;color:var(--text-color,#142b36)}
.deposit-page .dp-empty p{max-width:380px;margin:0 auto 18px;color:var(--dp-muted);font-size:12px;line-height:1.7}
.deposit-page .dp-footnote{display:flex;align-items:flex-start;gap:10px;margin-top:15px;padding:13px 15px;border:1px solid var(--dp-border);border-radius:13px;color:var(--dp-muted);font-size:11px;line-height:1.65}
.deposit-page .dp-footnote i{margin-top:2px;color:var(--dp-brand)}
@media(max-width:767px){.deposit-page{padding:20px 12px 26px}.deposit-page .dp-heading{align-items:flex-start;flex-direction:column}.deposit-page .dp-heading .dp-primary{width:100%}.deposit-page .dp-hero{grid-template-columns:minmax(0,1fr);padding:22px 20px}.deposit-page .dp-hero-art{display:none}.deposit-page .dp-stats{grid-template-columns:repeat(2,minmax(0,1fr));gap:9px}.deposit-page .dp-stat{padding:14px}.deposit-page .dp-stat:last-child{grid-column:1/-1}.deposit-page .dp-panel-head{padding:17px 15px}.deposit-page thead th{padding:13px 15px}.deposit-page tbody td,.deposit-page tbody th{padding:14px 15px}.deposit-page .dp-footnote{margin-bottom:8px}}
@media(prefers-reduced-motion:reduce){.deposit-page .dp-primary{transition:none}}
</style>

<div class="deposit-page">
    <header class="dp-heading">
        <div>
            <span class="dp-eyebrow">Wallet · Funding</span>
            <h1>Deposits</h1>
            <p class="dp-subtitle">Add funds to your account and keep track of every deposit in one place.</p>
        </div>
        <a href="Wallet.php" class="dp-primary"><i class="fas fa-plus"></i> Make a deposit <i class="fas fa-arrow-right"></i></a>
    </header>

    <section class="dp-hero" aria-labelledby="dp-hero-title">
        <div>
            <span class="dp-eyebrow" style="color:#d7c5ff">FUND YOUR ACCOUNT</span>
            <h2 id="dp-hero-title">Your next move starts here.</h2>
            <p>Choose one of the available payment methods, follow the instructions carefully, and submit your payment proof when required. Deposits are reflected after verification.</p>
            <a href="Wallet.php" class="dp-primary">View payment methods <i class="fas fa-arrow-up-right-from-square"></i></a>
        </div>
        <div class="dp-hero-art" aria-hidden="true"><i class="fas fa-wallet"></i></div>
    </section>

    <section class="dp-stats" aria-label="Deposit summary">
        <article class="dp-stat">
            <div class="dp-stat-top"><span>Successful deposits</span><span class="dp-stat-icon"><i class="fas fa-check-circle"></i></span></div>
            <strong><?php echo $depositMoney($depositStats['successful']); ?></strong>
            <small><?php echo number_format($depositStats['successCount']); ?> completed transaction<?php echo $depositStats['successCount'] === 1 ? '' : 's'; ?></small>
        </article>
        <article class="dp-stat">
            <div class="dp-stat-top"><span>Awaiting review</span><span class="dp-stat-icon" style="background:rgba(200,138,16,.12);color:#c88a10"><i class="fas fa-clock"></i></span></div>
            <strong><?php echo number_format($depositStats['pendingCount']); ?></strong>
            <small>Pending transaction<?php echo $depositStats['pendingCount'] === 1 ? '' : 's'; ?></small>
        </article>
        <article class="dp-stat">
            <div class="dp-stat-top"><span>All deposit requests</span><span class="dp-stat-icon" style="background:rgba(67,132,214,.12);color:#4384d6"><i class="fas fa-receipt"></i></span></div>
            <strong><?php echo number_format(count($depositRows)); ?></strong>
            <small><?php echo number_format($depositStats['failedCount']); ?> failed · <?php echo number_format($depositStats['pendingCount']); ?> pending</small>
        </article>
    </section>

    <section class="dp-panel" aria-labelledby="dp-history-title">
        <div class="dp-panel-head">
            <div><h2 id="dp-history-title">Deposit history</h2><p>Review the status and date of your account funding activity.</p></div>
            <span class="dp-count"><?php echo number_format(count($depositRows)); ?></span>
        </div>
        <?php if (count($depositRows) > 0) { ?>
            <div class="dp-table-wrap">
                <table>
                    <thead><tr><th>Transaction</th><th>Amount</th><th>Status</th><th>Date</th></tr></thead>
                    <tbody>
                    <?php foreach ($depositRows as $depositIndex => $depositRow) {
                        $depositStatusCode = (string)($depositRow['Status'] ?? '');
                        if ($depositStatusCode === '1') {
                            $depositStatusLabel = 'Successful';
                            $depositStatusClass = 'success';
                            $depositIconClass = '';
                            $depositIcon = 'fa-check';
                        } elseif ($depositStatusCode === '0') {
                            $depositStatusLabel = 'Failed';
                            $depositStatusClass = 'failed';
                            $depositIconClass = 'is-failed';
                            $depositIcon = 'fa-times';
                        } else {
                            $depositStatusLabel = 'Pending';
                            $depositStatusClass = 'pending';
                            $depositIconClass = 'is-pending';
                            $depositIcon = 'fa-clock';
                        }
                    ?>
                        <tr>
                            <td><div class="dp-ref"><span class="dp-row-icon <?php echo $depositIconClass; ?>"><i class="fas <?php echo $depositIcon; ?>"></i></span><span><span class="dp-row-title">Deposit request</span><span class="dp-row-sub">Transaction #<?php echo number_format($depositIndex + 1); ?></span></span></div></td>
                            <td class="dp-amount"><?php echo $depositMoney($depositRow['Amount_Deposited'] ?? 0); ?></td>
                            <td><span class="dp-badge <?php echo $depositStatusClass; ?>"><?php echo $depositStatusLabel; ?></span></td>
                            <td><?php echo $depositEscape($depositRow['Date'] ?? '—'); ?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        <?php } else { ?>
            <div class="dp-empty">
                <span class="dp-empty-icon"><i class="fas fa-receipt"></i></span>
                <h3>No deposits yet</h3>
                <p>Your deposit history will appear here once you start funding your account. When you're ready, explore the available payment methods.</p>
                <a href="Wallet.php" class="dp-primary"><i class="fas fa-plus"></i> Make your first deposit</a>
            </div>
        <?php } ?>
    </section>

    <div class="dp-footnote"><i class="fas fa-shield-alt"></i><span>For your security, send funds only to the payment address or method shown inside your account. Keep your payment proof until your deposit has been reviewed. Never share your account password or verification codes.</span></div>
</div>

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
<?php
} else {
    header('Location:LoginContainer.php');
    exit;
}
?>