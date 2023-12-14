<?php
include_once './lib/database.php';
include_once './helpers/format.php';
?>

<?php
class users
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function show_user()
    {
        $query = "SELECT * FROM users";
        $result = $this->db->select($query);
        return $result;
    }
    public function delete_user($id){
        $query = "DELETE FROM users WHERE id = '$id'";
        $result = $this->db->delete($query);
        if ($result) {
            $alert = "<span>Xóa thành công </span>";
            return $alert;
        } else {
            $alert = "<span>Xóa không thành công </span>";
            return $alert;
        }
    }
    public function getuserbyId($id)
    {
        $query = "SELECT * FROM users WHERE id = '$id'";
        $result = $this->db->select($query);
        return $result;
    }
}

?>