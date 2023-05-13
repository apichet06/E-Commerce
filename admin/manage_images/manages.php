<?php require_once '../../config.php';

if($_POST['insert_imagse_slide'] === "insert_imagse_slide"){
	$file = $_FILES['file']['name'];
	if($file[0]){
		$exp=explode('.',$file[0]);
		$exptype=$exp[1];
		$filename_0= "images_0".'.'.$exptype;
		$path="images/".$filename_0;
		move_uploaded_file($_FILES["file"]["tmp_name"][0],$path);
	}
	if($file[1]){
		$exp=explode('.',$file[1]);
		$exptype=$exp[1];
		$filename_1="images_1".'.'.$exptype;
		$path="images/".$filename_1;
		move_uploaded_file($_FILES["file"]["tmp_name"][1],$path);
	}
	if($file[2]){
		$exp=explode('.',$file[2]);
		$exptype=$exp[1];
		$filename_2="images_2".'.'.$exptype;
		$path="images/".$filename_2;
		move_uploaded_file($_FILES["file"]["tmp_name"][2],$path);
	}
	$sql0 = mysqli_query($conn,"SELECT * FROM images_header ");
	$sum = mysqli_num_rows($sql0);
	if($sum < 1){
		$sql = mysqli_query($conn,"INSERT INTO images_header(img_header1,img_header2,img_header3)
			VALUES('$filename_0','$filename_1','$filename_2')");
	}else{
		$sql = mysqli_query($conn,"UPDATE images_header Set img_header1='$filename_0',img_header2='$filename_1',img_header3='$filename_2' ");	
	}   
	if($sql){
		$q = "1";
	}else{
		$q = "0";
	}
	$data = array('data' => $q);
	echo  json_encode($data);
}


if($_POST['images_above'] === "images_above"){
	$file = $_FILES['file1']['name'];
	$exp=explode('.',$file);
	$exptype=$exp[1];
	$filename= "images_4".'.'.$exptype;
	$path="images/".$filename;
	move_uploaded_file($_FILES["file1"]["tmp_name"],$path);
	$sql0 = mysqli_query($conn,"SELECT * FROM images_header");
	$sum = mysqli_num_rows($sql0);
	if($sum < 1){
		$sql = mysqli_query($conn,"INSERT INTO images_header(img_header4)
			VALUES('$filename')");
	}else{
		$sql = mysqli_query($conn,"UPDATE images_header Set img_header4='$filename' ");	
	}   
	if($sql){
		$q = "1";
	}else{
		$q = "0";
	}
	$data = array('data' => $q);
	echo  json_encode($data);
}

if($_POST['images_below'] === "images_below"){
	$file = $_FILES['file2']['name'];
	$exp=explode('.',$file);
	$exptype=$exp[1];
	$filename= "images_5".'.'.$exptype;
	$path="images/".$filename;
	move_uploaded_file($_FILES["file2"]["tmp_name"],$path);
	$sql0 = mysqli_query($conn,"SELECT * FROM images_header");
	$sum = mysqli_num_rows($sql0);
	if($sum < 1){
		$sql = mysqli_query($conn,"INSERT INTO images_header(img_header5)
			VALUES('$filename')");
	}else{
		$sql = mysqli_query($conn,"UPDATE images_header Set img_header5='$filename' ");	
	}   
	if($sql){
		$q = "1";
	}else{
		$q = "0";
	}
	$data = array('data' => $q);
	echo  json_encode($data);
}

if($_POST['images_left'] === "images_left"){
	$file = $_FILES['file3']['name'];
	$exp=explode('.',$file);
	$exptype=$exp[1];
	$filename= "images_6".'.'.$exptype;
	$path="images/".$filename;
	move_uploaded_file($_FILES["file3"]["tmp_name"],$path);
	$sql0 = mysqli_query($conn,"SELECT * FROM images_header");
	$sum = mysqli_num_rows($sql0);
	if($sum < 1){
		$sql = mysqli_query($conn,"INSERT INTO images_header(img_header5)
			VALUES('$filename')");
	}else{
		$sql = mysqli_query($conn,"UPDATE images_header Set img_header6='$filename' ");	
	}   
	if($sql){
		$q = "1";
	}else{
		$q = "0";
	}
	$data = array('data' => $q);
	echo  json_encode($data);
}

if($_POST['images_right'] === "images_right"){
	$file = $_FILES['file4']['name'];
	$exp=explode('.',$file);
	$exptype=$exp[1];
	$filename= "images_7".'.'.$exptype;
	$path="images/".$filename;
	move_uploaded_file($_FILES["file4"]["tmp_name"],$path);
	$sql0 = mysqli_query($conn,"SELECT * FROM images_header");
	$sum = mysqli_num_rows($sql0);
	if($sum < 1){
		$sql = mysqli_query($conn,"INSERT INTO images_header(img_header5)
			VALUES('$filename')");
	}else{
		$sql = mysqli_query($conn,"UPDATE images_header Set img_header7='$filename' ");	
	}   
	if($sql){
		$q = "1";
	}else{
		$q = "0";
	}
	$data = array('data' => $q);
	echo  json_encode($data);
}
?>