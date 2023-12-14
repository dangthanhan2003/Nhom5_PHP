<?php
require("includes/header.php");
?>

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="img/black.png">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Organi Shop</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.php">Home</a>
                        <span>Shop</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-5">
                <div class="sidebar">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>Danh mục sản phẩm</span>
                        </div>
                        <ul>
                            <li><a href="./shop-grid.php">ALL</a></li>
                            <?php 
                                $query = $conn->query("SELECT * FROM categories");
                                while ($row = $query->fetch_assoc()){
                            ?>
                            <li><a href="./shop-grid.php?category_id=<?=$row['id']?>"><?=$row['name']?></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-7">
                <div class="filter__item">
                    <div class="row">
                        <div class="col-lg-4 col-md-5">
                            <div class="filter__sort">

                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="filter__found">
                                <h6><span> Sản phẩm tìm thấy </span></h6>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-3">
                            <div class="filter__option">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php if (isset($_GET['category_id'])) { 
                    $query = $conn->query("SELECT C.*,P.*, P.id AS product_id, C.name AS category_name FROM products AS P INNER JOIN categories AS C ON P.category_id = C.id WHERE C.id = ".$_GET['category_id']);
                    while ($row = $query->fetch_assoc()) {
                        $priceF = number_format($row['price'],0,',','.');
                    ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 mix product <?=$row['category_name']?>">
                        <div class="featured__item">
                            <div class="featured__item__pic set-bg" data-setbg="../Dashboard/Dashboard/uploads/<?=$row['images']?>">
                                <ul class="featured__item__pic__hover">
                                    <li><a href="modal.php?product_id=<?=$row['product_id']?>" onclick="preventLink(event)"><i class="fa fa-info"></i></a></li>
                                    <li><form action="./shoping-cart.php" method="POST">
                                        <input type="hidden" name="product_id" value="<?=$row['product_id']?>">
                                        <button><i class="fa fa-shopping-cart"></i></button>
                                    </form></li>
                                </ul>
                            </div>
                            <div class="featured__item__text">
                                <h6><a href="shop-details.php?product_id=<?=$row['product_id']?>"><?=$row['name']?></a></h6>
                                <h5><?=$priceF?> VNĐ</h5>
                            </div>
                        </div>
                    </div>
                    <?php } }else{ 
                        $query = $conn->query("SELECT C.*,P.*, P.id AS product_id, C.name AS category_name FROM products AS P INNER JOIN categories AS C ON P.category_id = C.id");
                        while ($row = $query->fetch_assoc()) {
                            $priceF = number_format($row['price'],0,',','.');
                    ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 mix product <?=$row['category_name']?>">
                        <div class="featured__item">
                            <div class="featured__item__pic set-bg" data-setbg="../Dashboard/Dashboard/uploads/<?=$row['images']?>">
                                <ul class="featured__item__pic__hover">
                                    <li><form action="./includes/modal.php" method="POST"><a href="" onclick="preventLink(event)"><i class="fa fa-info"></i></a></form> </li>
                                    <li><form action="./shoping-cart.php" method="POST">
                                        <input type="hidden" name="product_id" value="<?=$row['product_id']?>">
                                        <button><i class="fa fa-shopping-cart"></i></button>
                                    </form></li>
                                </ul>
                            </div>
                            <div class="featured__item__text">
                                <h6><a href="shop-details.php?product_id=<?=$row['product_id']?>"><?=$row['name']?></a></h6>
                                <h5><?=$priceF?> VNĐ</h5>
                            </div>
                        </div>
                    </div>
                    <?php } } ?>
                </div>
                <div class="product__pagination">
                    <a href="#">1</a>
                    <a href="#">2</a>
                    <a href="#">3</a>
                    <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include "./includes/modal.php"; ?>
<!-- Product Section End -->
<?php
    include("includes/footer.php");
?>