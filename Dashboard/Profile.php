<?php session_start();
if (!isset($_SESSION['User_id'])) {
    header('Location: LoginContainer.php');
    exit;
}
include('Header.php');

$profileInvestorId = (string)($_SESSION['User_id'] ?? '');
$profileRow = isset($userDetails) && is_array($userDetails) ? $userDetails : array();
$profileEscape = function ($value) {
    return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
};
$profileName = trim((string)($profileRow['First_Name'] ?? ''));
if ($profileName === '') {
    $profileName = (string)($profileRow['Username'] ?? 'Investor');
}
$profileEmail = (string)($profileRow['Email'] ?? '');
$profileUsername = (string)($profileRow['Username'] ?? '');
$profilePhone = (string)($profileRow['Phone'] ?? '');
$profileCountry = (string)($profileRow['Nationality'] ?? '');
$profilePicture = trim((string)($profileRow['Profile_Picture'] ?? ''));
if ($profilePicture === '') {
    $profilePicture = '../BlankFace.png';
}
$profileCurrencyName = (string)($curName ?? 'United States Dollar');
$profileCurrencyAbbr = (string)($curAbbr ?? 'USD');

$profileRates = array('NGN'=>null, 'BWP'=>null, 'GHS'=>null, 'GBP'=>null, 'TRY'=>null, 'USD'=>1);
$profileApiKey = 'adcaa3367f477f56b36dc33c';
if (function_exists('curl_init')) {
    $profileCurl = curl_init('https://v6.exchangerate-api.com/v6/' . rawurlencode($profileApiKey) . '/latest/USD');
    curl_setopt_array($profileCurl, array(
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CONNECTTIMEOUT => 3,
        CURLOPT_TIMEOUT => 5
    ));
    $profileResponse = curl_exec($profileCurl);
    $profileHttpCode = (int)curl_getinfo($profileCurl, CURLINFO_HTTP_CODE);
    curl_close($profileCurl);
    if (is_string($profileResponse) && $profileHttpCode >= 200 && $profileHttpCode < 300) {
        $profileRateData = json_decode($profileResponse, true);
        if (isset($profileRateData['conversion_rates']) && is_array($profileRateData['conversion_rates'])) {
            foreach (array_keys($profileRates) as $profileCode) {
                if (isset($profileRateData['conversion_rates'][$profileCode]) && is_numeric($profileRateData['conversion_rates'][$profileCode])) {
                    $profileRates[$profileCode] = (float)$profileRateData['conversion_rates'][$profileCode];
                }
            }
        }
    }
}
$profileCurrencyOptions = array(
    'NGN' => 'Nigerian Naira',
    'BWP' => 'Botswana Pula',
    'GHS' => 'Ghanaian Cedi',
    'GBP' => 'British Pound',
    'TRY' => 'Turkish Lira',
    'USD' => 'United States Dollar'
);
?>
<style>
/* Modern profile page — styles are scoped to avoid changing other dashboard screens. */
.profile-page{max-width:1280px;margin:0 auto;padding:24px 22px 42px;color:var(--text-color,#17243a)}
.profile-page *{box-sizing:border-box}
.profile-page .pf-eyebrow{display:inline-flex;align-items:center;gap:8px;color:#9b7bea;font-size:10px;font-weight:850;letter-spacing:.15em;text-transform:uppercase}
.profile-page .pf-eyebrow:before{content:"";width:18px;height:2px;border-radius:2px;background:currentColor}
.profile-page .pf-heading{display:flex;align-items:flex-end;justify-content:space-between;gap:18px;margin-bottom:22px}
.profile-page .pf-heading h1{font-size:clamp(27px,3vw,36px);font-weight:850;letter-spacing:-.05em;line-height:1.1;margin:8px 0}
.profile-page .pf-heading p{margin:0;color:var(--vh-muted,#81909b);font-size:13px;line-height:1.65}
.profile-page .pf-status{display:inline-flex;align-items:center;gap:8px;padding:9px 12px;border:1px solid rgba(128,148,164,.22);border-radius:999px;color:var(--vh-muted,#81909b);font-size:11px;white-space:nowrap}
.profile-page .pf-status i{color:#22b573}
.profile-page .pf-layout{display:grid;grid-template-columns:minmax(260px,.72fr) minmax(0,1.55fr);gap:18px;align-items:start}
.profile-page .pf-card{background:var(--card-bg,var(--bg-color2,#fff));border:1px solid rgba(128,148,164,.2);border-radius:19px;overflow:hidden;box-shadow:0 8px 28px rgba(15,35,45,.035);margin-bottom:18px}
.profile-page .pf-card-head{padding:18px 20px;border-bottom:1px solid rgba(128,148,164,.17)}
.profile-page .pf-card-head h2{font-size:15px;font-weight:850;letter-spacing:-.025em;margin:0}
.profile-page .pf-card-head p{font-size:11px;line-height:1.55;color:var(--vh-muted,#81909b);margin:5px 0 0}
.profile-page .pf-card-body{padding:20px}
.profile-page .pf-identity{position:relative;padding:26px 20px 22px;text-align:center;color:#fff;background:linear-gradient(135deg,#17162c 0%,#29234e 58%,#4c337b 100%);overflow:hidden}
.profile-page .pf-identity:after{content:"";position:absolute;width:190px;height:190px;right:-75px;top:-100px;border:1px solid rgba(255,255,255,.14);border-radius:50%;box-shadow:0 0 0 24px rgba(255,255,255,.035),0 0 0 48px rgba(255,255,255,.025);pointer-events:none}
.profile-page .pf-avatar-wrap{position:relative;width:104px;height:104px;margin:0 auto 15px;z-index:1}
.profile-page .pf-avatar{display:block;width:104px;height:104px;object-fit:cover;border-radius:50%;border:4px solid rgba(255,255,255,.8);background:#eee;box-shadow:0 8px 28px rgba(0,0,0,.25)}
.profile-page .pf-avatar-edit{position:absolute;right:-2px;bottom:1px;width:34px;height:34px;display:grid;place-items:center;border:3px solid #28234d;border-radius:50%;background:#b8f4d0;color:#18283a;cursor:pointer}
.profile-page .pf-identity h2{position:relative;z-index:1;font-size:21px;font-weight:850;letter-spacing:-.04em;margin:0 0 5px;overflow-wrap:anywhere}
.profile-page .pf-identity .pf-username{position:relative;z-index:1;color:#d0c9e9;font-size:12px;margin-bottom:13px}
.profile-page .pf-member{position:relative;z-index:1;display:inline-flex;align-items:center;gap:7px;padding:7px 10px;border-radius:999px;background:rgba(255,255,255,.1);border:1px solid rgba(255,255,255,.15);font-size:10px;font-weight:750;color:#e9e5f8}
.profile-page .pf-quick-facts{display:grid;grid-template-columns:1fr 1fr;gap:10px;margin-top:16px}
.profile-page .pf-fact{padding:13px;border-radius:12px;background:rgba(255,255,255,.07);border:1px solid rgba(255,255,255,.1);text-align:left;min-width:0}
.profile-page .pf-fact span{display:block;color:#c5c0df;font-size:10px;margin-bottom:6px}
.profile-page .pf-fact strong{display:block;font-size:12px;overflow-wrap:anywhere;color:#fff}
.profile-page .pf-upload{padding:17px 20px 20px}
.profile-page .pf-upload form{margin:0}
.profile-page .pf-upload .pf-upload-label{display:block;color:var(--vh-muted,#81909b);font-size:11px;margin-bottom:8px}
.profile-page .pf-upload input[type=file]{width:100%;font-size:11px;color:var(--vh-muted,#81909b);padding:8px;border:1px dashed rgba(128,148,164,.35);border-radius:10px;background:rgba(128,148,164,.04)}
.profile-page .pf-upload .pf-upload-submit{margin-top:10px;width:100%;border:0;border-radius:10px;padding:11px 14px;background:linear-gradient(135deg,#6844ae,#8a66d4);color:#fff;font-weight:800;font-size:12px;cursor:pointer}
.profile-page .pf-upload .pf-upload-submit:hover{filter:brightness(1.08)}
.profile-page .pf-hidden{display:none!important}
.profile-page .pf-form-grid{display:grid;grid-template-columns:1fr 1fr;gap:16px}
.profile-page .pf-field{min-width:0;margin:0}
.profile-page .pf-field.pf-wide{grid-column:1/-1}
.profile-page .pf-field label{display:block;color:var(--text-color,#263447);font-size:11px;font-weight:750;margin:0 0 7px}
.profile-page .pf-input-wrap{position:relative}
.profile-page .pf-input-icon{position:absolute;left:13px;top:50%;transform:translateY(-50%);color:#9b7bea;font-size:13px;pointer-events:none}
.profile-page .pf-field input,.profile-page .pf-field select{width:100%;height:45px;padding:10px 13px 10px 38px;border-radius:10px;border:1px solid rgba(128,148,164,.28);background:var(--body-bg,var(--bg-color,#fff));color:var(--text-color,#17243a);font-size:12px;outline:none;transition:border-color .2s,box-shadow .2s}
.profile-page .pf-field input:focus,.profile-page .pf-field select:focus{border-color:#9874e2;box-shadow:0 0 0 3px rgba(152,116,226,.13)}
.profile-page .pf-field input:disabled{opacity:.82;cursor:not-allowed}
.profile-page .pf-field input::placeholder{color:#9aa5b2}
.profile-page .pf-field .pf-edit-btn{position:absolute;right:6px;top:6px;height:33px;padding:0 10px;border:0;border-radius:7px;background:rgba(139,104,224,.12);color:#9978e5;font-size:10px;font-weight:800;cursor:pointer}
.profile-page .pf-field.pf-editable input{padding-right:64px}
.profile-page .pf-form-note{margin:15px 0 0;color:var(--vh-muted,#81909b);font-size:11px;line-height:1.6}
.profile-page .pf-actions{display:flex;justify-content:flex-end;gap:10px;margin-top:20px;padding-top:18px;border-top:1px solid rgba(128,148,164,.17)}
.profile-page .pf-save{display:inline-flex;align-items:center;justify-content:center;gap:8px;border:0;border-radius:10px;padding:12px 18px;background:linear-gradient(135deg,#6844ae,#8a66d4);color:#fff;font-size:12px;font-weight:850;box-shadow:0 7px 18px rgba(104,68,174,.2);cursor:pointer}
.profile-page .pf-save:hover{filter:brightness(1.08);transform:translateY(-1px)}
.profile-page .pf-currency-note{display:flex;gap:12px;align-items:flex-start;padding:14px;border-radius:12px;background:rgba(139,104,224,.08);border:1px solid rgba(139,104,224,.16);margin-bottom:18px}
.profile-page .pf-currency-note i{color:#9978e5;font-size:16px;margin-top:2px}
.profile-page .pf-currency-note strong{display:block;font-size:12px;margin-bottom:4px}
.profile-page .pf-currency-note p{font-size:11px;line-height:1.6;color:var(--vh-muted,#81909b);margin:0}
.profile-page .pf-currency-actions{display:flex;justify-content:flex-end;margin-top:16px}
.profile-page .pf-currency-save{border:1px solid rgba(139,104,224,.3);border-radius:9px;padding:10px 14px;background:rgba(139,104,224,.1);color:#9978e5;font-size:11px;font-weight:800;cursor:pointer}
.profile-page .pf-tip-list{display:grid;gap:12px}
.profile-page .pf-tip{display:flex;align-items:flex-start;gap:12px}
.profile-page .pf-tip-icon{flex:0 0 34px;width:34px;height:34px;display:grid;place-items:center;border-radius:10px;background:rgba(30,176,112,.1);color:#20a56c}
.profile-page .pf-tip strong{display:block;font-size:12px;margin:1px 0 4px}
.profile-page .pf-tip p{font-size:11px;line-height:1.6;color:var(--vh-muted,#81909b);margin:0}
.profile-page .pf-card .pf-link{color:#9978e5;text-decoration:none;font-weight:800}
@media(max-width:900px){.profile-page .pf-layout{grid-template-columns:minmax(0,1fr)}.profile-page .pf-profile-side{display:grid;grid-template-columns:minmax(0,1fr) minmax(0,1fr);gap:14px;align-items:start}.profile-page .pf-profile-side .pf-card{margin-bottom:0}.profile-page .pf-profile-side .pf-tip-card{grid-column:1/-1}}
@media(max-width:600px){.profile-page{padding:18px 12px 34px}.profile-page .pf-heading{align-items:flex-start;flex-direction:column}.profile-page .pf-layout{gap:12px}.profile-page .pf-profile-side{display:block}.profile-page .pf-profile-side .pf-card{margin-bottom:14px}.profile-page .pf-form-grid{grid-template-columns:1fr;gap:13px}.profile-page .pf-field.pf-wide{grid-column:auto}.profile-page .pf-card-body{padding:16px}.profile-page .pf-card-head{padding:16px}.profile-page .pf-actions{justify-content:stretch}.profile-page .pf-save{width:100%}.profile-page .pf-status{white-space:normal}}
@media(prefers-reduced-motion:reduce){.profile-page *{transition:none!important;scroll-behavior:auto!important}}
</style>

<div class="profile-page">
    <header class="pf-heading">
        <div>
            <span class="pf-eyebrow">Your account</span>
            <h1>Profile &amp; preferences</h1>
            <p>Manage your personal details, profile photo, and account currency in one place.</p>
        </div>
        <div class="pf-status"><i class="fas fa-shield-alt"></i> Personal information</div>
    </header>

    <div class="pf-layout">
        <aside class="pf-profile-side">
            <section class="pf-card">
                <div class="pf-identity">
                    <div class="pf-avatar-wrap">
                        <img class="pf-avatar" src="<?php echo $profileEscape($profilePicture); ?>" alt="Profile picture">
                        <button type="button" class="pf-avatar-edit ShowPhotoCont" aria-label="Change profile photo" title="Change profile photo"><i class="fas fa-camera"></i></button>
                    </div>
                    <h2><?php echo $profileEscape($profileName); ?></h2>
                    <div class="pf-username">@<?php echo $profileEscape($profileUsername !== '' ? $profileUsername : 'investor'); ?></div>
                    <span class="pf-member"><i class="fas fa-check-circle"></i> CFXM-PRO member</span>
                    <div class="pf-quick-facts">
                        <div class="pf-fact"><span><i class="fas fa-id-badge"></i> Investor ID</span><strong><?php echo $profileEscape($profileInvestorId); ?></strong></div>
                        <div class="pf-fact"><span><i class="fas fa-globe"></i> Country</span><strong><?php echo $profileEscape($profileCountry !== '' ? $profileCountry : 'Not set'); ?></strong></div>
                    </div>
                </div>
                <div class="pf-upload pf-hidden updatePhotoContainer">
                    <form id="uploadImageForm" enctype="multipart/form-data">
                        <label class="pf-upload-label" for="field-upload">Choose a new profile photo</label>
                        <input type="file" id="field-upload" name="userImage" accept="image/*" required>
                        <button type="submit" class="pf-upload-submit updatePhoto"><i class="fas fa-cloud-upload-alt"></i> Upload photo</button>
                    </form>
                </div>
            </section>

            <section class="pf-card pf-tip-card">
                <div class="pf-card-head"><h2><i class="fas fa-user-shield" style="color:#9978e5;margin-right:7px"></i> Keep your account safe</h2><p>A few simple habits help protect your profile.</p></div>
                <div class="pf-card-body">
                    <div class="pf-tip-list">
                        <div class="pf-tip"><span class="pf-tip-icon"><i class="fas fa-lock"></i></span><div><strong>Protect your sign-in</strong><p>Never share your password or verification codes with anyone.</p></div></div>
                        <div class="pf-tip"><span class="pf-tip-icon"><i class="fas fa-envelope"></i></span><div><strong>Keep contact details current</strong><p>Use an email address and phone number you can access.</p></div></div>
                        <div class="pf-tip"><span class="pf-tip-icon"><i class="fas fa-user-check"></i></span><div><strong>Review account verification</strong><p>Check your verification status and available limits from the dashboard.</p></div></div>
                    </div>
                    <p style="margin:17px 0 0;font-size:11px"><a class="pf-link" href="Verification.php">Go to verification <i class="fas fa-arrow-right"></i></a></p>
                </div>
            </section>
        </aside>

        <div class="pf-main">
            <section class="pf-card">
                <div class="pf-card-head"><h2>Personal information</h2><p>Update the details associated with your account.</p></div>
                <div class="pf-card-body">
                    <div class="pf-form-grid">
                        <div class="pf-field">
                            <label for="profile-user-id">Investor ID</label>
                            <div class="pf-input-wrap"><i class="pf-input-icon fas fa-fingerprint"></i><input id="profile-user-id" type="text" value="<?php echo $profileEscape($profileInvestorId); ?>" disabled></div>
                        </div>
                        <div class="pf-field">
                            <label for="profile-username">Username</label>
                            <div class="pf-input-wrap"><i class="pf-input-icon fas fa-at"></i><input id="profile-username" type="text" value="<?php echo $profileEscape($profileUsername); ?>" disabled></div>
                        </div>
                        <div class="pf-field pf-editable">
                            <label for="profile-email">Email address</label>
                            <div class="pf-input-wrap"><i class="pf-input-icon fas fa-envelope"></i><input id="profile-email" type="email" class="NewEmail" value="<?php echo $profileEscape($profileEmail); ?>" placeholder="Email address" disabled><button type="button" class="pf-edit-btn EditEmail">Edit</button></div>
                        </div>
                        <div class="pf-field pf-editable">
                            <label for="profile-name">Full name</label>
                            <div class="pf-input-wrap"><i class="pf-input-icon fas fa-user"></i><input id="profile-name" type="text" class="FullName" value="<?php echo $profileEscape($profileName === 'Investor' ? '' : $profileName); ?>" placeholder="Your full name" disabled><button type="button" class="pf-edit-btn EditName">Edit</button></div>
                        </div>
                        <div class="pf-field">
                            <label for="profile-country">Country / nationality</label>
                            <div class="pf-input-wrap"><i class="pf-input-icon fas fa-globe-africa"></i><input id="profile-country" type="text" value="<?php echo $profileEscape($profileCountry); ?>" placeholder="Country" disabled></div>
                        </div>
                        <div class="pf-field pf-editable">
                            <label for="profile-phone">Phone number</label>
                            <div class="pf-input-wrap"><i class="pf-input-icon fas fa-phone"></i><input id="profile-phone" type="tel" class="PhoneNumber" value="<?php echo $profileEscape($profilePhone); ?>" placeholder="Phone number" disabled><button type="button" class="pf-edit-btn EditPhone">Edit</button></div>
                        </div>
                    </div>
                    <p class="pf-form-note"><i class="fas fa-info-circle"></i> Select Edit beside your email, name, or phone number, then save your changes.</p>
                    <div class="pf-actions"><button type="button" class="pf-save Update"><i class="fas fa-save"></i> Save changes</button></div>
                </div>
            </section>

            <section class="pf-card">
                <div class="pf-card-head"><h2>Currency preferences</h2><p>Choose the currency used to display account values.</p></div>
                <div class="pf-card-body">
                    <div class="pf-currency-note">
                        <i class="fas fa-coins"></i>
                        <div><strong>Current preference: <?php echo $profileEscape($profileCurrencyName . ' (' . $profileCurrencyAbbr . ')'); ?></strong><p>Your preference affects displayed values only. It does not change the underlying currency of deposits, withdrawals, or investments.</p></div>
                    </div>
                    <div class="pf-field pf-wide">
                        <label for="profile-currency">Preferred currency</label>
                        <div class="pf-input-wrap"><i class="pf-input-icon fas fa-money-bill-wave"></i>
                            <select id="profile-currency" class="currency">
                                <option value="">Choose preferred currency</option>
                                <?php foreach ($profileCurrencyOptions as $profileCode => $profileLabel):
                                    $profileRate = $profileRates[$profileCode] ?? null;
                                    if (!is_numeric($profileRate) || (float)$profileRate <= 0) { continue; }
                                ?>
                                    <option abbr="<?php echo $profileEscape($profileCode); ?>" value="<?php echo $profileEscape((string)$profileRate); ?>" <?php echo $profileCurrencyAbbr === $profileCode ? 'selected' : ''; ?>><?php echo $profileEscape($profileLabel . ' (' . $profileCode . ')'); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="pf-currency-actions"><button type="button" class="pf-currency-save" id="saveCurrency"><i class="fas fa-check"></i> Save currency</button></div>
                </div>
            </section>
        </div>
    </div>
</div>

<?php include('Footer.php'); ?>

<script>
(function ($) {
    'use strict';

    $('.EditPhone').on('click', function () {
        $('.PhoneNumber').prop('disabled', false).focus();
    });
    $('.EditEmail').on('click', function () {
        $('.NewEmail').prop('disabled', false).focus();
    });
    $('.EditName').on('click', function () {
        $('.FullName').prop('disabled', false).focus();
    });

    $('.Update').on('click', function () {
        var $button = $(this);
        var FullName = $('.FullName').val();
        var NewEmail = $('.NewEmail').val();
        var PhoneNumber = $('.PhoneNumber').val();

        $button.prop('disabled', true);
        $.ajax({
            url: 'updateuser.php',
            method: 'POST',
            data: { FullName: FullName, NewEmail: NewEmail, PhoneNumber: PhoneNumber },
            success: function (data) {
                if (String(data).trim() === '1') {
                    if (window.swal) {
                        swal({ text: 'Details updated successfully', type: 'success', icon: 'success', buttons: 'OK' }).then(function () { location.reload(); });
                    } else {
                        alert('Details updated successfully.');
                        location.reload();
                    }
                } else {
                    alert('Unable to update details. Please try again. ' + data);
                }
            },
            error: function () {
                alert('Unable to contact the server. Please try again.');
            },
            complete: function () { $button.prop('disabled', false); }
        });
    });

    function saveCurrencyPreference() {
        var $select = $('.currency');
        var $option = $select.find('option:selected');
        var currency = $select.val();
        var curName = $option.text().replace(/\s*\([A-Z]{3}\)$/, '');
        var curAbbr = $option.attr('abbr');
        if (!currency || !curAbbr) {
            alert('Please choose a currency first.');
            return;
        }
        var $button = $('#saveCurrency');
        $button.prop('disabled', true);
        $.ajax({
            url: 'updateCurrency.php',
            method: 'POST',
            data: { currency: currency, curName: curName, curAbbr: curAbbr },
            success: function (data) {
                if (String(data).trim() === '1') {
                    location.reload();
                } else {
                    alert('Unable to save currency preference. Please try again.');
                }
            },
            error: function () { alert('Unable to contact the server. Please try again.'); },
            complete: function () { $button.prop('disabled', false); }
        });
    }
    $('#saveCurrency').on('click', saveCurrencyPreference);
    $('.currency').on('change', function () {
        // Keep selection separate from persistence; users explicitly save their preference.
    });

    $('.ShowPhotoCont').on('click', function () {
        $('.updatePhotoContainer').toggleClass('pf-hidden');
    });

    $('#uploadImageForm').on('submit', function (event) {
        event.preventDefault();
        var formData = new FormData(this);
        var $submit = $(this).find('[type=submit]');
        $submit.prop('disabled', true);
        $.ajax({
            url: 'uploadImage.php',
            type: 'POST',
            data: formData,
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            success: function (response) {
                if (response == 1) {
                    if (window.swal) {
                        swal({ type: 'success', icon: 'success', text: 'Profile picture updated', buttons: 'OK' }).then(function () { location.reload(); });
                    } else {
                        alert('Profile picture updated.');
                        location.reload();
                    }
                } else {
                    alert('Unable to upload the photo. Please check the image and try again.');
                }
            },
            error: function () { alert('Upload failed. Please try again.'); },
            complete: function () { $submit.prop('disabled', false); }
        });
    });
})(jQuery);
</script>
</body>
</html>
