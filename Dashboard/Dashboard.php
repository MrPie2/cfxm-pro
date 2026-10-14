<?php session_start();
if(isset($_SESSION['User_id'])){
include('Header.php');
include('ProcessStock.php');
$bop="";
$Investor_id=$_SESSION['User_id'];
$sql="select * from notification where Investor_id='$Investor_id' and seen=0";
$query=mysqli_query($Conn, $sql);
$count=mysqli_num_rows($query);
while($row=mysqli_fetch_array($query, MYSQLI_ASSOC)){
$id=$row['id'];
echo "<script>
setTimeout(function(){ swal({title:'".$row['Subject']."', text:'".$row['Text']."', type:'warning'}, function(){
var id='".$id."';
window.location.href='Notification.php?id=".$id."';
}) }, 3000);
</script>";
}

  $sql="select * from stockcontracts where Investor_id='$Investor_id'";
                                    $query=mysqli_query($Conn, $sql);
                                $Count=mysqli_num_rows($query);
                                    while($row=mysqli_fetch_array($query, MYSQLI_ASSOC)){
        $id=$row['id'];
        $dayToLoad=$row['dayToLoad'];
        $Spread=$row['Spread'];
        
        $newSpread=$Spread+=0.0001;
        if($dayToLoad!=$date){
            $updateDate="update stock set dayToLoad='$date', Spread='$newSpread' where id='$id'";
            $checkUpdate=mysqli_query($Conn, $updateDate);
        }
        
        
    }
    
    
      $sqlContracts="select * from stockcontracts where Investor_id='$Investor_id'";
    $querystockContracts=mysqli_query($Conn, $sqlContracts);
        $querystockContractsTwo=mysqli_query($Conn, $sqlContracts);

    $CountInvested=mysqli_num_rows( $querystockContractsTwo);
    while($roww=mysqli_fetch_array($querystockContracts, MYSQLI_ASSOC)){
         $Equitee=number_format($roww['Buy_Price']*$roww['Margin']*$roww['Total_Units'], 2, '.',',');
        $StockEarning+=$Equitee;
    }
?>
<style>
    .card-dark{
        background: var(--card-bg);
        color: #fff;
    }
    

    .stat-text{
        color: white;
    }
</style>
        <!-- Smartsupp Live Chat script -->
<script type="text/javascript">
var _smartsupp = _smartsupp || {};
_smartsupp.key = 'ef6f82415710cac56d41d1feaba4bdb8661afea3';
window.smartsupp||(function(d) {
  var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
  s=d.getElementsByTagName('script')[0];c=d.createElement('script');
  c.type='text/javascript';c.charset='utf-8';c.async=true;
  c.src='https://www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
})(document);
</script>
<noscript>Powered by <a href="https://www.smartsupp.com" target="_blank">Smartsupp</a></noscript>
   <div class="" align="center">
                <div class="col-md-12 align-self-center" style="background: var(--body-bg); display: flex; justify-content: center">
                    <h1 class="" style="color: var(--liner-text-color)"><small style="font-size: 12pt">Total Wallet Balance</small><br><?php $account=$exchangerate*$userDetails['Fin_Asset']; echo $userDetails['First_Name']." - ".$curAbbr."".number_format($account, 2, '.',','); ?></h1> </div>
               <div class="top3nav">
                   <div><a href="Deposit.php"><i class="fas fa-arrow-alt-circle-down"></i><br><span>Deposit</span></a></div>
                    <div><a href="Withdrawal.php"><i class="fas fa-arrow-alt-circle-right"></i><br><span>Withdraw</span></a></div>
                    <div><a href="Deposit.php"><i class="fa fa-refresh"></i><br><span>Convert</span></a></div>
               </div>
            </div>

            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row d-none">
                          <div class="col-md-12 col-lg-3">
                        <div class="card card-dark">

                                <div class="stat-content dib">
                                    <h4 class="stat-text">Total Earnings  <span style="float: right"class="pull-right stat-digit text-white"><?php $account=$exchangerate*$userDetails['Fin_Asset']; echo $curAbbr.number_format($account, 2, '.', ','); ?></span></h4>
                                   
                                </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-3">
                        <div class="card card-dark">

                                <div class="stat-content dib">
                                    <h4 class="stat-text">Deposit <span style="float: right"class="pull-right stat-digit text-white"><?php $deposit=$exchangerate*$userDetails['Total_Deposit']; echo $curAbbr.number_format($deposit, 2, '.', ','); ?></span></h4>
                                   
                                </div>
                        </div>
                    </div>
                                  <div class="col-md-12 col-lg-3">
                        <div class="card card-dark">

                                <div class="stat-content dib">
                                    <h4 class="stat-text">Stock Earnings  <span style="float: right"class="pull-right stat-digit text-white"><?php $stockaccount=$exchangerate*$StockEarning; echo $curAbbr.number_format($stockaccount, 2, '.', ','); ?></span></h4>
                                   
                                </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-3">
                        <div class="card card-dark">
                            
                                <div class="stat-content dib">
                                    <h4 class="stat-text">Withdrawals

<?php 

$sql="select * from withdrawals where Investor_id='$Investor_id' and Status='2' ";
$query=mysqli_query($Conn, $sql);
while($row=mysqli_fetch_array($query, MYSQLI_ASSOC)){
$Withdrawal+=$row['Amount_Withdrawn'];

}

?>
                                    <span style="float: right"class="pull-right stat-digit text-white"><?php  echo $curAbbr.number_format($Withdrawal*$exchangerate, 2, '.',','); ?></span></h4>

                                </div>
                        </div>
                    </div>
           
                </div>
                <br><br>
                <div class="row">
                        <style>
         
         @media screen and (max-width: 600px){
             .investmentcard{
                 width: 250px;
             }
         }
         
         @media screen and (min-width: 600px){
             .investmentcard{
                 width: 100%;
             }
             
             .hidden-lg{
                 display: none;
             }
         }
     </style>
     
     
     

 <div class="col-lg-12 col-md-4" style="padding: 0px">

     <?php
    $sql="select * from investmentplans";
$query=mysqli_query($Conn, $sql); 
 $output="<div class='table-responsive'>
 <table style='width: 100%'class='table'><tr>";
      while($row=mysqli_fetch_array($query, MYSQLI_ASSOC)){
    $output.= '<td >
     <div class="card investmentcard" style="background: var(--bg-color2)">
                            <div class="card-body">
                                <div class="stat-widget-seven" align="left">


                                            <h3 style="color: var(--liner-text-color); text-transform: uppercase">'.$row['Plan_Name'].'<br>'.$curAbbr.number_format($row['Minimum']*$exchangerate, 2,'.',',').'</h3>
                                            <h6 ><span class="lead" style="font-size: 10pt">Interest:</span> <span class="text-success">'.$row['Percentage'].'% <i class="ti-arrow-up f-s-16 text-success m-l-5"></i></span></h6>
                                       
                                    



                                </div>
                            </div>
                        </div>
                    </div>
        </td>';     
      }
  $output.="</tr></table></div>";
  echo $output;
    ?>
    
    
</div>
  
                </div>
                      <div class="row">
                    <div class="card">
                        <div class="card-body"  style="display: flex; justify-content: center; gap: 10px; flex-wrap: wrap; align-items: center; padding: 20px">
                            <div>
                            <i class="fa fa-institution" style="font-size: 20pt; color: var(--liner-text-color); padding: 15px; border-radius: 50px; background: var(--bg-color)"></i></div>
                            
                            <div><h5 style='font-size: 12pt; color: var(--liner-text-color)'>Your money working daily</h5>
                            <p style="font-size: 8pt">Daily returns in USD or Crypto, flexible or fixed savings</p></div>
                        </div>
                    </div>
                </div>
                
                <!-- /# row -->
                <div class="row">
                    <div class="col-md-12" style="padding: 0px">
                         <h4 style="color: var(--liner-text-color); margin-top: 20px">Investment History</h4>
                        <div class="card">
                            <div class="card-title">
                               
                            </div>
                            <div class="card-body">

                                    <?php 
                                    $sql="select * from contracts where Investor_id='$Investor_id'";
                                    $query=mysqli_query($Conn, $sql);
                                $Count=mysqli_num_rows($query);
                                $investment='<div class="table-responsive">
                                        <table class="table table">
                                            <tbody>';
                                if($Count>0){
                                    $sn=0;
                                while($row=mysqli_fetch_array($query, MYSQLI_ASSOC)){
                                    
                                    $RemainingDate=$row['Remaining'];
                                    
                                    $StartDate=strtotime($row['Date_Entered']);
                                    
                                                                                   $Rem=$RemainingDate-$StartDate;
                                 $Remm=$Rem/86400;

                                    if($row['Status']==1){
                                        $Status="<i class='text-oxblood'>Running</i>";

                                    }else if($row['Status']==2){
                                       $Status="<i class='text-success'>Investment Completed</i>"; 
                                    }else if($row['Status']==3){
                                        $Status="<i class='text-danger'>Investment Declined</i>"; 
                                    }else{
                                       $Status="<i class='text-oxblood'>Pending</i>"; 
                                    }
                                    $sn++;        
                                $investment.='<tr><td>'.$sn.'</td>
                                <td style="text-transform: uppercase">'.$row['Plan_Type'].'</td>
                                <td>'.$curAbbr.number_format($row['Amount']*$exchangerate,2,'.',',').'</td>
                                                    <td>'.$curAbbr.number_format($row['ROI']*$exchangerate,2,'.',',').'</td>
                                                     <td>'.$row['Interest'].'%</td>
                                                    <td>'.$row['Date_Entered'].'</td>
                                                    <td>'.$RemainingDate.' Days</td><td>'.$Status.'</td>
                                                </tr>';
                                                
                                            }
                                            
                                          
                                }else{
                                    $investment.='<tr>
                                                    <td style="color: var(--liner-text-color)"class="stat-text" colspan="8">You have not started any trade or investment yet</td>
                                               </tr>';
                                }
                                
                                  $investment.='</tbody>
                                        </table>
                                    </div>';
                                  echo $investment;  
                                ?>
                                
                            
                            </div>
                        </div>
                        
                    </div>
              
                </div>
                <div class="row">
                    <div class="card">
                        <div class="card-body"  style="display: flex; justify-content: center; gap: 10px; align-items: center; padding: 20px">
                            <?php if($userDetails['V_Status']>0){
                                echo "<img src='https://static.vecteezy.com/system/resources/thumbnails/049/232/596/small/verified-badge-blue-color-for-social-media-account-png.png' style='width: 40px'/> <h4 style='color: var(--liner-text-color)'> Account Verified</h4>";
                            }else{
                            echo "<a href='btn btn-lignt' style='font-size: 12pt'>Verify Account</a>";

                            }
                            
                            ?>
                        </div>
                    </div>
                </div>
                
                
                
                 <div class="row d-none">
                 

                    <div class="col-md-12">
                           <h3 class="text-oxblood">Stock Market Data</h1>
                    <p style="color: #111">You can now invest in long term Stock from top companies around the world</p>
                      <?php
                         $sql="select * from stock";
                         $query=mysqli_query($Conn, $sql);
                         $stock="<div class='card'>
                         <div class='card-body'>
                         <div class='table-responsive'><table class='table'>";
                         
                         while($row=mysqli_fetch_array($query, MYSQLI_ASSOC)){
                                $action="<a href='Stock_Market.php?Stock_id=".$row['id']."&Type=Stock&&Min=".$row['Unit']."' class='btn btn-danger' style='margin-top: 10px'>Buy</a>";
                                if($row['Trend']==0){
            $Color="text-danger";
            $arith="-";

        }else{
            $Color="text-success";
            $arith="+";
 
        }
                           $stock.="<tr class='text-oxblood'style='font-size: 12pt'><th><img  class='img-circle' src='".$row['Logo']."' style='width: 40px; height: 40px; border-radius: 100%'> <span class='text-danger'>".$row['CompanyName']." <span style='color: #111'>".$curAbbr.$row['Unit']."</span></span><br></th><td style='text-align: right'><span class='".$Color."'>".$arith.$row['MarketCap']."%</span><br> <span class='".$Color."'>".$arith.$row['Spread']."</span></td></tr>" ; 
                         }
                         
                         $stock.="</table></div></div></div>";
                        echo $stock;

                      
                      ?>
                    </div>
                </div>
                
                    <div class="row d-none">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-title">
                                <h4>Stock Investment History</h4>
                            </div>
                            <div class="card-body">

                                    <?php 
                                  
                                $investment='<div class="table-responsive">
                                        <table class="table table">
                                            <thead style="background:'.$Background.'">
                                                <tr style="color: #fff">                                                    <th style="width: 100px">S/No</th>
                                                <th>Company</th>

                                                    <th>Amount Invested</th>
                                                            

                                                    <th>Action</th>

                                                </tr>
                                            </thead><tbody>';
                                if($CountInvested>0){
                                    $sn=0;
                                while($row=mysqli_fetch_array($querystockContractsTwo, MYSQLI_ASSOC)){
                                    

                              
                                    $Equity=number_format($row['Buy_Price']*$row['Margin']*$row['Total_Units'], 2, '.',',');
                                                                        $StockEarning+=$Equity;

                                    if($row['Status']==1){
                                        $Status="<button class='btn btn-warning' ata-toggle='modal' data-target='#exampleModal".$row['id']."'>More Info</button>";

                                    }else if($row['Status']==2){
                                       $Status="<button class='btn btn-warning' data-toggle='modal' data-target='#exampleModal".$row['id']."'>More Info</button>"; 
                                    }else if($row['Status']==3){
                                        $Status="<i class='text-danger'>Investment Declined</i>"; 
                                    }else{
                                       $Status="<button class='btn btn-warning' data-toggle='modal' data-target='#exampleModal".$row['id']."'>More Info</button>"; 
                                    }
                                    
                                    
                                    if($row['Contract_Duration']>1){
                                        $plural="s";
                                    }else{
                                        $plural="";
                                    }
                                    
                                    if($Equity>$row['Amount']){
                                        $gainText='Profit';
                                                                                                                       $btn="btn-danger";

                                    }else{
                                                                               $gainText='Loss';
                                                                               $btn="btn-default";
 
                                    }
                                    
                                    
                                    
            $modal='<!-- Modal -->
<div class="modal fade" id="exampleModal'.$row['id'].'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">'.$row['CompanyName'].'</h5>
      </div>
      <div class="modal-body">
      <div class="table-responsive">
       <table class="table table-striped">
       <tr><th style="color: #000">Investment ID</th><td style="text-align: left;">'.$row['Contract_id'].'</td></tr>
        <tr><th style="color: #000">Investment Type</th><td style="text-align: left;">'.$row['Plan_Type'].'</td></tr>
        <tr><th style="color: #000">Company Name</th><td style="text-align: left;">'.$row['CompanyName'].'</td></tr>
         <tr><th style="color: #000">Amount</th><td style="text-align: left;">'.$curAbbr.number_format($row['Amount'], 2, '.',',')*$exchangerate.'</td></tr>
          <tr><th style="color: #000">Buy Price</th><td style="text-align: left;">'.$row['Buy_Price'].'</td></tr>
           <tr><th style="color: #000">Buy Position</th><td style="text-align: left;">'.$row['Buy_Position'].'</td></tr>
            <tr><th style="color: #000">Total Units Holding</th><td style="text-align: left;">'.$row['Total_Units'].'</td></tr>
             <tr><th style="color: #000">Duration</th><td style="text-align: left;">'.$row['Contract_Duration'].' year'.$plural.'</td></tr>
              <tr><th style="color: #000">Start Date</th><td style="text-align: left;">'.$row['Date_Entered'].'</td></tr>
       </table></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn '.$btn.'">Close with '.$gainText.' '.$Equity.'</button>
      </div>
    </div>
  </div>
</div>';
echo $modal;
                                    $sn++;        
                                $investment.='<tr><td style="width: 80px">'.$sn.'</td>
                                <td>'.substr($row['CompanyName'], 0,9).'</td>
                                <td>'.$curAbbr.number_format($row['Amount']*$exchangerate,2,'.',',').'</td>
                
                                <td>'.$Status.'</td>
                                                </tr>';
                                                
                                            }
                                            
                                          
                                }else{
                                    $investment.='<tr>
                                                    <td class="text-info">You are currently not holding any stock</td>
                                               </tr>';
                                }
                                
                                  $investment.='</tbody>
                                        </table>
                                    </div>';
                                  echo $investment;  
                                ?>
                                
                            
                            </div>
                        </div>
                        
                    </div>
              
                </div><br><br>
                
                
                <!-- End PAge Content -->
            </div>

            <!-- End Container fluid  -->
            <!-- footer -->

<?php include('Footer.php') ; ?>

   <?php

}else{

header('location: LoginContainer.php');

}
?>         <!-- End footer -->
      
    <!-- End Wrapper -->
    <!-- All Jquery -->
    <script src="js/lib/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="js/lib/webticker/jquery.webticker.min.js"></script>
    <script src="js/lib/peitychart/jquery.peity.min.js"></script>
    <!-- scripit init-->
    <script src="js/custom.min.js"></script>
    <script src="js/dashboard-1.js"></script>
</body>

</html>

