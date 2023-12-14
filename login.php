<?php 
    require './db/conn.php';
    session_start();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $psw = trim($_POST['psw']);

            $check_email_query = $conn->prepare("SELECT * FROM users WHERE email = ?");
            $check_email_query->bind_param("s", $email);
            $check_email_query->execute();
            $result = $check_email_query->get_result();

            if($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                if(password_verify($psw, $row['password'])) {
                    $_SESSION['user_name'] = $row['name'];
                    $_SESSION['user_id'] = $row['id'];
                    header('Location: index.php');
                }else {
                    $error = "Mật khẩu không đúng";
                }
            }else {
                $error = 'Tài khoản không tồn tại';
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
            <h4>Đăng nhập</h4>
            <form action="" method="POST">
                <div class="form-control">
                    <div class="form-group">
                        <label for="email"><i class="fa-solid fa-at"></i></label>
                        <input type="email" name="email" id="email" placeholder="Email của bạn">
                    </div>
                </div>
                <div class="form-control">
                    <div class="form-group">
                        <label for="psw"><i class="fa-solid fa-lock"></i></label>
                        <input type="password" name="psw" id="psw" placeholder="Mật khẩu">
                    </div>
                    <span><?php if (isset($error)) echo $error ?></span>
                </div>
                <div class="link-forgotPsw"><a href="">Bạn quên mật khẩu ?</a></div>
                <div class="btn-submit">
                    <button name="submit">Đăng nhập</button>
                </div>
                <div class="link-form">Bạn chưa có tài khoản? <a href="./register.php">Đăng ký</a></div>
            </form>
        </div>
    </article>
</body>
</html>