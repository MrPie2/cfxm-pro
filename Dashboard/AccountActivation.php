<meta name="viewport" content="initial-scale=1, width=device-width, user-scalable=non"> 
 <?php
include('../Connect.php');
include('../home/Head.php');
include('../home/TopHeader.php');

if(isset($_GET['Email'])){
	
	$Email=$_GET['Email'];
	$Username=$_GET['Username'];
	
	$sql1="SELECT * FROM investors WHERE Email='$Email' AND Username='$Username'";
	$query1=mysqli_query($Conn, $sql1);
	$row=mysqli_fetch_array($query1, MYSQLI_ASSOC);
	
	$V_Status=$row['V_Status'];
	$output="<div class='container' align='center' style='padding: 50px;'>
<div class='row' style='margin-top: 3cm'>
	<div class='col-md-12'>
	
	";
	
	if($V_Status==0){
	
	$sql="UPDATE investors SET V_Status='1' WHERE Email='$Email' AND Username='$Username'";
	$query=mysqli_query($Conn, $sql);
	if($query){
		$output.="<h2></h2>
		
		<div align='center'><b style='color:#cc0030; font-size: 20pt;'>Your account has been activated successfully and fully functional</b> </br></br>
<a href='LoginContainer.php?Username=".$Username."' class='btn btn-primary btn-lg'> LOGIN</a></div>";

		
	}else{
		$output.="<div class='alert alert-danger'>Error Some please try again</div>".mysqli_error($Conn);
	}
	
	}elseif($V_Status==1){
	
	
	$output.="<div align='center'><b style='color:#cc0030; font-size: 20pt;'>Your account has already been activated.</b> </br></br>
<a href='LoginContainer.php?Username=".$Username."' class='btn btn-primary btn-lg'> LOGIN</a></div>";
	
	}
	
}else{

$output.="No variables";
}

$output.="</div></div></div>";
echo $output;

include ('Footer.php');

?>