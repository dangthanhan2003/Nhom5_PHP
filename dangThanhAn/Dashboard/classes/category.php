<?php
include './lib/database.php';
include './helpers/format.php';
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

    public function insert_category($catName)
    {

        $catName = $this->fm->validation($catName);
        $catName = mysqli_real_escape_string($this->db->link, $catName);

        if (empty($catName)) {
            $alert = "<span>Vui lòng nhập tên Danh mục</span>";
            return $alert;
        } else {
            $query = "INSERT INTO categories(catName) VALUES('$catName') ";
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
    public function show_category()
    {
        $query = "SELECT * FROM categories order by id desc";
        $result = $this->db->select($query);
        return $result;
    }
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
    public function getcatbyId($id)
    {
        $query = "SELECT * FROM categories WHERE id = '$id'";
        $result = $this->db->select($query);
        return $result;
    }
}
?>