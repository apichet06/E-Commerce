<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title></title>
	<?php require_once '../css/link_css.php'; ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
	<div class="wrapper">
		<?php require_once '../menu/menu.php' ?>
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<div class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1 class="m-0 text-dark">User Manages</h1>
						</div><!-- /.col -->
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="#">Home</a></li>
								<li class="breadcrumb-item active">User</li>
							</ol>
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.container-fluid -->
			</div>
			<section class="content">
				<div class="container-fluid">
					<div class="row justify-content-center">
						<div class="col-md-8">
							<div class="card">
								<div class="card-body">
									<h5>Add User</h5><hr>
									<form  method="post" accept-charset="utf-8" id="insert_user">
										<div class="form-row">
											<div class="form-group col-md-6">
												<label for="inputEmail4">User Name</label>
												<input type="text" name="u_name" class="form-control" placeholder="User Name">
											</div>
											<div class="form-group col-md-6">
												<label for="inputPassword4">Last Name</label>
												<input type="text" name="u_lname" class="form-control" placeholder="Last Name">
											</div>
											<div class="form-group col-md-6">
												<label for="inputAddress2">User Login</label>
												<input type="text" name="username" class="form-control" placeholder="User Login">
											</div>
											<div class="form-group col-md-6">
												<label for="inputAddress">Status</label>
												<select name="status" class="form-control">
													<option value="">--- Choose Status ---</option>
													<option value="admin">Admin</option>
													<option value="sell">Sell</option>
												</select>
											</div>

										</div>
										<div class="modal-footer">
											<div class="spinner-grow spin_in spinner-grow-sm text-warning"></div>
											<div class="spinner-grow spin_in text-success" style="width:20px; height:20px;"></div>
											<div class="spinner-grow spin_in text-danger"></div>
											<!-- <button type="reset" class="btn btn-secondary">Clear</button> -->
											<button type="submit" id="btn_in" class="btn btn-primary">Submit</button>
										</div>
									</form>
								</div>
							</div>
						</div>

						<div class="col-md-8">
							<div class="card">
								<div class="card-body">
									<table class="table table-striped table-hover table-bordered table-sm">
										<thead>
											<tr>
												<th>No.</th>
												<th>Username Lastname</th>
												<th>User Login</th>
												<th>Status</th>
												<th>Date</th>
												<th>Manages
									<div class="spinner-grow spin_del spinner-grow-sm text-danger"></div>
									<div class="spinner-grow spin_del spinner-grow-sm text-danger"></div>
									<div class="spinner-grow spin_del spinner-grow-sm text-danger"></div>
								</th>
											</tr>
										</thead>
										<tbody>
											<?php $sql = mysqli_query($conn,"SELECT * FROM user where User_ID != 1");
											$i = 1;
											while ($rs = mysqli_fetch_assoc($sql)) { ?>
												<tr>
													<td><?=$i;?></td>
													<td><?="K.".$rs['U_Name']." ".$rs['U_Lname'];?></td>
													<td><?=$rs['username'];?></td>
													<td><?=$rs['U_Status'];?></td>
													<td><?=$rs['U_Date']?></td>
													<td>
														<a href="" 
														class="btn btn-sm btn-warning update"
														data-id= "<?=$rs['User_ID']?>"
														data-name= "<?=$rs['U_Name']?>"
														data-lname= "<?=$rs['U_Lname']?>"
														data-username= "<?=$rs['username']?>"
														data-status= "<?=$rs['U_Status']?>"
														data-target="#update"
														data-toggle="modal"
														>Update</a> 
														<a href=""
														class="btn btn-sm btn-danger del"
														data-id= "<?=$rs['User_ID']?>"
														>Delete</a>
													</td>
												</tr>
												<?php $i++; } ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>

			<?php require_once 'modal.php'; require_once '../footer/footer.php';  ?>
		</div>
		<?php require_once '../js/link_js.php'; ?>
		<script type="text/javascript" src="ajax.js"></script>
	</body>
	</html>