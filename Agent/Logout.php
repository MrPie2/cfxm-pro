<?php
session_start();
if(isset($_SESSION['Agent_id'])){
	session_destroy();
	header("Location:Index.php");
}
?>