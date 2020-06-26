<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database1.php');
    include_once ($filepath.'/../helpers/format.php');
?>
<?php
    class category1
    {
        public $db;
        public $fm;

        public function __construct()
        {
            $this->db = new Database1();
            $this->fm = new Format();
        }

        public function insertCategory($tenLoaiSanPham)
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

        public function showCategory()
        {
            $query = "SELECT * FROM loaisanpham order by maLoaiSanPham desc"; //sắp xếp giảm dần
            $result = $this->db->select($query);
            return $result;   
        }

        public function getCatbyID($id)
        {
            $query = "SELECT * FROM loaisanpham WHERE maLoaiSanPham = '$id'";
            $result = $this->db->select($query);
            return $result;
        }

        public function updateCategory($tenLoaiSanPham,$id)
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

        public function deleteCategory($id)
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

