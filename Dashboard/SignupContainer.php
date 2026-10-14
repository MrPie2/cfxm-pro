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