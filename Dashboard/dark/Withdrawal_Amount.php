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
                                <h4>How much do you want to withdraw?</h4>

                            </div>

<div class="card-body">
<div class="form-group"><label>Amount</label><input type="number" class="form-control input-lg Amount" placeholder="200"></div>

<div class="form-group">

<?php 
if($_GET['Type']=='Wallet'){
echo '<p class="lead text-info">Please note that funds may take up to 5 minutes or more to reflect on you wallet as series of verification will be caried out by the Blockchain Decentralized System</p>';
}else{

echo '<p class="lead text-info">Please note that funds may take up to 5 - 10 minutess to reflect on you Account as series of verification will be caried out by the Bank</p>';
}
?></div>
<div class="form-group">
<button class="btn btn-warning btn-md Withdraw">Withdraw</button>
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


$('.Withdraw').click(function(){

var Amount=$('.Amount').val();
var PayTo="<?php echo $_GET['Account'];?>";
var Type="<?php echo $_GET['Type']; ?>"; 
var BOP="<?php echo $_GET['BOP']; ?>"; 
var Network="<?php echo $_GET['Network']; ?>"; 
if(Type=="Wallet"){
$.ajax({

url:'processWithdrawal.php',
method:'post',
data:{Amount:Amount,PayTo:PayTo,BOP:BOP,Network:Network},
success:function(response){
if(response==1){

swal({title:"Congrats!",icon: "success", text:"Withdrawal initiated successfully.We are transfering $"+Amount+" worth of <?php echo $_GET['BOP']; ?> to your <?php echo $_GET['BOP']; ?> Wallet (<?php echo $_GET['Account']; ?>) address."})
.then(function(){
window.location.href="Dashboard.php";
});

var SendTo="<?php echo $_SESSION['Email']; ?>";
var Subject="Pending Withdrawal";
var htmlcontent="You have a pending withdrawal of $"+Amount+". Please note that funds may take 24hrs to reflect on your wallet";
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


}else{

$.ajax({

url:'processWithdrawal.php',
method:'post',
data:{Amount:Amount, PayTo:PayTo},
success:function(response){
if(response==1){

swal({title:"Congrats",icon: "success", text:"Withdrawal initiated successfully. We are transfering $"+Amount+" to your Bank Account <?php echo $_GET['Account']; ?>."})
.then(function(){
window.location.href="Dashboard.php";
});

var SendTo="<?php echo $_SESSION['Email']; ?>";
var Subject="Pending Withdrawal";
var htmlcontent="You have a pending withdrawal of $"+Amount+". Please note that funds may take 24hrs to reflect on your bank account";
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



}



})
			</script>
