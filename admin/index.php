<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>AdminLTE 3 | Log in</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- icheck bootstrap -->
	<link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="dist/css/adminlte.min.css">
	<!-- Google Font: Source Sans Pro -->
	
</head>

<?php require_once '../config.php';
if(isset($_POST['user']) && isset($_POST['pass'])){
	
	 $user = mysqli_escape_string($conn,$_POST['user']);
	 $pass = mysqli_escape_string($conn,$_POST['pass']);

	$sql = "SELECT username FROM user WHERE   username = '$user' and password = '$pass'";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	$active = $row['username'];

	$count = mysqli_num_rows($result);

	if($count == 1) {
   //session_register("username");
		$_SESSION['login'] = $active;
		header("Location: home/index.php");
	}else {
		echo "<script> alert ('รหัสผ่านไม่ถูกต้อง');</script>";

	}

}
?>

<body class="hold-transition login-page">
	<div class="login-box">
		<div class="login-logo">
			<img src="../img/logo_light.png" alt=""></a>
		</div>
		<!-- /.login-logo -->
		<div class="card">
			<div class="card-body login-card-body">
				<p class="login-box-msg">Sign In</p>

				<form action="index.php" method="post">
					<div class="input-group mb-3">
						<input type="text" name="user" class="form-control" placeholder="USERNAEM">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-user-alt"></span>
							</div>
						</div>
					</div>
					<div class="input-group mb-3">
						<input type="password" name="pass" class="form-control" placeholder="PASSWORD">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-lock"></span>
							</div>
						</div>
					</div>
					<hr>
					<div class="row justify-content-center">

						<!-- /.col -->
						<div class="col-4 ">
							<button type="submit" class="btn btn-primary btn-block">Sign In</button>
						</div>
						<!-- /.col -->
					</div>
				</form>

				<!-- jQuery -->
				<script src="plugins/jquery/jquery.min.js"></script>
				<!-- Bootstrap 4 -->
				<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
				<!-- AdminLTE App -->
				<script src="dist/js/adminlte.min.js"></script>

			</body>
			</html>
