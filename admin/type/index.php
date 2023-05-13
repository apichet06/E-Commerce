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
							<h1 class="m-0 text-dark">Porduct Type</h1>
						</div><!-- /.col -->
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="#">Home</a></li>
								<li class="breadcrumb-item active">Porduct Type</li>
							</ol>
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.container-fluid -->
			</div>
			<section class="content">
				<div class="container-fluid">
					<div class="row justify-content-center">
						<div class="col-md-7">
							<div class="card">
								<div class="card-body">
									<h5>Add Product Type</h5><hr>
									<form id="insert" method="post" accept-charset="utf-8">
										<div class="row">
											<div class="form-group col-md-12">
												<select name="cat_id" class="form-control cat_id" required>
													<option value="">--- Category Choose ---</option>
													<?php $sql = mysqli_query($conn,"SELECT * FROM category_db  
														Order by CAT_ID DESC");
													while ($rs = mysqli_fetch_assoc($sql)) {
														echo "<option value=\"".$rs['CAT_ID']."\">".$rs['CAT_Name1']."</option>";
													} ?>	
												</select>
											</div>
											<div class="form-group col-md-6">
												<input type="text" name="type_name1" class="form-control" placeholder="Type Name1" required>
											</div>
											<div class="form-group col-md-6">
												<input type="text" name="type_name2" class="form-control" placeholder="Type Name2">
											</div>	
										</div>
										<div  class="modal-footer">
											<div class="spinner-grow spinner-grow-sm text-warning spinner_in"></div>
											<div class="spinner-grow text-success spinner_in"
											style="width:20px; height:20px;"></div>
											<div class="spinner-grow text-danger spinner_in"></div>
											<button type="submit" id="btnpro_in" class="btn btn-info">Submit</button>
										</div>
									</form>
								</div>
							</div>
						</div>
						<div class="col-md-7">
							<div class="card">
								<div class="card-body">
									<table class="table table-sm table-bordered table-striped table-responsive-sm" id="data">
										<thead class="text-nowrap align-middle">
											<tr>
												<th>No.</th>
												<th>CategoryName</th>
												<th>Type ProductName</th>
												<th>Manages 
													<span class="spinner-grow spinner-grow-sm text-danger 
													spinner_del"></span><span class="spinner-grow spinner-grow-sm text-danger spinner_del"></span><span class="spinner-grow spinner-grow-sm text-danger spinner_del"></span>
												</th>
											</tr>
										</thead>
										<tbody class="text-nowrap align-middle">
											<?php $sql = mysqli_query($conn,"SELECT * FROM type_db a 
												left join category_db b 
												on a.cat_id = b.cat_id
												Order by  a.type_id desc"); 
											$i= 1;
											while ($rs=mysqli_fetch_assoc($sql)) { ?>
												<tr>
													<td><?=$i;?></td>
													<td><?=$rs['CAT_Name1'];?>
													<td><?=$rs['TYPE_Name1'];?> 
													<?php if($rs['TYPE_Name2']){echo " (".$rs['TYPE_Name2'].")"; };?>
												</td>
												<td>
													<a href="" class="btn btn-sm btn-warning update"
													data-type_id = "<?=$rs['TYPE_ID']?>"
													data-cat_id = "<?=$rs['CAT_ID']?>"
													data-type_name1 = "<?=$rs['TYPE_Name1']?>"
													data-type_name2 = "<?=$rs['TYPE_Name2']?>"
													data-toggle ="modal"
													data-target ="#update"
													>Update</a>
													<a href="" class="btn btn-sm btn-danger del"
													data-id = "<?=$rs['TYPE_ID']?>">Delete</a></td>	
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
			<?php require_once '../footer/footer.php'; require_once 'modal.php'; ?>
		</div>
		<?php require_once '../js/link_js.php'; ?>
		<script type="text/javascript" src="ajax.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				$('.cat_id,#cat_id').select2({
					theme: 'bootstrap4'
				});	


			});
			$("#data").dataTable({
				lengthChange: true,
				"sPaginationType" : 'full_numbers', 'sPaging' : 'pagination',
				"drawCallback": function () {
					$('.dataTables_paginate > .pagination').addClass('pagination-sm')

				}
			})
		</script>
	</body>
	</html>