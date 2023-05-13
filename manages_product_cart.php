<?php session_start();
require_once 'config.php';

if($_SESSION['login_user']){

	$sql02 = mysqli_query($conn,"SELECT m_id FROM member_db Where m_number = '".$_SESSION['login_user']."'")or die(mysqli_error($conn));
	$rs02 = mysqli_fetch_assoc($sql02);

	$pd_id= mysqli_escape_string($conn,$_POST['pd_id']);
	$qty = mysqli_escape_string($conn,$_POST['qty']);


	$sql0 = mysqli_query($conn,"SELECT * FROM product_cart Where pd_id = '$pd_id'");
	$row = mysqli_num_rows($sql0);

	$sql1 = mysqli_query($conn,"SELECT pd_price,pd_pricesell FROM product_db Where pd_id = '$pd_id'");
	$rs1 = mysqli_fetch_assoc($sql1);
	if($rs1['pd_pricesell']){
		$price = $rs1['pd_pricesell'];	
	}else{
		$price = $rs1['pd_price'];	
	}
	if($row >=1){
		$sql = mysqli_query($conn,"UPDATE  product_cart SET pc_qty='$qty',pc_price ='$price' Where pd_id ='$pd_id' and m_id = '".$rs02['m_id']."' ");
	}else{
		$sql = mysqli_query($conn,"INSERT INTO product_cart (m_id,pd_id,pc_qty,pc_price)
			VALUES('".$rs02['m_id']."','$pd_id','$qty','$price')")or die(mysqli_error($conn));
	}

	if($sql){
		$show = "1";
	}else{
		$show ="0";
	}
	$Name = array('data' => $show );
	echo json_encode($Name);
}


?>