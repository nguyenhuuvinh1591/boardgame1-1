<?php
  include 'inc/header.php';
?>
<?php
    include '../classes/category.php';
?>
<?php
    $cat = new category();
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $tenLoaiSanPham = $_POST['tenLoaiSanPham'];
    $insertCat = $cat->insertCategory($tenLoaiSanPham);
    }
?>
<?php
    if(isset($_GET['maLoaiSanPham']))
    {
        $id = $_GET['maLoaiSanPham'];
        $deleteCat= $cat->deleteCategory($id);
    }        
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
                     <form action="category.php" method="post"> 
                          <p style="text-transform: uppercase;font-weight: bold;">Danh mục sản phẩm</p>
                          <input type="text" name="tenLoaiSanPham" placeholder="Nhập tên danh mục..." style="width: 50%;height: 34px;padding: 6px 12px;font-size: 14px;" >
                          <input type="submit" name="submit" value="Thêm" class="btn btn-success" >
                      </form>
                      <?php
                      if(isset($insertCat))
                      {
                          echo $insertCat;
                      }
                      ?>
                      <?php
                      if(isset($deleteCat))
                      {
                        echo $deleteCat;
                      }
                      ?>  
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
                                      <?php
                                            $showcat = $cat->showCategory();
                                            if(isset($showcat))
                                            {
                                                $i = 0;
                                                while($result = $showcat->fetch_assoc())
                                                {
                                                    $i++;
                                          ?>
                                          <tr>
                                              <td><?php echo $i; ?></td>                                                 
                                              <td><?php echo $result['tenLoaiSanPham']; ?></td>  
                                              <td>
                                                 
                                                  <a href="categoryedit.php?maLoaiSanPham=<?php echo $result['maLoaiSanPham']?>"><button type="button" class="btn btn-info" >Sửa</button></a>
                                                  <a href="?maLoaiSanPham=<?php echo $result['maLoaiSanPham']?>" onclick="return confirm('Bạn có chắc muốn xóa không?')"><button type="button" class="btn btn-danger" >Xóa</button></a>
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