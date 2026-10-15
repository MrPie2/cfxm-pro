<?php
session_start();
if (!isset($_SESSION['User_id'])) {
    header('Location: LoginContainer.php');
    exit;
}
include('Header.php');

$stockId = isset($_GET['Stock_id']) ? (int)$_GET['Stock_id'] : 0;
$stockRow = null;
$stockQuery = null;
if ($stockId > 0) {
    $stockQuery = mysqli_query($Conn, "SELECT * FROM stock WHERE id=" . $stockId . " LIMIT 1");
} elseif (isset($_GET['Company']) || isset($_GET['Symbol'])) {
    // Resolve featured company links against the configured catalogue; never invent a unit price.
    $requestedCompany = trim((string)($_GET['Company'] ?? ''));
    $requestedSymbol = strtoupper(trim((string)($_GET['Symbol'] ?? '')));
    if ($requestedCompany !== '' || $requestedSymbol !== '') {
        $safeCompany = mysqli_real_escape_string($Conn, $requestedCompany);
        $safeSymbol = mysqli_real_escape_string($Conn, $requestedSymbol);
        $conditions = array();
        if ($safeCompany !== '') { $conditions[] = "CompanyName LIKE '%" . $safeCompany . "%'"; }
        if ($safeSymbol !== '') {
            $conditions[] = "tradingview LIKE '%" . $safeSymbol . "%'";
            $conditions[] = "CompanyName LIKE '%" . $safeSymbol . "%'";
        }
        if ($conditions) {
            $stockQuery = mysqli_query($Conn, "SELECT * FROM stock WHERE " . implode(' OR ', $conditions) . " ORDER BY id ASC LIMIT 1");
        }
    }
}
if ($stockQuery && mysqli_num_rows($stockQuery) > 0) {
    $stockRow = mysqli_fetch_assoc($stockQuery);
    $stockId = (int)$stockRow['id'];
}
$vehicle = isset($_GET['Vehicle']) ? trim((string)$_GET['Vehicle']) : '';
$allowedVehicles = array('company', 'Model S', 'Model 3', 'Model X', 'Model Y');
if (!in_array($vehicle, $allowedVehicles, true)) { $vehicle = 'company'; }
$requestedCompanyName = trim((string)($_GET['Company'] ?? ''));
$requestedSymbolName = trim((string)($_GET['Symbol'] ?? ''));
$stockName = $stockRow ? (string)$stockRow['CompanyName'] : ($requestedCompanyName !== '' ? $requestedCompanyName : 'Tesla, Inc.');
$stockSymbol = $stockRow ? (string)$stockRow['tradingview'] : ($requestedSymbolName !== '' ? $requestedSymbolName : 'NASDAQ:TSLA');
$stockPrice = $stockRow ? (float)$stockRow['Unit'] : 0;
$minimumAmount = isset($_GET['Min']) ? (float)$_GET['Min'] : $stockPrice;
$minimumAmountDisplay = $minimumAmount * (float)$exchangerate;
$contractID = random_int(100000, 999999999);
$chartSymbol = $stockSymbol !== '' ? $stockSymbol : 'NASDAQ:TSLA';
?>
<style>
.vh-stock-page { max-width:1420px; margin:0 auto; padding:24px 22px 12px; color:var(--text-color,#142b36); }
.vh-stock-page * { box-sizing:border-box; }
.vh-stock-page-crumb { display:flex; align-items:center; gap:8px; margin-bottom:18px; color:var(--vh-muted,#70818d); font-size:12px; }
.vh-stock-page-crumb a { color:#7748bc; font-weight:700; }
.vh-stock-page-heading { display:flex; align-items:flex-start; justify-content:space-between; gap:18px; margin-bottom:18px; }
.vh-stock-page-heading h1 { margin:0 0 7px; color:var(--text-color,#142b36); font-size:clamp(25px,3vw,36px); font-weight:850; letter-spacing:-.045em; }
.vh-stock-page-heading p { margin:0; color:var(--vh-muted,#70818d); font-size:13px; line-height:1.6; }
.vh-stock-symbol-badge { display:inline-flex; align-items:center; gap:8px; padding:8px 11px; border:1px solid rgba(73,36,126,.17); border-radius:999px; background:rgba(73,36,126,.07); color:#49247e; font-size:11px; font-weight:800; white-space:nowrap; }
.vh-stock-detail-grid { display:grid; grid-template-columns:minmax(0,1.55fr) minmax(290px,.85fr); gap:18px; align-items:start; }
.vh-stock-detail-panel { min-width:0; overflow:hidden; border:1px solid rgba(125,148,162,.22); border-radius:19px; background:var(--card-bg,#fff); box-shadow:0 8px 28px rgba(17,39,51,.045); }
.vh-stock-panel-head { display:flex; align-items:center; justify-content:space-between; gap:12px; padding:18px 20px; border-bottom:1px solid rgba(125,148,162,.16); }
.vh-stock-panel-head h2 { margin:0; color:var(--text-color,#142b36); font-size:15px; font-weight:800; }
.vh-stock-panel-head span { color:var(--vh-muted,#70818d); font-size:11px; }
.vh-stock-chart { height:440px; min-width:0; }
.vh-stock-chart .tradingview-widget-container,.vh-stock-chart .tradingview-widget-container__widget { width:100%; height:100%; }
.vh-stock-description { padding:16px 20px 19px; color:var(--vh-muted,#70818d); font-size:12px; line-height:1.7; }
.vh-stock-description strong { color:var(--text-color,#142b36); }
.vh-stock-order { padding:20px; }
.vh-stock-order-kicker { color:#7748bc; font-size:10px; font-weight:850; letter-spacing:.14em; }
.vh-stock-order h2 { margin:7px 0 6px; color:var(--text-color,#142b36); font-size:20px; font-weight:850; letter-spacing:-.03em; }
.vh-stock-order-intro { margin:0 0 18px; color:var(--vh-muted,#70818d); font-size:12px; line-height:1.6; }
.vh-stock-order label { display:block; margin-bottom:7px; color:var(--text-color,#142b36); font-size:12px; font-weight:750; }
.vh-stock-order .form-control { height:46px; border:1px solid rgba(125,148,162,.3); border-radius:11px; box-shadow:none; background:var(--body-bg,#fff); color:var(--text-color,#142b36); }
.vh-stock-order .form-control:focus { border-color:#7748bc; box-shadow:0 0 0 3px rgba(119,72,188,.12); }
.vh-stock-order .form-group { margin-bottom:16px; }
.vh-stock-minimum { display:flex; align-items:center; justify-content:space-between; gap:10px; margin:9px 0 17px; padding:11px 12px; border-radius:11px; background:rgba(73,36,126,.065); color:var(--vh-muted,#70818d); font-size:11px; }
.vh-stock-minimum strong { color:var(--text-color,#142b36); font-size:12px; }
.vh-stock-proceed { display:flex; align-items:center; justify-content:center; gap:9px; width:100%; min-height:47px; border:0; border-radius:12px; background:linear-gradient(110deg,#49247e,#7748bc); color:#fff; font-weight:800; font-size:13px; box-shadow:0 9px 20px rgba(73,36,126,.2); }
.vh-stock-proceed:hover { color:#fff; filter:brightness(1.06); }
.vh-stock-risk-note { display:flex; gap:8px; margin:14px 0 0; color:var(--vh-muted,#70818d); font-size:10px; line-height:1.6; }
.vh-stock-risk-note i { margin-top:2px; color:#7748bc; }
.vh-stock-unavailable { margin:18px 0; padding:20px; border:1px solid rgba(125,148,162,.22); border-radius:16px; background:var(--card-bg,#fff); }
@media(max-width:900px) { .vh-stock-detail-grid { grid-template-columns:1fr; }.vh-stock-chart { height:380px; } }
@media(max-width:600px) { .vh-stock-page { padding:18px 13px 8px; }.vh-stock-page-heading { flex-direction:column; gap:10px; }.vh-stock-page-heading h1 { font-size:27px; }.vh-stock-detail-grid { gap:12px; }.vh-stock-panel-head { padding:15px; }.vh-stock-chart { height:330px; }.vh-stock-description { padding:14px 15px 17px; }.vh-stock-order { padding:16px; } }
</style>

<main class="vh-stock-page">
    <div class="vh-stock-page-crumb"><a href="Dashboard.php">Dashboard</a><i class="fas fa-chevron-right"></i><span>Investment details</span></div>
    <div class="vh-stock-page-heading">
        <div>
            <span class="vh-eyebrow">INVESTMENT OPPORTUNITY</span>
            <h1><?php echo htmlspecialchars($vehicle === 'company' ? $stockName : 'Tesla ' . $vehicle, ENT_QUOTES, 'UTF-8'); ?></h1>
            <p>Review the market chart, choose your amount and check the order details before continuing.</p>
        </div>
        <span class="vh-stock-symbol-badge"><i class="fas fa-chart-line"></i> <?php echo htmlspecialchars($chartSymbol, ENT_QUOTES, 'UTF-8'); ?></span>
    </div>

    <?php if (!$stockRow): ?>
        <div class="vh-stock-unavailable">
            <h3>Investment currently unavailable</h3>
            <p><?php echo htmlspecialchars($stockName, ENT_QUOTES, 'UTF-8'); ?> does not yet have a configured unit price in the platform stock catalogue. The investment amount and confirmation flow can only be enabled after an administrator configures the listing and its price. No price has been guessed or fabricated.</p>
            <a href="Dashboard.php" class="btn btn-oxblood">Back to dashboard</a>
        </div>
    <?php else: ?>
    <div class="vh-stock-detail-grid">
        <section class="vh-stock-detail-panel" aria-labelledby="vhStockChartTitle">
            <div class="vh-stock-panel-head"><h2 id="vhStockChartTitle">Market performance</h2><span><i class="fas fa-wave-square"></i> Interactive chart</span></div>
            <div class="vh-stock-chart">
                <div class="tradingview-widget-container" style="height:100%;width:100%">
                    <div class="tradingview-widget-container__widget" style="height:calc(100% - 32px);width:100%"></div>
                    <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/" rel="noopener nofollow" target="_blank"><span class="blue-text">Track markets on TradingView</span></a></div>
                    <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-advanced-chart.js" async>
                    {
                        "autosize": true,
                        "symbol": <?php echo json_encode($chartSymbol); ?>,
                        "interval": "D",
                        "timezone": "Etc/UTC",
                        "theme": "dark",
                        "style": "1",
                        "locale": "en",
                        "allow_symbol_change": false,
                        "calendar": false,
                        "support_host": "https://www.tradingview.com"
                    }
                    </script>
                </div>
            </div>
            <div class="vh-stock-description"><strong>About this opportunity</strong><br><?php echo htmlspecialchars((string)($stockRow['description'] ?? 'Review the available market information before deciding whether to continue.'), ENT_QUOTES, 'UTF-8'); ?><br><br><strong>Important:</strong> This order flow records an investment through this platform. It does not itself guarantee that shares are held in a brokerage account.</div>
        </section>

        <section class="vh-stock-detail-panel" aria-labelledby="vhStockOrderTitle">
            <div class="vh-stock-panel-head"><h2 id="vhStockOrderTitle">Build your investment</h2><span><i class="fas fa-shield-alt"></i> Review before proceeding</span></div>
            <div class="vh-stock-order">
                <span class="vh-stock-order-kicker">ORDER DETAILS</span>
                <h2><?php echo htmlspecialchars($vehicle === 'company' ? $stockName : 'Tesla ' . $vehicle, ENT_QUOTES, 'UTF-8'); ?></h2>
                <p class="vh-stock-order-intro">Enter the amount you want to invest. The next screen lets you review the order and available balance before confirming.</p>
                <div class="form-group">
                    <label for="vhStockAmount">Investment amount (<?php echo htmlspecialchars($curAbbr, ENT_QUOTES, 'UTF-8'); ?>)</label>
                    <input type="number" min="<?php echo htmlspecialchars((string)$minimumAmountDisplay, ENT_QUOTES, 'UTF-8'); ?>" step="0.01" id="vhStockAmount" class="form-control Amount" placeholder="Enter amount" inputmode="decimal">
                </div>
                <div class="form-group">
                    <label for="vhStockDuration">Investment duration</label>
                    <select class="form-control duration" id="vhStockDuration">
                        <?php for ($year = 1; $year <= 20; $year++): ?>
                        <option value="<?php echo $year; ?>"><?php echo $year . ' year' . ($year > 1 ? 's' : ''); ?></option>
                        <?php endfor; ?>
                    </select>
                </div>
                <div class="vh-stock-minimum"><span>Minimum amount</span><strong><?php echo htmlspecialchars($curAbbr, ENT_QUOTES, 'UTF-8') . number_format($minimumAmountDisplay, 2, '.', ','); ?></strong></div>
                <button type="button" class="vh-stock-proceed Proceed">Continue to review <i class="fas fa-arrow-right"></i></button>
                <p class="vh-stock-risk-note"><i class="fas fa-info-circle"></i><span>Market prices can move and investments involve risk. Review the final terms and ensure the selected product is available in your account before confirming.</span></p>
            </div>
        </section>
    </div>
    <?php endif; ?>
</main>

<?php include('Footer.php'); ?>
<script src="js/lib/jquery/jquery.min.js"></script>
<script src="js/lib/bootstrap/js/popper.min.js"></script>
<script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
<script src="js/jquery.slimscroll.js"></script>
<script src="js/sidebarmenu.js"></script>
<script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
<script src="js/custom.min.js"></script>
<script>
(function ($) {
    'use strict';
    const config = {
        minimum: <?php echo json_encode($minimumAmountDisplay); ?>,
        exchangerate: <?php echo json_encode((float)$exchangerate); ?>,
        currency: <?php echo json_encode((string)$curAbbr); ?>,
        planType: <?php echo json_encode((string)($_GET['Type'] ?? 'Stock')); ?>,
        company: <?php echo json_encode($stockName); ?>,
        unit: <?php echo json_encode($stockPrice); ?>,
        position: <?php echo json_encode((float)($stockRow['Spread'] ?? $stockPrice)); ?>,
        contractId: <?php echo json_encode((string)$contractID); ?>,
        stockId: <?php echo json_encode($stockId); ?>
    };
    $('.Proceed').on('click', function () {
        const amount = Number($('.Amount').val());
        if (!Number.isFinite(amount) || amount <= 0) {
            if (window.swal) { swal({icon:'error', title:'Enter an amount', text:'Please enter a valid investment amount.'}); }
            else { alert('Please enter a valid investment amount.'); }
            $('.Amount').trigger('focus');
            return;
        }
        if (amount < config.minimum) {
            const message = 'Minimum investment amount is ' + config.currency + Number(config.minimum).toLocaleString(undefined, {minimumFractionDigits:2, maximumFractionDigits:2});
            if (window.swal) { swal({icon:'error', title:'Below minimum', text:message}); } else { alert(message); }
            return;
        }
        const durationDays = Number($('.duration').val()) * 365;
        const params = new URLSearchParams({
            Plan_Type: config.planType,
            Amount: String(amount),
            Company: config.company,
            Unit: String(config.unit),
            ContractID: config.contractId,
            Duration: String(durationDays),
            Position: String(config.position),
            bop: 'Stock'
        });
        window.location.href = 'PreviewStock.php?' + params.toString();
    });
})(jQuery);
</script>
</body>
</html>
