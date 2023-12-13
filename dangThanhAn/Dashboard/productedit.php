<?php
require('includes/header.php');
?>
<?php
include_once 'classes/category.php';
include_once 'classes/product.php';
?>
<?php
$pd = new product();
if (isset($_GET['productid']) || $_GET['productid'] != NULL) {
    $id = $_GET['productid'];
} else {
    echo "<script>window.location ='listsanpham.php'</script>";
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {

    $updateProduct = $pd->update_product($_POST, $_FILES, $id);
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
                        if (isset($updateProduct)) {
                            echo $updateProduct;
                        }
                        ?>
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Sửa sản phẩm</h1>
                        </div>
                        <?php
                        $get_product_by_id = $pd->getproductbyId($id);
                        if ($get_product_by_id) {
                            while ($result_product = $get_product_by_id->fetch_assoc()) {
                        ?>
                                <form class="user" method="post" action="" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" name="productName" aria-describedby="emailHelp" value="<?php echo $result_product['name'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Các hình ảnh cho sản phẩm:</label> <br>
                                        <img src="uploads/<?php echo trim($result_product['images']) ?>" width="80">
                                        <input type="file" class="form-control form-control-user" name="images" multiple>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Tóm tắt sản phẩm:</label>
                                        <textarea name="summary" class="form-control">
                                <?php echo $result_product['summary'] ?>
                        </textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Mô tả sản phẩm:</label>
                                        <textarea name="description" class="form-control">
                                <?php echo $result_product['description'] ?>
                        </textarea>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-4 mb-sm-0">
                                            <label class="form-label">Số lượng tồn kho:</label>
                                            <input type="text" class="form-control form-control-user" name="stock" aria-describedby="emailHelp" value="<?php echo $result_product['stock'] ?>">
                                        </div>
                                        <div class="col-sm-4 mb-sm-0">
                                            <label class="form-label">Giá mua:</label>
                                            <input type="text" class="form-control form-control-user" name="purchase" aria-describedby="emailHelp" value="<?php echo $result_product['purchase'] ?>">
                                        </div>
                                        <div class="col-sm-4 mb-sm-0">
                                            <label class="form-label">Giá bán:</label>
                                            <input type="text" class="form-control form-control-user" name="price" aria-describedby="emailHelp" value="<?php echo $result_product['price'] ?>">
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
                                                    <option <?php
                                                            if ($result['id'] == $result_product['category_id']) {
                                                                echo 'selected';
                                                            }
                                                            ?> value="<?php echo $result['id'] ?>"><?php echo $result['name'] ?></option>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <input type="submit" name="submit" class="btn btn-primary btn-user btn-block" value="Xác nhận">
                                </form>
                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


<?php
require('includes/footer.php');
?>