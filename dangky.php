<?php
    include_once "inc/header.php";
?>
<?php
    include_once "./classes/customerindex.php";
?>
<style>
    .row1{
        margin-left: 15%;
    }
</style>
<?php
    $cs = new customer();
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])){ //kiểm tra người dùng phải dùng phương thức post để submit
    $insertCustomers = $cs->insertCustomers($_POST);
    }
?>
    <section class="content">
      <div class="container-fluid">
        <div class="row1">
          <!-- left column -->
          <div class="col-md-10">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Đăng ký</h3>
                <?php
                if(isset($insertCustomers))
                {
                  echo $insertCustomers;
                }
                ?>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" action="" method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Họ</label>
                    <input type="text" name="hoKhachHang" class="form-control" id="exampleInputEmail1" placeholder="Nhập họ...">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tên</label>
                    <input type="text" name="tenKhachHang" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên...">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Số điện thoại</label>
                    <input type="text" name="soDienThoai" class="form-control" id="exampleInputEmail1" placeholder="Nhập số điện thoại...">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Địa chỉ</label>
                    <input type="text" name="diaChi" class="form-control" id="exampleInputEmail1" placeholder="Nhập địa chỉ...">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Địa chỉ giao hàng</label>
                    <input type="text" name="diaChiGiaoHang" class="form-control" id="exampleInputEmail1" placeholder="Nhập địa chỉ giao hàng...">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Gmail</label>
                    <input type="email" name="gmailKhachHang" class="form-control" id="exampleInputEmail1" placeholder="Nhập gmail...">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tên đăng nhập</label>
                    <input type="text" name="tenDangNhap" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên đăng nhập...">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Mật khẩu</label>
                    <input type="password" name="matKhau" class="form-control" id="exampleInputPassword1" placeholder="Nhập mật khẩu...">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Nhập lại mật khẩu</label>
                    <input type="password" name="matKhau2" class="form-control" id="exampleInputPassword1" placeholder="Nhập lại mật khẩu...">
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-primary">Đăng ký</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <br>

<?php
    include "inc/footer.php";
?>