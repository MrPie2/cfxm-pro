
<style>
.WhatsApp{
	position: fixed;
	bottom: .5cm;
	left: .5cm;
	z-index: 99999999;

	
}


.WhatsApp2{
	position: fixed;
	bottom: .8cm;
	left: .5cm;
	z-index: 99999999;
	
}
.WhatsApp2 > img{
	
	width: 80px;
}

.WhatsApp > img{
	
	width: 50px;
}
</style>
<?php 
include('../Connect.php');

$sql="select * from WhatsApp";

$query=mysqli_query($Conn, $sql);
while($row=mysqli_fetch_array($query, MYSQLI_ASSOC)){

	echo '<a class="WhatsApp" href="https://api.whatsapp.com/send?phone='.$row['Phone'].'"><img src="https://static.vecteezy.com/system/resources/previews/016/716/480/non_2x/whatsapp-icon-free-png.png" style="width: 60px"></a>';
	
}


?>