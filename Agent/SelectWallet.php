<?php
session_start();
include('../Connect.php');
$id=$_SESSION['id'];

$sql="SELECT * FROM walletaddress WHERE Agent_id='$id'";
$query=mysqli_query($Conn, $sql);
$output="
<table class='table table-bordered'>
<thead class='dark'><th>Wallet Address</th><th>Type</th><th>Priority</th><th>Action</th></thead>
";
while($row=mysqli_fetch_array($query, MYSQLI_ASSOC)){

	if($row['Priority']==1){
		$Active= "Active";
		$Color="success";
	}else{
		$Active= "Inactive";
		$Color="";
	}
	$output.= "<tr><td style='word-wrap: break-word'>".$row['WalletAddress']."</td><td>".$row['Wallet_Type']."</td><td id='color".$row['id']."'class=".$Color.">".$Active."</td><td><a style='text-decoration: none'href='#' id=".$row['id']." BOP=".$row['Wallet_Type']." class='Activate'>Change Priority</a></td><tr>";
}
$output.="<tbody></table>";
echo $output;



?>
<script>
$('.Activate').click(function(){
	var BOP=$(this).attr('BOP');
	var id=$(this).attr('id');
		$.ajax({
		url:'MakeActive.php',
		method:'POST',
		data:{id:id, BOP:BOP},
		success:function(data){
		$('.Starter').load('SelectWallet.php', {id:id});
		}
	
	})
})


</script>