<?php
include('../Connect.php');

if(isset($_POST['Ref_id'])){
$Ref_id=$_POST['Ref_id'];
$checkAgent="select * from investors where Investor_id='$Ref_id' ";
$queryAgent=mysqli_query($Conn, $checkAgent);
$row=mysqli_fetch_array($queryAgent, MYSQLI_ASSOC);
$Agent_id=1;
$Boss_id=1;
$Investor_id="CFXM".rand(40,9999);

}else{
$Agent=$_POST['Agent_id'];
$sql0="SELECT * FROM agent WHERE Agent_id='$Agent'";
$query0=mysqli_query($Conn, $sql0);
$row=mysqli_fetch_array($query0);
$Boss_id=$row['Agent'];
$Agent_id=$row['id'];
$Investor_id="CFXM".rand(40,9999);

}

$Username=mysqli_real_escape_string($Conn, $_POST['Username']);
$Password=mysqli_real_escape_string($Conn, $_POST['Password']);
$First_Name=mysqli_real_escape_string($Conn, $_POST['First_Name']);
$Email=mysqli_real_escape_string($Conn, $_POST['Email']);
$Phone=mysqli_real_escape_string($Conn, $_POST['Phone']);
$Country=mysqli_real_escape_string($Conn, $_POST['Country']);
$Level=1;
$Status=0;
$exchangerate=1;
$curAbbr="USD";
$Account_Type="Beginner";
$curName="United State Dollar";
$demoBalance=200;
$sql="INSERT INTO investors (Account_Type, Investor_id, Username, Password, First_Name, Email, Phone, Nationality, Relation, Level, Status,exchangerate, curName, curAbbr) values ('$Account_Type', '$Investor_id','$Username','$Password','$First_Name','$Email', '$Phone', '$Country', '$Agent_id',  '$Level','$Status','$exchangerate','$curName','$curAbbr')";
$query=mysqli_query($Conn, $sql);
$User_id=mysqli_insert_id($Conn);
$getId="select * from investors where id='$User_id'";
$checkConn=mysqli_query($Conn, $getId);
$Re=mysqli_fetch_array($checkConn, MYSQLI_ASSOC);
$Who=$Re['Investor_id'];
$Name=$Re['First_Name'];

if(isset($Ref_id)){
$Status=0;
$Refferal_Earnings=0;
$insert="insert into refferals (Refferer,  User_toLoad, Name, Refferal_Earnings, Status) values ('$Ref_id', '$Who', '$Name', '$Refferal_Earnings', '$Status')";
$check=mysqli_query($Conn, $insert);

}


if($query){
echo 1;
}else{
echo 0;
}

?>
 