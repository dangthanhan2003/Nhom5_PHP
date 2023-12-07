<?php   
    require('../db/conn.php');

    //lay du lieu tu form
    $name = $_POST['name'];
  
    
    // cau lenh them vao bang
    $sql_str = "INSERT INTO `categories` (`id`, `name`,  `status`) VALUES 
    ( NULL,
    '$name',  
    'Active');";

    // echo $sql_str; exit;

    //thuc thi cau lenh
    mysqli_query($conn, $sql_str);

    //tro ve trang 
    header("location: listcats.php");
?>