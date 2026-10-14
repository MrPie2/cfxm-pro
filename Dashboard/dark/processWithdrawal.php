<?php 
session_start();
include('../../../Connect.php');
$AmountToWithdraw=$_POST['Amount'];
$PayTo=$_POST['PayTo'];

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
 $sql="SELECT * FROM investors WHERE Investor_id=".$_SESSION['User_id']."";
 $query=mysqli_query($Conn, $sql);
 $row=mysqli_fetch_array($query, MYSQLI_ASSOC);
 $AvailableBal=$row['Fin_Asset'];
 if($AmountToWithdraw>$AvailableBal){
	 echo 2;
 }else {
      echo 1;
	  $widthdraw="INSERT INTO withdrawals (Investor_id, Amount_Withdrawn, walletaddress, BOP, Network, Status, Date) VALUES ('$Investor_id', '$AmountToWithdraw', '$PayTo', '$BOP', '$Network', '$Status', '$Date')";
	  $query2=mysqli_query($Conn, $widthdraw);
		  if($query2){
$remain=$AvailableBal-$AmountToWithdraw;
$deduct="update investors set Fin_Asset='$remain' where Investor_id=".$_SESSION['User_id']." ";
$query3=mysqli_query($Conn, $deduct);
}
		 
     
 }

?>