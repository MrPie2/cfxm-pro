<?php include('../Connect.php');

$Plan_Name=$_POST['Plan_Name'];
$Description=$_POST['Description'];
$Minimum=$_POST['Minimum'];
$Maximum=$_POST['Maximum'];
$Percentage=$_POST['Percentage'];
$Duration=$_POST['Duration'];
$Spread=$_POST['Spread'];
$Support="Yes";
	$type = explode('.', $_FILES['Cover_Photo']['name']);
	$type = $type[count($type) - 1];
	$Cover_Photo = 'Resources/'.uniqid(rand()) . '.' . $type;

			if(move_uploaded_file($_FILES['Cover_Photo']['tmp_name'], $Cover_Photo)) {
				// insert into database
			$sql="INSERT INTO investmentplans (Plan_Name, Description,  Cover_Photo, Duration, Minimum, Maximum, Percentage, Spread, Support)values('$Plan_Name', '$Description', '$Cover_Photo','$Duration', '$Minimum', '$Maximum', '$Percentage', '$Spread', '$Support')";
$query=mysqli_query($Conn, $sql);
if($query){
	echo 1;
}else{
	echo 0;
}
		
		
			}else{
			    echo 3;
			}

		




?>