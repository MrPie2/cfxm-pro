<!DOCTYPE html>
<?php include('../Connect.php');?>
<html>
<header>
  <title>Profile</title>
  
<style>
.header{
    margin-top: 1cm;
}

th, td {
  text-align: left;
  
}
  
  
  .panel label{
	  float: left;
	  color: #fff;
  }
  .inactive{
	  display: none;
  }
.Starter > li {
	list-style: none;
	padding: 10px;
}
.Starter > li > a {
	border: none;
	border-radius: 0px;
	font-size: 14pt;
}
  </style>
</header>
<?php include('../Manager/Header.php');?>

<div class="container" style="margin-bottom: 3cm">
<div class="header" align="center">
<h1 class="h1">Profile</h1>
</div>

<div class="Starter">

<?php

if(isset($_SESSION['Agent_id'])){
    $id=$_SESSION['id'];
}else{
    
}


$sql="SELECT * FROM agent WHERE id='$id'";
$query=mysqli_query($Conn, $sql);
$row=mysqli_fetch_array($query, MYSQLI_ASSOC);
$Agent_id=$row['Agent_id'];
$Agent_Name=$row['Agent_Name'];
$Phone=$row['Phone'];
$output="<table
style='width:100%'
>";

	$output.= "
	
	<tr><th>Agent Id</th><td>".$Agent_id."</td><tr>
	
	<tr><th>Agent Name</th> <td>".$Agent_Name."</td></tr>
	
	<tr><th>Phone</th> <td>".$Phone."</td></tr>
	
	
	";

$output.="</table>";
echo $output;

?>

</div>

</div>



  

</html>
<?php include('../Manager/Footer.php')?>
  