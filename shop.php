<?php
    include "inc/header.php";
?>
    <!-- Start Shop Page  -->
    <div class="shop-box-inner">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-sm-12 col-xs-12 sidebar-shop-left">
                    <div class="product-categori">
                        <div class="search-product">
                            <form action="#">
                                <input class="form-control" placeholder="Search here..." type="text">
                                <button type="submit"> <i class="fa fa-search"></i> </button>
                            </form>
                        </div>
                        <div class="filter-sidebar-left">
                            <div class="title-left">
                                <h3>Thể loại</h3>
                            </div>
                            <div class="list-group list-group-collapse list-group-sm list-group-tree" id="list-group-men" data-children=".sub-men">
                                <div class="list-group-collapse sub-men">
                                    <a class="list-group-item list-group-item-action" href="#sub-men1" data-toggle="collapse" aria-expanded="false" aria-controls="sub-men2">BoardGame gia đình</a>
                                    <div class="collapse" id="sub-men1" data-parent="#list-group-men">
                                        <div class="list-group">
                                            <a href="#" class="list-group-item list-group-item-action active">Cờ Tỷ Phú Monopoly Classic Game</a>
                                            <a href="#" class="list-group-item list-group-item-action">Lớp Học Mật Ngữ - Cuộc đua sao chổi (Mới 2020)</a>
                                            <a href="#" class="list-group-item list-group-item-action">Splendor Việt</a>
                                            <a href="#" class="list-group-item list-group-item-action">Uno Flip (US) </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-collapse sub-men">
                                    <a class="list-group-item list-group-item-action" href="#sub-men2" data-toggle="collapse" aria-expanded="false" aria-controls="sub-men2">BoardGame mới</a>
                                    <div class="collapse" id="sub-men2" data-parent="#list-group-men">
                                    <div class="list-group">
                                            <a href="#" class="list-group-item list-group-item-action active">Bắn Gà Là Tạch (PUBG the Board Game)</a>
                                            <a href="#" class="list-group-item list-group-item-action">Tam Quốc Sát - Quốc Chiến - Yokagames</a>
                                            <a href="#" class="list-group-item list-group-item-action">Ma Sói One Week Ultimate Werewolf (US)</a>
                                            <a href="#" class="list-group-item list-group-item-action">Ma Sói Ultimate Werewolf - Deluxe Edition (US)</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-collapse sub-men">
                                    <a class="list-group-item list-group-item-action" href="#sub-men3" data-toggle="collapse" aria-expanded="false" aria-controls="sub-men2">BoarGame trẻ em</a>
                                    <div class="collapse" id="sub-men3" data-parent="#list-group-men">
                                    <div class="list-group">
                                            <a href="#" class="list-group-item list-group-item-action active">Đường Đua Tài Chính</a>
                                            <a href="#" class="list-group-item list-group-item-action">Bài UNO (Mattel) (US)</a>
                                            <a href="#" class="list-group-item list-group-item-action">Cờ Caro Tổ Ong Beehive XO</a>
                                            <a href="#" class="list-group-item list-group-item-action">Lớp Học Mật Ngữ - Siêu Thú Ngân Hà</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-collapse sub-men">
                                    <a class="list-group-item list-group-item-action" href="#sub-men4" data-toggle="collapse" aria-expanded="false" aria-controls="sub-men2">Phụ kiện BoardGame</a>
                                    <div class="collapse" id="sub-men4" data-parent="#list-group-men">
                                    <div class="list-group">
                                            <a href="#" class="list-group-item list-group-item-action active">Sleeves Bài Tỷ Phú - Stone Age - Catan 5.9x9.2cm</a>
                                            <a href="#" class="list-group-item list-group-item-action">Xúc Xắc Xốp 6 Mặt Cỡ To</a>
                                            <a href="#" class="list-group-item list-group-item-action">Túi Rút 7 x 9 cm</a>
                                            <a href="#" class="list-group-item list-group-item-action">Tiểu Thuyết Bí Ẩn Làng Ma Sói - Lâu Đài Bá Tước Jean</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="filter-price-left">
                            <div class="title-left">
                                <h3>Giá bán</h3>
                            </div>
                            <div class="price-box-slider">
                                <div id="slider-range"></div>
                                <p>
                                    <input type="text" id="amount" readonly style="border:0; color:#fbb714; font-weight:bold;">
                                    <button class="btn hvr-hover" type="submit">Filter</button>
                                </p>
                            </div>
                        </div>               
                    </div>
                </div>
                <div class="col-xl-9 col-lg-9 col-sm-12 col-xs-12 shop-content-right">
                    <div class="right-product-box">
                        <div class="product-item-filter row">
                            <div class="col-12 col-sm-8 text-center text-sm-left">
                                <div class="toolbar-sorter-right">
                                    <span>Sort by </span>
                                    <select id="basic" class="selectpicker show-tick form-control" data-placeholder="$ USD">
									<option data-display="Select">Nothing</option>
									<option value="1">Popularity</option>
									<option value="2">High Price → High Price</option>
									<option value="3">Low Price → High Price</option>
									<option value="4">Best Selling</option>
								</select>
                                </div>
                                <p>Showing all 4 results</p>
                            </div>
                            <div class="col-12 col-sm-4 text-center text-sm-right">
                                <ul class="nav nav-tabs ml-auto">
                                    <li>
                                        <a class="nav-link active" href="#grid-view" data-toggle="tab"> <i class="fa fa-th"></i> </a>
                                    </li>
                                    <li>
                                        <a class="nav-link" href="#list-view" data-toggle="tab"> <i class="fa fa-list-ul"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    <!----------------san pham--------------------------------->   
                        <!-------------------------------LINE 1 ---------------> 
                        <div class="row product-categorie-box">
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade show active" id="grid-view">
                                    <?php for($i=0;$i<3;$i++){ ?>
                                    <div class="row">
                                        <?php 
                                            $product_new = $product->getproduct_new();
                                            if($product_new){
                                                while($result = $product_new->fetch_assoc()){
                                        ?>
                                            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                                <div class="products-single fix">
                                                    <div class="box-img-hover">
                                                        <div class="type-lb">
                                                            <p class="sale">Sale</p>
                                                        </div>
                                                        <img src="images/img-pro-01.jpg" class="img-fluid" alt="Image">
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
                                                        <h4>Lorem ipsum dolor sit amet</h4>
                                                        <h5> $9.79</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php 
                                                }
                                            }
                                        ?>
                                    <!-------------------------------end - LINE 1 --------------> 
        
                             
                                    </div>
                                        <?php } ?>
                                </div>
                            </div>
                        </div>
            <!-- End Shop Page -->


<?php
    include "inc/footer.php";
?>