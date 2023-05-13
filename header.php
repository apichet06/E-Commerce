  <header class="header header--1" data-sticky="true">
    <div class="header__top">
      <div class="ps-container">
        <div class="header__left">
          <!-- Web Menu Header -->
          <?php echo "$Web_Menu"; ?>
          <a class="ps-logo" href="index.php"><img src="img/logo_light.png" alt=""></a>
        </div>
        

        <div class="header__center">
          <form class="ps-form--quick-search" action="shop_allproduct.php" method="get">
            <input class="form-control" type="text" name="search"  id="css_time_run" placeholder="">
            <input class="form-control" type="text" name="id" value="<?=$_GET['id']?>" hidden>
            <button>Search</button>
          </form>
        </div>
        <div class="header__right">
          <div class="header__actions">          
            <div class="ps-cart--mini">
              <a class="header__extra" href="delivery.php"><i class="icon-truck"></i></a>              
            </div>
            <div class="ps-cart--mini">
              <?php 
              $sql02 = mysqli_query($conn,"SELECT m_id FROM member_db Where m_number = '".$_SESSION['login_user']."'")or die(mysqli_error($conn));
              $rs02 = mysqli_fetch_assoc($sql02);
              $sql = mysqli_query($conn,"SELECT * FROM product_cart Where m_id = '".$rs02['m_id']."' ");
              $row = mysqli_num_rows($sql);
              ?>
              <a class="header__extra" href="shopping_cart.php"><i class="icon-bag2"></i><span>
                <i><?=$row ==""?"0": $row ;?></i></span></a>
              </div>

              <div class="ps-block--user-header">
                <div class="ps-block__left"><i class="icon-user"></i></div>
                <div class="ps-block__right">
                  <?php if(!$_SESSION['login_user']){ ?> 
                    <a href="my-account.php?log=login">Login</a>
                    <a href="my-account.php?log=register">Register</a>
                  <?php }else{ 
                    echo "<div><strong>#".$_SESSION['login_user']."</strong></div>";
                    echo '<a href="logout.php">LogOut</a>';
                  } ?>
                </div>
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
          

          <div class="navigation__right">
            <ul class="menu">
            </ul>
            <ul class="navigation__extra">
              <li>
                <div class="ps-dropdown language"><a href="#">Language</a>
                  <ul class="ps-dropdown-menu">
                    <li><a href="#googtrans(en)" class="lang-es lang-select" data-lang="en"><img src="country/uk.png">English</a></li>
                    <li><a href="#googtrans(th)" class="lang-es lang-select" data-lang="th"><img src="country/thailand.png">Thailand</a></li>
                    <li><a href="#googtrans(ar)" class="lang-es lang-select" data-lang="ar"><img src="country/qatar.png">Qatar</a></li>
                  </ul>
                </div>
              </li>
              
            </ul>
          </div>


        </div>
      </nav>
    </header>


    


    <header class="header header--mobile" data-sticky="true">
     <!--  <div class="header__top">
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
      </div> -->

      <div class="navigation--mobile">
        <div class="navigation__left"><a class="ps-logo" href="index.php"><img src="img/logo_light.png" alt=""></a></div>
        <div class="navigation__right">
          <div class="header__actions">
            <div class="ps-cart--mini">
             <a class="header__extra" href="delivery.php"><i class="icon-truck"></i></a>
             <a class="header__extra" href="shopping_cart.php"><i class="icon-bag2"></i><span><i><?=$row ==""?"0": $row ;?></i></span></a></div>
             <div class="ps-block--user-header">
              <div class="ps-block__left">
              	 <?php if(!$_SESSION['login_user']){ ?> 
                  <a class="header__extra" href="my-account.php?log=login"><i class="icon-user"></i></a>
                  <a class="header__extra" href="my-account.php?log=register"><i class="icon-register"></i></a>
                <?php }else{ 
                  echo '<a href="logout.php">LogOut</a>';
                } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="ps-search--mobile">
        <form class="ps-form--search-mobile" action="shop_allproduct.php" method="get">
          <div class="form-group--nest">
            <input class="form-control" type="text" name="search"  placeholder="Search something...">
            <input class="form-control" type="text" name="id" value="<?=$_GET['id']?>" hidden>
            <button><i class="icon-magnifier"></i></button>
          </div>
        </form>
      </div>
    </header>
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
          <form class="ps-form--search-mobile" action="shop_allproduct.php" method="get">
            <div class="form-group--nest">
              <input class="form-control" type="text" name="search"  placeholder="Search something...">
              <input class="form-control" type="text" name="id" value="<?=$_GET['id']?>" hidden>
              <button><i class="icon-magnifier"></i></button>
            </div>
          </form>
        </div>
        <div class="navigation__content"></div>
      </div>
      <!-- Mobile Cart -->
      <div class="ps-panel--sidebar" id="cart-mobile">
        <div class="ps-panel__header">
          <h3>Shopping Cart</h3>
        </div>
        <div class="navigation__content">
          <div class="ps-cart--mobile">
            <div class="ps-cart__content">
              <?php $sql = mysqli_query($conn,"SELECT b.cat_name1,a.pic1,a.pic2,a.pic3,a.pd_name1,a.pd_name2,a.pd_price,a.pd_pricesell,a.pd_id,a.pd_detail
                ,a.pd_discount,a.pd_promotion,a.pd_condition,a.cat_id,a.Stock,a.type_id,a.pd_number,a.pd_id,c.*
                FROM product_db a 
                INNER JOIN category_db b 
                on a.cat_id =b.cat_id
                INNER JOIN product_cart c 
                on a.pd_id = c.pd_id  
                Where  c.m_id = '".$rs02['m_id']."' 
                order by c.pd_id DESC")or die(mysqli_error($conn));
              $i=1; 
              while($rs = mysqli_fetch_assoc($sql)){ ?>
                <div class="ps-product--cart-mobile">
                  <div class="ps-product__thumbnail"><a href="product-detail.php">
                    <img src="admin/manage_product/uploads/<?=$rs['pic1']?>"/></a></div>
                    <div class="ps-product__content">                 
                      <a class="ps-product__title" href="product-detail.php?id=<?=$rs['cat_id']?>&cat_id=<?=$rs['pd_id']?>"><?=$rs['pd_name1']; if($rs['pd_name2']){ echo "(".$rs['pd_name2'].")"; } ?></a>

                      <a href="" class="ps-product__remove del"
                      data-id = "<?=$rs['pd_id']?>
                      "><i class="fa fa-trash-o"></i></a>
                      <?php if($rs['pd_pricesell']){ ?>

                        <div class="text-danger">$<?=number_format($rs['pd_pricesell'])?> <del class="text-dark"> 
                          <?=number_format($rs['pd_price']);?></del> <span class="text-danger"> -<?=$rs['pd_discount']."%";?></span></div>
                        <?php }else{ ?>
                          <div class="ps-product__price">$<?=number_format($rs['pd_price']);?></div>
                        <?php } ?>
                        <small><?=$rs['pc_qty']; ?> x <?php if($rs['pd_pricesell']){
                          echo "$".number_format($rs['pd_pricesell']);
                          $sum_price =$rs['pd_pricesell'];
                        }else{
                          echo "$".number_format($rs['pd_price']);
                          $sum_price =$rs['pd_pricesell'];
                        } ?></small>
                      </div>
                    </div><hr>
                  <?php } ?> 
                </div>
                <?php $sql = mysqli_query($conn,"SELECT sum(pc_price*pc_qty)as sum_price FROM product_cart 
                 Where  m_id = '".$rs02['m_id']."'");
                $sum = mysqli_fetch_assoc($sql);
                ?>
                <div class="ps-cart__footer">
                  <h3>Sub Total:<strong><?="$".number_format($sum['sum_price']); ?></strong></h3>
                  <figure><a class="ps-btn" href="shopping_cart.php">Checkout</a></figure>
                </div>
              </div>
            </div>
          </div>
          <!-- ซ่อน google translate -->
          <style type="text/css">
            .goog-te-banner-frame.skiptranslate{display:none!important;}
            body{top:0px!important;}
            .card,.header {
              -webkit-box-shadow: 0 10px 34px rgba(0, 0, 0, 0.12);
              -moz-box-shadow: 0 10px 34px rgba(0, 0, 0, 0.12);
              box-shadow: 0 10px 34px rgba(0, 0, 0, 0.12);
            }
            .btn {
              box-shadow: 0 6px 8px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
            }
          </style>
          
          