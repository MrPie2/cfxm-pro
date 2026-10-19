<?php
session_start();
if (!isset($_SESSION['User_id'])) { header('Location: LoginContainer.php'); exit; }
$PageTitle = 'AI Trading Bots';
include('Header.php');
require_once __DIR__ . '/BotSchema.php';
$botSchemaReady = cfxm_ensure_bot_tables($Conn);

function bot_h($v) { return htmlspecialchars((string)$v, ENT_QUOTES, 'UTF-8'); }
$botPlans = [
 ['id'=>'scout','name'=>'AI Scout','price'=>2000,'rate'=>0.0300,'tag'=>'STARTER','strategy'=>'Spot trend & momentum','description'=>'A focused strategy profile for major crypto assets with conservative signal filters.','capacity'=>'Up to 3 markets','features'=>['Trend and momentum signals','Basic volatility filters','Daily performance summary'],'image'=>'assets/bots/scout.svg'],
 ['id'=>'momentum','name'=>'Momentum AI','price'=>5000,'rate'=>0.0800,'tag'=>'ACTIVE','strategy'=>'Momentum & breakout','description'=>'Scans more markets for trend continuation and breakout setups.','capacity'=>'Up to 8 markets','features'=>['Multi-timeframe signals','Breakout confirmation','Stop-loss and take-profit rules'],'image'=>'assets/bots/momentum.svg'],
 ['id'=>'quant','name'=>'Quant Matrix','price'=>10000,'rate'=>0.1500,'tag'=>'ADVANCED','strategy'=>'Quantitative & mean reversion','description'=>'Combines statistical signals with market-regime filters and position limits.','capacity'=>'Up to 15 markets','features'=>['Quant signal scoring','Regime-aware filters','Portfolio exposure limits'],'image'=>'assets/bots/quant.svg'],
 ['id'=>'neural','name'=>'Neural Trader','price'=>25000,'rate'=>0.2500,'tag'=>'PRO','strategy'=>'Ensemble AI signals','description'=>'A multi-strategy profile designed to evaluate signals across supported markets.','capacity'=>'Up to 25 markets','features'=>['Ensemble signal ranking','Advanced risk controls','Detailed trade journal'],'image'=>'assets/bots/neural.svg'],
 ['id'=>'apex','name'=>'Apex Autonomous','price'=>50000,'rate'=>0.4000,'tag'=>'ELITE','strategy'=>'Multi-market adaptive execution','description'=>'The highest-capacity profile, intended for a connected and monitored trading engine.','capacity'=>'Up to 40 markets','features'=>['Adaptive strategy selection','Expanded market coverage','Priority monitoring tools'],'image'=>'assets/bots/apex.svg']
];
$myBots = [];
$botQuery = $botSchemaReady ? mysqli_query($Conn, "SELECT id, plan_code, plan_name, capital, status, mining_status, daily_rate_percent, duration_days, starts_at, due_at, total_earned, created_at FROM user_trading_bots WHERE investor_id='" . mysqli_real_escape_string($Conn, (string)$_SESSION['User_id']) . "' ORDER BY id DESC LIMIT 20") : false;
if ($botQuery) while ($botRow = mysqli_fetch_assoc($botQuery)) $myBots[] = $botRow;
?>
<style>
.bot-page{max-width:1240px;margin:0 auto;padding:12px 0 34px;color:var(--cfxm-text,var(--text-color,#202438))}.bot-page *{box-sizing:border-box}.bot-hero{position:relative;overflow:hidden;padding:clamp(24px,4vw,42px);border:1px solid rgba(119,72,188,.24);border-radius:24px;background:radial-gradient(circle at 88% 12%,rgba(126,87,194,.32),transparent 32%),linear-gradient(125deg,#111f2b,#211b39 62%,#30204c);color:#fff}.bot-hero-grid{display:grid;grid-template-columns:minmax(0,1.5fr) minmax(200px,.7fr);gap:24px;align-items:center}.bot-eyebrow{font-size:10px;font-weight:850;letter-spacing:.16em;color:#cbb5ff;text-transform:uppercase}.bot-hero h1{margin:12px 0;color:#fff;font-size:clamp(27px,4vw,42px);font-weight:850;letter-spacing:-.045em}.bot-hero p{max-width:660px;color:rgba(255,255,255,.74);font-size:14px;line-height:1.8;margin:0}.bot-hero-stat{padding:20px;border:1px solid rgba(255,255,255,.15);border-radius:18px;background:rgba(255,255,255,.06)}.bot-hero-stat strong{display:block;font-size:26px;color:#fff}.bot-hero-stat span{font-size:11px;color:rgba(255,255,255,.7)}.bot-section-head{display:flex;justify-content:space-between;align-items:end;gap:16px;margin:30px 0 16px}.bot-section-head h2{margin:0 0 6px;font-size:22px;font-weight:850;color:var(--cfxm-text,var(--text-color,#202438))}.bot-section-head p{margin:0;font-size:12px;line-height:1.6;color:var(--cfxm-muted,var(--liner-text-color,#75808c))}.bot-plan-track{display:flex;gap:16px;overflow-x:auto;padding:4px 2px 18px;scroll-snap-type:x mandatory;scrollbar-width:thin;scrollbar-color:#7748bc transparent}.bot-card{display:flex;flex:0 0 300px;flex-direction:column;overflow:hidden;border:1px solid var(--cfxm-line,rgba(130,145,160,.2));border-radius:20px;background:var(--cfxm-surface,var(--card-bg,#fff));box-shadow:var(--cfxm-shadow,0 12px 32px rgba(23,27,44,.07));scroll-snap-align:start}.bot-card-art{position:relative;height:148px;background:#211b39;overflow:hidden}.bot-card-art img{width:100%;height:100%;object-fit:cover;opacity:.78;display:block}.bot-card-art:after{content:"";position:absolute;inset:0;background:linear-gradient(0deg,rgba(14,15,29,.9),transparent 75%)}.bot-card-badge{position:absolute;z-index:1;top:13px;left:13px;padding:6px 9px;border:1px solid rgba(255,255,255,.25);border-radius:999px;background:rgba(15,18,32,.58);color:#e7dcff;font-size:9px;font-weight:850;letter-spacing:.1em}.bot-card-icon{position:absolute;z-index:1;right:16px;bottom:13px;display:grid;place-items:center;width:42px;height:42px;border:1px solid rgba(255,255,255,.24);border-radius:14px;background:rgba(119,72,188,.75);color:#fff;font-size:20px}.bot-card-body{display:flex;flex:1;flex-direction:column;padding:18px}.bot-card-body h3{margin:0 0 5px;font-size:19px;font-weight:850;color:var(--cfxm-text,var(--text-color,#202438))}.bot-strategy{font-size:11px;font-weight:750;color:#9a73df}.bot-desc{min-height:56px;margin:12px 0;color:var(--cfxm-muted,var(--liner-text-color,#75808c));font-size:12px;line-height:1.7}.bot-price{margin:4px 0 2px;font-size:29px;font-weight:900;letter-spacing:-.04em;color:var(--cfxm-text,var(--text-color,#202438))}.bot-price small{font-size:11px;font-weight:650;letter-spacing:0;color:var(--cfxm-muted,var(--liner-text-color,#75808c))}.bot-daily-rate{display:flex;justify-content:space-between;gap:8px;padding:9px 0;border-top:1px solid var(--cfxm-line,rgba(130,145,160,.14));font-size:11px;color:var(--cfxm-muted,var(--liner-text-color,#75808c))}.bot-daily-rate strong{color:#2eae7d;font-weight:850}.bot-capacity{display:flex;align-items:center;gap:8px;margin:12px 0;padding:10px 11px;border-radius:11px;background:rgba(119,72,188,.09);color:var(--cfxm-text,var(--text-color,#202438));font-size:11px;font-weight:800}.bot-features{display:grid;gap:9px;padding:0;margin:4px 0 18px;list-style:none}.bot-features li{display:flex;gap:8px;align-items:flex-start;font-size:11px;line-height:1.5;color:var(--cfxm-muted,var(--liner-text-color,#75808c))}.bot-features i{margin-top:2px;color:#2eae7d}.bot-acquire{width:100%;min-height:44px;border:0;border-radius:12px;background:linear-gradient(135deg,#49247e,#7748bc);color:#fff;font-size:12px;font-weight:850;cursor:pointer}.bot-acquire:disabled{opacity:.6;cursor:wait}.bot-risk-note{display:flex;gap:12px;margin-top:18px;padding:16px;border:1px solid rgba(217,119,6,.22);border-radius:15px;background:rgba(217,119,6,.06);font-size:11px;line-height:1.7;color:var(--cfxm-muted,var(--liner-text-color,#75808c))}.bot-risk-note i{color:#d97706;font-size:17px}.bot-table-wrap{overflow:auto;border:1px solid var(--cfxm-line,rgba(130,145,160,.2));border-radius:16px;background:var(--cfxm-surface,var(--card-bg,#fff))}.bot-table{width:100%;border-collapse:collapse;min-width:900px}.bot-table th,.bot-table td{padding:13px 15px;text-align:left;border-bottom:1px solid var(--cfxm-line,rgba(130,145,160,.14));font-size:12px}.bot-table th{font-size:10px;letter-spacing:.08em;text-transform:uppercase;color:var(--cfxm-muted,var(--liner-text-color,#75808c))}.bot-status{display:inline-block;padding:5px 8px;border-radius:999px;background:rgba(217,119,6,.12);color:#d97706;font-size:10px;font-weight:800}.bot-empty{padding:24px;text-align:center;color:var(--cfxm-muted,var(--liner-text-color,#75808c));font-size:12px}@media(max-width:700px){.bot-hero-grid{grid-template-columns:1fr}.bot-hero-stat{max-width:none}.bot-section-head{align-items:flex-start;flex-direction:column}.bot-plan-track{gap:12px;overflow-x:auto;scroll-padding-inline:2px;-webkit-overflow-scrolling:touch;scrollbar-width:thin}.bot-card{flex:0 0 60vw;width:60vw;max-width:none}.bot-section-head>div p{max-width:100%}}@media(prefers-reduced-motion:reduce){.bot-card{scroll-behavior:auto}}
</style>
<div class="container-fluid"><main class="bot-page">
<section class="bot-hero"><div class="bot-hero-grid"><div><span class="bot-eyebrow"><i class="fas fa-brain"></i> CFXM Pro automation</span><h1>Meet your next trading assistant.</h1><p>Choose a bot profile and start a seven-day simulated mining cycle. Each plan has a configurable daily rate, and daily credits are posted automatically to Fin_Asset by the scheduled processor. Mining stops when the cycle expires.</p></div><div class="bot-hero-stat"><strong>5 bot profiles</strong><span>From $2,000 · Strategy and capacity tiers</span><div style="height:1px;background:rgba(255,255,255,.15);margin:15px 0"></div><span><i class="fas fa-shield-alt"></i> Risk controls · Activity tracking</span></div></div></section>
<div class="bot-section-head"><div><h2>Choose your AI bot</h2><p>Swipe horizontally on mobile to compare all five plans.</p></div><span class="bot-eyebrow">5 available plans</span></div>
<div class="bot-plan-track" aria-label="AI trading bot plans">
<?php foreach ($botPlans as $plan): ?>
<article class="bot-card"><div class="bot-card-art"><img src="<?php echo bot_h($plan['image']); ?>" alt="" loading="lazy"><span class="bot-card-badge"><?php echo bot_h($plan['tag']); ?></span><span class="bot-card-icon"><i class="fas fa-robot" aria-hidden="true"></i></span></div><div class="bot-card-body"><h3><?php echo bot_h($plan['name']); ?></h3><span class="bot-strategy"><?php echo bot_h($plan['strategy']); ?></span><p class="bot-desc"><?php echo bot_h($plan['description']); ?></p><div class="bot-price">$<?php echo number_format($plan['price']); ?> <small>plan capital</small></div><div class="bot-capacity"><i class="fas fa-layer-group"></i><?php echo bot_h($plan['capacity']); ?></div><div class="bot-daily-rate"><span>Simulated daily rate</span><strong><?php echo number_format((float)$plan['rate'], 4); ?>%</strong></div><div class="bot-daily-rate"><span>Mining duration</span><strong>7 days</strong></div><ul class="bot-features"><?php foreach ($plan['features'] as $feature): ?><li><i class="fas fa-check-circle"></i><span><?php echo bot_h($feature); ?></span></li><?php endforeach; ?></ul><button class="bot-acquire" type="button" data-plan="<?php echo bot_h($plan['id']); ?>" data-name="<?php echo bot_h($plan['name']); ?>" data-price="<?php echo (int)$plan['price']; ?>"><i class="fas fa-plus-circle"></i> Buy Bot</button></div></article>
<?php endforeach; ?>
</div>
<div class="bot-risk-note"><i class="fas fa-clock"></i><div><strong>Simulated mining cycle</strong><br>These rates power a seven-day simulated earnings system, not a live market execution engine. Credits are based on bot capital and the assigned daily rate, recorded in the bot ledger, and protected against duplicate daily processing. Configure the server cron job for automatic processing.</div></div>
<div class="bot-section-head"><div><h2>Your acquired bots</h2><p>Track daily rates, credited simulated earnings, and mining expiry.</p></div></div>
<div class="bot-table-wrap"><?php if (!$myBots): ?><div class="bot-empty"><i class="fas fa-robot" style="font-size:24px;display:block;margin-bottom:10px"></i><strong>No bots acquired yet</strong><br>Your acquired bot profiles will appear here.</div><?php else: ?><table class="bot-table"><thead><tr><th>Bot</th><th>Capital</th><th>Daily rate</th><th>Earned</th><th>Start</th><th>Due date</th><th>Mining status</th></tr></thead><tbody><?php foreach ($myBots as $bot): ?><tr><td><?php echo bot_h($bot['plan_name']); ?></td><td>$<?php echo number_format((float)$bot['capital'],2); ?></td><td><?php echo number_format((float)$bot['daily_rate_percent'],4); ?>%</td><td style="color:#2eae7d;font-weight:800">$<?php echo number_format((float)$bot['total_earned'],2); ?></td><td><?php echo bot_h($bot['starts_at'] ?: $bot['created_at']); ?></td><td><?php echo bot_h($bot['due_at'] ?: '—'); ?></td><td><span class="bot-status"><?php echo bot_h(ucfirst((string)$bot['mining_status'])); ?></span></td></tr><?php endforeach; ?></tbody></table><?php endif; ?></div>
</main></div>
<script>
(function(){
 document.querySelectorAll('.bot-acquire').forEach(function(button){
  button.addEventListener('click', async function(){
   var name=button.dataset.name, price=Number(button.dataset.price);
   var confirmed = await swal({
    title: 'Confirm bot purchase',
    text: 'Buy ' + name + ' for $' + price.toLocaleString() + '? The full amount will be deducted from either your Wallet Balance or Deposit Balance, whichever eligible balance can cover the purchase.',
    icon: 'warning',
    buttons: ['Cancel', 'Buy Bot'],
    dangerMode: false
   });
   if (!confirmed) return;

   button.disabled=true;
   button.innerHTML='<i class="fas fa-spinner fa-spin"></i> Processing...';
   try {
    var body=new URLSearchParams({action:'acquire',plan:button.dataset.plan,csrf:'<?php echo bot_h($_SESSION['bot_csrf'] = $_SESSION['bot_csrf'] ?? bin2hex(random_bytes(32))); ?>'});
    var response=await fetch('BotController.php',{method:'POST',headers:{'Content-Type':'application/x-www-form-urlencoded;charset=UTF-8','X-Requested-With':'XMLHttpRequest'},body:body.toString(),credentials:'same-origin'});
    var result=await response.json();
    if(!response.ok || !result.success) {
     await swal({
      title: response.status === 422 ? 'Insufficient funds' : 'Purchase unsuccessful',
      text: result.message || 'Could not acquire this bot. Please try again.',
      icon: response.status === 422 ? 'warning' : 'error',
      button: 'OK'
     });
     button.disabled=false;
     button.innerHTML='<i class="fas fa-plus-circle"></i> Buy Bot';
     return;
    }
    await swal({
     title: 'Bot purchased successfully',
     text: result.message,
     icon: 'success',
     button: 'Continue'
    });
    window.location.reload();
   } catch(error) {
    await swal({
     title: 'Request failed',
     text: error.message || 'Please check your connection and try again.',
     icon: 'error',
     button: 'OK'
    });
    button.disabled=false;
    button.innerHTML='<i class="fas fa-plus-circle"></i> Buy Bot';
   }
  });
 });
})();
</script>
<?php include('Footer.php'); ?>
</body>
</html>
 + price.toLocaleString() + '? The full amount will be deducted from either your Wallet Balance or Deposit Balance, whichever eligible balance can cover the purchase.',
    icon: 'warning',
    buttons: ['Cancel', 'Buy Bot'],
    dangerMode: false
   });
   if (!confirmed) return;

   button.disabled=true;
   button.innerHTML='<i class="fas fa-spinner fa-spin"></i> Processing...';
   try {
    var body=new URLSearchParams({action:'acquire',plan:button.dataset.plan,csrf:'<?php echo bot_h($_SESSION['bot_csrf'] = $_SESSION['bot_csrf'] ?? bin2hex(random_bytes(32))); ?>'});
    var response=await fetch('BotController.php',{method:'POST',headers:{'Content-Type':'application/x-www-form-urlencoded;charset=UTF-8','X-Requested-With':'XMLHttpRequest'},body:body.toString(),credentials:'same-origin'});
    var result=await response.json();
    if(!response.ok || !result.success) {
     await swal({
      title: response.status === 422 ? 'Insufficient funds' : 'Purchase unsuccessful',
      text: result.message || 'Could not acquire this bot. Please try again.',
      icon: response.status === 422 ? 'warning' : 'error',
      button: 'OK'
     });
     button.disabled=false;
     button.innerHTML='<i class="fas fa-plus-circle"></i> Buy Bot';
     return;
    }
    await swal({
     title: 'Bot purchased successfully',
     text: result.message,
     icon: 'success',
     button: 'Continue'
    });
    window.location.reload();
   } catch(error) {
    await swal({
     title: 'Request failed',
     text: error.message || 'Please check your connection and try again.',
     icon: 'error',
     button: 'OK'
    });
    button.disabled=false;
    button.innerHTML='<i class="fas fa-plus-circle"></i> Buy Bot';
   }
  });
 });
})();
</script>
<?php include('Footer.php'); ?>
</body>
</html>
