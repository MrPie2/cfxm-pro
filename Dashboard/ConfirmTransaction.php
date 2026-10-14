<?php 
session_start();
include('../Connect.php');
$Amount=$_POST['Amount'];
$Receiver=$_POST['Receiver'];
$Transferer=$_POST['Transferer'];
$Status=1;

$sql0="select * from investors where Investor_id='$Receiver'";
$query0=mysqli_query($Conn, $sql0);
$row=mysqli_fetch_array($query0, MYSQLI_ASSOC);

$Total_deposit=$row['Total_Deposit'];
$newBalance=$Total_deposit+$Amount;
$update="update investors set Total_Deposit='$newBalance' where Investor_id='$Receiver'";
$check=mysqli_query($Conn, $update);


$updatedeal="update P2P set Status='1' where Transferer='$Transferer'";
$checkdeal=mysqli_query($Conn, $updatedeal);

$updatedeal2="update P2P set Status='1' where Receiver='$Receiver'";
$checkdeal2=mysqli_query($Conn, $updatedeal2);
if($check){

echo 1; 
}else{
echo 0;
}


?>