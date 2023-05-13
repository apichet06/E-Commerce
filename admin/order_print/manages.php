<?php  require_once '../../config.php';



        //****************************************
		//  insert images delivery  
		//****************************************
$date = date('Y-m-d');
$op_id = mysqli_real_escape_string($conn,$_POST['po_id']);
$path="img/";
$file= $_FILES['file']['name'];
$file_type=strrchr($file,'.');
$pic_name= $op_id.$id.strtoupper($file_type);
//copy($_FILES["file"]["tmp_name"],$path.$pic_name);

$images = $_FILES["file"]["tmp_name"];
$width=500;
$size=GetimageSize($images);
$height=round($width*$size[1]/$size[0]);
$extension = $_FILES["file"]["type"];
switch($extension){
	case 'image/jpg' : $images_orig = imagecreatefromjpeg($images); break;
	case 'image/jpeg': $images_orig = imagecreatefromjpeg($images); break;
	case 'image/png' : $images_orig = imagecreatefrompng($images); break;
	case 'image/gif' : $images_orig = imagecreatefromgif($images); break;
		}//switch
		$photoX = ImagesX($images_orig);
		$photoY = ImagesY($images_orig);
		$images_fin = ImageCreateTrueColor($width, $height);
		ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
		ImageJPEG($images_fin,$path.$pic_name);
		ImageDestroy($images_orig);
		ImageDestroy($images_fin);

		
		$sql = mysqli_query($conn,"UPDATE po_payment SET 
			date_delivery ='$date',
			po_delivery='Delivered on',
			po_img_delivery ='$pic_name' Where po_id = '$op_id' ")or die(mysqli_error($conn));
		if($sql){
			$show = "1";
		}else{
			$show = "0";
		}

		$data = array('data' => $show );
		echo json_encode($data);




		?>