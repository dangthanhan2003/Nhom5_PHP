<?php
    require("includes/header.php");
    require("includes/hero.php");
?>

    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">
            <div class="row">
                <h3>Sản phẩm nổi bật</h3>
                <div class="categories__slider owl-carousel">
                    <?php 
                    $query = $conn->query("SELECT C.*,P.*, P.id AS product_id, C.name AS category_name FROM products AS P INNER JOIN categories AS C ON P.category_id = C.id ORDER BY RAND() limit 8");
                    while ($row = $query->fetch_assoc()) {
                        $priceF = number_format($row['price'],0,',','.');
                    ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 mix">
                        <div class="featured__item">
                            <div class="featured__item__pic set-bg" data-setbg="../Dashboard/Dashboard/uploads/<?=$row['images']?>">
                                <ul class="featured__item__pic__hover">
                                    <li><a href="" onclick="preventLink(event)"><i class="fa fa-info"></i></a></li>
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
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

    <!-- Featured Section Begin -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Sản phẩm</h2>
                    </div>
                    <div class="featured__controls">
                        <ul>
                            <li class="active" data-filter="*">All</li>
                            <?php 
                            $query = $conn->query("SELECT * FROM categories");
                            while ($row = $query->fetch_assoc()) {
                            ?>
                            <li data-filter=".<?=$row['name']?>"><?=$row['name']?></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
                <?php 
                    $query = $conn->query("SELECT C.*,P.*, P.id AS product_id, C.name AS category_name FROM products AS P INNER JOIN categories AS C ON P.category_id = C.id");
                    while ($row = $query->fetch_assoc()) {
                        $priceF = number_format($row['price'],0,',','.');
                ?>
                <div class="col-lg-3 col-md-4 col-sm-6 mix product <?=$row['category_name']?>">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="../Dashboard/Dashboard/uploads/<?=$row['images']?>">
                            <ul class="featured__item__pic__hover">
                                <li><a href="" onclick="preventLink(event)"><i class="fa fa-info"></i></a></li>
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
                <?php } ?>
            </div>
        </div>
    </section>
    <?php 
        include "./includes/modal.php";
    ?>
    <!-- Featured Section End -->

    <!-- Blog Section Begin -->
    <section class="from-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title from-blog__title">
                        <h2>Tin tức</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                $sql_str = "select * from news order by created_at desc limit 0, 3";
                $result = mysqli_query($conn, $sql_str);
                while ($row = mysqli_fetch_assoc($result)){
                ?>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item">
                            <img src="../Dashboard/Dashboard/<?=$row['avatar']?>" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i><?=$row['created_at']?></li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="blog-details.php?id=<?=$row['id']?>"><?=$row['title']?></a></h5>
                            <p><?=$row['summary']?></p>
                        </div>
                    </div>
                </div>
                <?php
                    }
                ?>
            </div>
        </div>
    </section>
 <!-- Blog Section End -->

<?php
require("includes/footer.php");
?>




</body>

</html> 