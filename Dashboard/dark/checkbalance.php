<?php
session_start();
include('../../../Connect.php');
$User_id=$_SESSION['User_id'];
$sql="select Total_Deposit from investors where Investor_id='$User_id'";
$query=mysqli_query($Conn, $sql);
$row=mysqli_fetch_array($query, MYSQLI_ASSOC);

$AccountBal=$row['Total_Deposit'];


echo $AccountBal;




?>