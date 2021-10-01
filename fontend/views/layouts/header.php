<!doctype html>
<html class="no-js" lang="zxx">
    
<!-- index28:48-->
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>
            <?php echo $title; ?>
        </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.png">
        <!-- Material Design Iconic Font-V2.2.0 -->
        <link rel="stylesheet" href="assets/css/material-design-iconic-font.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        <!-- Font Awesome Stars-->
        <link rel="stylesheet" href="assets/css/fontawesome-stars.css">
        <!-- Meanmenu CSS -->
        <link rel="stylesheet" href="assets/css/meanmenu.css">
        <!-- owl carousel CSS -->
        <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
        <!-- Slick Carousel CSS -->
        <link rel="stylesheet" href="assets/css/slick.css">
        <!-- Animate CSS -->
        <link rel="stylesheet" href="assets/css/animate.css">
        <!-- Jquery-ui CSS -->
        <link rel="stylesheet" href="assets/css/jquery-ui.min.css">
        <!-- Venobox CSS -->
        <link rel="stylesheet" href="assets/css/venobox.css">
        <!-- Nice Select CSS -->
        <link rel="stylesheet" href="assets/css/nice-select.css">
        <!-- Magnific Popup CSS -->
        <link rel="stylesheet" href="assets/css/magnific-popup.css">
        <!-- Bootstrap V4.1.3 Fremwork CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <!-- Helper CSS -->
        <link rel="stylesheet" href="assets/css/helper.css">
        <!-- Main Style CSS -->
        <link rel="stylesheet" href="assets/style.css">
        <link rel="stylesheet" href="assets/css/slide.css">
        <!-- Responsive CSS -->
        <link rel="stylesheet" href="assets/css/responsive.css">
       <!--  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" /> -->
        <!-- Modernizr js -->
        <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body>
        <style>
            body {
                font-family: 'Montserrat', sans-serif !important;
            }
            .ajax-message {
                position: fixed;
                right: 12px;
                top: 35px;
                z-index: 10000000;
                border: 1px solid #21431ecc;
                color: #21431ecc;
                padding: 4px 12px;
                border-radius: 4px;
                background: #fff;
                transition: all 0.3s ease 0s;
                opacity: 0;
            }
            .ajax-message-active {
                opacity: 1;
            }
            .li-product-menu li a {
                font-weight: normal !important;
            }

        </style>

    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
        <!-- Begin Body Wrapper -->
        <div class="body-wrapper">
            <!-- Begin Header Area -->
            <header>
                <!-- Begin Header Top Area -->
                <div class="header-top">
                    <div class="container">
                        <div class="row">
                            <!-- Begin Header Top Left Area -->
                            <div class="col-lg-3 col-md-4">
                                <div class="header-top-left">
                                </div>
                            </div>
                            <!-- Header Top Left Area End Here -->
                            <!-- Begin Header Top Right Area -->
                            <div class="col-lg-9 col-md-8">
                                <div class="header-top-right">
                                    <ul class="ht-menu">
                                        <!-- Begin Setting Area -->
                                        <li>Hotline: 0968361921</li>
                                        <li>
                                            <div class="ht-setting-trigger"><span>Tài khoản</span></div>
                                            <div class="setting ht-setting">
                                                <ul class="ht-setting-list">
                                                    <?php if (!isset($_SESSION['user'])) { ?>
                                                        <li><a href="index.php?controller=login&action=login">Đăng nhập</a></li>
                                                        <li><a href="index.php?controller=login&action=register">Đăng kí</a></li>
                                                    <?php } ?>
                                                    <?php if (isset($_SESSION['user'])) { ?>
                                                        <li><a href="index.php?controller=user&action=account"><?php echo $_SESSION['user']['last_name']?></a></li>
                                                        <li><a onclick="return confirm('Bạn chắc chắn đăng xuất tài khoản không?')" href="index.php?controller=login&action=logout">Đăng xuất</a></li>
                                                <?php } ?>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Header Top Right Area End Here -->
                        </div>
                    </div>
                </div>
                <!-- Header Top Area End Here -->
                <!-- Begin Header Middle Area -->
                <div class="header-middle pl-sm-0 pr-sm-0 pl-xs-0 pr-xs-0">
                    <div class="container">
                        <div class="row">
                            <!-- Begin Header Logo Area -->
                            <div class="col-lg-3">
                                <div class="logo pb-sm-30 pb-xs-30">
                                    <a href="index.php?controller=home&action=index">
                                        <img style="max-width: 200px" src="assets/images/menu/logo/logoE.png" alt="">
                                    </a>
                                </div>
                            </div>
                            <!-- Header Logo Area End Here -->
                            <!-- Begin Header Middle Right Area -->
                            <div class="col-lg-9 pl-0 ml-sm-15 ml-xs-15">
                                <!-- Begin Header Middle Searchbox Area -->
                                <form method="GET" action="" class="hm-searchbox">
                                    <input type="hidden" name="controller" value="home">
                                    <input type="hidden" name="action" value="search">
                                    <input value="<?php 
                                        if (isset($_GET['text_search'])) {
                                            echo $_GET['text_search'];
                                        } else {
                                            echo '';
                                        }
                                    ?>" type="text" placeholder="" name="text_search">
                                    <input value="Tìm kiếm" class="btn btn-outline-warning w-25" name="search" type="submit">
                                       <!--  <i class="">
                                        </i> -->
                                </form>
                                <!-- Header Middle Searchbox Area End Here -->
                                <!-- Begin Header Middle Right Area -->
                                <div class="header-middle-right">
                                    <ul class="hm-menu">
                                        <!-- Begin Header Middle Wishlist Area -->
                                        <!-- Header Middle Wishlist Area End Here -->
                                        <!-- Begin Header Mini Cart Area -->
                                        <li class="hm-minicart">
                                            <div class="hm-minicart-trigger">
                                                <span class="item-icon"></span>
                                                <span class="item-text">
                                                    <?php
                                                      $cart_total = 0;
                                                      if (isset($_SESSION['cart'])) {
                                                        foreach ($_SESSION['cart'] AS $cart) {
                                                          $cart_total += $cart['quantity'];
                                                        }
                                                      }
                                                      ?>
                                                        <span class="cart-item">
                                                            <?php echo $cart_total; ?>
                                                        </span>
                                                </span>
                                            </div>
                                            <span class="ajax-message"></span>
                                            <div class="minicart">
                                                <div class="minicart-button d-flex justify-content-around">
                                                    <a href="index.php?controller=cart&action=index" class="btn btn-warning">
                                                        <span>Giỏ hàng</span>
                                                    </a>
                                                    <a href="index.php?controller=payment&action=index" class="btn btn-dark">
                                                        <span>Thanh toán</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- Header Mini Cart Area End Here -->
                                    </ul>
                                </div>
                                <!-- Header Middle Right Area End Here -->
                            </div>
                            <!-- Header Middle Right Area End Here -->
                        </div>
                    </div>
                </div>

                <!-- Header Middle Area End Here -->
                <!-- Begin Header Bottom Area -->
                <div class="header-bottom header-sticky d-none d-lg-block d-xl-block">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- Begin Header Bottom Menu Area -->
                                <div class="hb-menu">
                                    <nav>
                                        <ul>
                                            <li><a class="font-weight-bold" href="index.php?controller=home&action=index">
                                                Trang Chủ
                                            </a>
                                            </li>
                                           <?php foreach ($category as $category) : ?>
                                             <li><a class="font-weight-bold" href="index.php?controller=category&action=<?php   echo $category['action'];?>">
                                                <?php echo $category['name']; ?>
                                                </a>
                                                <!-- <ul class="hb-dropdown">
                                                    <li class="active"><a href="index.html">Home One</a></li>
                                                    <li><a href="index-2.html">Home Two</a></li>
                                                    <li><a href="index-3.html">Home Three</a></li>
                                                    <li><a href="index-4.html">Home Four</a></li>
                                                </ul> -->
                                            </li>
                                           <?php endforeach; ?>
                                        </ul>
                                    </nav>
                                </div>
                                <!-- Header Bottom Menu Area End Here -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Header Bottom Area End Here -->
                <!-- Begin Mobile Menu Area -->
                <div class="mobile-menu-area d-lg-none d-xl-none col-12">
                    <div class="container"> 
                        <div class="row">
                            <div class="mobile-menu">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Mobile Menu Area End Here -->
            </header>
            <!-- Header Area End Here -->