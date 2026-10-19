<?php
session_start();
if (!isset($_SESSION['User_id'])) {
    header('Location: LoginContainer.php');
    exit;
}
include('Header.php');

$marketAssets = array(
    array('name'=>'NVIDIA','symbol'=>'NVDA','exchange'=>'NASDAQ','match'=>array('NVIDIA','NVDA'),'mark'=>'N','class'=>'nvidia','category'=>'Semiconductors','description'=>'Explore NVIDIA and its graphics, accelerated computing and AI platforms.'),
    array('name'=>'Toyota Motor','symbol'=>'TM','exchange'=>'NYSE ADR','match'=>array('Toyota','TM'),'mark'=>'T','class'=>'toyota','category'=>'Japanese automotive','description'=>'Explore Toyota Motor and its global automotive and mobility business.'),
    array('name'=>'Sony Group','symbol'=>'SONY','exchange'=>'NYSE ADR','match'=>array('Sony','SONY'),'mark'=>'S','class'=>'sony','category'=>'Japanese technology','description'=>'Explore Sony Group across entertainment, electronics, gaming and imaging.'),
    array('name'=>'Honda Motor','symbol'=>'HMC','exchange'=>'NYSE ADR','match'=>array('Honda','HMC'),'mark'=>'H','class'=>'honda','category'=>'Japanese automotive','description'=>'Explore Honda Motor across automobiles, motorcycles and mobility technology.')
);

foreach ($marketAssets as &$asset) {
    $asset['stock'] = null;
    $conditions = array();
    foreach ($asset['match'] as $term) {
        $safeTerm = mysqli_real_escape_string($Conn, $term);
        $conditions[] = "CompanyName LIKE '%" . $safeTerm . "%'";
        $conditions[] = "tradingview LIKE '%" . $safeTerm . "%'";
    }
    $sql = "SELECT * FROM stock WHERE " . implode(' OR ', $conditions) . " ORDER BY id ASC LIMIT 1";
    $query = mysqli_query($Conn, $sql);
    if ($query && mysqli_num_rows($query) > 0) {
        $asset['stock'] = mysqli_fetch_assoc($query);
    }
}
unset($asset);

$marketEscape = static function ($value) {
    return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
};
?>
<style>
.cfxm-market{max-width:1440px;margin:0 auto;padding:26px 22px 44px;color:var(--cfxm-text,var(--text-color,#192c36))}
.cfxm-market *{box-sizing:border-box}
.cfxm-market-hero{position:relative;overflow:hidden;display:flex;align-items:center;justify-content:space-between;gap:22px;padding:clamp(22px,4vw,38px);margin-bottom:24px;border:1px solid rgba(160,132,210,.22);border-radius:24px;background:radial-gradient(ellipse at 90% 5%,rgba(119,72,188,.28),transparent 38%),linear-gradient(130deg,var(--cfxm-surface,#202833),var(--cfxm-bg-deep,#101b24));box-shadow:0 18px 45px rgba(15,25,45,.1)}
.cfxm-market-kicker{display:inline-flex;align-items:center;gap:8px;color:#bda0ed;font-size:10px;font-weight:850;letter-spacing:.16em;text-transform:uppercase}
.cfxm-market-hero h1{margin:10px 0 9px;color:var(--cfxm-text,#fff);font-size:clamp(29px,4vw,43px);font-weight:850;letter-spacing:-.05em}
.cfxm-market-hero p{max-width:660px;margin:0;color:var(--cfxm-muted,#a5b1ba);font-size:13px;line-height:1.75}
.cfxm-market-hero-icon{display:grid;place-items:center;flex:0 0 90px;width:90px;height:90px;border:1px solid rgba(189,160,237,.24);border-radius:25px;background:rgba(119,72,188,.14);color:#c9b1f4;font-size:35px}
.cfxm-market-toolbar{display:flex;align-items:flex-end;justify-content:space-between;gap:16px;margin:0 0 16px}
.cfxm-market-toolbar h2{margin:0 0 5px;color:var(--cfxm-text,var(--text-color,#192c36));font-size:20px;font-weight:850;letter-spacing:-.03em}
.cfxm-market-toolbar p{margin:0;color:var(--cfxm-muted,#83919c);font-size:12px}
.cfxm-market-count{display:inline-flex;align-items:center;gap:7px;padding:8px 11px;border:1px solid var(--cfxm-line,rgba(130,145,160,.22));border-radius:999px;color:var(--cfxm-muted,#83919c);font-size:11px;font-weight:750;white-space:nowrap}
.cfxm-market-grid{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:16px}
.cfxm-market-card{display:flex;min-width:0;flex-direction:column;overflow:hidden;border:1px solid var(--cfxm-line,rgba(130,145,160,.2));border-radius:19px;background:var(--cfxm-surface,var(--card-bg,#fff));box-shadow:0 8px 26px rgba(15,25,45,.045);transition:transform .2s ease,border-color .2s ease,box-shadow .2s ease}
.cfxm-market-card:hover{transform:translateY(-3px);border-color:rgba(119,72,188,.38);box-shadow:0 14px 34px rgba(15,25,45,.1)}
.cfxm-market-card-top{display:flex;align-items:center;gap:13px;padding:19px 19px 14px}
.cfxm-market-mark{display:grid;place-items:center;flex:0 0 50px;width:50px;height:50px;border:1px solid var(--cfxm-line,rgba(130,145,160,.2));border-radius:15px;background:var(--cfxm-bg,var(--body-bg,#f6f7fb));color:var(--cfxm-text,var(--text-color,#192c36));font-size:24px;font-weight:900}
.cfxm-market-mark.netflix{background:#e50914;color:#fff;border-color:#e50914}.cfxm-market-mark.dell{background:#0872ce;color:#fff;border-color:#0872ce}.cfxm-market-mark.microsoft{background:linear-gradient(135deg,#f35325 0 48%,#81bc06 49% 100%);color:#fff;border-color:transparent}.cfxm-market-mark.spacex{background:#101820;color:#fff;border-color:#3b4650}.cfxm-market-mark.magnet{background:#f3e8ff;color:#6b21a8;border-color:#e9d5ff}.cfxm-market-mark.nvidia{background:#76b900;color:#fff;border-color:#76b900}.cfxm-market-mark.toyota{background:#d71920;color:#fff;border-color:#d71920}.cfxm-market-mark.sony{background:#111;color:#fff;border-color:#111}.cfxm-market-mark.honda{background:#d71920;color:#fff;border-color:#d71920}
.cfxm-market-company{min-width:0;flex:1}
.cfxm-market-company h3{overflow-wrap:anywhere;margin:0 0 5px;color:var(--cfxm-text,var(--text-color,#192c36));font-size:16px;font-weight:850;letter-spacing:-.025em}
.cfxm-market-company p{margin:0;color:var(--cfxm-muted,#83919c);font-size:11px}
.cfxm-market-card-body{display:flex;flex:1;flex-direction:column;padding:0 19px 19px}
.cfxm-market-meta{display:flex;align-items:center;justify-content:space-between;gap:8px;margin:3px 0 13px}
.cfxm-market-category{padding:6px 8px;border-radius:999px;background:rgba(119,72,188,.1);color:#a886df;font-size:9px;font-weight:850;letter-spacing:.06em;text-transform:uppercase}
.cfxm-market-status{color:var(--cfxm-muted,#83919c);font-size:10px;font-weight:750;text-align:right}
.cfxm-market-description{min-height:42px;margin:0 0 16px;color:var(--cfxm-muted,#83919c);font-size:12px;line-height:1.7}
.cfxm-market-invest{display:flex;align-items:center;justify-content:center;gap:9px;width:100%;min-height:44px;margin-top:auto;padding:11px 14px;border:0;border-radius:11px;background:linear-gradient(110deg,#49247e,#7748bc);color:#fff!important;font-size:12px;font-weight:800;text-decoration:none;transition:filter .18s ease}
.cfxm-market-invest:hover{filter:brightness(1.08)}
.cfxm-market-invest.disabled{border:1px solid var(--cfxm-line,rgba(130,145,160,.2));background:var(--cfxm-bg,var(--body-bg,#f6f7fb));color:var(--cfxm-muted,#83919c)!important;cursor:not-allowed}
.cfxm-market-note{display:flex;align-items:flex-start;gap:10px;margin-top:20px;padding:14px 16px;border:1px solid var(--cfxm-line,rgba(130,145,160,.18));border-radius:14px;color:var(--cfxm-muted,#83919c);font-size:11px;line-height:1.7}
.cfxm-market-note i{margin-top:2px;color:#a886df}
@media(max-width:1000px){.cfxm-market-grid{grid-template-columns:repeat(2,minmax(0,1fr))}}
@media(max-width:600px){.cfxm-market{padding:18px 13px 30px}.cfxm-market-hero{align-items:flex-start;padding:22px 18px;border-radius:19px}.cfxm-market-hero-icon{flex-basis:52px;width:52px;height:52px;border-radius:16px;font-size:22px}.cfxm-market-hero h1{font-size:29px}.cfxm-market-grid{grid-template-columns:1fr;gap:12px}.cfxm-market-card-top{padding:16px 16px 12px}.cfxm-market-card-body{padding:0 16px 16px}.cfxm-market-toolbar{align-items:flex-start}.cfxm-market-count{font-size:10px}}
</style>
<main class="cfxm-market">
    <section class="cfxm-market-hero">
        <div>
            <span class="cfxm-market-kicker"><i class="fas fa-chart-line"></i> CFXM PRO MARKET</span>
            <h1>Explore the market</h1>
            <p>Browse featured companies and opportunities, review their available market details, and continue through the platform's stock review flow.</p>
        </div>
        <div class="cfxm-market-hero-icon" aria-hidden="true"><i class="fas fa-globe"></i></div>
    </section>

    <div class="cfxm-market-toolbar">
        <div><h2>Featured listings</h2><p>Select a listing to review its market chart and investment details.</p></div>
        <span class="cfxm-market-count"><i class="fas fa-layer-group"></i> <?php echo count($marketAssets); ?> opportunities</span>
    </div>

    <section class="cfxm-market-grid" aria-label="Market listings">
        <?php foreach ($marketAssets as $asset): ?>
        <article class="cfxm-market-card">
            <div class="cfxm-market-card-top">
                <div class="cfxm-market-mark <?php echo $marketEscape($asset['class']); ?>" aria-hidden="true"><?php echo $marketEscape($asset['mark']); ?></div>
                <div class="cfxm-market-company">
                    <h3><?php echo $marketEscape($asset['name']); ?></h3>
                    <p><?php echo $marketEscape($asset['exchange']); ?><?php if ($asset['stock'] && !empty($asset['stock']['tradingview'])): ?> · <?php echo $marketEscape($asset['stock']['tradingview']); ?><?php elseif ($asset['symbol'] !== 'PRIVATE' && $asset['symbol'] !== 'MAGNET'): ?> · <?php echo $marketEscape($asset['symbol']); ?><?php endif; ?></p>
                </div>
            </div>
            <div class="cfxm-market-card-body">
                <div class="cfxm-market-meta"><span class="cfxm-market-category"><?php echo $marketEscape($asset['category']); ?></span><span class="cfxm-market-status"><?php echo $asset['stock'] ? 'Available to review' : 'Catalogue setup needed'; ?></span></div>
                <p class="cfxm-market-description"><?php echo $marketEscape($asset['description']); ?></p>
                <?php if ($asset['stock']): ?>
                <a class="cfxm-market-invest" href="Stock_Market.php?Stock_id=<?php echo (int)$asset['stock']['id']; ?>&amp;Type=Stock&amp;Min=<?php echo rawurlencode((string)$asset['stock']['Unit']); ?>&amp;Vehicle=company">Invest <i class="fas fa-arrow-right"></i></a>
                <?php else: ?>
                <button class="cfxm-market-invest disabled" type="button" disabled title="This opportunity needs a stock catalogue entry before investments can be reviewed.">Coming soon <i class="fas fa-lock"></i></button>
                <?php endif; ?>
            </div>
        </article>
        <?php endforeach; ?>
    </section>

    <div class="cfxm-market-note"><i class="fas fa-info-circle"></i><span>Market listings are connected to the platform's stock catalogue. NVIDIA is listed on NASDAQ; Toyota, Sony and Honda are represented by their US-listed ADR symbols. An investment button is enabled only when a matching catalogue entry exists. Displaying a company here does not itself mean that CFXM Pro holds shares in that company.</span></div>
</main>
<?php include('Footer.php'); ?>
</body>
</html>
