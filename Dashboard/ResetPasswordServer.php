<?php
include('../Connect.php');

$Email=$_POST['Email'];
$Password=$_POST['Password'];

$sql="update investors set Password='$Password'  where Email='$Email'";
$query=mysqli_query($Conn, $sql);
if($query){
   echo 1;       
}else{
    echo 0;
    echo mysqli_error($Conn);
}


?>