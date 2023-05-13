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
  <style type="text/css">
    [data-notify="progressbar"] {
      margin-bottom: 50px;
      position: absolute;
      bottom: 50px;
      left: 50px;
      width: 100%;
      height: 5px;

    }
    .alert-minimalist {
      background-color: rgb(241, 242, 240);
      border-color: rgba(149, 149, 149, 0.3);
      border-radius: 3px;
      color: rgb(149, 149, 149);
      padding: 10px;
    }
    .alert-minimalist > [data-notify="icon"] {
      height: 50px;
      margin-right: 12px;
    }
    .alert-minimalist > [data-notify="title"] {
      color: rgb(51, 51, 51);
      display: block;
      font-weight: bold;
      margin-bottom: 5px;
    }
    .alert-minimalist > [data-notify="message"] {
      font-size: 80%;
    }
  </style>
</head>

<body>
  <?php require_once 'header.php'; ?>

  <!-- EOF - Mobile Cart -->


  <!-- Mobile Menu -->
  <div class="ps-panel--sidebar" id="navigation-mobile">
    <?php echo "$Mobile_Menu";?>
  </div>

  <div class="navigation--list">
    <div class="navigation__content">
      <a class="navigation__item" href="index.php"><i class="icon-menu"></i><span> Home</span></a>
      <a class="navigation__item ps-toggle--sidebar" href="#navigation-mobile"><i class="icon-list4"></i><span> Categories</span></a>
      <a class="navigation__item ps-toggle--sidebar" href="#search-sidebar"><i class="icon-magnifier"></i><span> Search</span></a>
      <a class="navigation__item ps-toggle--sidebar" href="#cart-mobile"><i class="icon-bag2"></i><span> Cart</span></a></div>
    </div>

    <!-- Mobile Search --> 
    <div class="ps-panel--sidebar" id="search-sidebar">
      <div class="ps-panel__header">
        <form class="ps-form--search-mobile" action="index.html" method="get">
          <div class="form-group--nest">
            <input class="form-control" type="text" placeholder="Search something...">
            <button><i class="icon-magnifier"></i></button>
          </div>
        </form>
      </div>
      <div class="navigation__content"></div>
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
   <div class="ps-home-banner ps-home-banner--1">
    <div class="ps-container">
      <div class="ps-section__left">
        <div class="ps-carousel--nav-inside owl-slider " data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000" data-owl-mousedrag="on">
          <div class="ps-banner"><a href="#"><img src="admin/manage_images/images/<?=$rs['img_header1']?>" height="400" class="d-block w-100"></a></div>
          <div class="ps-banner"><a href="#"><img src="admin/manage_images/images/<?=$rs['img_header2']?>" height="400" class="d-block w-100"></a></div>
          <div class="ps-banner"><a href="#"><img src="admin/manage_images/images/<?=$rs['img_header3']?>" height="400" class="d-block w-100"></a></div>
        </div>
      </div>
      <div class="ps-section__right">
        <a class="ps-collection" href="#"><img src="admin/manage_images/images/<?=$rs['img_header4']?>" width="100%"></a>
        <a class="ps-collection" href="#"><img src="admin/manage_images/images/<?=$rs['img_header5']?>" width="100%"></a>
      </div>
    </div>
  </div>
  

  <div class="ps-container">
    <div class="ps-block--site-features">
      <div class="ps-block__item">
        <div class="ps-block__left"><i class="icon-rocket"></i></div>
        <div class="ps-block__right">
          <h4>Free Delivery</h4>
          <p>For all oders over $99</p>
        </div>
      </div>
      <div class="ps-block__item">
        <div class="ps-block__left"><i class="icon-sync"></i></div>
        <div class="ps-block__right">
          <h4>90 Days Return</h4>
          <p>If goods have problems</p>
        </div>
      </div>
      <div class="ps-block__item">
        <div class="ps-block__left"><i class="icon-credit-card"></i></div>
        <div class="ps-block__right">
          <h4>Secure Payment</h4>
          <p>100% secure payment</p>
        </div>
      </div>
      <div class="ps-block__item">
        <div class="ps-block__left"><i class="icon-bubbles"></i></div>
        <div class="ps-block__right">
          <h4>24/7 Support</h4>
          <p>Dedicated support</p>
        </div>
      </div>
      <div class="ps-block__item">
        <div class="ps-block__left"><i class="icon-gift"></i></div>
        <div class="ps-block__right">
          <h4>Gift Service</h4>
          <p>Support gift service</p>
        </div>
      </div>
    </div>
  </div>

  <!-- ################################################################ -->
  <!-- #                          HOT NEW                             # -->
  <!-- ################################################################ -->
  <div class="ps-product-list ps-new-arrivals">
    <div class="ps-container">
      <div class="ps-section__content">
        <div class="row">
          <?php  if($_GET['id']){
            $sql = mysqli_query($conn,"SELECT pic1,pd_name1,pd_name2,pd_price,pd_pricesell,pd_id,pd_discount,b.cat_id FROM product_db a 
              INNER JOIN category_db b 
              ON a.cat_id = b.cat_id
              Where b.cat_id = '".$_GET['id']."'
              ORDER BY pd_id DESC")or die(mysqli_error($conn));


              while($rs = mysqli_fetch_assoc($sql)){ ?>

                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12 ">
                  <div class="ps-product--horizontal">
                    <div class="ps-product__thumbnail"><a href="product-detail.php?id=<?=$rs['pd_id']?>&cat_id=<?=$rs['cat_id']?>"><img src="admin/manage_product/uploads/<?=$rs['pic1']?>"/></a></div>
                    <div class="ps-product__content"><a class="ps-product__title" href="product-detail.php?id=<?=$rs['pd_id']?>&cat_id=<?=$rs['cat_id']?>"><?=$rs['pd_name1']; if($rs['pd_name2']){ echo "(".$rs['pd_name2'].")"; } ?></a>
                      <?php if($rs['pd_pricesell']){ ?>
                        <p class="ps-product__price sale">$<?=number_format($rs['pd_pricesell'])?> <del> 
                          <?=number_format($rs['pd_price']);?></del> <span class="ps-product__price sale"> -<?=$rs['pd_discount']."%";?></span></p>
                        <?php }else{ ?>
                          <p class="ps-product__price">$<?=number_format($rs['pd_price']);?></p>
                        <?php } ?>
                      </div>
                    </div>
                  </div>
 
                <?php } }?>

              </div>
            </div>
          </div>
        </div>


        <!-- ################################################################ -->
        <!-- #                          Products                            # -->
        <!-- ################################################################ -->
        <?php $sql0 = mysqli_query($conn,"SELECT cat_id,CAT_Name1 FROM category_db 
          order by cat_id asc"); 
          while ($rs0 = mysqli_fetch_assoc($sql0)) { ?>
            <div class="ps-product-list ps-garden-kitchen" id="<?=$rs0['cat_id'];?>">
              <div class="ps-container">
                <div class="ps-section__header">
                  <h3> <?=$rs0['CAT_Name1']?></h3>
                  <ul class="ps-section__links">              
                    <li><a href="shop_allproduct.php?id=<?=$rs0['cat_id']?>">View All</a></li>
                  </ul>
                </div>
                <div class="ps-section__content">
                  <div class="ps-carousel--nav owl-slider" data-owl-auto="false" data-owl-loop="false" data-owl-speed="10000" data-owl-gap="30" data-owl-nav="true" data-owl-dots="true" data-owl-item="5" data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="2" data-owl-item-lg="3" data-owl-item-xl="5" data-owl-duration="1000" data-owl-mousedrag="on">
                    <?php $sql = mysqli_query($conn,"SELECT pic1,pd_name1,pd_name2,pd_price,pd_pricesell,pd_id,pd_discount,cat_id FROM product_db Where cat_id = '".$rs0['cat_id']."'
                      ORDER BY pd_id asc limit 15"); 
                    $row = mysqli_num_rows($sql);
                    while($rs = mysqli_fetch_assoc($sql)){ ?>


                      <div class="ps-product <?php if($row <="1"){ echo "col-md-12"; } ?>">
                        <div class="ps-product__thumbnail"><a href="product-detail.php?id=<?=$rs['cat_id']?>&cat_id=<?=$rs['pd_id']?>"><?php echo '<img src="admin/manage_product/uploads/'.$rs['pic1'].'"  />'; ?></a></div>

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
              <?php } ?>


              <div class="ps-home-ads">
                <div class="ps-container">
                  <div class="row">
                    <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12 ">
                      <a class="ps-collection" href="#"><img src="admin/manage_images/images/<?=$img_header6;?>" alt=""></a>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 ">
                      <a class="ps-collection" href="#"><img src="admin/manage_images/images/<?=$img_header7;?>" alt=""></a>
                    </div>
                  </div>
                </div>
              </div>

              <div class="ps-download-app">
                <div class="ps-container">
                  <div class="ps-block--download-app">
                    <div class="container">
                      <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
                          <div class="ps-block__thumbnail"><img src="img/app_0.png" alt=""></div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
                          <div class="ps-block__content">
                            <h3>Download Souqmajid App Now!</h3>
                            <p>Shopping fastly and easily more with our app. Get a link to download the app on your phone</p>
                            <form id="Subscribe" class="ps-form--download-app" method="post">
                              <div class="form-group--nest">
                                <input class="form-control" type="Email" id="email" name="Email" placeholder="Email Address" required>
                                <button class="ps-btn" id="bnt_sub">Subscribe</button>
                              </div>
                            </form>
                            <div class="row">
                              <div class="col-md-6">
                               <a href="https://play.google.com/store/apps/details?id=com.devx.souqmajid" target="_black"><img src="google-play-badge.png" width="300" height="83"></a>
                             </div>
                             <div class="col-md-6">
                              <a href="https://www.apple.com/th/ios/app-store/" target="_black"><img src="download-on-app-store.png" width="300" height="83"></a>
                            </div>
                          </div>
                        </div>
                      </div>
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
            <!-- <div id="loader-wrapper">
              <div class="loader-section section-left"></div>
              <div class="loader-section section-right"></div>
            </div> -->
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
              $("#Subscribe").on('submit', function(event) {
                event.preventDefault();
                var sub   = "subscribe";
                $.ajax({
                  url: 'manages_subscribe.php',
                  type: 'POST',
                  dataType: 'json',
                  data: $(this).serialize() + "&sub=" + sub,
                  beforeSend:function(){
                    $("#bnt_sub").html("Loading...");
                  },
                  success: function(data) {
                    if(data.data=="1"){
                      setTimeout(function(){

                        $.notify({
                //icon: 'img/logo_light.png',
                title: 'Souqmajid',
                message: 'You will receive email news from us.'
              },{
                type: 'minimalist',
                delay: 5000,
                icon_type: 'image',
                template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                '<img data-notify="icon" class="img-circle pull-left">' +
                '<span data-notify="title">{1}</span>' +
                '<span data-notify="message">{2}</span>' +
                '</div>'
              });

                      },200)
                      $("#Subscribe")[0].reset();
                      setTimeout(function(){
                        $("#bnt_sub").html("Subscribe");
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