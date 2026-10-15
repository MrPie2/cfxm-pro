<?php
session_start();

if (!isset($_SESSION['User_id'])) {
    header('Location: LoginContainer.php');
    exit;
}

include('Header.php');
$Investor_id = (string) $_SESSION['User_id'];
$referralRows = [];
$availableEarnings = 0.0;
$claimedEarnings = 0.0;
$totalRecordedEarnings = 0.0;
$totalReferrals = 0;
$fundedReferrals = 0;
$pendingReferrals = 0;
$referralQueryError = false;

$referralStmt = mysqli_prepare($Conn, "SELECT Name, Refferal_Earnings, Status FROM refferals WHERE Refferer = ?");
if ($referralStmt) {
    mysqli_stmt_bind_param($referralStmt, "s", $Investor_id);
    if (mysqli_stmt_execute($referralStmt)) {
        $referralResult = mysqli_stmt_get_result($referralStmt);
        while ($referralRow = mysqli_fetch_assoc($referralResult)) {
            $referralRows[] = $referralRow;
            $bonus = (float) ($referralRow['Refferal_Earnings'] ?? 0);
            $status = (int) ($referralRow['Status'] ?? 0);
            $totalReferrals++;

            if ($status === 1) {
                $availableEarnings += $bonus;
                $fundedReferrals++;
                $totalRecordedEarnings += $bonus;
            } elseif ($status === 2) {
                $claimedEarnings += $bonus;
                $fundedReferrals++;
                $totalRecordedEarnings += $bonus;
            } else {
                $pendingReferrals++;
            }
        }
    } else {
        $referralQueryError = true;
    }
    mysqli_stmt_close($referralStmt);
} else {
    $referralQueryError = true;
}

$referralEscape = static function ($value): string {
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
};
$referralMoney = static function ($amount) use ($curAbbr, $exchangerate): string {
    return htmlspecialchars((string) $curAbbr, ENT_QUOTES, 'UTF-8') . number_format((float) $amount * (float) $exchangerate, 2, '.', ',');
};
$referralLink = 'https://www.maxifxpro.org/Dashboard/SignupContainer.php?Ref_id=' . rawurlencode($Investor_id);
?>

<style>
/* Referral workspace — scoped styles, shared CFXM theme tokens. */
.ref-page{--ref-purple:var(--cfxm-purple,#49247e);--ref-purple-bright:var(--cfxm-purple-2,#7748bc);--ref-ink:var(--cfxm-text,#DFD0B8);--ref-muted:var(--cfxm-muted,#a5b1ba);--ref-line:var(--cfxm-line,rgba(223,208,184,.14));max-width:1500px;margin:0 auto;padding:26px 22px 38px;color:var(--ref-ink)}
.ref-page,.ref-page *{box-sizing:border-box}
.ref-page a{text-decoration:none}
.ref-page-head{display:flex;align-items:flex-end;justify-content:space-between;gap:20px;margin-bottom:24px}
.ref-page-kicker{display:flex;align-items:center;gap:8px;color:var(--ref-purple-bright);font-size:10px;font-weight:850;letter-spacing:.16em;text-transform:uppercase;margin-bottom:10px}
.ref-page-kicker i{font-size:13px}
.ref-page-head h1{margin:0 0 8px;color:var(--ref-ink);font-size:clamp(26px,3vw,36px);font-weight:800;letter-spacing:-.045em;line-height:1.15}
.ref-page-head p{max-width:610px;margin:0;color:var(--ref-muted);font-size:13px;line-height:1.7}
.ref-trust-pill{display:inline-flex;align-items:center;gap:8px;flex-shrink:0;padding:10px 13px;border:1px solid var(--ref-line);border-radius:999px;color:var(--ref-muted);font-size:11px;font-weight:700;background:var(--cfxm-surface,#222831)}
.ref-trust-pill i{color:#28b982}
.ref-hero{position:relative;display:grid;grid-template-columns:minmax(0,1.35fr) minmax(230px,.65fr);gap:20px;align-items:center;overflow:hidden;padding:clamp(22px,3vw,34px);margin-bottom:16px;border:1px solid rgba(255,255,255,.12);border-radius:22px;background:radial-gradient(circle at 84% 15%,rgba(160,117,237,.34),transparent 31%),linear-gradient(125deg,#111d49 0%,#49247e 60%,#7748bc 100%);box-shadow:0 16px 38px rgba(73,36,126,.19);color:#fff}
.ref-hero:after{content:"";position:absolute;right:-95px;bottom:-180px;width:300px;height:300px;border:1px solid rgba(255,255,255,.14);border-radius:50%;box-shadow:0 0 0 28px rgba(255,255,255,.035),0 0 0 58px rgba(255,255,255,.025);pointer-events:none}
.ref-hero-copy,.ref-hero-art{position:relative;z-index:1}
.ref-hero-label{display:inline-flex;align-items:center;gap:7px;padding:7px 10px;border:1px solid rgba(255,255,255,.22);border-radius:999px;background:rgba(255,255,255,.09);color:rgba(255,255,255,.88);font-size:10px;font-weight:750}
.ref-hero h2{max-width:560px;margin:18px 0 10px;color:#fff;font-size:clamp(25px,3.2vw,40px);font-weight:850;letter-spacing:-.045em;line-height:1.12}
.ref-hero p{max-width:540px;margin:0;color:rgba(255,255,255,.76);font-size:13px;line-height:1.75}
.ref-hero-actions{display:flex;align-items:center;gap:10px;flex-wrap:wrap;margin-top:22px}
.ref-btn-light,.ref-btn-outline{display:inline-flex;align-items:center;justify-content:center;gap:8px;min-height:43px;padding:11px 15px;border-radius:12px;font-size:12px;font-weight:800;cursor:pointer;transition:transform .18s ease,background .18s ease}
.ref-btn-light{border:1px solid #fff;background:#fff;color:#49247e!important}
.ref-btn-light:hover{background:#f3ecff;transform:translateY(-1px)}
.ref-btn-outline{border:1px solid rgba(255,255,255,.25);background:rgba(255,255,255,.08);color:#fff!important}
.ref-btn-outline:hover{background:rgba(255,255,255,.16);transform:translateY(-1px)}
.ref-hero-art{display:flex;align-items:center;justify-content:center;min-height:180px}
.ref-network{position:relative;width:190px;height:190px;display:grid;place-items:center}
.ref-network-ring{position:absolute;inset:10px;border:1px solid rgba(255,255,255,.23);border-radius:50%;box-shadow:0 0 0 18px rgba(255,255,255,.035),0 0 0 40px rgba(255,255,255,.025)}
.ref-network-core{display:grid;place-items:center;width:78px;height:78px;border:1px solid rgba(255,255,255,.35);border-radius:25px;background:rgba(255,255,255,.14);box-shadow:0 15px 35px rgba(0,0,0,.14);font-size:31px;color:#fff}
.ref-network-node{position:absolute;display:grid;place-items:center;width:43px;height:43px;border:1px solid rgba(255,255,255,.32);border-radius:15px;background:rgba(255,255,255,.15);color:#fff;font-size:15px}
.ref-network-node.n1{top:0;left:73px}.ref-network-node.n2{right:0;top:74px}.ref-network-node.n3{bottom:0;left:74px}.ref-network-node.n4{left:0;top:74px}
.ref-metrics{display:grid;grid-template-columns:repeat(4,minmax(0,1fr));gap:12px;margin-bottom:20px}
.ref-metric{min-width:0;padding:17px;border:1px solid var(--ref-line);border-radius:16px;background:var(--cfxm-surface,#222831);box-shadow:0 7px 24px rgba(0,0,0,.035)}
.ref-metric-top{display:flex;align-items:center;justify-content:space-between;gap:8px;margin-bottom:17px}
.ref-metric-icon{display:grid;place-items:center;width:36px;height:36px;border-radius:12px;background:rgba(119,72,188,.15);color:var(--ref-purple-bright);font-size:15px}
.ref-metric-caption{color:var(--ref-muted);font-size:11px;font-weight:700}
.ref-metric strong{display:block;overflow-wrap:anywhere;color:var(--ref-ink);font-size:clamp(18px,1.7vw,24px);font-weight:850;letter-spacing:-.035em;line-height:1.25}
.ref-metric small{display:block;margin-top:7px;color:var(--ref-muted);font-size:10px;line-height:1.5}
.ref-grid{display:grid;grid-template-columns:minmax(0,1.4fr) minmax(280px,.6fr);gap:16px;align-items:start}
.ref-panel{min-width:0;margin-bottom:16px;overflow:hidden;border:1px solid var(--ref-line);border-radius:18px;background:var(--cfxm-surface,#222831);box-shadow:0 7px 24px rgba(0,0,0,.035)}
.ref-panel-head{display:flex;align-items:flex-start;justify-content:space-between;gap:14px;padding:20px 21px 15px}
.ref-panel-head h2{margin:0 0 6px;color:var(--ref-ink);font-size:15px;font-weight:800;letter-spacing:-.02em}
.ref-panel-head p{margin:0;color:var(--ref-muted);font-size:11px;line-height:1.6}
.ref-panel-body{padding:0 21px 21px}
.ref-link-box{padding:17px;border:1px solid var(--ref-line);border-radius:14px;background:var(--cfxm-bg-deep,#0b161c)}
.ref-link-label{display:flex;align-items:center;gap:8px;margin-bottom:10px;color:var(--ref-muted);font-size:10px;font-weight:800;letter-spacing:.08em;text-transform:uppercase}
.ref-link-field{display:flex;align-items:center;gap:10px;padding:5px;border:1px solid var(--ref-line);border-radius:11px;background:var(--cfxm-surface,#222831)}
.ref-link-field input{display:block;min-width:0;width:100%;padding:10px 8px;border:0!important;outline:none!important;background:transparent!important;color:var(--ref-ink)!important;font-size:12px;font-weight:650}
.ref-copy-btn{display:inline-flex;align-items:center;justify-content:center;gap:7px;flex-shrink:0;min-height:38px;padding:9px 12px;border:0;border-radius:9px;background:linear-gradient(135deg,#49247e,#7748bc);color:#fff;font-size:11px;font-weight:800;cursor:pointer}
.ref-copy-btn:hover{filter:brightness(1.1)}
.ref-link-hint{display:flex;align-items:flex-start;gap:8px;margin:12px 0 0;color:var(--ref-muted);font-size:11px;line-height:1.65}
.ref-link-hint i{margin-top:3px;color:var(--ref-purple-bright)}
.ref-section-title{display:flex;align-items:center;justify-content:space-between;gap:12px;margin:0 0 12px}
.ref-section-title h3{margin:0;color:var(--ref-ink);font-size:13px;font-weight:800}
.ref-section-title span{color:var(--ref-muted);font-size:10px}
.ref-steps{display:grid;gap:12px}
.ref-step{display:flex;align-items:flex-start;gap:12px}
.ref-step-num{display:grid;place-items:center;flex:0 0 31px;width:31px;height:31px;border:1px solid var(--ref-line);border-radius:10px;background:rgba(119,72,188,.12);color:var(--ref-purple-bright);font-size:11px;font-weight:850}
.ref-step h4{margin:1px 0 4px;color:var(--ref-ink);font-size:12px;font-weight:800}
.ref-step p{margin:0;color:var(--ref-muted);font-size:11px;line-height:1.6}
.ref-commission{display:flex;align-items:center;gap:12px;margin-top:18px;padding:14px;border:1px solid rgba(39,194,129,.2);border-radius:13px;background:rgba(39,194,129,.07)}
.ref-commission-icon{display:grid;place-items:center;flex:0 0 37px;width:37px;height:37px;border-radius:12px;background:rgba(39,194,129,.13);color:#27c281}
.ref-commission strong{display:block;color:var(--ref-ink);font-size:12px}.ref-commission span{display:block;margin-top:4px;color:var(--ref-muted);font-size:10px;line-height:1.5}
.ref-table-tools{display:flex;align-items:center;justify-content:space-between;gap:12px;margin:0 21px 12px}
.ref-search{display:flex;align-items:center;gap:8px;width:min(100%,270px);padding:9px 11px;border:1px solid var(--ref-line);border-radius:10px;background:var(--cfxm-bg-deep,#0b161c);color:var(--ref-muted)}
.ref-search input{width:100%;min-width:0;padding:0;border:0!important;outline:none!important;background:transparent!important;color:var(--ref-ink)!important;font-size:11px}
.ref-search input::placeholder{color:var(--ref-muted)}
.ref-table-count{color:var(--ref-muted);font-size:10px;white-space:nowrap}
.ref-table-wrap{width:100%;overflow-x:auto}
.ref-table{width:100%;min-width:590px;border-collapse:separate;border-spacing:0;color:var(--ref-ink)}
.ref-table th{padding:12px 15px;border-top:1px solid var(--ref-line);border-bottom:1px solid var(--ref-line);background:rgba(125,148,162,.06);color:var(--ref-muted);font-size:9px;font-weight:850;letter-spacing:.08em;text-align:left;text-transform:uppercase;white-space:nowrap}
.ref-table td{padding:14px 15px;border-bottom:1px solid var(--ref-line);color:var(--ref-ink);font-size:11px;vertical-align:middle}
.ref-table tbody tr:last-child td{border-bottom:0}
.ref-table tbody tr:hover td{background:rgba(119,72,188,.045)}
.ref-member{display:flex;align-items:center;gap:10px;min-width:150px}
.ref-member-avatar{display:grid;place-items:center;flex:0 0 33px;width:33px;height:33px;border-radius:11px;background:rgba(119,72,188,.14);color:var(--ref-purple-bright);font-size:12px;font-weight:850}
.ref-member-name{display:block;max-width:210px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;font-weight:750}
.ref-member-sub{display:block;margin-top:3px;color:var(--ref-muted);font-size:9px}
.ref-amount{font-weight:800;font-variant-numeric:tabular-nums;white-space:nowrap}
.ref-status{display:inline-flex;align-items:center;gap:6px;padding:6px 8px;border-radius:999px;font-size:9px;font-weight:800;white-space:nowrap}
.ref-status:before{content:"";width:5px;height:5px;border-radius:50%;background:currentColor}
.ref-status.available{color:#27c281;background:rgba(39,194,129,.1)}
.ref-status.claimed{color:var(--ref-purple-bright);background:rgba(119,72,188,.13)}
.ref-status.pending{color:#dca84e;background:rgba(220,168,78,.12)}
.ref-empty{padding:34px 18px;text-align:center;color:var(--ref-muted)}
.ref-empty-icon{display:grid;place-items:center;width:47px;height:47px;margin:0 auto 12px;border-radius:15px;background:rgba(119,72,188,.12);color:var(--ref-purple-bright);font-size:18px}
.ref-empty strong{display:block;margin-bottom:6px;color:var(--ref-ink);font-size:13px}
.ref-empty p{max-width:320px;margin:0 auto;color:var(--ref-muted);font-size:11px;line-height:1.65}
.ref-claim-card{padding:20px;border:1px solid rgba(119,72,188,.25);border-radius:16px;background:linear-gradient(145deg,rgba(73,36,126,.15),rgba(119,72,188,.05))}
.ref-claim-label{color:var(--ref-muted);font-size:10px;font-weight:750}
.ref-claim-amount{display:block;margin:10px 0 7px;color:var(--ref-ink);font-size:clamp(24px,2.4vw,31px);font-weight:850;letter-spacing:-.04em;overflow-wrap:anywhere}
.ref-claim-card p{margin:0;color:var(--ref-muted);font-size:11px;line-height:1.6}
.ref-claim-btn{display:flex;align-items:center;justify-content:center;gap:8px;width:100%;min-height:43px;margin-top:16px;padding:11px 13px;border:0;border-radius:11px;background:linear-gradient(135deg,#49247e,#7748bc);color:#fff!important;font-size:12px;font-weight:850;cursor:pointer}
.ref-claim-btn:hover{filter:brightness(1.08)}
.ref-claim-btn.disabled{opacity:.48;pointer-events:none}
.ref-side-note{display:flex;align-items:flex-start;gap:10px;margin-top:13px;color:var(--ref-muted);font-size:10px;line-height:1.65}
.ref-side-note i{margin-top:2px;color:var(--ref-purple-bright)}
.ref-no-results[hidden]{display:none}
html[data-theme="light"] .ref-page{--ref-ink:#202438;--ref-muted:#687184;--ref-line:rgba(26,35,55,.12)}
html[data-theme="light"] .ref-metric,html[data-theme="light"] .ref-panel{background:#fff;box-shadow:0 8px 25px rgba(23,27,44,.045)}
html[data-theme="light"] .ref-link-box,html[data-theme="light"] .ref-search{background:#f5f6fa}
html[data-theme="light"] .ref-link-field{background:#fff}
html[data-theme="light"] .ref-table th{background:#f7f7fb}
html[data-theme="light"] .ref-table td{color:#202438}
html[data-theme="light"] .ref-claim-card{background:linear-gradient(145deg,rgba(73,36,126,.07),rgba(119,72,188,.025))}
@media(max-width:1050px){.ref-metrics{grid-template-columns:repeat(2,minmax(0,1fr))}.ref-grid{grid-template-columns:minmax(0,1fr)}.ref-sidebar-grid{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:0 14px}}
@media(max-width:760px){.ref-page{padding:20px 13px 30px}.ref-page-head{align-items:flex-start;flex-direction:column;gap:12px;margin-bottom:17px}.ref-hero{grid-template-columns:minmax(0,1fr);padding:23px 19px;border-radius:18px}.ref-hero h2{font-size:29px}.ref-hero-art{display:none}.ref-metrics{gap:9px}.ref-metric{padding:13px;border-radius:14px}.ref-metric-top{margin-bottom:12px}.ref-metric-icon{width:32px;height:32px}.ref-grid{gap:0}.ref-panel-head{padding:17px 15px 13px}.ref-panel-body{padding:0 15px 16px}.ref-table-tools{margin:0 15px 10px}.ref-table th{padding:11px 12px}.ref-table td{padding:12px}.ref-sidebar-grid{grid-template-columns:minmax(0,1fr)}.ref-trust-pill{font-size:10px}.ref-hero-actions{gap:8px}}
@media(max-width:390px){.ref-metrics{grid-template-columns:repeat(2,minmax(0,1fr))}.ref-metric strong{font-size:17px}.ref-link-field{align-items:stretch;flex-direction:column;padding:8px}.ref-copy-btn{width:100%}.ref-hero-actions>*{flex:1}.ref-hero h2{font-size:26px}}
@media(prefers-reduced-motion:reduce){.ref-page *{transition:none!important;scroll-behavior:auto!important}}
</style>

<div class="container-fluid ref-page">
    <header class="ref-page-head">
        <div>
            <div class="ref-page-kicker"><i class="fas fa-users"></i> Growth &amp; rewards</div>
            <h1>Referral centre</h1>
            <p>Invite people to join, track your network, and keep an eye on referral rewards in one place.</p>
        </div>
        <div class="ref-trust-pill"><i class="fas fa-check-circle"></i> Your personal referral dashboard</div>
    </header>

    <section class="ref-hero" aria-labelledby="ref-hero-title">
        <div class="ref-hero-copy">
            <span class="ref-hero-label"><i class="fas fa-star"></i> Share the opportunity</span>
            <h2 id="ref-hero-title">Grow your network.<br>Earn referral rewards.</h2>
            <p>Share your unique invitation link with people you know. When a referred member registers and meets the platform's qualifying deposit requirements, eligible referral earnings can appear in your account.</p>
            <div class="ref-hero-actions">
                <button type="button" class="ref-btn-light" id="refHeroCopy"><i class="fas fa-link"></i> Copy my invite link</button>
                <a class="ref-btn-outline" href="#referrals-list"><i class="fas fa-users"></i> View my referrals</a>
            </div>
        </div>
        <div class="ref-hero-art" aria-hidden="true">
            <div class="ref-network">
                <div class="ref-network-ring"></div>
                <span class="ref-network-node n1"><i class="fas fa-user-plus"></i></span>
                <span class="ref-network-node n2"><i class="fas fa-wallet"></i></span>
                <span class="ref-network-node n3"><i class="fas fa-gift"></i></span>
                <span class="ref-network-node n4"><i class="fas fa-users"></i></span>
                <div class="ref-network-core"><i class="fas fa-share-alt"></i></div>
            </div>
        </div>
    </section>

    <?php if ($referralQueryError) { ?>
        <div class="alert alert-warning" role="alert"><i class="fas fa-exclamation-triangle"></i> Referral information could not be loaded right now. Please refresh the page or try again later.</div>
    <?php } ?>

    <section class="ref-metrics" aria-label="Referral summary">
        <article class="ref-metric">
            <div class="ref-metric-top"><span class="ref-metric-caption">Available rewards</span><span class="ref-metric-icon"><i class="fas fa-wallet"></i></span></div>
            <strong><?php echo $referralMoney($availableEarnings); ?></strong>
            <small>Eligible rewards ready to claim</small>
        </article>
        <article class="ref-metric">
            <div class="ref-metric-top"><span class="ref-metric-caption">People referred</span><span class="ref-metric-icon"><i class="fas fa-user-friends"></i></span></div>
            <strong><?php echo number_format($totalReferrals); ?></strong>
            <small>Members linked to your referral ID</small>
        </article>
        <article class="ref-metric">
            <div class="ref-metric-top"><span class="ref-metric-caption">Qualified referrals</span><span class="ref-metric-icon"><i class="fas fa-user-check"></i></span></div>
            <strong><?php echo number_format($fundedReferrals); ?></strong>
            <small>Referrals with an available or claimed reward</small>
        </article>
        <article class="ref-metric">
            <div class="ref-metric-top"><span class="ref-metric-caption">Rewards claimed</span><span class="ref-metric-icon"><i class="fas fa-check-double"></i></span></div>
            <strong><?php echo $referralMoney($claimedEarnings); ?></strong>
            <small>Previously claimed referral rewards</small>
        </article>
    </section>

    <div class="ref-grid">
        <div>
            <section class="ref-panel">
                <div class="ref-panel-head">
                    <div><h2>Your personal invite link</h2><p>Copy it and share it with your network.</p></div>
                </div>
                <div class="ref-panel-body">
                    <div class="ref-link-box">
                        <div class="ref-link-label"><i class="fas fa-link"></i> Unique referral URL</div>
                        <div class="ref-link-field">
                            <input id="referralLinkInput" type="text" readonly value="<?php echo $referralEscape($referralLink); ?>" aria-label="Your unique referral link">
                            <button class="ref-copy-btn" type="button" id="refCopyButton"><i class="fas fa-copy"></i> Copy link</button>
                        </div>
                        <p class="ref-link-hint"><i class="fas fa-info-circle"></i><span>Make sure your invitees use this link when registering so their referral can be attributed to your account.</span></p>
                    </div>
                </div>
            </section>

            <section class="ref-panel" id="referrals-list">
                <div class="ref-panel-head">
                    <div><h2>My referrals</h2><p>Review member status and recorded reward amounts.</p></div>
                </div>
                <?php if (!$referralQueryError && count($referralRows) > 0) { ?>
                <div class="ref-table-tools">
                    <label class="ref-search"><i class="fas fa-search"></i><input id="referralSearch" type="search" placeholder="Search referrals..." aria-label="Search referrals"></label>
                    <span class="ref-table-count"><span id="referralVisibleCount"><?php echo count($referralRows); ?></span> members</span>
                </div>
                <div class="ref-table-wrap">
                    <table class="ref-table">
                        <thead><tr><th>Member</th><th>Reward</th><th>Status</th></tr></thead>
                        <tbody id="referralTableBody">
                        <?php foreach ($referralRows as $index => $referralRow) {
                            $memberName = trim((string) ($referralRow['Name'] ?? '')) ?: 'Referred member';
                            $statusCode = (int) ($referralRow['Status'] ?? 0);
                            if ($statusCode === 1) {
                                $statusLabel = 'Available';
                                $statusClass = 'available';
                                $statusHint = 'Reward available to claim';
                            } elseif ($statusCode === 2) {
                                $statusLabel = 'Claimed';
                                $statusClass = 'claimed';
                                $statusHint = 'Reward already claimed';
                            } else {
                                $statusLabel = 'Pending';
                                $statusClass = 'pending';
                                $statusHint = 'Awaiting qualifying deposit';
                            }
                            $initials = strtoupper(substr($memberName, 0, 1));
                            ?>
                            <tr class="referral-row" data-search="<?php echo $referralEscape(strtolower($memberName . ' ' . $statusLabel . ' ' . $statusHint)); ?>">
                                <td><div class="ref-member"><span class="ref-member-avatar"><?php echo $referralEscape($initials); ?></span><span><span class="ref-member-name"><?php echo $referralEscape($memberName); ?></span><span class="ref-member-sub">Referral #<?php echo (int) ($index + 1); ?></span></span></div></td>
                                <td class="ref-amount"><?php echo $referralMoney($referralRow['Refferal_Earnings'] ?? 0); ?></td>
                                <td><span class="ref-status <?php echo $statusClass; ?>"><?php echo $statusLabel; ?></span></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="ref-empty ref-no-results" id="referralNoResults" hidden><div class="ref-empty-icon"><i class="fas fa-search"></i></div><strong>No matching referrals</strong><p>Try a different name or status.</p></div>
                <?php } elseif (!$referralQueryError) { ?>
                <div class="ref-empty"><div class="ref-empty-icon"><i class="fas fa-user-plus"></i></div><strong>Your network starts here</strong><p>You don't have any referrals yet. Copy your invite link above and share it to get started.</p></div>
                <?php } else { ?>
                <div class="ref-empty"><div class="ref-empty-icon"><i class="fas fa-exclamation-circle"></i></div><strong>Referrals unavailable</strong><p>We couldn't load your referral list at this time.</p></div>
                <?php } ?>
            </section>
        </div>

        <aside class="ref-sidebar-grid">
            <section class="ref-panel">
                <div class="ref-panel-head"><div><h2>Available to claim</h2><p>Your currently eligible referral rewards.</p></div></div>
                <div class="ref-panel-body">
                    <div class="ref-claim-card">
                        <span class="ref-claim-label">Available referral earnings</span>
                        <strong class="ref-claim-amount"><?php echo $referralMoney($availableEarnings); ?></strong>
                        <p>Only rewards marked as available are included in this amount. Claiming is subject to the platform's standard verification and withdrawal checks.</p>
                        <?php if ($availableEarnings > 0) { ?>
                        <a class="ref-claim-btn" href="Withdraw.php?Amount=<?php echo rawurlencode((string) $availableEarnings); ?>&amp;Location=Refferal_Bonus"><i class="fas fa-arrow-right"></i> Claim referral bonus</a>
                        <?php } else { ?>
                        <span class="ref-claim-btn disabled"><i class="fas fa-hourglass-half"></i> No rewards available yet</span>
                        <?php } ?>
                    </div>
                    <div class="ref-side-note"><i class="fas fa-shield-alt"></i><span>Confirm the displayed amount and destination before completing a claim. Your available rewards are tracked separately from your wallet balance.</span></div>
                </div>
            </section>

            <section class="ref-panel">
                <div class="ref-panel-head"><div><h2>How it works</h2><p>Three simple steps to get started.</p></div></div>
                <div class="ref-panel-body">
                    <div class="ref-steps">
                        <div class="ref-step"><span class="ref-step-num">01</span><div><h4>Share your invite</h4><p>Send your personal link to friends and contacts who may be interested.</p></div></div>
                        <div class="ref-step"><span class="ref-step-num">02</span><div><h4>They register and qualify</h4><p>Your referral appears here, and its status updates according to qualifying activity.</p></div></div>
                        <div class="ref-step"><span class="ref-step-num">03</span><div><h4>Track your rewards</h4><p>Review eligible earnings here and claim them when they become available.</p></div></div>
                    </div>
                    <div class="ref-commission"><span class="ref-commission-icon"><i class="fas fa-gift"></i></span><div><strong>Referral reward programme</strong><span>Current programme terms apply. Review the official terms for the exact eligibility and reward calculation.</span></div></div>
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
    <script src="js/lib/toastr/toastr.min.js"></script>
    <script>
    (function () {
        var linkInput = document.getElementById('referralLinkInput');
        var copyButton = document.getElementById('refCopyButton');
        var heroCopy = document.getElementById('refHeroCopy');

        function notify(message, isError) {
            if (window.toastr) {
                if (isError) { toastr.error(message); } else { toastr.success(message); }
            } else {
                window.alert(message);
            }
        }

        function copyReferralLink() {
            if (!linkInput) return;
            var value = linkInput.value;
            if (navigator.clipboard && window.isSecureContext) {
                navigator.clipboard.writeText(value).then(function () {
                    notify('Referral link copied to clipboard.');
                }).catch(function () {
                    fallbackCopy(value);
                });
            } else {
                fallbackCopy(value);
            }
        }

        function fallbackCopy(value) {
            if (!linkInput) return;
            linkInput.focus();
            linkInput.select();
            linkInput.setSelectionRange(0, value.length);
            var copied = false;
            try { copied = document.execCommand('copy'); } catch (e) { copied = false; }
            if (copied) {
                notify('Referral link copied to clipboard.');
            } else {
                notify('Copy failed. Select and copy the referral link manually.', true);
            }
        }

        if (copyButton) copyButton.addEventListener('click', copyReferralLink);
        if (heroCopy) heroCopy.addEventListener('click', copyReferralLink);

        var search = document.getElementById('referralSearch');
        var rows = Array.prototype.slice.call(document.querySelectorAll('.referral-row'));
        var visibleCount = document.getElementById('referralVisibleCount');
        var noResults = document.getElementById('referralNoResults');
        if (search) {
            search.addEventListener('input', function () {
                var query = search.value.trim().toLowerCase();
                var visible = 0;
                rows.forEach(function (row) {
                    var match = (row.getAttribute('data-search') || '').indexOf(query) !== -1;
                    row.hidden = !match;
                    if (match) visible++;
                });
                if (visibleCount) visibleCount.textContent = visible;
                if (noResults) noResults.hidden = visible !== 0;
            });
        }
    })();
    </script>
</body>
</html>
