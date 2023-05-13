<?php @session_start();
require_once 'config.php';
//require_once 'PHPMailer/src/PHPMailer.php';
//require_once 'PHPMailer/src/SMTP.php';

if ($_POST['register'] == "register") {
	$number = "MB".date("Ymdims");
	$username = $_POST['register_name'];
	$register_password = $_POST['register_password'];
	$sql0 = mysqli_query($conn,"SELECT * FROM member_db Where username = '$username' ");
	$row  = mysqli_num_rows($sql0);

	if($row >="1"){

		$show = "01";

	}else{

		$date = date("Y-m-d");
		$sql  = mysqli_query($conn,"INSERT INTO member_db (m_number,username,m_password,m_date,m_email)
			VALUES('$number','$username','$register_password','$date','$username')");

		if($sql){

			$show = "1";
		}
	} 
	$data = array('data_register' => $show );
	echo json_encode($data);

// 	$from = "souqmajid.qt@gmail.com";

// 	$mail = new PHPMailer\PHPMailer\PHPMailer();
// $mail->IsSMTP(); // enable SMTP

// $mail->Debugoutput = 'html';
// $mail->CharSet = "UTF-8";
// $mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
// $mail->SMTPAuth = true; // authentication enabled
// $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail  tls , ssl
// $mail->Host = "smtp.gmail.com";
// $mail->Port = 465; // or 587 , 465
// $mail->IsHTML(true);
// $mail->Username = "$from";
// $mail->Password = "DevX@2020";
// // $mail->SetFrom("$from");
// $mail->SetFrom("$from","[Automatic E-mail] Souqmajid ");
// // $mail->AddCC('sk.lerdsappasuk@gmail.com');

// // get Email ปลายทาง
// $EmailTo = 'apichet06@gmail.com';


// $subject = "[Souqmajid] Registration Confirmation Email";
// $msg = "<meta charset='utf-8'>";
// $msg = "Click link <a href='https://devx.co.th'>ยืนยันที่นี้</a> " ;


// $mail->Subject = $subject;

// $mail->Body = $msg;


// $mail->AddAddress($EmailTo);
// $mail->Send();



}

if($_POST['login'] == "login"){
	if(isset($_POST['user']) && isset($_POST['pass'])){

		$user = mysqli_escape_string($conn,$_POST['user']);
		$pass = mysqli_escape_string($conn,$_POST['pass']);

		$sql = "SELECT m_number FROM member_db WHERE   username = '$user' and m_password = '$pass'";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		$active = $row['m_number'];

		$count = mysqli_num_rows($result);

		if($count == 1) {
   			//session_register("username");
			$_SESSION['login_user'] = $active;
			$show =  "1";

		}else {

			$show = "0";
		}

		$data = array('data_login' => $show );
		echo json_encode($data);
	}
}
?>