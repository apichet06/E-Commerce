<meta charset='utf-8'>
<?php

require_once "config.php";

require_once "PHPMailer/src/PHPMailer.php";
require_once "PHPMailer/src/SMTP.php";

// error_reporting(E_ALL);
// ini_set("display_errors", 1);


$from = "souqmajid.qt@gmail.com";

$mail = new PHPMailer\PHPMailer\PHPMailer();
$mail->IsSMTP(); // enable SMTP

$mail->Debugoutput = 'html';
$mail->CharSet = "UTF-8";
$mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail  tls , ssl
$mail->Host = "smtp.gmail.com";
$mail->Port = 465; // or 587 , 465
$mail->IsHTML(true);
$mail->Username = "$from";
$mail->Password = "DevX@2020";
// $mail->SetFrom("$from");
$mail->SetFrom("$from","[Automatic E-mail] Souqmajid ");
// $mail->AddCC('sk.lerdsappasuk@gmail.com');




// get Email ปลายทาง
//$EmailTo = 'apichet06@gmail.com';
$EmailTo = 'apichet1.1@hotmail.co.th';




$subject = "[Souqmajid] Registration Confirmation Email";
$msg .= "<meta charset='utf-8'>";
$msg .= "Click link <a href='https://devx.co.th'>ยืนยันที่นี้</a> ";
$msg .= "รายการ นี้มาจาก souqmajid" ;


$mail->Subject = $subject;

$mail->Body = $msg;


$mail->AddAddress($EmailTo);
$mail->Send();


// if(!$mail->Send()) {
//     echo "Mailer Error: " . $mail->ErrorInfo;
// } else {
//     echo "Message sent!";
// }

if (isset($_GET['page'])) {
  // $page = $_GET['page'];

  echo "<script type=\"text/javascript\">parent.PassForm();</script>";
  
}

?>