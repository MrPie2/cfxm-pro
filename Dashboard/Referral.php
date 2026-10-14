<?php
session_start();
include('Header.php');
if(isset($_SESSION['User_id'])){
$Investor_id=$_SESSION['User_id'];
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
                   
                    <h3>Referal Earnings</h3>
                    
                    <div class="col-md-12 col-lg-12">
                        <div class="card">
                            <div class="stat-widget-one">
                                <div class="stat-icon dib"><i class="ti-link color-danger border-danger"></i></div>
                                <div class="stat-content dib">
                                    <div class="stat-text">Referral</div>

<?php 

$sql="select * from refferals where Refferer='$Investor_id' and Status='1'";
$query=mysqli_query($Conn, $sql);
while($row=mysqli_fetch_array($query, MYSQLI_ASSOC)){
$Earnings+=$row['Refferal_Earnings'];

}

?>
    <div class="stat-digit text-danger"><?php echo $curAbbr.number_format($Earnings*$exchangerate, 2, '.',','); ?></div>

<div align="center">

<?php if($Earnings>0){
echo '<a href="Withdraw.php?Amount='.$Earnings.'&&Location='.Refferal_Bonus.'"class="btn btn-rounded btn-oxblood " id="'.$Earnings.'">Claim Bonus</a>';

}else{

}
?>

</div>
                                </div>
                            </div>
                        </div>


<div class="card"><div class="card-body">
<p class="lead" style="color: #222">Below is your unique referral link. Earn 10% of whatever your downline deposits when they register and invest using your unique referral link</p>

<div class="form-group"><p class="text-success">https://www.maxifxpro.org/Dashboard/SignupContainer.php?Ref_id=<?php echo $Investor_id; ?></p></div>

<div class="form-group"><button id="copy_link" link="https://www.maxifxpro.org/Dashboard/SignupContainer.php?Ref_id=<?php echo $Investor_id; ?>" class="btn btn-oxblood ">Copy Referral Link</button></div>

</div></div>
                    </div>
                </div>
                
                
                <div class="row">
                    
                    
                    <div class="col-md-12">
                        
                        
                        <div class="card">
                            <div class="card-title">
                                <h4 class="text-oxblood">My Downlines/Referrals</h4>
                            </div>
                            <div class="card-body">

                                    <?php 
                                    $sql="select * from refferals where Refferer='$Investor_id'";
                                    $query=mysqli_query($Conn, $sql);
                                $Count=mysqli_num_rows($query);
                                $investment='<div class="table-responsive">
                                        <table class="table table">
                                            <thead style="background: #cc0030">
                                                <tr style="color: #fff">                                                    <th style="width: 100px">S/No</th>
 <th>Name</th>
                                                    <th> Earning</th>
                                                                                        <th style="text-align: left">Status</th>

                                     </tr>
                                            </thead><tbody>';
                                if($Count>0){
                                    $sn=0;
                                while($row=mysqli_fetch_array($query, MYSQLI_ASSOC)){
                                    if($row['Status']==1){
                                        $Status="<span class='badge badge-info'>Funds are available for withdrawal</span>";
                                    }else if($row['Status']==2){
                                       $Status="<span class='badge badge-oxblood'>Claimed</span>"; 
                                    }else{
                                       $Status="<span class='badge badge-info'>Downline not deposited yet</span>"; 
                                    }
                                    $sn++;        
                                $investment.='<tr><td style="width: 100px">'.$sn.'</td>
                                <td>'.$row['Name'].'</td>
                                
                                                    
                                                     
                                                    
                                                    <td style="text-align: left">'.$curAbbr.number_format($row['Refferal_Earnings']*$exchangerate, 2,'.',',').'</td>
                                                    <td style="text-align: left">'.$Status.'</td>
                                                </tr>';
                                                
                                            }
                                            
                                          
                                }else{
                                    $investment.='<tr>
                                                    <td class="text-info" colspan="3">You have no referrals yet, Refer to start earning.</td>
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

<script src="js/lib/toastr/toastr.min.js"></script>
    <!-- scripit init-->
    <script src="js/lib/toastr/toastr.init.js"></script>

</body>

</html>
<?php
}else{
Header('Locationm:LoginContainer.php');

}

?>


<script>

$('.TransferOut').click(function(){
var Amount=$(this).attr('id');
$.ajax({
url:'TransferOut.php',
method:'post',
data:{Amount:Amount},
success:function(response){
if(response==1){
swal({title: "Congrats", text:"Your refferal earnings have been transferred to wallet earnings", type:'success'})

.then(function(){
window.location.href="Dashboard.php";
})
}else{
swal({title: "Sorry", text:"There was an error transferring your refferal earnings", type:'error'})

}
}
})

})




function copyToClipboard(text) {
            if (window.clipboardData && window.clipboardData.setData) {
                // Internet Explorer-specific code path to prevent textarea being shown while dialog is visible.
                return clipboardData.setData("Text", text);

            } else if (document.queryCommandSupported && document.queryCommandSupported("copy")) {
                var textarea = document.createElement("textarea");
                textarea.textContent = text;
                textarea.style.position = "fixed"; // Prevent scrolling to bottom of page in Microsoft Edge.
                document.body.appendChild(textarea);
                textarea.select();
                try {
                    return document.execCommand("copy"); // Security exception may be thrown by some browsers.
                } catch (ex) {
                    //console.warn("Copy to clipboard failed.", ex);
                    return false;
                } finally {
                    document.body.removeChild(textarea);
                }
            }
        }


$(document).on('click','#copy_link', function(){
var address=$(this).attr('link');
copyToClipboard(address);
 toastr.success('Referral Link Copied',
'Successful',{ timeOut: 5000, "closeButton": true, "debug": false, "newestOnTop": true, "progressBar": true, "positionClass": "toast-top-right", "preventDuplicates": true, "onclick": null, "showDuration": "300", "hideDuration": "1000", "extendedTimeOut": "1000", "showEasing": "swing", "hideEasing": "linear", "showMethod": "fadeIn", "hideMethod": "fadeOut", "tapToDismiss": false });
        })


</script>