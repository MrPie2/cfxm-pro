<?php include('../Connect.php');

$WalletAddress=$_POST['WalletAddress'];
$id=$_POST['id'];
$BOP=$_POST['BOP'];
$sql="INSERT INTO walletaddress (WalletAddress, Agent_id, Wallet_Type)values('$WalletAddress','$id','$BOP')";
$query=mysqli_query($Conn, $sql);
if($query){
	echo "<div class='alert alert-success'>Wallet Address added successfully</div>";
}else{
	echo "<div class='alert alert-danger'>Could not add wallet</div>";
}


?>