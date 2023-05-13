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
							<h1 class="m-0 text-dark">Commission</h1>
						</div><!-- /.col -->
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="#">Home</a></li>
								<li class="breadcrumb-item active">Commission</li>
							</ol>
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.container-fluid -->
			</div>
			<section class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-6">
							<div class="card">
								<div class="card-body">
									<strong>Sales commission (ค่าคอมแต่ละเดือนของผู้ขาย)</strong>
									<hr>
									<table class="table table-bordered table-sm table-responsive-sm example">
										<thead>
											<tr>
												<th>No.</th>
												<th>Sell name</th>
												<th>percent</th>
												<th>QTY</th>
												<th>Total</th>
												<th>Commission</th>
												<th>Date</th>
											</tr>
										</thead>
										<tbody>
											<?php $date = date("Y-m");
											$sql = mysqli_query($conn,"SELECT a.comm_percent,a.comm_qty,SUM(a.comm_price)AS sum_price,DATE_FORMAT(comm_date,'%m-%Y')as comm_date,b.u_name,b.u_lname 
												From commission_db a 
												INNER JOIN user b
												ON a.user_id = b.user_id
												GROUP BY DATE_FORMAT(a.comm_date, '%Y-%m'),comm_percent")or die(mysqli_error($conn));
											$i=1;
											while ($rs = mysqli_fetch_assoc($sql)){ ?>
												<tr>
													<td class="text-center"><?=$i;?></td>
													<td><?=$rs['u_name']." ".$rs['u_lname']?></td>
													<td class="text-center"><?=$rs['comm_percent']?>%</td>
													<td class="text-center"><?=$rs['comm_qty']?></td>
													<td><?="$".number_format($rs['sum_price']);?></td>
													<td><?="$".number_format($rs['sum_price']*$rs['comm_percent']/100,2);?></td>
													<td><?=$rs['comm_date'];?></td>
												</tr>
												<?php $i++; } ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="card">
									<div class="card-body">
										<strong>Sales Percentages (ค่าคอมแต่ละเดือนของผู้ขาย)</strong>
										<hr>
										<table class="table table-bordered table-sm table-responsive-sm example">
											<thead>
												<tr>
													<th>No.</th>
													<th>Total income</th>
													<th>Total Sales</th>
													<th>Tottal DevX</th>
													<th>Total Katar</th>
													<th>Date</th>
												</tr>
											</thead>
											<tbody>
												<?php $date = date("Y-m");
												$sql = mysqli_query($conn,"SELECT a.comm_percent,a.comm_qty,SUM(a.comm_price)AS sum_price,DATE_FORMAT(comm_date,'%m-%Y')as comm_date,b.u_name,b.u_lname 
													From commission_db a 
													INNER JOIN user b
													ON a.user_id = b.user_id
													GROUP BY DATE_FORMAT(a.comm_date, '%Y-%m'),comm_percent")or die(mysqli_error($conn));
												$i=1;
												while ($rs = mysqli_fetch_assoc($sql)){ 
$sum_katar =$rs['sum_price']-(number_format($rs['sum_price']*$rs['comm_percent']/100,2)+number_format($rs['sum_price']*5/100,2))
													?>
													<tr>
														<td class="text-center"><?=$i;?></td>
														<td class="text-center"><?="$".number_format($rs['sum_price'])?></td>
														<td class="text-center"><?="$".number_format($rs['sum_price']*$rs['comm_percent']/100,2);?></td>
														<td class="text-center"><?="$".number_format($rs['sum_price']*5/100,2).
														" (5%)";?></td>
														<td><?="$".number_format($sum_katar,2)?></td>
														<td><?=$rs['comm_date'];?></td>
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
				<?php require_once '../footer/footer.php'; ?>
				<?php require_once '../js/link_js.php';  ?>
				<!-- <script type="text/javascript" src="ajax.js"></script> -->
			</div>
		</body>
		</html>