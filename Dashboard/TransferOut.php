<?php 
session_start();
include('../Connect.php');
include('UserInfo.php');
$AmountToWithdraw=$_POST['Amount'];
$PayTo=$_POST['PayTo'];
$Destination="Refferal Bonus";
$convertAmountWithdrawn=$AmountToWithdraw/$exchangerate;
if(isset($_POST['BOP'])){
 $BOP=$_POST['BOP'];
$Network=$_POST['Network'];  
}else{
 $BOP="";
$Network="";    
}
$Investor_id=$_SESSION['User_id'];
$Status=0;
$Date= date(" l d F Y ");

	  $widthdraw="INSERT INTO withdrawals (Investor_id, Amount_Withdrawn, Destination, walletaddress, BOP, Network, Status, Date) VALUES ('$Investor_id', '$convertAmountWithdrawn', '$Destination','$PayTo', '$BOP', '$Network', '$Status', '$Date')";
$query2=mysqli_query($Conn, $widthdraw);

if($query2){
echo 1;
$delete="update  refferals set Status='2' where Refferer='$Investor_id'";
$query3=mysqli_query($Conn, $delete);
}else{
    echo 0;
}
		 



?>