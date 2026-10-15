<?php
session_start();
if (!isset($_SESSION['User_id'])) {
    header('Location: LoginContainer.php');
    exit;
}
$PageTitle = 'Earners & Withdrawal Activity | CFXM Pro';
include __DIR__ . '/Header.php';
require_once __DIR__ . '/EarnersController.php';

$earnersFormatDate = static function ($date): string {
    $date = trim((string)$date);
    if ($date === '') return 'Date not recorded';
    $timestamp = strtotime($date);
    return $timestamp !== false ? date('M j, Y', $timestamp) : $date;
};
$earnersFormatAmount = static function ($amount): string {
    return '$' . number_format((float)$amount, 2, '.', ',');
};
$earnersInitials = static function ($name): string {
    $parts = preg_split('/\s+/', trim((string)$name));
    $initials = '';
    foreach (array_slice($parts ?: [], 0, 2) as $part) {
        if ($part !== '') $initials .= strtoupper(substr($part, 0, 1));
    }
    return $initials !== '' ? $initials : 'M';
};
?>
<style>
:root{--er-bg:var(--cfxm-bg,#121f27);--er-panel:var(--cfxm-surface,#222831);--er-raised:var(--cfxm-surface-raised,#27313b);--er-ink:var(--cfxm-text,#DFD0B8);--er-muted:var(--cfxm-muted,#a5b1ba);--er-line:var(--cfxm-line,rgba(223,208,184,.14))}
*{box-sizing:border-box}body{margin:0;background:var(--er-bg);color:var(--er-ink);font-family:Inter,-apple-system,BlinkMacSystemFont,"Segoe UI",sans-serif}.earners-shell{width:min(1120px,calc(100% - 32px));margin:0 auto;padding:24px 0 56px}.er-nav{display:flex;align-items:center;justify-content:space-between;gap:16px;padding:5px 0 26px}.er-brand{display:flex;align-items:center;gap:10px;color:var(--er-ink);font-weight:850;font-size:15px;text-decoration:none}.er-brand-mark{display:grid;place-items:center;width:38px;height:38px;border-radius:12px;background:linear-gradient(135deg,#49247e,#7748bc);color:#fff}.er-nav-link{display:inline-flex;align-items:center;gap:8px;padding:10px 14px;border:1px solid var(--er-line);border-radius:11px;color:var(--er-ink);font-size:12px;font-weight:750;text-decoration:none}.er-hero{position:relative;overflow:hidden;padding:clamp(24px,5vw,44px);border:1px solid rgba(151,116,216,.25);border-radius:24px;background:radial-gradient(circle at 85% 10%,rgba(151,116,216,.25),transparent 34%),linear-gradient(125deg,#171a2e,#24233b 60%,#30234b);color:#fff}.er-eyebrow{display:inline-flex;align-items:center;gap:8px;color:#d8c4ff;font-size:10px;font-weight:850;letter-spacing:.15em;text-transform:uppercase}.er-hero h1{max-width:650px;margin:14px 0 12px;color:#fff;font-size:clamp(29px,5vw,45px);line-height:1.08;letter-spacing:-.045em;font-weight:850}.er-hero p{max-width:650px;margin:0;color:rgba(255,255,255,.74);font-size:14px;line-height:1.8}.er-trust-strip{display:flex;flex-wrap:wrap;gap:10px;margin-top:22px}.er-trust-strip span{display:inline-flex;align-items:center;gap:7px;padding:8px 11px;border:1px solid rgba(255,255,255,.14);border-radius:99px;background:rgba(255,255,255,.06);color:rgba(255,255,255,.86);font-size:10px;font-weight:700}.er-stats{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:14px;margin:18px 0 26px}.er-stat{display:flex;align-items:center;gap:14px;padding:18px;border:1px solid var(--er-line);border-radius:17px;background:var(--er-panel)}.er-stat-icon{display:grid;place-items:center;width:44px;height:44px;flex:0 0 44px;border-radius:14px;background:rgba(119,72,188,.15);color:#bfa3f0;font-size:17px}.er-stat span{display:block;color:var(--er-muted);font-size:11px}.er-stat strong{display:block;margin-top:4px;color:var(--er-ink);font-size:23px;font-weight:850}.er-section-head{display:flex;align-items:end;justify-content:space-between;gap:12px;margin:28px 0 14px}.er-section-head h2{margin:0 0 5px;color:var(--er-ink);font-size:20px;font-weight:850;letter-spacing:-.025em}.er-section-head p{margin:0;color:var(--er-muted);font-size:12px;line-height:1.65}.er-count{padding:7px 10px;border:1px solid var(--er-line);border-radius:99px;color:var(--er-muted);font-size:10px;font-weight:800;white-space:nowrap}.er-list{overflow:hidden;border:1px solid var(--er-line);border-radius:18px;background:var(--er-panel)}.er-row{display:grid;grid-template-columns:minmax(0,1fr) auto auto;align-items:center;gap:18px;padding:15px 18px;border-bottom:1px solid var(--er-line)}.er-row:last-child{border-bottom:0}.er-person{display:flex;align-items:center;gap:11px;min-width:0}.er-avatar{display:grid;place-items:center;width:39px;height:39px;flex:0 0 39px;border-radius:13px;background:linear-gradient(145deg,#50318a,#9771d3);color:#fff;font-size:11px;font-weight:850}.er-person strong{display:block;overflow:hidden;color:var(--er-ink);font-size:12px;font-weight:800;text-overflow:ellipsis;white-space:nowrap}.er-person small{display:block;margin-top:4px;color:var(--er-muted);font-size:10px}.er-amount{color:var(--er-ink);font-size:12px;font-weight:850;white-space:nowrap}.er-meta{text-align:right}.er-date{display:block;color:var(--er-muted);font-size:10px;white-space:nowrap}.er-status{display:inline-flex;align-items:center;gap:6px;margin-top:6px;padding:6px 8px;border-radius:99px;font-size:9px;font-weight:850;white-space:nowrap}.er-status:before{content:"";width:5px;height:5px;border-radius:50%;background:currentColor}.er-status.complete{background:rgba(56,189,145,.12);color:#38bd91}.er-status.pending{background:rgba(224,166,69,.12);color:#e4b35c}.er-empty{padding:34px 18px;text-align:center;color:var(--er-muted);font-size:12px;line-height:1.7}.er-empty i{display:block;margin-bottom:10px;color:#bfa3f0;font-size:24px}.er-disclaimer{display:flex;align-items:flex-start;gap:12px;margin-top:20px;padding:15px 17px;border:1px solid var(--er-line);border-radius:15px;background:var(--er-raised);color:var(--er-muted);font-size:10px;line-height:1.75}.er-disclaimer i{margin-top:2px;color:#bfa3f0;font-size:15px}.er-footer{display:flex;justify-content:space-between;gap:14px;margin-top:24px;padding-top:17px;border-top:1px solid var(--er-line);color:var(--er-muted);font-size:10px}.er-footer a{color:var(--er-muted);text-decoration:none}
html[data-theme="light"] body{--er-bg:var(--cfxm-bg,#f5f6fa);--er-panel:var(--cfxm-surface,#fff);--er-raised:var(--cfxm-bg-deep,#edf0f5);--er-ink:var(--cfxm-text,#202438);--er-muted:var(--cfxm-muted,#687184);--er-line:var(--cfxm-line,rgba(26,35,55,.12))}
@media(max-width:650px){.earners-shell{width:min(100% - 22px,1120px);padding-top:0}.er-hero{border-radius:19px}.er-stats{gap:9px}.er-stat{padding:13px;gap:10px}.er-stat-icon{width:36px;height:36px;flex-basis:36px;border-radius:11px}.er-stat strong{font-size:19px}.er-row{grid-template-columns:minmax(0,1fr) auto;gap:10px;padding:14px 12px}.er-amount{grid-column:2;grid-row:1}.er-meta{grid-column:1/-1;display:flex;align-items:center;justify-content:space-between;text-align:left;padding-left:50px}.er-section-head{align-items:flex-start}.er-footer{flex-direction:column}}
@media(prefers-reduced-motion:reduce){*{scroll-behavior:auto!important;transition:none!important}}
</style>
<div class="container-fluid earners-shell">
<header class="er-hero"><span class="er-eyebrow"><i class="fas fa-shield-alt"></i> Platform activity</span><h1>Real activity. Clear status.</h1><p>Explore recent withdrawal activity recorded on the platform. Completed withdrawals reflect records marked successful, while pending requests are still awaiting processing.</p><div class="er-trust-strip"><span><i class="fas fa-database"></i> Live database records</span><span><i class="fas fa-user-secret"></i> Names shortened for privacy</span><span><i class="fas fa-calendar-alt"></i> Newest activity first</span></div></header>
<section class="er-stats" aria-label="Recent activity counts"><article class="er-stat"><span class="er-stat-icon"><i class="fas fa-check-circle"></i></span><div><span>Completed withdrawals shown</span><strong id="er-completed-stat"><?php echo number_format($earnersCompletedCount); ?></strong></div></article><article class="er-stat"><span class="er-stat-icon"><i class="fas fa-hourglass-half"></i></span><div><span>Pending requests shown</span><strong id="er-pending-stat"><?php echo number_format($earnersPendingCount); ?></strong></div></article></section>
<section aria-labelledby="completedTitle"><div class="er-section-head"><div><h2 id="completedTitle">Recently completed withdrawals</h2><p>Up to 20 real records, newest first.</p></div><span class="er-count" id="er-completed-count"><?php echo $earnersCompletedCount; ?> records</span></div><div class="er-list" id="er-completed-list" aria-live="polite">
<?php if (!$earnersCompleted): ?><div class="er-empty"><i class="fas fa-receipt"></i>No completed withdrawals are available to display yet.</div><?php else: foreach ($earnersCompleted as $item): ?>
<article class="er-row"><div class="er-person"><span class="er-avatar"><?php echo $earnersEscape($earnersInitials($item['Public_Name'])); ?></span><div><strong><?php echo $earnersEscape($item['Public_Name']); ?></strong><small>Withdrawal completed</small></div></div><div class="er-amount"><?php echo $earnersEscape($earnersFormatAmount($item['Amount_Withdrawn'])); ?></div><div class="er-meta"><time class="er-date"><?php echo $earnersEscape($earnersFormatDate($item['Date'] ?? '')); ?></time><span class="er-status complete">Completed</span></div></article>
<?php endforeach; endif; ?></div></section>
<section aria-labelledby="pendingTitle"><div class="er-section-head"><div><h2 id="pendingTitle">Waiting to be processed</h2><p>Requests currently marked pending in the withdrawal database.</p></div><span class="er-count" id="er-pending-count"><?php echo $earnersPendingCount; ?> records</span></div><div class="er-list">
<?php if (!$earnersPending): ?><div class="er-empty"><i class="fas fa-check-double"></i>There are no pending withdrawal requests to display right now.</div><?php else: foreach ($earnersPending as $item): ?>
<article class="er-row"><div class="er-person"><span class="er-avatar"><?php echo $earnersEscape($earnersInitials($item['Public_Name'])); ?></span><div><strong><?php echo $earnersEscape($item['Public_Name']); ?></strong><small>Withdrawal request received</small></div></div><div class="er-amount"><?php echo $earnersEscape($earnersFormatAmount($item['Amount_Withdrawn'])); ?></div><div class="er-meta"><time class="er-date"><?php echo $earnersEscape($earnersFormatDate($item['Date'] ?? '')); ?></time><span class="er-status pending">Pending</span></div></article>
<?php endforeach; endif; ?></div></section>
<aside class="er-disclaimer"><i class="fas fa-info-circle"></i><span><strong style="color:var(--er-ink)">Please note:</strong> This page displays actual withdrawal records, not forecasts or guarantees. Pending requests are not proof of payment and can take time to review. Names are abbreviated to reduce exposure of members' financial activity. Displayed totals and records may change as requests are updated.</span></aside>
<footer class="er-footer"><span>&copy; <?php echo date('Y'); ?> CFXM Pro. All rights reserved.</span><span><a href="Dashboard.php">Dashboard</a> &nbsp;·&nbsp; <a href="Profile.php">Profile</a></span></footer>
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
<script>
(function () {
    'use strict';

    const feedUrl = 'EarnersFeed.php';
    const completedList = document.getElementById('er-completed-list');
    const pendingList = document.getElementById('er-pending-list');
    const completedStat = document.getElementById('er-completed-stat');
    const pendingStat = document.getElementById('er-pending-stat');
    const completedCount = document.getElementById('er-completed-count');
    const pendingCount = document.getElementById('er-pending-count');
    const refreshEveryMs = 30000;
    let requestInFlight = false;

    function formatAmount(value) {
        return '
</body>
</html>
 + Number(value || 0).toLocaleString('en-US', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        });
    }

    function formatDate(value) {
        if (!value) return 'Date not recorded';
        const date = new Date(String(value).replace(' ', 'T'));
        if (Number.isNaN(date.getTime())) return String(value);
        return date.toLocaleDateString('en-US', {
            month: 'short',
            day: 'numeric',
            year: 'numeric'
        });
    }

    function initials(name) {
        return String(name || 'Platform member').trim().split(/\\s+/).filter(Boolean)
            .slice(0, 2).map(part => part.charAt(0).toUpperCase()).join('') || 'M';
    }

    function createEmpty(message, iconClass) {
        const empty = document.createElement('div');
        empty.className = 'er-empty';
        const icon = document.createElement('i');
        icon.className = iconClass;
        icon.setAttribute('aria-hidden', 'true');
        const text = document.createElement('span');
        text.textContent = message;
        empty.append(icon, text);
        return empty;
    }

    function createRow(item, isCompleted) {
        const row = document.createElement('article');
        row.className = 'er-row';

        const person = document.createElement('div');
        person.className = 'er-person';
        const avatar = document.createElement('span');
        avatar.className = 'er-avatar';
        avatar.textContent = initials(item.name);
        avatar.setAttribute('aria-hidden', 'true');

        const details = document.createElement('div');
        const name = document.createElement('strong');
        name.textContent = item.name || 'Platform member';
        const note = document.createElement('small');
        note.textContent = isCompleted ? 'Withdrawal completed' : 'Withdrawal request received';
        details.append(name, note);
        person.append(avatar, details);

        const amount = document.createElement('div');
        amount.className = 'er-amount';
        amount.textContent = formatAmount(item.amount);

        const meta = document.createElement('div');
        meta.className = 'er-meta';
        const date = document.createElement('time');
        date.className = 'er-date';
        date.textContent = formatDate(item.date);
        const status = document.createElement('span');
        status.className = 'er-status ' + (isCompleted ? 'complete' : 'pending');
        status.textContent = isCompleted ? 'Completed' : 'Pending';
        meta.append(date, status);

        row.append(person, amount, meta);
        return row;
    }

    function renderList(container, rows, isCompleted) {
        if (!container) return;
        const fragment = document.createDocumentFragment();
        if (!Array.isArray(rows) || rows.length === 0) {
            fragment.appendChild(createEmpty(
                isCompleted
                    ? 'No completed withdrawals are available to display yet.'
                    : 'There are no pending withdrawal requests to display right now.',
                isCompleted ? 'fas fa-receipt' : 'fas fa-check-double'
            ));
        } else {
            rows.forEach(item => fragment.appendChild(createRow(item, isCompleted)));
        }
        container.replaceChildren(fragment);
    }

    async function refreshActivity() {
        if (requestInFlight || document.visibilityState !== 'visible') return;
        requestInFlight = true;
        try {
            const response = await fetch(feedUrl, {
                method: 'GET',
                credentials: 'same-origin',
                cache: 'no-store',
                headers: { 'Accept': 'application/json', 'X-Requested-With': 'XMLHttpRequest' }
            });
            if (response.status === 401) return;
            if (!response.ok) throw new Error('Activity feed returned HTTP ' + response.status);
            const data = await response.json();
            if (!data || data.success !== true) throw new Error('Invalid activity feed response');

            renderList(completedList, data.completed, true);
            renderList(pendingList, data.pending, false);

            if (completedStat) completedStat.textContent = Number(data.completedCount || 0).toLocaleString('en-US');
            if (pendingStat) pendingStat.textContent = Number(data.pendingCount || 0).toLocaleString('en-US');
            if (completedCount) completedCount.textContent = (data.completed || []).length + ' records';
            if (pendingCount) pendingCount.textContent = (data.pending || []).length + ' records';
        } catch (error) {
            // Keep the last successfully rendered activity visible if a temporary request fails.
            console.warn('Unable to refresh earners activity:', error);
        } finally {
            requestInFlight = false;
        }
    }

    window.setInterval(refreshActivity, refreshEveryMs);
    window.addEventListener('online', refreshActivity);
    refreshActivity();
})();
</script>
</body>
</html>
