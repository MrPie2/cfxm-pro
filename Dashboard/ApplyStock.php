<?php
include('../Connect.php');
session_start();
include('UserInfo.php');
$Company_Name=$_POST['Company_Name'];
$Email=$_SESSION['Email'];
$user=$_SESSION['User_id'];
$contractID=$_POST['contractID'];
$Amount=$_POST['Amount']/$exchangerate;
$ContractDuration=$_POST['ContractDuration'];
$Date= date(" l d F Y ");
$Buy_Price=$_POST['Buy_Price'];
$Buy_Position=$_POST['Buy_Position'];
$Total_Units=$_POST['Total_Units'];
$Status=0;
$Plan_Type=$_POST['Plan_Type'];
$Margin=1.000;


$check="select * from contracts where Investor_id='$user' and Plan_Type='$Plan_Type'and Amount='$Amount'";
$linkcheck=mysqli_query($Conn, $check);
$count=mysqli_num_rows($linkcheck);
$row=mysqli_fetch_array($linkcheck, MYSQLI_ASSOC);

    $convertAmount=$row['Amount']*$exchangerate;
if($count>1 && $Amount<=$convertAmount){
        
       echo 2;
}else{
        
       $sql="INSERT INTO stockcontracts (Investor_id, Contract_id, CompanyName, Plan_Type, Amount, Buy_Price, Buy_Position, Margin, Total_Units, Date_Entered, Contract_Duration, Status) VALUES ('$user', '$contractID', '$Company_Name', '$Plan_Type', '$Amount', '$Buy_Price', '$Buy_Position', '$Margin', '$Total_Units', '$Date','$ContractDuration',  '$Status')";
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