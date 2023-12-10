<?php
    include "./classes/adminlogin.php";
?>
<?php

    $class = new adminlogin();
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $adminuser = $_POST['adminuser'];
        $adminpass = md5($_POST['adminpass']);

        $login_check = $class->login_admin($adminuser, $adminpass);
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Đăng nhập</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body>

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Đăng Nhập</h1>
                                    </div>
                                    <span><?php
                                        if(isset($login_check)){
                                            echo $login_check;
                                        }
                                    ?></span>
                                    <form class="user" action="login.php" method="post">
                                        <div class="form-group">
                                            <input type="name" class="form-control form-control-user"
                                                name="adminuser"  
                                                placeholder="Tên đăng nhập">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                placeholder="Mật khẩu" name="adminpass" >
                                        </div>
                                        <input type="submit" class="btn btn-primary btn-user btn-block" value="Đăng nhập">
                                            
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="register.php">Tạo tài khoản</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
    require("includes/script.php");
?>
</body>

</html>