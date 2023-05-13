<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
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
							<h1 class="m-0 text-dark">Category</h1>
						</div><!-- /.col -->
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="#">Home</a></li>
								<li class="breadcrumb-item">Category</li>
							</ol>
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.container-fluid -->
			</div>
			<section class="content">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-md-8">
							<div class="card">
								<div class="card-body">
									<form action="" method="post" id="insert_cat" accept-charset="utf-8">
										<h5>Add Category</h5><hr>
										<div class="form-row">
											<div class="form-group col-md-6">
												<input type="text" name="name" class="form-control" placeholder="Category Name" required>
											</div>
											<div class="form-group col-md-6">
												<input type="text" name="number" class="form-control" placeholder="Category  Number ID" >
											</div>
										</div>

										<div class="modal-footer">
											<div class="spinner-grow spinner-grow-sm text-warning spin_in"></div>
											<div class="spinner-grow text-success spin_in"
											style="width:20px; height:20px;"></div>
											<div class="spinner-grow text-danger spin_in"></div>
											<button class="btn btn-info" id="btncat_in">submit</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>

					<div class="row justify-content-center">
						<div class="col-md-8">
							<div class="card">
								<div class="card-body">
									<table class="table table-bordered table-inverse table-striped table-sm table-responsive-sm"  id="example">
										<thead class="text-nowrap align-middle">
											<tr>
												<th>No.</th>
												<th>Category Name</th>
												<th>Category Number ID</th>
												<th>Manages 
												<div class="spinner-grow spinner-grow-sm text-warning spin_del"></div>
												<div class="spinner-grow spinner-grow-sm text-danger spin_del"></div>
												</th>
											</tr>
										</thead >
										<tbody class="text-nowrap align-middle">  
											<?php $sql = mysqli_query($conn,"SELECT * FROM category_db");
											$i=1;
											while ($rs = mysqli_fetch_assoc($sql)) { ?>
												<tr>
													<td><?=$i;?></td>
													<td><?=$rs['CAT_Name1']?></td>
													<td><?=$rs['CAT_number'] == "" ? "-" : $rs['CAT_number'];?></td>
													<td>
														<a href="" class="btn btn-warning btn-sm up_cat"
														data-toggle = "modal"
														data-target = "#update_cat"
														data-id 	= "<?=$rs['CAT_ID'];?>"
														data-name 	= "<?=$rs['CAT_Name1'];?>"
														data-number = "<?=$rs['CAT_number'];?>"
														>Update</a>
														<a href="" class="btn btn-danger btn-sm del_cat"
														data-id = "<?=$rs['CAT_ID']?>"
														>Delete</a>
													</td>
												</tr> 
												<?php $i++; }  ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>

					</div>
				</section>

			</div>



			<?php require_once '../footer/footer.php'; require_once 'modal.php'; ?>

		</div>
		<?php require_once '../js/link_js.php'; ?>
		<script type="text/javascript" src="ajax.js"></script>
		<script type="text/javascript">

			$(document).ready(function(){
				/*"paging": true,
				"lengthChange": true,
				"searching": true,
				"ordering": true,
				"info": true,
				"autoWidth": false,*/
				$('#example').DataTable({
					lengthChange: true,
					"sPaginationType" : 'full_numbers', 'sPaging' : 'pagination',
					"drawCallback": function () {
						$('.dataTables_paginate > .pagination').addClass('pagination-sm')

					}

				});


			});
		</script>
	</body>
	</html>