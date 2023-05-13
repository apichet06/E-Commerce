<?php  include '../../config.php';
$id   = mysqli_escape_string($conn,$_POST['id']);
$u_name   = mysqli_escape_string($conn,$_POST['u_name']);
$u_lname  = mysqli_escape_string($conn,$_POST['u_lname']);
$username = mysqli_escape_string($conn,$_POST['username']);
$status = mysqli_escape_string($conn,$_POST['status']);
$date 	  = date("Y-m-d");
$password = "123456";
if($_POST['insert']=="insert_user"){

	$sql = mysqli_query($conn,"INSERT INTO user(u_name,u_lname,u_status,username,password,u_date)
		values('$u_name','$u_lname','$status','$username','$password','$date')");
	if($sql){
		$show = "1";
	}else{
		$show = "0";
	}

	$data = array('data' => $show);
	echo json_encode($data);
}

if($_POST['del'] == "del"){

	$sql = mysqli_query($conn,"DELETE FROM user Where user_id ='$id' ");
	if($sql){
		$show = "1";
	}else{
		$show = "0";
	}
	$data = array('data' => $show);
	echo json_encode($data);
}

if($_POST['update']== "update"){
	$sql= mysqli_query($conn,"UPDATE user SET u_name='$u_name' ,u_lname='$u_lname' ,u_status='$status' ,username='$username',u_date='$date' Where user_id ='$id' ");
      if($sql){
      	$show ="1";
      }else{
      	$show ="0";
      }
      $data = array('data' => $show );
      echo json_encode($data);
}
?>