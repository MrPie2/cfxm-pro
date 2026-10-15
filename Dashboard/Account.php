<?php
session_start();
if (!isset($_SESSION['User_id'])) {
    header('Location: LoginContainer.php');
    exit;
}

include('Header.php');
include('SettleDueInvestments.php');

$accountInvestorId = mysqli_real_escape_string($Conn, (string)$_SESSION['User_id']);
$accountCurrency = isset($curAbbr) ? (string)$curAbbr : '$';
$accountRate = isset($exchangerate) && (float)$exchangerate > 0 ? (float)$exchangerate : 1;
$accountMoney = function ($amount) use ($accountCurrency, $accountRate) {
    return htmlspecialchars($accountCurrency, ENT_QUOTES, 'UTF-8') . number_format((float)$amount * $accountRate, 2, '.', ',');
};
$accountEscape = function ($value) {
    return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
};

$accountWallet = isset($userDetails['Fin_Asset']) ? (float)$userDetails['Fin_Asset'] : 0;
$accountDeposits = isset($userDetails['Total_Deposit']) ? (float)$userDetails['Total_Deposit'] : 0;
$accountWithdrawals = 0;
$accountWithdrawalCount = 0;
$accountDepositCount = 0;
$accountInvested = 0;
$accountROI = 0;
$accountActivePlans = 0;
$accountCompletedPlans = 0;
$accountStockValue = 0;
$accountStockCount = 0;
$accountReferral = 0;
$accountRecentActivity = array();

$accountWithdrawalQuery = mysqli_query($Conn, "SELECT Amount_Withdrawn, Status, Date, Destination FROM withdrawals WHERE Investor_id='$accountInvestorId' ORDER BY Date DESC");
if ($accountWithdrawalQuery) {
    while ($accountRow = mysqli_fetch_assoc($accountWithdrawalQuery)) {
        if ((string)$accountRow['Status'] === '2') {
            $accountWithdrawals += (float)$accountRow['Amount_Withdrawn'];
        }
        $accountWithdrawalCount++;
        $accountRecentActivity[] = array(
            'date' => isset($accountRow['Date']) ? $accountRow['Date'] : '',
            'type' => 'Withdrawal',
            'description' => 'Withdrawal request' . (!empty($accountRow['Destination']) ? ' · ' . $accountRow['Destination'] : ''),
            'amount' => (float)$accountRow['Amount_Withdrawn'],
            'status' => (string)$accountRow['Status'] === '2' ? 'Completed' : ((string)$accountRow['Status'] === '0' ? 'Pending' : 'Failed'),
            'direction' => 'out'
        );
    }
}
$accountDepositQuery = mysqli_query($Conn, "SELECT Amount_Deposited, Status, Date FROM deposits WHERE Investor_id='$accountInvestorId' ORDER BY Date DESC");
if ($accountDepositQuery) {
    while ($accountRow = mysqli_fetch_assoc($accountDepositQuery)) {
        $accountDepositCount++;
        $accountRecentActivity[] = array(
            'date' => isset($accountRow['Date']) ? $accountRow['Date'] : '',
            'type' => 'Deposit',
            'description' => 'Wallet funding',
            'amount' => (float)$accountRow['Amount_Deposited'],
            'status' => (string)$accountRow['Status'] === '1' ? 'Completed' : ((string)$accountRow['Status'] === '0' ? 'Failed' : 'Pending'),
            'direction' => 'in'
        );
    }
}
$accountContractQuery = mysqli_query($Conn, "SELECT Plan_Type, Amount, ROI, Date_Entered, Status FROM contracts WHERE Investor_id='$accountInvestorId' ORDER BY Date_Entered DESC");
if ($accountContractQuery) {
    while ($accountRow = mysqli_fetch_assoc($accountContractQuery)) {
        $accountInvested += (float)$accountRow['Amount'];
        $accountROI += (float)$accountRow['ROI'];
        if ((string)$accountRow['Status'] === '1') { $accountActivePlans++; }
        if ((string)$accountRow['Status'] === '2') { $accountCompletedPlans++; }
        $accountRecentActivity[] = array(
            'date' => isset($accountRow['Date_Entered']) ? $accountRow['Date_Entered'] : '',
            'type' => 'Investment',
            'description' => (string)$accountRow['Plan_Type'] . ' investment',
            'amount' => (float)$accountRow['Amount'],
            'status' => (string)$accountRow['Status'] === '1' ? 'Active' : ((string)$accountRow['Status'] === '2' ? 'Completed' : 'Pending'),
            'direction' => 'invest'
        );
    }
}
$accountStockQuery = mysqli_query($Conn, "SELECT Buy_Price, Margin, Total_Units FROM stockcontracts WHERE Investor_id='$accountInvestorId'");
if ($accountStockQuery) {
    while ($accountRow = mysqli_fetch_assoc($accountStockQuery)) {
        $accountStockValue += (float)$accountRow['Buy_Price'] * (float)$accountRow['Margin'] * (float)$accountRow['Total_Units'];
        $accountStockCount++;
    }
}
$accountReferralQuery = mysqli_query($Conn, "SELECT Refferal_Earnings FROM refferals WHERE Refferer='$accountInvestorId' AND Status='1'");
if ($accountReferralQuery) {
    while ($accountRow = mysqli_fetch_assoc($accountReferralQuery)) {
        $accountReferral += (float)$accountRow['Refferal_Earnings'];
    }
}
usort($accountRecentActivity, function ($a, $b) {
    return strtotime((string)$b['date']) <=> strtotime((string)$a['date']);
});
$accountRecentActivity = array_slice($accountRecentActivity, 0, 8);
$accountTotalAssets = max(0, $accountWallet) + max(0, $accountInvested) + max(0, $accountStockValue);
$accountWalletShare = $accountTotalAssets > 0 ? min(100, max(0, ($accountWallet / $accountTotalAssets) * 100)) : 0;
$accountInvestedShare = $accountTotalAssets > 0 ? min(100, max(0, ($accountInvested / $accountTotalAssets) * 100)) : 0;
$accountStockShare = $accountTotalAssets > 0 ? min(100, max(0, ($accountStockValue / $accountTotalAssets) * 100)) : 0;
?>
<style>
/* CFXM-PRO advanced account portfolio — scoped to this page */
.vh-portfolio{--ap-ink:var(--text-color,#142b36);--ap-muted:var(--vh-muted,#81909b);--ap-line:rgba(128,148,164,.2);--ap-panel:var(--card-bg,#fff);max-width:1500px;margin:0 auto;padding:24px 22px 32px;color:var(--ap-ink)}
.vh-portfolio *{box-sizing:border-box}
.vh-portfolio a{transition:transform .18s ease,background .18s ease}
.ap-eyebrow{display:inline-flex;align-items:center;gap:8px;color:#9270df;font-size:10px;font-weight:850;letter-spacing:.16em;text-transform:uppercase}
.ap-eyebrow:before{content:"";width:18px;height:2px;border-radius:2px;background:#9270df}
.ap-heading{display:flex;justify-content:space-between;align-items:flex-end;gap:18px;margin:0 0 22px}
.ap-heading h1{font-size:clamp(26px,3vw,36px);font-weight:850;letter-spacing:-.055em;line-height:1.1;margin:8px 0}
.ap-heading p{color:var(--ap-muted);font-size:13px;margin:0;line-height:1.65}
.ap-date{display:inline-flex;align-items:center;gap:8px;border:1px solid var(--ap-line);border-radius:999px;padding:9px 12px;color:var(--ap-muted);font-size:11px;white-space:nowrap}
.ap-hero{position:relative;overflow:hidden;display:grid;grid-template-columns:minmax(0,1.25fr) minmax(230px,.75fr);gap:20px;align-items:center;padding:clamp(22px,3vw,34px);border-radius:22px;background:linear-gradient(120deg,#17162c 0%,#28234d 55%,#3a2b69 100%);color:#fff;box-shadow:0 18px 48px rgba(31,24,67,.16);margin-bottom:20px}
.ap-hero:after{content:"";position:absolute;width:310px;height:310px;border:1px solid rgba(255,255,255,.08);border-radius:50%;right:4%;top:-205px;box-shadow:0 0 0 35px rgba(255,255,255,.025),0 0 0 70px rgba(255,255,255,.02);pointer-events:none}
.ap-hero-label{font-size:11px;color:#c5c0e8;font-weight:700;display:flex;align-items:center;gap:8px}
.ap-hero-label i{color:#a6efc2}
.ap-hero-balance{font-size:clamp(30px,4.4vw,48px);font-weight:850;letter-spacing:-.055em;line-height:1.12;margin:12px 0 10px;overflow-wrap:anywhere}
.ap-hero-note{color:#c5c0df;font-size:12px;line-height:1.65;max-width:490px;margin:0}
.ap-hero-actions{display:flex;flex-wrap:wrap;gap:9px;margin-top:22px}
.ap-btn{display:inline-flex;align-items:center;justify-content:center;gap:8px;padding:11px 15px;border-radius:10px;font-size:12px;font-weight:800;text-decoration:none!important;border:1px solid transparent}
.ap-btn-primary{background:#b8f4d0;color:#18283a!important}
.ap-btn-primary:hover{background:#d0f9e0;transform:translateY(-1px)}
.ap-btn-ghost{border-color:rgba(255,255,255,.2);background:rgba(255,255,255,.07);color:#fff!important}
.ap-btn-ghost:hover{background:rgba(255,255,255,.13)}
.ap-hero-art{width:100%;max-width:330px;justify-self:end;position:relative;z-index:1}
.ap-hero-art svg{width:100%;height:auto;display:block}
.ap-stats{display:grid;grid-template-columns:repeat(4,minmax(0,1fr));gap:13px;margin-bottom:20px}
.ap-stat{min-width:0;background:var(--ap-panel);border:1px solid var(--ap-line);border-radius:16px;padding:17px;box-shadow:0 5px 18px rgba(15,35,45,.025)}
.ap-stat-top{display:flex;align-items:center;justify-content:space-between;gap:8px;margin-bottom:15px}
.ap-stat-icon{width:36px;height:36px;border-radius:11px;display:grid;place-items:center;font-size:14px;background:rgba(139,104,224,.12);color:#9978e5}
.ap-stat-icon.green{background:rgba(30,176,112,.12);color:#19a36c}.ap-stat-icon.orange{background:rgba(236,158,66,.14);color:#d58b2f}.ap-stat-icon.blue{background:rgba(60,142,221,.13);color:#3b8ddc}
.ap-stat-caption{color:var(--ap-muted);font-size:11px;font-weight:650}
.ap-stat-value{font-size:clamp(17px,2vw,23px);font-weight:850;letter-spacing:-.035em;line-height:1.25;overflow-wrap:anywhere}
.ap-stat-foot{font-size:10px;color:var(--ap-muted);margin-top:7px;line-height:1.45}
.ap-columns{display:grid;grid-template-columns:minmax(0,1.2fr) minmax(300px,.8fr);gap:18px;align-items:start}
.ap-panel{min-width:0;border:1px solid var(--ap-line);border-radius:18px;background:var(--ap-panel);overflow:hidden;margin-bottom:18px;box-shadow:0 5px 18px rgba(15,35,45,.025)}
.ap-panel-head{display:flex;align-items:center;justify-content:space-between;gap:12px;padding:18px 20px;border-bottom:1px solid var(--ap-line)}
.ap-panel-head h2{font-size:15px;font-weight:850;letter-spacing:-.025em;margin:0}
.ap-panel-head p{font-size:11px;color:var(--ap-muted);margin:5px 0 0}
.ap-panel-body{padding:20px}
.ap-link{font-size:11px;color:#9270df!important;font-weight:800;text-decoration:none!important;white-space:nowrap}
.ap-allocation{display:grid;grid-template-columns:138px minmax(0,1fr);gap:22px;align-items:center}
.ap-donut{width:132px;height:132px;border-radius:50%;display:grid;place-items:center;background:conic-gradient(#9b7bea 0 <?php echo number_format($accountWalletShare, 2, '.', ''); ?>%,#42bd91 <?php echo number_format($accountWalletShare, 2, '.', ''); ?>% <?php echo number_format($accountWalletShare+$accountInvestedShare, 2, '.', ''); ?>%,#63a7e8 <?php echo number_format($accountWalletShare+$accountInvestedShare, 2, '.', ''); ?>% 100%);position:relative}
.ap-donut:before{content:"";position:absolute;inset:12px;border-radius:50%;background:var(--ap-panel)}
.ap-donut-inner{position:relative;z-index:1;text-align:center}
.ap-donut-inner strong{display:block;font-size:17px;font-weight:850;letter-spacing:-.04em}
.ap-donut-inner span{font-size:9px;color:var(--ap-muted)}
.ap-legend{display:grid;gap:14px}
.ap-legend-row{display:grid;grid-template-columns:10px minmax(0,1fr) auto;gap:9px;align-items:center;font-size:11px}
.ap-dot{width:9px;height:9px;border-radius:3px;background:#9b7bea}.ap-dot.green{background:#42bd91}.ap-dot.blue{background:#63a7e8}
.ap-legend-name{color:var(--ap-muted)}.ap-legend-value{font-weight:800;white-space:nowrap}
.ap-progress{height:5px;border-radius:10px;background:rgba(128,148,164,.15);overflow:hidden;margin-top:7px}
.ap-progress span{height:100%;display:block;border-radius:10px;background:#9b7bea}.ap-progress.green span{background:#42bd91}.ap-progress.blue span{background:#63a7e8}
.ap-table-wrap{overflow-x:auto}
.ap-table{width:100%;border-collapse:collapse;min-width:520px}
.ap-table th{font-size:9px;letter-spacing:.09em;text-transform:uppercase;color:var(--ap-muted);font-weight:800;padding:12px 20px;text-align:left;background:rgba(128,148,164,.045);border-bottom:1px solid var(--ap-line)}
.ap-table td{font-size:11px;padding:14px 20px;border-bottom:1px solid var(--ap-line);vertical-align:middle}
.ap-table tr:last-child td{border-bottom:0}
.ap-activity-title{font-weight:800;font-size:11px;margin-bottom:4px}.ap-activity-sub{color:var(--ap-muted);font-size:10px}
.ap-activity-icon{width:32px;height:32px;border-radius:10px;display:inline-grid;place-items:center;background:rgba(139,104,224,.12);color:#9978e5;margin-right:9px;vertical-align:middle}
.ap-status{display:inline-flex;align-items:center;gap:5px;padding:5px 8px;border-radius:999px;font-size:9px;font-weight:800;white-space:nowrap;background:rgba(128,148,164,.12);color:var(--ap-muted)}
.ap-status:before{content:"";width:5px;height:5px;border-radius:50%;background:currentColor}
.ap-status.completed,.ap-status.active{background:rgba(36,174,112,.12);color:#1b9b69}.ap-status.pending{background:rgba(236,158,66,.13);color:#c88427}.ap-status.failed{background:rgba(224,79,94,.12);color:#d34f60}
.ap-amount{font-weight:850;white-space:nowrap}.ap-amount.in{color:#20a36b}.ap-amount.out{color:#d56c76}
.ap-empty{padding:28px 18px;text-align:center;color:var(--ap-muted);font-size:12px}
.ap-empty i{display:block;font-size:24px;color:#9b7bea;margin-bottom:10px}
.ap-tips{display:grid;gap:11px}
.ap-tip{display:grid;grid-template-columns:38px minmax(0,1fr);gap:12px;padding:13px;border:1px solid var(--ap-line);border-radius:13px}
.ap-tip-icon{width:36px;height:36px;border-radius:11px;background:rgba(30,176,112,.12);color:#1aa36b;display:grid;place-items:center;font-size:14px}
.ap-tip:nth-child(2) .ap-tip-icon{background:rgba(139,104,224,.12);color:#9978e5}.ap-tip:nth-child(3) .ap-tip-icon{background:rgba(60,142,221,.13);color:#3b8ddc}.ap-tip:nth-child(4) .ap-tip-icon{background:rgba(236,158,66,.14);color:#d58b2f}
.ap-tip h3{font-size:12px;font-weight:850;margin:1px 0 5px}.ap-tip p{font-size:10px;color:var(--ap-muted);line-height:1.65;margin:0}
.ap-disclaimer{display:flex;gap:10px;padding:13px 15px;border-radius:12px;background:rgba(139,104,224,.07);color:var(--ap-muted);font-size:10px;line-height:1.65;margin-top:13px}
.ap-disclaimer i{color:#9978e5;margin-top:2px}
.ap-quick-links{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:10px}
.ap-quick-link{display:flex;align-items:center;gap:10px;min-width:0;padding:12px;border:1px solid var(--ap-line);border-radius:12px;text-decoration:none!important;color:var(--ap-ink)!important}
.ap-quick-link:hover{transform:translateY(-2px);background:rgba(139,104,224,.05)}
.ap-quick-link i{color:#9978e5;font-size:14px}.ap-quick-link strong{display:block;font-size:10px;font-weight:850}.ap-quick-link small{display:block;color:var(--ap-muted);font-size:9px;margin-top:3px}
@media(max-width:1100px){.ap-stats{grid-template-columns:repeat(2,minmax(0,1fr))}.ap-columns{grid-template-columns:minmax(0,1fr)}.ap-hero{grid-template-columns:minmax(0,1fr) 230px}}
@media(max-width:640px){.vh-portfolio{padding:18px 12px 26px}.ap-heading{align-items:flex-start;flex-direction:column;gap:10px}.ap-hero{grid-template-columns:minmax(0,1fr);padding:22px 18px}.ap-hero-art{max-width:210px;justify-self:center;margin-top:0}.ap-hero-balance{font-size:34px}.ap-stats{gap:9px}.ap-stat{padding:13px}.ap-stat-value{font-size:17px}.ap-stat-top{margin-bottom:11px}.ap-allocation{grid-template-columns:1fr;justify-items:center}.ap-legend{width:100%}.ap-panel-head{padding:16px}.ap-panel-body{padding:15px}.ap-quick-links{grid-template-columns:1fr}.ap-table th,.ap-table td{padding-left:13px;padding-right:13px}.ap-date{white-space:normal}}
@media(prefers-reduced-motion:reduce){.vh-portfolio *{transition:none!important}}
</style>

<div class="vh-portfolio">
    <header class="ap-heading">
        <div>
            <span class="ap-eyebrow">Your financial overview</span>
            <h1>Account portfolio</h1>
            <p>A clearer view of your wallet, investments and financial activity.</p>
        </div>
        <div class="ap-date"><i class="far fa-calendar-alt"></i> Updated <?php echo date('M j, Y'); ?></div>
    </header>

    <section class="ap-hero" aria-label="Wallet overview">
        <div>
            <div class="ap-hero-label"><i class="fas fa-shield-alt"></i> Available wallet balance</div>
            <div class="ap-hero-balance"><?php echo $accountMoney($accountWallet); ?></div>
            <p class="ap-hero-note">Your current wallet balance in your selected display currency. Keep funds available for planned needs and avoid investing money you may need soon.</p>
            <div class="ap-hero-actions">
                <a class="ap-btn ap-btn-primary" href="Deposit.php"><i class="fas fa-plus"></i> Add funds</a>
                <a class="ap-btn ap-btn-ghost" href="Withdrawal.php"><i class="fas fa-arrow-up"></i> Withdraw</a>
                <a class="ap-btn ap-btn-ghost" href="InvestmentPlans.php"><i class="fas fa-chart-line"></i> Explore plans</a>
            </div>
        </div>
        <div class="ap-hero-art" aria-hidden="true">
            <svg viewBox="0 0 330 220" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="177" cy="108" r="88" stroke="#fff" stroke-opacity=".10" stroke-width="1.4"/>
                <circle cx="177" cy="108" r="65" stroke="#fff" stroke-opacity=".12" stroke-width="1.4" stroke-dasharray="4 7"/>
                <path d="M35 171L82 136L120 151L164 96L202 115L254 58L294 74" stroke="#B8F4D0" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M35 171L82 136L120 151L164 96L202 115L254 58L294 74L294 190L35 190Z" fill="url(#apChartFill)" fill-opacity=".55"/>
                <circle cx="254" cy="58" r="7" fill="#B8F4D0" stroke="#fff" stroke-width="3"/>
                <rect x="102" y="28" width="112" height="70" rx="13" fill="#fff" fill-opacity=".11" stroke="#fff" stroke-opacity=".24"/>
                <path d="M119 50H151M119 60H142" stroke="#D4C8FF" stroke-width="4" stroke-linecap="round"/>
                <path d="M119 78L133 68L145 73L158 60L171 65L186 47L198 51" stroke="#B8F4D0" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                <rect x="201" y="126" width="95" height="55" rx="12" fill="#fff" fill-opacity=".12" stroke="#fff" stroke-opacity=".2"/>
                <circle cx="218" cy="144" r="4" fill="#B8F4D0"/><path d="M230 144H276" stroke="#fff" stroke-opacity=".7" stroke-width="3" stroke-linecap="round"/>
                <path d="M217 160H267" stroke="#fff" stroke-opacity=".45" stroke-width="3" stroke-linecap="round"/><path d="M217 169H250" stroke="#fff" stroke-opacity=".3" stroke-width="3" stroke-linecap="round"/>
                <defs><linearGradient id="apChartFill" x1="164" y1="58" x2="164" y2="190" gradientUnits="userSpaceOnUse"><stop stop-color="#B8F4D0" stop-opacity=".35"/><stop offset="1" stop-color="#B8F4D0" stop-opacity="0"/></linearGradient></defs>
            </svg>
        </div>
    </section>

    <section class="ap-stats" aria-label="Portfolio summary">
        <article class="ap-stat">
            <div class="ap-stat-top"><span class="ap-stat-caption">Total deposits</span><span class="ap-stat-icon green"><i class="fas fa-arrow-down"></i></span></div>
            <div class="ap-stat-value"><?php echo $accountMoney($accountDeposits); ?></div>
            <div class="ap-stat-foot"><?php echo (int)$accountDepositCount; ?> deposit records</div>
        </article>
        <article class="ap-stat">
            <div class="ap-stat-top"><span class="ap-stat-caption">Completed withdrawals</span><span class="ap-stat-icon orange"><i class="fas fa-arrow-up"></i></span></div>
            <div class="ap-stat-value"><?php echo $accountMoney($accountWithdrawals); ?></div>
            <div class="ap-stat-foot"><?php echo (int)$accountWithdrawalCount; ?> withdrawal requests recorded</div>
        </article>
        <article class="ap-stat">
            <div class="ap-stat-top"><span class="ap-stat-caption">Investment principal</span><span class="ap-stat-icon"><i class="fas fa-layer-group"></i></span></div>
            <div class="ap-stat-value"><?php echo $accountMoney($accountInvested); ?></div>
            <div class="ap-stat-foot"><?php echo (int)$accountActivePlans; ?> active · <?php echo (int)$accountCompletedPlans; ?> completed plans</div>
        </article>
        <article class="ap-stat">
            <div class="ap-stat-top"><span class="ap-stat-caption">Recorded contract ROI</span><span class="ap-stat-icon blue"><i class="fas fa-chart-line"></i></span></div>
            <div class="ap-stat-value"><?php echo $accountMoney($accountROI); ?></div>
            <div class="ap-stat-foot">Recorded across your investment contracts</div>
        </article>
    </section>

    <div class="ap-columns">
        <div>
            <section class="ap-panel">
                <div class="ap-panel-head"><div><h2>Portfolio allocation</h2><p>A snapshot based on balances recorded in your account</p></div><span class="ap-link">Overview</span></div>
                <div class="ap-panel-body">
                    <div class="ap-allocation">
                        <div class="ap-donut" role="img" aria-label="Portfolio allocation chart">
                            <div class="ap-donut-inner"><strong><?php echo $accountMoney($accountTotalAssets); ?></strong><span>Tracked assets*</span></div>
                        </div>
                        <div class="ap-legend">
                            <div>
                                <div class="ap-legend-row"><span class="ap-dot"></span><span class="ap-legend-name">Wallet balance</span><strong class="ap-legend-value"><?php echo $accountMoney($accountWallet); ?></strong></div>
                                <div class="ap-progress"><span style="width:<?php echo number_format($accountWalletShare, 2, '.', ''); ?>%"></span></div>
                            </div>
                            <div>
                                <div class="ap-legend-row"><span class="ap-dot green"></span><span class="ap-legend-name">Contract principal</span><strong class="ap-legend-value"><?php echo $accountMoney($accountInvested); ?></strong></div>
                                <div class="ap-progress green"><span style="width:<?php echo number_format($accountInvestedShare, 2, '.', ''); ?>%"></span></div>
                            </div>
                            <div>
                                <div class="ap-legend-row"><span class="ap-dot blue"></span><span class="ap-legend-name">Stock positions (recorded cost*)</span><strong class="ap-legend-value"><?php echo $accountMoney($accountStockValue); ?></strong></div>
                                <div class="ap-progress blue"><span style="width:<?php echo number_format($accountStockShare, 2, '.', ''); ?>%"></span></div>
                            </div>
                        </div>
                    </div>
                    <div class="ap-disclaimer"><i class="fas fa-info-circle"></i><span>*This is an indicative snapshot using wallet balance, contract principal and recorded stock position cost. It is not a live valuation, and categories may not represent net worth or include unrealised gains, fees or pending transactions.</span></div>
                </div>
            </section>

            <section class="ap-panel">
                <div class="ap-panel-head"><div><h2>Recent financial activity</h2><p>Your latest deposits, withdrawals and contract investments</p></div><a class="ap-link" href="Deposit.php">Deposit history <i class="fas fa-arrow-right"></i></a></div>
                <?php if (count($accountRecentActivity) > 0) { ?>
                <div class="ap-table-wrap">
                    <table class="ap-table">
                        <thead><tr><th>Activity</th><th>Date</th><th>Status</th><th>Amount</th></tr></thead>
                        <tbody>
                        <?php foreach ($accountRecentActivity as $accountActivity) {
                            $activityIcon = $accountActivity['type'] === 'Deposit' ? 'fa-arrow-down' : ($accountActivity['type'] === 'Withdrawal' ? 'fa-arrow-up' : 'fa-chart-line');
                            $activityDate = $accountActivity['date'] !== '' ? strtotime((string)$accountActivity['date']) : false;
                            $activityStatusClass = strtolower((string)$accountActivity['status']);
                            ?>
                            <tr>
                                <td><span class="ap-activity-icon"><i class="fas <?php echo $activityIcon; ?>"></i></span><span class="ap-activity-title"><?php echo $accountEscape($accountActivity['type']); ?></span><div class="ap-activity-sub"><?php echo $accountEscape($accountActivity['description']); ?></div></td>
                                <td><?php echo $activityDate ? date('M j, Y', $activityDate) : '—'; ?></td>
                                <td><span class="ap-status <?php echo $accountEscape($activityStatusClass); ?>"><?php echo $accountEscape($accountActivity['status']); ?></span></td>
                                <td class="ap-amount <?php echo $accountActivity['direction'] === 'in' ? 'in' : ($accountActivity['direction'] === 'out' ? 'out' : ''); ?>"><?php echo $accountActivity['direction'] === 'in' ? '+' : ($accountActivity['direction'] === 'out' ? '−' : ''); ?><?php echo $accountMoney($accountActivity['amount']); ?></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
                <?php } else { ?>
                <div class="ap-empty"><i class="fas fa-receipt"></i>No financial activity yet. Once you fund your wallet or start an investment, your records will appear here.</div>
                <?php } ?>
            </section>
        </div>

        <aside>
            <section class="ap-panel">
                <div class="ap-panel-head"><div><h2>Portfolio health</h2><p>Other recorded assets and earnings</p></div></div>
                <div class="ap-panel-body">
                    <div class="ap-legend">
                        <div><div class="ap-legend-row"><span class="ap-dot blue"></span><span class="ap-legend-name">Stock positions</span><strong class="ap-legend-value"><?php echo (int)$accountStockCount; ?></strong></div><div class="ap-progress blue"><span style="width:<?php echo $accountStockCount > 0 ? '100' : '0'; ?>%"></span></div></div>
                        <div><div class="ap-legend-row"><span class="ap-dot green"></span><span class="ap-legend-name">Available referral earnings</span><strong class="ap-legend-value"><?php echo $accountMoney($accountReferral); ?></strong></div><div class="ap-progress green"><span style="width:<?php echo $accountReferral > 0 ? '100' : '0'; ?>%"></span></div></div>
                    </div>
                    <div class="ap-disclaimer"><i class="fas fa-lightbulb"></i><span>Review balances and transaction statuses regularly. Referral earnings are shown separately and may not be included in your wallet balance until transferred.</span></div>
                </div>
            </section>

            <section class="ap-panel">
                <div class="ap-panel-head"><div><h2>Build a stronger portfolio</h2><p>Practical habits for long-term financial health</p></div></div>
                <div class="ap-panel-body">
                    <div class="ap-tips">
                        <article class="ap-tip"><span class="ap-tip-icon"><i class="fas fa-piggy-bank"></i></span><div><h3>Keep a cash buffer</h3><p>Set aside money for emergencies and near-term bills before committing funds to investments that may be difficult to exit quickly.</p></div></article>
                        <article class="ap-tip"><span class="ap-tip-icon"><i class="fas fa-chart-pie"></i></span><div><h3>Diversify thoughtfully</h3><p>Avoid depending on one company, asset or plan. Spread risk across suitable assets and understand what each investment can lose.</p></div></article>
                        <article class="ap-tip"><span class="ap-tip-icon"><i class="fas fa-calendar-check"></i></span><div><h3>Invest with a plan</h3><p>Choose a goal, time horizon and affordable contribution amount. Consistency can help, but returns are never guaranteed.</p></div></article>
                        <article class="ap-tip"><span class="ap-tip-icon"><i class="fas fa-search-dollar"></i></span><div><h3>Check fees and risk</h3><p>Read the terms, withdrawal rules and fees before investing. Be cautious of promises of guaranteed or unusually high returns.</p></div></article>
                    </div>
                    <div class="ap-disclaimer"><i class="fas fa-exclamation-circle"></i><span>Educational information only, not personalised financial advice. Investments can fall in value; never invest money you cannot afford to lose.</span></div>
                </div>
            </section>

            <section class="ap-panel">
                <div class="ap-panel-head"><div><h2>Quick actions</h2><p>Manage your money</p></div></div>
                <div class="ap-panel-body">
                    <div class="ap-quick-links">
                        <a class="ap-quick-link" href="Deposit.php"><i class="fas fa-plus-circle"></i><span><strong>Deposit</strong><small>Add funds</small></span></a>
                        <a class="ap-quick-link" href="Withdrawal.php"><i class="fas fa-wallet"></i><span><strong>Withdraw</strong><small>Access funds</small></span></a>
                        <a class="ap-quick-link" href="Transfer.php"><i class="fas fa-exchange-alt"></i><span><strong>Transfer</strong><small>Move money</small></span></a>
                    </div>
                </div>
            </section>
        </aside>
    </div>
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
