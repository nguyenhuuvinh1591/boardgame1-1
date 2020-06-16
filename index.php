<?php
    include_once "inc/header.php";
?>
<!-- Start Categories  
<div class="categories-shop">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="shop-cat-box">
                    <img class="img-fluid" src="images/t-shirts-img.jpg" alt="" />
                    <a class="btn hvr-hover" href="#">T-shirts</a>
                </div>
                <div class="shop-cat-box">
                    <img class="img-fluid" src="images/shirt-img.jpg" alt="" />
                    <a class="btn hvr-hover" href="#">Shirt</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="shop-cat-box">
                    <img class="img-fluid" src="images/wallet-img.jpg" alt="" />
                    <a class="btn hvr-hover" href="#">Wallet</a>
                </div>
                <div class="shop-cat-box">
                    <img class="img-fluid" src="images/women-bag-img.jpg" alt="" />
                    <a class="btn hvr-hover" href="#">Bags</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="shop-cat-box">
                    <img class="img-fluid" src="images/shoes-img.jpg" alt="" />
                    <a class="btn hvr-hover" href="#">Shoes</a>
                </div>
                <div class="shop-cat-box">
                    <img class="img-fluid" src="images/women-shoes-img.jpg" alt="" />
                    <a class="btn hvr-hover" href="#">Women Shoes</a>
                </div>
            </div>
        </div>
    </div>
</div>
 End Categories -->

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
        <?php 
            $product_feathered= $product->getproduct_feathered();
            if($product_feathered){
                while($result=$product_feathered->fetch_assoc()){
        ?>
        <div class="row special-list">
            <div class="col-lg-3 col-md-6 special-grid best-seller">
                <div class="products-single fix">
                    <div class="box-img-hover">
                        <div class="type-lb">
                            <p class="sale">Sale</p>
                        </div>
                        <img src="images/<?php echo $result[`hinhAnh`]?>" class="img-fluid" alt="Image">
                        <div class="mask-icon">
                            <ul>
                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                            </ul>
                            <a class="cart" href="#">Add to Cart</a>
                        </div>
                    </div>
                    <div class="why-text">
                        <h4><?php echo $result[`tenSanPham`] ?></h4>
                        <h5> <?php echo $result[`donGia`]?></h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 special-grid top-featured">
                <div class="products-single fix">
                    <div class="box-img-hover">
                        <div class="type-lb">
                            <p class="new">New</p>
                        </div>
                        <img src="images/<?php echo $result[`hinhAnh`]?>" class="img-fluid" alt="Image">
                        <div class="mask-icon">
                            <ul>
                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                            </ul>
                            <a class="cart" href="#">Add to Cart</a>
                        </div>
                    </div>
                    <div class="why-text">
                    <h4><?php echo $result[`tenSanPham`] ?></h4>
                        <h5> <?php echo $result[`donGia`]?></h5>
                    </div>
                </div>
            </div>
            <!--------------------------------------------------------->   
            <?php 
                }
            }
            ?>     
            <!-- <div class="col-lg-3 col-md-6 special-grid top-featured">
                <div class="products-single fix">
                    <div class="box-img-hover">
                        <div class="type-lb">
                            <p class="new">New</p>
                        </div>
                        <img src="images/lopHocMN.jpg" class="img-fluid" alt="Image">
                        <div class="mask-icon">
                            <ul>
                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                            </ul>
                            <a class="cart" href="#">Add to Cart</a>
                        </div>
                    </div>
                    <div class="why-text">
                        <h4>Lớp Học Mật Ngữ-Cuộc đua sao chổi</h4>
                        <h5> $18.96</h5>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 special-grid best-seller">
                <div class="products-single fix">
                    <div class="box-img-hover">
                        <div class="type-lb">
                            <p class="sale">Sale</p>
                        </div>
                        <img src="images/uno.jpg" class="img-fluid" alt="Image">
                        <div class="mask-icon">
                            <ul>
                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                            </ul> 
                            <a class="cart" href="#">Add to Cart</a>
                        </div>
                    </div>
                    <div class="why-text">
                        <h4>Bài UNO (Mattel) (US)</h4>
                        <h5> $5.99</h5>
                    </div>
                </div>
            </div> -->
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
                $product_feathered= $product->getproduct_feathered();
                if($product_feathered){
                    for($i=4 ; $i<7 ; $i++){        
            ?>
            <div class="col-md-6 col-lg-4 col-xl-4">
                <div class="blog-box">
                    <div class="blog-img">
                        <img class="img-fluid" src="images/<?php echo $result[`hinhAnh`]?>" alt="" />
                    </div>
                    <div class="blog-content">
                        <div class="title-blog">
                            <h3><?php echo $result[`tenSanPham`] ?></h3>
                            <p><?php echo $result[`mieuTa`] ?></p>
                        </div>
                        <ul class="option-blog">
                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Likes"><i class="far fa-heart"></i></a></li>
                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Views"><i class="fas fa-eye"></i></a></li>
                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Comments"><i class="far fa-comments"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <?php 
            }
        } ?>
        </div>
    </div>
</div>
            <!-- <div class="col-md-6 col-lg-4 col-xl-4">
                <div class="blog-box">
                    <div class="blog-img">
                        <img class="img-fluid" src="images/maSoiOneWeek.jpg" alt="" />
                    </div>
                    <div class="blog-content">
                        <div class="title-blog">
                            <h3>Ma Sói One Week Ultimate Werewolf (US)</h3>
                            <p>One Week Ultimate Werewolf lấy lối chơi của One Night và nâng cấp nó lại thành một nút thắt, với sự căng thẳng ngày càng tăng khi bạn dấn thân vào những căn phòng đặc biệt của Lâu đài Ludwig. Mỗi phòng đều cung cấp một sức mạnh đặc biệt và những sức mạnh đó là chìa khóa để tìm ra Ma Sói.</p>
                        </div>
                        <ul class="option-blog">
                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Likes"><i class="far fa-heart"></i></a></li>
                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Views"><i class="fas fa-eye"></i></a></li>
                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Comments"><i class="far fa-comments"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 col-xl-4">
                <div class="blog-box">
                    <div class="blog-img">
                        <img class="img-fluid" src="images/banGa.jpg" alt="" />
                    </div>
                    <div class="blog-content">
                        <div class="title-blog">
                            <h3>Bắn Gà Là Tạch (PUBG the Board Game)</h3>
                            <p>Bắn Gà Là Tạch là board game sinh tồn đầu tiên do 100% người Việt sáng tạo.
                                    Một nhà khoa học điên chế tạo thành công một loại virus nguy hiểm chết người. Bất kỳ ai dính phải sẽ biến thành GÀ. Lúc đầu chỉ một nhóm nhỏ bị nhiễm, dần dần chúng nhân giống nhiều khiến đến hơn 80% dân số thế giới đã trở thành gà. Những con gà này mang trong mình đầy virus, và chúng sẽ phát tán ra không khí khi bị giết, vì thế nên mới gọi là BẮN GÀ LÀ TẠCH cả lũ.</p>
                        </div>
                        <ul class="option-blog">
                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Likes"><i class="far fa-heart"></i></a></li>
                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Views"><i class="fas fa-eye"></i></a></li>
                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Comments"><i class="far fa-comments"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div> -->
<!-- End Blog  -->
<?php
    include "inc/footer.php";
?>