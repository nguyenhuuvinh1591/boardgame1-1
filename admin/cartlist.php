<?php
  include 'inc/header.php';
?>
<?php
    include_once '../classes/cart.php';
?>
<?php
$cart = new cart();
    if(isset($_GET['maDonHang']))
    {
        $id = $_GET['maDonHang'];
        $trangThai= $cart->setTrangThai($id);
    }        
?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div id="page-wrapper">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-lg-12">
                      <h1 class="page-header">Đơn hàng</h1>
                  </div>
                  <!-- /.col-lg-12 -->
              </div>
              <!-- /.row -->
              <div class="row">
                  <div class="col-lg-12">
                      <div class="panel panel-default">
                          <div class="panel-heading">
                              QUẢN LÝ ĐƠN HÀNG
                          </div>
                          <!-- /.panel-heading -->
                          <?php
                            if(isset($trangThai))
                            {
                                echo $trangThai;
                            }
                            ?>
                          <div class="panel-body">
                              <div class="table-responsive">
                                  <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                      <br>
                                      <thead>
                                          <tr>
                                              <th>Mã đơn hàng</th>
                                              <th>Mã khách hàng</th>
                                              <th>Ngày lập đơn hàng</th>
                                              <th>Tổng tiền</th>
                                              <th>Trạng thái</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                      <?php
                                            $showcart = $cart->showCart();
                                            if(isset($showcart))
                                            {
                                                while($result= $showcart->fetch_assoc())
                                                {
                                               
                                          ?>
                                          <tr class="odd gradeX">
                                              <td><?php echo $result['maDonHang'] ?></td>
                                              <td><?php echo $result['maKhachHang'] ?></td>
                                              <td><?php echo $result['ngayLapHoaDon'] ?></td>
                                              <td class="center"><?php echo $result['tongTien'] ?></td>
                                              <td>
                                                  
                                                  <?php
                                                  if($result['trangThai'] == 1)
                                                  {
                                                  ?>
                                                  <button type="button" class="btn btn-outline btn-success">Đã hoàn thành</button>
                                                  <?php
                                                  }
                                                  else
                                                  {
                                                  ?>
                                                  
                                                  <button type="button" class="btn btn-danger">Chưa giao</button>
                                                  <?php
                                                  }
                                                  ?>
                                                  
                                              </td>
                                              <td>
                                              <a ><button type="button" class="btn btn-info">Xem chi tiết</button></a>
                                                  <?php
                                                    if($result['trangThai'] == 0)
                                                    {
                                                    ?>
                                                        <a href="?maDonHang=<?php echo $result['maDonHang']?>" ><button type="button" class="btn btn-success">Thanh toán</button></a>
                                                        
                                                        <?php
                                                    }
                                                    ?>
                                              </td>
                                          </tr>
                                          <?php
                                                }
                                            }
                                          ?>
                                          
                                          
                                      </tbody>
                                  </table>
                              </div>
                              <!-- /.table-responsive -->
                              
                          </div>
                          <!-- /.panel-body -->
                      </div>
                      <!-- /.panel -->
                  </div>
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