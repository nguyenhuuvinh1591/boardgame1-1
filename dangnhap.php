<?php
    include_once "inc/header.php";
?>
<?php
    include_once "./classes/customerindex.php";
?>
<?php
    $logincheck = Session::get('customerlogin');
    if($logincheck)
    {
      ?>
      <script>location.window.href = "index.php"</script>
      <?php
    }
?>
<style>
    .row1{
        margin-left: 15%;
    }
</style>
<?php
    $cs = new customer();
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])){ //kiểm tra người dùng phải dùng phương thức post để submit
    $loginCustomers = $cs->loginCustomers($_POST);
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
                <h3 class="card-title">Đăng nhập</h3>
              </div>
              <?php
                if(isset($loginCustomers))
                {
                  echo $loginCustomers;
                }
              ?>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" action="" method="POST">
                <div class="card-body">
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tên đăng nhập</label>
                    <input type="text" name="tenDangNhap" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên đăng nhập...">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Mật khẩu</label>
                    <input type="password" name="matKhau" class="form-control" id="exampleInputPassword1" placeholder="Nhập mật khẩu...">
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="login">Đăng nhập</button>
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