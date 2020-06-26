<?php
    include_once "inc/header.php";
    include_once "inc/slider.php";
?>
<!-- Start Products  -->
<div class="products-box">

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-all text-center">
                    <h1>Sản phẩm nổi bật</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="special-menu text-center">
                    <div class="button-group filter-button-group">
                        <button class="active" data-filter="*">All</button>
                        <button data-filter=".top-featured">Top featured</button>
                        <button data-filter=".best-seller">Best seller</button>
                    </div>
                </div>
            </div>
        </div>
        <!--------------------------------------------------------->
        <div class="row special-list">
        <?php 
            $product_feathered=$product->getproduct_feathered();
            if($product_feathered){ 
                while($result=$product_feathered->fetch_assoc()){ 
        ?>
                <div class="col-lg-3 col-md-6 special-grid best-seller">
                    <div class="products-single fix">
                        <div class="box-img-hover">
                            <div class="type-lb">
                                <p class="sale">Sale</p>
                            </div>
                            <img src="img/<?php echo $result['hinhAnh']?>" class="img-fluid" alt="Image">
                            <div class="mask-icon">
                                <ul>
                                    <li><a href="shop-detail.php?proid=<?php echo $result['maSanPham'] ?>" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                    <li><a href="cart.php" data-toggle="tooltip" data-placement="right" title="Giỏ hàng"><i class="far fa-heart"></i></a></li>
                                </ul>
                                <a class="cart" href="shop-detail.php?proid=<?php echo $result['maSanPham'] ?>">Mua</a>
                            </div>
                        </div>
                        <div class="why-text">
                            <h4><?php echo $result['tenSanPham'] ?></h4>
                            <h5> <?php echo $result['donGia']?>VNĐ</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 special-grid top-featured">
                    <div class="products-single fix">
                        <div class="box-img-hover">
                            <div class="type-lb">
                                <p class="new">New</p>
                            </div>
                            <img src="img/<?php echo $result['hinhAnh']?>" class="img-fluid" alt="Image">
                            <div class="mask-icon">
                                <ul>
                                    <li><a href="shop-detail.php?proid=<?php echo $result['maSanPham'] ?>" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                    <li><a href="cart.php" data-toggle="tooltip" data-placement="right" title="Giỏ hàng"><i class="far fa-heart"></i></a></li>
                                </ul>
                                <a class="cart" href="shop-detail.php?proid=<?php echo $result['maSanPham'] ?>">Mua</a>
                            </div>
                        </div>
                        <div class="why-text">
                        <h4><?php echo $result['tenSanPham'] ?></h4>
                            <h5> <?php echo $result['donGia']?>VNĐ</h5>
                        </div>
                    </div>
                </div>
            <!--------------------------------------------------------->   
            <?php 
                }
            }
            ?>     
        </div>
    </div>
</div>

<!-- End Products  -->

<!-- Start Blog  -->
<div class="latest-blog">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-all text-center">
                    <h1>Những Game Mới Nhất</h1>
                    <p>Hãy khám phá ngay nào</p>
                </div>
            </div>
        </div>
        <!----------------------------------------->
        <div class="row">
            <?php 
                $product_blog= $product->getproduct_blog();
                // $row = $product_feathered->fetch_assoc(); 
                // $keys = array_keys($row);
                // echo $row[$keys[0]];
                if($product_blog){
                    // for($i = 1; $i <$result=$product_feathered->fetch_assoc() ; $i++){      
                        while($result_new=$product_blog->fetch_assoc()){   
            ?>
                <div class="col-md-6 col-lg-4 col-xl-4">
                    <div class="blog-box">
                        <div class="blog-img">
                            <img class="img-fluid" src="img/<?php echo $result_new['hinhAnh']?>" alt="" />
                        </div>
                        <div class="blog-content">
                            <div class="title-blog">
                                <h3><?php echo $result_new['tenSanPham'] ?></h3>
                                <p><?php echo $result_new['mieuTa'] ?></p>
                            </div>
                            <ul class="option-blog">
                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="Likes"><i class="far fa-heart"></i></a></li>
                                <li><a href="shop-detail.php?proid=<?php echo $result_new['maSanPham']?>" data-toggle="tooltip" data-placement="right" title="Chi tiết"><i class="fas fa-eye"></i></a></li>                               
                            </ul>
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
<?php
    include "inc/footer.php";
?>