<?php
session_start();
include('Header.php'); 
if(isset($_SESSION['User_id'])){

?>
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                <div class="col-12">
                        
<div class="card" align="center">
<a href="Wallet.php" class="btn btn-oxblood">Deposit Now</a>
</div>


<div class="card">
                            <div class="card-title">
                                <h4>Deposit(s) History</h4>
                            </div>
<?php 

$sql="select * from deposits where Investor_id='$Investor_id'  ";
$query=mysqli_query($Conn, $sql);
$count=mysqli_num_rows($query);

if($count>0){
$table='<div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr style="color: #222">
                                                <th>S/No</th>
                                                <th>Amount</th>
                                                <th>Status</th>
                                                <th>Date</th>
                                            
                                            </tr>
                                        </thead>
                                        <tbody>';
$sn=0;
while($row=mysqli_fetch_array($query, MYSQLI_ASSOC)){
$sn++;

if($row['Status']==0){
$color="badge-danger";
$Status="Failed";
}else if($row['Status']==1){

$color="badge-oxblood";
$Status="Success";
}else{
$color="badge-warning";
$Status="Pending";

}
$table.='<tr style="color: #222">
                                                <th scope="row">'.$sn.'</th>
<td class="">'.$curAbbr.number_format($row['Amount_Deposited']*$exchangerate, 2, '.',',').'</td>
                                                <td><span class="badge '.$color.'">'.$Status.'</span></td>
                                                <td>'.$row['Date'].'</td>
                                                
                                            </tr>';

}
                                           
                             $table.='</tbody></table>';

}else{
$table.="<h4>You have not made any deposits</h4>";
}

echo $table;
?>
                                </div>


                            </div>


                        </div>
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