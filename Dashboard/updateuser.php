<?php
session_start();
include('../Connect.php');
$Investor_id=$_SESSION['User_id'];
$NewEmail=$_POST['NewEmail'];
$FullName=$_POST['FullName'];
$PhoneNumber=$_POST['PhoneNumber'];

$sql="update investors set Email='$NewEmail', First_Name='$FullName', Phone='$PhoneNumber' where Investor_id='$Investor_id'";
$query=mysqli_query($Conn, $sql);
if($query){
   echo 1;       
}else{
    echo 0;
    echo mysqli_error($Conn);
}


?>