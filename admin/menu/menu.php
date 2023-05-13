<?php session_start(); require_once '../../config.php';
$sql  = mysqli_query($conn,"SELECT  u_name,u_lname FROM  user  WHERE  username  = '".$_SESSION['login']."' ");  
$login = mysqli_fetch_array($sql);
if(!$login){
  header("Location: ../index.php");
}
?>
<style type="text/css">
  .btn {
    box-shadow: 0 6px 8px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
  }
  .form-control{

    box-sizing: border-box;
    border: 2px solid #ccc;
    -webkit-transition: 0.5s;
    transition: 0.5s;
    outline: none;
  }

</style>
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="../home/index.php" class="nav-link">Home</a>
    </li>
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">

    <!-- <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fa-comments"></i>
        <span class="badge badge-danger navbar-badge">3</span>
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <a href="#" class="dropdown-item">
   
          <div class="media">
            <img src="../dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
            <div class="media-body">
              <h3 class="dropdown-item-title">
                Brad Diesel
                <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
              </h3>
              <p class="text-sm">Call me whenever you can...</p>
              <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
            </div>
          </div>
   
        </a>

        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
      </div>
    </li> -->
    <!-- Notifications Dropdown Menu
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fa-bell"></i>
        <span class="badge badge-warning navbar-badge">15</span>
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <span class="dropdown-item dropdown-header">15 Notifications</span>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
          <i class="fas fa-envelope mr-2"></i> 4 new messages
          <span class="float-right text-muted text-sm">3 mins</span>
        </a>

        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
      </div>
    </li> -->
    <li class="nav-item">
      <a class="nav-link" href="../logout.php"><i class="fas fa-sign-out-alt"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-teal elevation-4 ">
    <!-- Brand Logo -->
    <a href="../home/index.php" class="brand-link">
      <img src="../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
      style="opacity: .8">
      <span class="brand-text font-weight-light"> <img src="../../img/logo_light.png" alt=""></a></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../dist/img/user2-160x160.jpg" class="img-circle elevation-2 text-primary" alt="User Image">
        </div>
        <div class="info">
          <b class="d-block"><?=$login['u_name']."  ".$login['u_lname']?></b>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false" id="myUL">
          <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->

           <li class="nav-item">
            <a href="../home/index.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../chart/chart.php" class="nav-link">
              <i class="fas fa-chart-area"></i>
              <p> Chart <span class="right badge badge-danger"></span></p>
            </a>
          </li>

          
           <li class="nav-item">
            <a href="../commission/index.php" class="nav-link">
              <i class="fas fa-dollar-sign"></i>
              <p>&nbsp; Commission</p>
            </a>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p> Manages <i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../manage_images/index.php" class="nav-link"><i class="far fa-circle nav-icon"></i>
                  <p>Images</p></a>
                </li>
                <li class="nav-item">
                  <a href="../user/index.php" class="nav-link"><i class="far fa-circle nav-icon"></i>
                    <p>User Manages</p></a>
                  </li>
                  <li class="nav-item">
                    <a href="../manage_product/category.php" class="nav-link"><i class="far fa-circle nav-icon"></i>
                      <p>Category</p></a>
                    </li>
                    <li class="nav-item">
                      <a href="../type/index.php" class="nav-link"><i class="far fa-circle nav-icon"></i>
                        <p>Product Type</p></a>
                      </li>
                      <li class="nav-item">
                        <a href="../manage_product/product.php" class="nav-link"><i class="far fa-circle nav-icon"></i>
                          <p>Product</p></a>
                        </li>
                      </ul>
                    </li>


                  </ul>
                </nav>
                <!-- /.sidebar-menu -->
              </div>
              <!-- /.sidebar -->
            </aside>

