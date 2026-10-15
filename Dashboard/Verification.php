<?php
session_start();
if (!isset($_SESSION['User_id'])) {
    header('Location: LoginContainer.php');
    exit;
}
include('Header.php');

function verification_h($value) {
    return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
}

$verificationStatus = (int)($userDetails['V_Status'] ?? 0);
$levels = [];
$levelQuery = mysqli_query($Conn, "SELECT * FROM verification ORDER BY Level ASC");
if ($levelQuery) {
    while ($levelRow = mysqli_fetch_assoc($levelQuery)) {
        $levels[] = $levelRow;
    }
}
$verifiedCount = 0;
foreach ($levels as $levelRow) {
    if ($verificationStatus >= (int)$levelRow['Level']) {
        $verifiedCount++;
    }
}
$levelCount = count($levels);
$progress = $levelCount > 0 ? (int)round(($verifiedCount / $levelCount) * 100) : 0;
?>
<style>
.verification-page{max-width:1180px;margin:0 auto;padding:8px 0 28px;color:var(--cfxm-text,var(--text-color,#202438))}
.verification-page *{box-sizing:border-box}
.verification-hero{position:relative;overflow:hidden;display:grid;grid-template-columns:minmax(0,1.5fr) minmax(220px,.7fr);gap:24px;align-items:center;padding:clamp(22px,4vw,38px);border:1px solid rgba(160,130,220,.25);border-radius:24px;background:radial-gradient(circle at 85% 15%,rgba(155,111,231,.28),transparent 32%),linear-gradient(125deg,#19142c,#282044 58%,#30214c);color:#fff;box-shadow:0 18px 44px rgba(20,12,42,.18)}
.verification-hero:after{content:"";position:absolute;width:240px;height:240px;right:-90px;bottom:-145px;border:1px solid rgba(255,255,255,.12);border-radius:50%;box-shadow:0 0 0 28px rgba(255,255,255,.025),0 0 0 58px rgba(255,255,255,.02);pointer-events:none}
.vh-eyebrow{display:inline-flex;align-items:center;gap:8px;margin-bottom:13px;color:#d6c5ff;font-size:11px;font-weight:800;letter-spacing:.14em;text-transform:uppercase}
.verification-hero h1{margin:0 0 12px;color:#fff;font-size:clamp(25px,4vw,38px);font-weight:800;letter-spacing:-.04em;line-height:1.12}
.verification-hero p{max-width:650px;margin:0;color:rgba(255,255,255,.75);font-size:14px;line-height:1.75}
.vh-hero-side{position:relative;z-index:1;justify-self:end;width:min(100%,250px);padding:20px;border:1px solid rgba(255,255,255,.15);border-radius:18px;background:rgba(255,255,255,.07);backdrop-filter:blur(10px)}
.vh-progress-head{display:flex;justify-content:space-between;gap:10px;align-items:center;margin-bottom:12px;font-size:12px;color:rgba(255,255,255,.75)}
.vh-progress-head strong{font-size:19px;color:#fff}
.vh-progress-track{height:7px;overflow:hidden;border-radius:99px;background:rgba(255,255,255,.14)}
.vh-progress-fill{height:100%;border-radius:99px;background:linear-gradient(90deg,#a78bfa,#e9d5ff);transition:width .3s ease}
.vh-progress-note{margin-top:12px;color:rgba(255,255,255,.68);font-size:11px;line-height:1.5}
.vh-section-head{display:flex;align-items:end;justify-content:space-between;gap:14px;margin:28px 0 16px}
.vh-section-head h2{margin:0 0 5px;color:var(--cfxm-text,var(--text-color,#202438));font-size:21px;font-weight:800;letter-spacing:-.025em}
.vh-section-head p{margin:0;color:var(--cfxm-muted,var(--liner-text-color,#687184));font-size:13px;line-height:1.6}
.vh-level-grid{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:17px}
.vh-level-card{position:relative;display:flex;flex-direction:column;min-width:0;padding:22px;border:1px solid var(--cfxm-line,rgba(26,35,55,.12));border-radius:20px;background:var(--cfxm-surface,var(--card-bg,#fff));box-shadow:var(--cfxm-shadow,0 12px 32px rgba(23,27,44,.06));transition:transform .18s ease,border-color .18s ease}
.vh-level-card:hover{transform:translateY(-2px);border-color:rgba(119,72,188,.35)}
.vh-level-top{display:flex;align-items:flex-start;justify-content:space-between;gap:12px;margin-bottom:16px}
.vh-level-icon{display:grid;place-items:center;width:46px;height:46px;flex:0 0 46px;border-radius:15px;background:rgba(119,72,188,.12);color:var(--cfxm-purple-2,#7748bc);font-size:19px}
.vh-level-card h3{margin:0 0 6px;color:var(--cfxm-text,var(--text-color,#202438));font-size:18px;font-weight:800}
.vh-level-subtitle{margin:0;color:var(--cfxm-muted,var(--liner-text-color,#687184));font-size:12px}
.vh-status{display:inline-flex;align-items:center;gap:6px;padding:7px 10px;border-radius:999px;font-size:10px;font-weight:800;white-space:nowrap}
.vh-status.is-verified{background:rgba(22,163,74,.12);color:#22a05a}
.vh-status.is-pending{background:rgba(217,119,6,.13);color:#d97706}
.vh-status i{font-size:10px}
.vh-requirement{flex:1;margin:0 0 18px;padding:14px;border-radius:13px;background:var(--cfxm-bg-deep,rgba(120,130,150,.07));color:var(--cfxm-muted,var(--liner-text-color,#687184));font-size:13px;line-height:1.65;overflow-wrap:anywhere}
.vh-limits{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:10px;margin-bottom:18px}
.vh-limit{padding:13px;border:1px solid var(--cfxm-line,rgba(26,35,55,.1));border-radius:13px;min-width:0}
.vh-limit-label{display:block;margin-bottom:7px;color:var(--cfxm-muted,var(--liner-text-color,#687184));font-size:10px;font-weight:700;letter-spacing:.04em;text-transform:uppercase}
.vh-limit-value{display:block;color:var(--cfxm-text,var(--text-color,#202438));font-size:clamp(13px,2vw,17px);font-weight:800;overflow-wrap:anywhere}
.vh-action{display:inline-flex;align-items:center;justify-content:center;gap:9px;width:100%;min-height:45px;padding:12px 16px;border:0;border-radius:12px;background:linear-gradient(135deg,#49247e,#7748bc);color:#fff!important;font-size:12px;font-weight:800;text-decoration:none!important;box-shadow:0 8px 18px rgba(73,36,126,.2);transition:transform .18s ease,filter .18s ease}
.vh-action:hover,.vh-action:focus{filter:brightness(1.08);transform:translateY(-1px);color:#fff!important}
.vh-action:focus-visible,.vh-modal-submit:focus-visible,.vh-modal-close:focus-visible{outline:3px solid rgba(119,72,188,.38);outline-offset:3px}
.vh-action.is-complete{background:rgba(22,163,74,.12);color:#22a05a!important;box-shadow:none;cursor:default}
.vh-empty{padding:32px 20px;border:1px dashed var(--cfxm-line,rgba(26,35,55,.18));border-radius:18px;text-align:center;color:var(--cfxm-muted,var(--liner-text-color,#687184));background:var(--cfxm-surface,var(--card-bg,#fff))}
.vh-empty i{display:block;margin-bottom:12px;color:var(--cfxm-purple-2,#7748bc);font-size:28px}
.vh-empty strong{display:block;margin-bottom:6px;color:var(--cfxm-text,var(--text-color,#202438));font-size:15px}
.vh-security-note{display:flex;gap:13px;align-items:flex-start;margin-top:20px;padding:17px;border:1px solid rgba(119,72,188,.2);border-radius:16px;background:rgba(119,72,188,.06)}
.vh-security-note>i{margin-top:2px;color:var(--cfxm-purple-2,#7748bc);font-size:19px}
.vh-security-note strong{display:block;margin-bottom:4px;color:var(--cfxm-text,var(--text-color,#202438));font-size:12px}
.vh-security-note p{margin:0;color:var(--cfxm-muted,var(--liner-text-color,#687184));font-size:12px;line-height:1.65}
.vh-modal .modal-content{overflow:hidden;border:1px solid var(--cfxm-line,rgba(26,35,55,.12));border-radius:20px;background:var(--cfxm-surface,var(--card-bg,#fff));color:var(--cfxm-text,var(--text-color,#202438));box-shadow:0 24px 80px rgba(0,0,0,.25)}
.vh-modal .modal-header{align-items:flex-start;padding:22px 22px 16px;border-bottom:1px solid var(--cfxm-line,rgba(26,35,55,.12))}
.vh-modal .modal-title{color:var(--cfxm-text,var(--text-color,#202438));font-size:19px;font-weight:800}
.vh-modal .modal-header p{margin:6px 0 0;color:var(--cfxm-muted,var(--liner-text-color,#687184));font-size:12px;line-height:1.6}
.vh-modal .modal-body{padding:22px}
.vh-modal .close{color:var(--cfxm-text,var(--text-color,#202438));opacity:.8;text-shadow:none}
.vh-modal label{display:block;margin-bottom:8px;color:var(--cfxm-text,var(--text-color,#202438));font-size:12px;font-weight:750}
.vh-modal .form-control{min-height:45px;border:1px solid var(--cfxm-line,rgba(26,35,55,.18));border-radius:11px;background:var(--cfxm-bg,var(--body-bg,#fff));color:var(--cfxm-text,var(--text-color,#202438));box-shadow:none}
.vh-modal .form-control:focus{border-color:#9874d6;box-shadow:0 0 0 3px rgba(119,72,188,.13)}
.vh-modal input[type=file].form-control{height:auto;padding:10px}
.vh-modal .vh-modal-submit{width:100%;min-height:45px;border:0;border-radius:11px;background:linear-gradient(135deg,#49247e,#7748bc);color:#fff;font-weight:800}
.vh-modal .vh-modal-help{margin-top:10px;color:var(--cfxm-muted,var(--liner-text-color,#687184));font-size:11px;line-height:1.6}
@media(max-width:760px){.verification-hero{grid-template-columns:1fr}.vh-hero-side{justify-self:stretch;width:100%}.vh-level-grid{grid-template-columns:1fr}.vh-section-head{align-items:flex-start;flex-direction:column}.vh-level-card{padding:18px}}
@media(prefers-reduced-motion:reduce){.vh-level-card,.vh-action,.vh-progress-fill{transition:none}}
</style>

<div class="container-fluid">
  <section class="verification-page" aria-labelledby="verificationTitle">
    <div class="verification-hero">
      <div>
        <span class="vh-eyebrow"><i class="fas fa-shield-alt"></i> Account protection</span>
        <h1 id="verificationTitle">Verification &amp; limits</h1>
        <p>Complete the required checks to unlock higher account limits. Your verification progress and available requirements are shown below, so you can see exactly what to do next.</p>
      </div>
      <div class="vh-hero-side" aria-label="Verification progress">
        <div class="vh-progress-head"><span>Verification progress</span><strong><?php echo $progress; ?>%</strong></div>
        <div class="vh-progress-track" role="progressbar" aria-valuenow="<?php echo $progress; ?>" aria-valuemin="0" aria-valuemax="100" aria-label="Verification progress">
          <div class="vh-progress-fill" style="width:<?php echo $progress; ?>%"></div>
        </div>
        <div class="vh-progress-note"><?php echo $verifiedCount; ?> of <?php echo $levelCount; ?> verification levels completed. Complete the next available level to increase your account privileges.</div>
      </div>
    </div>

    <div class="vh-section-head">
      <div><h2>Your verification levels</h2><p>Review each level's requirements, deposit limit and withdrawal limit.</p></div>
    </div>

    <?php if (!$levels): ?>
      <div class="vh-empty"><i class="fas fa-clipboard-check"></i><strong>Verification levels are not available yet</strong><span>Please check back later or contact support if you need help with your account limits.</span></div>
    <?php else: ?>
      <div class="vh-level-grid">
      <?php foreach ($levels as $levelRow):
        $level = (int)$levelRow['Level'];
        $isVerified = $verificationStatus >= $level;
        $requirement = trim((string)($levelRow['Requirement'] ?? ''));
        $controls = (int)($levelRow['Controls'] ?? 0);
        $depositLimit = (float)($levelRow['Deposit_Limit'] ?? 0) * (float)$exchangerate;
        $withdrawalLimit = (float)($levelRow['Withdrawal_Limit'] ?? 0) * (float)$exchangerate;
      ?>
        <article class="vh-level-card">
          <div class="vh-level-top">
            <div style="display:flex;gap:13px;align-items:center;min-width:0">
              <div class="vh-level-icon"><i class="fas fa-<?php echo $isVerified ? 'check-double' : 'user-shield'; ?>"></i></div>
              <div><h3>Level <?php echo $level; ?></h3><p class="vh-level-subtitle"><?php echo $isVerified ? 'Verification completed' : 'Account verification'; ?></p></div>
            </div>
            <span class="vh-status <?php echo $isVerified ? 'is-verified' : 'is-pending'; ?>"><i class="fas fa-<?php echo $isVerified ? 'check-circle' : 'clock'; ?>"></i><?php echo $isVerified ? 'Verified' : 'Not verified'; ?></span>
          </div>
          <p class="vh-requirement"><?php echo $requirement !== '' ? nl2br(verification_h($requirement)) : 'Follow the instructions in the verification form to complete this level.'; ?></p>
          <div class="vh-limits">
            <div class="vh-limit"><span class="vh-limit-label"><i class="fas fa-arrow-down" aria-hidden="true"></i> Maximum deposit</span><strong class="vh-limit-value"><?php echo verification_h($curAbbr); ?><?php echo number_format($depositLimit, 2, '.', ','); ?></strong></div>
            <div class="vh-limit"><span class="vh-limit-label"><i class="fas fa-arrow-up" aria-hidden="true"></i> Maximum withdrawal</span><strong class="vh-limit-value"><?php echo verification_h($curAbbr); ?><?php echo number_format($withdrawalLimit, 2, '.', ','); ?></strong></div>
          </div>
          <?php if ($isVerified): ?>
            <span class="vh-action is-complete"><i class="fas fa-check-circle"></i> Level completed</span>
          <?php else: ?>
            <button type="button" class="vh-action" data-toggle="modal" data-target="#verificationModal<?php echo $level; ?>"><i class="fas fa-lock-open"></i> Verify level <?php echo $level; ?> <i class="fas fa-arrow-right"></i></button>
          <?php endif; ?>
        </article>

        <div class="modal fade vh-modal" id="verificationModal<?php echo $level; ?>" tabindex="-1" role="dialog" aria-labelledby="verificationModalTitle<?php echo $level; ?>" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <div><h4 class="modal-title" id="verificationModalTitle<?php echo $level; ?>">Level <?php echo $level; ?> verification</h4><p>Submit the information requested below. Our team will review it before updating your account level.</p></div>
                <button type="button" class="close vh-modal-close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              </div>
              <div class="modal-body">
                <div class="form-group"><label>What you need to provide</label><div class="vh-requirement" style="margin-bottom:20px"><?php echo $requirement !== '' ? nl2br(verification_h($requirement)) : 'Please provide the information requested for this level.'; ?></div></div>
                <?php if ($controls === 2): ?>
                  <form class="verification-upload-form" data-level="<?php echo $level; ?>" enctype="multipart/form-data">
                    <input type="hidden" name="Level" value="<?php echo $level; ?>">
                    <div class="form-group"><label for="verificationFile<?php echo $level; ?>">Upload your document</label><input type="file" id="verificationFile<?php echo $level; ?>" class="form-control" name="VerificationImage" accept="image/*,.pdf" required><small class="vh-modal-help">Choose a clear, readable image or PDF of the requested document. Avoid uploading unrelated files.</small></div>
                    <button type="submit" class="vh-modal-submit"><i class="fas fa-cloud-upload-alt"></i> Upload for review</button>
                  </form>
                <?php else: ?>
                  <form class="verification-info-form" data-level="<?php echo $level; ?>">
                    <div class="form-group"><label for="verificationInfo<?php echo $level; ?>">Your verification information</label><input type="text" id="verificationInfo<?php echo $level; ?>" class="form-control" name="info" autocomplete="off" required maxlength="500" placeholder="Enter the requested information"></div>
                    <button type="submit" class="vh-modal-submit"><i class="fas fa-paper-plane"></i> Submit for review</button>
                  </form>
                <?php endif; ?>
                <p class="vh-modal-help"><i class="fas fa-lock"></i> For your security, only submit information relevant to the stated verification requirement.</p>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
      </div>
    <?php endif; ?>

    <div class="vh-security-note"><i class="fas fa-user-shield"></i><div><strong>Keep your information secure</strong><p>Only upload documents requested for your account verification. If a requirement is unclear or you believe a submitted document was not received, contact support rather than sending sensitive details through an unrelated channel.</p></div></div>
  </section>
</div>

<script>
(function($) {
  'use strict';
  if (!$) return;

  function verificationNotice(options) {
    if (typeof window.swal === 'function') {
      return window.swal(options);
    }
    var message = typeof options === 'string' ? options : ((options && options.text) || (options && options.title) || 'Request completed.');
    window.alert(message);
    return $.Deferred().resolve().promise();
  }

  $(document).on('submit', '.verification-info-form', function(event) {
    event.preventDefault();
    var form = this;
    var level = $(form).data('level');
    var info = $.trim($(form).find('[name="info"]').val() || '');
    var button = $(form).find('button[type="submit"]');
    if (!info) {
      verificationNotice({title:'Information required', text:'Please enter the requested verification information.', icon:'warning'});
      return;
    }
    button.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Submitting...');
    $.ajax({
      url: 'insertVerificationInfo.php',
      type: 'POST',
      data: {count: level, info: info},
      success: function(response) {
        response = $.trim(String(response));
        if (response === '1') {
          verificationNotice({title:'Submitted for review', text:'We received your information. Please allow time for our team to review it.', icon:'success'}).then(function(){ window.location.reload(); });
        } else {
          verificationNotice({title:'Could not submit', text:'Your information was not accepted. Please try again or contact support.', icon:'error'});
          button.prop('disabled', false).html('<i class="fas fa-paper-plane"></i> Submit for review');
        }
      },
      error: function() {
        verificationNotice({title:'Connection issue', text:'We could not submit your information. Check your connection and try again.', icon:'error'});
        button.prop('disabled', false).html('<i class="fas fa-paper-plane"></i> Submit for review');
      }
    });
  });

  $(document).on('submit', '.verification-upload-form', function(event) {
    event.preventDefault();
    var form = this;
    var level = $(form).data('level');
    var fileInput = $(form).find('[name="VerificationImage"]')[0];
    var button = $(form).find('button[type="submit"]');
    if (!fileInput || !fileInput.files || !fileInput.files.length) {
      verificationNotice({title:'Choose a document', text:'Select the document requested for this verification level.', icon:'warning'});
      return;
    }
    var data = new FormData(form);
    data.set('Level', level);
    button.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Uploading...');
    $.ajax({
      url: 'uploadVerificationImage.php',
      type: 'POST',
      data: data,
      dataType: 'json',
      cache: false,
      contentType: false,
      processData: false,
      success: function(response) {
        if (response === 1 || response === '1') {
          verificationNotice({title:'Document received', text:'Your document has been submitted for review. We will notify you after verification.', icon:'success'}).then(function() {
            var name = <?php echo json_encode((string)($_SESSION['First_Name'] ?? 'Customer'), JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP); ?>;
            $.ajax({
              url: '../Manager/SendMail.php',
              method: 'POST',
              data: {
                SendTo: 'investment@vistra-holding.com',
                Subject: 'Verification Documents Uploaded - ' + name,
                htmlcontent: name + ' has uploaded documents for verification. Please review the submission in the manager dashboard.'
              }
            }).always(function(){ window.location.reload(); });
            window.setTimeout(function(){ window.location.reload(); }, 1200);
          });
        } else {
          verificationNotice({title:'Upload unsuccessful', text:'The document could not be uploaded. Please check the file and try again.', icon:'error'});
          button.prop('disabled', false).html('<i class="fas fa-cloud-upload-alt"></i> Upload for review');
        }
      },
      error: function() {
        verificationNotice({title:'Upload failed', text:'We could not upload this file. Please try again with a supported document.', icon:'error'});
        button.prop('disabled', false).html('<i class="fas fa-cloud-upload-alt"></i> Upload for review');
      }
    });
  });
})(window.jQuery);
</script>

<?php include('Footer.php'); ?>
