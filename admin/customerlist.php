<?php
  include 'inc/header.php';
?>
<?php
  include_once '../classes/customer.php';
?>
<?php
$cus = new customer();
    if(isset($_GET['maKhachHang']))
    {
        $id = $_GET['maKhachHang'];
        $khoa= $cus->setTrangThai($id);
    }        
?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div id="page-wrapper">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-lg-12">
                      <h1 class="page-header">Quản lý người dùng</h1>
                  </div>
                  <!-- /.col-lg-12 -->
              </div>

              <div class="panel panel-default">
                  <div class="panel-heading">
                      <span class="textHeading">Danh sách khách hàng</span>
                  </div>
                  <?php
                        if(isset($khoa))
                        {
                            echo $khoa;
                        }
                    ?>
                  <div class="panel-body">    
                      <a href="customeradd.php"><button type="button" class="btn btn-success" style="float: right;">Thêm khách hàng</button></a>
                      <br>
                      <p></p>
                              <div class="table-responsive" style="margin-top: 2%">
                                  <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                      <thead>
                                          <tr>
                                              <th>STT</th>
                                              <th>Họ</th>
                                              <th>Tên</th>
                                              <th>Tên đăng nhập</th>
                                              <th>Gmail</th>
                                              <th>SĐT</th>
                                              <th>Địa chỉ</th>
                                              <th>Địa chỉ giao hàng</th>
                                              <th>Trạng thái</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                          <?php
                                            $cus = new customer();
                                            $showCus = $cus->showCustomer();
                                            
                                            if(isset($showCus))
                                            {
                                                $i = 0;
                                                while($result = $showCus->fetch_assoc())
                                                {
                                                    $i++;
                                                ?>
                                                <tr class="odd gradeX">
                                                    <td><?php echo $i ?></td>
                                                    <td><?php echo $result['hoKhachHang'] ?></td>
                                                    <td><?php echo $result['tenKhachHang']?></td>
                                                    <td><?php echo $result['tenDangNhap'] ?></td>
                                                    <td><?php echo $result['gmailKhachHang'] ?></td>
                                                    <td><?php echo $result['soDienThoai'] ?></td>
                                                    <td><?php echo $result['diaChi'] ?></td>
                                                    <td><?php echo $result['diaChiGiaoHang'] ?></td>
                                                    <td><?php
                                                    if($result['trangThai'] == 1)
                                                    {
                                                        echo 'Mở';   
                                                    }
                                                    else
                                                    {
                                                        echo 'Khóa';
                                                    }  ?></td>
                                              <td>
                                                  <a href="customeredit.php?maKhachHang=<?php echo $result['maKhachHang'] ?>" onclick="return"><button type="button" class="btn btn-info">Sửa</button></a>
                                                  <a href="?maKhachHang=<?php echo $result['maKhachHang'] ?>" ><button type="button" class="btn btn-warning">Khóa</button></a>

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
              </div>
              <!-- /.row -->


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
      <!-- /#page-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- jQuery -->
  <script src="js/jquery.min.js"></script>

  <!-- Bootstrap Core JavaScript -->
  <script src="js/bootstrap.min.js"></script>

  <!-- Metis Menu Plugin JavaScript -->
  <script src="js/metisMenu.min.js"></script>

  <!-- DataTables JavaScript -->
  <script src="js/dataTables/jquery.dataTables.min.js"></script>
  <script src="js/dataTables/dataTables.bootstrap.min.js"></script>

  <!-- Custom Theme JavaScript -->
  <script src="js/startmin.js"></script>
        <!-- End Page Content -->


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