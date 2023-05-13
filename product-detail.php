<?php @session_start();
include("config.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php require_once 'script.php'; ?>
</head>
<body>
  <?php require_once 'header.php'; ?>
  
  <div class="ps-panel--sidebar" id="cart-mobile">
    <div class="ps-panel__header">
      <h3>Shopping Cart</h3>
    </div>
    <div class="navigation__content">
      <div class="ps-cart--mobile">
        <div class="ps-cart__content">
          <div class="ps-product--cart-mobile">
            <div class="ps-product__thumbnail"><a href="#"><img src="img/products/clothing/7.jpg" alt=""></a></div>
            <div class="ps-product__content"><a class="ps-product__remove" href="#"><i class="icon-cross"></i></a><a href="product-detail.php">MVMTH Classical Leather Watch In Black</a>
              <!--<p><strong>Sold by:</strong>  YOUNG SHOP</p><small>1 x $59.99</small>-->
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
  <div class="ps-panel--sidebar" id="navigation-mobile">
    <?php echo "$Mobile_Menu";?>
  </div>

 
  <!-- <div class="ps-panel--sidebar" id="search-sidebar">
    <div class="ps-panel__header">
      <form class="ps-form--search-mobile" action="index.php" method="get">
        <div class="form-group--nest">
          <input class="form-control" type="text" placeholder="Search something...">
          <button><i class="icon-magnifier"></i></button>
        </div>
      </form>
    </div>
    <div class="navigation__content"></div>
  </div> -->


  <?php $sql = mysqli_query($conn,"SELECT b.cat_name1,a.pic1,a.pic2,a.pic3,a.pd_name1,a.pd_name2,a.pd_price,a.pd_pricesell,a.pd_id,a.pd_detail
    ,a.pd_discount,a.pd_promotion,a.pd_condition,a.cat_id,a.Stock,a.type_id,a.pd_number,a.pd_id
    FROM product_db a 
    INNER JOIN category_db b 
    on a.cat_id =b.cat_id  
    Where  pd_id = '".$_GET['cat_id']."' ")or die(mysqli_error($conn)); 
  $rs = mysqli_fetch_assoc($sql); 
  $type_id = $rs['type_id']; ?>
  <div class="ps-breadcrumb">
    <div class="ps-container">
      <ul class="breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li><a href="shop_allproduct.php?id=<?=$rs['cat_id']?>"><?=$rs['cat_name1']?></a></li>          
        <li><?=$rs['pd_name1']; if($rs['pd_name2']){ echo " (".$rs['pd_name2'].")"; }?></li>
      </ul>
    </div>
  </div>
  <div class="ps-page--product">
    <div class="ps-container">
      <div class="ps-page__container">
        <div class="ps-page__left">
          <div class="ps-product--detail ps-product--fullwidth">
            <div class="ps-product__header">

              <div class="ps-product__thumbnail" data-vertical="true">
                <figure>
                  <div class="ps-wrapper">
                    <div class="ps-product__gallery" data-arrow="true">
                      <div class="item">
                        <?php if($rs['pic1']){ 
                         echo '<a href="admin/manage_product/uploads/'.$rs['pic1'].'">
                         <img src="admin/manage_product/uploads/'.$rs['pic1'].'" /></a>';
                       }else{
                        echo '<a href="img/products/detail/fullwidth/1.jpg">
                        <img src="img/products/detail/fullwidth/1.jpg" alt=""></a>';
                      }?>
                    </div>
                    <div class="item">
                      <?php if($rs['pic2']){ 
                       echo '<a href="admin/manage_product/uploads/'.$rs['pic2'].'">
                       <img src="admin/manage_product/uploads/'.$rs['pic2'].'" /></a>';
                     }else{
                      echo '<a href="img/products/detail/fullwidth/1.jpg">
                      <img src="img/products/detail/fullwidth/1.jpg" alt=""></a>';
                    }?>
                  </div>
                  <div class="item">
                    <?php if($rs['pic3']){ 
                     echo '<a href="admin/manage_product/uploads/'.$rs['pic3'].'">
                     <img src="admin/manage_product/uploads/'.$rs['pic3'].'" /></a>';
                   }else{
                    echo '<a href="img/products/detail/fullwidth/1.jpg">
                    <img src="img/products/detail/fullwidth/1.jpg" alt=""></a>';
                  }?>
                </div>
              </div>
            </div>
          </figure>
          <div class="ps-product__variants" data-item="4" data-md="4" data-sm="4" data-arrow="false">
            <div class="item">
              <?php if($rs['pic1']){ 
                echo '<img src="admin/manage_product/uploads/'.$rs['pic1'].'" />';
              }else{
                echo '<img src="img/products/detail/fullwidth/1.jpg" alt="">';
              } ?>
            </div>
            <div class="item">
             <?php if($rs['pic2']){ 
              echo '<img src="admin/manage_product/uploads/'.$rs['pic2'].'" />';
            }else{
              echo '<img src="img/products/detail/fullwidth/2.jpg" alt="">';
            } ?>
          </div>
          <div class="item">
            <?php if($rs['pic3']){ 
              echo '<img src="admin/manage_product/uploads/'.$rs['pic3'].'" />';
            }else{
              echo '<img src="img/products/detail/fullwidth/3.jpg" alt="">';
            } ?>
          </div>
        </div>
      </div>
      <div class="ps-product__info">
        <h1><?=$rs['pd_name1']; if($rs['pd_name2']){ echo "(".$rs['pd_name2'].")"; };?></h1>

        <?php if($rs['pd_pricesell']){
          echo '<div class="ps-product__price sale">'." $".number_format($rs['pd_pricesell']).' <del>'." $".number_format($rs['pd_price']).'</del> <span class="ps-product__price sale" style="font-size:16px;"> '." -".$rs['pd_discount']."%".'</span ></div>';
        }else{
          echo '<p class="ps-product__price">'."$".number_format($rs['pd_price']).'</p>';
        } ?>
        <div class="ps-product__desc">
          <!--<p>Sold By:<a href="shop-default.html"><strong> Go Pro</strong></a></p>-->
          <ul class="ps-list--dot">
            <li>#<?=$rs['pd_number'];?></li>
            <?php if($rs['pd_promotion']){ echo "<li>".$rs['pd_promotion']."</li>"; } ?>
            <?php if($rs['pd_condition']){ echo "<li>".$rs['pd_condition']."</li>"; } ?>
            <?php if($rs['Stock']){ echo "<li>"."Stock ".$rs['Stock']."</li>";} ?>
          </ul>
        </div>
        <form name="form1" id="form1" action="buy_now.php" method="post" accept-charset="utf-8">
          <div class="ps-product__shopping">
            <figure>
              <figcaption>Quantity</figcaption>
              <div class="form-group--number">
                <button id="minus" class="down"><i class="fa fa-minus"></i></button>
                <button id="plus"  class="up"><i class="fa fa-plus"></i></button>
                <input type="text"  class="form-control" name="max_s" id="max_s" value="<?=$rs['Stock']?>" hidden/>
                <input type="text" class="form-control" name="pd_id" value="<?=$rs['pd_id'];?>" hidden/>
                <input type="text" class="form-control" name="qty" value="1" id="qty" />
              </div>
            </figure>
            <?php if($_SESSION['login_user']){ ?>
              <button class="ps-btn ps-btn--gray add_cart">Add to cart</button>
              <button class="ps-btn" type="submit">Buy Now</button> 
            <?php }else{ ?>
             <a class="ps-btn ps-btn--gray" href="my-account.php?log=login">Add to cart</a>
             <a class="ps-btn" href="my-account.php?log=login">Buy Now</a> 
           <?php } ?>  

         </div>
       </form>
     </div>


   </div>


   <div class="ps-product__content ps-tab-root">
    <ul class="ps-tab-list">
      <li class="active"><a href="#tab-1">Description</a></li>                  
    </ul>
    <div class="ps-tabs">
      <div class="ps-tab active" id="tab-1">
        <div class="ps-document">
          <?=$rs['pd_detail']; ?>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<div class="ps-page__right">
  <aside class="widget widget_product widget_features">
    <p><i class="icon-network"></i> Shipping worldwide</p>
    <p><i class="icon-3d-rotate"></i> Free 7-day return if eligible, so easy</p>
    <p><i class="icon-receipt"></i> Supplier give bills for this product.</p>
    <p><i class="icon-credit-card"></i> Pay online or when receiving goods</p>
  </aside>

  <!-- ####################################### -->
  <!-- #         สินค้าที่เกี่ยวข้อง                 # -->
  <!-- ####################################### -->
  <aside class="widget widget_same-brand">
    <h3>Related products</h3>
    <div class="widget__content">
      <?php $sql = mysqli_query($conn,"SELECT pd_discount,pd_name1,pd_name2,pd_pricesell,pd_price,pic1,cat_id,pd_id FROM product_db  Where cat_id = '".$rs['cat_id']."'
        order by RAND() desc limit 2 ");
        while ($rs=mysqli_fetch_assoc($sql)) { ?>

          <div class="ps-product">
            <div class="ps-product__thumbnail"><a href="product-detail.php?id=<?=$rs['cat_id']?>&cat_id=<?=$rs['pd_id']?>"><?php echo '<img src="admin/manage_product/uploads/'.$rs['pic1'].'" />'; ?></a>
              <?php if($rs['pd_discount']){?><div class="ps-product__badge"><?="-".$rs['pd_discount']."%"; ?></div><?php } ?>
            </div>
            <div class="ps-product__container">
              <div class="ps-product__content"><a class="ps-product__title" href="product-detail.php?id=<?=$rs['cat_id']?>&cat_id=<?=$rs['pd_id']?>"><?=$rs['pd_name1']; if($rs['pd_name2']){ echo "(".$rs['pd_name2'].")"; } ?></a>
                <?php if($rs['pd_pricesell']){
                  echo '<div class="ps-product__price sale">'." $".number_format($rs['pd_pricesell']).' <del>'." $".number_format($rs['pd_price']).'</del></div>';
                }else{
                  echo '<p class="ps-product__price">'." $".number_format($rs['pd_price']).'</p>';
                } ?>
              </div>
            </div>
          </div>

        <?php } ?>
      </div>
    </aside>
  </div>
</div>
<!-- ####################################### -->
<!-- #         สินค้าชนิดเดียวกัน               # -->
<!-- ####################################### -->
<div class="ps-section--default">
  <div class="ps-section__header">
    <h3>Same Product</h3>     
  </div>
  <div class="ps-section__content">
    <div class="ps-carousel--nav owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="10000" data-owl-gap="30" data-owl-nav="true" data-owl-dots="true" data-owl-item="6" data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="4" data-owl-item-xl="5" data-owl-duration="1000" data-owl-mousedrag="on">

      <?php $sql = mysqli_query($conn,"SELECT pic1,pd_name1,pd_name2,pd_price,pd_pricesell,pd_id,pd_discount,cat_id FROM product_db Where type_id = ' $type_id'
        ORDER BY pd_id asc"); 
      $row = mysqli_num_rows($sql);
      while($rs = mysqli_fetch_assoc($sql)){ ?>

        <div class="ps-product "<?php if($row <="1"){ echo "style='width: 270px;'"; } ?> > 
          <div class="ps-product__thumbnail"><a href="product-detail.php?id=<?=$rs['cat_id']?>&cat_id=<?=$rs['pd_id']?>"><?php echo '<img src="admin/manage_product/uploads/'.$rs['pic1'].'"/>'; ?></a></div>

          <?php if($rs['pd_pricesell']){ ?>
            <div class="ps-product__container"><a class="ps-product__vendor" href="#"></a>
              <div class="ps-product__content">
                <a class="ps-product__title" href="product-detail.php?id=<?=$rs['cat_id']?>&cat_id=<?=$rs['pd_id']?>"><?=$rs['pd_name1']; if($rs['pd_name2']){ echo "(".$rs['pd_name2'].")"; }?></a>
                <div class="ps-product__rating"><hr></div>
                <p class="ps-product__price sale">$ <?=number_format($rs['pd_pricesell']);?><del> 
                  $<?=number_format($rs['pd_price']);?></del><span class="ps-product__price sale">-<?=$rs['pd_discount']?>%</span ></p>
                </div>
                <div class="ps-product__content hover">
                  <a class="ps-product__title" href="product-detail.php?id<?=$rs['cat_id']?>=&cat_id=<?=$rs['pd_id']?>"><?=$rs['pd_name1']; if($rs['pd_name2']){ echo "(".$rs['pd_name2'].")"; }?></a>
                  <p class="ps-product__price sale">$ <?=number_format($rs['pd_pricesell']);?><del> 
                    $<?=number_format($rs['pd_price']);?></del><span class="ps-product__price sale">-<?=$rs['pd_discount']?>%</span ></p>
                  </div>
                </div>
              <?php }else{ ?>
                <div class="ps-product__container"><a class="ps-product__vendor" href=""></a>
                  <div class="ps-product__content">
                    <a class="ps-product__title" href="product-detail.php?id=<?=$rs['cat_id']?>&cat_id=<?=$rs['pd_id']?>"><?=$rs['pd_name1']; if($rs['pd_name2']){ echo "(".$rs['pd_name2'].")"; } ?></a>
                    <div class="ps-product__rating"><hr></div>
                    <p class="ps-product__price">$<?=number_format($rs['pd_price']);?></p>
                  </div>
                  <div class="ps-product__content hover">
                    <a class="ps-product__title" href="product-detail.php?id=<?=$rs['cat_id']?>&cat_id=<?=$rs['pd_id']?>"><?=$rs['pd_name1']; if($rs['pd_name2']){ echo "(".$rs['pd_name2'].")"; } ?></a>
                    <p class="ps-product__price">$<?=number_format($rs['pd_price']);?></p>
                  </div>
                </div>
              <?php } ?>

            </div>

          <?php } ?>


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
<!--include shared/cart-sidebar-->
<!-- Plugins-->
 <?php require_once 'link_js/link_js.php'; ?>
<script type="text/javascript">

 const minusButton = document.getElementById('minus');
 const plusButton = document.getElementById('plus');
 const inputField = document.getElementById('qty');
 const max_s      = document.getElementById("max_s");
 minusButton.addEventListener('click', event => {
   event.preventDefault();
   const currentValue = Number(inputField.value) >> 0;
   if(currentValue >1){
    inputField.value = currentValue - 1;
  }
  
});

 plusButton.addEventListener('click', event =>  {
   event.preventDefault();
   const currentValue = Number(inputField.value) >> 0;
   if(currentValue < max_s.value){
    inputField.value = currentValue + 1;
  }

});

 $(".add_cart").click(function(e) {
  e.preventDefault();
  var qty = document.form1.qty.value;
  var pd_id = document.form1.pd_id.value;

  $.ajax({
    url: 'manages_product_cart.php',
    type: 'POST',
    dataType: 'json',
    data: {'qty':qty,'pd_id':pd_id},
    success:function(data){
      if(data.data=="1"){
        setTimeout(function(){
          location.reload();
        },200)
      }
    }
  })
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