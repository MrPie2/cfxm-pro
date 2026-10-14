<?php
session_start();
 
if(isset($_SESSION['User_id'])){
include('Header.php');
?>


<style>

.hidden{
display: none;
}
</style>
            
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-12">

<div class="card">
<div class="card-title"><h4>Deposit/Payment</h4></div>
<p class="text-oxblood lead" style="font-size: 10pt"> Below are the company's addresses copy and make payment into any of the addresses below using our Affiliate Exchange Platforms or References and your account will be credited right away</p>

<p class="text-danger lead" style="font-size: 10pt"> Also make sure to upload payment proof after you have successfully made payment</p>

<?php 

$sql="select * from walletaddress";
$query=mysqli_query($Conn, $sql);


$table='<div class="card-body">
<div class="table-responsive">
<table class="table table-striped">
<tbody>';
$sn=0;
while($row=mysqli_fetch_array($query, MYSQLI_ASSOC)){
$sn++;

$table.='<tr><th style="color: #222">'.$row['Wallet_Type'].'</th></tr>
<tr><th style="word-wrap: break-word; color: #222">'.$row['WalletAddress'].'</th></tr>';

if($row['Network']==""){
}else{
$table.="<tr><th style=' color: #222'>Network: ".$row['Network']."</th></tr>";

}
$table.='<tr><th><button class="btn btn-oxblood btn-sm" id="copy_address" address="'.$row['WalletAddress'].'">Copy Address</button></th>    
                                            </tr>';
}
    
$table.='</tbody></table></div>';

echo $table;
?>
                            </div>
</div>
                   


<section>

<div class="card">
<div class="card-body">
<div class="form-group">
<button class="btn btn-danger  ShowExchanges">Deposit Now</button></div>

<div class="form-group"><p class="text-danger lead" style="font-size: 10pt">Deposit now using our Affiliate Exchange(s) or References</p></div>
</div>


</div>

</section>
     <div class="card hidden Exchange">
                            <div class="card-title">
                                <h4>Our Affiliate Exchange</h4>
     </div>
<?php 

$sql="select * from exchange";
$query=mysqli_query($Conn, $sql);


$table='<div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                       
                                        <tbody>';
$sn=0;
while($row=mysqli_fetch_array($query, MYSQLI_ASSOC)){
$sn++;

$table.='<tr>
                                                <th scope="row"><p class="text-oxblood">'.$sn.'</p></th>
<td class="text-oxblood">'.$row['Name'].'</td>
                                                <td><a class="btn btn-oxblood btn-sm" href="https://'.$row['url'].'">Deposit</a></td></tr>';

}
                                           
                             $table.='</tbody></table></div>';

echo $table;
?>
                      
                            </div>
                        </div>


<section>
 <div class="card"><div class="card-title"><h4 class="text-oxblood">Upload Payment Proof</h4> </div><p class="text-oxblood lead" style="font-size: 10pt">Upload payment proof of your deposit, so we can verify and credit your account accordingly</p>
<div class="card-body"><form id="uploadImageForm">
       <div class="form-group"><input type="file" name="ProofImage" class="form-control" required/>
</div>
<div class="form-group"><input type="submit" class="btn btn-oxblood btn-md"/></div>
   </form> </div></div>
</section>
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

<script>

$("#uploadImageForm").unbind('submit').bind('submit', function() {

				var form = $(this);
				var formData = new FormData($(this)[0]);

				$.ajax({
					url: 'uploadProof.php',
					type: 'POST',
					data: formData,
					dataType: 'json',
					cache: false,
					contentType: false,
					processData: false,
					async: false,
					success:function(response) {
						if(response== 1) {
					swal({text:"Upload Successful. Be patient while we verify your deposit", icon:"success", type:"success", buttons:"Ok"})
.then(function(){
    location.reload();
})

						}else if(response==0){
							alert('Error Somewhere');
						}
					}

				});
return false;

			});



$('.ShowExchanges').click(function(){
$('.Exchange').toggleClass('hidden');
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


$(document).on('click','#copy_address', function(){
var address=$(this).attr('address');
copyToClipboard(address);
 toastr.success('Wallet Address Copied',
'Successful',{ timeOut: 5000, "closeButton": true, "debug": false, "newestOnTop": true, "progressBar": true, "positionClass": "toast-top-right", "preventDuplicates": true, "onclick": null, "showDuration": "300", "hideDuration": "1000", "extendedTimeOut": "1000", "showEasing": "swing", "hideEasing": "linear", "showMethod": "fadeIn", "hideMethod": "fadeOut", "tapToDismiss": false });
        })


</script>

</body>

</html>

<?php
}else{
header('Location:LoginContainer.php');

}

?>


<script src="js/lib/toastr/toastr.min.js"></script>
    <!-- scripit init-->
    <script src="js/lib/toastr/toastr.init.js"></script>