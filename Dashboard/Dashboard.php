<?php session_start();
if(isset($_SESSION['User_id'])){
include('Header.php');
require_once __DIR__ . '/BotSchema.php';
$dashboardBotSchemaReady = cfxm_ensure_bot_tables($Conn);
include('ProcessStock.php');
$bop="";
$Investor_id=$_SESSION['User_id'];
$sql="select * from notification where Investor_id='$Investor_id' and seen=0";
$query=mysqli_query($Conn, $sql);
$count=mysqli_num_rows($query);
while($row=mysqli_fetch_array($query, MYSQLI_ASSOC)){
$id=$row['id'];
echo "<script>
setTimeout(function(){ swal({title:'".$row['Subject']."', text:'".$row['Text']."', type:'warning'}, function(){
var id='".$id."';
window.location.href='Notification.php?id=".$id."';
}) }, 3000);
</script>";
}

  $sql="select * from stockcontracts where Investor_id='$Investor_id'";
                                    $query=mysqli_query($Conn, $sql);
                                $Count=mysqli_num_rows($query);
                                    while($row=mysqli_fetch_array($query, MYSQLI_ASSOC)){
        $id=$row['id'];
        $dayToLoad=$row['dayToLoad'];
        $Spread=$row['Spread'];
        
        $newSpread=$Spread+=0.0001;
        if($dayToLoad!=$date){
            $updateDate="update stock set dayToLoad='$date', Spread='$newSpread' where id='$id'";
            $checkUpdate=mysqli_query($Conn, $updateDate);
        }
        
        
    }
    
    
      $sqlContracts="select * from stockcontracts where Investor_id='$Investor_id'";
    $querystockContracts=mysqli_query($Conn, $sqlContracts);
        $querystockContractsTwo=mysqli_query($Conn, $sqlContracts);

    $CountInvested=mysqli_num_rows( $querystockContractsTwo);
    while($roww=mysqli_fetch_array($querystockContracts, MYSQLI_ASSOC)){
         $Equitee=number_format($roww['Buy_Price']*$roww['Margin']*$roww['Total_Units'], 2, '.',',');
        $StockEarning+=$Equitee;
    }

    // Modern dashboard summaries: read-only aggregates from existing investor records.
    $dashboardTotalInvested = 0;
    $dashboardTotalROI = 0;
    $dashboardActiveCount = 0;
    $dashboardCompletedCount = 0;
    $dashboardTimeline = array();
    $dashboardHistoryQuery = mysqli_query($Conn, "SELECT Plan_Type, Amount, ROI, Date_Entered, Status FROM contracts WHERE Investor_id='$Investor_id' AND Status IN (1,2) ORDER BY Date_Entered ASC");
    if ($dashboardHistoryQuery) {
        while ($dashboardRow = mysqli_fetch_assoc($dashboardHistoryQuery)) {
            $dashboardAmount = (float)$dashboardRow['Amount'];
            $dashboardROI = (float)$dashboardRow['ROI'];
            $dashboardDate = (string)$dashboardRow['Date_Entered'];
            $dashboardStatus = (int)$dashboardRow['Status'];
            $dashboardTotalInvested += $dashboardAmount;
            $dashboardTotalROI += $dashboardROI;
            if ($dashboardStatus === 1) { $dashboardActiveCount++; }
            if ($dashboardStatus === 2) { $dashboardCompletedCount++; }
            if ($dashboardDate !== '') {
                if (!isset($dashboardTimeline[$dashboardDate])) { $dashboardTimeline[$dashboardDate] = 0; }
                $dashboardTimeline[$dashboardDate] += $dashboardAmount;
            }
        }
    }
    $dashboardTimelineLabels = array();
    $dashboardTimelineValues = array();
    $dashboardRunningTotal = 0;
    foreach ($dashboardTimeline as $dashboardDate => $dashboardDailyAmount) {
        $dashboardRunningTotal += $dashboardDailyAmount;
        $dashboardTimelineLabels[] = date('d M Y', strtotime($dashboardDate));
        $dashboardTimelineValues[] = round($dashboardRunningTotal * (float)$exchangerate, 2);
    }
    $dashboardTotalInvestedDisplay = $dashboardTotalInvested * (float)$exchangerate;
    $dashboardTotalROIDisplay = $dashboardTotalROI * (float)$exchangerate;
    $dashboardWalletDisplay = (float)$userDetails['Fin_Asset'] * (float)$exchangerate;

    // Match the referral page: only available (Status = 1) referral earnings count here.
    $dashboardReferralEarnings = 0;
    $dashboardReferralQuery = mysqli_query($Conn, "SELECT Refferal_Earnings FROM refferals WHERE Refferer='$Investor_id' AND Status='1'");
    if ($dashboardReferralQuery) {
        while ($dashboardReferralRow = mysqli_fetch_assoc($dashboardReferralQuery)) {
            $dashboardReferralEarnings += (float)$dashboardReferralRow['Refferal_Earnings'];
        }
    }
    $dashboardReferralEarningsDisplay = $dashboardReferralEarnings * (float)$exchangerate;

    // Bot overview includes purchased plans and posted simulated mining earnings.
    $dashboardBotCount = 0;
    $dashboardActiveBotCount = 0;
    $dashboardBotCapital = 0.0;
    $dashboardBotPnl = 0.0;
    $dashboardBotSimulatedEarnings = 0.0;
    $dashboardBotQuery = $dashboardBotSchemaReady ? mysqli_prepare($Conn, "SELECT COUNT(*) AS bot_count, COALESCE(SUM(CASE WHEN status='active' AND mining_status='active' THEN 1 ELSE 0 END),0) AS active_count, COALESCE(SUM(capital),0) AS capital_total, COALESCE(SUM(total_earned),0) AS simulated_earnings FROM user_trading_bots WHERE investor_id=?") : false;
    if ($dashboardBotQuery) {
        mysqli_stmt_bind_param($dashboardBotQuery, 's', $Investor_id);
        if (mysqli_stmt_execute($dashboardBotQuery)) {
            $dashboardBotResult = mysqli_stmt_get_result($dashboardBotQuery);
            if ($dashboardBotResult && ($dashboardBotRow = mysqli_fetch_assoc($dashboardBotResult))) {
                $dashboardBotCount = (int)$dashboardBotRow['bot_count'];
                $dashboardActiveBotCount = (int)$dashboardBotRow['active_count'];
                $dashboardBotCapital = (float)$dashboardBotRow['capital_total'];
                $dashboardBotSimulatedEarnings = (float)$dashboardBotRow['simulated_earnings'];
            }
        }
        mysqli_stmt_close($dashboardBotQuery);
    }
    $dashboardBotLedgerQuery = $dashboardBotSchemaReady ? mysqli_prepare($Conn, "SELECT COALESCE(SUM(CASE WHEN entry_type='realized_profit' THEN amount WHEN entry_type='realized_loss' THEN amount ELSE 0 END),0) AS realized_net FROM trading_bot_ledger WHERE investor_id=?") : false;
    if ($dashboardBotLedgerQuery) {
        mysqli_stmt_bind_param($dashboardBotLedgerQuery, 's', $Investor_id);
        if (mysqli_stmt_execute($dashboardBotLedgerQuery)) {
            $dashboardBotLedgerResult = mysqli_stmt_get_result($dashboardBotLedgerQuery);
            if ($dashboardBotLedgerResult && ($dashboardBotLedgerRow = mysqli_fetch_assoc($dashboardBotLedgerResult))) {
                $dashboardBotPnl = (float)$dashboardBotLedgerRow['realized_net'];
            }
        }
        mysqli_stmt_close($dashboardBotLedgerQuery);
    }
    $dashboardMyBots = array();
    if ($dashboardBotSchemaReady) {
        $dashboardMyBotsQuery = mysqli_prepare($Conn, "SELECT id, plan_name, strategy, capital, status, mining_status, daily_rate_percent, total_earned, due_at, created_at FROM user_trading_bots WHERE investor_id=? ORDER BY id DESC LIMIT 5");
        if ($dashboardMyBotsQuery) {
            mysqli_stmt_bind_param($dashboardMyBotsQuery, 's', $Investor_id);
            if (mysqli_stmt_execute($dashboardMyBotsQuery)) {
                $dashboardMyBotsResult = mysqli_stmt_get_result($dashboardMyBotsQuery);
                if ($dashboardMyBotsResult) {
                    while ($dashboardMyBotsRow = mysqli_fetch_assoc($dashboardMyBotsResult)) {
                        $dashboardMyBots[] = $dashboardMyBotsRow;
                    }
                }
            }
            mysqli_stmt_close($dashboardMyBotsQuery);
        }
    }
    $dashboardBotCapitalDisplay = $dashboardBotCapital * (float)$exchangerate;
    $dashboardBotPnlDisplay = $dashboardBotPnl * (float)$exchangerate;
    $dashboardBotSimulatedEarningsDisplay = $dashboardBotSimulatedEarnings * (float)$exchangerate;

    // Tesla cards link to the real TSLA entry in the existing stock catalogue.
    // Vehicle cards are visual entry points to Tesla Inc. shares, not claims of vehicle ownership.
    $teslaStock = null;
    $teslaStockQuery = mysqli_query($Conn, "SELECT * FROM stock WHERE CompanyName LIKE '%Tesla%' OR tradingview LIKE '%TSLA%' ORDER BY CASE WHEN tradingview LIKE '%TSLA%' THEN 0 ELSE 1 END, id ASC LIMIT 1");
    if ($teslaStockQuery && mysqli_num_rows($teslaStockQuery) > 0) {
        $teslaStock = mysqli_fetch_assoc($teslaStockQuery);
    }


?>
<style>
    .vh-featured-company-card .vh-investment-company-art{position:relative;display:flex;align-items:center;justify-content:center;gap:13px;overflow:hidden;padding:18px;min-height:150px}
    .vh-featured-company-card .vh-company-brand-mark{position:relative;z-index:1;display:grid;place-items:center;width:64px;height:64px;border-radius:18px;background:rgba(255,255,255,.94);color:#20242b;font-size:37px;font-weight:900;box-shadow:0 10px 30px rgba(0,0,0,.18)}
    .vh-featured-company-card .vh-company-brand-name{position:relative;z-index:1;color:#fff;font-size:clamp(15px,1.7vw,22px);font-weight:850;letter-spacing:-.04em;text-shadow:0 2px 12px rgba(0,0,0,.3)}
    .vh-featured-company-card .vh-company-orbit{position:absolute;right:-28px;bottom:-70px;width:190px;height:190px;border:1px solid rgba(255,255,255,.25);border-radius:50%}
    .vh-company-art-netflix{background:radial-gradient(circle at 75% 20%,rgba(255,255,255,.18),transparent 30%),linear-gradient(130deg,#171717,#b20710)!important}
    .vh-company-art-netflix .vh-company-brand-mark{background:#e50914;color:#fff;border-radius:12px}
    .vh-company-art-dell{background:linear-gradient(130deg,#052e5c,#0872ce)!important}
    .vh-company-art-dell .vh-company-brand-mark{color:#0872ce}
    .vh-company-art-microsoft{background:linear-gradient(130deg,#263746,#526779)!important}
    .vh-company-art-microsoft .vh-company-brand-mark{color:#f35325}
    .vh-company-art-spacex{background:linear-gradient(130deg,#05090e,#273849)!important}
    .vh-company-art-spacex .vh-company-brand-mark{background:#111820;color:#fff}
    .vh-company-art-magnet{background:linear-gradient(130deg,#42205f,#9861c7)!important}
    .vh-company-art-magnet .vh-company-brand-mark{background:#f3e8ff;color:#6b21a8;font-size:31px}
    .vh-company-art-amazon{background:linear-gradient(130deg,#111827,#34404e)!important}
    .vh-company-art-amazon .vh-company-brand-mark{background:#111827;color:#ffb84d}
    @media(max-width:600px){.vh-featured-company-card .vh-investment-company-art{min-height:124px}.vh-featured-company-card .vh-company-brand-mark{width:52px;height:52px;font-size:29px}.vh-featured-company-card .vh-company-brand-name{font-size:16px}}
    .card-dark{
        background: var(--card-bg);
        color: #fff;
    }
    

    .stat-text{
        color: white;
    }
</style>
        <!-- Smartsupp Live Chat script -->
<script type="text/javascript">
var _smartsupp = _smartsupp || {};
_smartsupp.key = 'ef6f82415710cac56d41d1feaba4bdb8661afea3';
window.smartsupp||(function(d) {
  var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
  s=d.getElementsByTagName('script')[0];c=d.createElement('script');
  c.type='text/javascript';c.charset='utf-8';c.async=true;
  c.src='https://www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
})(document);
</script>
<noscript>Powered by <a href="https://www.smartsupp.com" target="_blank">Smartsupp</a></noscript>
   
<section class="vh-dashboard">
    <div class="vh-dashboard-heading">
        <div>
            <span class="vh-eyebrow">INVESTOR OVERVIEW</span>
            <h1>Welcome back, <?php echo htmlspecialchars($userDetails['First_Name'] ?? 'Investor', ENT_QUOTES, 'UTF-8'); ?></h1>
        </div>
    </div>

    <div class="vh-hero-grid">
        <div class="vh-balance-card">
            <div class="vh-balance-top">
                <span>Total wallet balance</span>
                <span class="vh-balance-icon"><i class="fas fa-wallet"></i></span>
            </div>
            <div class="vh-balance-amount"><?php echo htmlspecialchars($curAbbr, ENT_QUOTES, 'UTF-8') . number_format($dashboardWalletDisplay, 2, '.', ','); ?></div>
            <div class="vh-balance-caption">Available account balance</div>
            <div class="vh-quick-actions">
                <a href="Deposit.php"><i class="fas fa-plus"></i> Deposit</a>
                <a href="Withdrawal.php"><i class="fas fa-arrow-up"></i> Withdraw</a>
                <a href="Transfer.php"><i class="fas fa-exchange-alt"></i> Transfer</a>
            </div>
        </div>
        <div class="vh-stat-card">
            <span class="vh-stat-icon vh-icon-teal"><i class="fas fa-chart-line"></i></span>
            <span class="vh-stat-label">Total invested</span>
            <strong><?php echo htmlspecialchars($curAbbr, ENT_QUOTES, 'UTF-8') . number_format($dashboardTotalInvestedDisplay, 2, '.', ','); ?></strong>
            <small>Across recorded investments</small>
        </div>
        <div class="vh-stat-card">
            <span class="vh-stat-icon vh-icon-green"><i class="fas fa-coins"></i></span>
            <span class="vh-stat-label">Recorded ROI</span>
            <strong><?php echo htmlspecialchars($curAbbr, ENT_QUOTES, 'UTF-8') . number_format($dashboardTotalROIDisplay, 2, '.', ','); ?></strong>
            <small>ROI values from your contracts</small>
        </div>
        <div class="vh-stat-card">
            <span class="vh-stat-icon vh-icon-purple"><i class="fas fa-layer-group"></i></span>
            <span class="vh-stat-label">Active investments</span>
            <strong><?php echo number_format($dashboardActiveCount); ?></strong>
            <small><?php echo number_format($dashboardCompletedCount); ?> completed</small>
        </div>
        <div class="vh-stat-card">
            <span class="vh-stat-icon vh-icon-referral"><i class="fas fa-share-alt"></i></span>
            <span class="vh-stat-label">Referral earnings</span>
            <strong><?php echo htmlspecialchars($curAbbr, ENT_QUOTES, 'UTF-8') . number_format($dashboardReferralEarningsDisplay, 2, '.', ','); ?></strong>
            <small>Available referral rewards</small>
        </div>
    </div>

    <section class="cfxm-dashboard-bots" aria-labelledby="cfxmDashboardBotsTitle">
        <div class="cfxm-dashboard-bots-head">
            <div><span class="cfxm-dashboard-bots-eyebrow">AUTOMATION OVERVIEW</span><h2 id="cfxmDashboardBotsTitle">AI trading bots</h2><p>Seven-day simulated mining activity, posted earnings, and expiry tracking.</p></div>
            <a href="BotPlans.php">Manage bots <i class="fas fa-arrow-right" aria-hidden="true"></i></a>
        </div>
        <div class="cfxm-dashboard-bots-grid">
            <article class="cfxm-dashboard-bot-stat"><span class="cfxm-dashboard-bot-icon"><i class="fas fa-robot" aria-hidden="true"></i></span><span class="cfxm-dashboard-bot-label">Bots acquired</span><strong><?php echo number_format($dashboardBotCount); ?></strong><small><?php echo number_format($dashboardActiveBotCount); ?> currently mining · <?php echo number_format(max(0, $dashboardBotCount - $dashboardActiveBotCount)); ?> completed or inactive</small></article>
            <article class="cfxm-dashboard-bot-stat"><span class="cfxm-dashboard-bot-icon"><i class="fas fa-layer-group" aria-hidden="true"></i></span><span class="cfxm-dashboard-bot-label">Bot plan capital</span><strong><?php echo htmlspecialchars($curAbbr, ENT_QUOTES, 'UTF-8') . number_format($dashboardBotCapitalDisplay, 2, '.', ','); ?></strong><small>Total recorded capital across acquired plans</small></article>
            <article class="cfxm-dashboard-bot-stat"><span class="cfxm-dashboard-bot-icon"><i class="fas fa-coins" aria-hidden="true"></i></span><span class="cfxm-dashboard-bot-label">Simulated earnings</span><strong class="is-profit"><?php echo htmlspecialchars($curAbbr, ENT_QUOTES, 'UTF-8') . number_format($dashboardBotSimulatedEarningsDisplay, 2, '.', ','); ?></strong><small>Credits already posted to Fin_Asset</small></article>
        </div>
        <div class="cfxm-dashboard-bot-list">
            <div class="cfxm-dashboard-bot-list-head"><h3>Your bot plans</h3><span><?php echo number_format(count($dashboardMyBots)); ?> recorded</span></div>
            <?php if (count($dashboardMyBots) > 0): ?>
            <div class="cfxm-dashboard-bot-table-wrap"><table class="cfxm-dashboard-bot-table"><thead><tr><th>Bot plan</th><th>Capital</th><th>Daily rate</th><th>Earned</th><th>Mining status</th><th>Expires</th></tr></thead><tbody>
            <?php foreach ($dashboardMyBots as $dashboardMyBot): ?>
            <tr><td><strong><?php echo htmlspecialchars($dashboardMyBot['plan_name'], ENT_QUOTES, 'UTF-8'); ?></strong><small><?php echo htmlspecialchars($dashboardMyBot['strategy'], ENT_QUOTES, 'UTF-8'); ?></small></td><td><?php echo htmlspecialchars($curAbbr, ENT_QUOTES, 'UTF-8') . number_format(((float)$dashboardMyBot['capital']) * (float)$exchangerate, 2, '.', ','); ?></td><td><?php echo number_format((float)$dashboardMyBot['daily_rate_percent'], 4); ?>%</td><td><?php echo htmlspecialchars($curAbbr, ENT_QUOTES, 'UTF-8') . number_format(((float)$dashboardMyBot['total_earned']) * (float)$exchangerate, 2, '.', ','); ?></td><td><span class="cfxm-dashboard-bot-status status-<?php echo htmlspecialchars($dashboardMyBot['mining_status'], ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars(ucfirst($dashboardMyBot['mining_status']), ENT_QUOTES, 'UTF-8'); ?></span></td><td><?php echo htmlspecialchars($dashboardMyBot['due_at'] ? date('d M Y H:i', strtotime($dashboardMyBot['due_at'])) : '—', ENT_QUOTES, 'UTF-8'); ?></td></tr>
            <?php endforeach; ?>
            </tbody></table></div>
            <?php else: ?>
            <div class="cfxm-dashboard-bot-empty"><i class="fas fa-robot" aria-hidden="true"></i><div><strong>No bot plans yet</strong><p>Choose an AI trading profile to see your acquired plan and its activation status here.</p></div><a href="BotPlans.php">Explore bots <i class="fas fa-arrow-right" aria-hidden="true"></i></a></div>
            <?php endif; ?>
        </div>
        <?php if ($dashboardBotCount > 0 && $dashboardActiveBotCount === 0): ?><p class="cfxm-dashboard-bot-notice"><i class="fas fa-info-circle" aria-hidden="true"></i> No bots are currently mining. Completed bots stop accruing simulated earnings after their seven-day expiry.</p><?php endif; ?>
    </section>
    <style>
      .cfxm-dashboard-bot-list{margin-top:18px;padding-top:17px;border-top:1px solid var(--cfxm-line,rgba(130,145,160,.16))}.cfxm-dashboard-bot-list-head{display:flex;justify-content:space-between;align-items:center;gap:12px;margin-bottom:10px}.cfxm-dashboard-bot-list-head h3{margin:0;font-size:15px;font-weight:850;color:inherit}.cfxm-dashboard-bot-list-head>span{font-size:10px;color:var(--cfxm-muted,var(--liner-text-color,#75808c))}.cfxm-dashboard-bot-table-wrap{overflow:auto;border:1px solid var(--cfxm-line,rgba(130,145,160,.16));border-radius:12px}.cfxm-dashboard-bot-table{width:100%;border-collapse:collapse;min-width:760px}.cfxm-dashboard-bot-table th,.cfxm-dashboard-bot-table td{padding:11px 12px;text-align:left;border-bottom:1px solid var(--cfxm-line,rgba(130,145,160,.12));font-size:11px}.cfxm-dashboard-bot-table th{font-size:9px;text-transform:uppercase;letter-spacing:.08em;color:var(--cfxm-muted,var(--liner-text-color,#75808c))}.cfxm-dashboard-bot-table td strong,.cfxm-dashboard-bot-table td small{display:block}.cfxm-dashboard-bot-table td small{margin-top:3px;font-size:10px;color:var(--cfxm-muted,var(--liner-text-color,#75808c))}.cfxm-dashboard-bot-status{display:inline-block;padding:5px 8px;border-radius:999px;background:rgba(217,119,6,.12);color:#b97708;font-size:9px;font-weight:800;text-transform:capitalize}.cfxm-dashboard-bot-status.status-active{background:rgba(22,155,105,.12);color:#169b69}.cfxm-dashboard-bot-status.status-paused{background:rgba(100,116,139,.14);color:#64748b}.cfxm-dashboard-bot-status.status-closed{background:rgba(220,69,69,.12);color:#dc4545}.cfxm-dashboard-bot-empty{display:flex;align-items:center;gap:12px;padding:15px;border:1px dashed var(--cfxm-line,rgba(130,145,160,.25));border-radius:13px}.cfxm-dashboard-bot-empty>i{display:grid;place-items:center;flex:0 0 38px;height:38px;border-radius:11px;background:rgba(139,91,209,.13);color:#8b5bd1;font-size:17px}.cfxm-dashboard-bot-empty>div{flex:1;min-width:0}.cfxm-dashboard-bot-empty strong{font-size:12px}.cfxm-dashboard-bot-empty p{margin:4px 0 0;font-size:10px;line-height:1.6;color:var(--cfxm-muted,var(--liner-text-color,#75808c))}.cfxm-dashboard-bot-empty>a{white-space:nowrap;color:#8b5bd1;font-size:11px;font-weight:800;text-decoration:none}@media(max-width:560px){.cfxm-dashboard-bot-empty{align-items:flex-start;flex-wrap:wrap}.cfxm-dashboard-bot-empty>a{margin-left:50px}}
      .cfxm-dashboard-bots{margin:24px 0 30px;padding:clamp(17px,2.6vw,26px);border:1px solid var(--cfxm-line,rgba(130,145,160,.2));border-radius:20px;background:var(--cfxm-surface,var(--card-bg,#fff));color:var(--cfxm-text,var(--text-color,#202438))}
      .cfxm-dashboard-bots *{box-sizing:border-box}.cfxm-dashboard-bots-head{display:flex;align-items:flex-end;justify-content:space-between;gap:14px;margin-bottom:18px}.cfxm-dashboard-bots-eyebrow{font-size:10px;font-weight:850;letter-spacing:.15em;color:#8b5bd1}.cfxm-dashboard-bots-head h2{margin:6px 0;font-size:22px;font-weight:850;color:inherit}.cfxm-dashboard-bots-head p{margin:0;font-size:12px;line-height:1.6;color:var(--cfxm-muted,var(--liner-text-color,#75808c))}.cfxm-dashboard-bots-head>a{white-space:nowrap;color:#8b5bd1;font-size:12px;font-weight:800;text-decoration:none}.cfxm-dashboard-bots-grid{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:13px}.cfxm-dashboard-bot-stat{min-width:0;padding:16px;border:1px solid var(--cfxm-line,rgba(130,145,160,.16));border-radius:15px;background:var(--cfxm-bg,var(--body-bg,#f8f9fc))}.cfxm-dashboard-bot-icon{display:grid;place-items:center;width:35px;height:35px;margin-bottom:12px;border-radius:11px;background:rgba(139,91,209,.13);color:#8b5bd1}.cfxm-dashboard-bot-label{display:block;font-size:11px;color:var(--cfxm-muted,var(--liner-text-color,#75808c))}.cfxm-dashboard-bot-stat strong{display:block;overflow-wrap:anywhere;margin:6px 0;font-size:clamp(19px,2vw,25px);font-weight:850;letter-spacing:-.035em;color:inherit}.cfxm-dashboard-bot-stat strong.is-profit{color:#169b69}.cfxm-dashboard-bot-stat strong.is-loss{color:#dc4545}.cfxm-dashboard-bot-stat small{display:block;font-size:10px;line-height:1.55;color:var(--cfxm-muted,var(--liner-text-color,#75808c))}.cfxm-dashboard-bot-notice{display:flex;gap:8px;margin:14px 0 0;padding:12px;border-radius:11px;background:rgba(217,119,6,.08);font-size:11px;line-height:1.6;color:var(--cfxm-muted,var(--liner-text-color,#75808c))}.cfxm-dashboard-bot-notice i{color:#d97706;margin-top:2px}@media(max-width:720px){.cfxm-dashboard-bots-grid{grid-template-columns:1fr}.cfxm-dashboard-bot-stat{display:grid;grid-template-columns:36px 1fr;column-gap:12px;align-items:center}.cfxm-dashboard-bot-icon{grid-row:1/4;margin:0}.cfxm-dashboard-bot-label,.cfxm-dashboard-bot-stat strong,.cfxm-dashboard-bot-stat small{grid-column:2}.cfxm-dashboard-bots-head{align-items:flex-start;flex-direction:column}}
    </style>

    <section class="vh-investment-catalog" aria-labelledby="vhTeslaHeading">
        <div class="vh-investment-catalog-head">
            <div>
                <span class="vh-eyebrow">FEATURED OPPORTUNITY</span>
                <h2 id="vhTeslaHeading">Explore the market</h2>
                <p>Discover Tesla and six featured companies, each with its own investment card.</p>
            </div>
            <div class="vh-carousel-controls" aria-label="Featured investment carousel controls">
                <button type="button" class="vh-carousel-btn" id="vhTeslaPrev" aria-label="Scroll featured investments left"><i class="fas fa-chevron-left"></i></button>
                <button type="button" class="vh-carousel-btn" id="vhTeslaNext" aria-label="Scroll featured investments right"><i class="fas fa-chevron-right"></i></button>
            </div>
        </div>
        <div class="vh-investment-track" id="vhTeslaTrack" tabindex="0" role="region" aria-label="Featured company investment cards. Scroll horizontally to view more">
            <article class="vh-investment-card vh-investment-company-card">
                <div class="vh-investment-company-art" aria-hidden="true"><span class="vh-tesla-mark">T</span><span class="vh-company-orbit"></span></div>
                <div class="vh-investment-card-body">
                    <div class="vh-investment-card-meta"><span class="vh-asset-pill">EQUITY</span><span class="vh-asset-symbol">TSLA</span></div>
                    <h3>Tesla, Inc.</h3>
                    <p>Explore an investment linked to Tesla Inc. shares.</p>
                    <?php if ($teslaStock): ?>
                    <a class="vh-invest-now" href="Stock_Market.php?Stock_id=<?php echo (int)$teslaStock['id']; ?>&amp;Type=Stock&amp;Min=<?php echo rawurlencode((string)$teslaStock['Unit']); ?>&amp;Vehicle=company">Invest now <i class="fas fa-arrow-right"></i></a>
                    <?php else: ?>
                    <button class="vh-invest-now is-disabled" type="button" disabled title="Tesla must be configured in the stock catalogue first">Trading coming soon</button>
                    <?php endif; ?>
                </div>
            </article>
            <?php
            // Each company gets a separate card and is matched to the configured stock catalogue.
            $featuredCompanies = array(
                array('name' => 'Netflix', 'symbol' => 'NFLX', 'mark' => 'N', 'class' => 'netflix', 'category' => 'ENTERTAINMENT', 'description' => 'Explore Netflix and its global streaming entertainment business.', 'match' => array('Netflix', 'NFLX')),
                array('name' => 'Dell Technologies', 'symbol' => 'DELL', 'mark' => 'D', 'class' => 'dell', 'category' => 'TECHNOLOGY', 'description' => 'Explore Dell Technologies and its computer and infrastructure portfolio.', 'match' => array('Dell', 'DELL')),
                array('name' => 'Microsoft', 'symbol' => 'MSFT', 'mark' => 'M', 'class' => 'microsoft', 'category' => 'TECHNOLOGY', 'description' => 'Explore Microsoft’s software, cloud and productivity ecosystem.', 'match' => array('Microsoft', 'MSFT')),
                array('name' => 'SpaceX', 'symbol' => 'PRIVATE', 'mark' => 'X', 'class' => 'spacex', 'category' => 'AEROSPACE', 'description' => 'SpaceX is privately held; any available offering must be explicitly configured.', 'match' => array('SpaceX', 'SPACEX')),
                array('name' => 'Magnet 🧲', 'symbol' => 'MAGNET', 'mark' => '🧲', 'class' => 'magnet', 'category' => 'MARKET OPPORTUNITY', 'description' => 'Review the Magnet opportunity when its listing is configured in the catalogue.', 'match' => array('Magnet', 'MAGNET')),
                array('name' => 'Amazon', 'symbol' => 'AMZN', 'mark' => 'a', 'class' => 'amazon', 'category' => 'CONSUMER & CLOUD', 'description' => 'Explore Amazon’s e-commerce, logistics and cloud businesses.', 'match' => array('Amazon', 'AMZN'))
            );
            foreach ($featuredCompanies as &$company) {
                $company['stock'] = null;
                $stockConditions = array();
                foreach ($company['match'] as $term) {
                    $safeTerm = mysqli_real_escape_string($Conn, $term);
                    $stockConditions[] = "CompanyName LIKE '%" . $safeTerm . "%'";
                    $stockConditions[] = "tradingview LIKE '%" . $safeTerm . "%'";
                }
                $companyQuery = mysqli_query($Conn, "SELECT * FROM stock WHERE " . implode(' OR ', $stockConditions) . " ORDER BY id ASC LIMIT 1");
                if ($companyQuery && mysqli_num_rows($companyQuery) > 0) {
                    $company['stock'] = mysqli_fetch_assoc($companyQuery);
                }
            }
            unset($company);
            foreach ($featuredCompanies as $company):
                $companyStock = $company['stock'];
            ?>
            <article class="vh-investment-card vh-investment-company-card vh-featured-company-card">
                <div class="vh-investment-company-art vh-company-art-<?php echo htmlspecialchars($company['class'], ENT_QUOTES, 'UTF-8'); ?>" aria-hidden="true">
                    <span class="vh-company-brand-mark"><?php echo htmlspecialchars($company['mark'], ENT_QUOTES, 'UTF-8'); ?></span>
                    <span class="vh-company-orbit"></span>
                    <span class="vh-company-brand-name"><?php echo htmlspecialchars($company['name'], ENT_QUOTES, 'UTF-8'); ?></span>
                </div>
                <div class="vh-investment-card-body">
                    <div class="vh-investment-card-meta"><span class="vh-asset-pill"><?php echo htmlspecialchars($company['category'], ENT_QUOTES, 'UTF-8'); ?></span><span class="vh-asset-symbol"><?php echo htmlspecialchars($company['symbol'], ENT_QUOTES, 'UTF-8'); ?></span></div>
                    <h3><?php echo htmlspecialchars($company['name'], ENT_QUOTES, 'UTF-8'); ?></h3>
                    <p><?php echo htmlspecialchars($company['description'], ENT_QUOTES, 'UTF-8'); ?></p>
                    <?php if ($companyStock): ?>
                    <a class="vh-invest-now" href="Stock_Market.php?Stock_id=<?php echo (int)$companyStock['id']; ?>&amp;Type=Stock&amp;Min=<?php echo rawurlencode((string)$companyStock['Unit']); ?>&amp;Vehicle=company">Invest now <i class="fas fa-arrow-right"></i></a>
                    <?php else: ?>
                    <a class="vh-invest-now" href="Stock_Market.php?Company=<?php echo rawurlencode((string)$company['name']); ?>&amp;Symbol=<?php echo rawurlencode((string)$company['symbol']); ?>&amp;Vehicle=company">Invest now <i class="fas fa-arrow-right"></i></a>
                    <?php endif; ?>
                </div>
            </article>
            <?php endforeach; ?>
        </div>
        <p class="vh-investment-disclaimer"><i class="fas fa-info-circle" aria-hidden="true"></i> Each card links to the matching configured stock catalogue entry. SpaceX is privately held, and Magnet needs a clearly defined listing. A company card alone does not mean CFXM Pro holds shares in that company.</p>
    </section>
    <script>
    (function () {
        const track = document.getElementById('vhTeslaTrack');
        if (!track || track.dataset.ready) return;
        track.dataset.ready = '1';
        const scrollByCard = direction => {
            const card = track.querySelector('.vh-investment-card');
            track.scrollBy({ left: direction * ((card ? card.getBoundingClientRect().width : 280) + 16), behavior: 'smooth' });
        };
        document.getElementById('vhTeslaPrev')?.addEventListener('click', () => scrollByCard(-1));
        document.getElementById('vhTeslaNext')?.addEventListener('click', () => scrollByCard(1));
    })();
    </script>

    <?php include __DIR__ . '/cryptocurrency.php'; ?>

    <div class="vh-chart-grid">
        <section class="vh-panel vh-performance-panel">
            <div class="vh-panel-heading">
                <div><h2>Investment activity</h2></div>
                <span class="vh-chart-badge"><i class="fas fa-wave-square"></i> Contract history</span>
            </div>
           
            <div class="vh-chart-empty" id="vhPerformanceEmpty" <?php echo count($dashboardTimelineLabels) ? 'hidden' : ''; ?>>
                <i class="fas fa-chart-area"></i><strong>No investment yet</strong><span>Your investment activity will appear here after you make your first investment.</span>
            </div>
        </section>
    </div>

    <?php include __DIR__ . '/stock-marquee.php'; ?>

    <script type="application/json" id="vhDashboardChartData"><?php
        echo json_encode(array(
            'currency' => $curAbbr,
            'timelineLabels' => $dashboardTimelineLabels,
            'timelineValues' => $dashboardTimelineValues,
        ), JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT);
    ?></script>
</section>
                <div class="row">
                    <div class="card">
                        <div class="card-body"  style="display: flex; justify-content: center; gap: 10px; align-items: center; padding: 20px">
                            <?php if($userDetails['V_Status']>0){
                                echo "<img src='https://static.vecteezy.com/system/resources/thumbnails/049/232/596/small/verified-badge-blue-color-for-social-media-account-png.png' style='width: 40px'/> <h4 style='color: var(--liner-text-color)'> Account Verified</h4>";
                            }else{
                            echo "<a href='btn btn-lignt' style='font-size: 12pt'>Verify Account</a>";

                            }
                            
                            ?>
                        </div>
                    </div>
                </div>

                <!-- AI trading bot plans appear immediately after the account verification status. -->
                <section class="cfxm-bot-preview" aria-labelledby="cfxmBotPreviewTitle">
                    <div class="cfxm-bot-preview-head">
                        <div><span>AI-POWERED STRATEGIES</span><h2 id="cfxmBotPreviewTitle">Explore AI trading bots</h2><p>Five strategy profiles with different market capacities. Start at $2,000.</p></div>
                        <a href="BotPlans.php">View all bots <i class="fas fa-arrow-right"></i></a>
                    </div>
                    <div class="cfxm-bot-preview-track" aria-label="AI trading bot plan preview">
                        <a class="cfxm-bot-preview-card" href="BotPlans.php"><img src="assets/bots/scout.svg" alt="" loading="lazy"><span>AI Scout</span><strong>$2,000</strong><small>3 markets · Trend signals</small></a>
                        <a class="cfxm-bot-preview-card" href="BotPlans.php"><img src="assets/bots/momentum.svg" alt="" loading="lazy"><span>Momentum AI</span><strong>$5,000</strong><small>8 markets · Breakouts</small></a>
                        <a class="cfxm-bot-preview-card" href="BotPlans.php"><img src="assets/bots/quant.svg" alt="" loading="lazy"><span>Quant Matrix</span><strong>$10,000</strong><small>15 markets · Quant signals</small></a>
                        <a class="cfxm-bot-preview-card" href="BotPlans.php"><img src="assets/bots/neural.svg" alt="" loading="lazy"><span>Neural Trader</span><strong>$25,000</strong><small>25 markets · AI ensemble</small></a>
                        <a class="cfxm-bot-preview-card" href="BotPlans.php"><img src="assets/bots/apex.svg" alt="" loading="lazy"><span>Apex Autonomous</span><strong>$50,000</strong><small>40 markets · Adaptive profile</small></a>
                    </div>
                    <p class="cfxm-bot-preview-note"><i class="fas fa-info-circle"></i> Bot acquisition does not guarantee returns. Earnings can only be reflected after actual trades are executed and realized results are reconciled.</p>
                </section>
                <style>
                    .cfxm-bot-preview{margin:24px 0 30px;padding:20px;border:1px solid var(--cfxm-line,rgba(130,145,160,.18));border-radius:20px;background:var(--cfxm-surface,var(--card-bg,#fff));color:var(--cfxm-text,var(--text-color,#202438))}
                    .cfxm-bot-preview-head{display:flex;align-items:flex-end;justify-content:space-between;gap:14px;margin-bottom:16px}
                    .cfxm-bot-preview-head span{font-size:9px;font-weight:850;letter-spacing:.15em;color:#9a73df}
                    .cfxm-bot-preview-head h2{margin:6px 0;font-size:21px;font-weight:850;color:inherit}
                    .cfxm-bot-preview-head p{margin:0;font-size:12px;line-height:1.6;color:var(--cfxm-muted,var(--liner-text-color,#75808c))}
                    .cfxm-bot-preview-head>a{white-space:nowrap;color:#9a73df;font-size:12px;font-weight:800;text-decoration:none}
                    .cfxm-bot-preview-track{display:flex;gap:13px;overflow-x:auto;padding:2px 2px 12px;scroll-snap-type:x mandatory}
                    .cfxm-bot-preview-card{display:flex;flex:0 0 205px;flex-direction:column;overflow:hidden;border:1px solid var(--cfxm-line,rgba(130,145,160,.18));border-radius:15px;background:var(--cfxm-bg,var(--body-bg,#121f27));text-decoration:none!important;scroll-snap-align:start}
                    .cfxm-bot-preview-card img{width:100%;height:90px;object-fit:cover;opacity:.86}
                    .cfxm-bot-preview-card span{padding:10px 11px 0;font-size:12px;font-weight:800;color:var(--cfxm-text,var(--text-color,#202438))}
                    .cfxm-bot-preview-card strong{padding:3px 11px;font-size:18px;color:var(--cfxm-text,var(--text-color,#202438))}
                    .cfxm-bot-preview-card small{padding:0 11px 12px;font-size:10px;color:var(--cfxm-muted,var(--liner-text-color,#75808c))}
                    .cfxm-bot-preview-note{display:flex;gap:8px;margin:12px 0 0;font-size:10px;line-height:1.6;color:var(--cfxm-muted,var(--liner-text-color,#75808c))}
                    .cfxm-bot-preview-note i{color:#d97706}
                    @media(max-width:560px){.cfxm-bot-preview{padding:15px}.cfxm-bot-preview-head{align-items:flex-start;flex-direction:column}.cfxm-bot-preview-card{flex-basis:175px}}
                </style>

                 <div class="row d-none">
                 

                    <div class="col-md-12">
                           <h3 class="text-oxblood">Stock Market Data</h1>
                    <p style="color: #111">You can now invest in long term Stock from top companies around the world</p>
                      <?php
                         $sql="select * from stock";
                         $query=mysqli_query($Conn, $sql);
                         $stock="<div class='card'>
                         <div class='card-body'>
                         <div class='table-responsive'><table class='table'>";
                         
                         while($row=mysqli_fetch_array($query, MYSQLI_ASSOC)){
                                $action="<a href='Stock_Market.php?Stock_id=".$row['id']."&Type=Stock&&Min=".$row['Unit']."' class='btn btn-danger' style='margin-top: 10px'>Buy</a>";
                                if($row['Trend']==0){
            $Color="text-danger";
            $arith="-";

        }else{
            $Color="text-success";
            $arith="+";
 
        }
                           $stock.="<tr class='text-oxblood'style='font-size: 12pt'><th><img  class='img-circle' src='".$row['Logo']."' style='width: 40px; height: 40px; border-radius: 100%'> <span class='text-danger'>".$row['CompanyName']." <span style='color: #111'>".$curAbbr.$row['Unit']."</span></span><br></th><td style='text-align: right'><span class='".$Color."'>".$arith.$row['MarketCap']."%</span><br> <span class='".$Color."'>".$arith.$row['Spread']."</span></td></tr>" ; 
                         }
                         
                         $stock.="</table></div></div></div>";
                        echo $stock;

                      
                      ?>
                    </div>
                </div>
                
                    <div class="row d-none">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-title">
                                <h4>Stock Investment History</h4>
                            </div>
                            <div class="card-body">

                                    <?php 
                                  
                                $investment='<div class="table-responsive">
                                        <table class="table table">
                                            <thead style="background:'.$Background.'">
                                                <tr style="color: #fff">                                                    <th style="width: 100px">S/No</th>
                                                <th>Company</th>

                                                    <th>Amount Invested</th>
                                                            

                                                    <th>Action</th>

                                                </tr>
                                            </thead><tbody>';
                                if($CountInvested>0){
                                    $sn=0;
                                while($row=mysqli_fetch_array($querystockContractsTwo, MYSQLI_ASSOC)){
                                    

                              
                                    $Equity=number_format($row['Buy_Price']*$row['Margin']*$row['Total_Units'], 2, '.',',');
                                                                        $StockEarning+=$Equity;

                                    if($row['Status']==1){
                                        $Status="<button class='btn btn-warning' ata-toggle='modal' data-target='#exampleModal".$row['id']."'>More Info</button>";

                                    }else if($row['Status']==2){
                                       $Status="<button class='btn btn-warning' data-toggle='modal' data-target='#exampleModal".$row['id']."'>More Info</button>"; 
                                    }else if($row['Status']==3){
                                        $Status="<i class='text-danger'>Investment Declined</i>"; 
                                    }else{
                                       $Status="<button class='btn btn-warning' data-toggle='modal' data-target='#exampleModal".$row['id']."'>More Info</button>"; 
                                    }
                                    
                                    
                                    if($row['Contract_Duration']>1){
                                        $plural="s";
                                    }else{
                                        $plural="";
                                    }
                                    
                                    if($Equity>$row['Amount']){
                                        $gainText='Profit';
                                                                                                                       $btn="btn-danger";

                                    }else{
                                                                               $gainText='Loss';
                                                                               $btn="btn-default";
 
                                    }
                                    
                                    
                                    
            $modal='<!-- Modal -->
<div class="modal fade" id="exampleModal'.$row['id'].'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">'.$row['CompanyName'].'</h5>
      </div>
      <div class="modal-body">
      <div class="table-responsive">
       <table class="table table-striped">
       <tr><th style="color: #000">Investment ID</th><td style="text-align: left;">'.$row['Contract_id'].'</td></tr>
        <tr><th style="color: #000">Investment Type</th><td style="text-align: left;">'.$row['Plan_Type'].'</td></tr>
        <tr><th style="color: #000">Company Name</th><td style="text-align: left;">'.$row['CompanyName'].'</td></tr>
         <tr><th style="color: #000">Amount</th><td style="text-align: left;">'.$curAbbr.number_format($row['Amount'], 2, '.',',')*$exchangerate.'</td></tr>
          <tr><th style="color: #000">Buy Price</th><td style="text-align: left;">'.$row['Buy_Price'].'</td></tr>
           <tr><th style="color: #000">Buy Position</th><td style="text-align: left;">'.$row['Buy_Position'].'</td></tr>
            <tr><th style="color: #000">Total Units Holding</th><td style="text-align: left;">'.$row['Total_Units'].'</td></tr>
             <tr><th style="color: #000">Duration</th><td style="text-align: left;">'.$row['Contract_Duration'].' year'.$plural.'</td></tr>
              <tr><th style="color: #000">Start Date</th><td style="text-align: left;">'.$row['Date_Entered'].'</td></tr>
       </table></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn '.$btn.'">Close with '.$gainText.' '.$Equity.'</button>
      </div>
    </div>
  </div>
</div>';
echo $modal;
                                    $sn++;        
                                $investment.='<tr><td style="width: 80px">'.$sn.'</td>
                                <td>'.substr($row['CompanyName'], 0,9).'</td>
                                <td>'.$curAbbr.number_format($row['Amount']*$exchangerate,2,'.',',').'</td>
                
                                <td>'.$Status.'</td>
                                                </tr>';
                                                
                                            }
                                            
                                          
                                }else{
                                    $investment.='<tr>
                                                    <td class="text-info">You are currently not holding any stock</td>
                                               </tr>';
                                }
                                
                                  $investment.='</tbody>
                                        </table>
                                    </div>';
                                  echo $investment;  
                                ?>
                                
                            
                            </div>
                        </div>
                        
                    </div>
              
                </div><br><br>
                
                
                <!-- End PAge Content -->
            </div>

            <!-- End Container fluid  -->
            <!-- footer -->

<?php include('Footer.php') ; ?>

   <?php

}else{

header('location: LoginContainer.php');

}
?>         <!-- End footer -->
      
    <!-- End Wrapper -->

</body>

</html>

