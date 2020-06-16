<?php
    include '../lib/database.php';
    include '../helpers/format.php';
?>
<?php
    class product
    {
        private $db;
        private $fm;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }

        public function insertProduct($data,$files)
        {

            $tenSanPham = mysqli_real_escape_string($this->db->link, $data['tenSanPham']);
            $danhMucSanPham = mysqli_real_escape_string($this->db->link, $data['danhMucSanPham']);
            $soLuongSanPham = mysqli_real_escape_string($this->db->link, $data['soLuongSanPham']);
            $mieuTaSanPham = mysqli_real_escape_string($this->db->link, $data['mieuTaSanPham']);
            $giaSanPham = mysqli_real_escape_string($this->db->link, $data['giaSanPham']);
            //kiểm tra hình ảnh cho vào folder uploads
            $permited = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_temp = $_FILES['image']['tmp_name'];

            $div = explode('.',$file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $uploaded_image = "uploads/".$unique_image;

            if($)
            //xin chào các ban
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

        public function showProduct()
        {
            $query = "SELECT * FROM sanpham order by maSanPham desc"; //sắp xếp giảm dần
            $result = $this->db->select($query);
            return $result;   
        }

        public function getProductbyID($id)
        {
            $query = "SELECT * FROM loaisanpham WHERE maLoaiSanPham = '$id'";
            $result = $this->db->select($query);
            return $result;
        }

        public function updateProduct($tenLoaiSanPham,$id)
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

        public function deleteProduct($id)
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
