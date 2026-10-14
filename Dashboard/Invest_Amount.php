<?php
session_start();
include('Header.php'); 
if(isset($_SESSION['User_id'])){
    
    $contractID=rand(999999999, 99999);
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
                    <div class="col-lg-12">


                        <div class="card">
                            <div class="card-title">
                                <h4>How much do you want to Invest?</h4>

                            </div>

<div class="card-body">
<div class="form-group"><label>Amount</label><input type="number" class="form-control input-lg Amount" placeholder="200"></div>


<div class="form-group">
<button class="btn btn-oxblood btn-md Proceed">Proceed</button>
</div>

</div>

                                </div>


                            




</div>
                </div>
                <!-- /# row -->
                <!-- End PAge Content -->
            </div>
            <!-- End Container fluid  -->
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
    var Min=parseInt("<?php echo $_GET['Min']*$exchangerate; ?>");
    var Plan_Type="<?php echo $_GET['Plan_Type']; ?>";
    var Max=parseInt("<?php echo $_GET['Max']*$exchangerate; ?>");
    var Amount=$('.Amount').val();
    Amount*"<?php echo $exchangerate; ?>";
    if(Amount==""){
        $('.Amount').attr('placeholder',"Input Amount");
    }
    var curAbbr='<?php echo $curAbbr; ?>';
    
    if(Amount>=Min && Amount <=Max){
var Percentage="<?php echo $_GET['Percent']; ?>";

var ContractDuration="<?php echo $_GET['ContractDuration']; ?>";

var ContractID="<?php echo $contractID; ?>";
var Amount=$('.Amount').val();

window.location.href="previewContract.php?Plan_Type="+Plan_Type+"&&Amount="+Amount+"&&Percentage="+Percentage+"&&ContractID="+ContractID+"&&ContractDuration="+ContractDuration;
}else if(Amount<Min){
        
      swal({icon:'error', title:'Oops!', text:'Minimum investment amount on '+Plan_Type+' is '+curAbbr+Min});  
    }else if(Amount>Max){
      swal({icon:'error', title:'Oops!', text:'Maximum investment amount on '+Plan_Type+' is '+curAbbr+Max});  
    }
})


			</script>
