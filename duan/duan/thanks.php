<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cảm ơn bạn!</title>
    <link rel="stylesheet" href="../../assets/css/reset.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh; /* Đảm bảo nền chiếm toàn bộ chiều cao trang */
        }

        .thank-you-container {
            text-align: center;
            padding: 40px;
            border-radius: 8px;
            background-color: transparent;
            backdrop-filter: blur(25px);
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
        }

        .thank-you-heading {
            color: #059669;
            font-size: 2.1em;
            margin-bottom: 10px;
        }

        .thank-you-message {
            color: var(--green-color);
            font-size: 1.3em;
            margin-bottom: 20px;
        }

        .home-button {
            display: inline-block;
            padding: 12px 24px;
            background-color: #059669;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .home-button:hover {
            background-color: #2980b9;
        }

        .thank-you-icon {
            font-size: 4em;
            color: #3498db;
            margin-bottom: 20px;
        }

    </style>
</head>
<body>
    <div class="thank-you-container">
        <div class="thank-you-icon">&#x1F603;</div>
        <h1 class="thank-you-heading">Cảm ơn bạn đã đặt hàng!</h1>
        <p class="thank-you-message">Chúng tôi đã nhận được đơn đặt hàng của bạn và xác nhận nó. Đơn hàng sẽ sớm đến tay bạn.</p>
        <a href="./order.php" class="home-button">Kiểm tra đơn hàng</a>
    </div>

</body>
</html>