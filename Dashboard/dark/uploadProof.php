<?php 
session_start();
include('../../../Connect.php');

	$valid = array('success' => false, 'messages' => array());

	$User_id = $_SESSION['User_id'];

	$type = explode('.', $_FILES['ProofImage']['name']);
	$type = $type[count($type) - 1];
	$url = 'DepositProofs/'.uniqid(rand()) . '.' . $type;

	
			if(move_uploaded_file($_FILES['ProofImage']['tmp_name'], $url)) {
				// insert into database
				$sql ="Insert into ProofDoc (Investor_id, Proof_Picture) value('$User_id', '$url')";
$query=mysqli_query($Conn, $sql);

				if($query) {
				echo 1;
				} 
				else {
					echo 0;
	
				}

			
		}

