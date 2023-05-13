<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">

	<title>Souqmajid</title>

	<?php require_once '../css/link_css.php'; ?>
	
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
	<div class="wrapper">
		<?php require_once '../menu/menu.php'; ?>
		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<div class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1 class="m-0 text-dark">Add Product</h1>
						</div><!-- /.col -->
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="#">Home</a></li>
								<li class="breadcrumb-item ">Add Product</li>
							</ol>
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.container-fluid -->
			</div>
			<!-- /.content-header -->

			<!-- Main content -->
			<section class="content">
				<div class="container-fluid">
					<!-- Info boxes -->
					<div class="row">
						<div class="col-12 col-sm-6 col-md-12">
							<div class="card">
								<div class="card-body">
									<h5>Add Product</h5>
									<hr>
									<form  id="insert_pro" name="insert_pro" method="post" enctype="multipart/form-data">
										<div class="form-row">
											
											<div class="form-group col-md-12">
												<label for="inputState">Type Product </label><strong class="text-danger"> *</strong>
												<select name="type_id" class="form-control select2_type" style="width: 100%" id="reset_select2" required>
													<option value="">--- Type ---</option>
													<?php $sql = mysqli_query($conn,"SELECT * FROM type_db ")or die(mysqli_error($conn));
													while ($rs = mysqli_fetch_assoc($sql)) { ?>
														<option value="<?=$rs['TYPE_ID']?>"><?=$rs['TYPE_Name1']?></option>
													<?php } ?>  
												</select>
											</div>
										</div>
										<div class="form-row">
											<div class="form-group col-md-6">
												<label for="inputAddress">Thai ProductName</label>
												<input type="text" class="form-control" name="pd_name1" placeholder="Product Name Thai" >
											</div>
											<div class="form-group col-md-6">
												<label for="inputAddress2">English ProductName </label>
												<input type="text" class="form-control" name="pd_name2" placeholder="Product Name English" >
											</div>
										</div>
										<div class="form-row">
											<div class="form-group col-md-6">
												<label for="inputCity">Price</label><strong class="text-danger"> *</strong>
												<input type="number" class="form-control" name="pd_pirce" placeholder="Price" required>
											</div>
											<div class="form-group col-md-6">
												<label for="inputCity">Discount %</label>
												<input type="number" class="form-control" name="pd_discount" id="keyup_discount" placeholder="Discount 10 20 30" >
											</div>
											<div class="form-group col-md-6">
												<label for="inputCity">Stock</label><strong class="text-danger"> *</strong>
												<input type="number" class="form-control" name="stock" placeholder="Stock" required>
											</div>
											<div class="form-group col-md-6">
												<label for="inputCity">PriceSell</label>
												<input type="number" class="form-control" name="pd_pricesell" id="keyup_pricesell" placeholder="PriceSell" >
											</div>

											<div class="form-group col-md-6">
												<label for="inputState">Promotion</label>
												<input type="text" class="form-control" name="pd_promotion" placeholder="Promotion" >
											</div>
											<div class="form-group col-md-6">
												<label for="inputState">Condition</label>
												<input type="text" class="form-control" name="pd_condition" placeholder="Condition" >
											</div>
											<div class="form-group col-md-6">
												<label for="inputCity">Detail</label><strong class="text-danger alert_detail"> *</strong>
											<textarea class="textarea form-control" name="detail"></textarea>
											</div>
											<div class="form-group col-md-6">
												<div class="custom-file-container" data-upload-id="myUniqueUploadId">
													<label>Limit Images 8 to Uploads <strong class="text-danger"> * </strong> <a href="javascript:void(0)"  class="custom-file-container__image-clear" title="Clear Image">Cancel <i class="fa fa-ban"></i></a>
													</label>
													<label class="custom-file-container__custom-file" >
														<input type="file" id="clear" class="custom-file-container__custom-file__custom-file-input" name="file[]" accept="image/*" multiple aria-label="Choose File" required>
														<span class="custom-file-container__custom-file__custom-file-control"></span>
													</label>
													<div class="custom-file-container__image-preview mx-auto"  style="height: 175px; width: 200px;"></div>
												</div>
											</div>

											<div class="form-group col-md-12">
												<div class="progress" style="height: 12px;">
													<div  class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar"
													style="width:0%" id="pro_in"><span  id="percen">0%</span></div>
												</div>
											</div>
										</div>

										<div class="modal-footer"> 
											<div class="spinner-grow spinner-grow-sm text-warning"></div>
											<div class="spinner-grow text-success" style="width:20px; height:20px;"></div>
											<div class="spinner-grow text-danger"></div>
											<button type="submit" class="btn btn-info" id="btnpro_in">submit</button>
											<button type="reset" class="btn btn-secondary clear_insert">
											<i class="fa fa-fw  fa-times-circle"></i> Clear</button>
										</div>
									</form>
								</div>
							</div>
						</div>

						<div class="col-md-12">
							<div class="card">
								<div class="card-body">
									<style type="text/css" media="screen">
										table{
											font-size: 14px;
										}
									</style>
									<table class="table table-responsive table-inverse table-sm table-striped table-bordered" id="data">
										<thead class="text-nowrap align-middle">
											<tr >
												<th>No.</th>
												<th>NUMBER ID</th>
												<th>TYPE NAME</th>
												<th>CATEGORY NAME</th>
												<th>PRODUCTNAME</th>
												<th>PRICE</th>
												<th>PRICE SELL</th>
												<th>DISCOUNT</th>
												<th>STOCK</th>
												<th>PROMOTION</th>
												<th>CONDITION</th>
												<th>DETAIL</th>
												<th>IMAGES</th>
												<th>MANAGES</th>
											</tr>
										</thead>
										<tbody class="text-nowrap align-middle">
											<?php $sql = mysqli_query($conn,"SELECT * FROM product_db a 
												INNER JOIN type_db b 
												ON a.type_id = b.type_id
												INNER JOIN category_db c 
												ON b.cat_id = c.cat_id
												order by a.pd_id desc")OR die(mysqli_error($conn));
											$i = 1;
											while ($rs = mysqli_fetch_assoc($sql)) {
												?>
												<tr>
													<td><?=$i;?></td>
													<td><?=$rs['PD_Number']?></td>
													<td><?=$rs['TYPE_Name1']?></td>
													<td><?=$rs['CAT_Name1']?></td>
													<td><?=$rs['PD_Name1'];?>
													<?php if($rs['PD_Name2']){ echo "(".$rs['PD_Name2'].")";}?></td>
													<td><?=$rs['PD_Price']?></td>
													<td><?=$rs['PD_PriceSell']?></td>
													<td><?=$rs['PD_Discount'] == "" ? "-" : $rs['PD_Discount']."%";?></td>
													<td><?=$rs['Stock']?></td>
													<td><?=$rs['PD_Promotion']?></td>
													<td><?=$rs['PD_Condition']?></td>
													<td><a href="" 
														class="preview_detail" 
														data-target="#preview_detail"
														data-id ="<?=$rs['PD_ID']?>"
														data-toggle="modal">view</a>
													</td>
													<td>
														<a href=""
														class="preview_images" 
														data-target="#preview_images"
														data-id = "<?=$rs['PD_ID']?>"
														data-toggle="modal">view</a>
													</td>
													<td>
														<button class="btn btn-sm btn-warning edit_pro"
														data-toggle = "modal"
														data-target ="#edit"
														data-id = "<?=$rs['PD_ID']?>"
														data-type_id = "<?=$rs['TYPE_ID']?>"
														data-pd_name1 = "<?=$rs['PD_Name1']?>"
														data-pd_name2 = "<?=$rs['PD_Name2']?>"
														data-pd_price = "<?=$rs['PD_Price']?>"
														data-pd_pricesell = "<?=$rs['PD_PriceSell']?>"
														data-pd_discount = "<?=$rs['PD_Discount']?>"
														data-stock = "<?=$rs['Stock']?>"
														data-pd_promotion = "<?=$rs['PD_Promotion']?>"
														data-pd_condition = "<?=$rs['PD_Condition']?>"
														>แก้ไข</button>
														<a href="" class="btn btn-sm btn-danger del_pro"
														data-id = "<?=$rs['PD_ID']?>"
														>ลบ</a>
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
				<!-- /.content -->
			</div>
			<!-- /.content-wrapper -->
			<?php require_once '../footer/footer.php'; require_once 'modal.php'; ?>
		</div>
		<?php require_once '../js/link_js.php'; ?>
		<script type="text/javascript" src="javascript.js"></script>
		<script type="text/javascript" src="ajax.js"></script>
		
		<script type="text/javascript">
			$(document).ready(function() {
				$('.select2_type').select2({
					theme: 'bootstrap4'
				});	
			});
		</script>
	</body>
	</html>
