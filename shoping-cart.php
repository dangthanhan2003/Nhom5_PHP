<?php
    require("includes/header.php");
?>

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/black.png">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Giỏ hàng</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.php">Home</a>
                            <span>Giỏ hàng</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (isset($_POST['quantity'])) {
            $quantity = $_POST['quantity'];
        }else {
            $quantity = 1;
        }
    
        if (isset($_POST["product_id"])) {
            $product_id = $_POST["product_id"];
            $result = $conn->query("SELECT * FROM products WHERE id = $product_id");
            $row = $result->fetch_assoc();
    
            
            if (!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = array();
            }
    
            $product_exists = false;
    
            foreach ($_SESSION['cart'] as $key => $cart_item) {
                if ($cart_item['product_id'] == $product_id) {
                    $_SESSION['cart'][$key]['quantity'] += $quantity;
                    $product_exists = true;
                    break;
                }
            }
            
            if (!$product_exists) {
                $cart_item = array(
                    'product_id' => $row['id'],
                    'product_name' => $row['name'],
                    'price' => $row['price'],
                    'product_image' => $row['images'],
                    'quantity' => $quantity
                );
    
                $_SESSION['cart'][] = $cart_item;
            }
        }
    }
    ?>
    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <?php 
        if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
        ?>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Sản phẩm</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Tổng tiền</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $totalAmount = 0;
                                foreach ($_SESSION['cart'] as $cart_item){
                                    $priceF = number_format($cart_item['price'],0,',','.');
                                    $total = $cart_item['price'] * $cart_item['quantity'];
                                    $totalF = number_format($total,0,',','.');
                                    $totalAmount += $total;
                                ?>
                                <tr>
                                    <td class="shoping__cart__item">
                                        <img style="width:100px;" src="../Dashboard/Dashboard/uploads/<?=$cart_item['product_image']?>" alt="">
                                        <h5><?=$cart_item['product_name']?></h5>
                                    </td>
                                    <td class="shoping__cart__price">
                                        <?=$priceF?> VNĐ
                                    </td>
                                    <td class="shoping__cart__quantity"><?=$cart_item['quantity']?></td>
                                    <td class="shoping__cart__total">
                                        <?=$totalF?> VNĐ
                                    </td>
                                    <td class="shoping__cart__item__close">
                                        <a href="removeCart.php?id=<?=$cart_item['product_id']?>"><span class="icon_close"></span></a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="./index.php" class="primary-btn cart-btn-right">
                            Tiếp tục mua sám</a>
                    </div>
                </div>

                <div class="col-lg">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul>
                            <li>Tạm tính <span><?=number_format($totalAmount,0,',','.')?> VNĐ</span></li>
                            <li>Tổng <span><?=number_format($totalAmount,0,',','.')?> VNĐ</span></li>
                        </ul>
                        <?php 
                        if(isset($_SESSION['user_id'])){
                        ?>
                        <a href="./checkout.php" class="primary-btn">Thanh toán</a>
                        <?php }else { ?>
                        <a href="./login.php" class="primary-btn" onclick="login(event)">Thanh toán</a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <?php } else { ?>
        <div class="container">
            <div class="cart-empty">
                <div class="icon-cart">
                    <i class="fa-solid fa-cart-shopping"></i>
                </div>
                <p>Không có sản phẩm nào trong giỏ hàng</p>
                <div class="return-home">
                    <a href="./index.php">Quay về trang chủ</a>
                </div>
            </div>
        </div>
        <?php } ?>
    </section>
    <!-- Shoping Cart Section End -->

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
                        <div class="footer__copyright__text"><p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p></div>
                        <div class="footer__copyright__payment"><img src="img/payment-item.png" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->
    <script>
        function login(event) {
            event.preventDefault();

            const deleteLink = event.currentTarget; // sử dụng this để lấy phần tử được kích hoạt
            const path = deleteLink.getAttribute('href');

            Swal.fire({
                title: "Bạn chưa đăng nhập",
                text: "Vui lòng đăng nhập để thanh toán!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                cancelButtonText: "Hủy bỏ",
                confirmButtonText: "Đăng nhập"
            }).then((result) => {
                if (result.value) {
                    document.location.href = path;
                }
            });
        }
    </script>
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