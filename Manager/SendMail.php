<?php
include('SiteConfig.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMalier\Exception;


require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';
$sendTo=$_POST['SendTo'];
$Company=$SiteEmail;
$message=$_POST['htmlcontent'];
$Subject=$_POST['Subject'];

include('../Connect.php');

// Instantiation and passing [ICODE]true[/ICODE] enables exceptions
$mail = new PHPMailer(true);

try {
        //Server settings
    $mail->SMTPDebug = 0;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = $SMTPhost;  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = $SiteEmail;                     // SMTP username
    $mail->Password   = $SitePassword;                               // SMTP password
    $mail->SMTPSecure = 'ssl';                                  // Enable TLS encryption, [ICODE]ssl[/ICODE] also accepted
    $mail->Port       = 465;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom($SiteEmail, $MailerName);
    $mail->addAddress($sendTo);     // Add a recipient
    $mail->addAddress($Company);     // Add a recipient




    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $Subject;
    $mail->Body    = '<html>
<head>
	<TITLE>Untitled-1</TITLE>
	<META http-equiv="Content-Type" Content="text/html; charset=utf-8">
<meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1" />

<style>

*{
    font-size: 12pt;
}
</style>

</head>

<style type="text/css">

</style>
<body bgcolor="#FFFFFF">

<div style="padding: 10px; background: #eee;">
<div class="mailbody" style=" background: #fff; border-top: 10px solid '.$Background.'; border-bottom: 10px solid  '.$Background.';"><div class="" style="background-image: url('.$MailerImage.'); background-size: cover; padding: 20px; background-repeat: no-repeat; background-position: center center;"><div align="center"><h2 style="margin-top: 1cm; color: #fff;">'.$Subject.'</h2></div></div>

<div style="padding: 20px; line-height: 30px">'.$message.'
<br>

<br>
</div>
</div>
<div class="mailfooter" align="center" style="padding: 20px;">


<address style="color: #555; padding: 20px">
© '.$Establishment_Year.' - 2023. All Rights Reserved. '.$SiteName.' <br><br>Sydney NSW, Australia</address>
<hr>
<p style="color: #555; padding: 20px">
To unsubscribe from this type of email, click <br><a href="#">UNSUBSCRIBE</a><br>
</p>

</div>
</div>


</body>
</html>';

$mail->send();

 
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


if($mail){
echo 1;
}else{
 echo 0;   
}
?>
