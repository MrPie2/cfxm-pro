<?php 
session_start();
include('../../../Connect.php');
$id=$_SESSION['User_id'];
$Amount=$_POST['Amount'];
$select="select * from investors where Investor_id='$id'";
$query1=mysqli_query($Conn, $select);
$row=mysqli_fetch_array($query1, MYSQLI_ASSOC);
$Fin_Asset=$row['Fin_Asset'];

$newBalance=$Fin_Asset+$Amount;

$sql="update investors set Fin_Asset='$newBalance' where Investor_id='$id'";
$query=mysqli_query($Conn, $sql);

if($query){
echo 1;
$delete="delete from refferals where Refferer='$id'";
$query3=mysqli_query($Conn, $delete);
}else{
echo 0;
}

?>