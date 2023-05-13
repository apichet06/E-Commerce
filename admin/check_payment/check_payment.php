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
							<h1 class="m-0 text-dark">Check Payment</h1>
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
						<div class="col-md-9">
							<div class="card">
								<div class="card-body">
									<?php $sql0 = mysqli_query($conn,"SELECT sum(a.pd_price*a.o_qty)as sum_order,a.po_id,b.m_address,b.m_name,b.m_lname,b.m_tol,c.*
										FROM order_db a 
										INNER JOIN member_db b 
										ON b.m_id = a.m_id
										INNER JOIN po_payment c 
										ON a.po_id = c.po_id 
										WHERE a.po_id = '".$_GET['po']."' ");
									$rs0 = mysqli_fetch_assoc($sql0);
									?>
									<div class="row justify-content-end">
										<div class="col-md-11">
											<strong>Check Payment #<?=$rs0['po_id']?></strong>
										</div>
										<div class="col-1">
											<a href="../home/index.php" title="back" data-toggle="tooltip" data-placement="top"><i class="fa fa-reply-all"></i></a>
										</div>
									</div>
									<hr>
									<table class="table table-bordered  table-responsive-sm ">
										<thead class="text-nowrap align-middle">
											<tr>
												<th>No.</th>
												<th>Product ID</th>
												<th>Product name</th>
												<th>QTY</th>
												<th>Total</th>
											</tr>
										</thead>
										<tbody class="text-nowrap align-middle">
											<?php $sql = mysqli_query($conn,"SELECT b.pd_number,b.pd_name1,a.o_qty,a.pd_price FROM order_db a 
												INNER JOIN product_db b 
												ON a.pd_id = b.pd_id
												Where a.po_id  = '".$_GET['po']."' ")or die(mysqli_error($conn)); 
											$i=1;
											while ($rs = mysqli_fetch_assoc($sql)) { ?>
												<tr>
													<td><?=$i;?></td>
													<td><?=$rs['pd_number']?></td>
													<td><?=$rs['pd_name1']." ".$rs['pd_name2']?></td>
													<td class="text-center"><?=$rs['o_qty']?></td>
													<td><?="$".number_format($rs['pd_price'] * $rs['o_qty']);?></td>
												</tr>
												<?php $i++; } ?>
											</tbody>
										</table>
									<hr>
											<div class="row justify-content-center">
												<div class="col-md-5 p-2">
													<div class="card">
														<div class="card-body">
															<img src="../../images_payment/<?=$rs0['img_payment']?>" width="100%">
														</div>
													</div>
												</div>
											</div>
											
											

										<hr>
										<table class="table table-responsive-sm">
											<thead class="text-nowrap align-middle">
												<tr>
													<th><strong>Customer :</strong> <?=$rs0['m_name']." ".$rs0['m_lname']?></th>
													<th><strong>Tel. : </strong><?=$rs0['m_tol']?></th>
													<th>Total amount : <?="$".number_format($rs0['sum_order']);?></th>
												</tr>
											</thead>
										</table>
										<div class="modal-footer">
											<input type="text" name="id" id="id_pprove" value="<?=$rs0['po_id']?>" hidden>
											<button type="submit" class="btn btn-danger" onclick="not_approve()">Not Approve</button>
											<button type="submit" class="btn btn-success" onclick="approve()">Approve</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
			<?php require_once '../footer/footer.php'; ?>
		</div>
		<?php require_once '../js/link_js.php'; ?>
		<script type="text/javascript" src="ajax.js" ></script>
	</body>
	</html>