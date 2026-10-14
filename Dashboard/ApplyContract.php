<?php
include('../Connect.php');
session_start();
include('UserInfo.php');
$Investor_Name=$_SESSION['First_Name'];
$Nationality=$_SESSION['Nationality'];
$Email=$_SESSION['Email'];
$user=$_SESSION['User_id'];
$contractID=$_POST['contractID'];
$Amount=$_POST['Amount']/$exchangerate;
$interest=$_POST['Percentage'];
$ContractDuration=$_POST['ContractDuration'];
$ROI=$_POST['ROI']/$exchangerate;
$Date= date(" l d F Y ");
$bop=$_POST['bop'];
$Contract=$_POST['walletaddress'];
$Status=0;
$Plan_Type=$_POST['Plan_Type'];
$Current_Date=1;
$ConvertWhen=strtotime($Date);
$Do=$ConvertWhen+60*60*24;


$Rem=$_POST['ContractDuration'];


$check="select * from contracts where Investor_id='$user' and Plan_Type='$Plan_Type'and Amount='$Amount'";
$linkcheck=mysqli_query($Conn, $check);
$count=mysqli_num_rows($linkcheck);
$row=mysqli_fetch_array($linkcheck, MYSQLI_ASSOC);

    $convertAmount=$row['Amount']*$exchangerate;
    if($count>1 && $Amount<=$convertAmount){
        
       echo 2;
    }else{
        
       $sql="INSERT INTO contracts (Investor_id, Investor_Name, Plan_Type, Country, Contract_id, Amount, Interest, Date_Entered, Contract_Duration, ROI, PrevSettled, Remaining) VALUES ('$user', '$Investor_Name', '$Plan_Type', '$Nationality', '$contractID','$Amount','$interest', '$Date','$ContractDuration', '$ROI','$Do', '$Rem')";
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
}
        
    }





?>