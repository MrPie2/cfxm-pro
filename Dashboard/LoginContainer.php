<!DOCTYPE html>
<html lang="en">
<?php 
include('../home/Head.php'); 
include('../Connect.php');
include('../Manager/SiteConfig.php');

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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">


    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>Login</title>
    <!-- Custom CSS -->
    <style>
    .form-group{
        margin-bottom: 20px;
    }
        
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
<?php //include('../home/TopHeader.php'); ?>

<body class="header-fix fix-sidebar"style="background: #222;color: white">
    <!-- Main wrapper  -->
    <div id="main-wrapper"style="margin-bottom: 2cm">

        <div class="unix-login">
            <div class="container-fluid">
                
                <div class="row justify-content-center">
                    <div class="col-md-4">
                                           <div style="margin-top: 1cm"> <center><h1 style="color:<?php echo $Background; ?>">Login</h1><p style="font-size: 10pt; color: white"class="lead">A platform where you can Invest your cryptocurrencies in Real Estate and other digital assets</p></center></div>

                        <div class="login-content card" style="padding: 20px; background: #333">
                            <div class="login-form">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" class="form-control Username" placeholder="Username" style="background: #fff">
                                    </div>
                                    <div class="form-group">
                                                                                <label>Password</label>

                                        <div class="row" style="background: #fff;border: 1px solid #ddd; border-radius: 5px; max-width: ; margin: 0 auto;">
                                            
                                        <div class="col-10" style="padding: 0;">
                                             <input type="password" class="form-control Password" placeholder="Password" style="border: 0; width: 100%;"/>    
                                       </div>
                                         <div class="col-2" style="padding: 0; text-align: right;"><i style="padding-top: 3px; padding-right: 10px; font-size: 20pt; color: #000"class="eye fa fa-eye Open"></i><i style="padding-top: 5px; padding-right: 10px;font-size: 20pt; color: #000" class="eye fa fa-eye-slash Close hidden"></i></div>
                                        </div>
                                    </div>
                                    <div class="form-group checkbox">
                                        <label>
        										<input type="checkbox"> Remember Me
        									</label><br>
                                        <label class="pull-right">
        										<a href="Reset_Password.php">Forgotten Password?</a>
        									</label>
        									

                                    </div>
                                    <div class="form-group"><button class="btn btn-danger " id="Login">Login</button></div>
                                    <div class="register-link m-t-15 text-center">
                                        <p>Don't have account ? <a href="SignupContainer.php"> Sign Up Here</a></p>
                                    </div>
                               
                            </div>
                        </div>
                        
                        
                        <section style="padding: 20px">
    <center>
        <h4 style="color: #fff">Select Language</h4>
        <div id="google_translate_element"></div>

<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

    </center>
</section>
                    </div>
                </div>
            </div>
        </div>

    </div>
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

</body>

</html>
<script>
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
$('#Login').click(function(e){
var Username="";
var Password="";

if($('.Username').val().trim()==""){
$('.Username').attr('placeholder',"Username Required");
$('.Username').addClass('hasError');
}else{
$('.Username').removeClass('hasError');

}

if($('.Password').val().trim()==""){
$('.Password').attr('placeholder',"Password Required");
$('.Password').addClass('hasError');
$('.col-xs-2').addClass('hasError').css({'color':'#222'});
}else{
$('.Password').removeClass('hasError');
$('.col-xs-2').removeClass('hasError').css({'color':'#eee'});

}

if($('.Username').val()!="" && $('.Password').val()!=""){
var Username=$('.Username').val();
var Password=$('.Password').val();
$.ajax({
url:'Login.php',
method:'POST',
data:{Username:Username,Password:Password},
success:function(response){
if(response==1){

swal({title: "Hi "+Username, text:"<?php echo $WelcomeNote; ?>", buttons:'My Dashboard'})

.then(function(){
window.location.href="Dashboard.php";
});

}else if(response==2){
   swal({
        title:"Sorry!", 
        text:"This Investment account is Locked.  Chat with our Support Team to guide you on how to unlock your account. We are sorry for any inconveniences", 
        icon:"error",
        buttons: "Ok",
        closeOnClickOutside: false,


   });

}else if(response==3){
    var SiteName="<?php echo $SiteName; ?>";
   swal({
        title:"Unverified Account !!", 
        text:"This Investment account has not been verified.\n \n Tip: \n Log into your mailbox, locate the verification email you received from "+SiteName+" and click the verification link to verify your account or  Chat with our Support Team to guide you on how to verify your account. \n \n We are sorry for any inconveniences", 
        icon:"error",
        buttons: "Thank You",
        closeOnClickOutside: false,


   });
 
    
}else{
swal({title:"Sorry !!", text:"Username or Password Incorrect", type:"error", icon:"error", buttons:"Try Again"});
}

}
})

}

})
    
    
</script>