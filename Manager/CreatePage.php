<?php include('../Connect.php'); 

$Content=mysqli_real_escape_string($Conn, $_POST['Content']);
$Link=$_POST['link'];
$Page_Name=$_POST['page_name'];
$Icon=$_POST['icon'];
$Child_of=$_POST['child_of'];
if($Child_of!=""){
    $hasChild=1;
}else{
    $hasChild="";
}
$Status=0;
$type=$_POST['type'];
$concat="$"."link";
$Cover_Photo=$_POST['Cover_Photo'];
$Description=mysqli_real_escape_string($Conn, $_POST['Description']);
$Date=date("l d F Y ");

$content="<?php $concat='".$Link."'; include('Head.php'); include('Navbar.php'); include('page.php'); ?>";
$path=fopen("../en/".$Link.".php", "w");
fwrite($path, $content);


$sql="insert into pages (Page_Name, Page_Contents, link, icon, parent, HasChild, type, Cover_Photo, Description, Status, Date) values ('$Page_Name', '$Content', '$Link', '$Icon', '$Child_of', '$hasChild', '$type', '$Cover_Photo','$Description' ,'$Status', '$Date')";
$query=mysqli_query($Conn, $sql);
if($query){
    echo 1;
}else{
    echo 0;
    echo mysqli_error($Conn);
}



?>