<?php
session_start();
if (!isset($_SESSION['User_id'])) {
    header('Location: LoginContainer.php');
    exit;
}
include('Header.php');
$withdrawRows = array();
$withdrawCounts = array('all' => 0, 'pending' => 0, 'successful' => 0, 'failed' => 0);
$withdrawTotal = 0;
$withdrawQuery = mysqli_query($Conn, "SELECT * FROM withdrawals WHERE Investor_id='" . mysqli_real_escape_string($Conn, (string)$Investor_id) . "' ORDER BY id DESC");
if ($withdrawQuery) {
    while ($row = mysqli_fetch_assoc($withdrawQuery)) {
        $row['_status_label'] = ((string)$row['Status'] === '0') ? 'Pending' : (((string)$row['Status'] === '2') ? 'Successful' : 'Failed');
        $withdrawRows[] = $row;
        $withdrawCounts['all']++;
        if ($row['_status_label'] === 'Pending') $withdrawCounts['pending']++;
        elseif ($row['_status_label'] === 'Successful') { $withdrawCounts['successful']++; $withdrawTotal += (float)$row['Amount_Withdrawn']; }
        else $withdrawCounts['failed']++;
    }
}
$withdrawMoney = function($amount) use ($curAbbr, $exchangerate) {
    return htmlspecialchars((string)$curAbbr, ENT_QUOTES, 'UTF-8') . number_format((float)$amount * (float)$exchangerate, 2, '.', ',');
};
$withdrawEscape = function($value) { return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8'); };
?>
<style>
.cfx-money-page{--mp-line:var(--cfxm-line,rgba(223,208,184,.14));--mp-panel:var(--cfxm-surface,#222831);--mp-raised:var(--cfxm-surface-raised,#27313b);--mp-ink:var(--cfxm-text,#DFD0B8);--mp-muted:var(--cfxm-muted,#a5b1ba);color:var(--mp-ink);padding:8px 0 24px}.cfx-money-page *{box-sizing:border-box}.cfx-money-page a{text-decoration:none}
.mp-hero{position:relative;overflow:hidden;display:flex;align-items:center;justify-content:space-between;gap:24px;padding:clamp(22px,4vw,36px);border:1px solid rgba(157,119,226,.25);border-radius:22px;background:radial-gradient(circle at 90% 15%,rgba(147,94,221,.27),transparent 32%),linear-gradient(125deg,#171a2e,#24233b 60%,#30234b);color:#fff;margin-bottom:20px}.mp-hero:after{content:"";position:absolute;width:190px;height:190px;border:1px solid rgba(255,255,255,.09);border-radius:50%;right:10%;top:-95px;box-shadow:0 0 0 22px rgba(255,255,255,.025),0 0 0 46px rgba(255,255,255,.02)}.mp-hero-copy{position:relative;z-index:1;max-width:640px}.mp-eyebrow{display:inline-flex;align-items:center;gap:8px;font-size:10px;font-weight:800;letter-spacing:.14em;text-transform:uppercase;color:#d4bafa}.mp-hero h2{font-size:clamp(24px,3.2vw,34px);line-height:1.15;margin:12px 0 9px;color:#fff;font-weight:800;letter-spacing:-.035em}.mp-hero p{max-width:560px;margin:0;color:rgba(255,255,255,.72);font-size:13px;line-height:1.75}.mp-hero-action{position:relative;z-index:2;display:inline-flex;align-items:center;justify-content:center;gap:10px;flex-shrink:0;padding:13px 18px;border-radius:12px;background:#fff;color:#39205f!important;font-size:12px;font-weight:800;box-shadow:0 8px 22px rgba(0,0,0,.18);transition:transform .2s}.mp-hero-action:hover{transform:translateY(-2px)}
.mp-stats{display:grid;grid-template-columns:repeat(4,minmax(0,1fr));gap:13px;margin:0 0 20px}.mp-stat{min-width:0;padding:17px;border:1px solid var(--mp-line);border-radius:17px;background:var(--mp-panel);box-shadow:0 8px 24px rgba(0,0,0,.04)}.mp-stat-top{display:flex;align-items:center;justify-content:space-between;gap:8px;color:var(--mp-muted);font-size:11px;font-weight:650}.mp-stat-icon{display:grid;place-items:center;width:34px;height:34px;border-radius:11px;background:rgba(119,72,188,.16);color:#bda0f0;font-size:14px;flex-shrink:0}.mp-stat strong{display:block;margin-top:13px;color:var(--mp-ink);font-size:clamp(20px,2.2vw,26px);font-weight:800;letter-spacing:-.03em}.mp-stat small{display:block;margin-top:5px;color:var(--mp-muted);font-size:10px}
.mp-panel{overflow:hidden;border:1px solid var(--mp-line);border-radius:19px;background:var(--mp-panel);box-shadow:0 10px 28px rgba(0,0,0,.04)}.mp-panel-head{display:flex;align-items:center;justify-content:space-between;gap:16px;padding:20px 22px;border-bottom:1px solid var(--mp-line)}.mp-panel-head h3{margin:0;color:var(--mp-ink);font-size:15px;font-weight:800}.mp-panel-head p{margin:5px 0 0;color:var(--mp-muted);font-size:11px}.mp-tools{display:flex;align-items:center;gap:10px}.mp-search{width:min(260px,35vw);padding:10px 12px;border:1px solid var(--mp-line);border-radius:10px;background:var(--mp-raised);color:var(--mp-ink);font-size:12px;outline:none}.mp-search:focus{border-color:#8b63ca;box-shadow:0 0 0 3px rgba(119,72,188,.15)}.mp-table-wrap{overflow-x:auto}.mp-table{width:100%;border-collapse:collapse;min-width:680px}.mp-table th{padding:13px 18px;text-align:left;color:var(--mp-muted);background:rgba(130,140,155,.04);font-size:9px;letter-spacing:.09em;text-transform:uppercase;font-weight:800;white-space:nowrap}.mp-table td{padding:15px 18px;border-top:1px solid var(--mp-line);color:var(--mp-ink);font-size:11px;vertical-align:middle}.mp-table tbody tr:hover{background:rgba(119,72,188,.045)}.mp-person{display:flex;align-items:center;gap:10px;min-width:150px}.mp-avatar{display:grid;place-items:center;width:34px;height:34px;border-radius:11px;background:linear-gradient(140deg,#51318a,#9973d5);color:#fff;font-size:11px;font-weight:800;flex-shrink:0}.mp-person strong{display:block;font-size:11px;font-weight:750}.mp-person small{display:block;margin-top:4px;color:var(--mp-muted);font-size:9px}.mp-amount{font-weight:800;white-space:nowrap}.mp-pill{display:inline-flex;align-items:center;gap:6px;padding:6px 9px;border-radius:100px;font-size:9px;font-weight:800;white-space:nowrap}.mp-pill:before{content:"";width:5px;height:5px;border-radius:50%;background:currentColor}.mp-pill.pending{background:rgba(224,166,69,.12);color:#e4b35c}.mp-pill.success{background:rgba(56,189,145,.12);color:#38bd91}.mp-pill.failed{background:rgba(237,132,147,.11);color:#ed8493}.mp-empty{padding:44px 20px;text-align:center}.mp-empty-icon{display:grid;place-items:center;width:54px;height:54px;margin:0 auto 14px;border-radius:17px;background:rgba(119,72,188,.14);color:#bda0f0;font-size:21px}.mp-empty h4{margin:0 0 7px;color:var(--mp-ink);font-size:14px}.mp-empty p{margin:0 auto 17px;max-width:360px;color:var(--mp-muted);font-size:11px;line-height:1.7}.mp-note{display:flex;gap:11px;padding:15px 17px;margin-top:16px;border:1px solid var(--mp-line);border-radius:14px;background:var(--mp-raised);color:var(--mp-muted);font-size:10px;line-height:1.7}.mp-note i{margin-top:2px;color:#bda0f0;font-size:14px}
@media(max-width:900px){.mp-stats{grid-template-columns:repeat(2,minmax(0,1fr))}.mp-hero{align-items:flex-start;flex-direction:column}.mp-hero-action{align-self:flex-start}}@media(max-width:520px){.cfx-money-page{padding-top:2px}.mp-hero{padding:22px 19px;border-radius:17px}.mp-hero h2{font-size:25px}.mp-stats{gap:9px}.mp-stat{padding:13px;border-radius:14px}.mp-stat strong{font-size:21px}.mp-stat-icon{width:30px;height:30px}.mp-panel-head{align-items:flex-start;flex-direction:column;padding:17px}.mp-tools{width:100%}.mp-search{width:100%}.mp-table th,.mp-table td{padding:13px}.mp-note{font-size:10px}}
html[data-theme="light"] .cfx-money-page{--mp-panel:#fff;--mp-raised:#f6f7fb;--mp-ink:#202438;--mp-muted:#687184;--mp-line:rgba(26,35,55,.12)}
</style>
<div class="container-fluid cfx-money-page">
  <section class="mp-hero"><div class="mp-hero-copy"><span class="mp-eyebrow"><i class="fas fa-wallet"></i> Wallet · Withdrawals</span><h2>Your money, clearly tracked.</h2><p>Review previous withdrawal requests, see their latest recorded status and start a new withdrawal when you're ready.</p></div><a class="mp-hero-action" href="Withdraw.php?Location=Account_Balance"><i class="fas fa-arrow-up"></i> Withdraw funds <i class="fas fa-arrow-right"></i></a></section>
  <section class="mp-stats" aria-label="Withdrawal overview">
    <article class="mp-stat"><div class="mp-stat-top"><span>Total requests</span><span class="mp-stat-icon"><i class="fas fa-receipt"></i></span></div><strong><?php echo number_format($withdrawCounts['all']); ?></strong><small>All recorded withdrawals</small></article>
    <article class="mp-stat"><div class="mp-stat-top"><span>Successfully withdrawn</span><span class="mp-stat-icon"><i class="fas fa-check-circle"></i></span></div><strong><?php echo $withdrawMoney($withdrawTotal); ?></strong><small>Successful requests only</small></article>
    <article class="mp-stat"><div class="mp-stat-top"><span>Pending requests</span><span class="mp-stat-icon"><i class="fas fa-clock"></i></span></div><strong><?php echo number_format($withdrawCounts['pending']); ?></strong><small>Awaiting processing</small></article>
    <article class="mp-stat"><div class="mp-stat-top"><span>Failed requests</span><span class="mp-stat-icon"><i class="fas fa-exclamation-circle"></i></span></div><strong><?php echo number_format($withdrawCounts['failed']); ?></strong><small>Review details if needed</small></article>
  </section>
  <section class="mp-panel"><header class="mp-panel-head"><div><h3>Withdrawal history</h3><p>Amounts and destination details from your recorded requests</p></div><div class="mp-tools"><input id="withdrawSearch" class="mp-search" type="search" placeholder="Search status or destination…" aria-label="Search withdrawal history"></div></header>
  <?php if (!$withdrawRows) { ?><div class="mp-empty"><span class="mp-empty-icon"><i class="fas fa-wallet"></i></span><h4>No withdrawals yet</h4><p>Your withdrawal requests and their statuses will be listed here after you submit your first request.</p><a class="mp-hero-action" href="Withdraw.php?Location=Account_Balance"><i class="fas fa-arrow-up"></i> Start a withdrawal</a></div>
  <?php } else { ?><div class="mp-table-wrap"><table class="mp-table" id="withdrawTable"><thead><tr><th>Request</th><th>Amount</th><th>Withdrawn from</th><th>Destination</th><th>Status</th><th>Date</th></tr></thead><tbody>
  <?php foreach ($withdrawRows as $row) { $label=$row['_status_label'];$class=$label==='Pending'?'pending':($label==='Successful'?'success':'failed');$destination=trim((string)($row['BOP']??'').' '.(string)($row['walletaddress']??''));$source=(string)($row['Destination']??'Account');$initials=strtoupper(substr(preg_replace('/[^a-z0-9]/i','',$source),0,2)); ?>
    <tr data-search="<?php echo $withdrawEscape(strtolower($label.' '.$destination.' '.$source.' '.$row['Date'])); ?>">
      <td><div class="mp-person"><span class="mp-avatar"><?php echo $withdrawEscape($initials?:'WD'); ?></span><span><strong>Withdrawal #<?php echo (int)$row['id']; ?></strong><small>Request record</small></span></div></td>
      <td><span class="mp-amount"><?php echo $withdrawMoney($row['Amount_Withdrawn']); ?></span></td>
      <td><?php echo $withdrawEscape($source); ?></td><td><?php echo $withdrawEscape($destination ?: 'Destination not recorded'); ?></td>
      <td><span class="mp-pill <?php echo $class; ?>"><?php echo $withdrawEscape($label); ?></span></td><td><?php echo $withdrawEscape($row['Date']??'—'); ?></td>
    </tr>
  <?php } ?></tbody></table><div class="mp-empty" id="withdrawNoMatch" style="display:none;padding:24px"><p>No withdrawals match your search.</p></div></div><?php } ?>
  </section>
  <div class="mp-note"><i class="fas fa-shield-alt"></i><span><strong style="color:var(--mp-ink)">Before you withdraw.</strong> Double-check your destination details and review any applicable verification requirements, processing times and fees. A pending request has not yet been recorded as successful.</span></div>
</div>
<script>
(function($){$('#withdrawSearch').on('input',function(){var term=String($(this).val()||'').toLowerCase().trim(),visible=0;$('#withdrawTable tbody tr').each(function(){var match=String($(this).attr('data-search')||'').indexOf(term)!==-1;$(this).toggle(match);if(match)visible++;});$('#withdrawNoMatch').toggle(visible===0&&$('#withdrawTable tbody tr').length>0);});})(jQuery);
</script>
<?php include('Footer.php'); ?>
<script src="js/lib/jquery/jquery.min.js"></script><script src="js/lib/bootstrap/js/popper.min.js"></script><script src="js/lib/bootstrap/js/bootstrap.min.js"></script><script src="js/jquery.slimscroll.js"></script><script src="js/sidebarmenu.js"></script><script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script><script src="js/custom.min.js"></script>
</body></html>
