<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database1.php');
    include_once ($filepath.'/../helpers/format.php');
?>
<?php
    class cart1
    {
        public $db;
        public $fm;

        public function __construct()
        {
            $this->db = new Database1();
            $this->fm = new Format();
        }
        
        public function add_to_cart($quantity,$id){
            $quantity = $this->fm->validation($quantity);
            $quantity = mysqli_real_escape_string($this->db->link, $quantity);
            $id = mysqli_real_escape_string($this->db->link, $id);
            $sID = session_id();

            $query = "SELECT * FROM sanpham WHERE maSanPham = '$id'";
            $result =$this->db->select($query)->fetch_assoc();
            $ten = $result['tenSanPham'];
            $dongia = $result['donGia'];
            $hinhanh = $result['hinhAnh'];
            $query1 = "INSERT INTO giohang(maSanPham, sessionId, soLuongSanPham, tenSanPham, donGia, hinhAnh)
                VALUES('$id','$sID','$quantity','$ten','$dongia','$hinhanh')";
                $insert_cat = $this->db->insert($query1);
                if($insert_cat){
                    ?>
                    <script>
                        window.location.href = "cart.php";
                    </script>
                    <?php
                }
                else{
                    header('Location:404.php');

                }
        }

        public function get_product_cart(){
            $sID = session_id();
            $query = "SELECT * FROM giohang WHERE sessionId = '$sID'";
            $result = $this->db->select($query);
            return $result;
        }

        public function showCart()
        {
            $query = "SELECT *
            FROM donhang
            order by maDonHang desc"; //sắp xếp giảm dần
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

        public function getCartbyID($id)
        {
            $query = "SELECT * FROM donhang WHERE maDonHang = '$id'";
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

            $query = "UPDATE donhang SET trangThai = '1' WHERE maDonHang = '$id'";
                $result = $this->db->update($query);
                if($result)
            {
                $alert = "<br><span class='alert alert-success'>Thanh toán đơn hàng thành công</span>";
                return $alert;
            }
            else
            {
                $alert = "<br><span class='alert alert-danger'>Thanh toán đơn hàng thất bại</span>";
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
?> 

