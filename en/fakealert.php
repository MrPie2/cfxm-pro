<?php
/*
 * Shared dashboard activity notifications.
 * Successful sample activity is explicitly labelled as simulated.
 * Pending withdrawal notifications are read from actual database records.
 */
$fakeAlertPending = [];
if (isset($Conn) && $Conn instanceof mysqli) {
    $fakeAlertSql = "SELECT w.Amount_Withdrawn, w.Date, i.First_Name
                     FROM withdrawals AS w
                     LEFT JOIN investors AS i ON i.Investor_id = w.Investor_id
                     WHERE w.Status = 0
                     ORDER BY w.id DESC
                     LIMIT 20";
    $fakeAlertResult = @mysqli_query($Conn, $fakeAlertSql);
    if ($fakeAlertResult) {
        while ($fakeAlertRow = mysqli_fetch_assoc($fakeAlertResult)) {
            $fakeAlertPending[] = $fakeAlertRow;
        }
        mysqli_free_result($fakeAlertResult);
    }
}
$fakeAlertPendingItem = $fakeAlertPending
    ? $fakeAlertPending[array_rand($fakeAlertPending)]
    : null;
$fakeAlertPendingName = 'A platform member';
$fakeAlertPendingDate = 'Date not recorded';
$fakeAlertPendingAmount = 0;
if ($fakeAlertPendingItem) {
    $fakeAlertFirstName = trim((string)($fakeAlertPendingItem['First_Name'] ?? ''));
    if ($fakeAlertFirstName !== '') {
        $fakeAlertPendingName = $fakeAlertFirstName;
    }
    $fakeAlertPendingAmount = (float)($fakeAlertPendingItem['Amount_Withdrawn'] ?? 0);
    $fakeAlertTimestamp = strtotime((string)($fakeAlertPendingItem['Date'] ?? ''));
    if ($fakeAlertTimestamp !== false) {
        $fakeAlertPendingDate = date('M j, Y', $fakeAlertTimestamp);
    }
}
?>
<style>
.cfxm-activity-toast{position:fixed;z-index:999999;top:12px;left:16px;bottom:auto;width:min(360px,calc(100vw - 32px));max-height:150px;padding:0;border:1px solid rgba(172,145,226,.28);border-radius:13px;overflow:hidden;background:var(--cfxm-surface,#19252e);color:var(--cfxm-text,#f4eee3);box-shadow:0 12px 32px rgba(0,0,0,.22);font-family:Inter,-apple-system,BlinkMacSystemFont,"Segoe UI",sans-serif;opacity:0;transform:translateY(-8px) scale(.99);pointer-events:none;transition:opacity .22s ease,transform .22s ease}
.cfxm-activity-toast.is-visible{opacity:1;transform:translateY(0) scale(1);pointer-events:auto}
.cfxm-toast-top{display:flex;align-items:center;gap:9px;padding:9px 10px 6px}
.cfxm-toast-icon{display:grid;place-items:center;width:32px;height:32px;flex:0 0 32px;border-radius:10px;background:linear-gradient(145deg,#49247e,#8c63d3);color:#fff;font-size:13px}
.cfxm-toast-content{min-width:0;flex:1}
.cfxm-toast-kicker{display:flex;align-items:center;gap:5px;margin:0 0 2px;color:#c8a9f4;font-size:8px;font-weight:850;letter-spacing:.08em;text-transform:uppercase}
.cfxm-toast-kicker .cfxm-demo-dot{width:6px;height:6px;border-radius:50%;background:#d8b8ff}
.cfxm-toast-title{margin:0;color:var(--cfxm-text,#f4eee3);font-size:11px;line-height:1.3;font-weight:850}
.cfxm-toast-subtitle{margin:2px 0 0;color:var(--cfxm-muted,#a5b1ba);font-size:9px;line-height:1.35}
.cfxm-toast-close{display:grid;place-items:center;width:24px;height:24px;flex:0 0 24px;border:0;border-radius:7px;background:rgba(255,255,255,.06);color:var(--cfxm-muted,#a5b1ba);cursor:pointer}
.cfxm-toast-details{display:flex;align-items:center;justify-content:space-between;gap:8px;margin:0 10px 6px;padding:5px 8px;border:1px solid var(--cfxm-line,rgba(223,208,184,.14));border-radius:8px;background:rgba(255,255,255,.035)}
.cfxm-toast-amount-label{display:block;color:var(--cfxm-muted,#a5b1ba);font-size:9px;font-weight:700}
.cfxm-toast-amount{display:block;margin-top:1px;color:var(--cfxm-text,#f4eee3);font-size:13px;font-weight:900;letter-spacing:-.025em}
.cfxm-toast-date{color:var(--cfxm-muted,#a5b1ba);font-size:9px;text-align:right;line-height:1.35;white-space:pre-line}
.cfxm-toast-foot{padding:4px 10px;background:rgba(119,72,188,.1);color:var(--cfxm-muted,#a5b1ba);font-size:8px;line-height:1.3;white-space:nowrap;overflow:hidden;text-overflow:ellipsis}
.cfxm-toast-foot strong{color:var(--cfxm-text,#f4eee3)}
.cfxm-toast-progress{height:2px;background:rgba(255,255,255,.07)}
.cfxm-toast-progress span{display:block;width:100%;height:100%;background:linear-gradient(90deg,#7748bc,#c8a9f4);transform-origin:left}
.cfxm-activity-toast.is-visible .cfxm-toast-progress span{animation:cfxm-toast-progress 7s linear forwards}
@keyframes cfxm-toast-progress{to{transform:scaleX(0)}}
html[data-theme="light"] .cfxm-activity-toast{background:#fff;color:#202438;border-color:rgba(73,36,126,.16);box-shadow:0 20px 60px rgba(23,27,44,.18)}
html[data-theme="light"] .cfxm-toast-title,html[data-theme="light"] .cfxm-toast-amount,html[data-theme="light"] .cfxm-toast-foot strong{color:#202438}
html[data-theme="light"] .cfxm-toast-subtitle,html[data-theme="light"] .cfxm-toast-date,html[data-theme="light"] .cfxm-toast-amount-label{color:#687184}
@media(max-width:767px){.cfxm-activity-toast{top:8px;left:10px;bottom:auto;width:min(340px,calc(100vw - 20px));max-height:150px}}
@media(prefers-reduced-motion:reduce){.cfxm-activity-toast{transition:none}.cfxm-activity-toast.is-visible .cfxm-toast-progress span{animation:none}}
</style>

<aside class="cfxm-activity-toast" id="cfxm-activity-toast" role="status" aria-live="polite" aria-atomic="true" aria-hidden="true">
  <div class="cfxm-toast-top">
    <span class="cfxm-toast-icon" id="cfxm-toast-icon" aria-hidden="true"><i class="fas fa-chart-line"></i></span>
    <div class="cfxm-toast-content">
      <div class="cfxm-toast-kicker"><span class="cfxm-demo-dot"></span><span id="cfxm-toast-kicker">Sample activity · simulated</span></div>
      <h3 class="cfxm-toast-title" id="cfxm-toast-title">Sample withdrawal activity</h3>
      <p class="cfxm-toast-subtitle" id="cfxm-toast-subtitle">Illustrative activity only — not a real transaction.</p>
    </div>
    <button class="cfxm-toast-close" type="button" id="cfxm-toast-close" aria-label="Dismiss activity notification"><i class="fas fa-times"></i></button>
  </div>
  <div class="cfxm-toast-details">
    <div><span class="cfxm-toast-amount-label" id="cfxm-toast-amount-label">Illustrative total</span><strong class="cfxm-toast-amount" id="cfxm-toast-amount">$0.00</strong></div>
    <time class="cfxm-toast-date" id="cfxm-toast-date"></time>
  </div>
  <div class="cfxm-toast-foot" id="cfxm-toast-foot"><strong>Demo only.</strong> This notification is generated for interface preview purposes.</div>
  <div class="cfxm-toast-progress" aria-hidden="true"><span></span></div>
</aside>

<script>
(function () {
  'use strict';
  var toast = document.getElementById('cfxm-activity-toast');
  if (!toast || toast.dataset.initialized === '1') return;
  toast.dataset.initialized = '1';

  var pending = <?php echo json_encode($fakeAlertPendingItem ? [
      'name' => $fakeAlertPendingName,
      'amount' => $fakeAlertPendingAmount,
      'date' => $fakeAlertPendingDate
  ] : null, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT); ?>;
  var closeButton = document.getElementById('cfxm-toast-close');
  var timeoutId = null;
  var cycleId = null;
  var showPendingNext = false;

  function recentDate() {
    var date = new Date();
    date.setDate(date.getDate() - Math.floor(Math.random() * 7));
    return date.toLocaleDateString('en-US', {month:'short', day:'numeric', year:'numeric'});
  }
  function money(value) {
    return '$' + Number(value || 0).toLocaleString('en-US', {minimumFractionDigits:2, maximumFractionDigits:2});
  }
  function setText(id, value) {
    var element = document.getElementById(id);
    if (element) element.textContent = value;
  }
  function renderSample() {
    var profit = Math.floor(Math.random() * 20000) + 1;
    var bonus = Math.floor(Math.random() * 500) + 1;
    var total = profit + bonus;
    document.getElementById('cfxm-toast-icon').innerHTML = '<i class="fas fa-chart-line" aria-hidden="true"></i>';
    setText('cfxm-toast-kicker', 'Sample activity · simulated');
    setText('cfxm-toast-title', 'Illustrative withdrawal success');
    setText('cfxm-toast-subtitle', 'A sample transaction preview, not a customer payment.');
    setText('cfxm-toast-amount-label', 'Illustrative total');
    setText('cfxm-toast-amount', money(total));
    setText('cfxm-toast-date', 'Sample date\n' + recentDate());
    setText('cfxm-toast-foot', 'Demo only. Amounts and dates are randomly generated and do not represent real transactions.');
  }
  function renderPending() {
    document.getElementById('cfxm-toast-icon').innerHTML = '<i class="fas fa-hourglass-half" aria-hidden="true"></i>';
    setText('cfxm-toast-kicker', 'Live database record');
    setText('cfxm-toast-title', 'Withdrawal request pending');
    setText('cfxm-toast-subtitle', (pending.name || 'A platform member') + ' has a request awaiting review.');
    setText('cfxm-toast-amount-label', 'Requested amount');
    setText('cfxm-toast-amount', money(pending.amount));
    setText('cfxm-toast-date', 'Record date\n' + (pending.date || 'Date not recorded'));
    setText('cfxm-toast-foot', 'This pending request is read from the withdrawals database. Pending status does not mean payment is complete.');
  }
  function hideToast() {
    toast.classList.remove('is-visible');
    toast.setAttribute('aria-hidden', 'true');
    if (timeoutId) window.clearTimeout(timeoutId);
  }
  function showToast() {
    if (document.visibilityState !== 'visible') return;
    if (showPendingNext && pending) renderPending(); else renderSample();
    showPendingNext = !showPendingNext;
    var progress = toast.querySelector('.cfxm-toast-progress span');
    if (progress) {
      progress.style.animation = 'none';
      void progress.offsetWidth;
      progress.style.animation = '';
    }
    toast.classList.add('is-visible');
    toast.setAttribute('aria-hidden', 'false');
    if (timeoutId) window.clearTimeout(timeoutId);
    timeoutId = window.setTimeout(hideToast, 7000);
  }
  closeButton.addEventListener('click', function () {
    hideToast();
    if (cycleId) window.clearTimeout(cycleId);
    cycleId = window.setTimeout(showToast, 45000);
  });
  window.setTimeout(showToast, 4500);
  cycleId = window.setInterval(showToast, 45000);
  document.addEventListener('visibilitychange', function () {
    if (document.visibilityState === 'visible' && !toast.classList.contains('is-visible')) {
      // Leave the normal cycle in place; do not interrupt a user actively viewing another tab.
    }
  });
})();
</script>
