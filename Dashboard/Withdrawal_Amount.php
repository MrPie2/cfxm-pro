<?php
session_start();
if (!isset($_SESSION['User_id'])) {
    header('Location: LoginContainer.php');
    exit;
}
include('Header.php');

$location = isset($_GET['Location']) && in_array($_GET['Location'], array('Account_Balance', 'Refferal_Bonus'), true) ? $_GET['Location'] : 'Account_Balance';
$type = isset($_GET['Type']) && $_GET['Type'] === 'Wallet' ? 'Wallet' : 'Bank';
$account = isset($_GET['Account']) ? (string)$_GET['Account'] : '';
$bankName = isset($_GET['Bank']) ? (string)$_GET['Bank'] : '';
$asset = isset($_GET['BOP']) ? (string)$_GET['BOP'] : '';
$network = isset($_GET['Network']) ? (string)$_GET['Network'] : '';
$initialAmount = isset($_GET['Amount']) && is_numeric($_GET['Amount']) && (float)$_GET['Amount'] > 0 ? (string)$_GET['Amount'] : '';
$escape = function ($value) { return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8'); };
$destinationLabel = $type === 'Wallet' ? ($asset . ' wallet') : ($bankName !== '' ? $bankName . ' bank account' : 'linked bank account');
$maskedDestination = $type === 'Wallet' ? $account : (strlen($account) > 4 ? str_repeat('•', max(4, strlen($account)-4)).substr($account,-4) : $account);
$currency = isset($curAbbr) ? (string)$curAbbr : '';
?>
<style>
.withdraw-amount-page{--wa-line:var(--cfxm-line,rgba(223,208,184,.14));--wa-panel:var(--cfxm-surface,#222831);--wa-raised:var(--cfxm-surface-raised,#27313b);--wa-text:var(--cfxm-text,#DFD0B8);--wa-muted:var(--cfxm-muted,#a5b1ba);color:var(--wa-text);padding:10px 0 28px}.withdraw-amount-page *{box-sizing:border-box}.wa-hero{position:relative;overflow:hidden;padding:clamp(24px,4vw,36px);margin-bottom:19px;border:1px solid rgba(157,119,226,.24);border-radius:22px;background:radial-gradient(circle at 92% 8%,rgba(147,94,221,.25),transparent 33%),linear-gradient(125deg,#171a2e,#24233b 60%,#30234b);color:#fff}.wa-eyebrow{display:inline-flex;gap:8px;align-items:center;color:#d4bafa;font-size:10px;font-weight:850;letter-spacing:.14em;text-transform:uppercase}.wa-hero h2{margin:12px 0 8px;color:#fff;font-size:clamp(25px,3vw,34px);font-weight:850;letter-spacing:-.04em}.wa-hero p{max-width:580px;margin:0;color:rgba(255,255,255,.73);font-size:12px;line-height:1.75}.wa-layout{display:grid;grid-template-columns:minmax(0,1.3fr) minmax(270px,.7fr);gap:18px;align-items:start}.wa-panel{overflow:hidden;border:1px solid var(--wa-line);border-radius:19px;background:var(--wa-panel);box-shadow:0 10px 28px rgba(0,0,0,.045)}.wa-head{padding:20px 22px;border-bottom:1px solid var(--wa-line)}.wa-head h3{margin:0;color:var(--wa-text);font-size:15px;font-weight:850}.wa-head p{margin:6px 0 0;color:var(--wa-muted);font-size:11px;line-height:1.65}.wa-body{padding:22px}.wa-destination{display:flex;align-items:center;gap:13px;padding:15px;border:1px solid var(--wa-line);border-radius:14px;background:var(--wa-raised);margin-bottom:22px}.wa-destination-icon{display:grid;place-items:center;width:44px;height:44px;border-radius:13px;background:rgba(119,72,188,.16);color:#c7a8f3;font-size:18px;flex-shrink:0}.wa-destination strong{display:block;color:var(--wa-text);font-size:12px;font-weight:850}.wa-destination small{display:block;margin-top:5px;color:var(--wa-muted);font-size:10px;overflow-wrap:anywhere}.wa-label{display:block;margin:0 0 8px;color:var(--wa-text);font-size:11px;font-weight:800}.wa-amount-wrap{display:flex;align-items:center;gap:10px;padding:7px 10px;border:1px solid var(--wa-line);border-radius:13px;background:var(--wa-raised);transition:border-color .18s,box-shadow .18s}.wa-amount-wrap:focus-within{border-color:#8b63ca;box-shadow:0 0 0 3px rgba(119,72,188,.14)}.wa-currency{display:flex;align-items:center;justify-content:center;min-width:45px;padding:9px 8px;border-radius:9px;background:rgba(119,72,188,.15);color:#c7a8f3;font-size:11px;font-weight:850}.wa-amount{width:100%;min-width:0;padding:10px 0;border:0;outline:none;background:transparent;color:var(--wa-text);font-size:clamp(23px,3vw,31px);font-weight:850;letter-spacing:-.04em}.wa-amount::placeholder{color:var(--wa-muted);opacity:.7}.wa-hint{display:flex;align-items:flex-start;gap:8px;margin:10px 0 0;color:var(--wa-muted);font-size:10px;line-height:1.7}.wa-hint i{margin-top:2px;color:#bda0f0}.wa-error{display:none;margin-top:10px;color:#ed8493;font-size:11px;font-weight:700}.wa-primary{display:inline-flex;align-items:center;justify-content:center;gap:9px;min-height:46px;padding:12px 17px;border:0;border-radius:11px;background:linear-gradient(135deg,#49247e,#7748bc);color:#fff;font-size:12px;font-weight:850;cursor:pointer;transition:transform .18s,box-shadow .18s}.wa-primary:hover{transform:translateY(-1px);box-shadow:0 8px 18px rgba(73,36,126,.24)}.wa-primary:disabled{opacity:.65;cursor:wait;transform:none}.wa-submit{width:100%;margin-top:20px}.wa-back{display:inline-flex;align-items:center;gap:7px;margin-top:13px;color:var(--wa-muted)!important;font-size:11px;font-weight:750}.wa-back:hover{color:#bda0f0!important}.wa-info{padding:18px;border:1px solid var(--wa-line);border-radius:16px;background:var(--wa-raised)}.wa-info+.wa-info{margin-top:12px}.wa-info-icon{display:grid;place-items:center;width:35px;height:35px;margin-bottom:11px;border-radius:11px;background:rgba(119,72,188,.16);color:#c7a8f3}.wa-info h4{margin:0 0 7px;color:var(--wa-text);font-size:12px;font-weight:850}.wa-info p{margin:0;color:var(--wa-muted);font-size:10px;line-height:1.75}.wa-info ul{padding-left:17px;margin:9px 0 0;color:var(--wa-muted);font-size:10px;line-height:1.9}.wa-secure{display:flex;gap:10px;padding:13px;margin-top:16px;border:1px solid rgba(56,189,145,.18);border-radius:12px;background:rgba(56,189,145,.06);color:var(--wa-muted);font-size:10px;line-height:1.7}.wa-secure i{margin-top:2px;color:#38bd91}
@media(max-width:850px){.wa-layout{grid-template-columns:1fr}}@media(max-width:560px){.withdraw-amount-page{padding-top:2px}.wa-hero{padding:22px 19px;border-radius:17px}.wa-hero h2{font-size:26px}.wa-head,.wa-body{padding:17px}.wa-amount{font-size:25px}}
html[data-theme="light"] .withdraw-amount-page{--wa-panel:#fff;--wa-raised:#f6f7fb;--wa-text:#202438;--wa-muted:#687184;--wa-line:rgba(26,35,55,.12)}
</style>
<div class="container-fluid withdraw-amount-page">
  <section class="wa-hero"><span class="wa-eyebrow"><i class="fas fa-shield-alt"></i> Withdrawal review</span><h2>How much would you like to withdraw?</h2><p>Enter the amount you want to request, then review the destination and confirm. Your request will be checked by the existing withdrawal processing system.</p></section>
  <div class="wa-layout">
    <section class="wa-panel">
      <header class="wa-head"><h3><i class="fas fa-money-bill-wave" style="color:#bda0f0;margin-right:8px"></i> Withdrawal amount</h3><p>Enter a positive amount in your account currency.</p></header>
      <div class="wa-body">
        <div class="wa-destination"><span class="wa-destination-icon"><i class="fas <?php echo $type === 'Wallet' ? 'fa-coins' : 'fa-university'; ?>"></i></span><span><strong><?php echo $escape($destinationLabel); ?></strong><small><?php echo $escape($maskedDestination !== '' ? $maskedDestination : 'Destination details were not supplied'); ?><?php if ($type === 'Wallet' && $network !== '') echo ' · ' . $escape($network); ?></small></span></div>
        <label class="wa-label" for="withdrawAmount">Amount to withdraw</label>
        <div class="wa-amount-wrap"><span class="wa-currency"><?php echo $escape($currency !== '' ? $currency : 'Amount'); ?></span><input id="withdrawAmount" type="number" class="wa-amount Amount" min="0.01" step="0.01" inputmode="decimal" placeholder="0.00" value="<?php echo $escape($initialAmount); ?>" aria-describedby="amountHint amountError"></div>
        <p class="wa-hint" id="amountHint"><i class="fas fa-info-circle"></i><span>Use the amount you intend to request. Available funds and eligibility are checked by the server when you submit.</span></p>
        <p class="wa-error" id="amountError" role="alert">Enter a valid amount greater than zero.</p>
        <button type="button" class="wa-primary wa-submit Withdraw"><i class="fas fa-lock"></i> Submit withdrawal request <i class="fas fa-arrow-right"></i></button>
        <a class="wa-back" href="Withdraw.php?<?php echo $escape(http_build_query(array('Location'=>$location, 'Amount'=>$initialAmount))); ?>"><i class="fas fa-arrow-left"></i> Change destination</a>
        <div class="wa-secure"><i class="fas fa-check-circle"></i><span>Submitting sends a request for server-side verification. A success message means the request was accepted, not necessarily that funds have already arrived.</span></div>
      </div>
    </section>
    <aside>
      <section class="wa-info"><span class="wa-info-icon"><i class="fas fa-clock"></i></span><h4>Processing time</h4><p>Processing times vary by destination, provider and any required verification. Check the status in your withdrawal history rather than relying on an estimated arrival time.</p></section>
      <section class="wa-info"><span class="wa-info-icon"><i class="fas fa-shield-alt"></i></span><h4>Before you confirm</h4><ul><li>Make sure the destination belongs to you.</li><li>For crypto, verify the asset and network.</li><li>Never share passwords or verification codes.</li></ul></section>
    </aside>
  </div>
</div>
<?php include('Footer.php'); ?>
<script src="js/lib/jquery/jquery.min.js"></script><script src="js/lib/bootstrap/js/popper.min.js"></script><script src="js/lib/bootstrap/js/bootstrap.min.js"></script><script src="js/jquery.slimscroll.js"></script><script src="js/sidebarmenu.js"></script><script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script><script src="js/custom.min.js"></script>
<script>
(function($){
  var context=<?php echo json_encode(array('Location'=>$location,'Type'=>$type,'Account'=>$account,'Bank'=>$bankName,'BOP'=>$asset,'Network'=>$network,'Currency'=>$currency)); ?>;
  var submitting=false;
  function notify(title,text,icon){if(window.swal){return window.swal({title:title,text:text,icon:icon});}window.alert(title+'\n'+text);return $.Deferred().resolve().promise();}
  $('.Withdraw').on('click',function(){
    if(submitting)return;
    var amountText=$.trim($('.Amount').val()||''),amount=Number(amountText);
    if(!amountText||!Number.isFinite(amount)||amount<=0){$('#amountError').show();$('.Amount').trigger('focus');return;}
    $('#amountError').hide();
    if(context.Type==='Wallet'&&(!context.Account||!context.BOP)){notify('Destination missing','Please go back and select a valid wallet destination.','error');return;}
    submitting=true;
    var button=$(this),original=button.html();
    button.prop('disabled',true).html('<i class="fas fa-spinner fa-spin"></i> Submitting request…');
    var payload={Amount:amountText,PayTo:context.Account,Location:context.Location};
    if(context.Type==='Wallet'){payload.BOP=context.BOP;payload.Network=context.Network;}
    var endpoint=context.Location==='Refferal_Bonus'&&context.Type==='Wallet'?'TransferOut.php':'processWithdrawal.php';
    $.ajax({url:endpoint,method:'POST',data:payload})
      .done(function(response){
        var result=String(response==null?'':response).trim();
        if(result==='1'){
          var message=context.Type==='Wallet'
            ?'Your withdrawal request has been accepted for processing to the selected '+context.BOP+' wallet.'
            :'Your bank withdrawal request has been accepted for processing.';
          notify('Request submitted',message,'success').then(function(){window.location.href='Withdrawal.php';});
          var email=<?php echo json_encode((string)($_SESSION['Email'] ?? '')); ?>;
          if(email){
            $.ajax({url:'../Manager/SendMail.php',method:'POST',data:{SendTo:email,Subject:'Pending Withdrawal',htmlcontent:'A withdrawal request for '+context.Currency+' '+amountText+' has been accepted and is pending processing.'}});
          }
        }else{
          notify('Withdrawal not completed',result&&result!=='0'?result:'The request could not be processed. Check your available funds and try again.','error');
          submitting=false;button.prop('disabled',false).html(original);
        }
      })
      .fail(function(){
        notify('Connection error','We could not confirm the request. Check your withdrawal history before retrying to avoid duplicate requests.','error');
        submitting=false;button.prop('disabled',false).html(original);
      });
  });
  $('.Amount').on('input',function(){var amount=Number($(this).val());if($(this).val()!==''&&Number.isFinite(amount)&&amount>0)$('#amountError').hide();});
})(jQuery);
</script>
</body></html>
