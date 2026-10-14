<!DOCTYPE html>
<html lang="en">
<?php 
include('../Connect.php');
include('../home/Header.php'); 
include('../Manager/SiteConfig.php'); 
?>




<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../home/favicon.png">
    <title>Signup</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<link href="css/lib/sweetalert/sweetalert.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<style>

.inactive{
display: none;
}

fieldset{

border: 0px;

}
.hasError{

border: 1px solid #f00;
background  #f0f;
}
  .form-group{
        margin-bottom: 20px;
    }

/* Modern CFXM-PRO authentication UI */
:root{color-scheme:dark;--auth-bg:#080f1d;--auth-panel:#111c2f;--auth-border:rgba(148,163,184,.2);--auth-text:#f3f6fc;--auth-muted:#9eacc2}
html{min-height:100%;background:var(--auth-bg)}
body.header-fix.fix-sidebar{min-height:100vh!important;margin:0;background:radial-gradient(ellipse at 10% 5%,rgba(35,115,131,.24),transparent 38%),radial-gradient(ellipse at 90% 90%,rgba(30,90,110,.18),transparent 38%),#080f1d!important;color:var(--auth-text)!important;font-family:Inter,ui-sans-serif,system-ui,-apple-system,"Segoe UI",sans-serif!important}
#main-wrapper{min-height:100vh;padding:42px 16px 30px}
#main-wrapper>.unix-login{width:100%}
#main-wrapper>.unix-login>.container-fluid{max-width:920px}
#main-wrapper>.unix-login .row{justify-content:center}
#main-wrapper>.unix-login .col-md-12{width:100%;max-width:680px;flex:0 1 680px}
#main-wrapper>.unix-login .col-md-12>div:first-child{margin:0 0 24px!important}
#main-wrapper h1{font-size:clamp(2rem,5vw,2.65rem);font-weight:800;letter-spacing:-.045em;color:#f8fafc!important;margin-bottom:10px}
#main-wrapper .lead{font-size:.98rem!important;line-height:1.7;color:var(--auth-muted)!important;max-width:460px;margin:0 auto}
.login-content.card{padding:clamp(22px,5vw,36px)!important;background:linear-gradient(145deg,rgba(20,33,54,.98),rgba(12,21,37,.98))!important;border:1px solid var(--auth-border);border-radius:22px;box-shadow:0 28px 80px rgba(0,0,0,.36);color:var(--auth-text)}
.login-form .form-group{margin-bottom:19px}
.login-form label{display:block;margin:0 0 8px;color:#dce5f2!important;font-size:.88rem;font-weight:600}
.login-form .form-control{width:100%;min-height:49px;padding:12px 14px;background:#0b1424!important;color:#f8fafc!important;border:1px solid #2b3b53!important;border-radius:10px!important;box-shadow:none!important;font-size:.95rem}
.login-form .form-control::placeholder{color:#74839a}
.login-form .form-control:focus{border-color:<?php echo $Background; ?>!important;box-shadow:0 0 0 3px rgba(50,160,150,.15)!important;outline:0}
.login-form select.form-control{appearance:auto}
.login-form select option{background:#111c2f;color:#f8fafc}
.login-form .btn{display:inline-flex;justify-content:center;align-items:center;min-height:48px;padding:12px 22px;border:0;border-radius:10px;font-weight:750;transition:transform .2s ease,filter .2s ease}
.login-form .btn:hover{filter:brightness(1.1);transform:translateY(-1px)}
.login-form .Verify,.login-form .Submit,.login-form .Next2{width:100%;background:<?php echo $Background; ?>!important;color:#fff!important}
.login-form .Next2{margin-top:4px}
.login-form .Verify{margin-top:3px}
.login-form fieldset{min-width:0;margin:0;padding:0;border:0}
.login-form .inactive{display:none!important}
.login-form .verifyAgentReport p,.login-form .verifyAgentReport{color:var(--auth-muted)!important;font-size:.9rem;line-height:1.6}
.login-form .register-link{margin-top:24px!important;text-align:center}
.login-form .register-link p{margin:0;color:var(--auth-muted)!important;font-size:.9rem}
.login-form .register-link a{color:#7dd3c7;text-decoration:none;font-weight:700}
.login-form .register-link a:hover{color:#b2fff2;text-decoration:underline}
.login-form .hasError,.hasError{border-color:#fb7185!important;box-shadow:0 0 0 3px rgba(251,113,133,.12)!important}
.login-form .Status{max-width:100%}
#google_translate_element{margin-top:10px}
#google_translate_element select{max-width:100%;padding:8px;border-radius:8px}
@media(max-width:575px){#main-wrapper{padding:26px 12px 20px}#main-wrapper>.unix-login .col-md-12{padding:0 4px}.login-content.card{border-radius:17px}.login-form .btn{width:100%}#main-wrapper .lead{font-size:.9rem!important}}
@media(prefers-reduced-motion:reduce){.login-form .btn{transition:none}}

</style>
</head>
<?php //include('../home/TopHeader.php'); ?>

<body class="header-fix fix-sidebar" style="background: #222; color: #000">

    <!-- Main wrapper  -->
    <!-- Main wrapper  -->
    <div id="main-wrapper">
<div class="navbar-header">
              
            </div>
        <div class="unix-login">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div style="margin-top: 1cm"> <center><h1 style="color:<?php echo $Background; ?>">Create Account</h1><p style="font-size: 10pt; color: #fff"class=" lead">A platform where you can Invest your cryptocurrencies in Real Estate and other digital assets</p></center></div>
                        <div class="login-content card" style="padding: 20px; background: #333">
                            <div class="login-form">
<div  class="Status" data-form-title="Form Name">
				
	

<?php if(!$_GET['Ref_id']){
    $Ref_id=$_GET['Ref_id'];
echo'
<fieldset class="SpecityAgent">

<div data-for="Agent_id" class="form-group label-floating is-empty">
                         
<input type="text" name="Agent_id" placeholder="Your Agents ID" data-form-field="Agent_id" class="form-control Agent_id input--squared input--dark" value="" id=" input-lg">
					
                        </div>
						<div class="verifyAgentReport form-group ">
						<p style="color: #fff">This ID will be disclosed to you by your Agent, refer to him/her for this ID</p></div>
						
<div class="form-group label-floating is-empty" align="center">
						<button class="Verify btn btn-success btn-green btn--with-icon btn--icon-right full-width">Verify Agent</button></div></fieldset>


                        <fieldset class="LoginInfo inactive">
                        <div data-for="First_Name" class="form-group label-floating is-empty"><label>Full Name</label>
                            <input type="text" name="First_Name" placeholder="Full Name" data-form-field="First_Name" class="form-control input--squared input--dark First_Name" value="" id=" phone-form7-1g">
                        </div>
                        <div class=" form-group label-floating is-empty" data-for="name"><label>Username</label>
                            <input type="text" name="Username" placeholder=" Username"  class="form-control Username input--squared input--dark"  id="Username1">
                        </div>
						
						  
                        <div class=" form-group label-floating is-empty" data-for="email"><label>Email</label>
                            <input type="email" name="email" placeholder="Email" data-form-field="email" class="input--squared input--dark form-control Email" value="" id=" email-form7-1g">
                        </div>
                         <div data-for="phone" class="form-group label-floating is-empty"><label>Phone</label>
                            <input type="text" name="phone" placeholder="Phone" data-form-field="phone" class="input--squared input--dark Phone form-control" value="" id="phone-form7-1g">
                        </div>
                        
						 <div data-for="Country" class="form-group"><label>Country</label>
                           <select style="width: 100%"class="woox--select woox--select--dark SelectCountry form-control" data-minimum-results-for-search="Infinity" data-dropdown-css-class="woox--select--dark-dropdown"></select>
                        </div>
						
					<div class=" form-group label-floating is-empty" data-for="name">

                            <label>Password</label>
                            <input type="password" name="Password" placeholder="Password" class="form-control Password input--squared input--dark" id="Password1">
                        </div>
						
						<div class=" form-group label-floating is-empty" data-for="name">

                            <label>Confirm Password</label>
                            <input type="password" name="Confirm_Password" placeholder="Confirm Password" class="form-control Confirm_Password input--squared input--dark" id="Confirm_Password1">
                        </div>
						
                       
						<div class="form-group" align="center"><button class="Submit btn btn-lg btn-success">Submit</button></div>
</fieldset>

'; }else{

$sql="select Relation from investors where Investor_id='.$Ref_id.'";
$query=mysqli_query($Conn, $sql);
$row=mysqli_fetch_array($query, MYSQLI_ASSOC);
$Relation=$row['Relation'];

$sql0="select * from agent where id='$Relation'";
$query0=mysqli_query($Conn, $sql0);
$row0=mysqli_fetch_array($query0, MYSQLI_ASSOC);

$Agent_id=$row0['Agent_id'];
echo '<fieldset class="LoginInfo">
                        <div class=" form-group label-floating is-empty" data-for="name"><label>Username</label>
                            <input type="text" name="Username" placeholder=" Username"  class="form-control Username input--squared input--dark"  id="Username1">
                        </div>
						
						  <div class=" form-group label-floating is-empty" data-for="name">

<label>Password</label>
                            <input type="password" name="Password" placeholder="Password" class="form-control Password input--squared input--dark" id="Password1">
                        </div>
						
						
                        <div class=" form-group label-floating is-empty" data-for="email"><label>Email</label>
                            <input type="email" name="email" placeholder="Email" data-form-field="email" class="input--squared input--dark form-control Email" value="" id=" email-form7-1g">
                        </div>
                        <div data-for="First_Name" class="form-group label-floating is-empty"><label>Full Name</label>
                            <input type="text" name="First_Name" placeholder="Full Name" data-form-field="First_Name" class="form-control input--squared input--dark First_Name" value="" id=" phone-form7-1g">
                        </div>
						
						 <div data-for="Country" class="form-group"><label>Country</label>
                           <select style="width: 100%"class="woox--select woox--select--dark SelectCountry form-control" data-minimum-results-for-search="Infinity" data-dropdown-css-class="woox--select--dark-dropdown"></select>
                        </div>
						
					
						
                        <div data-for="phone" class="form-group label-floating is-empty"><label>Phone</label>
                            <input type="text" name="phone" placeholder="Phone" data-form-field="phone" class="input--squared input--dark Phone form-control" value="" id="phone-form7-1g">
                        </div>
						<div class="form-group" align="center"><button class="Submit btn btn-lg btn-success">Submit</button></div>
                        
						<div class="form-group" align="center"><button class="Next2 btn btn-lg btn-primary">Next</button></div>
</fieldset>';
}

?>
<fieldset class="PersonalInfo inactive">
						 <div data-for="First_Name" class="form-group label-floating is-empty"><label>Full Name</label>
                            <input type="text" name="First_Name" placeholder="Full Name" data-form-field="First_Name" class="form-control input--squared input--dark First_Name" value="" id=" phone-form7-1g">
                        </div>
						
						 <div data-for="Country" class="form-group"><label>Country</label>
                           <select style="width: 100%"class="woox--select woox--select--dark SelectCountry form-control" data-minimum-results-for-search="Infinity" data-dropdown-css-class="woox--select--dark-dropdown"></select>
                        </div>
						
					
						
                        <div data-for="phone" class="form-group label-floating is-empty"><label>Phone</label>
                            <input type="text" name="phone" placeholder="Phone" data-form-field="phone" class="input--squared input--dark Phone form-control" value="" id="phone-form7-1g">
                        </div>
						<div class="form-group" align="center"><button class="Submit btn btn-lg btn-success">Submit</button></div>
</fieldset>      
                                    <div class="register-link m-t-15 text-center">
                                        <p style="color: #fff">Already have account ? <a href="LoginContainer.php"> Sign in</a></p>
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
        </div></br></br>

<?php include('Footer.php'); ?>

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
<script>

$('.Verify').click(function(){
	if($('.Agent_id').val().trim()==""){
		var possesive="'";
		$('.Agent_id').attr('placeholder', 'Provide your Agent'+possesive+'s ID');
		$('.Agent_id').addClass('hasError');
	}else{
		var Agent_id=$('.Agent_id').val();
	$('.Agent_id').removeClass('hasError');
	$.ajax({
		url:'verifyAgent.php',
		method:'POST',
		data:{Agent_id:Agent_id},
		success:function(data){
			$('.verifyAgentReport').html(data);
		}

	})
	}



})



$('.Next2').click(function(){
	if($('#Username1').val().trim()==""){
		$('#Username1').attr('placeholder', 'Username Required');
		$('#Username1').addClass('hasError');
	}else{
	$('#Username1').removeClass('hasError');
	}
	
if($('#Password1').val().trim()==""){
		$('#Password1').attr('placeholder', 'Password Required');
		$('#Password1').addClass('hasError');
	}else{
	$('#Password1').removeClass('hasError');
	}	
	if($('.Email').val().trim()==""){
		$('.Email').attr('placeholder', 'Email Required');
		$('.Email').addClass('hasError');
	}else{
	$('.Email').removeClass('hasError');
	}
	
	
	if($('#Username1').val().trim()!="" && $('#Password1').val().trim()!="" && $('.Email').val().trim()!=""){
			$('.LoginInfo').addClass('inactive');
			$('.PersonalInfo').removeClass('inactive');

	}
})

$('.Submit').click(function(){

if($('.Phone').val().trim()==""){
		$('.Phone').attr('placeholder', 'Phone Required').focus();
		$('.Phone').addClass('hasError');
	}else{
	$('.Phone').removeClass('hasError');
}

if($('.First_Name').val().trim()==""){
		$('.First_Name').attr('placeholder', 'Full Name Required').focus();
		$('.First_Name').addClass('hasError');
	}else{

	$('#Firt_Name').removeClass('hasError');
}

if($('.First_Name').val().trim()!="" && $('.Phone').val().trim()!=""){
var Country=$('.SelectCountry').find('option:selected').val();
var Username=$('#Username1').val();
var Password=$('#Password1').val();
var First_Name=$('.First_Name').val();
var Email=$('.Email').val();
var Phone=$('.Phone').val();

if("<?php echo !$_GET['Ref_id']; ?>"){
var Agent_id=$('.Agent_id').val();
if(Agent_id==""){
	$('Agent_id').attr('placeholder','Specify your Agent');
	$('Agent_id').addClass('hasError');
}
}else{
var Agent_id="<?php echo $Agent_id ?>";
var Ref_id="<?php echo $_GET['Ref_id']; ?>";
}


$.ajax({
url:'signupServer.php',
method:'POST',
data:{Ref_id:Ref_id, Country:Country, Agent_id:Agent_id, Username:Username, Password:Password, First_Name:First_Name, Email:Email,Phone:Phone},
beforeSend:function(){
    $('.Submit').html('Creating your Account...').prop('disabled', true);
},
success:function(response){
if(response==1){
swal({icon:'success',title:'Congratulation!', text:'Your account has been created successfully. A verification link has been sent to your registered email address please click the link to verify your account', type:'success'})
.then(function(){

window.location.href="LoginContainer.php";
});
var SendTo=$('.Email').val().trim()
var Subject="Welcome to Capitalfx Market Pro";
var Username=$('#Username1').val();
var background="<?php echo $Background ?>";
var ActivateAccount="<a href='https://www.cfxm-pro.com/Dashboard/AccountActivation.php?Email="+SendTo+"&&Username="+Username+"' style='padding: 20px; background: "+background+"; color: white; text-decoration: none'>Activate Account</a>";
var htmlcontent="Thank you for joining Capitalfx Market Pro, Your investment account has been created successfully. Click the link below to activate your account.  <br><br>"+ ActivateAccount+" <br><br> After your account has been activated, proceed to make a deposit to your account and start earning right away";

$.ajax({
url:'../Manager/SendMail.php',
method:'POST',
data:{SendTo:SendTo, Subject:Subject, htmlcontent:htmlcontent},
success:function(data){}
})



}else{
swal("Ooops!", "We could not create your account at the moment", "error");
}
}

})

}
})
</script>

<script>
        $.ajax({
        url:'countries.json',
        method:'GET',
        success:function(data){
        for(var i in data){
        
        $('.SelectCountry').append('<option class="Country" value='+data[i].name+'>'+data[i].name+'</option>');
        }
         
        }
        })
        
    </script>