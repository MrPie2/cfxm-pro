<?php 
session_start();
include('../Connect.php');

	$valid = array('success' => false, 'messages' => array());

 	$Level=$_POST['Level'];
	$User_id = $_SESSION['User_id'];

	$type = explode('.', $_FILES['VerificationImage']['name']);
	$type = $type[count($type) - 1];
	$url = 'VerificationDoc/'.uniqid(rand()) . '.' . $type;
	$Status=0;

	if(in_array($type, array('gif', 'jpg', 'jpeg', 'png'))) {
		if(is_uploaded_file($_FILES['VerificationImage']['tmp_name'])) {

			if(move_uploaded_file($_FILES['VerificationImage']['tmp_name'], $url)) {
				// insert into database
				$sql = "insert into VerificationDocs (Investor_id, DocToVerify, Level, Status) value ('$User_id', '$url', '$Level', '$Status')";
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

