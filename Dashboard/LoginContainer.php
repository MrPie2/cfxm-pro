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
    
/* Modern CFXM-PRO authentication UI */
:root{color-scheme:dark;--auth-bg:#080f1d;--auth-panel:#111c2f;--auth-border:rgba(148,163,184,.2);--auth-text:#f3f6fc;--auth-muted:#9eacc2;--auth-accent:<?php echo $Background; ?>}
html{min-height:100%;background:var(--auth-bg)}
body.header-fix.fix-sidebar{min-height:100vh!important;margin:0;background:radial-gradient(ellipse at 12% 5%,rgba(35,115,131,.24),transparent 38%),radial-gradient(ellipse at 90% 90%,rgba(<?php echo '30,90,110'; ?>,.18),transparent 38%),#080f1d!important;color:var(--auth-text)!important;font-family:Inter,ui-sans-serif,system-ui,-apple-system,"Segoe UI",sans-serif!important}
#main-wrapper{min-height:100vh;margin:0!important;padding:48px 16px 30px}
.unix-login{width:100%;padding:0}
.unix-login>.container-fluid{max-width:1180px}
.unix-login .row{align-items:center;min-height:calc(100vh - 90px)}
.unix-login .col-md-4{width:100%;max-width:460px;flex:0 1 460px}
.unix-login .col-md-4>div:first-child{margin:0 0 24px!important}
.unix-login h1{font-size:clamp(2rem,5vw,2.65rem);font-weight:800;letter-spacing:-.045em;color:#f8fafc!important;margin-bottom:10px}
.unix-login .lead{font-size:.98rem!important;line-height:1.7;color:var(--auth-muted)!important;max-width:390px;margin:0 auto}
.login-content.card{padding:clamp(22px,5vw,34px)!important;background:linear-gradient(145deg,rgba(20,33,54,.98),rgba(12,21,37,.98))!important;border:1px solid var(--auth-border);border-radius:22px;box-shadow:0 28px 80px rgba(0,0,0,.36);color:var(--auth-text)}
.login-form .form-group{margin-bottom:19px}
.login-form label{display:block;margin:0 0 8px;color:#dce5f2!important;font-size:.88rem;font-weight:600}
.login-form .form-control{min-height:49px;padding:12px 14px;background:#0b1424!important;color:#f8fafc!important;border:1px solid #2b3b53!important;border-radius:10px!important;box-shadow:none!important;font-size:.95rem}
.login-form .form-control::placeholder{color:#74839a}
.login-form .form-control:focus{border-color:<?php echo $Background; ?>!important;box-shadow:0 0 0 3px rgba(<?php echo '50,160,150'; ?>,.15)!important;outline:0}
.login-form .row[style*="background: #fff"]{min-height:49px;align-items:center;background:#0b1424!important;border:1px solid #2b3b53!important;border-radius:10px!important;overflow:hidden}
.login-form .row[style*="background: #fff"] .form-control{min-height:47px;background:transparent!important}
.login-form .eye{display:inline-block;padding:0 12px!important;color:#aab8cc!important;font-size:16px!important;cursor:pointer}
.login-form .checkbox{display:flex;justify-content:space-between;align-items:center;gap:12px;flex-wrap:wrap}
.login-form .checkbox label{display:inline-flex;align-items:center;gap:7px;margin:0;font-weight:500;color:var(--auth-muted)!important}
.login-form input[type="checkbox"]{accent-color:<?php echo $Background; ?>}
.login-form a,.register-link a{color:#7dd3c7;text-decoration:none;font-weight:600}
.login-form a:hover,.register-link a:hover{color:#b2fff2;text-decoration:underline}
.login-form #Login{width:100%;min-height:50px;border:0;border-radius:11px;background:<?php echo $Background; ?>;color:#fff;font-weight:750;font-size:1rem;letter-spacing:.01em;box-shadow:0 10px 24px rgba(0,0,0,.2);transition:transform .2s ease,filter .2s ease}
.login-form #Login:hover{filter:brightness(1.12);transform:translateY(-1px)}
.login-form #Login:focus-visible,.login-form a:focus-visible{outline:3px solid #7dd3c7;outline-offset:3px}
.register-link{margin-top:22px!important;color:var(--auth-muted)}
.register-link p{margin:0;color:var(--auth-muted)!important;font-size:.9rem}
#google_translate_element{margin-top:10px}
#google_translate_element select{max-width:100%;padding:8px;border-radius:8px}
.hasError{border-color:#fb7185!important;box-shadow:0 0 0 3px rgba(251,113,133,.12)!important}
@media(max-width:575px){#main-wrapper{padding:28px 14px 20px}.unix-login .row{min-height:auto}.login-content.card{border-radius:17px}.unix-login .lead{font-size:.9rem!important}}
@media(prefers-reduced-motion:reduce){.login-form #Login{transition:none}}

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