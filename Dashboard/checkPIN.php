<?php include('../Connect.php'); 
session_start();
$Investor_id=$_SESSION['User_id'];

$StringtoCompare=$_POST['PIN'];

$sql="select * from investors where Investor_id='$Investor_id'";
$query=mysqli_query($Conn, $sql);
$row=mysqli_fetch_array($query, MYSQLI_ASSOC);
$PIN=$row['PIN'];

if($PIN==$StringtoCompare){
    echo 1;
}else{
   echo 0; 
}




?>