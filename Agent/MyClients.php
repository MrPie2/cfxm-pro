<!DOCTYPE html>
<?php include('../Connect.php'); include('../Manager/SiteConfig.php'); ?>
<html>
<header>
  <title>Agent's Desk</title>
  
  <style>
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
li{

list-style: none;
}
.bg-lemon{
    background: <?php echo $Background; ?>;
    color: #fff;
}
  </style>
</header>
<?php include('../Manager/Header.php');?>

<div class="container" style="">
<div class="header" align="center">
<h1 class="h1">Clients</h1>
</div>

<div class="Starter" align="center" >

<?php

if(isset($_SESSION['Agent_id'])){
$id=$_SESSION['Agent_id'];
$Agent_id=$_GET['Agent_id'];
}else{
	
}
$sql="SELECT * FROM investors WHERE Relation='$Agent_id'";
$query=mysqli_query($Conn, $sql);
$output="<table class='table table-striped table-hover'>
<thead class='bg-lemon'>
<th>Client Name</th>
<th>Net Woth</th>
<thead> 
";
while($row=mysqli_fetch_array($query, MYSQLI_ASSOC)){
	$output.= "<tr><td><li>".$row['First_Name']."</td><td>$".$row['Fin_Asset']."</li></td><tr>";
}
$output.="</table>";
echo $output;

?>

</div>

</div>



  

</html>
<?php include('../Manager/Footer.php')?>
  