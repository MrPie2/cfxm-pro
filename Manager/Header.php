<?php
if (session_status() !== PHP_SESSION_ACTIVE) { session_start(); }
include_once __DIR__ . '/SiteConfig.php';
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9QK1tv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="admin-modern.css?v=1.0.0">
<header class="manager-topbar">
  <div class="manager-topbar-inner">
    <a class="manager-brand" href="Index.php" aria-label="<?php echo htmlspecialchars($SiteName, ENT_QUOTES, 'UTF-8'); ?> Manager home">
      <span class="manager-brand-mark"><i class="bi bi-grid-1x2-fill" aria-hidden="true"></i></span>
      <span><?php echo htmlspecialchars($SiteName, ENT_QUOTES, 'UTF-8'); ?><small>Administration</small></span>
    </a>
    <nav class="manager-top-actions" aria-label="Main navigation">
      <a class="manager-top-link" href="Index.php"><i class="bi bi-house-door" aria-hidden="true"></i><span class="manager-link-label">Home</span></a>
      <?php if (isset($_SESSION['Boss_id'])): ?>
        <a class="manager-top-link" href="../en/"><i class="bi bi-box-arrow-up-right" aria-hidden="true"></i><span class="manager-link-label">View website</span></a>
        <a class="manager-top-link primary" href="Logout.php"><i class="bi bi-box-arrow-right" aria-hidden="true"></i><span class="manager-link-label">Sign out</span></a>
      <?php else: ?>
        <a class="manager-top-link primary" href="LoginModal.php"><i class="bi bi-shield-lock" aria-hidden="true"></i><span>Admin login</span></a>
      <?php endif; ?>
    </nav>
  </div>
</header>
