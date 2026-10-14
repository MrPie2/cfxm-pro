<?php session_start();
include('../Connect.php');
if(isset($_SESSION['User_id'])){
$Investor_id=$_SESSION['User_id'];
}
 ?>
<style>
.advert{
    position: fixed;
    top: 3cm;
    width: 90%;
    color: #000;
    z-index: 99999999999999999;
    margin: 0 auto;
 left: 0;
 right: 0;
 
}



.orange{
color: orange;
}



.hidden{
display: none;

}


</style>

<div class="advert hidden" style="background: #222; color: white">
    <div class="card-body" style="padding: 10px">
<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/46/Bitcoin.svg/1280px-Bitcoin.svg.png" style="width: 30px"/> <b>Customer Withdrawal Successful</b><br>
<p style="font-size: 10pt">Profit: $<span class="profit"></span> | | Bonus: $<span class="bonus"></span> <br>Total: $<span class="total"></span></p>
</div>
</div>


<script>
var counter = 0; 

var interval = setInterval(function() { 

counter++; 

if (counter == 30){

clearTimeout(counter=0, 30);
    window.profit=Math.floor(Math.random() * 20000) + 1;
    window.bonus=Math.floor(Math.random() * 500) + 1;
    window.total=profit+bonus;
}

    $('.cap').html("+66.09");
    $('.total').html(total);
    $('.bonus').html(bonus);
    $('.profit').html(profit);

if (counter ==10){
$('.advert').removeClass('hidden');

}else if(counter >15){
    
    $('.advert').addClass('hidden');

}

}, 500);

		
		</script>
