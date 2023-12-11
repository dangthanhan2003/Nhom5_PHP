<?php
require_once('includes/header.php');
?>
<?php
include_once 'classes/category.php';
?>
<?php
$cat = new category();
if (isset($_GET['delid'])) {
    $id = $_GET['delid'];
    $delCat = $cat->delete_category($id);
}

?>
<div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh sách các danh mục</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <?php
                if (isset($delCat)) {
                    echo $delCat;
                }
                ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Category</th>
                            <th>Operation</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>STT</th>
                            <th>Category</th>
                            <th>Operation</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        $show_cat = $cat->show_category();
                        if ($show_cat) {
                            $i = 0;
                            while ($result = $show_cat->fetch_assoc()) {
                                $i++;
                        ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $result['catName'] ?> </td>
                                    <td> <a class="btn btn-warning" href="editcategory.php?catid=<?php echo $result['id'] ?>">Edit</a>
                                        <a class="btn btn-danger" href="?delid=<?php echo $result['id'] ?>" onclick="return confirm('Bạn chắc chắn xóa mục này?');">Delete</a>
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
require('includes/footer.php');
?>