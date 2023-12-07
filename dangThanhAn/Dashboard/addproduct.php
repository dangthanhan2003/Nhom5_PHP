<?php

// echo "xin chao";


require('../db/conn.php');

//lay du lieu tu form
$name = $_POST['name'];
$sumary = $_POST['sumary'];
$description = $_POST['description'];
$stock = $_POST['stock'];
$giagoc = $_POST['giagoc'];
$giaban = $_POST['giaban'];
$danhmuc = $_POST['danhmuc'];
$thuonghieu = $_POST['thuonghieu'];

//xu ly hinh anh
$countfiles = count($_FILES['anhs']['name']);

$imgs = '';
for ($i = 0; $i < $countfiles; $i++) {
    $filename = $_FILES['anhs']['name'][$i];

    ## Location
    $location = "uploads/" . uniqid() . $filename;
    //pathinfo ( string $path [, int $options = PATHINFO_DIRNAME | PATHINFO_BASENAME | PATHINFO_EXTENSION | PATHINFO_FILENAME ] ) : mixed
    $extension = pathinfo($location, PATHINFO_EXTENSION);
    $extension = strtolower($extension);

    ## File upload allowed extensions
    $valid_extensions = array("jpg", "jpeg", "png");

    $response = 0;
    ## Check file extension
    if (in_array(strtolower($extension), $valid_extensions)) {

        // them vao CSDL - them thah cong moi upload anh len
        ## Upload file
        //$_FILES['file']['tmp_name']: $_FILES['file']['tmp_name'] - The temporary filename of the file in which the uploaded file was stored on the server.
        if (move_uploaded_file($_FILES['anhs']['tmp_name'][$i], $location)) {

            $imgs .= $location . ";";
        }
    }

}
$imgs = substr($imgs, 0, -1);

// echo substr($imgs, 0, -1); exit;

//cau lenh them vao
$sql_str = "INSERT INTO `products` (`id`, `name`, `description`, `summary`, `stock`, `purchase`, `price`, `images`, `category_id`, `brand_id`, `status`) VALUES 
    (NULL, '$name',  
    '$description', '$sumary', '$stock', '$giagoc', '$giaban','$imgs', '$danhmuc', '$thuonghieu', 'Active');";

//thực thi câu lệnh
mysqli_query($conn, $sql_str);  

header("location: listsanpham.php");

?>