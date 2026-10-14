
<style>
.WhatsApp{
	position: fixed;
	bottom: .5cm;
	left: .5cm;
	z-index: 99999999;
	
}

.WhatsApp > img{
	
	width: 50px;
	border-radius: 50%
}


</style>
<?php 
include('../Connect.php');

$sql="select * from WhatsApp";

$query=mysqli_query($Conn, $sql);
while($row=mysqli_fetch_array($query, MYSQLI_ASSOC)){
	echo '<a class="WhatsApp" href="https://api.whatsapp.com/send?phone='.$row['Phone'].'"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQz80kPHYo-24g41h-GSvKUa-QJpPlg10aG28ovzacrhlagYU5PevbB6lU6&s=10" ></a>';
	
}

?>