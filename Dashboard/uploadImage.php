<?php 
session_start();
include('../Connect.php');

	$valid = array('success' => false, 'messages' => array());

	$User_id = $_SESSION['User_id'];

	$type = explode('.', $_FILES['userImage']['name']);
	$type = $type[count($type) - 1];
	$url = 'ProfilePicture/'.uniqid(rand()) . '.' . $type;

	if(in_array($type, array('gif', 'jpg', 'jpeg', 'png'))) {
		if(is_uploaded_file($_FILES['userImage']['tmp_name'])) {

			if(move_uploaded_file($_FILES['userImage']['tmp_name'], $url)) {
				// insert into database
				$sql = "update investors set Profile_Picture='$url' where Investor_id='$User_id'";
$query=mysqli_query($Conn, $sql);

				if($query) {
				echo 1;
				} 
				else {
					echo 0;
	
				}

			}else {
				echo 3;
			
			}
}
		}

