<?php require_once 'config.php'; 

$Email =	mysqli_escape_string($conn,$_POST['Email']);

$sql0 = mysqli_query($conn,"SELECT * FROM subscribe Where  s_email = '$Email' ");
$row = mysqli_num_rows($sql0);

if($row >="1"){
	$sql = mysqli_query($conn,"UPDATE subscribe Set s_email='$Email' Where s_email = '$Email' ");
}else{
	$sql = mysqli_query($conn,"INSERT INTO subscribe (s_email)VALUES('$Email')");
}

if($sql){
	$show = "1";
}else{
	$show = "0";	
}

$data = array('data' => $show );
echo  json_encode($data);
?>
