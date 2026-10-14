<?php
session_start();
include('Header.php'); 
if(isset($_SESSION['User_id'])){

?>



            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-lg-6">

<h3>Help/Support</h3>

<div class="card">
<div class="card-title">Live Support Team</div>
<a href="Withdraw.php" class="btn btn-warning">Start a Conversation</a>
</div>
</div>


<div class="card">
<div class="card-title">Whatsapp Support Team</div>
<a href="Withdraw.php" class="btn btn-warning">WhatsApp Support</a>
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