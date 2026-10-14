<?php
session_start();
include('../Connect.php');

$exchange=$_POST['currency'];

$curName=$_POST['curName'];
$curAbbr=$_POST['curAbbr'];


$Investor_id=$_SESSION['User_id'];

$sql="update  investors set exchangerate='$exchange', curName='$curName', curAbbr='$curAbbr' where Investor_id='$Investor_id'";
$query=mysqli_query($Conn, $sql);

if($query){

echo 1;
}else{

echo 0;
}


?>