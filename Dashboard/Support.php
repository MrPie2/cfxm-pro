<?php
session_start();
include('Header.php'); 
if(isset($_SESSION['User_id'])){

$sql="select * from WhatsApp";
$query=mysqli_query($Conn, $sql);
$row=mysqli_fetch_array($query, MYSQLI_ASSOC);
$WhatsApp=$row['Phone'];
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
                    <div class="col-md-12">

<h3>Help/Support</h3>

<div class="card">
<div class="card-title">Live Support Team</div>
<p class="lead text-danger">Use the link below to chat directly with our Live Support Team. We are availabe 24/7.</p>
<a href="https://tawk.to/chat/62da40e037898912e95f0df1/1g8i8qs35" class="btn btn-warning">Start a Conversation</a>
</div>


<div class="card">
<div class="card-title">Whatsapp Support Team</div>
<p class="lead text-danger">Use the link below to chat directly with our WhatsApp Support Team. All chats are end to end encrypted.</p>
<a href="https://wa.me/<?php echo $WhatsApp; ?>" class="btn btn-warning">WhatsApp Support</a>
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