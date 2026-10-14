<?php
include('../Connect.php');
$Phone=mysqli_real_escape_string($Conn, $_POST['Phone']);
$Agent_id="cfxmpro_agent/".rand(40,9999);
$Agent=$_POST['Boss'];
$Username=mysqli_real_escape_string($Conn, $_POST['Username']);
$Password=mysqli_real_escape_string($Conn, $_POST['Password']);
$First_Name=mysqli_real_escape_string($Conn, $_POST['First_Name']);


$sql="INSERT INTO agent (Agent_id, Agent, Username, Password, Agent_Name, Phone)values ('$Agent_id','$Agent','$Username','$Password','$First_Name','$Phone')";
$query=mysqli_query($Conn, $sql);
if($query){

		echo "<div class='form-group bg-primary' align='center' style='border: 0;background: #0c0; color: #eee; padding: 20px;'>Your account has been created<br><h3> Your Agent ID is: ".$Agent_id."</h3></div>";
}else{ echo 'Could not create account'.mysqli_error($Conn);}


?>