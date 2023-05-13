<?php @session_start();
require_once 'config.php';
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
<style type="text/css">
	/*.bgbody{
		background: none;
		background-color: #F9F9F9;
		background-position: bottom;
		background-repeat: no-repeat;
		}*/

	</style>
	<body class="bgbody">
		<?php require_once 'header.php'; ?>
		<!-- Mobile Menu -->
		<div class="ps-panel--sidebar" id="navigation-mobile">
			<?php echo "$Mobile_Menu";?>
		</div>

		<div class="text-center ps-shopping-cart">
			<br><br><br>
			<div class="ps-section__header">
				<h1>Payment</h1>
			</div>	
			<br><br><br>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<?php $sql0 = mysqli_query($conn,"SELECT po_id FROM po_payment Where m_id = '".$rs02['m_id']."' and po_id = '".$_GET['pm']."'
				Group by po_id
				Order by po_id DESC")or die(mysqli_error($conn));
			$i=1;
			while ($rs0 = mysqli_fetch_assoc($sql0)) { ?>

				<div class="col-md-12 p-2">
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-md-9">
									<strong>Purchase Order :</strong> #<?=$rs0['po_id'];?>	
								</div>

							</div>
							<hr>
							<div class="row">
								<?php $sql = mysqli_query($conn,"SELECT a.pic1,a.pic2,a.pic3,a.pd_name1,a.pd_name2,a.pd_price,a.pd_pricesell,a.pd_id,a.pd_detail
									,a.pd_discount,a.pd_promotion,a.pd_condition,a.cat_id,a.Stock,a.type_id,a.pd_number,a.pd_id,b.* FROM order_db b 
									INNER JOIN product_db a 
									on a.pd_id = b.pd_id 
									Where b.po_id ='".$rs0['po_id']."' and b.m_id = '".$rs02['m_id']."'
									Order by b.po_id DESC")or die(mysqli_error($conn));
									while($rs = mysqli_fetch_assoc($sql)){ ?>
										<div class="col-md-4">
											<div class="ps-product--cart">
												<div class="ps-product__thumbnail">
													<a href="product-detail.php">
														<img src="admin/manage_product/uploads/<?=$rs['pic1']?>"/></a></div>
														<div class="ps-product__content"><a class="ps-product__title" href="product-detail.php?id=<?=$rs['cat_id']?>&cat_id=<?=$rs['pd_id']?>"><?=$rs['pd_name1']; if($rs['pd_name2']){ echo "(".$rs['pd_name2'].")"; } ?>
														<div><?="$".number_format($rs['pd_price'])?></div>
													</a>
												</div>
											</div><hr>
										</div>
										<div class="col-md-2">
											<br>
											<strong class="text-secondary">QTY : </strong> <?=$rs['o_qty']?>
										</div>
									<?php } ?>
								</div>
								<?php $sql = mysqli_query($conn,"SELECT sum(pd_price)as sum_price FROM order_db   Where po_id ='".$rs0['po_id']."' and m_id = '".$rs02['m_id']."'");
								$rs = mysqli_fetch_assoc($sql); ?>
								<strong>Total : <?="$".number_format($rs['sum_price']);?></strong>
							</div>
						</div>
					</div> 
				<?php } ?>
			</div>
			<br><br>
			<div class="row justify-content-center">
				<div class="col-md-8  ">
					<div class="card">
						<div class="card-body">
							<h4>Payment Bank</h4>
							<hr>
							<h5 class="text-center text-danger">Total : <?="$".number_format($rs['sum_price']);?></h5>
							<form id="insert_payment" method="post" class="was-validated">
								<div class="form-row">
									<div class="form-group col-md-6">
										<label >Bank</label>
										<select class="custom-select form-control " name="bank" onchange="getvalue()" required>
											<option value="">Bank Choose...</option>
											<option value="BBL">Bangkok Bank</option>
											<option value="KTB">Krungthai</option>
											<option value="KBANK">Kasikoin</option>
											<option value="TMB">TMB Bank</option>
										</select>
										<div class="invalid-feedback">Example invalid custom select feedback</div>
									</div>
									<div class="form-group col-md-6">
										<label> Payment ID</label>
										<input type="text" class="form-control" id="demo" disabled>
										<input type="text" class="form-control" name="id" value="<?=$_GET['pm'];?>" hidden>
									</div>
								</div>
								<div class="form-group">
									<div class="custom-file-container" data-upload-id="myUniqueUploadId">
										<label> Limit 1 Images <strong class="text-danger"> * </strong> <a href="javascript:void(0)" class="custom-file-container__image-clear">Cancel <i class="fa fa-ban"></i></a>
										</label>
										<label class="custom-file-container__custom-file form-control-lg">
											<input type="file" id="clear"
											class="custom-file-container__custom-file__custom-file-input " name="file" accept="image/*" aria-label="Choose File" required>
											<span class="custom-file-container__custom-file__custom-file-control"></span>
										</label>
										<div class="custom-file-container__image-preview mx-auto"  style="height: 270px; width: 200px;"></div>
									</div>
								</div>
								<div class="modal-footer">
									<button type="submit" id="btn_in" class="ps-btn">Confirm</button>
								</div>
							</form>
						</div>
					</div>
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

		<?php require_once 'link_js/link_js.php'; ?>
		<script src="admin/js/file_upload_with_preview.min.js"></script>
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

			var upload = new FileUploadWithPreview('myUniqueUploadId', {

				showDeleteButtonOnImages: true,
				text: {
					chooseFile: ' ChooseImages',
					browse: 'Browse',
					selectedCount: 'Files Selected', /*files selected*/
				},
			//maxFileCount: 0,
		});
			function getvalue() {
				var payment =  event.target.value;
				$("#demo").val("");
				if(payment==""){

				}else if (payment=="BBL") {
					$("#demo").val("Payment ID "+payment+": 028-0-14546-3")
				}else if (payment=="KTB") {
					$("#demo").val("Payment ID "+payment+": 094-0-12313-0")
				}else if (payment=="KBANK") {
					$("#demo").val("Payment ID "+payment+": 684-2-05521-5")
				}else if (payment=="TMB") {
					$("#demo").val("Payment ID "+payment+": 502-2-95664-5")
				}

				
			}

  $("#insert_payment").on('submit', function(event) {
  	event.preventDefault();
  	$.ajax({
       url: 'manages_payment.php',
       type: 'POST',
       dataType:"json",
       data: new FormData(this),
       contentType: false,
       cache: false,
       processData:false,
  	 	beforeSend :function(){
  	 		$("#btn_in").html("Loading...");
  	 	},
  	 	success:function(data){
  	 		if(data.data=="1"){
  	 			window.location.href="delivery.php";	
  	 		}
  	 	}
  	 })
  });

		</script>

	</body>
	</html>
