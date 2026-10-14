<!DOCTYPE html>
<?php include('../Manager/Header.php');
include('signupModal.html');
session_start();
?>
<html>
<header>
  <title>Agent's Desk</title>
  
  <style>
.red{
color: <?php echo $Background; ?>;

}

.btn-red{
background: <?php echo $Background; ?>;
color: white

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


<div class="container" style=" padding: 20px;">
<div class="header" align="center" style="margin-top: 3cm">
   
<h1 class="h2 red">Agent's Desk</h1>
</div>

<div class="Starter" align="center" style="padding: 30px;">

<?php
if(isset($_SESSION['Agent_id'])){
$id=$_SESSION['id'];
$Agent_id=$_SESSION['Agent_id'];
}else{
	
}

if(isset($_SESSION['Agent_id'])){
echo '<li><a href="MyClients.php?Agent_id='.$id.'" class="btn btn-block btn-red"><span class="glyphicon glyphicon-user"></span> My Clients</a></li>
	<li><a href="AgentProfile.php?Agent_id='.$id.'" class="btn btn-block btn-red"><span class="glyphicon glyphicon-pawn"></span> Profile</a></li>
	<li><a href="Logout.php" class="btn btn-block btn-red"><span class="glyphicon glyphicon-off"></span> Logout</a></li>';

}else{
	echo '<li><a data-toggle="modal" data-target="#mySignupModal" href="#" class="btn btn-lg btn-red"><span class="glyphicon glyphicon-folder-open"></span> Create Agent Account</a></li>
	<li><a href="LoginModal.php" class="btn btn-lg btn-red"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
	
}
?>

</div>

<?php

if(isset($_SESSION['Agent_id'])){
$id=$_SESSION['id'];
echo "<center><h1 class='h2 red'><small>You are logged in as Agent</small><br>".$_SESSION['Agent_Name']."</h1></center>";
}else{
	
}
?>

</div>



  

</html>
<?php include('../Manager/Footer.php');?>
