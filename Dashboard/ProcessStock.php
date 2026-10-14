<?php include('../Connect.php'); 

    $sql="select * from stock";
    $query=mysqli_query($Conn, $sql);
    $date=date('d');
    while($row=mysqli_fetch_array($query, MYSQLI_ASSOC)){
        $id=$row['id'];
        $dayToLoad=$row['dayToLoad'];
        $Spread=$row['Spread'];
        $CompanyName=$row['CompanyName'];
        
        if($row['Trend']==1 && $dayToLoad=="15" &&  $date && $Day!='Sun' && $Day!='Sat'){
            $newSpread=$Spread+=0.0001;

            $updateDate="update stock set dayToLoad='$date', Spread='$newSpread' , Unit='$newSpread' where id='$id'";
            $checkUpdate=mysqli_query($Conn, $updateDate);
            
            
            $sqlMargin="select * from stockcontracts where CompanyName='$CompanyName'";
            $queryMargin=mysqli_query($Conn, $sqlMargin);
            
            $rowMa=mysqli_fetch_array($queryMargin, MYSQLI_ASSOC);
            $Margin=$rowMa['Margin'];
            
            $newMargin=$Margin+=0.0001;
            
            $updateMargin="update stockcontracts set Margin='$newMargin' where CompanyName='$CompanyName'";
            $checkMargin=mysqli_query($Conn, $updateMargin);
            
            
        }else if($dayToLoad!=$date && $Day!='Sun' && $Day!='Sat' && $row['Trend']==0){
            $newSpread-$Spread-=0.0001;

            $updateDate="update stock set dayToLoad='$date', Spread='$newSpread', Unit='$newSpread' where id='$id'";
            $checkUpdate=mysqli_query($Conn, $updateDate);
            
            
            
            $sqlMargin="select * from stockcontracts";
            $queryMargin=mysqli_query($Conn, $sql);
            
            $rowMa=mysqli_fetch_array($queryMargin, MYSQLI_ASSOC);
            $Margin=$rowMa['Margin'];
            
            $newMargin=$Margin-=0.0001;
            
            $updateMargin="update stockcontracts set Margin='$newMargin' where CompanyName='$CompanyName'";
            $checkMargin=mysqli_query($Conn, $updateMargin);
        }
        
        
    }





?>