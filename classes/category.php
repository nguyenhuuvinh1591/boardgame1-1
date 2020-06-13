<?php
    include '../lib/database.php';
    include '../helpers/format.php';
?>
<?php
    class category
    {
        private $db;
        private $fm;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }

        public function insertCategory($tenLoaiSanPham)
        {
            $tenLoaiSanPham = $this->fm->validation($tenLoaiSanPham);

            $tenLoaiSanPham = mysqli_real_escape_string($this->db->link, $tenLoaiSanPham);
            

            if(empty($tenLoaiSanPham))
            {
                $alert = "<br><span class='errors'>Tên danh mục không được để trống</span>";
                return $alert;
            }
            else
            {
                $query = "INSERT INTO loaisanpham(tenLoaiSanPham) VALUES('$tenLoaiSanPham')";
                $result = $this->db->insert($query);

                if($result)
                {
                    $alert = "<br><span class='success'>Thêm danh mục thành công</span>";
                    return $alert;
                }
                else
                {
                    $alert = "<br><span class='errors'>Thêm danh mục không thành công</span>";
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
