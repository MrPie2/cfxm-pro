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
                 <h1>User Profile</h1>       
<div class="card">
<?php 

$sql="select * from investors where Investor_id='$Investor_id'  ";
$query=mysqli_query($Conn, $sql);
$count=mysqli_num_rows($query);

$table='<div class="card-body">';

if($count>0){
                            
while($row=mysqli_fetch_array($query, MYSQLI_ASSOC)){
if($row['Profile_Picture']==""){
                             $Pics= '../BlankFace.png';
                             
                         }else{
                                 $Pics=$row['Profile_Picture'];
                         }
$table.="<div class='form-group' align='center'><img class='thumbnail img-circle' style='width: 100px; height: 100px; border-radius: 50%' src='".$Pics."'/><br>
<a href='#' style='font-size: 18pt; color: white; position: absolute; margin-top: -30px; margin-right: -80px; z-inded: 999'class=' ShowPhotoCont'><span class='fa fa-camera'></a><br>

<form  id='uploadImageForm' class='hidden updatePhotoContainer' enctype='multipart/form-data'>
<div class='form-group'>
    <input type='file' class='form-control' id='field-upload' name='userImage' required/>
</div>

<div class='form-group'>
<input type='submit' class='updatePhoto btn btn-oxblood' value='Update Profile Picture'/></div>

</form>

</div>
<div class='form-group'><label>User ID</label><input type='text' class='form-control' value='".$row['Investor_id']."' disabled></div>
<div class='form-group'><label>Userename</label><input type='text' class='form-control' value='".$row['Username']."' disabled></div>
<div class='form-group'><label>Email</label><input type='text' class='form-control NewEmail' placeholder='Email' value='".$row['Email']."' disabled><button class='float-right EditEmail btn btn-oxblood btn-sm'><i class='glyphicon glyphicon-pencil'></i> Edit</button></div>
<div class='form-group'><label>Full Name</label><input type='text' class='form-control FullName' value='".$row['First_Name']."' placeholder='Full Name' disabled> <button class='float-right EditName btn btn-oxblood btn-sm'><i class='glyphicon glyphicon-pencil'></i> Edit</button></div>
<div class='form-group'><label>Country</label><input type='text' class='form-control' value='".$row['Nationality']."' disabled></div>
<div class='form-group'><label>Phone Number</label><input type='text' class='form-control PhoneNumber' value='".$row['Phone']."' placeholder='Phone Number' disabled> <button class='float-right btn btn-oxblood btn-sm EditPhone'><i class='glyphicon glyphicon-pencil'></i> Edit</button></div>
";

}
                                           
                

}else{
$table.="<h4>You have not made any deposits</h4>";
}

echo $table;
?>

<section>
<label>Preferred Currency</label>
<h4><?php echo $curName." (".$curAbbr.")"; ?></h4>


<?php
$endpoint = 'live';

$access_key='adcaa3367f477f56b36dc33c';

$ch=curl_init('https://v6.exchangerate-api.com/v6/adcaa3367f477f56b36dc33c/latest/USD');

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 

$json = curl_exec($ch); 
curl_close($ch); 
 $exchangeRates = json_decode($json, true); 


echo '<select class="currency form-control">

<option>Prefered Currency</option>

<option abbr="NGN" value="'.$exchangeRates['conversion_rates']['NGN'].'">Nigerian Naira</option>

<option abbr="BWP" value="'.round($exchangeRates['conversion_rates']['BWP']).'">Botswana Pula</option>

<option abbr="GHS" value="'.round($exchangeRates['conversion_rates']['GHS']).'">Ghana Cedi</option>

<option abbr="GBP" value="'.round($exchangeRates['conversion_rates']['GBP']).'">British Pounds</option>

<option abbr="TRY" value="'.round($exchangeRates['conversion_rates']['TRY']).'">Turkish Lira</option>
<option abbr="USD" value="'.round($exchangeRates['conversion_rates']['USD']).'">United State Dollar</option>

</select>';
?>


</section>   <br><br>

<div align="center" class="form-group"><button class="btn btn-oxblood btn-lg Update">Update</button></div>
                               
                               
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

<script>
$('.EditPhone').click(function(){
  $('.PhoneNumber').prop('disabled', '').val("").focus();
  
})

$('.EditEmail').click(function(){
  $('.NewEmail').prop('disabled', '').val("").focus();
  
})

$('.EditName').click(function(){
  $('.FullName').prop('disabled', '').val("").focus();
  
})

$('.Update').click(function(){
    var FullName=$('.FullName').val();
    var NewEmail=$('.NewEmail').val();
    var PhoneNumber=$('.PhoneNumber').val();
    $.ajax({
        url:'updateuser.php',
        method:'POST',
        data:{FullName:FullName,NewEmail:NewEmail,PhoneNumber:PhoneNumber},
        success:function(data){
           if(data==1){
  swal({text:"Details updated successfully", type:"success",icon:"success", buttons:"OK"})
               .then(function(){
                   location.reload();
               })           }else{
               alert("Error Somewhere"+data);
           }
        }
    })


})

$('.currency').change(function(){

var currency=$(this).val();
var curName=$('.currency option:selected').text();
var curAbbr=$('.currency option:selected').attr('abbr');
$.ajax({

url:'updateCurrency.php',
method:'POST',
data:{currency:currency,curName:curName, curAbbr:curAbbr},
success:function(data){
if(data==1){
location.reload();
}else{
alert('error');
}

}
})

})


$('.ShowPhotoCont').click(function(){
$('.updatePhotoContainer').toggleClass('hidden');

})

$("#uploadImageForm").unbind('submit').bind('submit', function() {

				var form = $(this);
				var formData = new FormData($(this)[0]);

				$.ajax({
					url: 'uploadImage.php',
					type: 'POST',
					data: formData,
					dataType: 'json',
					cache: false,
					contentType: false,
					processData: false,
					async: false,
					success:function(response) {
						if(response== 1) {
							swal({type:'success', icon:'success',text:'Display Picture Updated', buttons:'OK'})
							.then(function(){
							    location.reload();
							})

						}
						else if(response==0){
							alert('Error Somewhere');
						}
					}

				});
return false;
	
			});

</script>