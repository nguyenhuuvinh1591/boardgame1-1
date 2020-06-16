<?php
    include_once '../lib/database.php';
    include_once '../helpers/format.php';
?>
<?php
    class product
    {
        public $db;
        public $fm;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }

        public function insertProduct($data,$files)
        {

            $tenSanPham = mysqli_real_escape_string($this->db->link, $data['tenSanPham']);
            $danhMucSanPham = mysqli_real_escape_string($this->db->link, $data['danhMucSanPham']);
            $soLuong = mysqli_real_escape_string($this->db->link, $data['soLuong']);
            $mieuTa = mysqli_real_escape_string($this->db->link, $data['mieuTa']);
            $donGia = mysqli_real_escape_string($this->db->link, $data['donGia']);
            $sanPhamNoiBat = mysqli_real_escape_string($this->db->link, $data['sanPhamNoiBat']);
            //kiểm tra hình ảnh cho vào folder uploads
            $permited = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_temp = $_FILES['image']['tmp_name'];

            $div = explode('.',$file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $uploaded_image = "../img/".$unique_image;

            if($tenSanPham == "" || $danhMucSanPham == "" || $soLuong == "" || $mieuTa == "" || $donGia == "" ||$sanPhamNoiBat == "" ||  $file_name == ""){
                $alert = "<br><span class='alert alert-danger'>Vui lòng điền đầy đủ thông tin</span>";
                return $alert;
            }
            else
            {
                move_uploaded_file($file_temp,$uploaded_image);
                $query = "INSERT INTO sanpham(danhMucSanPham,tenSanPham,soLuong,donGia,mieuTa,hinhAnh,trangThai,sanPhamNoiBat) 
                VALUES('$danhMucSanPham','$tenSanPham','$soLuong','$donGia','$mieuTa','$unique_image','1','$sanPhamNoiBat')";
                $result = $this->db->insert($query);

                if($result)
                {
                    $alert = "<br><span class='alert alert-success'>Thêm sản phẩm thành công</span>";
                    return $alert;
                }
                else
                {
                    $alert = "<br><span class='alert alert-danger'>Thêm sản phẩm không thành công</span>";
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

        public function getproduct_feathered()
        {
            $query = "SELECT * FROM sanpham WHERE sanPhamNoiBat = '1'";
            $result = $this->db->select($query);
            return $result;
        }

        public function getproduct_new()
        {
            $query = "SELECT * FROM sanpham order by maSanPham desc LIMIT 3";
            $result = $this->db->select($query);
            return $result;
        }

    }
        

    //     public function getProductbyID($id)
    //     {
    //         $query = "SELECT * FROM loaisanpham WHERE maLoaiSanPham = '$id'";
    //         $result = $this->db->select($query);
    //         return $result;
    //     }

    //     public function updateProduct($tenLoaiSanPham,$id)
    //     {
    //         $tenLoaiSanPham = $this->fm->validation($tenLoaiSanPham);

    //         $tenLoaiSanPham = mysqli_real_escape_string($this->db->link, $tenLoaiSanPham);
    //         $id = mysqli_real_escape_string($this->db->link, $id);

    //         if(empty($tenLoaiSanPham))
    //         {
    //             $alert = "<br><span class='alert alert-danger'>Tên danh mục không được để trống</span>";
    //             return $alert;
    //         }
    //         else
    //         {
    //             $query = "UPDATE loaisanpham SET tenLoaiSanPham = '$tenLoaiSanPham' WHERE maLoaiSanPham = '$id'";
    //             $result = $this->db->update($query);

    //             if($result)
    //             {
    //                 $alert = "<br><span class='alert alert-success'>Sửa danh mục thành công</span>";
    //                 return $alert;
    //             }
    //             else
    //             {
    //                 $alert = "<br><span class='alert alert-danger'>Sửa danh mục không thành công</span>";
    //                 return $alert;
    //             }
    //         }
    //     }

    //     public function deleteProduct($id)
    //     {
    //         $query = "DELETE FROM loaisanpham WHERE maLoaiSanPham = '$id'";
    //         $result = $this->db->delete($query);
    //         if($result)
    //         {
    //             $alert = "<br><span class='alert alert-success'>Xóa danh mục thành công</span>";
    //             return $alert;
    //         }
    //         else
    //         {
    //             $alert = "<br><span class='alert alert-danger'>Xóa danh mục thất bại</span>";
    //             return $alert;
    //         }

    //     }

    // }
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
