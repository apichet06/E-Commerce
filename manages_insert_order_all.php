<?php session_start(); 
require_once 'config.php';

$m_name 	= mysqli_escape_string($conn,$_POST['m_name']);
$lname 		= mysqli_escape_string($conn,$_POST['lname']);
$m_email 	= mysqli_escape_string($conn,$_POST['m_email']);
$m_country  = mysqli_escape_string($conn,$_POST['m_country']);
$m_tol 		= mysqli_escape_string($conn,$_POST['m_tol']);
$address 	= mysqli_escape_string($conn,$_POST['address']);

if ($_SESSION['login_user'] and $_POST['insert']=="insert_order") {
	

	$sql0 = mysqli_query($conn,"SELECT m_id FROM member_db Where m_number = '".$_SESSION['login_user']."' ");
	$rs   = mysqli_fetch_assoc($sql0);

	$sql = mysqli_query($conn,"UPDATE member_db SET m_name='$m_name',m_lname='$lname',m_email='$m_email',m_address='$address',m_country='$m_country',m_tol='$m_tol' Where m_id ='".$rs['m_id']."' ");


	$sql0 = mysqli_query($conn,"SELECT MAX(substr(po_id,-10))+1 AS maxId FROM order_db");
	$rs0 = mysqli_fetch_assoc($sql0);
	$maxId = substr("0000000000".$rs0['maxId'], -10);
	if($rs0['maxId']==''){
		$po_id = "PO".substr(date("Y")+543, -2).date("m")."0000000001";
	}else{
		$po_id = "PO".substr(date("Y")+543, -2).date("m").$maxId;
	}
	$date = date("Y-m-d");
	$sql = mysqli_query($conn,"INSERT INTO po_payment (po_id,m_id,po_date)Values('$po_id','".$rs['m_id']."','$date')");
	foreach($_POST['price'] as $i=>$art){
		$price = mysqli_escape_string($conn,$_POST['price'][$i]);
		$qty   = mysqli_escape_string($conn,$_POST['qty'][$i]);
		$pd_id = mysqli_escape_string($conn,$_POST['pd_id'][$i]);

		$sql1 = mysqli_query($conn,"SELECT PD_ID,User_Create FROM product_db Where pd_id = '$pd_id ' ");
		$rs1 = mysqli_fetch_assoc($sql1)or die(mysqli_error($conn));

		$sql = mysqli_query($conn,"INSERT INTO order_db (pd_id,user_sell,pd_price,o_qty,po_id,m_id)Values('".$rs1['PD_ID']."','".$rs1['User_Create']."','$price','$qty','$po_id','".$rs['m_id']."')")or die(mysqli_error($conn));

		$sql = mysqli_query($conn,"DELETE FROM product_cart Where pd_id ='$pd_id' ");
	}

	if ($sql) {
		$show = "1";
	}else{
		$show = "0";
	}
	$Name = array('data' =>$show );
	echo json_encode($Name);
}
if ($_SESSION['login_user'] and $_POST['del']=="delete") {
	$id  = mysqli_escape_string($conn,$_POST['id']);
	$sql = mysqli_query($conn,"DELETE FROM product_cart Where pd_id ='$id' ");

	if ($sql) {
		$show = "1";
	}else{
		$show = "0";
	}
	$Name = array('data' =>$show );
	echo json_encode($Name);
}
?>