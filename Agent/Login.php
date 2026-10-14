<?php
include('../Connect.php');
if($_SERVER['REQUEST_METHOD']=="POST"){
	$Username=mysqli_real_escape_string($Conn, $_POST['Username']);
	$Pass=mysqli_real_escape_string($Conn, $_POST['Password']);
	$sql="SELECT * from agent WHERE Username='$Username' AND Password='$Pass'";
	$query=mysqli_query($Conn, $sql);
	
	$row=mysqli_fetch_array($query, MYSQLI_ASSOC);
	//$curLoginCount=$row['LoginCount'];
	//$NewCount=$curLoginCount+1;
 	$id=$row['id'];
	$AgentID=$row['Agent_id'];
	//$UpdateLoginCount="UPDATE investors SET LoginCount='$NewCount' WHERE Investor_id='$userID'";
	//$checkErr=mysqli_query($Conn, $UpdateLoginCount);
	$Phone=$row['Phone'];
	$First_Name=$row['Agent_Name'];


	
	if($id>0){

		session_start();
		$_SESSION['id']=$id;
		$_SESSION['Agent_id']=$AgentID;
		$_SESSION['Phone']=$Phone;
		$_SESSION['Agent_Name']=$First_Name;
		echo 1;
	}else{
		echo '<div class="alert alert-danger">Username or Password incorrect</div>';
	}
}


 ?>