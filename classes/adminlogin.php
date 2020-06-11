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

        public function loginAdmin($adminUser,$adminPass)
        {
            $adminUser = $this->fm->validation($adminUser);
            $adminPass = $this->fm->validation($adminPass);    
            $adminUser = mysqli_real_escape_string($this->db->link, $adminUser);
            $adminPass = mysqli_real_escape_string($this->db->link, $adminPass);

            if(empty($adminUser) || empty($adminPass))
            {
                $alert = "Tên tài khoản và mật khẩu không được để trống";
                return $alert;
            }
            else
            {
                $query = "SELECT * FROM admin WHERE adminUser = '$adminUser' AND adminPass = '$adminPass' LIMIT 1";
                $result = $this->db->select($query);

                if($result)
                {
                    $value = $result->fetch_assoc();
                    Session::set('adminlogin',true); //phiên đăng nhập có tên là adminlogin
                    Session::set('adminId',$value['adminId']);
                    Session::set('adminUser',$value['adminUser']);
                    Session::set('adminName',$value['adminName']);
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