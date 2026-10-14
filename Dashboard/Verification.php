<?php
session_start();

if(isset($_SESSION['User_id'])){
include('Header.php'); 
?>

<style>

.lead{
font-size: 10pt;
word-wrap: break-word;
}

* h2{
    color: #222;
}

tr > th{
    color: #222;
}

.text-oxblood{
    color: #cc0030;
}
</style>

            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-md-12">



<h3>Verification and Limit</h3>
<p class="text-oxblood">Verification helps us remove restrictions and increase transaction limits on your account. Kindly provide the required documents increase transaction limits</p>
                        
<?php 
$Verification_Status=$userDetails['V_Status'];


$sql="select * from verification order by Level asc";
$query=mysqli_query($Conn, $sql);
$count=mysqli_num_rows($query);

while($row=mysqli_fetch_array($query, MYSQLI_ASSOC)){
if($Verification_Status<$row['Level']){

$color="badge-warning";
$Status="Not Verified";
$Verify="<tr><th><center><button class='btn btn-oxblood btn-md' data-toggle='modal' data-target='#myVerificationModal".$row['Level']."'>Verify Level ".$row['Level']."</button></center></th></tr>";
}else{

$color="badge-success";
$Status="Verified";
}



$table='<div class="card">
<div class="card-title"><h2>Level '.$row['Level'].'</h2><p class="lead text-oxblood">'.$row['Requirement'].'</p></div>
<div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>

<tr><th style="color: #222">Maximum Withdrawal:<br>'.$curAbbr.number_format($row['Deposit_Limit']*$exchangerate, 2, '.',',').'</th></tr>

<tr><th style="color: #222">Maximum Deposit:<br>'.$curAbbr.number_format($row['Withdrawal_Limit']*$exchangerate, 2, '.',',').'</th></tr>

<tr><th style="color: #222">Status: <span class="badge '.$color.' ">'.$Status.'</span></th></tr>

'.$Verify.'

</tbody></table></div></div></div>';

$table.='<!-- Modal -->
<div class="modal fade" id="myVerificationModal'.$row['Level'].'" tabindex="-1" role="dialog"
 aria-labelledby="myModalLabel" aria-hidden="true">
 <div class="modal-dialog">
 <div class="modal-content">
 <div class="modal-header">

 <h4 class="modal-title" id="myModalLabel">Level 
 '.$row['Level'].' Verification
 </h4>
  <button type="button" class="close CloseModal" data-dismiss="modal"
 aria-hidden="true" id="'.$row['Level'].'">×
 </button>
 </div>
 <div class="modal-body" style="">
 <div class="form-group"><label>Requirement for upgrade: </label><br><b class="lead text-oxblood" style="font-size: 10pt">'.$row['Requirement'].'</b></div>
 <div class="form-group">';
 if($row['Controls']==2){
     $table.="<form  id='uploadImageForm".$row['Level']."' Level='".$row['Level']."' enctype='multipart/form-data'><label>Choose a file to upload</label><div class='form-group'><input type='file' class='form-control'name='VerificationImage'/></div><div class='form-group'><input type='submit' class='btn btn-oxblood' value='Upload' name='".$row['Level']."'/></div></form>";
 }else{
         $table.="
         
         
         <div class='form-group'><input type='text' id='Level".$row['Level']."' class='info form-control'/></div><div class='form-group'><button class='btn btn-oxblood Submit' id='".$row['Level']."'>Submit</button></div>";
 
 }
 
 $table.='</div>
 </div>

 </div><!-- /.modal-content -->
 </div><!-- /.modal-dialog -->
</div>';
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
header('Location:LoginContainer.php');

}

?>
<script>
    $(document).on('click', '.CloseModal', function(){
        var id=$(this).attr('id');
        $('#exampleModal'+id).modal('hide');
        location.reload();
    })
    
    	$('.Submit').click(function(){
		    var count=$(this).attr('id');
		   var info=$('#Level'+count).val();
		  $.ajax({
					url: 'insertVerificationInfo.php',
					type: 'POST',
					data: {count:count, info:info},

					success:function(response) {
						if(response== 1) {
							swal('We have received your information, Be patient while we verify the authenticity of this information');
						}
						else if(response==0){
							swal('Error Somewhere');
						}
						
					
					}

				});
		    
		})
    
     for(var i=1; i<100; i++){
            $("#uploadImageForm"+i).unbind('submit').bind('submit', function() {
	            var Level=$(this).attr('Level');
				var formData = new FormData($(this)[0]);
				formData.append('Level', Level);

				$.ajax({
					url: 'uploadVerificationImage.php',
					type: 'POST',
					data: formData,
					dataType: 'json',
					cache: false,
					contentType: false,
					processData: false,
					async: false,
					success:function(response) {
						if(response== 1) {
							swal({title:'Document uploaded !!', text:' Please wait while we verify the authenticity of this document(s)',type:'success',icon:'success', buttons:'OK'})
							.then(function(){
							    
	var Name="<?php echo $_SESSION['First_Name']; ?>";
		var SendTo="investment@vistra-holding.com";

var Subject="Verification Documents Uploaded -"+Name;
var htmlcontent= Name+" has uploaded some documents  for verification. Kindly login to Managers Desk and confirm authenticity of documents";
$.ajax({
url:'../Manager/SendMail.php',
method:'POST',
data:{SendTo:SendTo, Subject:Subject, htmlcontent:htmlcontent},
success:function(data){}
})
location.reload();
    
							})
							
							
							
							
						}else if(response==0){
							alert('Error Somewhere');
						}
					}

				});

			return false;

			});
     }
</script>