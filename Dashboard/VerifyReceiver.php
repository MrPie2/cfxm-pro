<?php
include('../Connect.php');
$Receiver=$_POST['Receiver'];
$sql="select * from investors where Investor_id='$Receiver'";
$query=mysqli_query($Conn, $sql);
$row=mysqli_fetch_array($query, MYSQLI_ASSOC);
$Receiver_Name=$row['First_Name'];
echo $Receiver_Name;




?>