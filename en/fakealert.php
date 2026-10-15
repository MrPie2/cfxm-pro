<?php
/*
 * Illustrative demo activity toast.
 * Every item is synthetic and is clearly labeled as a demo, not a real payment.
 */
require_once __DIR__ . '/../Dashboard/DemoTransactions.php';
$paymentToastRecords = cfxmGetDemoTransactions();
?>
<style>
.cfxm-activity-toast{position:fixed;z-index:999999;top:12px;left:16px;bottom:auto;width:min(360px,calc(100vw - 32px));max-height:170px;padding:0;border:1px solid rgba(245,158,11,.35);border-radius:13px;overflow:hidden;background:var(--cfxm-surface,#19252e);color:var(--cfxm-text,#f4eee3);box-shadow:0 12px 32px rgba(0,0,0,.18);font-family:Inter,-apple-system,BlinkMacSystemFont,"Segoe UI",sans-serif;opacity:0;transform:translateY(-8px) scale(.99);pointer-events:none;transition:opacity .22s ease,transform .22s ease}
.cfxm-activity-toast.is-visible{opacity:1;transform:translateY(0) scale(1);pointer-events:auto}
.cfxm-toast-top{display:flex;align-items:center;gap:9px;padding:9px 10px 6px}
.cfxm-toast-icon{display:grid;place-items:center;width:32px;height:32px;flex:0 0 32px;border-radius:10px;background:rgba(245,158,11,.14);color:#f59e0b;font-size:14px}
.cfxm-toast-content{min-width:0;flex:1}
.cfxm-toast-kicker{display:flex;align-items:center;gap:5px;margin:0 0 2px;color:#f59e0b;font-size:9px;font-weight:850;letter-spacing:.06em;text-transform:uppercase}
.cfxm-toast-kicker .cfxm-success-dot{width:6px;height:6px;border-radius:50%;background:#f59e0b}
.cfxm-toast-title{margin:0;color:var(--cfxm-text,#f4eee3);font-size:11px;line-height:1.3;font-weight:850}
.cfxm-toast-subtitle{margin:3px 0 0;color:var(--cfxm-muted,#a5b1ba);font-size:9px;line-height:1.4}
.cfxm-toast-close{display:grid;place-items:center;width:24px;height:24px;flex:0 0 24px;border:0;border-radius:7px;background:rgba(255,255,255,.06);color:var(--cfxm-muted,#a5b1ba);cursor:pointer}
.cfxm-toast-details{display:flex;align-items:center;justify-content:space-between;gap:8px;margin:0 10px 6px;padding:5px 8px;border:1px solid var(--cfxm-line,rgba(223,208,184,.14));border-radius:8px;background:rgba(245,158,11,.05)}
.cfxm-toast-amount-label{display:block;color:var(--cfxm-muted,#a5b1ba);font-size:9px;font-weight:700}
.cfxm-toast-amount{display:block;margin-top:1px;color:#f59e0b;font-size:13px;font-weight:900;letter-spacing:-.025em}
.cfxm-toast-date{color:var(--cfxm-muted,#a5b1ba);font-size:9px;text-align:right;line-height:1.35;white-space:pre-line}
.cfxm-toast-progress{height:2px;background:rgba(255,255,255,.07)}
.cfxm-toast-progress span{display:block;width:100%;height:100%;background:#f59e0b;transform-origin:left}
.cfxm-activity-toast.is-visible .cfxm-toast-progress span{animation:cfxm-toast-progress 7s linear forwards}
@keyframes cfxm-toast-progress{to{transform:scaleX(0)}}
html[data-theme="light"] .cfxm-activity-toast{background:#fff;color:#202438;border-color:rgba(245,158,11,.28);box-shadow:0 20px 45px rgba(23,27,44,.13)}
html[data-theme="light"] .cfxm-toast-title{color:#202438}
html[data-theme="light"] .cfxm-toast-subtitle,html[data-theme="light"] .cfxm-toast-date,html[data-theme="light"] .cfxm-toast-amount-label{color:#687184}
@media(max-width:767px){.cfxm-activity-toast{top:8px;left:10px;bottom:auto;width:min(340px,calc(100vw - 20px));max-height:170px}}
@media(prefers-reduced-motion:reduce){.cfxm-activity-toast{transition:none}.cfxm-activity-toast.is-visible .cfxm-toast-progress span{animation:none}}
</style>

<aside class="cfxm-activity-toast" id="cfxm-activity-toast" role="status" aria-live="polite" aria-atomic="true" aria-hidden="true">
  <div class="cfxm-toast-top">
    <span class="cfxm-toast-icon" aria-hidden="true"><i class="fas fa-flask"></i></span>
    <div class="cfxm-toast-content">
      <div class="cfxm-toast-kicker"><span class="cfxm-success-dot"></span><span>Demo Transaction</span></div>
      <h3 class="cfxm-toast-title" id="cfxm-toast-title">Illustrative transaction activity</h3>
      <p class="cfxm-toast-subtitle" id="cfxm-toast-subtitle">Demo only — not a real payment.</p>
    </div>
    <button class="cfxm-toast-close" type="button" id="cfxm-toast-close" aria-label="Dismiss demo transaction notification"><i class="fas fa-times"></i></button>
  </div>
  <div class="cfxm-toast-details">
    <div><span class="cfxm-toast-amount-label">Illustrative amount</span><strong class="cfxm-toast-amount" id="cfxm-toast-amount"></strong></div>
    <time class="cfxm-toast-date" id="cfxm-toast-date"></time>
  </div>
  <div class="cfxm-toast-progress" aria-hidden="true"><span></span></div>
</aside>
<script>
(function () {
  'use strict';
  var toast = document.getElementById('cfxm-activity-toast');
  if (!toast || toast.dataset.initialized === '1') return;
  toast.dataset.initialized = '1';

  var records = <?php echo json_encode($paymentToastRecords, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT | JSON_UNESCAPED_SLASHES | JSON_INVALID_UTF8_SUBSTITUTE); ?>;
  var closeButton = document.getElementById('cfxm-toast-close');
  var timeoutId = null;
  var cycleId = null;
  var lastIndex = -1;
  var dismissed = false;

  function money(value) {
    return '$' + Number(value || 0).toLocaleString('en-US', {minimumFractionDigits:2, maximumFractionDigits:2});
  }
  function chooseRecord() {
    if (records.length < 2) return records[0];
    var index;
    do { index = Math.floor(Math.random() * records.length); } while (index === lastIndex);
    lastIndex = index;
    return records[index];
  }
  function showToast() {
    if (document.visibilityState !== 'visible' || dismissed || !records.length) return;
    var record = chooseRecord();
    document.getElementById('cfxm-toast-subtitle').textContent = (record.name || 'Demo Member') + ' · Demo only — not a real payment.';
    document.getElementById('cfxm-toast-amount').textContent = money(record.amount);
    document.getElementById('cfxm-toast-date').textContent = 'Demo date\n' + (record.date || 'Illustrative');

    var progress = toast.querySelector('.cfxm-toast-progress span');
    if (progress) {
      progress.style.animation = 'none';
      void progress.offsetWidth;
      progress.style.animation = '';
    }
    toast.classList.add('is-visible');
    toast.setAttribute('aria-hidden', 'false');
    if (timeoutId) window.clearTimeout(timeoutId);
    timeoutId = window.setTimeout(function () {
      toast.classList.remove('is-visible');
      toast.setAttribute('aria-hidden', 'true');
    }, 7000);
  }
  closeButton.addEventListener('click', function () {
    dismissed = true;
    if (timeoutId) window.clearTimeout(timeoutId);
    if (cycleId) window.clearInterval(cycleId);
    toast.classList.remove('is-visible');
    toast.setAttribute('aria-hidden', 'true');
  });
  window.setTimeout(showToast, 4500);
  cycleId = window.setInterval(showToast, 18000);
})();
</script>
