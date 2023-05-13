<?php @session_start();
include("config.php"); ?>

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
  <link rel="stylesheet" href="css/market-place-1.css">
</head>
<!-- ซ่อน google translate -->
<style type="text/css">
  .goog-te-banner-frame.skiptranslate{display:none!important;}
  body{top:0px!important;}
</style>
<body>
  <header class="header header--standard header--market-place-1" data-sticky="true">
  </div>
  <div class="header__content">
    <div class="container">
      <div class="header__content-left">
        <div class="menu--product-categories">
          <div class="menu__toggle"><i class="icon-menu"></i><span> Shop by Department</span></div>

        </div><a class="ps-logo" href="index.php"><img src="img/logo_light.png" alt=""></a>
      </div>

      <div class="header__content-center">
        <?php echo "$Search_Top"; ?>
      </div>

      <div class="header__content-right">
        <div class="header__actions">

          <div class="ps-block--user-header">
            <div class="ps-block__left"><i class="icon-user"></i></div>
            <div class="ps-block__right">
              <?php if(!$_SESSION['login_user']){?> 
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
  <div class="container">
    <div class="navigation__left">
     <!-- Web Menu Header -->
     <?php echo "$Web_Menu"; ?>

   </div>
   <div class="navigation__right">
    <ul class="menu">
    </ul>
    <ul class="navigation__extra">
      <li>
        <div class="ps-dropdown language"><a href="#">Language</a>
          <ul class="ps-dropdown-menu">
            <li><a href="#googtrans(en|en)" class="lang-en lang-select" data-lang="en"><img src="country/uk.png">English</a></li>
            <li><a href="#googtrans(en|th)" class="lang-es lang-select" data-lang="th"><img src="country/thailand.png">Thailand</a></li>
            <li><a href="#googtrans(en|ar)" class="lang-es lang-select" data-lang="ar"><img src="country/qatar.png">Qatar</a></li>
          </ul>
        </div>
      </li>

    </ul>
  </div>

</div>
</nav>
</header>
<header class="header header--mobile" data-sticky="true">

  <div class="navigation--mobile">
    <div class="navigation__left"><a class="ps-logo" href="index.php"><img src="img/logo_light.png" alt=""></a></div>
    <div class="navigation__right">
      <div class="header__actions">
        <div class="ps-block--user-header">
          <a class="header__extra" href="my-account.php?log=login"><i class="icon-user"></i></a>
          <a class="header__extra" href="my-account.php?log=register"><i class="icon-register"></i></a>
        </div>
      </div>
    </div>
  </div>
  <div class="ps-search--mobile">
    <form class="ps-form--quick-search" action="shop_allproduct.php" method="get">
     <input class="form-control" type="text" name="search"  id="css_time_run" placeholder="Search something...">
     <input class="form-control" type="text" name="id" value="<?=$_GET['id']?>" hidden>
     <button>Search</button>
   </form>
 </div>
</header>


<!-- Mobile Menu -->
<div class="ps-panel--sidebar" id="navigation-mobile">
  <?php echo "$Mobile_Menu";?>
</div>
<!-- เมนู mobile -->
<div class="navigation--list">
  <div class="navigation__content"><a class="navigation__item " href="index.php"><i class="icon-menu"></i><span> Home</span></a><a class="navigation__item ps-toggle--sidebar" href="#navigation-mobile"><i class="icon-list4"></i><span> Categories</span></a><a class="navigation__item ps-toggle--sidebar" href="#search-sidebar"><i class="icon-magnifier"></i><span> Search</span></a></div>
</div>
<div class="ps-panel--sidebar" id="search-sidebar">
  <div class="ps-panel__header">
    <div class="header__center">
      <form class="ps-form--quick-search" action="shop_allproduct.php" method="get">
        <input class="form-control" type="text" name="search"  id="css_time_run" placeholder="Search something...">
        <input class="form-control" type="text" name="id" value="<?=$_GET['id']?>" hidden>
        <button>Search</button>
      </form>
    </div>
  </div>
  <div class="navigation__content"></div>
</div>
<!--       <form class="ps-form--search-mobile" action="shop_allproduct.php" method="get">
        <div class="form-group--nest">
          <input class="form-control" type="text" placeholder="Search something...">
          <button><i class="icon-magnifier"></i></button>
        </div>
      </form> -->


      <div class="ps-page--my-account">
        <div class="ps-breadcrumb">
          <div class="container">
            <ul class="breadcrumb">
              <li><a href="index.php">Home</a></li>
              <li>My account</li>
            </ul>
          </div>
        </div>

        <div class="ps-my-account">
          <div class="container">
           <form class="ps-form--account ps-tab-root" id="form_login" method="POST">
            <ul class="ps-tab-list">
              <?php if($_GET['log']=="login"){ 
                echo '<li class="active"><a href="#sign-in">Login</a></li>'; 
              }else if($_GET['log']=="register"){
                echo '<li class="active"><a href="#register">Register</a></li>';
              }?> 
            </ul>
            <div class="ps-tabs">
              <div class="ps-tab <?php if($_GET['log']=="login"){ echo "active"; }?>">
                <div class="ps-form__content">
                  <h5>Log In Your Account</h5>
                  <div id="myAlert" class="alert alert-danger alert-dismissible  collapse" role="alert">
                    <strong>alert!</strong> The username and password are incorrect.
                  </div>
                  <div class="form-group">
                    <input class="form-control" type="email" name="user" required placeholder="Email address">
                  </div>
                  <div class="form-group form-forgot">
                    <input class="form-control" type="password" name="pass" required placeholder="Password">
                  </div>
                  <div class="form-group submtit">
                    <button type="summit" class="ps-btn ps-btn--fullwidth">Login</button>
                  </div>
                </div>
                <div class="ps-form__footer">
                  <p>Connect with:</p>
                  <ul class="ps-list--social">
                    <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a class="google" href="#"><i class="fa fa-google-plus"></i></a></li>
                  </ul>
                </div>
              </div>
            </form>

            <div class="ps-tab <?php if($_GET['log']=="register"){echo "active"; }?>">
              <form name="form1" id="form1" action="my-account.php" method="POST" accept-charset="utf-8"> 
                <div class="ps-form__content">
                  <h5>Register An Account</h5>
                  <div class="form-group">
                    <center><strong id="same_name" class="text-danger"></strong></center>
                    <input class="form-control" type="email" name="register_name" required placeholder="Email address">
                  </div>
                  <div class="form-group">
                    <center><strong id="notmatch" class="text-danger"></strong></center>
                    <input class="form-control" type="password" name="register_password" required placeholder="Password">
                  </div>
                  <div class="form-group">
                    <input class="form-control" type="password" name="confirm_password" required placeholder="Confirm Password">
                  </div>

                  <div class="form-group submtit">
                    <button class="ps-btn ps-btn--fullwidth" type="submit">Register</button>
                  </div>
                </div>
                <br>
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
    <!--include shared/cart-sidebar-->
    <!-- Plugins-->
    <?php require_once 'link_js/link_js.php'; ?>
    <script type="text/javascript">
     $("#form1").on('submit', function(event) {
       event.preventDefault();
       var elem = document.form1.register_password.value;
       var register ="register";

       if(document.form1.register_password.value != document.form1.confirm_password.value) {
        $("#notmatch").html("<div class='alert alert-danger'>* Confirm Password Not Match *</div>");
        return false;
      }else if(!elem.match(/^([a-z0-9])+$/i)){
        $("#notmatch").html("<div class='alert alert-danger'>* Can only fill in a-z 0-9 *</div>");
        return false;
      }else if(elem.length < 10){
       $("#notmatch").html("<div class='alert alert-danger'>* Password = 10 or greater than 10 *</div>");
       return false;
     }

     $.ajax({
       url: 'login.php',
       type: 'POST',
       dataType: 'json',
       data: $(this).serialize()+"&register="+register,
       success :function(data){
      //console.log(data.data_register);
      if(data.data_register=="1"){

        window.location.href="my-account.php?log=login";

      }else if (data.data_register=="01") {

        $("#same_name").html("<div class='alert alert-danger'>* That name already exists *</div>");

      }
    }
  })

   });

     $('#form_login').on('submit',function(e){
       e.preventDefault();
       var login = "login";
       $.ajax({
         url: 'login.php',
         type: 'POST',
         dataType: 'json',
         data: $(this).serialize()+"&login="+login,
         success :function(data){
          if(data.data_login=="1"){
           setTimeout(function(){
            window.location.href="index.php";
          },200)
         }else if(data.data_login=="0"){
          setTimeout(function(){
            $("#myAlert").show('fade');
          },500)
        }
      }
    })

     })
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