<?php session_start();
include('Header.php'); 
if(isset($_SESSION['User_id'])){
$Investor_id=$_SESSION['User_id'];
$Amount=$_GET['Amount'];
?>

<style>
.lead{
font-size: 10pt;

}
</style>

            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-md-12">
<div class="card-title">
                                <h4 style="color: var(--liner-color-text); margin-top: 20px">Withdraw to Bank</h4>
                                
                                </div>

                        <div class="card">
                            

<div class="card-body">

<?php
$sql="select * from bankdetails where Investor_id='$Investor_id'";
$query=mysqli_query($Conn, $sql);
$count=mysqli_num_rows($query);
if($count>0){
$bank="


";

while($row=mysqli_fetch_array($query, MYSQLI_ASSOC)){

$bank.="<div class='table-responsive'>
<table class='table table-bordered'><tr><th style='color: var(--liner-color-text)'>Account Name: ".$row['Account_Name']."</th></tr>
<tr><th style='color: var(--liner-color-text)'>Account Number: *********".substr($row['Account_Number'], 6)."</th></tr>
<tr><th style='color: var(--liner-color-text)'>Bank Name: ".$row['Bank_Name']."</th></tr>
<tr><th><a href='Withdrawal_Amount.php?Account=".$row['Account_Number']."&&Bank=".$row['Bank_Name']."&&Location=Account_Balance' class='btn btn-warning'>Withdraw to this Account</a></th></tr>
</table></div><br>";
}

$bank.="
<br><div class='form-group'><a href='AddBank.php' class='btn btn-light'>Add Another Bank Details</a></div>
";
}else{

$bank.="<h4>You have no bank details linked to your account</h4>

<div class='form-group'><p class='text-oxblood lead'> Kindly link your bank details to your Comistar. You can either withdraw funds to it or to an external wallet</p></div>
<div class='form-group'><a href='AddBank.php' class='btn btn-oxblood'>Add Bank Details</a></div>";


}
echo $bank;
?>

</div>


</div>


 <div class="card-title">
                                <h4 style="color: var(--liner-color-text); margin-top: 20px">Withdraw to External Wallet</h4> </div>
   <div class="card">
                           

<div class="card-body ">
<div class="form-group">
<select class="BOP form-control">

<option value="Bitcoin">Bitcoin</option>
<option value="Ethereum">Ethereum</option>
<option value="LiteCoin">Lite Coin</option>
<option value="Ripple">Ripple</option>
<option value="BNB">BNB</option>
<option value="USDT">USDT</option>
<option value="Solana">Solana</option>
</select>
</div>
<div class="form-group network" style="color: #222">
</div>
<div class="form-group">
<input type="text" class="form-control input-lg WalletAddress" placeholder="Paste Wallet Address Here"/>

</div>

<div class="form-group">
<p class="text-danger lead" style="font-size: 10pt">Please make sure you paste in your correct receiving address. To avoid us sending money to someone else</a>

</div>

<div class="form-group">
<button class="btn btn-oxblood Proceed">Proceed</button>

</div>


</div>


</div>



                           
                        
                    
                    </div><!-- /# column -->
                </div><!-- /# row -->
                <!-- End PAge Content -->
            </div><!-- End Container fluid  -->
            <!-- footer -->
            <?php include('Footer.php'); ?>
            <!-- End footer -->
        </div>
        <!-- End Page wrapper  -->
    </div>
    <!-- End Wrapper -->
    <!-- All Jquery -->
    <script src="js/lib/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>

</body>

</html>

<?php
}else{
Header('Location:LoginContainer.php');

}

?>

<script>

$('.Proceed').click(function(){
if($('.WalletAddress').val().trim()==""){

$('.WalletAddress').attr('placeholder','Paste a receiver address').css({'border':'1px solid red', 'background':'yellow'});
}else{
var Account=$('.WalletAddress').val();
var Amount="<?php echo $_GET['Amount']; ?>";
var Location="<?php echo $_GET['Location'] ?? 'Account_Balance'; ?>";

var BOP=$('.BOP').val();
var Networ=$('.net').val();
window.location.href="Withdrawal_Amount.php?Location="+Location+"&&Amount="+Amount+"&&Type=Wallet&&Account="+Account+"&&BOP="+BOP+"&&Network="+Networ;
}
})

$('.BOP').change(function(){
    var BOP=$(this).val();
    if(BOP=="BNB"){
        var control='<label>Specify Network</label><br><div class="form-group"><input type="text" class="net form-control" placeholder="Specify Network" name="Network"></div>'
        $('.network').html(control);
    }else if(BOP=="USDT"){
        var control='<label>Specify Network</label><br><div class="form-group"><input class="net form-control" type="text" placeholder="Specify Network" name="Network"></div>'
        $('.network').html(control);
        
    }else if(BOP=="Ethereum"){
        var control='<label>Specify Network</label><br><div class="form-group"><input class="net form-control" type="text" placeholder="Specify Network" name="Network"></div>'
        $('.network').html(control);
        
    }else{
                $('.network').html("");

    }
})


</script>