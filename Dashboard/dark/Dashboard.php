<?php 
session_start();
include('Header.php'); 

if(isset($_SESSION['User_id'])){

$Investor_id=$_SESSION['User_id'];
$sql="select * from notification where Investor_id=".$_SESSION['User_id']." and seen=0";
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

?>
<!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container">
  <div id="tradingview_5b961"></div>
  <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/symbols/BTCUSD/?exchange=BITSTAMP" rel="noopener" target="_blank"><span class="blue-text">BTCUSD Chart</span></a> by TradingView</div>
  <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
  <script type="text/javascript">
  new TradingView.widget(
  {
  "symbol": "BITSTAMP:BTCUSD",
  "interval": "D",
  "timezone": "Etc/UTC",
  "theme": "dark",
  "style": "1",
  "locale": "en",
  "toolbar_bg": "#f1f3f6",
  "enable_publishing": false,
  "allow_symbol_change": true,
  "container_id": "tradingview_5b961"
}
  );
  </script>
</div>
<!-- TradingView Widget END -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-12">
                        <div class="crypto-ticker m-b-15">
                            <ul id="webticker-dark-icons">
                                <li data-update="item1"><i class="cc BTC"></i> BTC <span class="coin-value"> $11.039232</span></li>
                                <li data-update="item2"><i class="cc ETH"></i> ETH <span class="coin-value"> $1.2792</span></li>
                                <li data-update="item3"><i class="cc GAME"></i> GAME <span class="coin-value"> $11.039232</span></li>
                                <li data-update="item4"><i class="cc LBC"></i> LBC <span class="coin-value"> $0.588418</span></li>
                                <li data-update="item5"><i class="cc NEO"></i> NEO <span class="coin-value"> $161.511</span></li>
                                <li data-update="item6"><i class="cc STEEM"></i> STE <span class="coin-value"> $0.551955</span></li>
                                <li data-update="item7"><i class="cc LTC"></i> LIT <span class="coin-value"> $177.80</span></li>
                                <li data-update="item8"><i class="cc NOTE"></i> NOTE <span class="coin-value"> $13.399</span></li>
                                <li data-update="item9"><i class="cc MINT"></i> MINT <span class="coin-value"> $0.880694</span></li>
                                <li data-update="item10"><i class="cc IOTA"></i> IOT <span class="coin-value"> $2.555</span></li>
                                <li data-update="item11"><i class="cc DASH"></i> DAS <span class="coin-value"> $769.22</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <br><br>
                <div class="row">
                   

 <div class="col-lg-4">
     <div align="center"><h1>Investment Plans<br><small class="text-info lead"style="font-size: 10pt">Swipe right to see other plans</small></h1></div>
     <?php
    $sql="select * from investmentplans";
$query=mysqli_query($Conn, $sql); 
 $output="<div class='table-responsive'><table style='width: 100%'class='table'><tr>";
      while($row=mysqli_fetch_array($query, MYSQLI_ASSOC)){
     $output.= '<td style="width: 100%">
     <div class="card" style="width: 250px">
                            <div class="card-body">
                                <div class="stat-widget-seven">
                                    <div class="row">
                                        <div class="col-4">
                                            <i class="cc BTC" title="BTC"></i>
                                        </div>
                                        <div class="col-5">
                                            <h3>'.$row['Plan_Name'].'</h3>
                                            <h6 class="text-muted">0.00000434 <span class="color-gray">BTC</span> <span class="text-info">$0.04</span></h6>
                                        </div>
                                        <div class="col-5 text-right">
                                            <h3>$'.number_format($row['Minimum'], 0,'.',',').'</h3>
                                            <h6 class="text-success">'.$row['Percentage'].'% <i class="ti-arrow-up f-s-16 text-success m-l-5"></i></h6>
                                        </div>
                                    </div>
                                    <div class="m-t-15">
                                       <!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container">
  <div class="tradingview-widget-container__widget"></div>
  <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-mini-symbol-overview.js" async>
  {
  "symbol": "FX:EURUSD",
  "width": "100%",
  "height": "100%",
  "locale": "en",
  "dateRange": "3M",
  "colorTheme": "dark",
  "trendLineColor": "rgba(41, 98, 255, 1)",
  "underLineColor": "rgba(41, 98, 255, 0.3)",
  "underLineBottomColor": "rgba(41, 98, 255, 0)",
  "isTransparent": false,
  "autosize": true,
  "largeChartUrl": ""
}
  </script>
</div>
<!-- TradingView Widget END -->
                                    </div>


<div align="center" style="padding: 20px"><a href="Invest_Amount.php?id='.$row['id'].'&&bop='.$bop.'&&Plan_Type='.$row['Plan_Name'].' &&Percent='.$row['Percentage'].'&& Plan_Type='.$row['Plan_Name'].'&&ContractDuration='.$row['Duration'].'&&Min='.$row['Minimum'].'&&Max='.$row['Maximum'].' " class="btn btn-warning">Invest Now</a></div>


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
                <!-- /# row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-title">
                                <h4>Trade History</h4>
                            </div>
                            <div class="card-body">

                                    <?php 
                                    $sql="select * from contracts where Investor_id='$Investor_id'";
                                    $query=mysqli_query($Conn, $sql);
                                $Count=mysqli_num_rows($query);
                                $investment='<div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>                                                    <th>S/No</th>

                                                    <th>Amount Invested</th>
                                                    <th>Estimated Profit</th>
                                                    <th>Date</th>
                                                    <th>Status</th>

                                                </tr>
                                            </thead><tbody>';
                                if($Count>0){
                                    $sn=0;
                                while($row=mysqli_fetch_array($query, MYSQLI_ASSOC)){
                                    if($row['Status']==1){
                                        $Status="<i class='text-info'>Running</i>";
                                    }else if($row['Status']==2){
                                       $Status="<i class='text-success'>Trade Completed</i>"; 
                                    }else{
                                       $Status="<i class='text-warning'>Pending</i>"; 
                                    }
                                    $sn++;        
                                $investment.='<tr><td>'.$sn.'</td>
                                <td>$'.number_format($row['Amount'],2,'.',',').'</td>
                                                    <td>$'.number_format($row['ROI'],2,'.',',').'</td>
                                                    <td>'.$row['Date_Entered'].'</td>
                                                    <td>'.$Status.'</td>
                                                </tr>';
                                                
                                            }
                                            
                                          
                                }else{
                                    $investment.='<tr>
                                                    <td class="text-info">You have not started any trade or investment yet</td>
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
                
                
                <!-- End PAge Content -->
            </div>
            <!-- End Container fluid  -->
            <!-- footer -->

<?php include('Footer.php') ; ?>

            <!-- End footer -->
      
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

<?php

}else{

Header('Location:LoginContainer.php');

}
?>