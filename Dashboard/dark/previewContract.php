<?php 
session_start();
include('Header.php'); 

?>
<header>
<style>
tr{
font-size: 12pt;
}

</style>
</header>

<?php

if(isset($_SESSION['User_id'])){
$bop=$_GET['bop'];


if(isset($_GET['ContractID'])){
	$contractID=$_GET['ContractID'];
$Percent=$_GET['Percentage'];
$Percentage=$Percent/100;
	$Amount=$_GET['Amount'];
	$ContractDuration=$_GET['ContractDuration'];
	$interest=$_GET['interest'];
	$ROI=$Amount*$Percentage*$ContractDuration+$Amount;
if(isset($_SESSION['User_id'])){
$table="<div class='container' style='text-align: justify; padding: 20px'><div class='row' style='padding: 20px;'>Investor ".$_SESSION['First_Name'];
$table.=" you are about to start an investment with a principal amount of $".$Amount.". Below is a summary of your investment: </div></div><br>";
}
	
$table.="
<div class='container'>";

$table.="<table class='table'>";
	
	$table.='
	<caption style="padding: 10px; background: #eee; color: #555; font-size: 14pt"> Summary</caption><center>
	
	<tbody><tr>
	<th>Contract id</th><td class="contractID" style="word-wrap: break-word; text-align: right">'.$contractID.'</td></tr><tr><th>Amount</th>
	<td style="text-align: right"class="Amount" id="'.$Amount.'">$'.$Amount.'</td></tr>

<tr><th>Duration</th>
	<td style="text-align: right"class="ContractDuration" id="'.$ContractDuration.'">'.$ContractDuration.' days</td></tr>

<tr><th>Percentage</th>
	<td style="text-align: right"class="Percentage" id="'.$Percent.'">'.$Percent.'% daily interest</td></tr>

	
	<tr><th>Profit</th>
	<td style="text-align: right"class="ROI" id='.$ROI.'>$'.$ROI.'</td>
	</tr>
	
	</tbody>
	</center>';
}

   
		
             
$table.="</table></div><br>

<div class='container LastWarning'>
";


$table.="<li class='display-7 text-info'>Your Investment Status and other relevant information will be sent to your email.</li><br>
<li class='display-7 text-info'>Dowloadable documentation of your Invrstment will also be sent to your email.</li></div></div>";

	
$table.="
<div align='center' class='bottomPush Actionbtns' style='padding: 50px'>
<div class='form-group'><button id='SendContract' class='btn btn-success btn-lg SendContract'>Complete Application</button><p class='display-7' style='font-size: 20pt'> Otherwise </p><a href='Dashboard.php' class='btn btn-danger btn-lg'>Decline</a></div></div><br><br>";
echo $table;

?>

<?php 
}else{
echo Header('Location:LoginContainer.php');
}
echo' <div class="NoFunds"></div><br>';
include('Footer.php');?>
- All Jquery -->
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
<script>


var counter = 0; 

var interval = setInterval(function() { 

counter++; 
//document.getElementById("timer").innerHTML=counter;
// Display 'counter' wherever you want to display it. 

if (counter == 4) {
$('.NoFunds').removeClass('NoFund');
clearTimeout(counter=0, 200);
}

}, 1000);





$('#SendContract').click(function (){
var User_id=<?php echo $_SESSION['User_id']; ?>;

$.ajax({
 url:'checkbalance.php',
method:'POST',
data:{User_id:User_id},
success:function(data){
var Amount="<?php echo 	$Amount=$_GET['Amount'];
?>";

var AccountBal=data;
var Balance=parseInt(AccountBal);

if(Amount>Balance){

swal({title:'Insufficient Funds', text:'Not enough funds to start trade /n Replenish your wallet', type:'error'})
.then(function(){window.location.href="Wallet.php";});

    
}else if(Amount<=Balance){

var bop='<?php echo $_GET['bop']; ?>';
	var Email='<?php echo $_SESSION['Email']; ?>';
var walletaddress=$('.walletaddress').html();
	var contractID=$('.ContractID').html();
	var Amount=$('.Amount').attr('id');
	var interest=$('.interest').html();
	var ContractDuration=$('.ContractDuration').attr('id');
	var ROI=$('.ROI').attr('id');

$.ajax({
	url:'ApplyContract.php',
	method:'POST',
	data:{contractID:contractID, Amount:Amount, interest:interest, ContractDuration:ContractDuration, ROI:ROI, bop:bop, Email:Email, walletaddress:walletaddress},
	beforeSend:function(){
		$('.SendContract').html('Iniatializing.....').prop('disabled');
	},
	success:function(data){
	    if(data==1){
var Amount=$('.Amount').attr('id');
swal({
icon: "success", 
text:"Investment placed successfully",
buttons: "Dashboard",
type: "success",
closeOnClickOutside: false,
})

.then(function(){
window.location.href="Dashboard.php";
})
var SendTo="<?php echo $_SESSION['Email']; ?>";
var Subject="Investment Placed Successfully";
var htmlcontent="You have successfully started an investment with a principal amount of $"+Amount+". The said investment will be ready for withdrawal in the next "+ContractDuration+" days";
$.ajax({
url:'Manager/SendMail.php',
method:'POST',
data:{SendTo:SendTo, Subject:Subject, htmlcontent:htmlcontent},
success:function(data){}
})
	
	    
	    
	}else{
	    swal(data);
	}
	}
})


}else{
    alert('Something is wrong');
}//End if



}//End Success function

})


})


</script>

