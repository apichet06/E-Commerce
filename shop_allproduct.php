<?php @session_start();
include("config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php require_once'script.php'; ?>

</head>

<body>
	<?php require_once'header.php'; ?>

	<!-- Mobile Cart -->
	<div class="ps-panel--sidebar" id="cart-mobile">
		<div class="ps-panel__header">
			<h3>Shopping Cart</h3>
		</div>
		<div class="navigation__content">
			<div class="ps-cart--mobile">
				<div class="ps-cart__content">
					<div class="ps-product--cart-mobile">
						<div class="ps-product__thumbnail"><a href="#"><img src="img/products/clothing/7.jpg" alt=""></a></div>
						<div class="ps-product__content">
							<a class="ps-product__remove" href="#"><i class="icon-cross"></i></a>
							<a href="product-detail.php">MVMTH Classical Leather Watch In Black</a>
							<p><strong>Sold by:</strong>  YOUNG SHOP</p><small>1 x $59.99</small>
						</div>
					</div>
				</div>
				<div class="ps-cart__footer">
					<h3>Sub Total:<strong>$59.99</strong></h3>
					<figure><a class="ps-btn" href="shopping-cart.html">View Cart</a><a class="ps-btn" href="checkout.html">Checkout</a></figure>
				</div>
			</div>
		</div>
	</div>
	<!-- EOF - Mobile Cart -->


	<!-- Mobile Menu -->
	<div class="ps-panel--sidebar" id="navigation-mobile">
		<?php echo "$Mobile_Menu";?>
	</div>

	
    <!--
    <div class="ps-panel--sidebar" id="menu-mobile">
      <div class="ps-panel__header">
        <h3>Menu</h3>
      </div>
    </div>
-->


<?php $sql = mysqli_query($conn,"SELECT * FROM images_header "); 
$rs = mysqli_fetch_assoc($sql);
$img_header6 =$rs['img_header6'];
$img_header7 =$rs['img_header7'];
?>
<div id="homepage-1">

	<!-- ################################################################ -->
	<!-- #                          HOT NEW                             # -->
	<!-- ################################################################ -->
	<div class="ps-product-list ps-new-arrivals">
		<div class="ps-container">
			<div class="ps-section__content">
				<div class="row">
					<?php require_once 'config.php'; 
					if($_GET['id']){
						$query=mysqli_query($conn,"SELECT COUNT(pd_id) FROM product_db 
							Where (pd_name1 like '%".$_GET['search']."%' or pd_name2 like '%".$_GET['search']."%') and cat_id ='".$_GET['id']."' ");
					}else{
						$query=mysqli_query($conn,"SELECT COUNT(pd_id) FROM product_db 
							Where pd_name1 like '%".$_GET['search']."%' or pd_name2 like '%".$_GET['search']."%' ");
					}

					$row = mysqli_fetch_row($query);
					$rows = $row[0];
					$page_rows = 10;  
					$last = ceil($rows/$page_rows);
					if($last < 1){
						$last = 1;
					}
					$pagenum = 1;
					if(isset($_GET['pn'])){
						$pagenum = preg_replace('#[^0-9]#', '', $_GET['pn']);
					}
					if ($pagenum < 1) {
						$pagenum = 1;
					}
					else if ($pagenum > $last) {
						$pagenum = $last;
					}
					$limit = 'LIMIT ' .($pagenum - 1) * $page_rows .',' .$page_rows;
					if($_GET['id']){
						$nquery=mysqli_query($conn,
							"SELECT pic1,pd_name1,pd_name2,pd_price,pd_pricesell,pd_id,pd_discount,b.cat_id 
							FROM product_db a 
							INNER JOIN category_db b 
							ON a.cat_id = b.cat_id
							Where (a.pd_name1 like '%".$_GET['search']."%' or a.pd_name2 like '%".$_GET['search']."%') and b.cat_id = '".$_GET['id']."' 
							ORDER BY pd_id  DESC $limit");
					}else{
						$nquery=mysqli_query($conn,
							"SELECT pic1,pd_name1,pd_name2,pd_price,pd_pricesell,pd_id,pd_discount,b.cat_id 
							FROM product_db a 
							INNER JOIN category_db b 
							ON a.cat_id = b.cat_id
							Where a.pd_name1 like '%".$_GET['search']."%' or a.pd_name2 like '%".$_GET['search']."%' 
							ORDER BY pd_id  DESC $limit");
					}

					$paginationCtrls = '';
					if($last != 1){


						if ($pagenum > 1) {
							$previous = $pagenum - 1;
							$paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$previous.'&id='.$_GET['id'].'" class="btn btn-warning btn-lg">Previous</a> &nbsp; &nbsp; ';
							for($i = $pagenum-4; $i < $pagenum; $i++){
								if($i > 0){
									$paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'&id='.$_GET['id'].'" class="btn btn-warning btn-lg">'.$i.'</a> &nbsp; ';
								}
							}
						}
						$paginationCtrls .= ''.$pagenum.' &nbsp; ';
						for($i = $pagenum+1; $i <= $last; $i++){
							$paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'&id='.$_GET['id'].'" class="btn btn-warning btn-lg">'.$i.'</a> &nbsp; ';
							if($i >= $pagenum+4){
								break;
							}
						}
						if ($pagenum != $last) {
							$next = $pagenum + 1;
							$paginationCtrls .= ' &nbsp; &nbsp; <a href="'.$_SERVER['PHP_SELF'].'?pn='.$next.'&id='.$_GET['id'].'" class="btn btn-warning btn-lg">Next</a> ';
						}
					}
					while($rs = mysqli_fetch_array($nquery)){
						?>

						<div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12 ">
							<div class="ps-product--horizontal">
								<div class="ps-product__thumbnail"><a href="product-detail.php?id=<?=$rs['cat_id']?>&cat_id=<?=$rs['pd_id']?>"><img src="admin/manage_product/uploads/<?=$rs['pic1']?>"/></a></div>
								<div class="ps-product__content"><a class="ps-product__title" href="product-detail.php?id=<?=$rs['cat_id']?>&cat_id=<?=$rs['pd_id']?>"><?=$rs['pd_name1']; if($rs['pd_name2']){ echo "(".$rs['pd_name2'].")"; } ?></a>
									<?php if($rs['pd_pricesell']){ ?>
										<p class="ps-product__price sale">$<?=number_format($rs['pd_pricesell'])?> <del> 
											<?=number_format($rs['pd_price']);?></del> <span class="ps-product__price sale"> -<?=$rs['pd_discount']."%";?></span></p>
										<?php }else{ ?>
											<p class="ps-product__price">$<?=number_format($rs['pd_price']);?></p>
										<?php } ?>
									</div>
								</div>
							</div>
						<?php } ?>

					</div>
					<center><div ><?php echo $paginationCtrls; ?></div></center>
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


    <!--
    <div class="ps-popup" id="subscribe" data-time="500">
      <div class="ps-popup__content bg--cover" data-background="img/bg/subscribe.jpg"><a class="ps-popup__close" href="#"><i class="icon-cross"></i></a>
        <form class="ps-form--subscribe-popup" action="index.html" method="get">
          <div class="ps-form__content">
            <h4>Get <strong>25%</strong> Discount</h4>
            <p>Subscribe to the Souqmajid mailing list <br /> to receive updates on new arrivals, special offers <br /> and our promotions.</p>
            <div class="form-group">
              <input class="form-control" type="text" placeholder="Email Address" required>
              <button class="ps-btn">Subscribe</button>
            </div>
            <div class="ps-checkbox">
              <input class="form-control" type="checkbox" id="not-show" name="not-show"/>
              <label for="not-show">Don't show this popup again</label>
            </div>
          </div>
        </form>
      </div>
    </div>
-->

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
</script>
</body>
</html>