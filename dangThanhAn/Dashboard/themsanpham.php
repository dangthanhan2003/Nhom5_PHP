<?php
require('includes/header.php');
?>
<?php
include_once 'classes/category.php';
include_once 'classes/product.php';
?>
<?php
$pd = new product();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $insertProduct = $pd->insert_product($_POST, $_FILES);
}
?>

<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="p-5">
                        <?php
                        if (isset($insertProduct)) {
                            echo $insertProduct;
                        }
                        ?>
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Thêm mới sản phẩm</h1>
                        </div>
                        <form class="user" method="post" action="themsanpham.php" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" name="productName" aria-describedby="emailHelp" placeholder="Tên sản phẩm">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Các hình ảnh cho sản phẩm</label>
                                <input type="file" class="form-control form-control-user" name="images" multiple>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Tóm tắt sản phẩm:</label>
                                <textarea name="summary" class="form-control" placeholder="Nhập...">

                        </textarea>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Mô tả sản phẩm:</label>
                                <textarea name="description" class="form-control" placeholder="Nhập...">

                        </textarea>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" name="stock" aria-describedby="emailHelp" placeholder="Số lượng nhập:">
                                </div>
                                <div class="col-sm-4 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" name="purchase" aria-describedby="emailHelp" placeholder="Giá gốc">
                                </div>
                                <div class="col-sm-4 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" name="price" aria-describedby="emailHelp" placeholder="Giá bán:">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Danh mục:</label>
                                <select class="form-control" name="category">
                                    <option>Chọn danh mục</option>
                                    <?php
                                    $cat = new category();
                                    $catlist = $cat->show_category();

                                    if ($catlist) {
                                        while ($result = $catlist->fetch_assoc()) {
                                    ?>
                                            <option value="<?php echo $result['id'] ?>"><?php echo $result['catName'] ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <input type="submit" name="submit" class="btn btn-primary btn-user btn-block" value="Xác nhận">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


<?php
require('includes/footer.php');
?>