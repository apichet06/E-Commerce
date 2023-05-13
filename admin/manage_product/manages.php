<?php 
session_start(); require_once '../../config.php';
$sql   = mysqli_query($conn,"SELECT  user_id FROM  user  WHERE  username  = '".$_SESSION['login']."' ");  
$login = mysqli_fetch_array($sql);

// ++++++++++++++++++++++++++++++++++++++++++++++
//                 category insert
// ++++++++++++++++++++++++++++++++++++++++++++++
$cat_id = mysqli_escape_string($conn,$_POST['id']);
$cat_name = mysqli_escape_string($conn,$_POST['name']);
$cat_number = mysqli_escape_string($conn,$_POST['number']);
if ($_POST['insert'] ==="insert_cate") {
	$sql = mysqli_query($conn,"INSERT INTO category_db (CAT_Name1,CAT_number)VALUES('$cat_name','$cat_number')")or die(mysqli_error($conn));

	if ($sql) {
		echo "1";
	}else{
		echo "0";
	}
}

// ++++++++++++++++++++++++++++++++++++++++++++++
//                 category Delete
// ++++++++++++++++++++++++++++++++++++++++++++++

if($_POST['delete_cat'] == "delete_cat"){
	$sql = mysqli_query($conn,"DELETE FROM category_db WHERE cat_id = '$cat_id' ");
	if($sql){
		echo "1";
	}else{
		echo "0";
	}
}

// ++++++++++++++++++++++++++++++++++++++++++++++
//                 category Delete
// ++++++++++++++++++++++++++++++++++++++++++++++

if($_POST['update_cat']=="update_cat"){

	$sql = mysqli_query($conn,"UPDATE category_db Set  cat_name1='$cat_name',cat_number='$cat_number' 
		Where cat_id = '$cat_id' ")or die(mysqli_error($conn));
	if($sql){
		echo "1";
	}else{
		echo "0";
	}
}



// ++++++++++++++++++++++++++++++++++++++++++++++
//                 product 
// ++++++++++++++++++++++++++++++++++++++++++++++
$id				= mysqli_escape_string($conn,$_POST['id']);
$TYPE_ID		= mysqli_escape_string($conn,$_POST['type_id']);
$PD_Name1 		= mysqli_escape_string($conn,$_POST['pd_name1']);
$PD_Name2 		= mysqli_escape_string($conn,$_POST['pd_name2']);
$PD_Price   	= mysqli_escape_string($conn,$_POST['pd_pirce']);
$PD_Discount 	= mysqli_escape_string($conn,$_POST['pd_discount']);
$PD_PriceSell 	= mysqli_escape_string($conn,$_POST['pd_pricesell']);
$PD_Money 		= mysqli_escape_string($conn,$_POST['pd_money']);
$Order_Type 	= mysqli_escape_string($conn,$_POST['order_type']);
$Stock 			= mysqli_escape_string($conn,$_POST['stock']);
$PD_Detail 		= mysqli_escape_string($conn,$_POST['detail']);
$PD_Promotion 	= mysqli_escape_string($conn,$_POST['pd_promotion']);
$PD_Condition 	= mysqli_escape_string($conn,$_POST['pd_condition']);

$date = date("Y-m-d");
// ค้นหารหัส cate id เพื่อเก็บ
$sql0 = mysqli_query($conn,"SELECT CAT_ID FROM type_db Where TYPE_ID = '$TYPE_ID' ");
$rs = mysqli_fetch_assoc($sql0);
$CAT_ID = $rs['CAT_ID'];
//$number_id= date('Ymdhis')."/".$login['user_id'];

if($_POST['insert_pro'] === "insert_pro"){

	$sql0 = mysqli_query($conn,"SELECT MAX(substr(pd_number,-7))+1 AS maxId FROM product_db");
	$rs0 = mysqli_fetch_assoc($sql0);
	$maxId = substr("0000000".$rs0['maxId'], -7);
	if($rs0['maxId']==''){
		$nextId = "PD".substr(date("Y")+543, -2).date("m")."0000001";
	}else{
		$nextId = "PD".substr(date("Y")+543, -2).date("m").$maxId;
	}
	

	$file = $_FILES['file']['name'];
	if($file[0]){
		$exp=explode('.',$file[0]);
		$exptype=$exp[1];
		$filename_0= $nextId."_0".'.'.$exptype;
		$path="uploads/".$filename_0;
		move_uploaded_file($_FILES["file"]["tmp_name"][0],$path);
	}
	if($file[1]){
		$exp=explode('.',$file[1]);
		$exptype=$exp[1];
		$filename_1=$nextId."_1".'.'.$exptype;
		$path="uploads/".$filename_1;
		move_uploaded_file($_FILES["file"]["tmp_name"][1],$path);
	}
	if($file[2]){
		$exp=explode('.',$file[2]);
		$exptype=$exp[1];
		$filename_2= $nextId."_2".'.'.$exptype;
		$path="uploads/".$filename_2;
		move_uploaded_file($_FILES["file"]["tmp_name"][2],$path);
	}
	if($file[3]){
		$exp=explode('.',$file[3]);
		$exptype=$exp[1];
		$filename_3=$nextId."_3".'.'.$exptype;
		$path="uploads/".$filename_3;
		move_uploaded_file($_FILES["file"]["tmp_name"][3],$path);
	}
	if($file[4]){
		$exp=explode('.',$file[4]);
		$exptype=$exp[1];
		$filename_4=$nextId."_4".'.'.$exptype;
		$path="uploads/".$filename_4;
		move_uploaded_file($_FILES["file"]["tmp_name"][4],$path);
	}
	if($file[5]){
		$exp=explode('.',$file[5]);
		$exptype=$exp[1];
		$filename_5=$nextId."_5".'.'.$exptype;
		$path="uploads/".$filename_5;
		move_uploaded_file($_FILES["file"]["tmp_name"][5],$path);
	}
	if($file[6]){
		$exp=explode('.',$file[6]);
		$exptype=$exp[1];
		$filename_6=$nextId."_6".'.'.$exptype;
		$path="uploads/".$filename_6;
		move_uploaded_file($_FILES["file"]["tmp_name"][6],$path);
	}
	if($file[7]){
		$exp=explode('.',$file[7]);
		$exptype=$exp[1];
		$filename_7=$nextId."_7".'.'.$exptype;
		$path="uploads/".$filename_7;
		move_uploaded_file($_FILES["file"]["tmp_name"][7],$path);
	}
	$sql = mysqli_query($conn,"INSERT INTO  product_db (cat_id,type_id,pd_name1,pd_name2,pd_price,pd_discount,pd_pricesell,stock,user_create,create_date,last_Update,pd_detail,pd_promotion,pd_condition,pic1,pic2,pic3,pic4,pic5,pic6,pic7,pic8,pd_number)
		VALUES('$CAT_ID','$TYPE_ID','$PD_Name1','$PD_Name2','$PD_Price','$PD_Discount','$PD_PriceSell','$Stock','".$login['user_id']."','$date','$date','$PD_Detail','$PD_Promotion','$PD_Condition','$filename_0','$filename_1','$filename_2','$filename_3','$filename_4','$filename_5','$filename_6','$filename_7','$nextId')")or die(mysqli_error($conn));
	if($sql){
		$show = "1";
	}else{
		$show = "0";
	}
 $data = array('data' => $show );
echo json_encode($data);
}
// ++++++++++++++++++++++++++++++++++++++++++++++
//   update Product แก้ไขรายละเอียด ข้อมูล Product  
// ++++++++++++++++++++++++++++++++++++++++++++++

if($_POST['update_pro'] == "update_pro"){

// select data เพื่อจัดการข้อมมูล update
	$sql0 = mysqli_query($conn,"SELECT pic1,pic2,pic3,pic4,pic5,pic6,pic7,pic8,PD_Number 
		FROM product_db WHERE pd_id = '$id'");
	$rs = mysqli_fetch_assoc($sql0);	
	$nextId = $rs['PD_Number'];

	if($_FILES['file']['name'][0]){
		if($rs['pic1']){ @unlink('uploads/'.$rs['pic1']);}
		if($rs['pic2']){ @unlink('uploads/'.$rs['pic2']);}
		if($rs['pic3']){ @unlink('uploads/'.$rs['pic3']);}
		if($rs['pic4']){ @unlink('uploads/'.$rs['pic4']);}
		if($rs['pic5']){ @unlink('uploads/'.$rs['pic5']);}
		if($rs['pic6']){ @unlink('uploads/'.$rs['pic6']);}
		if($rs['pic7']){ @unlink('uploads/'.$rs['pic7']);}
		if($rs['pic8']){ @unlink('uploads/'.$rs['pic8']);}
		$file = $_FILES['file']['name'];
		if($file[0]){			
			$exp=explode('.',$file[0]);
			$exptype=$exp[1];
			$filename_0= $nextId."_0".'.'.$exptype;
			$path="uploads/".$filename_0;
			move_uploaded_file($_FILES["file"]["tmp_name"][0],$path);
		}
		if($file[1]){		
			$exp=explode('.',$file[1]);
			$exptype=$exp[1];
			$filename_1=$nextId."_1".'.'.$exptype;
			$path="uploads/".$filename_1;
			move_uploaded_file($_FILES["file"]["tmp_name"][1],$path);
		}
		if($file[2]){
			$exp=explode('.',$file[2]);
			$exptype=$exp[1];
			$filename_2= $nextId."_2".'.'.$exptype;
			$path="uploads/".$filename_2;
			move_uploaded_file($_FILES["file"]["tmp_name"][2],$path);
		}
		if($file[3]){			
			$exp=explode('.',$file[3]);
			$exptype=$exp[1];
			$filename_3=$nextId."_3".'.'.$exptype;
			$path="uploads/".$filename_3;
			move_uploaded_file($_FILES["file"]["tmp_name"][3],$path);
		}
		if($file[4]){
			$exp=explode('.',$file[4]);
			$exptype=$exp[1];
			$filename_4=$nextId."_4".'.'.$exptype;
			$path="uploads/".$filename_4;
			move_uploaded_file($_FILES["file"]["tmp_name"][4],$path);
		}
		if($file[5]){			
			$exp=explode('.',$file[5]);
			$exptype=$exp[1];
			$filename_5=$nextId."_5".'.'.$exptype;
			$path="uploads/".$filename_5;
			move_uploaded_file($_FILES["file"]["tmp_name"][5],$path);
		}
		if($file[6]){			
			$exp=explode('.',$file[6]);
			$exptype=$exp[1];
			$filename_6=$nextId."_6".'.'.$exptype;
			$path="uploads/".$filename_6;
			move_uploaded_file($_FILES["file"]["tmp_name"][6],$path);
		}
		if($file[7]){
			$exp=explode('.',$file[7]);
			$exptype=$exp[1];
			$filename_7=$nextId."_7".'.'.$exptype;
			$path="uploads/".$filename_7;
			move_uploaded_file($_FILES["file"]["tmp_name"][7],$path);
		}

		$sql = mysqli_query($conn,"UPDATE product_db SET 
			cat_id		 ='$CAT_ID',
			type_id		 ='$TYPE_ID',
			pd_name1	 ='$PD_Name1',
			pd_name2	 ='$PD_Name2',
			pd_price	 ='$PD_Price',
			pd_discount	 ='$PD_Discount',
			pd_pricesell ='$PD_PriceSell',
			pd_money	 ='$PD_Money',
			order_type	 ='$Order_Type',
			stock		 ='$Stock',
			last_Update	 ='$date',
			pd_promotion ='$PD_Promotion',
			pd_condition ='$PD_Condition',
			pic1		 ='$filename_0',
			pic2		 ='$filename_1',
			pic3		 ='$filename_2',
			pic4		 ='$filename_3',
			pic5		 ='$filename_4',
			pic6		 ='$filename_5',
			pic7		 ='$filename_6',
			pic8		 ='$filename_7' Where pd_id = '$id' ")or die(mysqli_error($conn));

		if($sql){
			echo "1";
		}else{
			echo "0";
		}
		
	}else{

		$sql = mysqli_query($conn,"UPDATE product_db SET 
			cat_id		 ='$CAT_ID',
			type_id		 ='$TYPE_ID',
			pd_name1	 ='$PD_Name1',
			pd_name2	 ='$PD_Name2',
			pd_price	 ='$PD_Price',
			pd_discount	 ='$PD_Discount',
			pd_pricesell ='$PD_PriceSell',
			stock		 ='$Stock',
			last_Update	 ='$date',
			pd_promotion ='$PD_Promotion',
			pd_condition ='$PD_Condition' Where pd_id = '$id'");

		if($sql){
			echo "1";
		}else{
			echo "0";
		}

	}
}

// ++++++++++++++++++++++++++++++++++++++++++++++
//   update detail แก้ไขรายละเอียด ข้อมูล pd_detail  
// ++++++++++++++++++++++++++++++++++++++++++++++

$id 		= mysqli_escape_string($conn,$_POST['id']);
$detail 	= mysqli_escape_string($conn,$_POST['pd_detail']);

if ($_POST['update_detail'] === "update_detail") {

	if($detail !== '<div class=\"data_detail\"></div>' and $detail !== '<p><br></p>'){

		$sql = mysqli_query($conn,"UPDATE  product_db SET pd_detail = '$detail' WHERE pd_id ='$id' ");
		if($sql){
			echo "1";
		}else{
			echo "0";
		}

	}else{
		echo "1";
	}


}



// ++++++++++++++++++++++++++++++++++++++++++++++
//   delete product ลบรายการ product   
// ++++++++++++++++++++++++++++++++++++++++++++++

if($_POST['del'] == "delete_pro"){

	$sql = mysqli_query($conn,"SELECT pic1,pic2,pic3,pic4,pic5,pic6,pic7,pic8 FROM product_db WHERE pd_id = '$id'");
	$rs = mysqli_fetch_assoc($sql);

	if($rs['pic1']){ @unlink('uploads/'.$rs['pic1']);}
	if($rs['pic2']){ @unlink('uploads/'.$rs['pic2']);}
	if($rs['pic3']){ @unlink('uploads/'.$rs['pic3']);}
	if($rs['pic4']){ @unlink('uploads/'.$rs['pic4']);}
	if($rs['pic5']){ @unlink('uploads/'.$rs['pic5']);}
	if($rs['pic6']){ @unlink('uploads/'.$rs['pic6']);}
	if($rs['pic7']){ @unlink('uploads/'.$rs['pic7']);}
	if($rs['pic8']){ @unlink('uploads/'.$rs['pic8']);}

	$sql = mysqli_query($conn,"DELETE FROM product_db WHERE pd_id = '$id' ");
	if($sql){
		echo "1";
	}else{
		echo "0";
	}
}
?>