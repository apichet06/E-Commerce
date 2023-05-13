<?php require_once '../../config.php';

$id 	= mysqli_escape_string($conn,$_POST['id']);
$detail = mysqli_escape_string($conn,$_POST['detail']);

if($detail == "preview_detail"){
	$sql = mysqli_query($conn,"SELECT PD_Detail FROM product_db WHERE PD_ID = '$id' ");

	$rs = mysqli_fetch_assoc($sql);
	if($rs['PD_Detail']){
		$PD_Detail = $rs['PD_Detail'];
	}else{
		$PD_Detail = "ไม่มีข้อมูล";
	}

	$data = array('PD_Detail' => $PD_Detail, 'id' => $id);
	echo  json_encode($data);
}   


$images = mysqli_escape_string($conn,$_POST['images']);
if($images == "preview_images"){
	$sql = mysqli_query($conn,"SELECT Pic1,Pic2,Pic3,Pic4,Pic5,Pic6,Pic7,Pic8 FROM product_db WHERE PD_ID = '$id' ");

	$rs = mysqli_fetch_assoc($sql);
	
	if($rs['Pic1']){ $img .= "<img src=\"uploads/".$rs['Pic1']."\" width=\"250\" class=\"img-thumbnail\">"; } 
	if($rs['Pic2']){ $img .= "<img src=\"uploads/".$rs['Pic2']."\" width=\"250\" class=\"img-thumbnail\">"; } 
	if($rs['Pic3']){ $img .= "<img src=\"uploads/".$rs['Pic3']."\" width=\"250\" class=\"img-thumbnail\">"; }	
	if($rs['Pic4']){ $img .= "<img src=\"uploads/".$rs['Pic4']."\" width=\"250\" class=\"img-thumbnail\">"; } 
	if($rs['Pic5']){ $img .= "<img src=\"uploads/".$rs['Pic5']."\" width=\"250\" class=\"img-thumbnail\">"; } 
	if($rs['Pic6']){ $img .= "<img src=\"uploads/".$rs['Pic6']."\" width=\"250\" class=\"img-thumbnail\">"; } 
	if($rs['Pic7']){ $img .= "<img src=\"uploads/".$rs['Pic7']."\" width=\"250\" class=\"img-thumbnail\">"; } 	
	if($rs['Pic8']){ $img .= "<img src=\"uploads/".$rs['Pic8']."\" width=\"250\" class=\"img-thumbnail\">"; } 


	$data = array('img' => $img);
	echo  json_encode($data);
} 

?>