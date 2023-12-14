<?php
require("includes/header.php");
?>
<div style="margin:auto;" class="col-lg-9">
    <div class="hero__search">
        <div class="hero__search__form">
            <form action="./search.php" method="POST">
                <input name="search" type="text" placeholder="Tìm kiếm...">
                <button name="submit" type="submit" class="site-btn">Search</button>
            </form>
        </div>
        <div class="hero__search__phone">
            <div class="hero__search__phone__icon">
                <i class="fa fa-phone"></i>
            </div>
            <div class="hero__search__phone__text">
                <h5>+96 999 9999</h5>
                <span>hỗ trợ 24/7</span>
            </div>
        </div>
    </div>
</div>
<article>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['submit'])) {
            $data = $_POST['search'];
            $query = $conn->query("SELECT C.*,P.*, P.id AS product_id, C.name AS category_name FROM products AS P INNER JOIN categories AS C ON P.category_id = C.id WHERE C.name LIKE '%$data%' OR P.name LIKE '%$data%'");
            ?>
            <?php
            if ($query->num_rows > 0) {
                ?>
                <div style="margin-bottom:50px;" class="col-lg-4 col-md-4">
                    <div class="filter__found">
                        <h4><span>
                                <?= $query->num_rows ?>
                            </span> Sản phẩm tìm thấy</h4>
                    </div>
                </div>
                <div class="row featured__filter">
                    <?php
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
                                    <h6><a href="shop-details.php?product_id=<?=$row['product_id']?>">
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
            <?php } else { ?>
                <div style="margin-bottom:50px;" class="col-lg-4 col-md-4">
                    <div class="filter__found">
                        <h4>Không tim thấy sản phẩm</h4>
                    </div>
                </div>
            <?php } ?>
        <?php }
    } ?>
</article>
<?php
include "./includes/modal.php";
?>
<?php
require("includes/footer.php");
?>