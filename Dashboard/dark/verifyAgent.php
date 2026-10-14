<?php 
include('../../../Connect.php');
$Agent_id=$_POST['Agent_id'];
$sql="SELECT * FROM agent WHERE Agent_id='$Agent_id'";

$query=mysqli_query($Conn, $sql);
$count=mysqli_num_rows($query);
$row=mysqli_fetch_array($query, MYSQLI_ASSOC);
$Boss_id=$row['Agent'];
$Agent_id=$row['id'];
$Agent_Name=$row['Agent_Name'];
if($Agent_id>0){
	echo "<label class='label-success' style='padding: 10px'>Agent Found Name: ".$Agent_Name."</label>";
	echo '<div class="form-group"><button class="Next btn btn-success btn-lg">Next</button>
	</div>';
}else{
		echo "<label class='label-danger'>We could not find this agent on our organization's database</label>";

}

?>
<script>
$('.Next').click(function(){
			$('.SpecityAgent').addClass('inactive');
			$('.LoginInfo').removeClass('inactive');

})



</script>