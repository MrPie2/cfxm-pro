<?php
session_start();
include('Header.php');
if(isset($_SESSION['User_id'])){

?>
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->

                <div class="row">
                    <div class="col-md-6 col-lg-3">
                        <div class="card">
                            <div class="stat-widget-one">
                                <div class="stat-icon dib"><i class="ti-money color-success border-success"></i></div>
                                <div class="stat-content dib">
                                    <div class="stat-text">Total Earnings</div>
                                    <div class="stat-digit text-success">$<?php echo number_format($row['Fin_Asset'], 2, '.', ','); ?></div>
<div align="center">
<?php if($row['Fin_Asset']>0){
echo '<a href="Withdrawal.php" class="btn btn-rounded btn-success">Withdraw</a>';

}else{

}
?>
</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="card">
                            <div class="stat-widget-one">
                                <div class="stat-icon dib"><i class="ti-user color-primary border-primary"></i></div>
                                <div class="stat-content dib">
                                    <div class="stat-text">Deposits</div>
                                    <div class="stat-digit text-primary">$<?php echo number_format($row['Total_Deposit'], 2, '.', ','); ?></div>

<div align="center"><a href="Deposit.php"class="btn btn-rounded btn-info">Deposit</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="card">
                            <div class="stat-widget-one">
                                <div class="stat-icon dib"><i class="ti-layout-grid2 color-pink border-pink"></i></div>
                                <div class="stat-content dib">
                                    <div class="stat-text">Withdrawals</div>

<?php 

$sql="select * from withdrawals where Investor_id='$Investor_id'  ";
$query=mysqli_query($Conn, $sql);
while($row=mysqli_fetch_array($query, MYSQLI_ASSOC)){
$Withdrawal+=$row['Amount_Withdrawn'];

}

?>
                                    <div class="stat-digit">$<?php echo number_format($Withdrawal, 2, '.',','); ?></div>

<div align="center"><a href="#" class="btn btn-rounded">Withdraw</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="card">
                            <div class="stat-widget-one">
                                <div class="stat-icon dib"><i class="ti-link color-danger border-danger"></i></div>
                                <div class="stat-content dib">
                                    <div class="stat-text">Referral</div>

<?php 

$sql="select * from refferals where Refferer='$Investor_id'  ";
$query=mysqli_query($Conn, $sql);
while($row=mysqli_fetch_array($query, MYSQLI_ASSOC)){
$Refferal_Earning+=$row['Refferal_Earnings'];

}

?>
                                    <div class="stat-digit text-danger"><?php echo number_format($Refferal_Earning, 2, '.',','); ?></div>

<div align="center">

<?php if($Refferal_Earning>0){
echo '<a href="#"class="btn btn-rounded btn-danger">Transfer Out</a>';

}else{

}
?>

</div>
                                </div>
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

</body>

</html>
<?php
}else{
Header('Locationm:LoginContainer.php');

}

?>