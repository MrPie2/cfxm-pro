<?php
session_start();
if (!isset($_SESSION['User_id'])) {
    header('Location: LoginContainer.php');
    exit;
}
include('Header.php');

$Investor_id = (string) $_SESSION['User_id'];
$location = isset($_GET['Location']) && in_array($_GET['Location'], array('Account_Balance', 'Refferal_Bonus'), true) ? $_GET['Location'] : 'Account_Balance';
$amountValue = isset($_GET['Amount']) && is_numeric($_GET['Amount']) && (float)$_GET['Amount'] > 0 ? (string)$_GET['Amount'] : '';
$escape = function ($value) { return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8'); };
$bankAccounts = array();
$bankStmt = mysqli_prepare($Conn, 'SELECT Account_Name, Account_Number, Bank_Name FROM bankdetails WHERE Investor_id = ?');
if ($bankStmt) {
    mysqli_stmt_bind_param($bankStmt, 's', $Investor_id);
    if (mysqli_stmt_execute($bankStmt)) {
        $bankResult = mysqli_stmt_get_result($bankStmt);
        if ($bankResult) {
            while ($bank = mysqli_fetch_assoc($bankResult)) $bankAccounts[] = $bank;
        }
    }
    mysqli_stmt_close($bankStmt);
}
?>
<style>
.withdraw-page{--w-line:var(--cfxm-line,rgba(223,208,184,.14));--w-panel:var(--cfxm-surface,#222831);--w-raised:var(--cfxm-surface-raised,#27313b);--w-text:var(--cfxm-text,#DFD0B8);--w-muted:var(--cfxm-muted,#a5b1ba);color:var(--w-text);padding:10px 0 28px}
.withdraw-page *{box-sizing:border-box}.withdraw-page a{text-decoration:none}
.wd-hero{position:relative;isolation:isolate;overflow:hidden;display:flex;align-items:center;justify-content:space-between;gap:20px;padding:clamp(24px,4vw,38px);margin-bottom:20px;border:1px solid rgba(157,119,226,.24);border-radius:22px;background:radial-gradient(circle at 90% 8%,rgba(147,94,221,.26),transparent 32%),linear-gradient(125deg,#171a2e,#24233b 60%,#30234b);color:#fff}
.wd-hero:after{content:"";position:absolute;z-index:-1;right:9%;top:-105px;width:220px;height:220px;border:1px solid rgba(255,255,255,.09);border-radius:50%;box-shadow:0 0 0 24px rgba(255,255,255,.025),0 0 0 49px rgba(255,255,255,.02)}
.wd-hero-copy{max-width:620px}.wd-eyebrow{display:inline-flex;align-items:center;gap:8px;color:#d4bafa;font-size:10px;font-weight:850;letter-spacing:.14em;text-transform:uppercase}.wd-hero h2{margin:12px 0 9px;color:#fff;font-size:clamp(25px,3.3vw,36px);font-weight:850;letter-spacing:-.04em;line-height:1.12}.wd-hero p{max-width:560px;margin:0;color:rgba(255,255,255,.73);font-size:13px;line-height:1.75}
.wd-hero-mark{display:grid;place-items:center;flex:0 0 84px;width:84px;height:84px;border:1px solid rgba(255,255,255,.18);border-radius:24px;background:rgba(255,255,255,.08);color:#e0caff;font-size:30px;box-shadow:inset 0 1px 0 rgba(255,255,255,.08)}
.wd-layout{display:grid;grid-template-columns:minmax(0,1.5fr) minmax(260px,.8fr);gap:18px;align-items:start}.wd-panel{min-width:0;overflow:hidden;border:1px solid var(--w-line);border-radius:19px;background:var(--w-panel);box-shadow:0 10px 28px rgba(0,0,0,.045)}.wd-panel-head{padding:20px 22px;border-bottom:1px solid var(--w-line)}.wd-panel-head h3{margin:0;color:var(--w-text);font-size:15px;font-weight:850}.wd-panel-head p{margin:6px 0 0;color:var(--w-muted);font-size:11px;line-height:1.65}.wd-panel-body{padding:20px 22px}
.wd-bank-list{display:grid;gap:12px}.wd-bank{display:grid;grid-template-columns:44px minmax(0,1fr);gap:13px;padding:16px;border:1px solid var(--w-line);border-radius:15px;background:var(--w-raised);transition:border-color .18s,transform .18s}.wd-bank:hover{border-color:rgba(151,110,220,.55);transform:translateY(-1px)}.wd-bank-icon{display:grid;place-items:center;width:44px;height:44px;border-radius:13px;background:rgba(119,72,188,.17);color:#c7a8f3;font-size:17px}.wd-bank-main{min-width:0}.wd-bank-title{display:flex;align-items:center;justify-content:space-between;gap:8px;flex-wrap:wrap}.wd-bank-title strong{color:var(--w-text);font-size:12px;font-weight:800}.wd-bank-title span{padding:4px 7px;border-radius:7px;background:rgba(56,189,145,.12);color:#38bd91;font-size:9px;font-weight:800}.wd-bank-meta{display:flex;flex-wrap:wrap;gap:7px 14px;margin-top:9px;color:var(--w-muted);font-size:10px}.wd-bank-meta b{color:var(--w-text);font-weight:700}.wd-bank-actions{display:flex;gap:8px;flex-wrap:wrap;margin-top:13px}.wd-btn{display:inline-flex;align-items:center;justify-content:center;gap:8px;min-height:40px;padding:10px 13px;border:1px solid transparent;border-radius:10px;background:linear-gradient(135deg,#49247e,#7748bc);color:#fff!important;font-size:11px;font-weight:800;cursor:pointer;transition:transform .18s,box-shadow .18s}.wd-btn:hover{transform:translateY(-1px);box-shadow:0 7px 18px rgba(73,36,126,.2)}.wd-btn-secondary{border-color:var(--w-line);background:transparent;color:var(--w-text)!important}.wd-empty{padding:28px 18px;border:1px dashed var(--w-line);border-radius:15px;text-align:center}.wd-empty-icon{display:grid;place-items:center;width:48px;height:48px;margin:0 auto 12px;border-radius:15px;background:rgba(119,72,188,.14);color:#c7a8f3;font-size:19px}.wd-empty h4{margin:0 0 7px;color:var(--w-text);font-size:13px;font-weight:800}.wd-empty p{max-width:330px;margin:0 auto 15px;color:var(--w-muted);font-size:11px;line-height:1.7}
.wd-crypto-list{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:9px;margin-bottom:15px}.wd-coin{display:flex;align-items:center;gap:9px;min-width:0;padding:11px;border:1px solid var(--w-line);border-radius:12px;background:var(--w-raised);color:var(--w-text);font-size:11px;font-weight:750}.wd-coin i{display:grid;place-items:center;width:30px;height:30px;border-radius:9px;background:rgba(119,72,188,.15);color:#c7a8f3;font-size:14px;flex-shrink:0}.wd-field{display:block;margin:14px 0 0}.wd-field label{display:block;margin-bottom:7px;color:var(--w-text);font-size:10px;font-weight:800;letter-spacing:.03em}.wd-input{display:block;width:100%;min-height:44px;padding:11px 12px;border:1px solid var(--w-line);border-radius:10px;outline:none;background:var(--w-raised);color:var(--w-text);font-size:12px;transition:border-color .18s,box-shadow .18s}.wd-input:focus{border-color:#8b63ca;box-shadow:0 0 0 3px rgba(119,72,188,.15)}.wd-input::placeholder{color:var(--w-muted);opacity:.75}.wd-help{margin:7px 0 0;color:var(--w-muted);font-size:10px;line-height:1.65}.wd-warning{display:flex;gap:10px;padding:12px;margin-top:14px;border:1px solid rgba(224,166,69,.2);border-radius:12px;background:rgba(224,166,69,.06);color:var(--w-muted);font-size:10px;line-height:1.65}.wd-warning i{margin-top:2px;color:#e4b35c}.wd-submit{width:100%;margin-top:15px;min-height:44px}.wd-side{display:grid;gap:15px}.wd-tip{padding:18px;border:1px solid var(--w-line);border-radius:16px;background:var(--w-raised)}.wd-tip-icon{display:grid;place-items:center;width:35px;height:35px;margin-bottom:12px;border-radius:11px;background:rgba(119,72,188,.16);color:#c7a8f3}.wd-tip h4{margin:0 0 7px;color:var(--w-text);font-size:12px;font-weight:850}.wd-tip p{margin:0;color:var(--w-muted);font-size:10px;line-height:1.75}.wd-tip ul{padding-left:17px;margin:10px 0 0;color:var(--w-muted);font-size:10px;line-height:1.9}
@media(max-width:900px){.wd-layout{grid-template-columns:minmax(0,1fr)}.wd-side{grid-template-columns:repeat(2,minmax(0,1fr))}.wd-hero-mark{width:68px;height:68px;flex-basis:68px;font-size:24px}}
@media(max-width:560px){.withdraw-page{padding-top:2px}.wd-hero{padding:22px 19px;border-radius:17px}.wd-hero h2{font-size:26px}.wd-hero-mark{display:none}.wd-panel-head,.wd-panel-body{padding:17px}.wd-side{grid-template-columns:1fr}.wd-bank{padding:13px}.wd-bank-meta{gap:7px 10px}.wd-crypto-list{gap:8px}.wd-coin{padding:9px;font-size:10px}}
html[data-theme="light"] .withdraw-page{--w-panel:#fff;--w-raised:#f6f7fb;--w-text:#202438;--w-muted:#687184;--w-line:rgba(26,35,55,.12)}
</style>
<div class="container-fluid withdraw-page">
  <section class="wd-hero">
    <div class="wd-hero-copy"><span class="wd-eyebrow"><i class="fas fa-shield-alt"></i> Secure wallet · Withdrawals</span><h2>Choose where your money goes.</h2><p>Select a linked bank account or provide an external wallet address. Review every destination carefully before continuing to the withdrawal amount step.</p></div>
    <div class="wd-hero-mark" aria-hidden="true"><i class="fas fa-money-check-alt"></i></div>
  </section>
  <div class="wd-layout">
    <div>
      <section class="wd-panel">
        <header class="wd-panel-head"><h3><i class="fas fa-university" style="color:#bda0f0;margin-right:8px"></i> Withdraw to a bank</h3><p>Choose a saved bank account to continue. Your account number is partially hidden for privacy.</p></header>
        <div class="wd-panel-body">
          <?php if (count($bankAccounts) > 0) { ?>
          <div class="wd-bank-list">
            <?php foreach ($bankAccounts as $bank) {
              $accountNumber = (string)($bank['Account_Number'] ?? '');
              $maskedNumber = strlen($accountNumber) > 4 ? str_repeat('•', max(4, strlen($accountNumber)-4)).substr($accountNumber,-4) : $accountNumber;
              $bankUrl = 'Withdrawal_Amount.php?' . http_build_query(array('Location'=>$location,'Amount'=>$amountValue,'Account'=>$accountNumber,'Bank'=>(string)$bank['Bank_Name']));
            ?>
            <article class="wd-bank">
              <span class="wd-bank-icon"><i class="fas fa-landmark"></i></span>
              <div class="wd-bank-main">
                <div class="wd-bank-title"><strong><?php echo $escape($bank['Bank_Name'] ?? 'Bank account'); ?></strong><span><i class="fas fa-check-circle"></i> LINKED</span></div>
                <div class="wd-bank-meta"><span>Account name: <b><?php echo $escape($bank['Account_Name'] ?? ''); ?></b></span><span>Account number: <b><?php echo $escape($maskedNumber); ?></b></span></div>
                <div class="wd-bank-actions"><a class="wd-btn" href="<?php echo $escape($bankUrl); ?>"><i class="fas fa-arrow-right"></i> Continue with this bank</a></div>
              </div>
            </article>
            <?php } ?>
          </div>
          <div class="wd-bank-actions" style="margin-top:14px"><a class="wd-btn wd-btn-secondary" href="AddBank.php"><i class="fas fa-plus"></i> Add another bank account</a></div>
          <?php } else { ?>
          <div class="wd-empty"><span class="wd-empty-icon"><i class="fas fa-university"></i></span><h4>No bank account linked yet</h4><p>Add and verify a bank account before choosing it as a withdrawal destination.</p><a class="wd-btn" href="AddBank.php"><i class="fas fa-plus"></i> Link a bank account</a></div>
          <?php } ?>
        </div>
      </section>
    </div>
    <div class="wd-side">
      <section class="wd-panel">
        <header class="wd-panel-head"><h3><i class="fas fa-coins" style="color:#bda0f0;margin-right:8px"></i> External crypto wallet</h3><p>Choose the asset and enter the receiving address.</p></header>
        <div class="wd-panel-body">
          <div class="wd-crypto-list" aria-label="Supported assets">
            <div class="wd-coin"><i class="fab fa-bitcoin"></i> Bitcoin</div><div class="wd-coin"><i class="fab fa-ethereum"></i> Ethereum</div>
            <div class="wd-coin"><i class="fas fa-coins"></i> Litecoin</div><div class="wd-coin"><i class="fas fa-wave-square"></i> Ripple</div>
            <div class="wd-coin"><i class="fas fa-cubes"></i> BNB</div><div class="wd-coin"><i class="fas fa-dollar-sign"></i> USDT</div>
            <div class="wd-coin"><i class="fas fa-sun"></i> Solana</div>
          </div>
          <label class="wd-field"><span style="display:block;margin-bottom:7px;color:var(--w-text);font-size:10px;font-weight:800">Asset</span>
            <select class="wd-input BOP" aria-label="Select crypto asset">
              <option value="Bitcoin">Bitcoin (BTC)</option><option value="Ethereum">Ethereum (ETH)</option><option value="LiteCoin">Litecoin (LTC)</option><option value="Ripple">XRP (Ripple)</option><option value="BNB">BNB</option><option value="USDT">Tether (USDT)</option><option value="Solana">Solana (SOL)</option>
            </select>
          </label>
          <div class="wd-network-slot"></div>
          <label class="wd-field"><span style="display:block;margin-bottom:7px;color:var(--w-text);font-size:10px;font-weight:800">Receiving wallet address</span><input type="text" class="wd-input WalletAddress" placeholder="Paste your wallet address" autocomplete="off" spellcheck="false" aria-label="Receiving wallet address"></label>
          <p class="wd-help">Use an address that supports the selected asset and network. Crypto transfers are often irreversible.</p>
          <div class="wd-warning"><i class="fas fa-exclamation-triangle"></i><span>Never send to an address you have not checked. For USDT, BNB and Ethereum, select the exact supported network before proceeding.</span></div>
          <button type="button" class="wd-btn wd-submit Proceed"><i class="fas fa-arrow-right"></i> Continue to amount</button>
        </div>
      </section>
      <section class="wd-tip"><span class="wd-tip-icon"><i class="fas fa-lock"></i></span><h4>Protect your funds</h4><p>Confirm the destination details before continuing. Support staff will never ask for your account password or one-time verification codes.</p><ul><li>Check every address character.</li><li>Confirm the network matches your wallet.</li><li>Review the amount on the next screen.</li></ul></section>
    </div>
  </div>
</div>
<?php include('Footer.php'); ?>
<script src="js/lib/jquery/jquery.min.js"></script><script src="js/lib/bootstrap/js/popper.min.js"></script><script src="js/lib/bootstrap/js/bootstrap.min.js"></script><script src="js/jquery.slimscroll.js"></script><script src="js/sidebarmenu.js"></script><script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script><script src="js/custom.min.js"></script>
<script>
(function($){
  var locationType = <?php echo json_encode($location); ?>;
  var amount = <?php echo json_encode($amountValue); ?>;
  function renderNetworkField(){
    var asset=$('.BOP').val();
    if(['BNB','USDT','Ethereum'].indexOf(asset)!==-1){
      var label=asset==='USDT'?'Select the USDT network':(asset==='BNB'?'Select the BNB network':'Select the Ethereum network');
      $('.wd-network-slot').html('<label class="wd-field"><span style="display:block;margin-bottom:7px;color:var(--w-text);font-size:10px;font-weight:800">'+label+'</span><input type="text" class="wd-input net" placeholder="Enter the exact network (e.g. ERC20)" autocomplete="off"><p class="wd-help">Use the exact network supported by the receiving wallet.</p></label>');
    }else{$('.wd-network-slot').empty();}
  }
  $('.BOP').on('change',renderNetworkField);
  renderNetworkField();
  $('.Proceed').on('click',function(){
    var address=$.trim($('.WalletAddress').val()||'');
    var asset=$('.BOP').val();
    var network=$.trim($('.net').val()||'');
    if(!address){$('.WalletAddress').trigger('focus').css('border-color','#e05b6c');return;}
    if(['BNB','USDT','Ethereum'].indexOf(asset)!==-1&&!network){$('.net').trigger('focus').css('border-color','#e05b6c');return;}
    var params={Location:locationType,Type:'Wallet',Account:address,BOP:asset};
    if(amount!=='')params.Amount=amount;
    if(network!=='')params.Network=network;
    window.location.href='Withdrawal_Amount.php?'+$.param(params);
  });
  $('.WalletAddress').on('input',function(){$(this).css('border-color','');});
})(jQuery);
</script>
</body></html>
