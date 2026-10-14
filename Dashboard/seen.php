<?php 
session_start();
include('../Connect.php');
$id=$_POST['id'];
$Investor_id=$_SESSION['User_id'];
$sql="update notification set seen='1' where Investor_id='$Investor_id' and id='$id'";
$query=mysqli_query($Conn, $sql);
if($query){
echo 1;
    
}else{
echo 0;
}
?>