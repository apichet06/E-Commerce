<?php session_start(); 
require_once 'config.php';

if ($_SESSION['login_user'] and $_POST['del']=="delete") {

	$id    = mysqli_escape_string($conn,$_POST['id']);
	$po_id = mysqli_escape_string($conn,$_POST['po_id']); 

	$sql = mysqli_query($conn,"SELECT * FROM order_db Where po_id = '$po_id' ");
	$row = mysqli_num_rows($sql);
	if($row <="1"){
		$sql = mysqli_query($conn,"DELETE FROM po_payment Where po_id ='$po_id' ");
	}
	$sql = mysqli_query($conn,"DELETE FROM order_db Where pd_id ='$id' ");

	if ($sql) {
		$show = "1";
	}else{
		$show = "0";
	}
	$Name = array('data' =>$show );
	echo json_encode($Name);
} ?>