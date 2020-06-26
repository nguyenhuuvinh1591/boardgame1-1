<?php 
    include 'lib/session.php';
    Session::init();
?>
<?php 
    include 'lib/database.php';
    include 'helpers/format.php';
    spl_autoload_register(function($class){
        include_once "classes/".$class.".php";
    });
    $db = new Database();
    $fm = new Format();
    $ct = new cart();
    $us = new user();
    $cat = new category();
    $product = new product();
?>
<?php 
    header("Cache-Control: no-cache, must-revalidate");
    header("Pragma: no-cache");
    header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
    header("Cache-Control: max-age=2592000");
?>
<!DOCTYPE html>
<html lang="en">
<!-- Basic -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>BoardGameVLP</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <!-- <link rel="stylesheet" href="css/custom.css"> -->

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Start Main Top -->
    <div class="main-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="text-slid-box">
                        <div id="offer-box" class="carouselTicker">
                            <ul class="offer-box">
                                <li>
                                    <i class="fab fa-opencart"></i> 10% off on Board Game Werewolf
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> 25% off Entire Purchase Promo code: off-VLP
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> 10% off on Board Game Werewolf
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> 25% off Entire Purchase Promo code: off-VLP
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <?php

                ?>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    
                    <?php
                        
                        if(isset($_GET['maKhachHang']))
                        {
                            Session::destroy();
                        }
                    ?>
                    <div class="our-link">
                        <ul>
                        <li><a href="bando.php">Bản đồ</a></li>

                        <?php
                        $logincheck = Session::get('customerlogin');
                        if($logincheck == false)
                        {
                           echo  '<li><a href="dangnhap.php">Đăng Nhập</a></li>';
                            echo '<li><a href="dangky.php">Đăng Ký</a></li>';
                        }
                        else
                        {
                            ?>
                            <div class="custom-select-box">
                                    <li class="nav-item dropdown no-arrow">
                                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"></span>
                                    <i class="fa fa-user" style="color: white"></i>
                                    </a>
                                    <!-- Dropdown - User Information -->
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Thông tin cá nhân
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <?php

                                    echo '<a class="dropdown-item" href="?maKhachHang='.Session::get('customerid').'">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Thoát
                                    </a>'
                                    ?>
                                    
                                    </div>
                                </li>
                          </div>
                          <?php

                        }
                        
                    ?>

                            

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Main Top -->

    <!-- Start Main Top -->
    <header class="main-header">
        <!-- Start Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
            <div class="container">
                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                    <a class="navbar-brand" href="index.php"><img src="images/logoMain.PNG" class="logo" height="100px" alt=""></a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                        <li class="nav-item active"><a class="nav-link" href="index.php">Trang Chủ</a></li>
                        <li class="nav-item"><a class="nav-link" href="about.php">Giới Thiệu</a></li>
                        <li class="nav-item"><a class="nav-link" href="shop.php">Sản Phẩm</a></li>                      
                        <li class="dropdown">
                            <a href="#" class="nav-link dropdown-toggle arrow" data-toggle="dropdown">Thông Tin</a>
                            <ul class="dropdown-menu">
                                <li><a href="cart.php">Giỏ hàng</a></li>
                                <li><a href="checkout.php">Thanh toán</a></li>
                                <li><a href="my-account.php">Thông tin tài khoản</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="contact-us.php">Liên Hệ</a></li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->

                <!-- Start Atribute Navigation -->
                <?php 
                    $product_cart = $ct->get_product_cart();
                    if($product_cart){   
                        $count = 0;
                        while($result = $product_cart->fetch_assoc()){ 
                            $count++; 
                        }
                    } 
                ?>
                <div class="attr-nav">
                    <ul>
                        <li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
                        <li class="side-menu">
                            <a href="#">
                                <i class="fa fa-shopping-bag"></i>
                                <span class="badge"><?php echo $count ?></span>
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- End Atribute Navigation -->
            </div>
            <!-- Start Side Menu -->
            <div class="side">
                <a href="#" class="close-side"><i class="fa fa-times"></i></a>
                <li class="cart-box">
                    <ul class="cart-list">
                        <?php 
                            $product_cart = $ct->get_product_cart();
                             if($product_cart){
                                 $subTotal = 0;     
                             while($result = $product_cart->fetch_assoc()){ 
                                 @$subTotal+=$total;                             
                                ?>
                            <li>
                                <a href="#" class="photo"><img src="img/<?php echo $result['hinhAnh'] ?>" class="cart-thumb" alt="" /></a>
                                <h6><a href="#"><?php echo $result['tenSanPham'] ?> </a></h6>
                                <p><?php echo $result['soLuongSanPham'] ?> - <span class="price"><?php echo $result['donGia'] ?></span></p>
                            </li>
                        <?php 
                                }
                            }
                        ?>
                        <li class="total">
                            <a href="cart.php" class="btn btn-default hvr-hover btn-cart">VIEW CART</a>
                        </li>
                    </ul>
                </li>
            </div>
            <!-- End Side Menu -->
        </nav>
        <!-- End Navigation -->
    </header>
    <!-- End Main Top -->

    <!-- Start Top Search -->
    <div class="top-search">
        <div class="container">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                <input type="text" class="form-control" placeholder="Search">
                <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
            </div>
        </div>
    </div>
    <!-- End Top Search -->
  
</body>
</head>

</html>