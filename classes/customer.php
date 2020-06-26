<?php
     $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database1.php');
    include_once ($filepath.'/../helpers/format.php');
?>
<?php
    class customer1
    {
        public $db;
        public $fm;

        public function __construct()
        {
            $this->db = new Database1();
            $this->fm = new Format();
        }

        public function insertCustomer($data)
        {

            $tenDangNhap = mysqli_real_escape_string($this->db->link, $data['tenDangNhap']);
            $matKhau = mysqli_real_escape_string($this->db->link, $data['matKhau']);
            $matKhau2 = mysqli_real_escape_string($this->db->link, $data['matKhau2']);
            $hoKhachHang = mysqli_real_escape_string($this->db->link, $data['hoKhachHang']);
            $tenKhachHang = mysqli_real_escape_string($this->db->link, $data['tenKhachHang']);
            $soDienThoai = mysqli_real_escape_string($this->db->link, $data['soDienThoai']);
            $diaChi = mysqli_real_escape_string($this->db->link, $data['diaChi']);
            $diaChiGiaoHang = mysqli_real_escape_string($this->db->link, $data['diaChiGiaoHang']);
            $gmailKhachHang = mysqli_real_escape_string($this->db->link, $data['gmailKhachHang']);
            

            if(empty($tenDangNhap || $matKhau || $hoKhachHang || $tenKhachHang || $soDienThoai || $diaChi || $diaChiGiaoHang || $gmailKhachHang  || $matKhau2))
            {
                $alert = "<br><span class='alert alert-danger'>Vui lòng điền đầy đủ thông tin</span>";
                return $alert;
            }
            elseif($matKhau != $matKhau2)
            {
                $alert = "<br><span class='alert alert-danger'>Mật khẩu không trùng nhau</span>";
                return $alert;
            }
            else
            {
                $query = "INSERT INTO khachhang(tenDangNhap,matKhau,hoKhachHang,tenKhachHang,soDienThoai,diaChi,diaChiGiaoHang,gmailKhachHang) 
                VALUES('$tenDangNhap','$matKhau','$hoKhachHang','$tenKhachHang','$soDienThoai','$diaChi','$diaChiGiaoHang','$gmailKhachHang')";
                $result = $this->db->insert($query);

                if($result)
                {
                    $alert = "<br><span class='alert alert-success'>Thêm khách hàng thành công</span>";
                    return $alert;
                }
                else
                {
                    $alert = "<br><span class='alert alert-danger'>Thêm khách hàng không thành công</span>";
                    return $alert;
                }
            }
        }

        public function showCustomer()
        {
            $query = "SELECT * FROM khachhang order by maKhachHang desc"; //sắp xếp giảm dần
            $result = $this->db->select($query);
            return $result;   
        }

        public function getCusbyID($id)
        {
            $query = "SELECT * FROM khachhang WHERE maKhachHang = '$id'";
            $result = $this->db->select($query);
            return $result;
        }

        public function updateCustomer($data,$id)
        {
            $hoKhachHang = mysqli_real_escape_string($this->db->link, $data['hoKhachHang']);
            $tenKhachHang = mysqli_real_escape_string($this->db->link, $data['tenKhachHang']);
            $soDienThoai = mysqli_real_escape_string($this->db->link, $data['soDienThoai']);
            $diaChi = mysqli_real_escape_string($this->db->link, $data['diaChi']);
            $diaChiGiaoHang = mysqli_real_escape_string($this->db->link, $data['diaChiGiaoHang']);
            $gmailKhachHang = mysqli_real_escape_string($this->db->link, $data['gmailKhachHang']);
            $id = mysqli_real_escape_string($this->db->link, $id);

            if(empty($hoKhachHang || $tenKhachHang || $gmailKhachHang || $soDienThoai || $diaChi || $diaChiGiaoHang ))
            {
                $alert = "<br><span class='alert alert-danger'>Vui lòng điền đầy đủ thông tin</span>";
                return $alert;
            }
            else
            {
                $query = "UPDATE khachhang SET 
                hoKhachHang = '$hoKhachHang',
                tenKhachHang = '$tenKhachHang',
                gmailKhachHang = '$gmailKhachHang',
                soDienThoai = '$soDienThoai',
                diaChi = '$diaChi',
                diaChiGiaoHang = '$diaChiGiaoHang'
                 WHERE maKhachHang = '$id'";
                $result = $this->db->update($query);
                if($result)
                {
                    $alert = "<br><span class='alert alert-success'>Sửa khách hàng thành công</span>";
                    return $alert;
                }
                else
                {
                    $alert = "<br><span class='alert alert-danger'>Sửa khách hàng không thành công</span>";
                    return $alert;
                }
            }
        }


        public function setTrangThai($id)
        {
            $id = mysqli_real_escape_string($this->db->link, $id);

            $query = "UPDATE khachhang SET trangThai = '0' WHERE maKhachHang = '$id'";
                $result = $this->db->update($query);
                if($result)
            {
                $alert = "<br><span class='alert alert-success'>Khóa khách hàng thành công</span>";
                return $alert;
            }
            else
            {
                $alert = "<br><span class='alert alert-danger'>Khóa khách hàng thất bại</span>";
                return $alert;
            }

        }        

        public function deleteCustomer($id)
        {
            $query = "DELETE FROM khachhang WHERE maKhachHang = '$id'";
            $result = $this->db->delete($query);
            if($result)
            {
                $alert = "<br><span class='alert alert-success'>Xóa khách hàng thành công</span>";
                return $alert;
            }
            else
            {
                $alert = "<br><span class='alert alert-danger'>Xóa khách hàng thất bại</span>";
                return $alert;
            }

        }

    }
?>


