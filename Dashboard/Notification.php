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
                <div style="text-align: center; padding: 20px"><h1>Notifications</h1></div>



                            
<?php 
$id=$_GET['id'];

$sql="select * from notification where Investor_id='$Investor_id' order by id desc";
$query=mysqli_query($Conn, $sql);
$count=mysqli_num_rows($query);


$table='';
$sn=0;
while($row=mysqli_fetch_array($query, MYSQLI_ASSOC)){
if($row['seen']==0){
 $color="#f00";   
}else{
    $color="#aaa";
}
$table.='
<div class="card">
<div class="card-title">
<a data-toggle="modal" data-target="#exampleModalCenter'.$row['id'].'" class="OpenNotification" id="'.$row['id'].'"href="#" style="color: '.$color.'; text-decoration: none;">'.$row['Subject'].'<i style="font-size: 9pt; color: white;"class="pull-right">'.$row['Date'].'</i></a>
</div>
</div>';



$modal='<div class="modal fade" id="exampleModalCenter'.$row['id'].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="exampleModalLongTitle" style="color: #222">'.$row['Subject'].'</h2>
      </div>
      <div class="modal-body">
        <p style="color: #222">'.$row['Text'].'</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary Close" id="'.$row['id'].'" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>';

echo $modal;
}
                                           

echo $table;
?>
                                


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

<script>

$('.Close').click(function(){
    location.reload()
})
    
    $('.OpenNotification').click(function(){
        
        var id=$(this).attr('id');
        $.ajax({
            url:'seen.php',
            method:'POST',
            data:{id:id},
            success:function(data){
                if(data==1){
                }else{
                    alert('Error Somewhere');
                }
            }
        })
    })
</script>