<?php
require './db/conn.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submit'])) {
        if (isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id'];
        }

        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];

        $totalPrice = 0;

        foreach ($_SESSION['cart'] as $cart_item) {
            $price = $cart_item['price'];
            $quantity = $cart_item['quantity'];
            $total = $price * $quantity;
            $totalPrice += $total;
        }

        if ($cart_item['price'] > 0) {
            $sql = "INSERT INTO orders (user_id, created_at, total_amount, status, name, address, phone, email)
                    VALUES ($user_id, NOW(), $totalPrice, 'Processing','$name','$address',$phone,'$email')";
            if ($conn->query($sql)) {
                $last_id = $conn->insert_id;
                foreach ($_SESSION['cart'] as $cart_item_2) {
                    $productId = $cart_item_2['product_id'];
                    $quantity = $cart_item_2['quantity'];
                    $price = $cart_item_2['price'];
                    $sql2 = "INSERT INTO order_details
                    (order_id, product_id, qty, price) 
                    VALUES($last_id, $productId, $quantity, $price)";
                    $conn->query($sql2);
                    $conn->query("UPDATE products SET stock = stock - $quantity WHERE id = $productId");
                }
                unset($_SESSION['cart']);
                header('location: ./thanks.php');
            }
        } else {
            header('location: ./thanks.php');
        }

    }
}

?>


<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ogani</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="./css/hero.css" type="text/css">
    <link rel="stylesheet" href="./css/product.css" type="text/css">
    <link rel="stylesheet" href="./css/about.css" type="text/css">
    <link rel="stylesheet" href="./css/order.css" type="text/css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.9.0/dist/sweetalert2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.9.0/dist/sweetalert2.all.min.js"></script>
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-telegram"></i></a>
                            </div>
                            <div class="header__top__right__language">
                                <div>Vietnam</div>
                            </div>
                            <?php
                            if (isset($_SESSION['user_id'])) {
                                ?>
                                <div class="header__top__right__auth">
                                    <a href="#"><i class="fa fa-user"></i>
                                        <?= $_SESSION['user_name'] ?>
                                    </a>
                                    <div class="btn-logout">
                                        <a href="./logout.php"><i class="fa-solid fa-right-from-bracket"></i> Đăng xuất</a>
                                    </div>
                                </div>
                            <?php } else { ?>
                                <div class="header__top__right__auth">
                                    <a href="./login.php"><i class="fa fa-user"></i> Login</a>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="./index.php"><img src="img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="./index.php">Home</a></li>
                            <li><a href="./shop-grid.php">Shop</a></li>
                            <li><a href="./about.php">About Us</a></li>
                            <li><a href="./contact.php">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <?php if(isset($_SESSION['user_id'])){ ?>
                            <li><a href="./order.php"><i class="fa-solid fa-truck-pickup"></i></a></li>
                            <?php } ?>
                            <?php 
                            $count = 0;
                            if (isset($_SESSION['cart'])){
                                $count = count($_SESSION['cart']);
                            }
                            ?>
                            <li><a href="./shoping-cart.php"><i class="fa fa-shopping-bag"></i> <span><?=$count?></span></a></li>
                            </ul>
                            <div class="header__cart__price">Tổng tiền: <span>0 VNĐ</span></div>
                        </div>
                    </div>
                </div>
                <div class="humberger__open">
                    <i class="fa fa-bars"></i>
                </div>
            </div>
        </header>
        <!-- Header Section End -->
        <!-- Breadcrumb Section Begin -->
        <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="breadcrumb__text">
                            <h2>Checkout</h2>
                            <div class="breadcrumb__option">
                                <a href="./index.html">Home</a>
                                <span>Checkout</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Breadcrumb Section End -->

        <!-- Checkout Section Begin -->
        <section class="checkout spad">
            <div class="container">
                <div class="checkout__form">
                    <h4>Hóa đơn thanh toán</h4>
                    <form action="" method="POST">
                        <div class="row">
                            <div class="col-lg-7 col-md-6">
                                <div class="row">
                                    <div class="col-lg">
                                        <div class="checkout__input">
                                            <p>Họ và tên<span>*</span></p>
                                            <input name="name" required placeholder="Họ và tên" type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="checkout__input">
                                    Địa chỉ<span>*</span></p>
                                    <input name="address" required type="text" placeholder="Street Address"
                                        class="checkout__input__add">
                                </div>
                                <div class="row">
                                    <div class="col-lg">
                                        <div class="checkout__input">
                                            <p>Số điện thoại<span>*</span></p>
                                            <input name="phone" type="text" placeholder="Số điện thoại" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg">
                                        <div class="checkout__input">
                                            <p>Email<span>*</span></p>
                                            <input name="email" type="email" placeholder="email" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-6">
                                <div class="checkout__order">
                                    <h4>Đơn hàng</h4>
                                    <div class="checkout__order__products">Sản phẩm <span> Giá tiền</span></div>
                                    <ul>
                                    <?php
                                        $totalAmount = 0;
                                        foreach ($_SESSION['cart'] as $cart_item) {
                                            $price = $cart_item['price'] * $cart_item['quantity'];
                                            $priceF = number_format($price, 0, ',', ',');
                                            $totalAmount += $price;
                                            ?>
                                        <li style="position:relative;">
                                            <?= $cart_item['product_name'] ?> <span>
                                                <?= $priceF ?> VNĐ
                                            </span>
                                        </li>
                                    <?php } ?>
                                </ul>
                                <div class="checkout__order__subtotal">Tổng tiền <span>
                                        <?= number_format($totalAmount, 0, ',', '.') ?> VNĐ
                                    </span></div>
                                <div class="checkout__input__checkbox">
                                    <label for="paypal">
                                        Paypal
                                        <input type="checkbox" id="paypal">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <button name="submit" type="submit" class="site-btn">Đặt hàng</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="./index.html"><img src="img/logo.png" alt=""></a>
                        </div>
                        <ul>
                            <li>Address: 60-49 Road 11378 New York</li>
                            <li>Phone: +65 11.188.888</li>
                            <li>Email: hello@colorlib.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>Useful Links</h6>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">About Our Shop</a></li>
                            <li><a href="#">Secure Shopping</a></li>
                            <li><a href="#">Delivery infomation</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Our Sitemap</a></li>
                        </ul>
                        <ul>
                            <li><a href="#">Who We Are</a></li>
                            <li><a href="#">Our Services</a></li>
                            <li><a href="#">Projects</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Innovation</a></li>
                            <li><a href="#">Testimonials</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6>Join Our Newsletter Now</h6>
                        <p>Get E-mail updates about our latest shop and special offers.</p>
                        <form action="#">
                            <input type="text" placeholder="Enter your mail">
                            <button type="submit" class="site-btn">Subscribe</button>
                        </form>
                        <div class="footer__widget__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text">
                            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;
                                <script>document.write(new Date().getFullYear());</script> All rights reserved | This
                                template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a
                                    href="https://colorlib.com" target="_blank">Colorlib</a>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            </p>
                        </div>
                        <div class="footer__copyright__payment"><img src="img/payment-item.png" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>



</body>

</html>