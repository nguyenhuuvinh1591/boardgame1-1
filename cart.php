<?php
    include "inc/header.php";
?>
<?php 
    if(isset($_GET['cartid']))
    {
        $cart_id = $_GET['cartid'];
        $delcart = $ct->del_product_cart($cart_id); 
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])){
        $card_id = $_POST['cart_id'];
        $quantity = $_POST['quantity'];
        $update_quantity = $ct->update_quantity_cart($quantity, $card_id);
    }
?>

    <!-- Start Cart  -->
    <div class="cart-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-main table-responsive">
                        <h3>Giỏ Hàng Của Bạn:</h3>
                        <?php 
                            if(isset($update_quantity)){
                                echo $update_quantity;
                            }                            
                        ?>
                        <?php 
                            if(isset($delcart)){
                                echo $delcart;
                            }
                        ?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Hình Ảnh</th>
                                    <th>Tên Sản Phẩm</th>
                                    <th>Đơn Giá (VNĐ)</th>
                                    <th width="10%">Số Lượng</th>
                                    <th style="padding-left: 10%;" width="20%">Tổng</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $product_cart = $ct->get_product_cart();
                                    if($product_cart){
                                        $subTotal = 0;     
                                        while($result = $product_cart->fetch_assoc()){ 
                                            @$subTotal+=$total;                             
                                ?>
                                    <tr>
                                        <td class="thumbnail-img">
                                            <a href="shop-detail.php?proid=<?php echo $result['maSanPham']?>">
                                                <img class="img-fluid" src="img/<?php echo $result['hinhAnh'] ?>" alt="" />
                                            </a>
                                        </td>
                                        <td class="name-pr">
                                            <a href="shop-detail.php?proid=<?php echo $result['maSanPham']?>">
                                                <?php echo $result['tenSanPham'] ?>
                                            </a>
                                        </td>
                                        <td class="price-pr">
                                            <p><?php echo $result['donGia'] ?></p>
                                        </td>
                                        <td class="quantity-box">
                                            <form action="" method="post" >                                               
                                                <input type="number" value="<?php echo $result['soLuongSanPham'] ?>" name="quantity" min="0" class="c-input-text qty text">
                                                <input value="Update" type="submit" name="submit" class="update-box">
                                                <input type="hidden" value="<?php echo $result['maGioHang'] ?>" name="cart_id" class="c-input-text qty text"></td>
                                            </form>    
                                        </td>
                                        <td class="total-pr">
                                            <?php $total=$result['donGia']*$result['soLuongSanPham'] ?>
                                            <p style="padding-left: 50%; color: black;" ><?php echo $total ?></p>
                                        </td>
                                        <td class="remove-pr">
                                            <a href="?cartid=<?php echo $result['maGioHang'] ?>">
                                                <i class="fas fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php 
                                        }
                                    }
                                ?>           
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row my-5">
                <div class="col-lg-6 col-sm-6">
                    <div class="coupon-box">
                        <div class="input-group input-group-sm">
                            <input class="form-control" placeholder="Enter your coupon code" aria-label="Coupon code" type="text">
                            <div class="input-group-append">
                                <button class="btn btn-theme" type="button">Apply Coupon</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row my-5">
                <div class="col-lg-8 col-sm-12"></div>
                <div class="col-lg-4 col-sm-12">
                    <div class="order-box">
                        <h3>Order summary</h3>
                        <div class="d-flex">
                            <h4>Tạm tính</h4>

                            <div class="ml-auto font-weight-bold"> <?php echo $subTotal ?> VNĐ</div>
                        </div>
                        <hr class="my-1">
                        <div class="d-flex">
                            <h4>Phiếu giảm giá</h4>
                            <div class="ml-auto font-weight-bold"> 0 VNĐ </div>
                        </div>
                        <div class="d-flex">
                            <?php $vat=$subTotal*0.1; ?>
                            <h4>VAT</h4>
                            <div class="ml-auto font-weight-bold">10%</div>
                        </div>
                        <div class="d-flex">
                            <h4>Phí vận chuyển</h4>
                            <div class="ml-auto font-weight-bold"> Free </div>
                        </div>
                        <hr>
                        <div class="d-flex gr-total">
                        <?php $SUM=$subTotal+$vat;?>
                            <h5>Tổng cộng</h5>
                            <div class="ml-auto h5"><?php echo $SUM ?> VNĐ</div>
                        </div>
                        <hr> </div>
                </div>
                <div class="col-12 d-flex shopping-box"><a href="checkout.php" class="ml-auto btn hvr-hover">Checkout</a> </div>
            </div>

        </div>
    </div>
    <!-- End Cart -->

<?php
    include "inc/footer.php";
?>