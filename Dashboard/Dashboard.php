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

    // Modern dashboard summaries: read-only aggregates from existing investor records.
    $dashboardTotalInvested = 0;
    $dashboardTotalROI = 0;
    $dashboardActiveCount = 0;
    $dashboardCompletedCount = 0;
    $dashboardPortfolio = array();
    $dashboardTimeline = array();
    $dashboardHistoryQuery = mysqli_query($Conn, "SELECT Plan_Type, Amount, ROI, Date_Entered, Status FROM contracts WHERE Investor_id='$Investor_id' ORDER BY Date_Entered ASC");
    if ($dashboardHistoryQuery) {
        while ($dashboardRow = mysqli_fetch_assoc($dashboardHistoryQuery)) {
            $dashboardAmount = (float)$dashboardRow['Amount'];
            $dashboardROI = (float)$dashboardRow['ROI'];
            $dashboardPlan = (string)$dashboardRow['Plan_Type'];
            $dashboardDate = (string)$dashboardRow['Date_Entered'];
            $dashboardStatus = (int)$dashboardRow['Status'];
            $dashboardTotalInvested += $dashboardAmount;
            $dashboardTotalROI += $dashboardROI;
            if ($dashboardStatus === 1) { $dashboardActiveCount++; }
            if ($dashboardStatus === 2) { $dashboardCompletedCount++; }
            if (!isset($dashboardPortfolio[$dashboardPlan])) { $dashboardPortfolio[$dashboardPlan] = 0; }
            $dashboardPortfolio[$dashboardPlan] += $dashboardAmount;
            if ($dashboardDate !== '') {
                if (!isset($dashboardTimeline[$dashboardDate])) { $dashboardTimeline[$dashboardDate] = 0; }
                $dashboardTimeline[$dashboardDate] += $dashboardAmount;
            }
        }
    }
    $dashboardPortfolioLabels = array_keys($dashboardPortfolio);
    $dashboardPortfolioValues = array_values($dashboardPortfolio);
    $dashboardTimelineLabels = array();
    $dashboardTimelineValues = array();
    $dashboardRunningTotal = 0;
    foreach ($dashboardTimeline as $dashboardDate => $dashboardDailyAmount) {
        $dashboardRunningTotal += $dashboardDailyAmount;
        $dashboardTimelineLabels[] = date('d M Y', strtotime($dashboardDate));
        $dashboardTimelineValues[] = round($dashboardRunningTotal * (float)$exchangerate, 2);
    }
    $dashboardPortfolioValues = array_map(function($value) use ($exchangerate) {
        return round((float)$value * (float)$exchangerate, 2);
    }, $dashboardPortfolioValues);
    $dashboardTotalInvestedDisplay = $dashboardTotalInvested * (float)$exchangerate;
    $dashboardTotalROIDisplay = $dashboardTotalROI * (float)$exchangerate;
    $dashboardWalletDisplay = (float)$userDetails['Fin_Asset'] * (float)$exchangerate;

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
   
<section class="vh-dashboard">
    <div class="vh-dashboard-heading">
        <div>
            <span class="vh-eyebrow">INVESTOR OVERVIEW</span>
            <h1>Welcome back, <?php echo htmlspecialchars($userDetails['First_Name'] ?? 'Investor', ENT_QUOTES, 'UTF-8'); ?></h1>
            <p>Your portfolio at a glance. Review your balance, investment activity and history.</p>
        </div>
        <div class="vh-updated"><span class="vh-live-dot"></span> Account snapshot</div>
    </div>

    <div class="vh-hero-grid">
        <div class="vh-balance-card">
            <div class="vh-balance-top">
                <span>Total wallet balance</span>
                <span class="vh-balance-icon"><i class="fas fa-wallet"></i></span>
            </div>
            <div class="vh-balance-amount"><?php echo htmlspecialchars($curAbbr, ENT_QUOTES, 'UTF-8') . number_format($dashboardWalletDisplay, 2, '.', ','); ?></div>
            <div class="vh-balance-caption">Available account balance</div>
            <div class="vh-quick-actions">
                <a href="Deposit.php"><i class="fas fa-plus"></i> Deposit</a>
                <a href="Withdrawal.php"><i class="fas fa-arrow-up"></i> Withdraw</a>
                <a href="Transfer.php"><i class="fas fa-exchange-alt"></i> Transfer</a>
            </div>
        </div>
        <div class="vh-stat-card">
            <span class="vh-stat-icon vh-icon-teal"><i class="fas fa-chart-line"></i></span>
            <span class="vh-stat-label">Total invested</span>
            <strong><?php echo htmlspecialchars($curAbbr, ENT_QUOTES, 'UTF-8') . number_format($dashboardTotalInvestedDisplay, 2, '.', ','); ?></strong>
            <small>Across recorded investments</small>
        </div>
        <div class="vh-stat-card">
            <span class="vh-stat-icon vh-icon-green"><i class="fas fa-coins"></i></span>
            <span class="vh-stat-label">Recorded ROI</span>
            <strong><?php echo htmlspecialchars($curAbbr, ENT_QUOTES, 'UTF-8') . number_format($dashboardTotalROIDisplay, 2, '.', ','); ?></strong>
            <small>ROI values from your contracts</small>
        </div>
        <div class="vh-stat-card">
            <span class="vh-stat-icon vh-icon-purple"><i class="fas fa-layer-group"></i></span>
            <span class="vh-stat-label">Active investments</span>
            <strong><?php echo number_format($dashboardActiveCount); ?></strong>
            <small><?php echo number_format($dashboardCompletedCount); ?> completed</small>
        </div>
    </div>

    <div class="vh-chart-grid">
        <section class="vh-panel vh-performance-panel">
            <div class="vh-panel-heading">
                <div><h2>Investment activity</h2><p>Cumulative invested amount from your recorded contracts</p></div>
                <span class="vh-chart-badge"><i class="fas fa-wave-square"></i> Contract history</span>
            </div>
            <div class="vh-chart-wrap"><canvas id="vhPerformanceChart" aria-label="Cumulative investment history chart" role="img"></canvas></div>
            <div class="vh-chart-empty" id="vhPerformanceEmpty" <?php echo count($dashboardTimelineLabels) ? 'hidden' : ''; ?>>
                <i class="fas fa-chart-area"></i><strong>Your performance chart will appear here</strong><span>Investment history will populate this chart when you have recorded contracts.</span>
            </div>
        </section>
        <section class="vh-panel vh-allocation-panel">
            <div class="vh-panel-heading">
                <div><h2>Portfolio allocation</h2><p>Invested amount by plan type</p></div>
            </div>
            <div class="vh-doughnut-wrap"><canvas id="vhAllocationChart" aria-label="Portfolio allocation by investment plan" role="img"></canvas></div>
            <div class="vh-chart-empty vh-allocation-empty" id="vhAllocationEmpty" <?php echo count($dashboardPortfolioLabels) ? 'hidden' : ''; ?>>
                <i class="fas fa-chart-pie"></i><strong>No portfolio allocation yet</strong><span>Your plan mix will appear here after your first investment.</span>
            </div>
            <div id="vhAllocationLegend" class="vh-allocation-legend"></div>
        </section>
    </div>

    <script type="application/json" id="vhDashboardChartData"><?php
        echo json_encode(array(
            'currency' => $curAbbr,
            'timelineLabels' => $dashboardTimelineLabels,
            'timelineValues' => $dashboardTimelineValues,
            'portfolioLabels' => $dashboardPortfolioLabels,
            'portfolioValues' => $dashboardPortfolioValues
        ), JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT);
    ?></script>
</section>
<div class="vh-legacy-shortcuts" aria-label="Quick navigation">
    <a href="Deposit.php"><i class="fas fa-arrow-circle-down"></i><span>Deposit</span></a>
    <a href="Withdrawal.php"><i class="fas fa-arrow-circle-up"></i><span>Withdraw</span></a>
    <a href="Account.php"><i class="fas fa-wallet"></i><span>Profit record</span></a>
    <a href="Profile.php"><i class="fas fa-user"></i><span>Profile</span></a>
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
                                $investment='<div class="table-responsive vh-history-table-wrap">
                                        <table class="table vh-history-table">
                                            <thead><tr>
                                                <th>#</th><th>Investment plan</th><th>Amount</th><th>ROI</th><th>Interest</th><th>Start date</th><th>Remaining</th><th>Status</th>
                                            </tr></thead><tbody>';
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
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.4/dist/chart.umd.min.js"></script>
    <script src="js/dashboard-modern.js"></script>
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

