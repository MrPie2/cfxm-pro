<?php
include('../Connect.php');
$sql="select * from og";
$query=mysqli_query($Conn, $sql);
while($row=mysqli_fetch_array($query, MYSQLI_ASSOC)){

echo "<option value='".$row['id']."'>".$row['Boss_Name']."</option>";
}


?>