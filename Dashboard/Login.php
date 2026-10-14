<?php
include('../Connect.php');
if($_SERVER['REQUEST_METHOD']=="POST"){
	$Username=mysqli_real_escape_string($Conn, $_POST['Username']);
	$Pass=mysqli_real_escape_string($Conn, $_POST['Password']);
	$sql="SELECT * from investors WHERE Username='$Username' AND Password='$Pass'";
	$query=mysqli_query($Conn, $sql);
	
	$row=mysqli_fetch_array($query, MYSQLI_ASSOC);
		$LockStatus=$row['LockStatus'];
		$V_Status=$row['V_Status'];
		        $id=$row['id'];
	            $userID=$row['Investor_id'];
	            $userName=$row['Username'];
            	$First_Name=$row['First_Name'];
            	$Profile_Picture=$row['Profile_Picture'];
            	$Fin_Asset=$row['Fin_Asset'];
            	$Country=$row['Nationality'];
            	$Level=$row['Level'];
            	$curAbbr=$row['curAbbr'];
            	$exchangerate=$row['exchangerate'];
	
	
		if($LockStatus==1){
			    echo 2;
			}elseif($id>0){
			    $curLoginCount=$row['LoginCount'];
            	$NewCount=$curLoginCount+1;
             	
            	$UpdateLoginCount="UPDATE investors SET LoginCount='$NewCount' WHERE Investor_id='$userID'";
            	$checkErr=mysqli_query($Conn, $UpdateLoginCount);
            	
            $Phone=$row['Phone'];
            $Email=$row['Email'];
            $Boss_id=$row['Boss_id'];
            $Agent_id=$row['Relation'];
			    
			session_start();
		    $_SESSION['User_id']=$userID;
		    $_SESSION['Username']=$userName;
		    $_SESSION['First_Name']=$First_Name;
		    $_SESSION['Profile_Picture']=$Profile_Picture;
		    $_SESSION['Fin_Asset']=$Fin_Asset;
		    $_SESSION['Level']=$Level;
		    $_SESSION['Nationality']=$Country;
            $_SESSION['Email']=$Email;
            $_SESSION['Boss_id']=$Boss_id;
            $_SESSION['Phone']=$Phone;
            $_SESSION['Agent_id']=$Agent_id;
            $_SESSION['curAbbr']=$row['curAbbr'];
		  $_SESSION['exchangerate']=$row['exchangerate'];

			if($V_Status==0){
			    echo 3;
			    
			}else{
			  echo 1;  
			}
		
		}else{
		echo 0;
		echo mysqli_error($Conn);

}
}

 ?>