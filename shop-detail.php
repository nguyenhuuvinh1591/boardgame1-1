<?php
    include "inc/header.php";
?>
<?php 
    if(!isset($_GET['proid']) || $_GET['proid'] == NULL)
    {
        echo "<script>window.location = '404.php'</script>";
    }
    else
    {
        $id = $_GET['proid'];
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['mua'])){
        $quantity = $_POST['quantity'];
        $Addtocat = $ct->add_to_cart($quantity, $id);
    }
?>

    <!-- Start Shop Detail  -->
    <div class="shop-detail-box-main">
        <div class="container">
            <?php 
                $product_detail=$product->getproduct_details($id);
                if($product_detail){
                     while($result=$product_detail->fetch_assoc()){
            ?>
                <div class="row">

                    <div class="col-xl-5 col-lg-5 col-md-6">
                        <div id="carousel-example-1" class="single-product-slider carousel slide" data-ride="carousel">
                            <div class="carousel-inner" role="listbox">
                                <div class="carousel-item active"> <img class="d-block w-100" src="img/<?php echo $result['hinhAnh'] ?>" alt="First slide"> </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-7 col-md-6">
                        <div class="single-product-details">
                            <h2><?php echo $result['tenSanPham'] ?></h2>
                            <?php $price=(int)$result['donGia']+50000 ?>
                            <h5> <del><?php echo $price ?></del> <?php echo $result['donGia'] ?> VNĐ</h5>
                                <p>
                                    <h4>Mô tả:</h4>
                                    <p><?php echo $result['mieuTa'] ?></p>
                                    <ul>
                                        <li>
                                            <form action="" method="post">
                                                <div class="form-group quantity-box">
                                                    <label class="control-label">Số Lượng</label>
                                                    <input class="form-control" value="1" min="1" max="20" size="40" type="number" name="quantity">
                                                    
                                                </div>
                                                <div class="price-box-bar">
                                                    <div class="cart-and-bay-btn" >
                                                        <input style="color: white;" type="submit" class="btn hvr-hover" data-fancybox-close="" value="Mua Ngay" name="mua" >
                                                        <input style="color: white;" type="submit" class="btn hvr-hover" data-fancybox-close="" value="Thêm vào giỏ hàng" name="themvaogiohang">
                                                    </div>
                                                </div>
                                            </form>
                                            </li>
                                    </ul>
                                    <div class="add-to-btn">
                                        <div class="share-bar" style="margin-top: -12%;">
                                            <a class="btn hvr-hover" href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a>
                                            <a class="btn hvr-hover" href="#"><i class="fab fa-google-plus" aria-hidden="true"></i></a>
                                            <a class="btn hvr-hover" href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a>
                                            <a class="btn hvr-hover" href="#"><i class="fab fa-pinterest-p" aria-hidden="true"></i></a>
                                            <a class="btn hvr-hover" href="#"><i class="fab fa-whatsapp" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                        </div>
                    </div>
                </div>
            <?php 
                }
            }
            ?>

            <div class="row my-5">
                <div class="col-lg-12">
                    <div class="title-all text-center">
                        <h1>Sản phẩm nổi bật</h1>
                    </div>
                    <div class="featured-products-box owl-carousel owl-theme">
                        <?php    
                             $product_feathered=$product->getproduct_feathered();    
                            if($product_feathered){ 
                                while($result=$product_feathered->fetch_assoc()){ 
                        ?>
                            <div class="item">
                                <div class="products-single fix">
                                    <div class="box-img-hover">
                                        <img src="img/<?php echo $result['hinhAnh'] ?>" class="img-fluid" alt="Image">
                                        <div class="mask-icon">
                                            <ul>
                                                <li><a href="shop-detail.php?proid=<?php echo $result['maSanPham'] ?>" data-toggle="tooltip" data-placement="right" title="Chi tiết"><i class="fas fa-eye"></i></a></li>
                                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="Thêm vào giỏ hàng"><i class="far fa-heart"></i></a></li>
                                            </ul>
                                            <a class="cart" href="shop-detail.php?proid=<?php echo $result['maSanPham'] ?>">Mua</a>
                                        </div>
                                    </div>
                                    <div class="why-text">
                                        <h4><?php echo $result['tenSanPham'] ?></h4>
                                        <h5><?php echo $result['donGia'] ?></h5>
                                    </div>
                                </div>
                            </div>
                        <?php 
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- End Cart -->



<?php
    include "inc/footer.php";
?>