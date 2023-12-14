    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
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
                <div class="col-lg-9">
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
                    <div class="hero__item set-bg" data-setbg="img/hero/skincare-tips.jpg">
                        <div class="hero__text">
                            <span>skincare</span>
                            <h2>Làm đẹp da <br />100% tự nhiên</h2>
                            <p>Giao hàng nhanh - miễn phí</p>
                            <a href="shop-grid.php" class="primary-btn">SHOP NOW</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
