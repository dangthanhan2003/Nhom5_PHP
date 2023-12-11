<?php
include_once './lib/database.php';
include_once './helpers/format.php';
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

    public function insert_product($data,$files)
    {
        
        $productName = mysqli_real_escape_string($this->db->link, $data['productName']);
        $summary = mysqli_real_escape_string($this->db->link, $data['summary']);
        $description = mysqli_real_escape_string($this->db->link, $data['description']);
        $stock = mysqli_real_escape_string($this->db->link, $data['stock']);
        $purchase = mysqli_real_escape_string($this->db->link, $data['purchase']);
        $price = mysqli_real_escape_string($this->db->link, $data['price']);
        $category = mysqli_real_escape_string($this->db->link, $data['category']);
        //Kiêm tra và lấy ảnh cho vào folder uploads
        $permited = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $_FILES['images']['name'];
        $file_size = $_FILES['images']['size'];
        $file_temp = $_FILES['images']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_image = "uploads/".$unique_image;

        if ($productName=="" || $summary=="" || $description=="" || $stock=="" || $purchase=="" || $price=="" || $category=="" || $file_name=="") {
            $alert = "<span>Vui lòng không để trống</span>";
            return $alert;
        } else {
            move_uploaded_file($file_temp,$uploaded_image);
            $query = "INSERT INTO products(productName, summary, description , stock, purchase, price, category_id, images) 
            VALUES('$productName','$summary','$description','$stock','$purchase','$price','$category','$unique_image') ";
            $result = $this->db->insert($query);
            if ($result) {
                $alert = "<span>Thêm Thành công </span>";
                return $alert;
            } else {
                $alert = "<span>Thêm không thành công </span>";
                return $alert;
            }
        }
    }
    public function show_product()
    {
        $query = "SELECT * FROM products order by id desc";
        $result = $this->db->select($query);
        return $result;
    }
    /*
    public function update_category($catName, $id)
    {
        $catName = $this->fm->validation($catName);
        $catName = mysqli_real_escape_string($this->db->link, $catName);
        $id = mysqli_real_escape_string($this->db->link, $id);

        if (empty($catName)) {
            $alert = "<span>Vui lòng nhập tên Danh mục</span>";
            return $alert;
        } else {
            $query = "UPDATE categories SET catName = '$catName' WHERE id = '$id'";
            $result = $this->db->update($query);
            if ($result) {
                $alert = "<span>Sửa thành công </span>";
                return $alert;
            } else {
                $alert = "<span>Sửa không thành công </span>";
                return $alert;
            }
        }
    }
    public function delete_category($id){
        $query = "DELETE FROM categories WHERE id = '$id'";
        $result = $this->db->delete($query);
        if ($result) {
            $alert = "<span>Xóa thành công </span>";
            return $alert;
        } else {
            $alert = "<span>Xóa không thành công </span>";
            return $alert;
        }
    }
    public function getcatbyId($id)
    {
        $query = "SELECT * FROM categories WHERE id = '$id'";
        $result = $this->db->select($query);
        return $result;
    }
    */
}

?>