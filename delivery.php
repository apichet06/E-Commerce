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
<style type="text/css">
	.bgbody{
		background: none;
		background-color: #F9F9F9;
		background-position: bottom;
		background-repeat: no-repeat;
	}
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
			<h1>Delivery Status</h1>
		</div>	
		<br><br><br>
	</div>
</div>

<div class="container">
	<div class="row">
		<?php $sql0 = mysqli_query($conn,"SELECT * FROM po_payment Where m_id = '".$rs02['m_id']."'
			Group by po_id
			Order by po_id DESC")or die(mysqli_error($conn));
		$i=1;
		while ($rs0 = mysqli_fetch_assoc($sql0)) { ?>

			<div class="col-md-12 p-2">
				<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="col-md-9">
								<strong><?=$rs?>Purchase Order :</strong> #<?=$rs0['po_id'];?>	
							</div>
							<div class="cal-md-3">
								<?php if($rs0['status_payment']=="" and $rs0['po_status_check']==""){ ?>
									Payment confirmation &nbsp;<a href="payment.php?pm=<?=$rs0['po_id']?>" class="btn btn-info">Click</a>	
								<?php }else if ($rs0['status_payment']=="Checking payment" and $rs0['po_status_check']=="0"){ ?>
									Confirm payment again &nbsp;<a href="payment.php?pm=<?=$rs0['po_id']?>" class="btn btn-info">Click</a>
								<?php } ?>
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
									<div class="col-md-1">
										<br>
										<strong class="text-secondary">QTY : </strong> <?=$rs['o_qty']?>
									</div>
									<div class="col-md-3">
										<br>
										<strong class="text-secondary">Status : </strong> 
										
										<?php if($rs0['status_payment']=="Checking payment" and $rs0['po_status_check']==""){
											echo "<strong class='text-warning'>Checking payment </strong>";
										}else if($rs0['status_payment']==""){
											echo "<strong class='text-dark'>You have not paid.</strong>";
										}else if($rs0['status_payment']=="Checking payment" and $rs0['po_status_check']=="1"){
											echo "<strong class='text-success'>Payment Success</strong>";
										}else if ($rs0['status_payment']=="Checking payment" and $rs0['po_status_check']=="0") {
											echo "<strong class='text-warning'>Payment failed</strong>";
										} ?>
									</strong>
								</div>
								<div class="col-md-3">
									<br>
									<strong class="text-secondary">Delivery :</strong> 
									<?php if($rs0['status_payment']=="Checking payment" and $rs0['po_status_check']=="1" and $rs0['po_delivery']==""){
										echo "<strong class='text-success'>Product is being processed.</strong>";
									}elseif ($rs0['status_payment']=="Checking payment" and $rs0['po_status_check']=="1" and $rs0['po_delivery']!="") {
										echo "<strong class='text-success'>".$rs0['po_delivery']." ".$rs0['date_delivery']."</strong>";
									}else{
										echo "-";
									} ?>
								</div>
								<div class="col-md-1 text-center"><br>
									<?php if(!$rs0['status_payment']){ ?>
										<a href="" class="del_delivery"
										data-id = "<?=$rs['pd_id']?>"
										data-op_id = "<?=$rs0['po_id']?>"
										><i class="fa fa-trash-o"></i></a><hr>
									<?php } ?>
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

	$(".del_delivery").click(function(e){
		e.preventDefault();
		var id = $(this).data("id");
		var po_id = $(this).data("op_id");
		var del = "delete";
		$.ajax({
			url: 'manages_delivery.php',
			type: 'POST',
			dataType: 'json',
			data: {'id':id,'po_id':po_id,'del':del},
			success :function(data){
				if(data.data=="1"){
					setTimeout(function(){
						window.location.reload();	
					},500)

				}
			}
		})

	});


</script>

<script type="text/javascript">
	$(".del").click(function(e){
		e.preventDefault();
		var id = $(this).data("id");
		var del = "delete";
		$.ajax({
			url: 'manages_insert_order_all.php',
			type: 'POST',
			dataType: 'json',
			data: {'id':id,'del':del},
			success :function(data){
				if(data.data=="1"){
					setTimeout(function(){
						window.location.reload(); 
					},500)
				}
			}
		})

	});
</script>
</body>
</html>
