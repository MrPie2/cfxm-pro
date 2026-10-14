<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMalier\Exception;
include('../../../Connect.php');

if(isset($_POST['Ref_id'])){
$Ref_id=$_POST['Ref_id'];
$checkAgent="select * from investors where Investor_id='$Ref_id' ";
$queryAgent=mysqli_query($Conn, $checkAgent);
$row=mysqli_fetch_array($queryAgent, MYSQLI_ASSOC);
$Agent_id=$row['Relation'];
$Boss_id=$row['Boss_id'];

}else{
$Agent=$_POST['Agent_id'];
$sql0="SELECT * FROM agent WHERE Agent_id='$Agent'";
$query0=mysqli_query($Conn, $sql0);
$row=mysqli_fetch_array($query0);
$Boss_id=$row['Agent'];
$Agent_id=$row['id'];
}

$Username=mysqli_real_escape_string($Conn, $_POST['Username']);
$Password=mysqli_real_escape_string($Conn, $_POST['Password']);
$First_Name=mysqli_real_escape_string($Conn, $_POST['First_Name']);
$Email=mysqli_real_escape_string($Conn, $_POST['Email']);
$Phone=mysqli_real_escape_string($Conn, $_POST['Phone']);
$Country=mysqli_real_escape_string($Conn, $_POST['Country']);
$Level=1;
$Status=0;
$demoBalance=200;
$sql="INSERT INTO investors (Username, Password, First_Name, Email, Phone, Nationality, Relation, Boss_id, Level, DemoBalance, Status) values ('$Username','$Password','$First_Name','$Email', '$Phone', '$Country', '$Agent_id', '$Boss_id',  '$Level','$demoBalance','$Status')";
$query=mysqli_query($Conn, $sql);
$User_id=mysqli_insert_id($Conn);


if(isset($Ref_id)){
$Status=0;
$Refferal_Earnings=0;
$insert="insert into refferals (Refferer,  User_toLoad, Refferal_Earnings, Status) values ('$Ref_id', '$User_id', '$Refferal_Earnings', '$Status')";
$check=mysqli_query($Conn, $insert);

}


if($query){
echo 1;
}else{
echo 0;
}
/*
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Instantiation and passing [ICODE]true[/ICODE] enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'mail.kingsgrantedinvestment.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'invest@kingsgrantedinvestment.com';                     // SMTP username
    $mail->Password   = 'Shadrach1_@';                               // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, [ICODE]ssl[/ICODE] also accepted
    $mail->Port       = 26;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('invest@kingsgrantedinvestment.com', 'Kings Granted Investment');
    $mail->addAddress($Email);     // Add a recipient



    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Account Activation';
    $mail->Body    = '
    
<HTML>
<!-- saved from url=(0020)http://www.corel.com -->
<HEAD>
	<TITLE>Untitled-1</TITLE>
	<META http-equiv="Content-Type" Content="text/html; charset=utf-8">
	<META NAME="Generator" CONTENT="CorelDRAW X7">
	<META NAME="Date" CONTENT="02/22/2021">

</HEAD>

<STYLE type="text/css">
<!--
	#PAS { font-family: "Arial"; color: rgb(254,254,254); font-size: 15px };
	#PAS1z { text-align: center; margin-bottom: 1.000000em; letter-spacing: 0.000000em; line-height: 1.000000em; font-size: 15px; };
	#PAS2z { font-family: "Arial; color: rgb(254,254,254); font-size: 15px };
	#PAS3z { text-align: center; margin-bottom: 1.000000em; letter-spacing: 0.000000em; line-height: 1.000000em; font-size: 15px; };

-->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</STYLE>
<BODY BGCOLOR="#FFFFFF">

<DIV STYLE="padding: 20px; background: #eee;" class="well">
<div class="mailbody" style=" background: #fff; padding: 5px; border-bottom: 10px solid  orange;">
<p style="padding: 10px">Thank you '.$Username.' for choosing Kingsgrantedinvestment Blockchain Platform,
Click the link below to active your trading Account</p>
<center><a href="www.kingsgrantedinvestment.com/AccountActivation.php?Email='.$Email.'&& Username='.$Username.'" style="padding: 20px; color: white; background: blue; text-decoration: none;" class="btn btn-primary btn-lg">Activate Account</a></center>

<p style="padding: 10px">If you did not request to join our platform,
kindly ignore this message and discontinue with your registration</p>

</div>
<div class="mailfooter" align="center" style="padding: 20px;">
<address style="color: #555; padding: 20px">
C 2013-2021kingsgrantedinvestment Blockchain Investment <br> 33 St. James Square,London, England, SW1Y4JS, United Kingdom</address>
<p  style="color: #555">
This message was sent to you &nbsp;because you are an investor of Kingsgrantedinvestment Blockchain Investment</p>


<p style="color: #555; padding: 20px">
To unsubscribe from this type of email, click <br><a href="#">UNSUBSCRIBE</a><br>
</p>

<p>
If you want to unsubscribe from all kingsgrantedincestment emails, including those related to your account activities, click <br><a href="#">UNSUBSCRIBE ALL</a>
</p>

</div>
</DIV>


</BODY>
</HTML>';
   

    $mail->send();

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}	
*/
?>
 