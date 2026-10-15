<?php
session_start();
if (!isset($_SESSION['User_id'])) {
    header('Location: LoginContainer.php');
    exit;
}

include('Header.php');

$contractID = (string)($_GET['ContractID'] ?? '');
$amount = filter_var($_GET['Amount'] ?? null, FILTER_VALIDATE_FLOAT);
$planType = (string)($_GET['Plan_Type'] ?? 'Stock');
$company = (string)($_GET['Company'] ?? '');
$unit = filter_var($_GET['Unit'] ?? null, FILTER_VALIDATE_FLOAT);
$position = (string)($_GET['Position'] ?? '');
$durationDays = filter_var($_GET['Duration'] ?? null, FILTER_VALIDATE_INT);
$bop = (string)($_GET['bop'] ?? 'Stock');
$hasOrder = $contractID !== '' && $amount !== false && $amount > 0 && $unit !== false && $unit > 0 && $durationDays !== false && $durationDays > 0 && $company !== '';
$durationYears = $hasOrder ? $durationDays / 365 : 0;
$totalUnits = $hasOrder ? (int)round($amount / $unit) : 0;
$e = static function ($value) {
    return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
};
?>

<style>
/* CFXM Pro trade review — shared site theme tokens keep both themes consistent. */
.vh-deal-page{max-width:1180px;margin:0 auto;padding:28px 22px 56px;color:var(--cfxm-text,var(--text-color,#DFD0B8))}
.vh-deal-crumb{display:flex;align-items:center;gap:9px;margin:0 0 22px;color:var(--cfxm-muted,#a5b1ba);font-size:12px}
.vh-deal-crumb a{color:var(--cfxm-muted,#a5b1ba);text-decoration:none}.vh-deal-crumb a:hover{color:var(--cfxm-purple-2,#7748bc)}
.vh-deal-heading{display:flex;align-items:flex-end;justify-content:space-between;gap:20px;margin-bottom:24px}
.vh-deal-eyebrow{display:inline-flex;align-items:center;gap:8px;color:var(--cfxm-purple-2,#b99ae9);font-size:10px;font-weight:850;letter-spacing:.16em;text-transform:uppercase}
.vh-deal-heading h1{margin:8px 0 7px;color:var(--cfxm-text,#DFD0B8);font-size:clamp(26px,4vw,38px);font-weight:800;letter-spacing:-.04em}
.vh-deal-heading p{max-width:650px;margin:0;color:var(--cfxm-muted,#a5b1ba);font-size:14px;line-height:1.7}
.vh-deal-status{display:inline-flex;align-items:center;gap:8px;flex-shrink:0;padding:9px 12px;border:1px solid rgba(45,190,130,.24);border-radius:999px;background:rgba(45,190,130,.09);color:#4bd39a;font-size:11px;font-weight:750}
.vh-deal-layout{display:grid;grid-template-columns:minmax(0,1.25fr) minmax(290px,.75fr);gap:20px;align-items:start}
.vh-deal-panel{overflow:hidden;border:1px solid var(--cfxm-line,rgba(223,208,184,.14));border-radius:20px;background:var(--cfxm-surface,#222831);box-shadow:var(--cfxm-shadow,0 18px 44px rgba(0,0,0,.16))}
.vh-deal-panel-head{display:flex;align-items:center;gap:13px;padding:21px 22px;border-bottom:1px solid var(--cfxm-line,rgba(223,208,184,.14))}
.vh-deal-company-mark{display:grid;place-items:center;width:46px;height:46px;flex:0 0 46px;border:1px solid rgba(119,72,188,.28);border-radius:14px;background:rgba(119,72,188,.16);color:var(--cfxm-purple-2,#c8a9f4);font-size:20px}
.vh-deal-panel-head h2{margin:0 0 4px;color:var(--cfxm-text,#DFD0B8);font-size:16px;font-weight:800}
.vh-deal-panel-head p{margin:0;color:var(--cfxm-muted,#a5b1ba);font-size:12px}
.vh-deal-content{padding:22px}
.vh-deal-intro{margin:0 0 19px;color:var(--cfxm-muted,#a5b1ba);font-size:13px;line-height:1.7}
.vh-deal-summary{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:12px}
.vh-deal-metric{min-width:0;padding:16px;border:1px solid var(--cfxm-line,rgba(223,208,184,.14));border-radius:14px;background:var(--cfxm-bg,var(--body-bg,#121f27))}
.vh-deal-metric span{display:block;margin-bottom:8px;color:var(--cfxm-muted,#a5b1ba);font-size:11px;font-weight:650}
.vh-deal-metric strong{display:block;overflow-wrap:anywhere;color:var(--cfxm-text,#DFD0B8);font-size:clamp(15px,2vw,21px);font-weight:800;letter-spacing:-.025em}
.vh-deal-metric small{display:block;margin-top:5px;color:var(--cfxm-muted,#a5b1ba);font-size:10px}
.vh-deal-table{width:100%;margin:20px 0 0;border-collapse:collapse}
.vh-deal-table tr+tr{border-top:1px solid var(--cfxm-line,rgba(223,208,184,.12))}
.vh-deal-table th,.vh-deal-table td{padding:14px 2px;font-size:12px;vertical-align:top}
.vh-deal-table th{color:var(--cfxm-muted,#a5b1ba);font-weight:550;text-align:left}
.vh-deal-table td{color:var(--cfxm-text,#DFD0B8);font-weight:700;text-align:right;overflow-wrap:anywhere}
.vh-deal-id{font-family:ui-monospace,SFMono-Regular,Menlo,monospace;font-size:11px!important}
.vh-deal-aside{position:sticky;top:22px}
.vh-deal-total{padding:22px;background:linear-gradient(145deg,rgba(73,36,126,.24),rgba(119,72,188,.07));border-bottom:1px solid var(--cfxm-line,rgba(223,208,184,.14))}
.vh-deal-total span{display:block;color:var(--cfxm-muted,#a5b1ba);font-size:12px}
.vh-deal-total strong{display:block;margin:9px 0 5px;color:var(--cfxm-text,#DFD0B8);font-size:clamp(27px,4vw,36px);font-weight:850;letter-spacing:-.05em;overflow-wrap:anywhere}
.vh-deal-total small{color:var(--cfxm-muted,#a5b1ba);font-size:11px}
.vh-deal-steps{display:grid;gap:15px;margin:0 0 20px;padding:0;list-style:none}
.vh-deal-steps li{display:flex;align-items:flex-start;gap:11px;color:var(--cfxm-muted,#a5b1ba);font-size:12px;line-height:1.6}
.vh-deal-step-icon{display:grid;place-items:center;width:27px;height:27px;flex:0 0 27px;border-radius:9px;background:rgba(119,72,188,.15);color:var(--cfxm-purple-2,#c8a9f4)}
.vh-deal-steps strong{display:block;color:var(--cfxm-text,#DFD0B8);font-size:12px}
.vh-deal-primary,.vh-deal-secondary{display:flex;align-items:center;justify-content:center;gap:10px;width:100%;min-height:49px;padding:13px 16px;border-radius:12px;font-size:13px;font-weight:800;text-decoration:none;transition:transform .18s ease,filter .18s ease}
.vh-deal-primary{border:0;background:linear-gradient(120deg,var(--cfxm-purple,#49247e),var(--cfxm-purple-2,#7748bc));color:#fff!important;box-shadow:0 9px 24px rgba(73,36,126,.22)}
.vh-deal-primary:hover{filter:brightness(1.08);transform:translateY(-1px)}
.vh-deal-secondary{margin-top:10px;border:1px solid var(--cfxm-line,rgba(223,208,184,.14));background:transparent;color:var(--cfxm-text,#DFD0B8)!important}
.vh-deal-legal{display:flex;align-items:flex-start;gap:9px;margin:15px 0 0;color:var(--cfxm-muted,#a5b1ba);font-size:10px;line-height:1.65}
.vh-deal-legal i{margin-top:2px;color:var(--cfxm-purple-2,#c8a9f4)}
.vh-deal-error{padding:26px;border:1px solid rgba(255,100,120,.24);border-radius:18px;background:var(--cfxm-surface,#222831);color:var(--cfxm-text,#DFD0B8)}
.vh-deal-error h2{margin-top:0;font-size:20px}.vh-deal-error p{color:var(--cfxm-muted,#a5b1ba)}
#exampleModal .modal-content{overflow:hidden;border:1px solid var(--cfxm-line,rgba(223,208,184,.14));border-radius:18px;background:var(--cfxm-surface,#222831);color:var(--cfxm-text,#DFD0B8)}
#exampleModal .modal-header{border-bottom:1px solid var(--cfxm-line,rgba(223,208,184,.14));background:var(--cfxm-bg-deep,#0b161c)!important}
#exampleModal .modal-title{color:var(--cfxm-text,#DFD0B8)!important;font-size:17px;font-weight:800}
#exampleModal .modal-body{height:350px;overflow:auto;color:var(--cfxm-text,#DFD0B8)!important}
#exampleModal .modal-footer{border-top:1px solid var(--cfxm-line,rgba(223,208,184,.14))}
#exampleModal .vh-deal-terms-accept{padding:12px 20px;color:var(--cfxm-text,#DFD0B8);font-size:12px}
#exampleModal .vh-deal-terms-accept input{margin-right:8px;accent-color:var(--cfxm-purple-2,#7748bc)}
#exampleModal .vh-deal-complete{width:auto;min-width:180px;margin:0 20px 18px}
html[data-theme="light"] .vh-deal-panel,html[data-theme="light"] .vh-deal-error{background:var(--cfxm-surface,#fff)}
html[data-theme="light"] .vh-deal-metric{background:var(--cfxm-bg-deep,#edf0f5)}
html[data-theme="light"] .vh-deal-total{background:linear-gradient(145deg,rgba(73,36,126,.08),rgba(119,72,188,.025))}
html[data-theme="light"] .vh-deal-heading h1,html[data-theme="light"] .vh-deal-panel-head h2,html[data-theme="light"] .vh-deal-metric strong,html[data-theme="light"] .vh-deal-table td,html[data-theme="light"] .vh-deal-total strong,html[data-theme="light"] .vh-deal-steps strong{color:var(--cfxm-text,#202438)}
html[data-theme="light"] #exampleModal .modal-content{background:var(--cfxm-surface,#fff);color:var(--cfxm-text,#202438)}
html[data-theme="light"] #exampleModal .modal-header{background:var(--cfxm-bg-deep,#edf0f5)!important}
@media(max-width:850px){.vh-deal-layout{grid-template-columns:1fr}.vh-deal-aside{position:static}.vh-deal-heading{align-items:flex-start;flex-direction:column}.vh-deal-status{align-self:flex-start}}
@media(max-width:520px){.vh-deal-page{padding:20px 13px 35px}.vh-deal-heading h1{font-size:28px}.vh-deal-panel-head,.vh-deal-content{padding:17px}.vh-deal-summary{gap:9px}.vh-deal-metric{padding:13px}.vh-deal-metric strong{font-size:16px}.vh-deal-table th,.vh-deal-table td{font-size:11px}.vh-deal-total{padding:18px}}
@media(prefers-reduced-motion:reduce){.vh-deal-primary,.vh-deal-secondary{transition:none}}
</style>

<main class="vh-deal-page">
    <div class="vh-deal-crumb"><a href="Dashboard.php">Dashboard</a><i class="fas fa-chevron-right"></i><a href="Stock_Market.php">Stocks</a><i class="fas fa-chevron-right"></i><span>Order review</span></div>
    <?php if (!$hasOrder): ?>
        <section class="vh-deal-error">
            <h2><i class="fas fa-exclamation-circle"></i> We couldn't prepare this order</h2>
            <p>Some order details are missing or invalid. Return to the stock page and build your investment again.</p>
            <a href="Stock_Market.php" class="vh-deal-primary" style="max-width:260px">Return to stocks <i class="fas fa-arrow-right"></i></a>
        </section>
    <?php else: ?>
        <header class="vh-deal-heading">
            <div>
                <span class="vh-deal-eyebrow"><i class="fas fa-check-circle"></i> Final review before you commit</span>
                <h1>Review your deal.</h1>
                <p>Everything in one place. Check the company, investment amount and holding details before confirming your order.</p>
            </div>
            <span class="vh-deal-status"><i class="fas fa-shield-alt"></i> Secure order review</span>
        </header>

        <div class="vh-deal-layout">
            <section class="vh-deal-panel" aria-labelledby="dealSummaryTitle">
                <div class="vh-deal-panel-head">
                    <div class="vh-deal-company-mark"><i class="fas fa-chart-line"></i></div>
                    <div><h2 id="dealSummaryTitle"><?php echo $e($company); ?></h2><p><?php echo $e($planType); ?> investment · Order summary</p></div>
                </div>
                <div class="vh-deal-content">
                    <p class="vh-deal-intro">Please review these details carefully. Your order will only be submitted after you accept the platform terms and confirm the transaction.</p>
                    <div class="vh-deal-summary">
                        <div class="vh-deal-metric"><span>Investment amount</span><strong><?php echo $e($curAbbr) . $e(number_format($amount, 2)); ?></strong><small>Principal amount</small></div>
                        <div class="vh-deal-metric"><span>Estimated units</span><strong><?php echo number_format($totalUnits); ?></strong><small>Based on the unit price shown</small></div>
                        <div class="vh-deal-metric"><span>Holding period</span><strong><?php echo $e(rtrim(rtrim(number_format($durationYears, 2, '.', ''), '0'), '.')); ?> <?php echo abs($durationYears - 1) < 0.01 ? 'year' : 'years'; ?></strong><small><?php echo number_format($durationDays); ?> days</small></div>
                        <div class="vh-deal-metric"><span>Unit price</span><strong><?php echo $e($curAbbr) . $e(number_format($unit, 4, '.', ',')); ?></strong><small>Order price provided by the platform</small></div>
                    </div>
                    <table class="vh-deal-table" aria-label="Full order details">
                        <tbody>
                            <tr><th scope="row">Order reference</th><td class="vh-deal-id"><?php echo $e($contractID); ?></td></tr>
                            <tr><th scope="row">Company</th><td><?php echo $e($company); ?></td></tr>
                            <tr><th scope="row">Investment plan</th><td><?php echo $e($planType); ?></td></tr>
                            <tr><th scope="row">Buy position</th><td><?php echo $e($position !== '' ? $position : 'Standard'); ?></td></tr>
                            <tr><th scope="row">Estimated units held</th><td><?php echo number_format($totalUnits); ?></td></tr>
                        </tbody>
                    </table>
                </div>
            </section>

            <aside class="vh-deal-panel vh-deal-aside" aria-label="Confirm investment">
                <div class="vh-deal-total">
                    <span>Total amount to invest</span>
                    <strong><?php echo $e($curAbbr) . $e(number_format($amount, 2)); ?></strong>
                    <small>Charged against your available wallet balance</small>
                </div>
                <div class="vh-deal-content">
                    <ol class="vh-deal-steps">
                        <li><span class="vh-deal-step-icon"><i class="fas fa-file-alt"></i></span><div><strong>Review the order</strong>Make sure the details above match your intended investment.</div></li>
                        <li><span class="vh-deal-step-icon"><i class="fas fa-balance-scale"></i></span><div><strong>Read the terms</strong>Review the current terms and conditions before proceeding.</div></li>
                        <li><span class="vh-deal-step-icon"><i class="fas fa-wallet"></i></span><div><strong>Confirm your balance</strong>Your available balance will be checked before the order is submitted.</div></li>
                    </ol>
                    <button type="button" id="openDealTerms" class="vh-deal-primary" data-toggle="modal" data-target="#exampleModal">Review terms &amp; close deal <i class="fas fa-arrow-right"></i></button>
                    <a href="Stock_Market.php" class="vh-deal-secondary"><i class="fas fa-arrow-left"></i> Back to stocks</a>
                    <p class="vh-deal-legal"><i class="fas fa-info-circle"></i><span>Investments involve risk. Unit counts shown here are estimates based on the submitted order values and do not guarantee market performance or returns.</span></p>
                </div>
            </aside>
        </div>

        <div class="modal fade" data-backdrop="static" data-keyboard="false" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLabel"><i class="fas fa-file-contract"></i> Terms and conditions</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:var(--cfxm-text,#DFD0B8)"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body"><div class="text-center"><i class="fas fa-spinner fa-spin"></i> Loading current terms…</div></div>
                    <div class="vh-deal-terms-accept"><label><input type="checkbox" name="accept"> I have read and agree to the terms and conditions.</label></div>
                    <button type="button" class="vh-deal-primary vh-deal-complete SendContract" disabled><i class="fas fa-lock"></i> Confirm investment</button>
                </div>
            </div>
        </div>
    <?php endif; ?>
</main>

<?php include('Footer.php'); ?>
<script src="js/lib/jquery/jquery.min.js"></script>
<script src="js/lib/bootstrap/js/popper.min.js"></script>
<script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
<script src="js/jquery.slimscroll.js"></script>
<script src="js/sidebarmenu.js"></script>
<script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
<script src="js/custom.min.js"></script>
<?php if ($hasOrder): ?>
<script>
(function ($) {
    'use strict';
    const order = {
        userId: <?php echo json_encode((string)$_SESSION['User_id']); ?>,
        email: <?php echo json_encode((string)($_SESSION['Email'] ?? '')); ?>,
        contractId: <?php echo json_encode($contractID); ?>,
        amount: <?php echo json_encode((float)$amount); ?>,
        buyPrice: <?php echo json_encode((float)$unit); ?>,
        buyPosition: <?php echo json_encode($position); ?>,
        durationYears: <?php echo json_encode((float)$durationYears); ?>,
        totalUnits: <?php echo json_encode($totalUnits); ?>,
        company: <?php echo json_encode($company); ?>,
        planType: <?php echo json_encode($planType); ?>,
        bop: <?php echo json_encode($bop); ?>,
        currency: <?php echo json_encode((string)$curAbbr); ?>
    };
    let submitting = false;

    $('input[name="accept"]').on('change', function () {
        $('.SendContract').prop('disabled', !this.checked || submitting);
    });

    $.ajax({
        url: 'Terms_Condition.php',
        method: 'GET',
        cache: false
    }).done(function (html) {
        $('.modal-body').html(html);
    }).fail(function () {
        $('.modal-body').html('<p>We could not load the current terms. Close this window and try again.</p>');
        $('.SendContract').prop('disabled', true);
        $('input[name="accept"]').prop('disabled', true);
    });

    $('.SendContract').on('click', function () {
        if (submitting || !$('input[name="accept"]').is(':checked')) return;
        submitting = true;
        const $button = $(this);
        $button.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Checking wallet…');

        $.ajax({
            url: 'checkbalance.php',
            method: 'POST',
            data: {User_id: order.userId}
        }).done(function (data) {
            const balance = Number.parseFloat(String(data).trim());
            if (!Number.isFinite(balance)) {
                showSubmissionError('We could not verify your wallet balance. Please try again.');
                return;
            }
            if (order.amount > balance) {
                if (window.swal) {
                    swal({icon:'error', title:'Insufficient funds', text:'Your available wallet balance is not enough for this investment. Please fund your wallet and try again.'})
                    .then(function () { window.location.href = 'Wallet.php'; });
                } else {
                    alert('Insufficient funds. Please fund your wallet and try again.');
                    window.location.href = 'Wallet.php';
                }
                return;
            }

            $button.html('<i class="fas fa-spinner fa-spin"></i> Submitting order…');
            $.ajax({
                url: 'ApplyStock.php',
                method: 'POST',
                data: {
                    contractID: order.contractId,
                    Company_Name: order.company,
                    Amount: order.amount,
                    Buy_Price: order.buyPrice,
                    Buy_Position: order.buyPosition,
                    ContractDuration: order.durationYears,
                    Total_Units: order.totalUnits,
                    bop: order.bop,
                    Plan_Type: order.planType,
                    Email: order.email
                }
            }).done(function (response) {
                const result = String(response).trim();
                if (result === '1') {
                    $.ajax({
                        url: '../Manager/SendMail.php',
                        method: 'POST',
                        data: {
                            SendTo: order.email,
                            Subject: 'Investment Placed Successfully',
                            htmlcontent: 'You have successfully submitted an investment with a principal amount of ' + order.currency + Number(order.amount).toLocaleString(undefined, {minimumFractionDigits:2, maximumFractionDigits:2}) + '.'
                        }
                    });
                    if (window.swal) {
                        swal({icon:'success', title:'Deal submitted', text:'Your investment was placed successfully.', button:'Go to dashboard', closeOnClickOutside:false})
                        .then(function () { window.location.href = 'Dashboard.php'; });
                    } else {
                        alert('Investment placed successfully.');
                        window.location.href = 'Dashboard.php';
                    }
                } else if (result === '2') {
                    if (window.swal) {
                        swal({icon:'warning', title:'Investment limit reached', text:'You cannot place this same amount on the same plan more than twice. Increase your amount or choose another plan.'})
                        .then(function () { window.location.href = 'Stock_Market.php'; });
                    } else {
                        alert('Investment limit reached. Please change the amount or plan.');
                        window.location.href = 'Stock_Market.php';
                    }
                } else {
                    throw new Error('The investment could not be placed. Please try again or contact support.');
                }
            }).fail(function () {
                showSubmissionError('We could not submit the investment. Please try again.');
            });
        }).fail(function () {
            showSubmissionError('We could not verify your wallet balance. Please try again.');
        });

        function showSubmissionError(message) {
            submitting = false;
            $button.prop('disabled', !$('input[name="accept"]').is(':checked')).html('<i class="fas fa-lock"></i> Confirm investment');
            if (window.swal) swal({icon:'error', title:'Unable to complete order', text:message});
            else alert(message);
        }
    });
})(jQuery);
</script>
<?php endif; ?>
</body>
</html>
