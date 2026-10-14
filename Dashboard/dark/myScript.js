
$('.Signup').click(function(){
	window.location.href="Signup.php";
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
}else{
$('.Password').removeClass('hasError');
}

if($('.Username').val()!="" || $('.Password').val()!=""){
var Username=$('.Username').val();
var Password=$('.Password').val();
$.ajax({
url:'../../../Login.php',
method:'POST',
data:{Username:Username,Password:Password},
success:function(response){
if(response==1){
    SettleDueInvestments();
    
    function SettleDueInvestments(){
        
        $.ajax({
            url:'SettleDueInvestments.php',
            method:'POST',
            data:{},
            success:function(data){
                if(data==1){
                    swal({title:"Congratulation",
                    text:"Your Investment has been Settled",
                    icon:"success", 
                    type:"success",
                    buttons: "Proceed",
                    closeOnClickOutside: false
                    })
                    .then(function(){
                        window.location.href="Dashboard.php"
                    })
                }
            }
        })
    }

window.location.href="Dashboard.php";


}else if(response==2){
   swal({
        title:"Sorry!", 
        text:"This Investment account is Locked.  Chat with our Support Team to guide you on how to unlock your account. We are sorry for any inconveniences", 
        icon:"error",
        buttons: "Chat Support",
        closeOnClickOutside: false


   })
   
   .then(function(){
       window.location.href="https://tawk.to/chat/62a368dab0d10b6f3e76b6e7/1g575362v";
   })

}else{
swal({
    title:"Oops!", 
    text:"Username or Password incorrect", 
    icon:"error"});
}

}
})

}

})
