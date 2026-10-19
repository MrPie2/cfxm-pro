<?php session_start();
if(isset($_SESSION['User_id'])){
include('Header.php');
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

    // Count the signed-in investor's recorded bot plans without requiring the schema helper on every dashboard load.
    $dashboardBotRecordCount = 0;
    $dashboardBotRecordStmt = @mysqli_prepare($Conn, "SELECT COUNT(*) FROM user_trading_bots WHERE investor_id=?");
    if ($dashboardBotRecordStmt) {
        mysqli_stmt_bind_param($dashboardBotRecordStmt, 's', $Investor_id);
        if (mysqli_stmt_execute($dashboardBotRecordStmt)) {
            mysqli_stmt_bind_result($dashboardBotRecordStmt, $dashboardBotRecordCount);
            mysqli_stmt_fetch($dashboardBotRecordStmt);
            $dashboardBotRecordCount = (int)$dashboardBotRecordCount;
        }
        mysqli_stmt_close($dashboardBotRecordStmt);
    }

    // Bot summary: realized simulated profit plus an estimate from currently active bots.
    $dashboardBotProfit = 0.0;
    $dashboardBotDailyRateAmount = 0.0;
    $dashboardBotActiveCapital = 0.0;
    $dashboardBotDailyPercentage = 0.0;
    $dashboardBotSummaryStmt = @mysqli_prepare($Conn, "SELECT COALESCE(SUM(total_earned),0), COALESCE(SUM(CASE WHEN status='active' AND mining_status='active' THEN capital * daily_rate_percent / 100 ELSE 0 END),0), COALESCE(SUM(CASE WHEN status='active' AND mining_status='active' THEN capital ELSE 0 END),0) FROM user_trading_bots WHERE investor_id=?");
    if ($dashboardBotSummaryStmt) {
        mysqli_stmt_bind_param($dashboardBotSummaryStmt, 's', $Investor_id);
        if (mysqli_stmt_execute($dashboardBotSummaryStmt)) {
            mysqli_stmt_bind_result($dashboardBotSummaryStmt, $dashboardBotProfit, $dashboardBotDailyRateAmount, $dashboardBotActiveCapital);
            mysqli_stmt_fetch($dashboardBotSummaryStmt);
        }
        mysqli_stmt_close($dashboardBotSummaryStmt);
    }
    $dashboardBotProfitDisplay = (float)$dashboardBotProfit * (float)$exchangerate;
    $dashboardBotDailyRateDisplay = (float)$dashboardBotDailyRateAmount * (float)$exchangerate;
    $dashboardBotDailyPercentage = (float)$dashboardBotActiveCapital > 0
        ? ((float)$dashboardBotDailyRateAmount / (float)$dashboardBotActiveCapital) * 100
        : 0.0;




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
    .vh-company-art-nvidia{background:linear-gradient(130deg,#101b13,#76b900)!important}.vh-company-art-nvidia .vh-company-brand-mark{background:#76b900;color:#fff}
    .vh-company-art-toyota{background:linear-gradient(130deg,#161c2b,#d71920)!important}.vh-company-art-toyota .vh-company-brand-mark{background:#fff;color:#d71920}
    .vh-company-art-sony{background:linear-gradient(130deg,#090909,#424242)!important}.vh-company-art-sony .vh-company-brand-mark{background:#fff;color:#111}
    .vh-company-art-honda{background:linear-gradient(130deg,#4b080d,#d71920)!important}.vh-company-art-honda .vh-company-brand-mark{background:#fff;color:#d71920}
    .vh-company-art-google{background:linear-gradient(130deg,#16233a,#4285f4)!important}.vh-company-art-tesla{background:linear-gradient(130deg,#160b0c,#e82127)!important}.vh-company-art-microsoft{background:linear-gradient(130deg,#1e2b36,#5e5e5e)!important}.vh-company-art-byd{background:linear-gradient(130deg,#1c1720,#ed1c24)!important}.vh-company-art-apple{background:linear-gradient(130deg,#141414,#626262)!important}
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
        <a class="vh-stat-card vh-bot-record-card" href="BotPlans.php" style="text-decoration:none">
            <span class="vh-stat-icon vh-icon-purple"><i class="fas fa-robot"></i></span>
            <span class="vh-stat-label">Bot record</span>
            <strong><?php echo number_format($dashboardBotRecordCount); ?></strong>
            <small>Recorded bot plans · Manage bots <i class="fas fa-arrow-right" aria-hidden="true"></i></small>
        </a>
        <div class="vh-stat-card vh-bot-profit-card">
            <span class="vh-stat-icon vh-icon-green"><i class="fas fa-chart-line"></i></span>
            <span class="vh-stat-label">Bot profit</span>
            <strong><?php echo htmlspecialchars($curAbbr, ENT_QUOTES, 'UTF-8') . number_format($dashboardBotProfitDisplay, 2, '.', ','); ?></strong>
            <small>Earned from your bot records</small>
        </div>
    </div>



    <?php
    $featuredCompanies = array(
        array('name'=>'Alphabet (Google)','symbol'=>'GOOGL','mark'=>'G','logo'=>'https://cdn.simpleicons.org/google/4285F4','class'=>'google','category'=>'TECHNOLOGY','description'=>'Explore Alphabet and Google across search, cloud and digital services.','match'=>array('Alphabet','Google','GOOGL')),
        array('name'=>'Tesla','symbol'=>'TSLA','mark'=>'T','logo'=>'https://cdn.simpleicons.org/tesla/E82127','class'=>'tesla','category'=>'ELECTRIC VEHICLES','description'=>'Explore Tesla and its electric vehicles, energy storage and charging ecosystem.','match'=>array('Tesla','TSLA')),
        array('name'=>'Microsoft','symbol'=>'MSFT','mark'=>'M','logo'=>'https://www.google.com/s2/favicons?domain=microsoft.com&sz=128','class'=>'microsoft','category'=>'TECHNOLOGY','description'=>'Explore Microsoft across cloud, productivity, software and AI.','match'=>array('Microsoft','MSFT')),
        array('name'=>'BYD Company','symbol'=>'BYDDY','mark'=>'B','logo'=>'https://www.google.com/s2/favicons?domain=byd.com&sz=128','class'=>'byd','category'=>'ELECTRIC VEHICLES','description'=>'Explore BYD, the Chinese electric vehicle and battery manufacturer.','match'=>array('BYD','BYDDY')),
        array('name'=>'Apple','symbol'=>'AAPL','mark'=>'A','logo'=>'https://cdn.simpleicons.org/apple/000000','class'=>'apple','category'=>'TECHNOLOGY','description'=>'Explore Apple across its devices, software and services ecosystem.','match'=>array('Apple','AAPL')),
        array('name'=>'NVIDIA','symbol'=>'NVDA','mark'=>'N','logo'=>'https://cdn.simpleicons.org/nvidia/76B900','class'=>'nvidia','category'=>'SEMICONDUCTORS','description'=>'Explore NVIDIA and its graphics, accelerated computing and AI platforms.','match'=>array('NVIDIA','NVDA')),
        array('name'=>'Toyota Motor','symbol'=>'TM','mark'=>'T','logo'=>'https://cdn.simpleicons.org/toyota/EB0A1E','class'=>'toyota','category'=>'JAPANESE AUTOMOTIVE','description'=>'Explore Toyota Motor and its global automotive and mobility business.','match'=>array('Toyota','TM')),
        array('name'=>'Sony Group','symbol'=>'SONY','mark'=>'S','logo'=>'https://cdn.simpleicons.org/sony/000000','class'=>'sony','category'=>'JAPANESE TECHNOLOGY','description'=>'Explore Sony Group across entertainment, electronics, gaming and imaging.','match'=>array('Sony','SONY')),
        array('name'=>'Honda Motor','symbol'=>'HMC','mark'=>'H','logo'=>'https://cdn.simpleicons.org/honda/E40521','class'=>'honda','category'=>'JAPANESE AUTOMOTIVE','description'=>'Explore Honda Motor across automobiles, motorcycles and mobility technology.','match'=>array('Honda','HMC')),
    );
    foreach($featuredCompanies as &$company){
        $company['stock']=null; $stockConditions=array();
        foreach($company['match'] as $term){$safeTerm=mysqli_real_escape_string($Conn,$term);$stockConditions[]="CompanyName LIKE '%".$safeTerm."%'";$stockConditions[]="tradingview LIKE '%".$safeTerm."%'";}
        $companyQuery=mysqli_query($Conn,"SELECT * FROM stock WHERE ".implode(' OR ',$stockConditions)." ORDER BY id ASC LIMIT 1");
        if($companyQuery && mysqli_num_rows($companyQuery)>0){$company['stock']=mysqli_fetch_assoc($companyQuery);}
    }
    unset($company);
?>
<section class="vh-investment-catalog" aria-labelledby="vhFeaturedStocksHeading">
    <div class="vh-investment-catalog-head"><div><span class="vh-eyebrow">FEATURED STOCKS</span><h2 id="vhFeaturedStocksHeading">Explore the market</h2><p>Discover Google, Tesla, Microsoft, BYD, Apple, NVIDIA, Toyota, Sony and Honda.</p></div>
        <div class="vh-carousel-controls" aria-label="Featured stock carousel controls"><button type="button" class="vh-carousel-btn" id="vhFeaturedStocksPrev" aria-label="Scroll featured stocks left"><i class="fas fa-chevron-left"></i></button><button type="button" class="vh-carousel-btn" id="vhFeaturedStocksNext" aria-label="Scroll featured stocks right"><i class="fas fa-chevron-right"></i></button></div>
    </div>
    <div class="vh-investment-track" id="vhFeaturedStocksTrack" tabindex="0" role="region" aria-label="Featured company stocks. Scroll horizontally to view more">
        <?php foreach($featuredCompanies as $company): $companyStock=$company['stock']; ?>
        <article class="vh-investment-card vh-investment-company-card vh-featured-company-card">
            <div class="vh-investment-company-art vh-company-art-<?php echo htmlspecialchars($company['class'],ENT_QUOTES,'UTF-8'); ?>" aria-hidden="true"><span class="vh-company-brand-mark"><img src="<?php echo htmlspecialchars($company['logo'],ENT_QUOTES,'UTF-8'); ?>" alt="" loading="lazy" style="width:42px;height:42px;object-fit:contain;background:#fff;border-radius:10px;padding:7px" onerror="this.style.display='none';this.parentElement.textContent=<?php echo json_encode($company['mark']); ?>;"></span><span class="vh-company-orbit"></span><span class="vh-company-brand-name"><?php echo htmlspecialchars($company['name'],ENT_QUOTES,'UTF-8'); ?></span></div>
            <div class="vh-investment-card-body"><div class="vh-investment-card-meta"><span class="vh-asset-pill"><?php echo htmlspecialchars($company['category'],ENT_QUOTES,'UTF-8'); ?></span><span class="vh-asset-symbol"><?php echo htmlspecialchars($company['symbol'],ENT_QUOTES,'UTF-8'); ?></span></div>
                <h3><?php echo htmlspecialchars($company['name'],ENT_QUOTES,'UTF-8'); ?></h3><p><?php echo htmlspecialchars($company['description'],ENT_QUOTES,'UTF-8'); ?></p>
                <?php if($companyStock): ?><a class="vh-invest-now" href="Stock_Market.php?Stock_id=<?php echo (int)$companyStock['id']; ?>&amp;Type=Stock&amp;Min=<?php echo rawurlencode((string)$companyStock['Unit']); ?>&amp;Vehicle=company">Review stock <i class="fas fa-arrow-right" aria-hidden="true"></i></a>
                <?php else: ?><a class="vh-invest-now" href="Stock_Market.php?Symbol=<?php echo rawurlencode((string)$company['symbol']); ?>&amp;Vehicle=company">Review stock <i class="fas fa-arrow-right" aria-hidden="true"></i></a><?php endif; ?>
            </div>
        </article>
        <?php endforeach; ?>
    </div>
    <p class="vh-investment-disclaimer"><i class="fas fa-info-circle" aria-hidden="true"></i> Company cards are entry points to stock review. Availability and investment processing depend on the platform's configured stock catalogue.</p>
</section>
<script>
(function(){const track=document.getElementById('vhFeaturedStocksTrack');if(!track||track.dataset.ready)return;track.dataset.ready='1';const scrollByCard=direction=>{const card=track.querySelector('.vh-investment-card');track.scrollBy({left:direction*((card?card.getBoundingClientRect().width:280)+16),behavior:'smooth'});};document.getElementById('vhFeaturedStocksPrev')?.addEventListener('click',()=>scrollByCard(-1));document.getElementById('vhFeaturedStocksNext')?.addEventListener('click',()=>scrollByCard(1));})();
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

