<?php
require_once('includes/header.php');
?>
<?php
include_once 'classes/category.php';
include_once 'classes/product.php';
include_once 'helpers/format.php';
?>
<?php 
$pd = new product();
$fm = new Format(); 
if (isset($_GET['productid'])) {
    $id = $_GET['productid'];
    $delProduct = $pd->delete_product($id);
}
?>

<div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <?php
                    if(isset($delProduct)){
                        echo $delProduct;
                    }
                ?>
                <div class="col-xl-9 col-md-6 mb-4">
                    <h6 class="m-0 font-weight-bold text-primary">Sản phẩm</h6>
                </div>
                <div class="col-xl-3 col md-6 mb-8">
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Tên</th>
                            <th>Ảnh</th>
                            <th>Danh mục</th>
                            <th>Mô tả</th>
                            <th>Tóm tắt</th>
                            <th>Giá mua </th>
                            <th>Giá bán </th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Tên</th>
                            <th>Ảnh</th>
                            <th>Danh mục</th>
                            <th>Mô tả</th>
                            <th>Tóm tắt</th>
                            <th>Giá mua </th>
                            <th>Giá bán </th>
                            <th>Hành động</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        

                        $pdlist = $pd->show_product();
                        if ($pdlist) {
                            while ($result = $pdlist->fetch_assoc()) {
                        ?>
                                <tr>
                                    <td><?php echo $result['name'] ?></td>
                                    <td><img src="uploads/<?php echo trim($result['images'])?>" width="100"></td>
                                    <td><?php echo $result['catName'] ?></td>
                                    <td><?php echo $fm->textShorten($result['description'], 10) ?></td>
                                    <td><?php echo $result['summary'] ?></td>
                                    <td><?php echo $result['purchase'] ?></td>
                                    <td><?php echo $result['price'] ?></td>
                                    <td>
                                    <a class="btn btn-warning" href="productedit.php?productid=<?php echo $result['id'] ?>">Edit</a>
                                    <a class="btn btn-danger" href="?productid=<?php echo $result['id'] ?>" onclick="return confirm('Bạn chắc chắn xóa mục này?');">Delete</a>
                                    </td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



<?php
require_once('includes/footer.php');
?>