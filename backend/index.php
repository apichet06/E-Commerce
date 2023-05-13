<?php
include("../config.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="format-detection" content="telephone=no">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <!--link(href="apple-touch-icon.png" rel="apple-touch-icon")-->
  <!--link(href="favicon.png" rel="icon" )-->
  <meta name="author" content="">
  <meta name="keywords" content="">
  <meta name="description" content="">
  <title><?php echo "$Web_Title";?></title>
  <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700&amp;subset=latin-ext" rel="stylesheet">
  <link rel="stylesheet" href="plugins/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="fonts/Linearicons/Linearicons/Font/demo-files/demo.css">
  <link rel="stylesheet" href="plugins/bootstrap4/css/bootstrap.min.css">
  <link rel="stylesheet" href="plugins/owl-carousel/assets/owl.carousel.css">
  <link rel="stylesheet" href="plugins/slick/slick/slick.css">
  <link rel="stylesheet" href="plugins/lightGallery-master/dist/css/lightgallery.min.css">
  <link rel="stylesheet" href="plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css">
  <link rel="stylesheet" href="plugins/jquery-ui/jquery-ui.min.css">
  <link rel="stylesheet" href="plugins/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>



<body>
  <header class="header header--1" data-sticky="true">
    <div class="header__top">
      <div class="ps-container">
        <div class="header__left">
          <!-- Web Menu Header -->
          <?php echo "$Web_Menu"; ?>
          <a class="ps-logo" href="index.html"><img src="../img/logo_light.png" alt=""></a>
        </div>


        <div class="header__center">
          <form class="ps-form--quick-search" action="index.html" method="get">
            <input class="form-control" type="text" placeholder="I'm shopping for...">
            <button>Search</button>
          </form>
        </div>
        <div class="header__right">
          <div class="header__actions">          
            <div class="ps-cart--mini">
              <a class="header__extra" href="#"><i class="icon-bag2"></i><span><i>0</i></span></a>                
            </div>
            <div class="ps-block--user-header">
              <div class="ps-block__left"><i class="icon-user"></i></div>
              <div class="ps-block__right"><a href="../my-account.php">Login</a><a href="../my-account.php">Register</a></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <nav class="navigation">
      <div class="ps-container">
        <div class="navigation__left">
          <!-- Web Menu -->
          <?php echo "$Web_Menu"; ?>
        </div>
      </div>
    </nav>
  </header>




  <header class="header header--mobile" data-sticky="true">
    <div class="header__top">
      <div class="header__left">
        <p>Welcome to Souqmajid Online Shopping Store !</p>
      </div>

      <div class="header__right">
        <ul class="navigation__extra">
          <li><a href="#">Sell on Souqmajid</a></li>
          <li><a href="#">Tract your order</a></li>
          <li>
            <div class="ps-dropdown"><a href="#">US Dollar</a>
              <ul class="ps-dropdown-menu">
                <li><a href="#">Us Dollar</a></li>
                <li><a href="#">Euro</a></li>
              </ul>
            </div>
          </li>
          <li>
            <div class="ps-dropdown language"><a href="#"><img src="img/flag/en.png" alt="">English</a>
              <ul class="ps-dropdown-menu">
                <li><a href="#"><img src="img/flag/germany.png" alt=""> Germany</a></li>
                <li><a href="#"><img src="img/flag/fr.png" alt=""> France</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </div>
    </div>

    <div class="navigation--mobile">
      <div class="navigation__left"><a class="ps-logo" href="index.html"><img src="img/logo_light.png" alt=""></a></div>
      <div class="navigation__right">
        <div class="header__actions">
          <div class="ps-cart--mini"><a class="header__extra" href="#"><i class="icon-bag2"></i><span><i>0</i></span></a></div>
          <div class="ps-block--user-header">
            <div class="ps-block__left"><i class="icon-user"></i></div>
            <div class="ps-block__right"><a href="my-account.php">Login</a><a href="my-account.php">Register</a></div>
          </div>
        </div>
      </div>
    </div>
    <div class="ps-search--mobile">
      <form class="ps-form--search-mobile" action="index.html" method="get">
        <div class="form-group--nest">
          <input class="form-control" type="text" placeholder="Search something...">
          <button><i class="icon-magnifier"></i></button>
        </div>
      </form>
    </div>
  </header>


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

  <div class="navigation--list">
    <div class="navigation__content">
      <a class="navigation__item" href="#menu-mobile"><i class="icon-menu"></i><span> Home</span></a>
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
  <br>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
           เพิ่มรายการสินค้า Create Product
           <hr>
           <form>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputState">รายการ Category</label>
                <select id="inputState" class="form-control">
                  <option selected>Choose...</option>
                  <?php $sql = mysqli_query($conn,"SELECT * FROM category_db ");
                  while ($rs = mysqli_fetch_assoc($sql)) { ?>
                    <option value="<?=$rs['CAT_ID']?>"><?=$rs['CAT_Name1']?></option>
                  <?php } ?>  

                </select>
              </div>
              <div class="form-group col-md-6">
                <label for="inputState">ชนิด Type</label>
                <select id="inputState" class="form-control">
                  <option selected>Choose...</option>
                  <?php $sql = mysqli_query($conn,"SELECT * FROM type_db ")or die(mysqli_error($conn));
                  while ($rs = mysqli_fetch_assoc($sql)) { ?>
                    <option value="<?=$rs['TYPE_ID']?>"><?=$rs['TYPE_Name1']?></option>
                  <?php } ?>  
                  
                </select>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputAddress">ชื่อสินค้าไทย  Thai ProductName</label>
                <input type="text" class="form-control" name="product_name1" placeholder="Product Name Thai">
              </div>
              <div class="form-group col-md-6">
                <label for="inputAddress2">ชื่อสินค้าอังกฤษ English ProductName </label>
                <input type="text" class="form-control" name="product_name2" placeholder="Product Name English">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputCity">ราคา Price</label>
                <input type="text" class="form-control" name="pd_pirce" placeholder="Price">
              </div>
               <div class="form-group col-md-6">
                <label for="inputCity">ส่วนลด Discount</label>
                <input type="text" class="form-control" name="pd_discount" placeholder="ส่วนลด">
              </div>
              <div class="form-group col-md-6">
                <label for="inputCity">จำนวนสินค้า Stock</label>
                <input type="text" class="form-control" name="stock" placeholder="จำนวน Stock">
              </div>
              <div class="form-group col-md-6">
                <label for="inputCity">ลดราคา PriceSell</label>
                <input type="text" class="form-control" name="pd_pricesell" placeholder="ราคาขาย">
              </div>
              <div class="form-group col-md-6">
                <label for="inputCity">รายละเอียดรายการสินค้า Detail</label>
                <textarea name="detail" class="form-control" placeholder="รายละเอียดรายการสินค้า"></textarea>
              </div>
              <div class="form-group col-md-6">
                <label for="inputState">การส่งเสริมยอดขาย Promotion</label>
                <input type="text" class="form-control" name="pd_pricesell" placeholder="การส่งเสริมยอดขาย">
              </div>
              <div class="form-group col-md-6">
                <label for="inputState">เงื่อนไข Condition</label>
                <input type="text" class="form-control" name="pd_condition" placeholder="เงื่อนไข">
              </div>
            </div>
            <div class="modal-footer"> 
            <button type="submit" class="ps-btn">submit</button>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>


<div class="ps-home-ads">
  <div class="ps-container">
    <div class="row">
      <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12 ">
        <a class="ps-collection" href="#"><img src="img/slider/ad-1.png" alt=""></a>
      </div>
      <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 ">
        <a class="ps-collection" href="#"><img src="img/slider/ad-2.png" alt=""></a>
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
              <form class="ps-form--download-app" action="do_action" method="post">
                <div class="form-group--nest">
                  <input class="form-control" type="Email" placeholder="Email Address">
                  <button class="ps-btn">Subscribe</button>
                </div>
              </form>
              <p class="download-link"><a href="#">
                <img src="img/google-play_0.png" alt=""></a><a href="#"><img src="img/app-store_0.png" alt=""></a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



<div class="ps-newsletter">
  <div class="ps-container">
    <form class="ps-form--newsletter" action="do_action" method="post">
      <div class="row">
        <div class="col-xl-5 col-lg-12 col-md-12 col-sm-12 col-12 ">
          <div class="ps-form__left">
            <h3>Newsletter</h3>
            <p>Subcribe to get information about products and coupons</p>
          </div>
        </div>
        <div class="col-xl-7 col-lg-12 col-md-12 col-sm-12 col-12 ">
          <div class="ps-form__right">
            <div class="form-group--nest">
              <input class="form-control" type="email" placeholder="Email address">
              <button class="ps-btn">Subscribe</button>
            </div>
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
  <script src="plugins/jquery-1.12.4.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
  <script src="plugins/owl-carousel/owl.carousel.min.js"></script>
  <script src="plugins/bootstrap4/js/bootstrap.min.js"></script>
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
</body>
</html>