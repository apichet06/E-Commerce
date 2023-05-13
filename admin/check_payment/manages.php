<?php session_start();
require_once '../../config.php';
$id = $_POST['id'];
$approve = $_POST['approve'];
$date = date("Y-m-d");


if($approve =="1"){

	$sql0 = mysqli_query($conn,"SELECT pd_id,o_qty,user_sell,pd_price FROM order_db Where po_id ='$id' ");
	while($rs0=mysqli_fetch_assoc($sql0)){
		$qty      = $rs0['o_qty'];
		$pd_id    = $rs0['pd_id'];
		$user_id  = $rs0['user_sell'];
		$pd_price = $rs0['pd_price'];

		//ตัดStock	
		$sql = mysqli_query($conn,"UPDATE product_db SET stock = stock-'$qty' Where pd_id = '$pd_id'");


		//insert sell ค่าคอมมิชชั่น
		$sql1  = mysqli_query($conn,"SELECT  u_com_percent FROM  user  WHERE  User_ID  = '$user_id' ");  
		$rs1 = mysqli_fetch_array($sql1);
		$percent =$rs1['u_com_percent'];
		$sql = mysqli_query($conn,"INSERT INTO commission_db 
			(pd_id,user_id,comm_percent,comm_qty,comm_price,comm_date)
			VALUES
			('$pd_id','$user_id','$percent','$qty','$pd_price','$date') ");

	}

// update การสั่งซื้อ
	$sql = mysqli_query($conn,"UPDATE po_payment SET po_status_check = '$approve',date_check ='$date' Where po_id ='$id'");

	if($sql){
		$show = "1";
	}else{
		$show = "0";
	}

	$data = array('data' => $show );
	echo json_encode($data);



}else if ($approve =="0") {
	// update การสั่งซื้อ ไม่ผ่าน
	$sql = mysqli_query($conn,"UPDATE po_payment SET po_status_check = '$approve',date_check ='$date' Where po_id ='$id'");
	if($sql){
		$show = "1";
	}else{
		$show = "0";
	}

	$data = array('data' => $show );
	echo json_encode($data);
}

?>