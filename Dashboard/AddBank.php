<?php
session_start();
include('Header.php'); 
if(isset($_SESSION['User_id'])){
$Investor_id=$_SESSION['User_id'];

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


                        <div class="card">
                            <div class="card-title">
                                <h4 class="text-warning">Add Bank</h4> </div>

<div class="card-body">
<div class="form-group"><label>Account Name</label><input type="text" class="form-control Account_Name" placeholder="Account Name"></div>
<div class="form-group"><label>Account Number</label><input type="text" class="form-control Account_Number" placeholder="Account Number"></div>

<div class="form-group"><label>Bank Name</label><input type="text" class="form-control Bank_Name" placeholder="Bank Name"></div>

<div class="form-group"><label>Routing Number (<span class="text-muted">Not compulsory for Investors outside Europe</span>)</label><input type="text" class="form-control Routing_Number" placeholder="Routing Number"></div>

<div class="form-group"><button class="btn btn-oxblood btn-lg AddBank">Add </button></div>
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
    
    <script src="js/lib/toastr/toastr.min.js"></script>
    <!-- scripit init-->
    <script src="js/lib/toastr/toastr.init.js"></script>

</body>

</html>

<?php
}else{
Header('Location:LoginContainer.php');

}

?>

<script>
$('.AddBank').click(function(){
    
    if($('.Account_Name').val().trim()==""){
      $('.Account_Name').attr('placeholder','Account Name Required').addClass('hasError');
      
    }else{
    }
    
    if($('.Account_Number').val().trim()==""){
      $('.Account_Number').attr('placeholder','Account Number Required').addClass('hasError');
    }else{
    }
    
    if($('.Bank_Name').val().trim()==""){
      $('.Bank_Name').attr('placeholder','Bank Name Required').addClass('hasError');
    }else{
    }
    
    if($('.Routing_Number').val().trim()==""){
      $('.Routing_Number').attr('placeholder','Routing Number Required').addClass('hasError');
    }else{
    }
    
    if($('.Account_Name').val().trim()!="" && $('.Account_Number').val().trim()!="" && $('.Bank_Name').val().trim()!=""){
        var Account_Name=$('.Account_Name').val();
        var Account_Number=$('.Account_Number').val();
        var Bank_Name=$('.Bank_Name').val();
        var Routing_Number=$('.Routing_Number').val();

        $.ajax({
            url:'AddBankServer.php',
            method:'POST',
            data:{Account_Name:Account_Name, Account_Number:Account_Number, Bank_Name:Bank_Name, Routing_Number:Routing_Number},
            success:function(data){
                if(data==1){
                    
                    toastr.success('Bank Added Successfully',
'Successful',{ timeOut: 5000, "closeButton": true, "debug": false, "newestOnTop": true, "progressBar": true, "positionClass": "toast-top-right", "preventDuplicates": true, "onclick": null, "showDuration": "300", "hideDuration": "1000", "extendedTimeOut": "1000", "showEasing": "swing", "hideEasing": "linear", "showMethod": "fadeIn", "hideMethod": "fadeOut", "tapToDismiss": false })
                    window.location.href="Withdraw.php";
                }else{
                    toastr.error('There was an error adding you bank deetails',
'Successful',{ timeOut: 5000, "closeButton": true, "debug": false, "newestOnTop": true, "progressBar": true, "positionClass": "toast-top-right", "preventDuplicates": true, "onclick": null, "showDuration": "300", "hideDuration": "1000", "extendedTimeOut": "1000", "showEasing": "swing", "hideEasing": "linear", "showMethod": "fadeIn", "hideMethod": "fadeOut", "tapToDismiss": false })
                }
            }
        })
    }
})

$('.Proceed').click(function(){
if($('.WalletAddress').val().trim()==""){

$('.WalletAddress').attr('placeholder','Paste a receiver address').css({'border':'1px solid red', 'background':'yellow'});
}else{
var Account=$('.WalletAddress').val();
var BOP=$('.BOP').val();
var Networ=$('.net').filter(":checked").val();
window.location.href="Withdrawal_Amount.php?Type=Wallet&&Account="+Account+"&&BOP="+BOP+"&&Network="+Networ;
}
})

$('.BOP').change(function(){
    var BOP=$(this).val();
    if(BOP=="BNB"){
        var control='<label>Specify Network</label><br><div class="form-group"><b>BEP20</b> <input type="radio" class="net" value="BEP20" name="Network"></div><div class="form-group"><b>BEP30</b> <input type="radio" class="net" value="BEP30" name="Network"></div>'
        $('.network').html(control);
    }else if(BOP=="USDT"){
        var control='<label>Specify Network</label><br><div class="form-group"><b>TRC20</b> <input class="net"type="radio" value="TRC20" name="Network"></div><div class="form-group"><b>TRC30</b> <input class="net" type="radio" value="TRC30" name="Network"></div>'
        $('.network').html(control);
        
    }else{
                $('.network').html("");

    }
})


</script>