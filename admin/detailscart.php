<?php
  include 'inc/header.php';
?>
<?php
    include_once '../classes/cart.php';
?>
<?php
    include_once '../classes/detailscart.php';
?>
<?php
    $cart = new cart();
    if(!isset($_GET['maDonHang']) || $_GET['maDonHang'] == NULL)
    {
        echo "<script>window.location = 'cartlist.php'</script>"; 
    }
    else
    {
        $id = $_GET['maDonHang'];
    }
?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header" >Đơn hàng</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    CHI TIẾT ĐƠN HÀNG
                                </div>

                                
                                <!-- /.panel-heading -->
                                <div class="panel panel-default">
                        <div class="panel-body">
                            <?php
                            $getCartByID = $cart->getCartbyID($id);
                            if(isset($getCartByID))
                            {
                                while($result_detailscart = $getCartByID->fetch_assoc())
                                {
                            ?>
                            <form action="" method="POST" enctype="multipart/form-data" name="formUser" onsubmit="return validationForm()"> <!--enctype để có thể thêm hình ảnh -->
                                <table style="width: 100%;">
                                <tr>
                                    <td class="tabLabel">
                                        <label class="labelAddProduct">Mã đơn hàng:  </label>
                                    </td>
                                    <td>
                                       <h5 style="font-size: 16px;"><?php echo $result_detailscart['maDonHang'] ?></h5>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="tabLabel">
                                        <label class="labelAddProduct">Mã khách hàng: </label>
                                    </td>
                                    <td>
                                        <h5 style="font-size: 16px;"><?php echo $result_detailscart['maKhachHang'] ?></h5>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="tabLabel">
                                        <label class="labelAddProduct">Tên người nhận:</label>
                                    </td>
                                    <td>
                                        <h5 style="font-size: 16px;"><?php echo $resultDH['tenNguoiNhan'] ?></h5>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="tabLabel">
                                        <label class="labelAddProduct">Số điện thoại: </label>
                                    </td>
                                    <td>
                                       <h5 style="font-size: 16px;"><?php echo $resultDH['sdtKH'] ?></h5>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="tabLabel">
                                        <label class="labelAddProduct">Địa chỉ giao: </label>
                                    </td>
                                    <td>
                                        <h5 style="font-size: 16px;"><?php echo $resultDH['diaChiXa'] ?>, <?php echo $resultDH['diaChiHuyen'] ?>, <?php echo $resultDH['diaChiTinh'] ?></h5>
                                    </td>
                                </tr>

                                <tr>
                                <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>    
                                                    <th>STT</th>
                                                    <th>Ảnh</th>
                                                    <th>Mã sản phẩm</th>
                                                    <th>Tên sản phẩm</th>
                                                    <th>Size</th>
                                                    
                                                    <th>Số lượng SP</th>
                                                    <th>Đơn giá</th>
                                                    <th>Thành tiền</th>
                                                     <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                $infoDH2 = $donhang->show_chitietdonhang2($id);


                                                        $i = 0;
                                                        while ($resultSPDH = $infoDH2->fetch_assoc()){
                                                               $i++;

                                                            
                                                ?>
                                                <tr class="odd gradeX">
                                                    
                                                    <td><?php echo $i; ?></td>
                                                    <td><img src="uploads/<?php echo $resultSPDH['hinhAnhSP']; ?>" width="80"></td>
                                                    <td><?php echo $resultSPDH['maSanPham']; ?></td>
                                                    <td><?php echo $resultSPDH['tenSanPham']; ?></td>
                                                    <td><?php echo $resultSPDH['sizeSanPham']; ?></td>
                                                    
                                                    <td><?php echo $resultSPDH['sum(`soLuongSP`)']; ?></td>
                                                    <td><?php echo number_format($resultSPDH['giaSanPham']); ?></td>
                                                    
                                                    <?php 
                                                        $thanhtien = $resultSPDH['sum(`soLuongSP`)'] * $resultSPDH['giaSanPham'];
                                                    ?>
                                                    <td><?php echo number_format($thanhtien); ?></td>

                                                    
                                                    <?php 
                                                      
                                                    }
                                                    ?>
                                                </tr>
                                            </tbody>
                                        </table>
                                </div>
                                </tr>

                                <tr>
                                    <td class="tabLabel">
                                        <label class="labelAddProduct">Giá trị đơn hàng: </label>
                                    </td>
                                    <td>
                                        <span style="font-size: 16px;"><?php echo number_format($resultDH['tongTienDH']) ?> VND</span>
                                    </td>
                                </tr> 
                                    <td class="tabLabel">
                                        <label class="labelAddProduct"> Trạng thái đơn hàng:  </label>
                                        <span style="font-size: 16px;"><?php echo $resultDH['trangThaiDH'] ?></span>
                                    </td>
                                
                                </tr>

                                 <tr>
                                    <td class="tabLabel">
                                        <p><label class="labelAddProduct">Ghi chú: </label></p>
                                    </td>
                                    <td>
                                        <span style="font-size: 16px;"><?php echo $resultDH['ghiChuCuaKhachhang'] ?></span>
                                    </td>
                                </tr>

                                
                                 </table>
                                 
                            </form>  
                            
                         </div> 




                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                        <?php
                                }
                            }
                        ?>
                        <!-- /.col-lg-12 -->
                    </div>
                   
                        <!-- /.col-lg-6 -->
                        
                                    <!-- /.table-responsive -->
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

<!-- Footer -->
<!-- <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
             <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer> -->
      <!-- End of Footer -->

      <?php
      include 'inc/footer.php'
    ?>