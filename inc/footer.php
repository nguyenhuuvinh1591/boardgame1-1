<!-- Start Instagram Feed  -->
<div class="instagram-box">
    <div class="main-instagram owl-carousel owl-theme">
    <?php 
        $product_new = $product->getproduct_new();
        if($product_new){
            while($result=$product_new->fetch_assoc()){
    ?>
        <div class="item">
            <div class="ins-inner-box">
                <img src="img/<?php echo $result['hinhAnh']?>" alt="" />
                <div class="hov-in">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    <?php 
            }
        }
    ?>
    </div>
</div>
<!-- End Instagram Feed  -->

<a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>
<!-- Start Footer  -->
<footer>
    <div class="footer-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="footer-widget">
                        <h4>Giới Thiệu</h4>
                        <p>Board Game Station là mô hình cà phê board game đông vui nhất tại TP.HCM. Phục vụ mọi người từ học sinh, sinh viên đến những người đã đi làm, miễn là có đam mê hoặc muốn khám phá về board game. Giá vé game cho 1 người là 59k VNĐ (bao gồm một phần nước), là bạn có thể thoải mái lựa chọn hết tất cả các game tại cửa hàng để cùng giải trí với bạn bè, gia đình!
                            </p>
                        <ul>
                            <li><a href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fab fa-google-plus" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fab fa-pinterest-p" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fab fa-whatsapp" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="footer-link">
                        <h4>THÔNG TIN</h4>
                        <ul>
                            <li><a href="#">Về Chúng tôi</a></li>
                            <li><a href="#">Dịch vụ khách hàng </a></li>
                            <li><a href="#">Điều khoản và điều kiện</a></li>
                            <li><a href="#">Thông tin giao hàng</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="footer-link-contact">
                        <h4>Liên hệ với chúng tôi</h4>
                        <ul>
                            <li>
                                <p><i class="fas fa-map-marker-alt"></i>Địa chỉ: 273 An Dương Vương, Quận 5 <br>TP Hồ Chí Minh</p>
                            </li>
                            <li>
                                <p><i class="fas fa-phone-square"></i>Phone: <a href="tel:+1-888705770">+84 974086701</a></p>
                            </li>
                            <li>
                                <p><i class="fas fa-envelope"></i>Email: <a href="mailto:contactinfo@gmail.com">VLT2000@gmail.com</a></p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- End Footer  -->


<a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

<!-- ALL JS FILES -->
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- ALL PLUGINS -->
<script src="js/jquery.superslides.min.js"></script>
<script src="js/bootstrap-select.js"></script>
<script src="js/inewsticker.js"></script>
<script src="js/bootsnav.js."></script>
<script src="js/images-loded.min.js"></script>
<script src="js/isotope.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/baguetteBox.min.js"></script>
<script src="js/form-validator.min.js"></script>
<script src="js/contact-form-script.js"></script>
<script src="js/custom.js"></script>


