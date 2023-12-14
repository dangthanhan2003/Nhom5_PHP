<?php 
    require './db/conn.php';
    session_start();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['submit'])) {
            $name = $_POST['user_name'];
            $email = $_POST['email'];
            $psw = trim($_POST['psw']);
            $hashedPsw = password_hash($psw, PASSWORD_DEFAULT);
            $confirmPsw = trim($_POST['confirmPsw']);
            $queryEmail = $conn->query("SELECT * FROM users WHERE email = '$email'");

            if (empty($name)){
                $errorName = 'Tên không được bỏ trống';
            }
            if (empty($email)) {
                $errorEmail = "Email không được bỏ trống.";
            } else if (!preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/", $email)) {
                $errorEmail = "Vui lòng nhập email có đuôi @";
            }else if ($queryEmail->num_rows > 0) {
                $errorEmail = "Tài khoản này đã được đăng ký";
            }


            if (empty($psw)) {
                $errorPsw = "Mật khẩu không được bỏ trống";
            } else if (strlen($psw) < 6) {
                $errorPsw = "Kí tự phải hơn 6";
            }
            if (empty($confirmPsw)) {
                $errorConfirm = "Xác nhận mật khẩu không được bỏ trống";
            }
            if (!password_verify($confirmPsw, $hashedPsw)) {
                $errorConfirm = "Mật khẩu và xác nhận mật khẩu không khớp";
            }

            if (empty($errorName) && empty($errorEmail) && empty($errorPsw) && empty($errorConfirm)) {
                $add_user = $conn->prepare("INSERT INTO users(name, email, password) VALUES(?,?,?)");
                $add_user->bind_param("sss", $name, $email, $hashedPsw);
                $add_user->execute();
                if ($add_user) {
                    header("Location: ./login.php");
                }
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/register.css">
</head>
<body>
    <article>
        <div class="form-main">
            <h4>Đăng ký</h4>
            <form action="" method="POST">
                <div class="form-control">
                    <div class="form-group">
                        <label for="user_name"><i class="fa-solid fa-user"></i></label>
                        <input type="text" name="user_name" id="user_name" placeholder="Tên người dùng">
                    </div>
                    <span><?php if (isset($errorName)) echo $errorName ?></span>
                </div>
                <div class="form-control">
                    <div class="form-group">
                        <label for="email"><i class="fa-solid fa-at"></i></label>
                        <input type="email" name="email" id="email" placeholder="Email của bạn">
                    </div>
                    <span><?php if (isset($errorEmail)) echo $errorEmail ?></span>
                </div>
                <div class="form-control">
                    <div class="form-group">
                        <label for="psw"><i class="fa-solid fa-lock"></i></label>
                        <input type="password" name="psw" id="psw" placeholder="Mật khẩu">
                    </div>
                    <span><?php if (isset($errorPsw)) echo $errorPsw ?></span>
                </div>
                <div class="form-control">
                    <div class="form-group">
                        <label for="confirmPsw"><i class="fa-solid fa-lock"></i></label>
                        <input type="password" name="confirmPsw" id="confirmPsw" placeholder="Nhập lại mật khẩu">
                    </div>
                    <span><?php if (isset($errorConfirm)) echo $errorConfirm ?></span>
                </div>
                <div class="btn-submit">
                    <button name="submit">Đăng ký</button>
                </div>
                <div class="link-form">Bạn đã có tài khoản? <a href="./login.php">Đăng nhập</a></div>
            </form>
        </div>
    </article>
</body>
</html>