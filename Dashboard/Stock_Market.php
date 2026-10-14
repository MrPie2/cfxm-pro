<?php
session_start();
include('Header.php'); 
if(isset($_SESSION['User_id'])){
    
    $contractID=rand(999999999, 99999);
?>

<style>
.lead{
font-size: 10pt;
}

</style>

            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-lg-12">
      <?php
                        $Stock_id=$_GET['Stock_id'];

                         $sql="select * from stock where id='$Stock_id'";
                         $query=mysqli_query($Conn, $sql);
                
                         
                         while($row=mysqli_fetch_array($query, MYSQLI_ASSOC)){
                             $CompanyName=$row['CompanyName'];
                            $Unit=$row['Unit'];
                            $Spread=$row['Spread'];


                                if($row['Trend']==0){
            $Color="text-danger";
            $arith="-";

        }else{
            $Color="text-success";
            $arith="+";
 
        }
                           $stock='<!-- TradingView Widget BEGIN -->
    <div class="tradingview-widget-container">
  <div class="tradingview-widget-container__widget"></div>
  <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-symbol-info.js" async>
  {
  "symbol": "'.$row['tradingview'].'",
  "width": "100%",
  "locale": "en",
  "colorTheme": "light",
  "isTransparent": false
}
  </script>
</div>
<!-- TradingView Widget END -->

<div class="card"><div class="card-body"><p style="color: #111" >'.$row['description'].'</p></div></div>' ; 
                         }
                         
                       
                        echo $stock;

                      
                      ?>

                        <div class="card">
                            <div class="card-title">
                                <h4>How much do you want to Invest?</h4>

                            </div>

<div class="card-body">
<div class="form-group"><label>Amount</label><input type="number" class="form-control input-lg Amount" placeholder="200"></div>
<div class="form-group"><label>Duration</label>
<select class="form-control duration">
    <script>
        for(var i=1; i<21; i++){
            if(i==1){
                                             var plural="";

            }else{
                             var plural="s";
   
            }
            document.write("<option value='"+i+"'>"+i+" Year"+plural+"</option>");
        }
    </script>
</select>

</div>

<div class="form-group">
<button class="btn btn-oxblood btn-md Proceed">Proceed</button>
</div>

</div>

                                </div>


                            




</div>
                </div>
                <!-- /# row -->
                <!-- End PAge Content -->
            </div>
            <!-- End Container fluid  -->
            <!-- footer -->
            <?php include('Footer.php'); ?>
            <!-- End footer -->
        </div>
        <!-- End Page wrapper  -->
    </div>
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


<script>

$('.Proceed').click(function(){
    var Min=parseInt("<?php echo $_GET['Min']*$exchangerate; ?>");
    var Plan_Type="<?php echo $_GET['Type']; ?>";
    var Company="<?php echo $CompanyName; ?>";
    var Unit="<?php echo $Unit; ?>";
    var Position="<?php echo $Spread; ?>";
    var Amount=$('.Amount').val();
    var Duration=$('.duration').val()*365;
    Amount*"<?php echo $exchangerate; ?>";
    if(Amount==""){
        $('.Amount').attr('placeholder',"Input Amount");
    }
    var curAbbr='<?php echo $curAbbr; ?>';
    
    if(Amount>=Min){
var Percentage="<?php echo $_GET['Percent']; ?>";

var ContractDuration="<?php echo $_GET['ContractDuration']; ?>";

var ContractID="<?php echo $contractID; ?>";
var Amount=$('.Amount').val();

window.location.href="PreviewStock.php?Plan_Type="+Plan_Type+"&&Amount="+Amount+"&&Company="+Company+"&&Unit="+Unit+"&&ContractID="+ContractID+"&&Duration="+Duration+"&&Position="+Position;
}else if(Amount<Min){
        
      swal({icon:'error', title:'Oops!', text:'Minimum unit of '+Plan_Type+'s you can buy is '+Min}); 
    }
})


			</script>
