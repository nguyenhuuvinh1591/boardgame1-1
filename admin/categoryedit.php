<?php
  include 'inc/header.php';
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
                        <span class="textHeading">Sửa danh mục sản phẩm</span>
                    </div>
                    <div class="panel-body">
                        <form action="" method="POST" enctype="multipart/form-data" name="formUser" onsubmit="return validationForm()"> <!--enctype để có thể thêm hình ảnh -->
                            <table style="width: 100%;">
                            <tr>
                                <td class="tabLabel">
                                    <label class="labelAddProduct">Danh mục sản phẩm:  </label>
                                </td>
                                <td>
                                    <input type="text" name="tenNguoiQuanTri" value="" class="inputAddProduct" autofocus>
                                </td>
                            </tr>

                            
                            
                             </table>
                             <input type="submit" name="submit" value="Sửa" class="btn btn-success" style="margin: 10px;">
                        </form>  
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
    
    <script>
        var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
              URL.revokeObjectURL(output.src) // free memory
                }
        };
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