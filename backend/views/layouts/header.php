<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Eworld </title>
    <!-- Bootstrap -->
    <link href="assets/gente/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="assets/gente/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="assets/gente/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="assets/gente/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="assets/gente/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="assets/gente/build/css/custom.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <style>
      .table td {
      vertical-align: unset !important;
      }
    </style>
  </head>
  <body class="nav-md">
    <div class="container body">
    <div class="main_container">
    <div class="col-md-3 left_col">
      <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
          <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Eworld Admin</span></a>
        </div>
        <div class="clearfix"></div>
        <!-- menu profile quick info -->
        <div class="profile clearfix">
          <div class="profile_pic">
            <img height="50" width="50" src="assets/images/users/<?php echo $_SESSION['admin']['avatar']; ?>" alt="..." class="img-circle profile_img">
          </div>
          <div class="profile_info">
            <span>Welcome,</span>
            <h2><?php echo $_SESSION['admin']['username']; ?></h2>
          </div>
        </div>
        <!-- /menu profile quick info -->
        <br />
        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
          <div class="menu_section">
            <ul class="nav side-menu">
              <li>
                <a href="index.php?controller=home"><i class="fa fa-home"></i> Trang chủ</a>
              </li>
              <li class="<?php if ($_GET['controller'] == 'category') { echo 'active'; } else { echo '';} ?>">
                <a href="index.php?controller=category&action=index"><i class="fas fa-list mr-2"></i> Quản lí danh mục</a>
              </li>
              <li class="<?php if ($_GET['controller'] == 'product') { echo 'active'; } else { echo '';} ?>">
                <a href="index.php?controller=product&action=index"><i class="fa fa-edit"></i> Quản lí sản phẩm </a>
              </li>
              <li class="<?php if ($_GET['controller'] == 'slide') { echo 'active'; } else { echo '';} ?>">
                <a href="index.php?controller=slide&action=index"><i class="fas fa-paperclip mr-2"></i> Quản lí ảnh slide </a>
              </li>
              <li class="<?php if ($_GET['controller'] == 'user') { echo 'active'; } else { echo '';} ?>">
                <a href="index.php?controller=user&action=index"><i class="fas fa-users mr-2"></i>  Quản lí tài khoản </a>
              </li>
              <li class="<?php if ($_GET['controller'] == 'order') { echo 'active'; } else { echo '';} ?>">
                <a href="index.php?controller=order&action=index"><i class="fas fa-box-open"></i>  Quản lí đơn hàng </a>
              </li>
            </ul>
            <div class="home text-center">   
              <a target="_blank" class="btn btn-info" style="color: black;" href="http://localhost/eworld/fontend/index.php"><i class="fas fa-home"></i> </a>
            </div>
          </div>
        </div>
        <!-- /sidebar menu -->
        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
          <a data-toggle="tooltip" data-placement="top" title="Settings">
          <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
          </a>
          <a data-toggle="tooltip" data-placement="top" title="FullScreen">
          <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
          </a>
          <a data-toggle="tooltip" data-placement="top" title="Lock">
          <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
          </a>
          <a data-toggle="tooltip" data-placement="top" title="Logout" href="http://localhost/eworld/backend/index.php?controller=user&action=logout">
          <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
          </a>
        </div>
        <!-- /menu footer buttons -->
      </div>
    </div>
    <!-- top navigation -->
    <div class="top_nav">
      <div class="nav_menu">
        <div class="nav toggle">
          <a id="menu_toggle"><i class="fa fa-bars"></i></a>
        </div>
        <nav class="nav navbar-nav">
          <ul class=" navbar-right">
            <li class="nav-item dropdown open" style="padding-left: 15px;">
              <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
              <img src="assets/images/users/<?php echo $_SESSION['admin']['avatar']; ?>" alt="">
              <?php echo $_SESSION['admin']['username']; ?>
              </a>
              <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item"  href="http://localhost/eworld/backend/index.php?controller=user&action=info"> Hồ sơ cá nhân</a>
                <a class="dropdown-item"  href="http://localhost/eworld/backend/index.php?controller=user&action=logout"><i class="fa fa-sign-out pull-right"></i> Đăng xuất</a>
              </div>
            </li>
          </ul>
        </nav>
      </div>
    </div>
    <!-- /top navigation -->
    <div class="right_col" role="main">
    <div class="clearfix"></div>
    <?php if (isset($_SESSION['error'])): ?>
    <div class="alert alert-danger">
      <?php
        echo $_SESSION['error'];
        unset($_SESSION['error']);
        ?>
    </div>
    <?php endif; ?>
    <?php if (!empty($this->error)): ?>
    <div class="alert alert-danger">
      <?php
        echo $this->error;
        ?>
    </div>
    <?php endif; ?>
    <?php if (isset($_SESSION['success'])): ?>
    <div class="alert alert-success">
      <?php
        echo $_SESSION['success'];
        unset($_SESSION['success']);
        ?>
    </div>
    <?php endif; ?>