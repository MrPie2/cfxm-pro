<?php
session_start();
include('Header.php'); 
if(isset($_SESSION['User_id'])){

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
                                <h4>P2P System helps you transfer money to other Users within Trafford Holding</h4>

                            </div>

<div class="card-body">
    <div class="form-group"><label>User ID</label><input type="text" class="form-control input-lg ReceiverID" placeholder="TRH12345"></div>
    <div class="form-group "><h3 class="text-success ReceiverStatus"></h3></div>
<div class="form-group hidden ShowAmount"><label>How much do you want to transfer out</label><input type="number" class="form-control input-lg Amount" placeholder="200"></div>

<div class="form-group">
<button class="btn btn-oxblood btn-md Verify">Verify Receiver</button>
<button class="btn btn-success btn-md Transfer hidden">Transfer</button>
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

$('.Verify').click(function(){
    var Receiver=$('.ReceiverID').val();
    
    if(Receiver=$('.ReceiverID').val().trim()!=""){
           var Receiver=$('.ReceiverID').val();
$.ajax({
    url:'VerifyReceiver.php',
    method:'POST',
    data:{Receiver:Receiver},
    success:function(data){
               $('.ReceiverStatus').html(data);
            $('.ShowAmount').removeClass('hidden');
            $('.Transfer').removeClass('hidden');
            $('.Verify').addClass('hidden');

      
    }
}) 
    }
})


$('.Transfer').click(function(){
    var Receiver_Name=$('.ReceiverStatus').html();

var Amount=$('.Amount').val();
var Receiver=$('.ReceiverID').val();
var Type=1; 
var Status=0; 

$.ajax({

url:'ProcessP2P.php',
method:'post',
data:{Amount:Amount, Receiver:Receiver,Receiver_Name:Receiver_Name, Type:Type,Status:Status},
success:function(response){
if(response==1){

swal({title:"Congrats",icon: "success", text:"Transfer Out initiated successfully. You are transfering $"+Amount+" to "+$('.ReceiverStatus').html()+" <?php echo $_GET['Account']; ?>."})
.then(function(){
window.location.href="Transfer.php";
});

var SendTo="<?php echo $_SESSION['Email']; ?>";
var Subject="Comistar P2P Transfer";
var htmlcontent="You have a pending transfer out of $"+Amount+". Receiver has to confirm the transact to be successful. You can raise a dispute in case any occurs";
$.ajax({
url:'../../../Manager/SendMail.php',
method:'POST',
data:{SendTo:SendTo, Subject:Subject, htmlcontent:htmlcontent},
success:function(data){}
})

}else{

swal({title:'Sorry', text:'Insufficient Funds', type:'error'})

}
}

})







})
			</script>
