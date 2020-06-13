<?php
    include '../lib/session.php';
    Session::checkLogin();
    include '../lib/database.php';
    include '../helpers/format.php';
?>
<?php
    class adminlogin
    {
        private $db;
        private $fm;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }

        public function loginAdmin($tenDangNhap,$matKhau)
        {
            $tenDangNhap = $this->fm->validation($tenDangNhap);
            $matKhau = $this->fm->validation($matKhau);

            $tenDangNhap = mysqli_real_escape_string($this->db->link, $tenDangNhap);
            $matKhau = mysqli_real_escape_string($this->db->link, $matKhau);

            if(empty($tenDangNhap) || empty($matKhau))
            {
                $alert = "Tên tài khoản và mật khẩu không được để trống";
                return $alert;
            }
            else
            {
                $query = "SELECT * FROM quantri WHERE tenDangNhap = '$tenDangNhap' AND matKhau = '$matKhau' LIMIT 1";
                $result = $this->db->select($query);

                if($result)
                {
                    $value = $result->fetch_assoc();
                    Session::set('adminlogin',true); //phiên đăng nhập có tên là adminlogin

                    Session::set('tenDangNhap',$value['tenDangNhap']);
                    Session::set('tenNguoiQuanTri',$value['tenNguoiQuanTri']);
                    header('Location:admin.php');

                }
                else
                {
                    $alert = "Tên tài khoản hoặc mật khẩu không đúng";
                    return $alert;
                }
            }
        }
    } 
    
?>