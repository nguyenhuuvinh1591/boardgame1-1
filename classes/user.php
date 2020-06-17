<?php
    include_once '../lib/database.php';
    include_once '../helpers/format.php';
?>
<?php
    class user
    {
        public $db;
        public $fm;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }

        public function insertuser($data)
        {

            $hoNguoiQuanTri = mysqli_real_escape_string($this->db->link, $data['hoNguoiQuanTri']);
            $tenNguoiQuanTri = mysqli_real_escape_string($this->db->link, $data['tenNguoiQuanTri']);
            $gmailNguoiQuanTri = mysqli_real_escape_string($this->db->link, $data['gmailNguoiQuanTri']);
            $tenDangNhap = mysqli_real_escape_string($this->db->link, $data['tenDangNhap']);
            $maVaiTro = mysqli_real_escape_string($this->db->link, $data['maVaiTro']);
            

            if(empty($hoNguoiQuanTri || $tenNguoiQuanTri || $gmailNguoiQuanTri || $tenDangNhap || $maVaiTro))
            {
                $alert = "<br><span class='alert alert-danger'>Vui lòng điền đầy đủ thông tin</span>";
                return $alert;
            }
            else
            {
                $query = "INSERT INTO quantri(tenDangNhap,hoNguoiQuanTri,tenNguoiQuanTri,gmailNguoiQuanTri,maVaiTro) 
                VALUES('$tenDangNhap','$hoNguoiQuanTri','$tenNguoiQuanTri','$gmailNguoiQuanTri','$maVaiTro')";
                $result = $this->db->insert($query);

                if($result)
                {
                    $alert = "<br><span class='alert alert-success'>Thêm quản trị viên thành công</span>";
                    return $alert;
                }
                else
                {
                    $alert = "<br><span class='alert alert-danger'>Thêm quản trị viên không thành công</span>";
                    return $alert;
                }
            }
        }

        public function showuser()
        {
            $query = "SELECT * FROM quantri "; //sắp xếp giảm dần
            $result = $this->db->select($query);
            return $result;   
        }

        public function getUserbyID($tenDangNhap)
        {
            $query = "SELECT * FROM quantri WHERE tenDangNhap = '$tenDangNhap'";
            $result = $this->db->select($query);
            return $result;
        }

        public function updateuser($data,$tenDangNhap)
        {
            $hoNguoiQuanTri = mysqli_real_escape_string($this->db->link, $data['hoNguoiQuanTri']);
            $tenNguoiQuanTri = mysqli_real_escape_string($this->db->link, $data['tenNguoiQuanTri']);
            $gmailNguoiQuanTri = mysqli_real_escape_string($this->db->link, $data['gmailNguoiQuanTri']);
            $maVaiTro = mysqli_real_escape_string($this->db->link, $data['maVaiTro']);
            $tenDangNhap = mysqli_real_escape_string($this->db->link, $tenDangNhap);

            if(empty($hoNguoiQuanTri || $tenNguoiQuanTri || $gmailNguoiQuanTri || $maVaiTro))
            {
                $alert = "<br><span class='alert alert-danger'>Vui lòng điền đầy đủ thông tin</span>";
                return $alert;
            }
            else
            {
                $query = "UPDATE quantri SET 
                hoNguoiQuanTri = '$hoNguoiQuanTri',
                tenNguoiQuanTri = '$tenNguoiQuanTri',
                gmailNguoiQuanTri = '$gmailNguoiQuanTri',
                maVaiTro = '$maVaiTro'
                 WHERE tenDangNhap = '$tenDangNhap'";
                $result = $this->db->update($query);
                if($result)
                {
                    $alert = "<br><span class='alert alert-success'>Sửa quản trị viên thành công</span>";
                    return $alert;
                }
                else
                {
                    $alert = "<br><span class='alert alert-danger'>Sửa quản trị viên không thành công</span>";
                    return $alert;
                }
            }
        }


        public function setTrangThai($id)
        {
            $id = mysqli_real_escape_string($this->db->link, $id);

            $query = "UPDATE quantri SET trangThai = '0' WHERE tenDangNhap = '$id'";
                $result = $this->db->update($query);
                if($result)
            {
                $alert = "<br><span class='alert alert-success'>Khóa quản trị viên thành công</span>";
                return $alert;
            }
            else
            {
                $alert = "<br><span class='alert alert-danger'>Khóa quản trị viên thất bại</span>";
                return $alert;
            }

        }        

        public function deleteuser($id)
        {
            $query = "DELETE FROM quantri WHERE tenDangNhap = '$id'";
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


<style type="text/css">
    .errors{
    font-size: 18px;
    color: red;
  }
  .success
  {
    font-size: 18px;
    color: green;
  }
</style>
