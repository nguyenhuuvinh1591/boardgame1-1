<?php
  include 'inc/header.php';
?>
<?php
    include '../classes/categoryadmin.php';
?>
<?php
include_once '../classes/productadmin.php';
?>
<?php
    $pd = new product1();
    if(!isset($_GET['maSanPham']) || $_GET['maSanPham'] == NULL)
    {
        echo "<script>window.location = 'product.php'</script>"; //categorylist.php
    }
    else
    {
        $id = $_GET['maSanPham'];
    }
?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])){ 
    $updateProduct = $pd->updateProduct($_POST,$_FILES,$id);
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
            <div class="panel-heading">
                <span class="textHeading">Sửa sản phẩm</span>
            </div>
            <div class="panel-body">
            <?php
                $getProductByID = $pd->getProductbyID($id);
                if(isset($getProductByID))
                {
                    while($resultProduct = $getProductByID->fetch_assoc())
                    {
                ?>
                <form action="" method="POST" enctype="multipart/form-data" name="formproduct"> <!--enctype để có thể thêm hình ảnh -->
                    <table style="width: 100%;">

                    <tr>
                        <td class="tabLabel">
                            <label class="labelAddProduct">Tên sản phẩm:  </label>
                        </td>
                        <td>
                            <input type="text" name="tenSanPham" value="<?php echo $resultProduct['tenSanPham']?>" class="inputAddProduct">
                        </td>
                    </tr>
                    
                    <tr>
                      <td class="tabLabel">
                          <label class="labelAddProduct">Danh mục sản phẩm: </label>
                      </td>
                      <td>
                          <select class="inputAddProduct" name="maLoaiSanPham" required> 
                              <?php
                                $cat = new category1();
                                $catlist = $cat->showCategory();
                                if($catlist)
                                {
                                    while($result = $catlist->fetch_assoc())
                                    {
                              ?>          
                                    <option
                                    <?php
                                        if($result['maLoaiSanPham'] == $resultProduct['maLoaiSanPham']){ 
                                            echo 'selected';
                                        }
                                    ?>
                                    name="maLoaiSanPham" value="<?php echo $resultProduct['maLoaiSanPham']?>"><?php echo $result['tenLoaiSanPham'] ?></option>
                                    <?php
                                    }
                                }
                              ?>
                          </select> 
                      </td>                   
                  </tr>

                  <tr>
                        <td class="tabLabel">
                            <label class="labelAddProduct">Số lượng: </label>
                        </td>
                        <td>
                            <input type="text" name="soLuong" value="<?php echo $resultProduct['soLuong'] ?>" class="inputAddProduct" required autofocus>
                        </td>
                    </tr>

                    <tr>
                        <td class="tabLabel">
                            <label class="labelAddProduct">Miêu tả sản phẩm: </label>
                        </td>
                        <td>
                          <textarea name="mieuTa" rows="2" cols="25" class="inputAddProduct" style="height: 80px;" required><?php echo $resultProduct['mieuTa']?></textarea>
                        </td>
                    </tr>

                    <tr>
                        <td class="tabLabel">
                            <label class="labelAddProduct">Giá sản phẩm: </label>
                        </td>
                        <td>
                            <input type="text" name="donGia" value="<?php echo $resultProduct['donGia']?>" class="inputAddProduct" required>
                        </td>
                    </tr>

                    <tr>
                      <td class="tabLabel">
                          <label class="labelAddProduct">Sản phẩm nổi bật: </label>
                      </td>
                      <td>
                          <select  class="inputAddProduct" name="sanPhamNoiBat" required> 
                              <?php
                                if($resultProduct['sanPhamNoiBat'] == 1)
                                {
                              ?>
                                    <option selected  value="1">Nổi bật</option>
                                    <option  value="0">Không nổi bật</option>
                                <?php
                                }else{
                                    ?>
                                    
                                    <option  value="1">Nổi bật</option>
                                    <option selected  value="0">Không nổi bật</option>
                                    <?php
                                }
                                    ?>
                          </select> 
                      </td>                   
                  </tr>

                    <tr>
                      <td class="tabLabel">
                          <label class="labelAddProduct">Hình ảnh sản phẩm: </label>
                      </td>
                      <td>
                          <input name="hinhAnh" type="file" accept="image/*" onchange="loadFile(event)" required>
                          <img src="../img/<?php echo $resultProduct['hinhAnh'] ?>" width="80" >
                      </td>
                  </tr>

                     </table>
                     <input type="submit" name="submit" value="Sửa" class="btn btn-success" style="margin: 10px;">
                </form>
                <?php
                if(isset($updateProduct)){
                    echo $updateProduct;
                }
                ?>
                <?php
                }
            }
                ?>  
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
<link rel="stylesheet" type="text/css" href="css/style.css">
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

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
$(document).ready(function() {
    $('#dataTables-example').DataTable({
            responsive: true
    });
});
</script>
<script type="text/javascript">
function validationForm(){
    var maVaiTro=document.formUser.maVaiTro.value; 
    var matKhau=document.formUser.matKhau.value;  
    var matKhau2=document.formUser.matKhau2.value;

    if (matKhau == matKhau2){
        if (maVaiTro == '0'){
            alert("Chưa chọn loại tài khoản!");
            return false;
        }else{
            return true;
        }
        
    }else{
        alert("Mật khẩu không giống nhau! Mời nhập lại!");
        return false;
    }
}

</script>
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