<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helpers/format.php');
?>
<?php
    class customer
    {
        public $db;
        public $fm;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }
        
        public function insertCustomers($data)
        {
            $hoKhachHang = mysqli_real_escape_string($this->db->link, $data['hoKhachHang']);
            $tenKhachHang = mysqli_real_escape_string($this->db->link, $data['tenKhachHang']);
            $soDienThoai = mysqli_real_escape_string($this->db->link, $data['soDienThoai']);
            $diaChi = mysqli_real_escape_string($this->db->link, $data['diaChi']);
            $diaChiGiaoHang = mysqli_real_escape_string($this->db->link, $data['diaChiGiaoHang']);
            $gmailKhachHang = mysqli_real_escape_string($this->db->link, $data['gmailKhachHang']);
            $tenDangNhap = mysqli_real_escape_string($this->db->link, $data['tenDangNhap']);
            $matKhau = mysqli_real_escape_string($this->db->link, $data['matKhau']);


            if(empty($hoKhachHang || $tenKhachHang || $soDienThoai  || $diaChi  || $diaChiGiaoHang  ||$gmailKhachHang  ||  $tenDangNhap||  $matKhau )){
                $alert = "<br><span class='alert alert-danger'>Vui lòng điền đầy đủ thông tin</span>";
                return $alert;
                }else
                {
                $checkGmail = "SELECT * FROM khachhang WHERE gmailKhachHang = '$gmailKhachHang' LIMIT 1 ";
                $resultCheck = $this->db->select($checkGmail);
                if(!$resultCheck)
                {
                    $alert = "<br><span class='alert alert-danger'>Gmail đã tồn tại</span>";
                    return $alert;
                }else
                {
                    $query1 = "INSERT INTO khachhang(tenDangNhap, matKhau, hoKhachHang, tenKhachHang, soDienThoai, diaChi,diaChiGiaoHang,gmailKhachHang)
                    VALUES('$tenDangNhap','$matKhau','$hoKhachHang','$tenKhachHang','$soDienThoai','$diaChi','$diaChiGiaoHang','$gmailKhachHang')";
                    $result = $this->db->insert($query1);
                    if($result)
                    {
                        $alert = "<br><span class='alert alert-success'>Đăng ký thành công</span>";
                        return $alert;
                    }
                    else
                    {
                        $alert = "<br><span class='alert alert-danger'>Đăng ký thất bại</span>";
                        return $alert;
                    }
                }
            }
        }


        public function loginCustomers($data)
        {
             $tenDangNhap = mysqli_real_escape_string($this->db->link, $data['tenDangNhap']);
             $matKhau = mysqli_real_escape_string($this->db->link,$data['matKhau']);

            if($tenDangNhap== ''||  $matKhau== '' ){
                $alert = "<br><span class='alert alert-danger'>Tên đăng nhập hoặc mật khẩu không được để trống</span>";
                return $alert;
            }
            else
            {
                $checklogin = "SELECT * FROM khachhang WHERE tenDangNhap = '$tenDangNhap' AND matKhau = '$matKhau' LIMIT 1 ";
                $resultCheck = $this->db->select($checklogin);
                if($resultCheck)
                {
                    $value = $resultCheck->fetch_assoc();
                    Session::set('customerlogin',true);
                    Session::set('customerid',$value['maKhachHang']);
                    Session::set('customername',$value['tenKhachHang']);
                    ?>
                    <script>window.location.href = "index.php"</script>
                    <?php
                }
                else
                {
                    $alert = "<br><span class='alert alert-danger'>Tên đăng nhập hoặc mật khẩu không đúng</span>";
                return $alert;
                }
            }
        }

    }
?> 

