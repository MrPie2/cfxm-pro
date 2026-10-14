<?php
session_start();
include('../Connect.php');
$Investor_id=$_SESSION['User_id'];
$sql="select * from investors where Investor_id='$Investor_id'";
$query=mysqli_query($Conn, $sql);
$userDetails=mysqli_fetch_array($query, MYSQLI_ASSOC);

$exchangerate=$userDetails['exchangerate'];
$curName=$userDetails['curName'];
$curAbbr=$userDetails['curAbbr'];
?>