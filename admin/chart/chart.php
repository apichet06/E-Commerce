<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title></title>
	<?php require_once '../css/link_css.php'; ?>
	<style type="text/css">
		.table{
			font-size: 13px;
		}
	</style>
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
							<h1 class="m-0 text-dark">Chart</h1>
						</div><!-- /.col -->
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="#">Home</a></li>
								<li class="breadcrumb-item active">Chart</li>
							</ol>
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.container-fluid -->
			</div>
			<section class="content">
				<div class="container-fluid">
					<div class="row justify-content-lg-center">
						<!-- <div class="col-md-9">
							<div class="card">
								<div class="card-body">
									<strong>Top 20 Outstanding product list of the month (20 อันดับ สินค้าขายดี ประจำเดือน)</strong>
									<hr>
									<table class="table table-bordered table-sm table-responsive-sm example">
										<thead>
											<tr>
												<th>No.</th>
												<th>Product ID</th>
												<th>Product name</th>
												<th>Number</th>
											</tr>
										</thead>
										<tbody>
											<?php $m = date("m");
											$sql = mysqli_query($conn,"SELECT b.PD_Name1,b.PD_Name2,b.PD_Number,sum(a.o_qty)as sum_pro FROM order_db a 
												INNER JOIN product_db b
												ON a.pd_id = b.pd_id
												Where month(a.o_date) = '$m'
												Group by a.pd_id
												Order by max(a.o_qty) desc limit 20")or die(mysqli_error($conn));
											$i=1;
											while ($rs = mysqli_fetch_assoc($sql)){ ?>
												<tr>
													<td><?=$i;?></td>
													<td><?=$rs['PD_Number']?></td>
													<td><?=$rs['PD_Name1']." ".$rs['PD_Name2']?></td>
													<td><?=$rs['sum_pro']?></td>
												</tr>
												<?php $i++; } ?>
											</tbody>
										</table>
										
									</div>
								</div>
							</div> -->
						</div>
					</div>
				</section>
			</div>
			<?php require_once '../footer/footer.php'; ?>
		</div>
		<?php require_once '../js/link_js.php'; ?>
	</body>
	</html>