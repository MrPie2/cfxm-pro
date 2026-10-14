<?php
session_start();
include('../Connect.php');
$User_id=$_SESSION['User_id'];
$Account_Number=$_POST['Account_Number'];
$Bank_Name=$_POST['Bank_Name'];
$Account_Name=$_POST['Account_Name'];
$Routing=$_POST['Routing_Number'];
$sql="INSERT INTO bankdetails (Investor_id, Bank_Name, Account_Name, Account_Number, RoutingNumber) VALUES('$User_id', '$Bank_Name', '$Account_Name', '$Account_Number', '$Routing')";
$query=mysqli_query($Conn, $sql);
if($query){
echo 1;

}else{
echo 0;

}
?>