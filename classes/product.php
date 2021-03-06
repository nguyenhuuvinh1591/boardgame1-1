<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helpers/format.php');
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
            $maLoaiSanPham = mysqli_real_escape_string($this->db->link, $data['maLoaiSanPham']);
            $soLuong = mysqli_real_escape_string($this->db->link, $data['soLuong']);
            $mieuTa = mysqli_real_escape_string($this->db->link, $data['mieuTa']);
            $donGia = mysqli_real_escape_string($this->db->link, $data['donGia']);
            $sanPhamNoiBat = mysqli_real_escape_string($this->db->link, $data['sanPhamNoiBat']);
            //kiểm tra hình ảnh cho vào folder uploads
            $permited = array('jpg', 'jpeg', 'png', 'gif');
            if(isset($_FILES['image'])){
                $file_name= $_FILES['image']['name'];
            }
            if(isset($_FILES['image'])){
                $file_size= $_FILES['image']['size'];
            }
            if(isset($_FILES['image'])){
                $file_temp= $_FILES['image']['tmp_name'];
            }
            $div = explode('.',$file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $uploaded_image = "../img/".$unique_image;

            if(empty($tenSanPham || $maLoaiSanPham || $soLuong  || $mieuTa  || $donGia  ||$sanPhamNoiBat  ||  $file_name )){
                $alert = "<br><span class='alert alert-danger'>Vui lòng điền đầy đủ thông tin</span>";
                return $alert;
            }
            else
            {
                move_uploaded_file($file_temp,$uploaded_image);
                $query = "INSERT INTO sanpham(maLoaiSanPham,tenSanPham,soLuong,donGia,mieuTa,hinhAnh,trangThai,sanPhamNoiBat) 
                VALUES('$maLoaiSanPham','$tenSanPham','$soLuong','$donGia','$mieuTa','$unique_image','1','$sanPhamNoiBat')";
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
            $query = "SELECT sanpham.*,loaisanpham.tenLoaiSanPham 
            FROM sanpham
            INNER JOIN loaisanpham ON sanpham.maLoaiSanPham = loaisanpham.maLoaiSanPham   LIMIT 4
            order by sanpham.maSanPham desc"; //sắp xếp giảm dần
            $result = $this->db->select($query);
            return $result;   
        }

        public function getproduct_feathered()
        {
            $query = "SELECT * FROM sanpham WHERE sanPhamNoiBat = '1' LiMIT 4";
            $result = $this->db->select($query);
            return $result;
        }

        public function getproduct_category()
        {
            $query = "SELECT * FROM sanpham WHERE sanPhamNoiBat = '1' LiMIT 4";
            $result = $this->db->select($query);
            return $result;
        }

        public function getproduct_blog()
        {
            $query = "SELECT * FROM sanpham WHERE sanPhamNoiBat = '1' LiMIT 3";
            $result = $this->db->select($query);
            return $result;
        }

        public function getproduct_new()
        {
            $query = "SELECT * FROM sanpham ";
            $result = $this->db->select($query);
            return $result;
        }

        public function getproduct_details($id){
            $query = "SELECT sanpham.*,loaisanpham.tenLoaiSanPham 
            FROM sanpham
            INNER JOIN loaisanpham ON sanpham.maLoaiSanPham = loaisanpham.maLoaiSanPham where sanPham.maSanPham = '$id' ";
            $result = $this->db->select($query);
            return $result;   
        }

        public function getProductbyID($id)
        {
            $query = "SELECT * FROM sanpham WHERE maSanPham = '$id'";
            $result = $this->db->select($query);
            return $result;
        }

        public function updateProduct($data,$files,$id)
        {
            $tenSanPham = mysqli_real_escape_string($this->db->link, $data['tenSanPham']);
            $maLoaiSanPham = mysqli_real_escape_string($this->db->link, $data['maLoaiSanPham']);
            $soLuong = mysqli_real_escape_string($this->db->link, $data['soLuong']);
            $mieuTa = mysqli_real_escape_string($this->db->link, $data['mieuTa']);
            $donGia = mysqli_real_escape_string($this->db->link, $data['donGia']);
            $sanPhamNoiBat = mysqli_real_escape_string($this->db->link, $data['sanPhamNoiBat']);
            //kiểm tra hình ảnh cho vào folder uploads
            $permited = array('jpg', 'jpeg', 'png', 'gif');
            if(!empty($_FILES) && isset($_FILES['image'])){
                $file_name= $_FILES['image']['name'];
                  }
            if(isset($_FILES['image'])){
                $file_size= $_FILES['image']['size'];
            }
            if(isset($_FILES['image'])){
                $file_temp= $_FILES['image']['tmp_name'];
            }
            // $file_name = $_FILES['image']['name'];
            // $file_size = $_FILES['image']['size'];
            // $file_temp = $_FILES['image']['tmp_name'];

            $div = explode('.',$file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $uploaded_image = "../img/".$unique_image;

            if($tenSanPham == "" || $maLoaiSanPham == "" || $soLuong == "" || $mieuTa == "" || $donGia == "" ||$sanPhamNoiBat == ""){
                $alert = "<br><span class='alert alert-danger'>Vui lòng điền đầy đủ thông tin</span>";
                return $alert;
            }
            else
            {
                if(!empty($file_name))
                {   //nếu người dùng chọn ảnh
                    if($file_size > 4096)
                    {
                        $alert = "<br><span class='alert alert-danger'>Kích thước file phải nhỏ hơn 2MB</span>";
                        return $alert;
                    }
                    elseif(in_array($file_ext,$permited) === false)
                    {
                        $alert = "<br><span class='alert alert-danger'>Bạn chỉ có thể tải lên các file sau:-".implode(',', $permited)."</span>";
                        return $alert;
                    }

                    $query = "UPDATE sanpham SET 
                    tenSanPham = '$tenSanPham',
                    maLoaiSanPham = '$maLoaiSanPham',
                    soLuong = '$soLuong' ,
                    mieuTa = '$mieuTa',
                    donGia = '$donGia',
                    hinhAnh = '$unique_image',
                    sanPhamNoiBat= $sanPhamNoiBat
                    WHERE maLoaiSanPham = '$id'";

                }
                else
                {
                    //nếu người dùng không chọn ảnh
                    $query = "UPDATE sanpham SET 
                    tenSanPham = '$tenSanPham',
                    maLoaiSanPham = '$maLoaiSanPham',
                    soLuong = '$soLuong' ,
                    mieuTa = '$mieuTa',
                    donGia = '$donGia',
                    sanPhamNoiBat= $sanPhamNoiBat
                    WHERE maLoaiSanPham = '$id'";
                }
            
                $result = $this->db->update($query);

                if($result)
                {
                    $alert = "<br><span class='alert alert-success'>Sửa sản phẩm thành công</span>";
                    return $alert;
                }
                else
                {
                    $alert = "<br><span class='alert alert-danger'>Sửa sản phẩm không thành công</span>";
                    return $alert;
                }
            }
        }

        public function setTrangThai($id)
        {
            $id = mysqli_real_escape_string($this->db->link, $id);

            $query = "UPDATE sanpham SET trangThai = '0' WHERE maSanPham = '$id'";
                $result = $this->db->update($query);
                if($result)
            {
                $alert = "<br><span class='alert alert-success'>Ẩn sản phẩm thành công</span>";
                return $alert;
            }
            else
            {
                $alert = "<br><span class='alert alert-danger'>Ẩn sản phẩm thất bại</span>";
                return $alert;
            }

        }

        public function deleteProduct($id)
        {
            $query = "DELETE FROM sanpham WHERE maSanPham = '$id'";
            $result = $this->db->delete($query);
            if($result)
            {
                $alert = "<br><span class='alert alert-success'>Xóa sản phẩm thành công</span>";
                return $alert;
            }
            else
            {
                $alert = "<br><span class='alert alert-danger'>Xóa sản phẩm thất bại</span>";
                return $alert;
            }

        }

    }
