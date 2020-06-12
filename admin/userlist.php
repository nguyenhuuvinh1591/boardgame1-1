<?php
  include '../inc/header.php';
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
                      <span class="textHeading">Danh sách quản trị viên</span>
                  </div>
                  
                  <div class="panel-body">   
                      <input type="text" name="userName" placeholder="Nhập quản trị viên..." style="width: 50%;height: 34px;padding: 6px 12px;font-size: 14px;" >
                      <input type="submit" name="submit" value="Tìm kiếm" class="btn btn-default" > 
                      <a href="useradd.php"><button type="button" class="btn btn-success" style="float: right;">Thêm quản trị viên</button></a>
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
                                              <th>Trạng thái</th>
                                              <th>Loại tài khoản</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                          <tr class="odd gradeX">
                                              <td>stt</td>
                                              <td>ho</td>
                                              <td>ten</td>
                                              <td>tendangnhap</td>
                                              <td>gmail</td>
                                              <td>trangthai</td>
                                              <td>loaitaikhoan</td>
                                              
                                              <td>
                                                  <a href="useredit.php?username" onclick="return popitup('useredit.php?username=')"><button type="button" class="btn btn-info">Sửa</button></a>
                                                  
                                                  <a href="?deletename=" ><button type="button" class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xóa người dùng này không?');" >Xóa</button></a>

                                                  <a href="?statusname=" ><button type="button" class="btn btn-warning">Mở / Khóa</button></a>

                                              </td>
                                          </tr>
                                          
                                          
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
      include '../inc/footer.php'
    ?>