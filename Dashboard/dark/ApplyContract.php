<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception; 

include('../../../Connect.php');
session_start();
$Investor_Name=$_SESSION['First_Name'];
$Nationality=$_SESSION['Nationality'];
$Email=$_SESSION['Email'];
$user=$_SESSION['User_id'];
$contractID=$_POST['contractID'];
$Amount=$_POST['Amount'];
$interest=$_POST['interest'];
$ContractDuration=$_POST['ContractDuration'];
$ROI=$_POST['ROI'];
$Date= date(" l d F Y ");
$bop=$_POST['bop'];
$Contract=$_POST['walletaddress'];
$Status=0;
$Current_Date=1;

$sql="INSERT INTO contracts (Investor_id, Investor_Name, Country, Contract_id, Amount, Interest, Date_Entered, Contract_Duration, ROI) VALUES ('$user', '$Investor_Name', '$Nationality', '$contractID','$Amount','$interest', '$Date','$ContractDuration', '$ROI')";
$query=mysqli_query($Conn, $sql);
if($query){
echo 1;
$sqli="select Total_Deposit from investors where Investor_id='$user'";
$check=mysqli_query($Conn, $sqli);
$row=mysqli_fetch_array($check, MYSQLI_ASSOC);

$Total_Deposit=$row['Total_Deposit'];

$remain=$Total_Deposit-$Amount;

$deduct="update investors set Total_Deposit='$remain' where Investor_id='$user' ";
$query1=mysqli_query($Conn, $deduct);

}else{
    echo 0;
	echo "Sorry we could not book your contract at the moment /n try again later".mysqli_error($Conn);
}
?>