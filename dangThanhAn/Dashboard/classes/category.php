<?php

    include './lib/database.php';
    include './helpers/format.php'

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

            if(empty($catName)){
                $alert = "<span>Vui lòng nhập tên Danh mục</span>";
                return $alert;
            }   else{
                $query = "INSERT INTO categories(name) VALUES('$catName') ";
                $result = $this->db->insert($query);
                if($result){
                    $alert = "<span>Thêm thành công </span>";
                    return $alert;
                } else {
                    $alert = "<span>Thêm không thành công </span>";
                    return $alert;
                }
        }
    }
}
?>