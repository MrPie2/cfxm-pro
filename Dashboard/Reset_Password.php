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
    </style>
</head>
<?php include('../home/Header.php'); ?>

<body class="header-fix fix-sidebar" style="background-image: url(https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTSh3d7gyPUBfEBqAUMvIz8UDw1FSdUG4IEKOMrv0uDT6r6IsudVfMSDFh84VRBTWVzF8U&usqp=CAU); background-size: cover; backgroun-repeat: no-repeat">
    <!-- Main wrapper  -->
    <div id="main-wrapper" style="height: 100vh; background: rgba(255,255,255, 0.9);">

            <div class="container-fluid">
                
                <div class="row justify-content-center">
                    <div class="col-md-12">
                                           <div style="margin-top: 1cm"> <center><h1 style="color:<?php echo $Background; ?>">Reset Password Request</h1><p style="font-size: 10pt"class="text-muted lead">Don't remember your password, kindly provide your registered email address so we can help you reset your password</p></center></div>

                        <div class="login-content card" style="padding: 20px">
                            <div class="login-form">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" class="form-control Email" placeholder="Email" style="background: #fff">
                                    </div><br>
                                
                                  
                                    <div class="form-group"><button class="btn btn-success btn-flat m-b-30 m-t-30" id="SendPasswordLink">Continue</button></div>
                              
                               
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

$('#SendPasswordLink').click(function(e){
var Email="";

if($('.Email').val().trim()==""){
$('.Email').attr('placeholder',"Email Required");
$('.Email').addClass('hasError');
}else{
$('.Email').removeClass('hasError');

}



if($('.Email').val()!=""){
var SendTo=$('.Email').val().trim()
var Subject="Password Reset - Trafford Holding";
var ActivateAccount="<a href='https://www.trafford-holding.com/Dashboard/Change_Password.php?Email="+SendTo+"' style='padding: 20px; background: #2f6094; color: white; text-decoration: none'>Reset Password Link</a>";
var htmlcontent="You have requested Trafford Holding to carry out a password reset on your account.  <br><br>"+ ActivateAccount+" <br><br> Kindly ignore this message if you did not make this request or Chat with our support team to notify them of this activity to futher secure your account<br><br>Best Regards";
$.ajax({
url:'../Manager/SendMail.php',
method:'POST',
data:{SendTo:SendTo, Subject:Subject, htmlcontent:htmlcontent},
success:function(response){
if(response==1){

swal({title: "Congrats", text:"A password reset link has been sent to your registered email address. Kindly follow the link to reset your password", icon:"success", buttons:'Ok Got it'})

}else{
  swal({title: "Sorry", text:"We could not find this email has not been used to register an account on this platform", buttons:'Ok Got it'})  
}

}
})

}

})
    
    
</script>