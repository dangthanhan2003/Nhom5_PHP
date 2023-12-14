<?php
    include './lib/session.php';
    Session::checkLogin();
    include './lib/database.php';
    include './helpers/format.php'

?>

<?php
    class adminlogin
    {
        private $db;
        private $fm;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }

        public function login_admin($adminuser, $adminpass)
        {
            //Kiểm tra các kí tự lúc nhập có hợp lệ không 
            $adminuser = $this->fm->validation($adminuser);
            $adminpass = $this->fm->validation($adminpass);

            $adminuser = mysqli_real_escape_string($this->db->link, $adminuser);
            $adminpass = mysqli_real_escape_string($this->db->link, $adminpass);

            if(empty($adminuser) || empty($adminpass)){
                $alert = "Tên đăng nhập và mật khẩu không được để trống";
                return $alert;
            }   else{
                $query = "SELECT * from admins where adminuser = '$adminuser' AND adminpass = '$adminpass' LIMIT 1";
                $result = $this->db->select($query);

                if($result != false){

                    $value = $result->fetch_assoc();
                    Session::set('adminlogin', true);
                    Session::set('adminId',$value['adminId']);
                    Session::set('adminName',$value['adminName']);
                    header('Location:index.php');

                }   else{
                    $alert = "Sai tài khoản hoặc mật khẩu";
                    return $alert;
                }
            }
        }
    }
?>