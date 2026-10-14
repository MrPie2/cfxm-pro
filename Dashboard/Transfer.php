<?php
session_start();
include('Header.php'); 
if(isset($_SESSION['User_id'])){

?>



            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-lg-12">


<div class="card" align="center">
<a href="Amount_Transfer.php" class="btn btn-oxblood">Transfer to Investor</a>
</div>
                        <div class="card">
                            <div class="card-title">
                                <h4>P2P Transfer</h4>

                            </div>
<?php 

$sql="select * from P2P where Transferer='$Investor_id'  or Receiver='$Investor_id'";
$query=mysqli_query($Conn, $sql);
$count=mysqli_num_rows($query);

$table='<div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr style="color: #222">
                                                <th>S/No</th>
                                                  <th>Receiver/Sender</th>
                                                <th>Amount</th>
                                                                                                <th>Type</th>

                                                <th>Status</th>
                                                                                                                                                <th>Action</th>

                                                <th>Date</th>
                                            
                                            </tr>
                                        </thead>
                                        <tbody>';
if($count>0){

$sn=0;
while($row=mysqli_fetch_array($query, MYSQLI_ASSOC)){
    if($row['Type']==1 && $row['Type2']==""){
                $Type="Transfer Out";
$col="badge-danger";


    }else{
        $Type="Transfer In";
        $col="badge-oxblood";

    }
$sn++;

if($row['Status']==0){
$color="badge-warning";
$Status="Pending";

}else{
$color="badge-oxblood";
$Status="Success";
}

if($row['Type2']==2 & $row['Status']==0){
    $Confirm="<a href='Confirm.php' class='btn btn-sm btn-oxblood' data-toggle='modal' data-target='#DisputeModal".$row['id']."'>Confirm</a>";


$confirmModal='<div class="modal fade" id="DisputeModal'.$row['id'].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLongTitle">Incoming Transfer</h4>
       
      </div>
      <div class="modal-body">
        <h4 style="color: #222">You have an incoming transfer of '.$curAbbr.number_format($row['Amount']*$exchangerate, 2, '.',',').'</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-oxblood ConfirmTransaction" Amount="'.$row['Amount'].'" Transferer="'.$row['Transferer'].'"User_id="'.$row['Receiver'].'">Confirm Transaction</button>
      </div>
    </div>
  </div>
</div>';
echo $confirmModal;
}else{
  $Confirm="";  
}

if($row['Status']==0 && $row['Type']==1){

$Dispute="<a href='Dispute.php' class='btn btn-sm btn-oxblood'>Raise Dispute</a>";



}else{
$Dispute="";

}
$table.='<tr>
                                                <td>'.$sn.'</td><td>'.$row['Name'].'</td>
<td class="text-oxblood">'.$curAbbr.number_format($row['Amount']*$exchangerate, 2, '.',',').'</td>
<td><span class="badge '.$col.'">'.$Type.'</span></td>
                                                <td><span class="badge '.$color.'">'.$Status.'</span></td>
                                                <td>'.$Dispute.' '.$Confirm.'</td>
                                                <td>'.$row['Date'].'</td>
                                                
                                            </tr>';

}
                                           

}else{

$table.= "<tr><td colspan='6' style='text-align: center'>You have not made or received any transfers yet</td></tr>";
}
                             $table.='</tbody></table>';

echo $table;
?>
                                </div>
                            </div>
                        </div>
                    



                    </div>
                    <!-- /# column -->





        
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

</body>

</html>

<?php
}else{
Header('Location:LoginContainer.php');

}

?>

<script>
    
    $('.ConfirmTransaction').click(function(){
        var Amount=$(this).attr('Amount');
        var Receiver=$(this).attr('User_id');
                var Transferer=$(this).attr('Transferer');

        $.ajax({
            url:'ConfirmTransaction.php',
            method:'POST',
            data:{Amount:Amount,Receiver:Receiver,Transferer:Transferer},
            success:function(data){
                if(data==1){
                 swal({title:'Confirmed', icon:'success',type:'success', text:'Transaction has been confirmed successfully', buttons:'Thank you'})
                 
                 .then(function(){
location.reload();
})
                }else{
                   swal({title:'Sorry', icon:'error',type:'error', text:'We could not complete this transaction at the moment \n Try again in the next few minutes', buttons:'Ok'}) 
                    .then(function(){
location.reload();
})
                }
            }
            
        })

   
    })
</script>