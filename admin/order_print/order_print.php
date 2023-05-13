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
							<h1 class="m-0 text-dark">Order</h1>
						</div><!-- /.col -->
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="#">Home</a></li>
								<li class="breadcrumb-item active">Order</li>
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
									<div class="row justify-content-end">
										<div class="col-1">
											<a href="../home/index.php" title="back" data-toggle="tooltip" data-placement="top"><i class="fa fa-reply-all"></i></a>
										</div>
									</div>
									<?php $sql0 = mysqli_query($conn,"SELECT sum(a.pd_price*a.o_qty)as sum_order,a.po_id,b.m_address,b.m_name,b.m_lname,b.m_tol,c.*
										FROM order_db a 
										INNER JOIN member_db b 
										ON b.m_id = a.m_id
										INNER JOIN po_payment c 
										ON a.po_id = c.po_id
										WHERE a.po_id = '".$_GET['po']."' ")or die(mysqli_error($conn));
									$rs0 = mysqli_fetch_assoc($sql0);
									?>
									<table width="100%" class="table table-sm table-bordered table-responsive-sm">
										<tbody>
											<tr>
												<td rowspan ="2" class="align-middle"><img src="../../img/logo_light.png"></td>
												<td rowspan ="2" class="align-middle text-center" width="50%"><h5><strong>Order</strong></h5></td>
												<td class="text-right"><strong>Date :</strong></td>
												<td><?=date("d/m/Y"); ?></td>
											</tr>
											<tr>
												<td class="text-right"><strong>PO :</strong></td>
												<td><?=$rs0['po_id']?></td>
											</tr>
											<tr>
												<td colspan="2"><strong>Address :</strong> <?=$rs0['m_address']?></td>
												<td class="text-right"><strong>Payment :</strong></td>
												<td>Paid</td>
											</tr>
										</tbody>
									</table><hr>
									<table  width="100%" class="table table-responsive-sm">
										<thead class="table-success text-nowrap align-middle">
											<tr>
												<th>Product ID</th>
												<th>Specification</th>
												<th class="text-center">Quantity</th>
												<th class="text-right">Unit price</th>
												<th class="text-right">Money</th>
											</tr>
										</thead>
										<tbody class="text-nowrap align-middle">
											<?php $sql = mysqli_query($conn,"SELECT b.pd_number,b.pd_name1,b.pd_name2,a.o_qty,a.pd_price FROM order_db a 
												INNER JOIN product_db b 
												ON a.pd_id = b.pd_id
												Where a.po_id  = '".$_GET['po']."' ")or die(mysqli_error($conn)); 
												while ($rs = mysqli_fetch_assoc($sql)) { ?>
													<tr>
														<td><?=$rs['pd_number']?></td>
														<td><?=$rs['pd_name1']." ".$rs['pd_name2']?></td>
														<td class="text-center"><?=$rs['o_qty']?></td>
														<td class="text-right"><?="$".number_format($rs['pd_price']);?></td>
														<td class="text-right"><?="$".number_format($rs['pd_price'] * $rs['o_qty']);?></td>
													</tr>
												<?php } ?>
											</tbody>
										</table>
										<hr>
										<table class="table table-responsive-sm"  width="100%">
											<thead class="text-nowrap align-middle">
												<tr>
													<th >Customer : <?=$rs0['m_name']." ".$rs0['m_lname']?></th>
													<th width="60%">Tel. <?=$rs0['m_tol']?></th>
													<th>Total amount :</th>
													<th class="text-right"><?="$".number_format($rs0['sum_order']);?></th>
												</tr>
											</thead>

										</table>
										<div class="modal-footer">
											<strong>Delivery Confirmation > </strong> 
											<button type="button" 
											class="btn btn-primary update_po"
											data-id = "<?=$rs0['po_id']?>"
											data-toggle="modal"
											data-target="#update_delivery">Confirmed</button>
										</div>
									</div>
								</div>
							</div>
							<?php if($rs0['po_img_delivery']){ ?>
							<div class="col-md-6">
								<div class="card">
									<div class="card-body">
										<h5 class="text-center"><b>Delivery<b></h5>
										<hr>
										<p><strong>Delivery on : <?=$rs0['date_delivery']?> </strong></p>
										<img src="img/<?=$rs0['po_img_delivery'];?>" width="100%">
									</div>
								</div>
							</div>
						<?php } ?>
						</div>
					</div>
				</section>
			</div>
			<?php require_once 'modal.php'; require_once '../footer/footer.php'; ?>
		</div>
		<?php require_once '../js/link_js.php'; ?>
 <script type="text/javascript" src="ajax.js"></script>
	</body>
	</html>