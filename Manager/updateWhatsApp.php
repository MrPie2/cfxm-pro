<?php
session_start();
include("../Connect.php");
$Boss_id=$_SESSION['Boss_id'];

$Phonenumber=$_POST['What'];

$sql="update WhatsApp set Phone='$Phonenumber' where Boss_id=$Boss_id";
$query=mysqli_query($Conn, $sql);

if($query){
   echo 1; 
}else{
    echo 0;
}

?>