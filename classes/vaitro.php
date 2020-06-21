<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helpers/format.php');
?>
<?php
    class vaitro
    {
        public $db;
        public $fm;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }

        public function insertvaitro($tenLoaiSanPham)
        {
            $tenLoaiSanPham = $this->fm->validation($tenLoaiSanPham);

            $tenLoaiSanPham = mysqli_real_escape_string($this->db->link, $tenLoaiSanPham);
            

            if(empty($tenLoaiSanPham))
            {
                $alert = "<br><span class='alert alert-danger'>Tên danh mục không được để trống</span>";
                return $alert;
            }
            else
            {
                $query = "INSERT INTO loaisanpham(tenLoaiSanPham) VALUES('$tenLoaiSanPham')";
                $result = $this->db->insert($query);

                if($result)
                {
                    $alert = "<br><span class='alert alert-success'>Thêm danh mục thành công</span>";
                    return $alert;
                }
                else
                {
                    $alert = "<br><span class='alert alert-danger'>Thêm danh mục không thành công</span>";
                    return $alert;
                }
            }
        }

        public function showvaitro()
        {
            $query = "SELECT * FROM vaitro order by mavaitro desc"; //sắp xếp giảm dần
            $result = $this->db->select($query);
            return $result;   
        }

        public function getCatbyID($id)
        {
            $query = "SELECT * FROM loaisanpham WHERE maLoaiSanPham = '$id'";
            $result = $this->db->select($query);
            return $result;
        }

        public function updatevaitro($tenLoaiSanPham,$id)
        {
            $tenLoaiSanPham = $this->fm->validation($tenLoaiSanPham);

            $tenLoaiSanPham = mysqli_real_escape_string($this->db->link, $tenLoaiSanPham);
            $id = mysqli_real_escape_string($this->db->link, $id);

            if(empty($tenLoaiSanPham))
            {
                $alert = "<br><span class='alert alert-danger'>Tên danh mục không được để trống</span>";
                return $alert;
            }
            else
            {
                $query = "UPDATE loaisanpham SET tenLoaiSanPham = '$tenLoaiSanPham' WHERE maLoaiSanPham = '$id'";
                $result = $this->db->update($query);

                if($result)
                {
                    $alert = "<br><span class='alert alert-success'>Sửa danh mục thành công</span>";
                    return $alert;
                }
                else
                {
                    $alert = "<br><span class='alert alert-danger'>Sửa danh mục không thành công</span>";
                    return $alert;
                }
            }
        }

        public function deletevaitro($id)
        {
            $query = "DELETE FROM loaisanpham WHERE maLoaiSanPham = '$id'";
            $result = $this->db->delete($query);
            if($result)
            {
                $alert = "<br><span class='alert alert-success'>Xóa danh mục thành công</span>";
                return $alert;
            }
            else
            {
                $alert = "<br><span class='alert alert-danger'>Xóa danh mục thất bại</span>";
                return $alert;
            }

        }

    }
?>
