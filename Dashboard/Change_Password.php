<!DOCTYPE html>
<html lang="en">
<?php 
include('../home/Head.php'); 
include('../Connect.php');

$sql="select * from welcomenote";
$query=mysqli_query($Conn, $sql);
$row=mysqli_fetch_array($query, MYSQLI_ASSOC);
$WelcomeNote=$row['note'];

?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>Login</title>
    <!-- Custom CSS -->
    <style>
        
        * label{
            color: <?php echo $Background; ?>;
        }
          .btn-oxblood{
        color: white;
        background:  <?php echo $Background; ?>;
        text-decoration: none;
        
    }
    .hidden{
        display: none;
    }
    </style>
</head>
<?php include('../home/Header.php'); ?>

<body class="header-fix fix-sidebar" style="background-image: url(https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTSh3d7gyPUBfEBqAUMvIz8UDw1FSdUG4IEKOMrv0uDT6r6IsudVfMSDFh84VRBTWVzF8U&usqp=CAU); background-size: cover; backgroun-repeat: no-repeat">
    <!-- Main wrapper  -->
    <div id="main-wrapper" style="height: 100vh; background: rgba(255,255,255, 0.9);">

            <div class="container-fluid">
                
                <div class="row justify-content-center">
                    <div class="col-md-12">
                                           <div style="margin-top: 3cm"> <center><h1 style="color:<?php echo $Background; ?>">Reset Password</h1></center></div>

                        <div class="login-content card" style="padding: 20px">
                            <div class="login-form">
                                 <div class="form-group">
                                                                                <label> Password</label>

                                        <div class="row" style="background: #fff;border: 1px solid #ddd; border-radius: 5px; max-width: ; margin: 0 auto;">
                                            
                                        <div class="col-10" style="padding: 0;">
                                             <input type="password" class="form-control Password" placeholder="Password" style="border: 0; width: 100%;"/>    
                                       </div>
                                         <div class="col-2" style="padding: 0; text-align: right;"><i style="padding-top: 3px; padding-right: 10px; font-size: 20pt; color: #000"class="eye fa fa-eye Open"></i><i style="padding-top: 5px; padding-right: 10px;font-size: 20pt; color: #000" class="eye fa fa-eye-slash Close hidden"></i></div>
                                        </div>
                                    </div>
                                 
                                    <div class="form-group">
                                                                                <label>Confirm Password</label>

                                        <div class="row" style="background: #fff;border: 1px solid #ddd; border-radius: 5px; max-width: ; margin: 0 auto;">
                                            
                                        <div class="col-10" style="padding: 0;">
                                             <input type="password" class="form-control Password1" placeholder="Confirm Password" style="border: 0; width: 100%;"/>    
                                       </div>
                                         <div class="col-2" style="padding: 0; text-align: right;"><i style="padding-top: 3px; padding-right: 10px; font-size: 20pt; color: #000"class="eye1 fa fa-eye Open1"></i><i style="padding-top: 5px; padding-right: 10px;font-size: 20pt; color: #000" class="eye1 fa fa-eye-slash Close1 hidden"></i></div>
                                        </div>
                                    </div><br>
                                    
                                         
                                 
                                    <div class="form-group"><button class="btn btn-success btn-flat m-b-30 m-t-30" id="Confirm">Confirm</button></div>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
       

    </div>
    </body>
    <!-- End Wrapper -->
<?php include('Footer.php'); ?>
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
<script src="myScript.js"></script>



</html>
<script>
$('.Open1').click(function(){
    $('.Password1').attr('type','text');
    $(this).addClass('hidden');
    $('.Close1').removeClass('hidden')
})
$('.Open').click(function(){
    $('.Password').attr('type','text');
    $(this).addClass('hidden');
    $('.Close').removeClass('hidden')
})

$('.Close').click(function(){
    $('.Password').attr('type','password');
    $(this).addClass('hidden');
    $('.Open').removeClass('hidden')
})

$('.Close1').click(function(){
    $('.Password1').attr('type','password');
    $(this).addClass('hidden');
    $('.Open1').removeClass('hidden')
})
$('#Confirm').click(function(e){
var Password="";
var Email="<?php echo $_GET['Email']; ?>";


if($('.Password').val().trim()==""){
$('.Password').attr('placeholder',"Password Required");
$('.Password').addClass('hasError');
$('.col-xs-2').addClass('hasError').css({'color':'#222'});
}else{
$('.Password').removeClass('hasError');
$('.col-xs-2').removeClass('hasError').css({'color':'#eee'});

}

if($('.Password1').val().trim()==""){
$('.Password1').attr('placeholder',"Confirm Password Required");
$('.Password1').addClass('hasError');
$('.col-xs-2').addClass('hasError').css({'color':'#222'});
}else{
$('.Password1').removeClass('hasError');
$('.col-xs-2').removeClass('hasError').css({'color':'#eee'});

}

if($('.Password1').val()==$('.Password').val()!=""){
var Password=$('.Password').val();
$.ajax({
url:'ResetPasswordServer.php',
method:'POST',
data:{Password:Password, Email:Email},
success:function(response){
if(response==1){

swal({title: "Congratulations !!", text:"Your password has been reset successfully. You can now proceed to login your account", buttons:'Login Now'})

.then(function(){
window.location.href="LoginContainer.php";
});

}else{
swal({title:"Sorry !!", text:"We could not reset your password at the moment", type:"error", icon:"error", buttons:"Try Again"});
}

}
})

}else{
  swal({title:"Sorry !!", text:"Passwords does not match", type:"error", icon:"error", buttons:"Try Again"});  
}

})
    
    
</script>