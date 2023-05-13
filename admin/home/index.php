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
							<h1 class="m-0 text-dark">Dashboard</h1>
						</div><!-- /.col -->
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="#">Home</a></li>
								<li class="breadcrumb-item active">Dashboard</li>
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
									<strong>List of purchase orders today (รายการสั่งซื้อวันนี้)</strong>
									<hr>
									<table class="table table-bordered table-sm table-responsive-sm example">
										<thead>
											<tr>
												<th>No.</th>
												<th>Buyer name</th>
												<th>Order number</th>
												<th>Date</th>
											</tr>
										</thead>
										<tbody>
											<?php $date = date("Y-m-d");
											$sql = mysqli_query($conn,"SELECT * FROM po_payment a 
												INNER JOIN member_db b 
												ON a.m_id = b.m_id
												Where date(a.po_date) ='$date'
												Group by a.po_id ")or die(mysqli_error($conn));
											$i=1;
											while ($rs = mysqli_fetch_assoc($sql)){ ?>
												<tr>
													<td><?=$i;?></td>
													<td><?=$rs['m_name']." ".$rs['m_lname']?></td>
													<td><?=$rs['po_id']?></td>
													<td><?=$rs['po_date']?></td>
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
										<strong>Items pending payment verification (รายการที่รอตรวจสอบการชำระเงิน) </strong>
										<hr>
										<table class="table table-bordered table-sm table-responsive-sm example">
											<thead>
												<tr>
													<th>No.</th>
													<th>Buyer name</th>
													<th>Order number</th>
													<th>Payment status</th>
													<th>Date</th>
												</tr>
											</thead>
											<tbody>
												<?php 
												$sql = mysqli_query($conn,"SELECT * FROM po_payment a 
													INNER JOIN member_db b 
													ON a.m_id = b.m_id
													Where a.status_payment='Checking payment' and a.po_status_check = ''
													Group by a.po_id ")or die(mysqli_error($conn));
												$i=1;
												while ($rs = mysqli_fetch_assoc($sql)){ ?>
													<tr>
														<td class="text-center"><?=$i;?></td>
														<td><?=$rs['m_name']." ".$rs['m_lname']?></td>
														<td><a href="../check_payment/check_payment.php?po=<?=$rs['po_id']?>"><?=$rs['po_id']?></a></td>
														<td><strong class="text-warning">Awaiting review</strong></td>
														<td><?=$rs['po_date']?></td>
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
											<strong>Paid products (รายการที่ชำระเงินแล้ว) </strong>
											<hr>
											<table class="table table-bordered table-sm table-responsive-sm example">
												<thead>
													<tr>
														<th>No.</th>
														<th>Buyer name</th>
														<th>Order number</th>
														<th>Payment status</th>
														<th>Date</th>
													</tr>
												</thead>
												<tbody>
													<?php 
													$sql = mysqli_query($conn,"SELECT * FROM po_payment a 
														INNER JOIN member_db b 
														ON a.m_id = b.m_id
														Where a.po_status_check = '1'  and a.po_delivery=''
														Group by a.po_id ")or die(mysqli_error($conn));
													$i=1;
													while ($rs = mysqli_fetch_assoc($sql)){ ?>
														<tr>
															<td class="text-center"><?=$i;?></td>
															<td><?=$rs['m_name']." ".$rs['m_lname']?></td>
															<td><a href="../order_print/order_print.php?po=<?=$rs['po_id']?>"><?=$rs['po_id']?></a></td>
															<td><strong class="text-success">Payment success</strong></td>
															<td><?=$rs['date_check']?></td>
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
												<strong>Failed check (ไม่ผ่านการตรวจสอบ)</strong>
												<hr>
												<table class="table table-bordered table-sm table-responsive-sm example">
													<thead>
														<tr>
															<th>No.</th>
															<th>Buyer name</th>
															<th>Order number</th>
															<th>Payment status</th>
															<th>Date</th>
														</tr>
													</thead>
													<tbody>
														<?php $sql = mysqli_query($conn,"SELECT * FROM po_payment a 
															INNER JOIN member_db b 
															ON a.m_id = b.m_id
															Where a.po_status_check = '0'
															Group by a.po_id ")or die(mysqli_error($conn));
														$i=1;
														while ($rs = mysqli_fetch_assoc($sql)){ ?>
															<tr>
																<td><?=$i;?></td>
																<td><?=$rs['m_name']." ".$rs['m_lname']?></td>
																<td><a href="../check_payment/check_payment.php?po=<?=$rs['po_id']?>"><?=$rs['po_id']?></a></td>
																<td><strong class="text-danger">Payment failed</strong></td>
																<td><?=$rs['po_date']?></td>
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
													<strong>Delivery is complete (การส่งเสร็จสมบูรณ์)</strong>
													<hr>
													<table class="table table-bordered table-sm table-responsive-sm example">
														<thead>
															<tr>
																<th>No.</th>
																<th>Buyer name</th>
																<th>Order number</th>
																<th>status</th>
																<th>Deliver on</th>
															</tr>
														</thead>
														<tbody>
															<?php $date = date("Y-m-19");
															$sql = mysqli_query($conn,"SELECT * FROM po_payment a 
																INNER JOIN member_db b 
																ON a.m_id = b.m_id
																Where a.po_status_check = '1'  and a.po_delivery!=''
																Group by a.po_id ")or die(mysqli_error($conn));
															$i=1;
															while ($rs = mysqli_fetch_assoc($sql)){ ?>
																<tr>
																	<td class="text-center"><?=$i;?></td>
																	<td><?=$rs['m_name']." ".$rs['m_lname']?></td>
																	<td><a href="../order_print/order_print.php?po=<?=$rs['po_id']?>"><?=$rs['po_id']?></a></td>
																	<td><strong class="text-success">Delivery is complete</strong></td>
																	<td><?=$rs['date_delivery']?></td>
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
														<strong>Not Paid Orders (สั่งซื้อแล้ว แต่ยังไม่ชำระเงิน)</strong>
														<hr>
														<table class="table table-bordered table-sm table-responsive-sm example">
															<thead>
																<tr>
																	<th>No.</th>
																	<th>Buyer name</th>
																	<th>Order number</th>
																	<th>status</th>
																	<th>Deliver on</th>
																</tr>
															</thead>
															<tbody>
																<?php $date = date("Y-m-19");
																$sql = mysqli_query($conn,"SELECT * FROM po_payment a 
																	INNER JOIN member_db b 
																	ON a.m_id = b.m_id
																	Where po_bank =''
																	Group by a.po_id ")or die(mysqli_error($conn));
																$i=1;
																while ($rs = mysqli_fetch_assoc($sql)){ ?>
																	<tr>
																		<td class="text-center"><?=$i;?></td>
																		<td><?=$rs['m_name']." ".$rs['m_lname']?></td>
																		<td><a href="../order_print/order_print.php?po=<?=$rs['po_id']?>"><?=$rs['po_id']?></a></td>
																		<td><strong class="text-danger">Not Paid</strong></td>
																		<td><?=$rs['po_date'];?></td>
																	</tr>
																	<?php $i++; } ?>
																</tbody>
															</table>
														</div>
													</div>
												</div>

												<div class="col-md-12">
													<div class="card">
														<div class="card-body">
															<strong>Out of stock items (Not over 5)(สินค้าใกล้หมด)</strong>
															<hr>
															<table class="table table-bordered table-sm table-responsive-sm example">
																<thead class="align-middle ">
																	<tr>
																		<th>No.</th>
																		<th>Seller</th>
																		<th>Product name</th>
																		<th>Stock</th>
																	</tr>
																</thead>
																<tbody class="align-middle">
																	<?php $date = date("Y-m-19");
																	$sql = mysqli_query($conn,"SELECT a.pd_name1,a.stock,b.u_name,b.u_lname,a.pd_name2,a.pd_id
																		FROM product_db a 
																		INNER JOIN user b 
																		ON a.user_create = b.user_id
																		Where a.stock <= 5
																		Order by a.stock ")or die(mysqli_error($conn));
																	$i=1;
																	while ($rs = mysqli_fetch_assoc($sql)){ ?>
																		<tr>
																			<td class="text-center"><?=$i;?></td>
																			<td>

																				<?=$rs['u_name']." ".$rs['u_lname']?>

																			</td>
																			<td>
																				<a href="" class="update_stock" 
																				data-toggle="modal" 
																				data-target="#modal_stock"
																				data-id="<?=$rs['pd_id']?>"
																				data-name="<?=$rs['pd_name1'].' '.$rs['pd_name2']?>"
																				data-stock="<?=$rs['stock']?>"
																				data-id="<?=$rs['pd_id']?>">
																				<?=$rs['pd_name1']." ".$rs['pd_name2']?>
																			</a>
																		</td>
																		<td class="text-center"><?=$rs['stock']?></td>
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
								<?php require_once 'modal.php'; require_once '../js/link_js.php';  ?>
								<script type="text/javascript" src="ajax.js"></script>
							</div>
						</body>
						</html>