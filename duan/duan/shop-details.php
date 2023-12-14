<?php
require("includes/header.php");
require("includes/hero.php");
?>

<!-- Breadcrumb Section Begin -->
<?php
if (isset($_GET['product_id'])) {
    $id = $_GET['product_id'];
}

$query = $conn->query("SELECT * FROM products WHERE id = $id");
$row = $query->fetch_assoc();
$priceF = number_format($row['price'], 0, ',', '.');
?>
<section class="breadcrumb-section set-bg" data-setbg="img/black.png">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2><?=$row['name']?></h2>
                    <div class="breadcrumb__option">
                        <a href="./index.php">Home</a>
                        <a href="./shop-grid.php">Shop</a>
                        <span>
                            <?= $row['name'] ?>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Product Details Section Begin -->
<section class="product-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="product__details__pic">
                    <div class="product__details__pic__item">
                        <img class="product__details__pic__item--large"
                            src="../Dashboard/Dashboard/uploads/<?= $row['images'] ?>" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="product__details__text">
                    <h3><?=$row['name']?></h3>
                    <div class="product__details__rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-o"></i>
                        <span>(18 reviews)</span>
                    </div>
                    <div class="product__details__price">
                        <?= $priceF ?> VNĐ
                    </div>
                    <p>
                        <?= $row['summary'] ?>
                    </p>
                    <div class="product__details__quantity">
                        <form action="./shoping-cart.php" method="post">
                            <input type="hidden" name="product_id" value="<?= $row['id'] ?>">
                            <div class="quantity-2">
                                <button class="decrease" type="button">-</button>
                                <input type="number" oninput="validateDiscount(this)" name="quantity" id="quantityInput"
                                    min="1" max="" class="count" value="1">
                                <button class="increase" type="button">+</button>
                            </div>
                            <button type="submit" class="btn primary-btn">
                                Thêm vào giỏ hàng
                            </button>
                            <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>
                        </form>
                    </div>
                    <ul>
                        <li><b>Số lượng</b> <span>
                                <?= $row['stock'] ?> sản phẩm có sẵn
                            </span></li>

                        <li><b>Chia sẻ</b>
                            <div class="share">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="product__details__tab">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                                aria-selected="true">Mô tả</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab" aria-selected="false">Đánh
                                giá <span>(1)</span></a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <div class="product__details__tab__desc">
                                <h6>Mô tả sản phẩm</h6>
                                <p>
                                    <?= $row['description'] ?>
                                </p>
                            </div>
                        </div>
                        <div class="tab-pane" id="tabs-3" role="tabpanel">
                            <div class="product__details__tab__desc">
                                <h6>Đánh giá</h6>
                                <p>Tốt </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Details Section End -->

<!-- Related Product Section Begin -->
<section class="related-product">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title related__product__title">
                    <h2>Related Product</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
            $query = $conn->query("SELECT C.*,P.*, P.id AS product_id, C.name AS category_name FROM products AS P INNER JOIN categories AS C ON P.category_id = C.id ORDER BY RAND() LIMIT 4");
            while ($row = $query->fetch_assoc()) {
                $priceF = number_format($row['price'], 0, ',', '.');
                ?>
                <div class="col-lg-3 col-md-4 col-sm-6 mix product <?= $row['category_name'] ?>">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg"
                            data-setbg="../Dashboard/Dashboard/uploads/<?= $row['images'] ?>">
                            <ul class="featured__item__pic__hover">
                                <li><a href="" onclick="preventLink(event)"><i class="fa fa-info"></i></a></li>
                                <li><form action="./shoping-cart.php" method="POST">
                                    <input type="hidden" name="product_id" value="<?=$row['product_id']?>">
                                    <button><i class="fa fa-shopping-cart"></i></button>
                                </form></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="shop-details.php?product_id=<?= $row['product_id'] ?>">
                                    <?= $row['name'] ?>
                                </a></h6>
                            <h5>
                                <?= $priceF ?> VNĐ
                            </h5>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<!-- Related Product Section End -->
<script>

    $(document).ready(function () {
        // Lấy giá trị hiện tại
        var currentQuantity = parseInt($('#quantityInput').val());

        // Bắt sự kiện nút giảm
        $('.decrease').on('click', function () {
            if (currentQuantity > 1) {
                currentQuantity--;
                $('#quantityInput').val(currentQuantity);
            }
        });

        // Bắt sự kiện nút tăng
        $('.increase').on('click', function () {
            if (currentQuantity < 10) {
                currentQuantity++;
                $('#quantityInput').val(currentQuantity);
            }
        });
    });
</script>
<?php
require("includes/footer.php");
?>