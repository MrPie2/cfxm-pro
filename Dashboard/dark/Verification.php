<?php
session_start();
include('Header.php'); 
if(isset($_SESSION['User_id'])){

?>

<style>

.lead{
font-size: 10pt;
word-wrap: break-word;
}
</style>

            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-lg-6">



<h3>Verification and Limit</h3>
<p class="text-info">Verification helps us remove restrictions and increase transaction limits on your account. Kindly provide the required documents increase transaction limits</p>
                        
<?php 
$Verification_Status=$row['V_Status'];


$sql="select * from verification";
$query=mysqli_query($Conn, $sql);
$count=mysqli_num_rows($query);

while($row=mysqli_fetch_array($query, MYSQLI_ASSOC)){
if($Verification_Status<$row['Level']){

$color="badge-warning";
$Status="Not Verified";
$Verify="<tr><th><center><button class='btn btn-primary btn-md'>Verify Level ".$row['Level']."</button></center></th></tr>";
}else{

$color="badge-success";
$Status="Verified";
}
$table='<div class="card">
<div class="card-title">Level '.$row['Level'].'<p class="lead text-info">'.$row['Requirement'].'</p></div>
<div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>

<tr><th>Maximum Withdrawal:<br>$'.number_format($row['Deposit_Limit'], 2, '.',',').'</td></tr>

<tr><th>Maximum Deposit:<br>$'.number_format($row['Withdrawal_Limit'], 2, '.',',').'</th></tr>

<tr><th>Status: <span class="badge '.$color.' ">'.$Status.'</span></th></tr>

'.$Verify.'

</tbody></table></div></div></div>';
echo $table;
}
                                           
                             


?>
                             
                    
                    </div>
                    <!-- /# column -->





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