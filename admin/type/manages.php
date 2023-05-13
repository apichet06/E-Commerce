<?php require_once '../../config.php';
$id 		= mysqli_escape_string($conn,$_POST['id']);
$cat_id		= mysqli_escape_string($conn,$_POST['cat_id']);
$type_name1 = mysqli_escape_string($conn,$_POST['type_name1']);
$type_name2 = mysqli_escape_string($conn,$_POST['type_name2']);

if ($_POST['insert']==="insert") {

	$sql = mysqli_query($conn,"INSERT INTO type_db (CAT_ID,TYPE_Name1,TYPE_Name2)
		Values('$cat_id','$type_name1','$type_name2')");

	if($sql){
		$show = "1";
	}else{
		$show = "0";
	}
	$data = array('in_type' => $show);
	echo json_encode($data);
}

if ($_POST['del'] ==="del") {

	$sql0 = mysqli_query($conn,"SELECT * FROM product_db Where type_id = '$id' ");
	$row = mysqli_num_rows($sql0);
	if($row >= "1"){
		$show = "00";
	}else{
		$sql = mysqli_query($conn,"DELETE FROM type_db Where type_id = '$id' ");
		if($sql){
			$show = "1";
		}else{
			$show ="0";
		}
	}
	$data = array('del_type' => $show);
	echo json_encode($data);
}


if($_POST['update'] == "update"){
	$sql = mysqli_query($conn,"UPDATE type_db SET TYPE_Name1='$type_name1',TYPE_Name2='$type_name2',CAT_ID ='$cat_id'
	 Where type_id='$id' ");
	if($sql){
		$show = "1";
	}else{
		$show = "0";
	}
	$data = array('update_type' => $show);
	echo json_encode($data);
}

?>