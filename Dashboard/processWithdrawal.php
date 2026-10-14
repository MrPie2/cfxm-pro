<?php 
session_start();
include('../Connect.php');
include('UserInfo.php');
$AmountToWithdraw=$_POST['Amount'];
$PayTo=$_POST['PayTo'];
$Destination="Account Balance";
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
 $sql="SELECT * FROM investors WHERE Investor_id='$Investor_id'";
 $query=mysqli_query($Conn, $sql);
 $row=mysqli_fetch_array($query, MYSQLI_ASSOC);
 $AvailableBal=$row['Fin_Asset']*$exchangerate;
 if($AmountToWithdraw>$AvailableBal){
	 echo 2;
 }else {
      echo 1;
	  $widthdraw="INSERT INTO withdrawals (Investor_id, Amount_Withdrawn, Destination, walletaddress, BOP, Network, Status, Date) VALUES ('$Investor_id', '$convertAmountWithdrawn', '$Destination', '$PayTo', '$BOP', '$Network', '$Status', '$Date')";
	  $query2=mysqli_query($Conn, $widthdraw);
		  if($query2){
$remain=$AvailableBal-$AmountToWithdraw;
$convert=$remain/$exchangerate;
$deduct="update investors set Fin_Asset='$convert' where Investor_id='$Investor_id' ";
$query3=mysqli_query($Conn, $deduct);
}
		 
     
 }

?>