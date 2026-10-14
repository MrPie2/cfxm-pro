<?php 
session_start();
if(isset($_SESSION['User_id'])){

include('Header.php'); 

?>
<header>
<style>
tr{
font-size: 12pt;
color: #222;
}

* p{
    color: #222;
}
.th{
    color: #222;
}
</style>
</header>

<?php

$bop=$_GET['bop'];



if(isset($_GET['ContractID'])){
	$contractID=$_GET['ContractID'];
$Percent=$_GET['Percentage'];
$Percentage=$Percent/100;
	$Amount=$_GET['Amount'];
	$Plan_Type=$_GET['Plan_Type'];
	$ContractDuration=$_GET['ContractDuration'];
	$interest=$_GET['interest'];
	$ROI=$Amount*$Percentage*$ContractDuration+$Amount;
if(isset($_SESSION['User_id'])){
$table="<div class='container' style='text-align: justify; padding: 20px'><div class='row' style='padding: 20px;'><p style='font-size: 14pt'>Investor ".$_SESSION['First_Name'];
$table.=" you are about to start an investment with a principal amount of ".$curAbbr.$Amount*$exchangerate.". Below is a summary of your investment: <p></div></div><br>";


}
	
$table.="
<div class='container'>";

$table.="<table class='table'>";
	
	$table.='
<center>
	
	<tbody><tr>
	<th style="color: #222">Contract id</th><td class="contractID" style="word-wrap: break-word; text-align: right;">'.$contractID.'</td></tr>
		<tr>
	<th style="color: #222">Plan:</th>
	<td style="text-align: right"class="Amount">'.$Plan_Type.'</td></tr>
	<tr>
	<th style="color: #222">Amount</th>
	<td style="text-align: right"class="Amount" id="'.$Amount.'">'.$curAbbr.number_format($Amount, '2', '.',',').'</td></tr>

<tr><th style="color: #222">Duration</th>
	<td style="text-align: right"class="ContractDuration" id="'.$ContractDuration.'">'.$ContractDuration.' days</td></tr>

<tr><th style="color: #222">Percentage</th>
	<td style="text-align: right"class="Percentage" id="'.$Percent.'">'.$Percent.'%</td></tr>

	
	<tr><th style="color: #222">Profit</th>
	<td style="text-align: right"class="ROI" id='.$ROI.'>'.$curAbbr.number_format($ROI, 2,'.',',').'</td>
	</tr>
	
	</tbody>
	</center>';
}

   
		
             
$table.="</table></div><br>";

$modal='<!-- Modal -->
<div class="modal fade" data-backdrop="static" data-keyboard="false" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header" style="background: '.$Background.'; color: white">
        <h3 class="modal-title" id="exampleModalLabel" style="color: white;">Trafford Holding Terms and Conditions</h3>

      </div>
      <div class="modal-body" style="color: #000; height: 350px; overflow: scroll"></div>
      <div class="form-group" style="padding: 20px"> <p><input type="checkbox" name="accept"> Accept Terms and Condition</p></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-oxblood SendContract" disabled>Complete Transaction</button>
      </div>
    </div>
  </div>
</div>';

echo $modal;
	
$table.="
<div align='center' class='bottomPush Actionbtns' style='padding: 50px'>
<div class='form-group'><button id='SendContract' class='btn btn-oxblood btn-lg' data-toggle='modal' data-target='#exampleModal'>Complete Application</button><p class='display-7' style='font-size: 20pt'> Otherwise </p><a href='Dashboard.php' class='btn btn-oxblood btn-lg'>Decline</a></div></div><br><br>";
echo $table;

?>

<?php 
}else{
header('location:LoginContainer.php');
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

$('input[name="accept"]').click(function(){
  if($(this).is(':checked')){
$('.SendContract').prop('disabled', false);

}else
{
$('.SendContract').prop('disabled', true);
}  
    
})




$('.SendContract').click(function (){
var User_id='<?php echo $_SESSION['User_id']; ?>';

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

swal({icon:'error',title:'Insufficient Funds', text:'Not enough funds to start trade \n Replenish your wallet', type:'error'})
.then(function(){window.location.href="Wallet.php";});

    
}else if(Amount<=Balance){

var bop='<?php echo $_GET['bop']; ?>';
var Plan_Type='<?php echo $_GET['Plan_Type']; ?>';

	var Email='<?php echo $_SESSION['Email']; ?>';
var walletaddress=$('.walletaddress').html();
	var contractID="<?php echo $_GET['ContractID']; ?>";
	var Amount="<?php echo $_GET['Amount']; ?>";
	var Percentage="<?php echo $_GET['Percentage']; ?>";
	var ContractDuration=$('.ContractDuration').attr('id');
	var ROI=$('.ROI').attr('id');

$.ajax({
	url:'ApplyContract.php',
	method:'POST',
	data:{contractID:contractID, Amount:Amount, Percentage:Percentage, ContractDuration:ContractDuration, ROI:ROI, bop:bop, Plan_Type:Plan_Type,Email:Email, walletaddress:walletaddress},
	beforeSend:function(){
		$('.SendContract').html('Iniatializing.....').prop('disabled');
	},
	success:function(data){
	    if(data==1){
	        
var Amount="<?php echo 	$Amount=$_GET['Amount'];
?>";
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
url:'../Manager/SendMail.php',
method:'POST',
data:{SendTo:SendTo, Subject:Subject, htmlcontent:htmlcontent},
success:function(data){}
})
	
	    
	}else if(data==2){
	    
	   swal({title:'Ooops !!', icon:'warning', type:'warning', text:'Sorry you cannot invest with same amount on same plan more than two times. \n \n Kindly increase your Investment Amount to continue investing on this plan', button:'Ok got it'})
	   .then(function(){
location.reload();
})
	}else{
	    alert(data);
	    swal({title:'Sorry !!', icon:'error', type:'error',text:'Sorry we could not start your investment at the moment'})
	    .then(function(){
	        location.reload();
	    })
	}
	}
})


}else{
    alert('Something is wrong');
}//End if



}//End Success function

})


})

$.ajax({
    url:'Terms_Condition.php',
    method:'GET',
    data:{},
    success:function(data){
        $('.modal-body').html(data);
    }
})

</script>

