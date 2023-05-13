<?php session_start(); require_once 'config.php';

$id = mysqli_escape_string($conn,$_POST['id']);
$bank = mysqli_escape_string($conn,$_POST['bank']);
$file = mysqli_escape_string($conn,$_FILES['file']['name']);

$exp=explode('.',$file);
$exptype=$exp[1];
$filename= $id.'.'.$exptype;
$path="images_payment/".$filename;
move_uploaded_file($_FILES["file"]["tmp_name"],$path);
$date = date("Y-m-d H:i:s");
$sql = mysqli_query($conn,"UPDATE po_payment Set 
	po_bank			='$bank',
	img_payment		='$filename',
	date_payment 	='$date',
	status_payment	='Checking payment' 
	Where po_id = '$id' ");

if($sql){
	$show = "1";
}else{
	$show = "0";
}

  $data = array('data' => $show );
  echo json_encode($data);

?>