<?php
if (session_status() !== PHP_SESSION_ACTIVE) { session_start(); }
include_once __DIR__ . '/SiteConfig.php';
include_once __DIR__ . '/SettleDueInvestments.php';
$isManager = isset($_SESSION['Boss_id']);
$bossId = $isManager ? (string) $_SESSION['Boss_id'] : '';
$bossName = $isManager && !empty($_SESSION['Boss_Name']) ? (string) $_SESSION['Boss_Name'] : 'Administrator';
$bossQuery = rawurlencode($bossId);
function managerTool($href, $icon, $title, $description, $extra = '') {
    $safeHref = htmlspecialchars($href, ENT_QUOTES, 'UTF-8');
    $safeIcon = htmlspecialchars($icon, ENT_QUOTES, 'UTF-8');
    $safeTitle = htmlspecialchars($title, ENT_QUOTES, 'UTF-8');
    $safeDescription = htmlspecialchars($description, ENT_QUOTES, 'UTF-8');
    $search = htmlspecialchars(strtolower($title . ' ' . $description), ENT_QUOTES, 'UTF-8');
    echo '<a class="manager-tool" href="' . $safeHref . '" data-search="' . $search . '" ' . $extra . '>';
    echo '<span class="manager-tool-icon"><i class="bi ' . $safeIcon . '" aria-hidden="true"></i></span>';
    echo '<span class="manager-tool-content"><span class="manager-tool-title">' . $safeTitle . '</span><span class="manager-tool-desc">' . $safeDescription . '</span></span>';
    echo '<i class="bi bi-arrow-up-right manager-tool-arrow" aria-hidden="true"></i></a>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="theme-color" content="<?php echo htmlspecialchars($Background, ENT_QUOTES, 'UTF-8'); ?>">
  <title>Manager's Desk | <?php echo htmlspecialchars($SiteName, ENT_QUOTES, 'UTF-8'); ?></title>
  <meta name="description" content="Manage your <?php echo htmlspecialchars($SiteName, ENT_QUOTES, 'UTF-8'); ?> website and administration tools.">
</head>
<body class="manager-ui">
<?php include __DIR__ . '/Header.php'; ?>

<main class="manager-page">
  <?php if ($isManager): ?>
    <section class="manager-welcome" aria-labelledby="manager-page-title">
      <div>
        <p class="manager-eyebrow"><i class="bi bi-stars" aria-hidden="true"></i> Administration workspace</p>
        <h1 class="manager-title" id="manager-page-title">Good to see you, <?php echo htmlspecialchars($bossName, ENT_QUOTES, 'UTF-8'); ?>.</h1>
        <p class="manager-subtitle">Your control centre for clients, investments, content, and website settings. Choose a tool below to get started.</p>
      </div>
      <div class="manager-profile">
        <span class="manager-avatar" aria-hidden="true"><?php echo htmlspecialchars(strtoupper(substr($bossName, 0, 1)), ENT_QUOTES, 'UTF-8'); ?></span>
        <span><strong><?php echo htmlspecialchars($bossName, ENT_QUOTES, 'UTF-8'); ?></strong><span>Administrator access</span></span>
      </div>
    </section>

    <section class="manager-stats" aria-label="Workspace overview">
      <div class="manager-stat"><span class="manager-stat-icon"><i class="bi bi-people" aria-hidden="true"></i></span><div><div class="manager-stat-label">Client operations</div><div class="manager-stat-value">People & accounts</div></div></div>
      <div class="manager-stat"><span class="manager-stat-icon"><i class="bi bi-graph-up-arrow" aria-hidden="true"></i></span><div><div class="manager-stat-label">Investment controls</div><div class="manager-stat-value">Plans & wallets</div></div></div>
      <div class="manager-stat"><span class="manager-stat-icon"><i class="bi bi-window-stack" aria-hidden="true"></i></span><div><div class="manager-stat-label">Website tools</div><div class="manager-stat-value">Content & settings</div></div></div>
    </section>

    <div class="manager-section-head">
      <div><h2 class="manager-section-title">All management tools</h2><p class="manager-section-note">Search tools by name or description.</p></div>
      <label class="manager-search"><i class="bi bi-search" aria-hidden="true"></i><input id="managerToolSearch" type="search" placeholder="Search management tools…" aria-label="Search management tools" autocomplete="off"></label>
    </div>

    <section class="manager-section" aria-labelledby="operations-title">
      <div class="manager-section-head"><div><h2 class="manager-section-title" id="operations-title">Operations & finance</h2><p class="manager-section-note">Manage people, investment products, and account controls.</p></div></div>
      <div class="manager-tools-grid">
        <?php
        managerTool('MyAgents.php?Boss_id=' . $bossQuery, 'bi-people-fill', 'My Agents', 'View and manage agents and their activity.');
        managerTool('MyClients.php?Boss_id=' . $bossQuery, 'bi-person-vcard', 'My Clients', 'Review client accounts and client-related activity.');
        managerTool('InvestmentPlan.php?Boss_id=' . $bossQuery, 'bi-pie-chart-fill', 'Investment Plans', 'Manage available investment plans and terms.');
        managerTool('MyWallets.php?Boss_id=' . $bossQuery, 'bi-wallet2', 'My Wallets', 'Manage supported wallets and wallet details.');
        managerTool('MyStocks.php?Boss_id=' . $bossQuery, 'bi-graph-up', 'My Stocks', 'Manage stock instruments and market content.');
        managerTool('Verification.php?Boss_id=' . $bossQuery, 'bi-patch-check', 'Verification & Limits', 'Review verification settings and account limits.');
        ?>
      </div>
    </section>

    <section class="manager-section" aria-labelledby="website-title">
      <div class="manager-section-head"><div><h2 class="manager-section-title" id="website-title">Website & content</h2><p class="manager-section-note">Keep your public-facing website and resources up to date.</p></div></div>
      <div class="manager-tools-grid">
        <?php
        managerTool('CustomizeSite.php', 'bi-sliders', 'Customize Site', 'Update website identity and site-wide settings.');
        managerTool('Pages.php', 'bi-file-earmark-richtext', 'Site Pages', 'Create, edit, preview, and manage website pages.');
        managerTool('openContents.php?Boss_id=' . $bossQuery, 'bi-journal-richtext', 'Blog Posts', 'Publish and maintain website articles.');
        managerTool('FaqContainer.php', 'bi-patch-question', 'FAQs', 'Manage frequently asked questions.');
        managerTool('Resources.php?Boss_id=' . $bossQuery, 'bi-folder2-open', 'Resources', 'Organize downloadable and supporting resources.');
        ?>
      </div>
    </section>

    <section class="manager-section" aria-labelledby="communications-title">
      <div class="manager-section-head"><div><h2 class="manager-section-title" id="communications-title">Communications & account</h2><p class="manager-section-note">Reach users and manage important contact channels.</p></div></div>
      <div class="manager-tools-grid">
        <?php
        managerTool('BulkMail.php?Boss_id=' . $bossQuery, 'bi-envelope-paper', 'Bulk Email', 'Compose and send communications to your audience.');
        managerTool('#whatsapp-settings', 'bi-whatsapp', 'WhatsApp Line', 'View or update the WhatsApp contact number.', 'id="WhatsApp" role="button"');
        ?>
      </div>
    </section>
    <div class="manager-empty" id="managerNoResults" role="status">No tools match your search. Try another keyword.</div>
  <?php else: ?>
    <section class="manager-login-panel">
      <div class="manager-login-icon"><i class="bi bi-shield-lock" aria-hidden="true"></i></div>
      <p class="manager-eyebrow">Secure administration</p>
      <h1 class="manager-title">Manager's Desk</h1>
      <p class="manager-subtitle mx-auto mb-4">Sign in to access administration tools for clients, investments, website content, and settings.</p>
      <a href="LoginModal.php" class="manager-top-link primary"><i class="bi bi-box-arrow-in-right" aria-hidden="true"></i> Sign in to continue</a>
      <div class="mt-4 text-muted small">New agent? <a href="#" data-toggle="modal" data-target="#mySignupModal">Create an account</a></div>
    </section>
  <?php endif; ?>
</main>

<footer class="manager-footer">&copy; <?php echo htmlspecialchars($SiteName, ENT_QUOTES, 'UTF-8'); ?> <?php echo htmlspecialchars($Establishment_Year, ENT_QUOTES, 'UTF-8'); ?>–<?php echo date('Y'); ?> <span class="mx-2">·</span> Manager workspace</footer>

<?php if (!$isManager) { include __DIR__ . '/signupModal.html'; } ?>

<script src="admin-modern.js?v=1.0.0"></script>
<script>
(function($){
  if (!$) return;
  $(function(){
    function getNumber(){
      $.ajax({url:'getNumber.php',method:'GET',cache:false,success:function(data){$('.ViewNumber').text(data);}});
    }
    getNumber();
    $(document).on('click', '#WhatsApp', function(event){
      event.preventDefault();
      var current = $('.ViewNumber').text().trim();
      var value = prompt('Change WhatsApp Number', current);
      if (value === null) return;
      value = value.trim();
      if (!value) { alert('Please enter a WhatsApp number.'); return; }
      $.ajax({
        url:'updateWhatsApp.php', method:'POST', data:{What:value},
        success:function(response){
          if ($.trim(String(response)) === '1') { $('.ViewNumber').text(value); alert('WhatsApp number updated successfully.'); }
          else { alert('The number could not be updated. Please try again.'); }
        },
        error:function(){ alert('Could not connect to the server. Please try again.'); }
      });
    });
  });
})(window.jQuery);
</script>
</body>
</html>
