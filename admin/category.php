<?php
  include 'inc/header.php';
?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div id="page-wrapper">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-lg-12">
                      <h1 class="page-header">Quản lý sản phẩm</h1>
                  </div>
                  <!-- /.col-lg-12 -->
              </div>
              <div class="panel panel-default">
                  <div class="panel-body">   
                     <form action="category.php" method="POST"> 
                          <p style="text-transform: uppercase;font-weight: bold;">Danh mục sản phẩm</p>
                          
                          <input type="text" name="tenLoai" placeholder="Nhập tên danh mục..." style="width: 50%;height: 34px;padding: 6px 12px;font-size: 14px;" >
                          <input type="submit" name="submit" value="Thêm" class="btn btn-success" > 
                      </form>
                          <!-- List danh mục-->
                              <div class="table-responsive" style="margin-top: 2%">
                                  <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                      <thead>
                                          <tr>
                                              <th>STT</th>
                                              <th>Tên danh mục</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                          <tr>
                                              <td>stt</td>                                                 
                                              <td>tendanhmuc</td>  
                                              <td>
                                                 
                                                  <a href="categoryedit.php?catid=" onclick="return popitup"><button type="button" class="btn btn-info" >Sửa</button></a>
                                                  <a href="?deleteid=" onclick="return confirm('Bạn có chắc muốn xóa không?')"><button type="button" class="btn btn-danger" >Xóa</button></a>
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