<?php 
session_start();
include('../Connect.php');
include('UserInfo.php');
$Amount=$_POST['Amount'];
$Transferer=$_SESSION['User_id'];
$convertAmount=$Amount/$exchangerate;
$Receiver=$_POST['Receiver'];
$Receiver_Name=$_POST['Receiver_Name'];

$Status=0;
$Type1=1;
$Type2=2;

 $sql="SELECT * FROM investors WHERE Investor_id='$Transferer'";
 $query=mysqli_query($Conn, $sql);
 $row=mysqli_fetch_array($query, MYSQLI_ASSOC);
 $AvailableBal=$row['Fin_Asset']*$exchangerate;
 $Name=$row['First_Name'];
 if($Amount>$AvailableBal){
	 echo 2;
 }else {
      echo 1;
	  $widthdraw="INSERT INTO P2P (Transferer, Amount, Name, Type, Status) VALUES ('$Transferer', '$convertAmount', '$Receiver_Name', '$Type1', '$Status')";
	  $query2=mysqli_query($Conn, $widthdraw);
	  
	   $widthdraw2="INSERT INTO P2P (Receiver, Amount, Name, Type2, Status) VALUES ('$Receiver', '$Amount', '$Name', '$Type2', '$Status')";
	  $query3=mysqli_query($Conn, $widthdraw2);
		  if($query2){
$remain=$AvailableBal-$Amount;
$convertRemain=$remain/$exchangerate;
$deduct="update investors set Fin_Asset='$convertRemain' where Investor_id='$Transferer' ";
$query3=mysqli_query($Conn, $deduct);
}
		 
     
 }

?>