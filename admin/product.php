<?php
  include 'inc/header.php';
?>
<?php
    include '../classes/productadmin.php';
?>
<?php
    include '../classes/categoryadmin.php';
?>
<?php
    include_once '../helpers/format.php';
?>
<?php
    $pd = new product1();
    $fm = new Format();
?>
<?php
    if(isset($_GET['maSanPham']))
    {
        $id = $_GET['maSanPham'];
        $an= $pd->setTrangThai($id);
    }        
?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div id="page-wrapper">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-lg-12">
                      <h1 class="page-header">Sản phẩm</h1>
                  </div>
                  <!-- /.col-lg-12 -->
              </div>
              <div class="panel panel-default">
                  <div class="panel-heading">
                      <span class="textHeading">DANH SÁCH SẢN PHẨM</span>
                  </div>

                  <div class="panel-body">   
                      <a href="productadd.php"><button type="button" class="btn btn-success" style="float: right; height: 34px ">Thêm sản phẩm</button></a>
                      <br>
                      <?php
                        if(isset($an))
                        {
                            echo $an;
                        }
                      ?>
                              <div class="table-responsive" style="margin-top: 2%">
                                  <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                      <thead>
                                          <tr>
                                              <th>Mã sản phẩm</th>
                                              <th>Tên danh mục</th>
                                              <th>Tên sản phẩm</th>
                                              <th>Số lượng</th>
                                              <th>Giá</th>
                                              <th>Miêu tả sản phẩm</th>
                                              <th>Ảnh sản phẩm</th>
                                              <th>Trạng thái</th>
                                              <th>Sản phẩm nổi bật</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                      <?php
                                            $showproduct = $pd->showProduct();
                                            if(isset($showproduct))
                                            {
                                                while($result = $showproduct->fetch_assoc())
                                                {
                                          ?>
                                          <tr class="odd gradeX">
                                              <td><?php echo $result['maSanPham'] ?></td>
                                              <td><?php echo $result['tenLoaiSanPham'] ?></td>
                                              <td><?php echo $result['tenSanPham'] ?></td>
                                              <td><?php echo $result['soLuong'] ?></td>
                                              <td><?php echo $result['donGia'] ?></td>
                                              <td><?php echo $fm->textShorten($result['mieuTa'],50)?></td>
                                              <td><img src="../img/<?php echo $result['hinhAnh']?>" width='80'> </td>
                                              <td><?php
                                              if($result['trangThai'] == 1){
                                                echo 'Hiện';
                                              }
                                              else
                                              {
                                                  echo 'Ẩn';
                                              }
                                                ?></td>

                                              <td><?php 
                                              if($result['sanPhamNoiBat'] == 1){
                                                  echo 'Nổi bật';
                                              }
                                              else
                                              {
                                                  echo 'Không nổi bật';
                                              }
                                                  ?></td>
                                              <td>
                                                  <a href="productedit.php?maSanPham=<?php echo $result['maSanPham'] ?>" ><button type="button" class="btn btn-info">Sửa</button></a>
                                                  <a href="?maSanPham=<?php echo $result['maSanPham'] ?>" onclick="return confirm('Bạn có chắc muốn ẩn sản phẩm này không?')"><button type="button" class="btn btn-warning " >Ẩn</button></a>
                                              </td>
                                          </tr>
                                          <?php
                                                }
                                            }
                                          ?>
                                          
                                      </tbody>
                                      
                                  </table>
                                  <div class="phanTrang">
                                          
                                      </div>
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

  <style type="text/css">
      .phanTrang a{
          text-decoration: none;
          cursor: pointer;
          color: black;
          float: left;
          padding: 5px 15px;
          border: 1px solid #999499;
          margin: 0px 2px 5px;
      }

      .phanTrang a:hover{
          background-color: grey;
          transition: 500ms;
      }
  </style>
  <!-- Page-Level Demo Scripts - Tables - Use for reference -->
  <script>
      $(document).ready(function() {
          $('#dataTables-example').DataTable({
                  responsive: true
          });
      });
  </script>
  <script language="javascript" type="text/javascript"> 

      function popitup(url) { //Popup cửa sổ
          newwindow=window.open(url,'name','height=580,width=700');
          if (window.focus) {
              newwindow.focus()
              }
          return false;
      }

  </script>
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