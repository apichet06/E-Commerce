<?php require_once '../../config.php';

$stock = mysqli_escape_string($conn,$_POST['stock']);
$id    = mysqli_escape_string($conn,$_POST['id']);

$sql = mysqli_query($conn,"UPDATE product_db SET stock = '$stock' Where pd_id = '$id' ");
if($sql){
	$show = "1";
}else{
	$show = "0";
}
$arrayName = array('data' => $show );
echo json_encode($arrayName);

?>