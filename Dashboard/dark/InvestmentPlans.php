<?php
session_start();
include('Header.php'); 
if(isset($_SESSION['User_id'])){

?>
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                
                
                <div class="row">
                   

 <div class="col-lg-12">
     <div align="center"><h1>Investment Plans<br</h1></div>
     <?php
    $sql="select * from investmentplans";
$query=mysqli_query($Conn, $sql); 
 $output="";
      while($row=mysqli_fetch_array($query, MYSQLI_ASSOC)){
     $output.= '<div class="card">
                            <div class="card-body">
                                <div class="stat-widget-seven">
                                    <div class="row">
                                        <div class="col-12">
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
                    </div>';     
      }
 
  echo $output;
    
    ?>
    
    
</div>
  
                </div>
              
                    </div>
                    <!-- /# column -->
          
            <!-- End Container fluid  -->



            <!-- footer -->
            <?php include('Footer.php'); ?>
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
    <script src="js/custom.min.js"></script>

</body>

</html>

<?php
}else{
Header('Location:LoginContainer.php');

}

?>