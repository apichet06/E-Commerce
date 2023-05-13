<?php @session_start();
include("config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<?php require_once 'script.php'; ?>
	</head>
</head>
<body>
	<?php require_once 'header.php'; ?>

	<div class="ps-section--shopping ps-shopping-cart">
		<div class="container">
			<div class="ps-section__header">
				<h1>Shopping Cart</h1>
			</div>
			<div class="ps-section__content">
				<div class="table-responsive">
					<table class="table ps-table--shopping-cart">
						<thead>
							<tr>
								<th>Product name</th>
								<th>PRICE</th>
								<th>QUANTITY</th>
								<th>TOTAL</th>
								<th>Back to Shop</th>
							</tr>
						</thead>
						<tbody>
							<?php $sql = mysqli_query($conn,"SELECT b.cat_name1,a.pic1,a.pic2,a.pic3,a.pd_name1,a.pd_name2,a.pd_price,a.pd_pricesell,a.pd_id,a.pd_detail
								,a.pd_discount,a.pd_promotion,a.pd_condition,a.cat_id,a.Stock,a.type_id,a.pd_number,a.pd_id
								FROM product_db a 
								INNER JOIN category_db b 
								on a.cat_id =b.cat_id  
								Where  pd_id = '".$_POST['pd_id']."' ")or die(mysqli_error($conn)); 
							$rs = mysqli_fetch_assoc($sql); 
							$type_id = $rs['type_id']; ?>
							<tr>
								<td>
									<div class="ps-product--cart">
										<div class="ps-product__thumbnail"><a href="product-detail.php">
											<img src="admin/manage_product/uploads/<?=$rs['pic1']?>"/></a></div>
											<div class="ps-product__content"><a class="ps-product__title" href="product-detail.php?id=<?=$rs['cat_id']?>&cat_id=<?=$rs['pd_id']?>"><?=$rs['pd_name1']; if($rs['pd_name2']){ echo "(".$rs['pd_name2'].")"; } ?></a>
												<?php if($rs['pd_pricesell']){ ?>
													<p class="text-danger">$<?=number_format($rs['pd_pricesell'])?> <del class="text-dark"> 
														<?=number_format($rs['pd_price']);?></del> <span class="text-danger"> -<?=$rs['pd_discount']."%";?></span></p>
													<?php }else{ ?>
														<p class="ps-product__price">$<?=number_format($rs['pd_price']);?></p>
													<?php } ?>
												</div>
											</div>
										</td>
										<td class="price text-center">
											<?php if($rs['pd_pricesell']){
												echo '<div class="ps-product__price sale">'." $".number_format($rs['pd_pricesell']).'<span class="ps-product__price sale" style="font-size:16px;">';
											}else{
												echo '<p class="ps-product__price">'."$".number_format($rs['pd_price']).'</p>';
											} ?></td>
											<td class="text-center"><?=$_REQUEST['qty']; ?></td>
											<td class="text-center"><?php $sum =$rs['pd_pricesell'] =="" ? number_format($rs['pd_price']):number_format($rs['pd_pricesell']) ?>
											<?="$".number_format($_REQUEST['qty']*$sum); ?></td>
											<td class="text-center">
												<a href="product-detail.php?id=<?=$rs['cat_id']?>&cat_id=<?=$rs['pd_id']?>" ><i class="fa fa-reply-all"></i></a>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
						<hr><br>
						<?php $sql02 = mysqli_query($conn,"SELECT * FROM member_db Where m_number ='".$_SESSION['login_user']."' "); 
						$rs02 = mysqli_fetch_assoc($sql02);?>
						<div class="ps-section__content">
							<form id="insert_order" name="insert_order" method="post">
								<div class="row">
									<div class="col-xl-7 col-lg-8 col-md-12 col-sm-12  ">
										<div class="ps-form__billing-info">
											<h3 class="ps-form__heading">Billing Details</h3>
											<div class="form-row">
												<div class="form-group col-md-6">
													<label>First Name<sup class="text-danger">*</sup>
													</label>
													<div class="form-group__content">
														<input class="form-control" type="text" name="m_name" placeholder="First Name" value="<?=$rs02['m_name']?>" required>
													</div>
												</div>
												<div class="form-group col-md-6">
													<label>Last Name<sup class="text-danger">*</sup></label>
													<div class="form-group__content">
														<input class="form-control" type="text" name="lname" placeholder="Last Name" value="<?=$rs02['m_lname']?>" required>
													</div>
												</div>
											</div>

											<div class="form-row">
												<div class="form-group col-md-4">
													<label>Email Address<sup>*</sup></label>
													<div class="form-group__content">
														<input class="form-control" type="email" name="m_email" placeholder="Email Address" value="<?=$rs02['m_email']?>" required>
													</div>
												</div>
												<div class="form-group col-md-4">
													<label>Country<sup class="text-danger">*</sup></label>
													<div class="form-group__content" >
														<select name="m_country" class="form-control" required>
															<option value="">Country Chose..</option>
															<option value="Qatar"<?php if($rs02[
																'm_country']=="Qatar"){ echo 'selected';}?>>Qatar</option>
															<option value="Thailand"<?php if($rs02[
																'm_country']=="Thailand"){ echo 'selected';}?>>Thailand</option>
															<option value="Jepan"<?php if($rs02[
																'm_country']=="Jepan"){ echo 'selected';}?>>Jepan</option>
															<option value="China"<?php if($rs02[
																'm_country']=="China"){ echo 'selected';}?>>China</option>
															</select>
														</div>
													</div>
													<div class="form-group col-md-4">
														<label>Phone<sup class="text-danger">*</sup></label>
														<div class="form-group__content">
															<input class="form-control" type="text" maxlength="10" id="selectphone" placeholder="Phone" name="m_tol" value="<?=$rs02['m_tol']?>" required>
														</div>
													</div>
													<div class="form-group col-md-12">
														<label>Shipping Address<sup class="text-danger">*</sup></label>
														<div class="form-group__content">
															<textarea class="form-control" name="address" rows="3" placeholder="Shipping Address..." required><?=$rs02['m_address']?></textarea>
															<input type="text" name="pd_id" value="<?=$_REQUEST['pd_id']?>" hidden>
															<input type="text" name="pd_price" value="<?=$_REQUEST['qty']*$sum;?>" hidden>
															<input type="text" name="qty" value="<?=$_REQUEST['qty']?>" hidden>
															<input type="text" name="login_user" value="<?=$_SESSION['login_user']?>" hidden>
														</div>
													</div>
													
												</div>

											</div>
										</div>
										<div class="col-xl-5 col-lg-4 col-md-12 col-sm-12  ">
											<div class="ps-block--shopping-total">
												<h3 class="ps-block__header">Your Order <span style="font-size: 17px;">Order summary</span></h3> 
												<div class="content">
													<div class="ps-block--checkout-total">
														
														<div class="ps-block__content">

															<div class="row">
																<div class="col-8 ">
																	Total(amount <?=$_REQUEST['qty']?> pieces)<hr>
																</div>
																<div class="col-4">
																	<?php $sum =$rs['pd_pricesell'] =="" ? number_format($rs['pd_price']):number_format($rs['pd_pricesell']) ?>
																	<?="$".number_format($_REQUEST['qty']*$sum);?><hr>
																</div>
																<div class="col-8">
																	delivery charge <hr> 
																</div>
																<div class="col-4">Free<hr></div>
																<div class="col-4">
																	<h4>Total <hr></h4>
																</div>
																<div class="col-8">
																	<h4><strong class ="sum_price text-danger">
																		<?php $sum =$rs['pd_pricesell'] =="" ? number_format($rs['pd_price']):number_format($rs['pd_pricesell']) ?>
																		<?="$".number_format($_REQUEST['qty']*$sum); ?>
																		</<strong><hr></h4>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="modal-footer">
														<button type="submit" id="btn_in" class="ps-btn ps-btn--fullwidth">Proceed to checkout</button>
													</div>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>

							<footer class="ps-footer">
								<div class="ps-container">
									<div class="ps-footer__copyright">
										<?php echo "$Footer_Bottom";?>
									</div>

								</div>
							</footer>	
							<div id="back2top"><i class="pe-7s-angle-up"></i></div>
							<div class="ps-site-overlay"></div>
							<div id="loader-wrapper">
								<div class="loader-section section-left"></div>
								<div class="loader-section section-right"></div>
							</div>
							<div class="ps-search" id="site-search"><a class="ps-btn--close" href="#"></a>
								<div class="ps-search__content">
									<form class="ps-form--primary-search" action="do_action" method="post">
										<input class="form-control" type="text" placeholder="Search for...">
										<button><i class="aroma-magnifying-glass"></i></button>
									</form>
								</div>
							</div>

							<!--include shared/cart-sidebar-->
							<!-- Plugins-->
							<script src="plugins/jquery-1.12.4.min.js"></script>
							<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
							<script src="plugins/owl-carousel/owl.carousel.min.js"></script>
							<script src="plugins/bootstrap4/js/bootstrap.min.js"></script>
							<script type="text/javascript">

							</script>
							<script src="plugins/imagesloaded.pkgd.js"></script>
							<script src="plugins/masonry.pkgd.min.js"></script>
							<script src="plugins/isotope.pkgd.min.js"></script>
							<script src="plugins/jquery.matchHeight-min.js"></script>
							<script src="plugins/slick/slick/slick.min.js"></script>
							<script src="plugins/jquery-bar-rating/dist/jquery.barrating.min.js"></script>
							<script src="plugins/slick-animation.min.js"></script>
							<script src="plugins/lightGallery-master/dist/js/lightgallery-all.min.js"></script>
							<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
							<script src="plugins/sticky-sidebar/dist/sticky-sidebar.min.js"></script>
							<script src="plugins/jquery.slimscroll.min.js"></script>
							<script src="plugins/select2/dist/js/select2.full.min.js"></script>
							<script src="plugins/gmap3.min.js"></script>
							<!-- Custom scripts-->
							<script src="js/main.js"></script>
							<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDxflHHc5FlDVI-J71pO7hM1QJNW1dRp4U&amp;region=GB"></script>

							<script type="text/javascript">
								$("#insert_order").on('submit', function(event) {
									event.preventDefault();
									var m_name		 = document.insert_order.m_name.value
									var lname 		 = document.insert_order.lname.value
									var m_email 	 = document.insert_order.m_email.value
									var m_country 	 = document.insert_order.m_country.value
									var m_tol 		 = document.insert_order.m_tol.value
									var address      = document.insert_order.address.value
									var pd_id		 = document.insert_order.pd_id.value
									var pd_price	 = document.insert_order.pd_price.value
									var qty		 	 = document.insert_order.qty.value
									var login_user   = document.insert_order.login_user.value
									$.ajax({
										url: 'manages_order.php',
										type: 'POST',
										dataType: 'json',
										data: {'m_name':m_name , 'lname':lname,'m_email':m_email,'m_country':m_country,'m_tol':m_tol,'address':address,'pd_id':pd_id,'pd_price':pd_price,'qty':qty,'login_user':login_user
									},
									beforeSend : function(){
										$("#btn_in").html("Loading...");
										$("#btn_in").prop('disabled', true);
									},
									success: function(data){
										console.log(data.data);
										if(data.data =="1"){
											window.location.assign("delivery.php");
										}
									}
								});

								});

								jQuery(document).ready(function () {
									jQuery("#selectphone").keypress(function (e) {
										var length = jQuery(this).val().length;
										if(length > 9) {
											return false;
										} else if(e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
											return false;
										}
									});
								});

							</script>
							<script type="text/javascript">
								$(function(){

									var date  =  new Date(); 
									var nowDateTime=new Date(date);
									var d=nowDateTime.getTime();
									var mkHour,mkMinute,mkSecond;
									setInterval(function(){
										d=parseInt(d)+1000;
										var nowDateTime=new Date(d);
										mkHour=new String(nowDateTime.getHours());  
										if(mkHour.length==1){  
											mkHour="0"+mkHour;  
										}
										mkMinute=new String(nowDateTime.getMinutes());  
										if(mkMinute.length==1){  
											mkMinute="0"+mkMinute;  
										}        
										mkSecond=new String(nowDateTime.getSeconds());  
										if(mkSecond.length==1){  
											mkSecond="0"+mkSecond;  
										}   
										var runDateTime=mkHour+":"+mkMinute+":"+mkSecond;        
									        //$("#css_time_run").html(runDateTime); 
									        document.getElementById("css_time_run").placeholder = runDateTime;   
									    },1000);


								});
							</script>
						</body>
						</html>

