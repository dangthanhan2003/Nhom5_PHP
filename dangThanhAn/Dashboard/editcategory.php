<?php
include 'includes/header.php';
?>
<?php
include 'classes/category.php';
?>
<?php
$cat = new category();
if(isset($_GET['catid']) || $_GET['catid']!=NULL){
    $id = $_GET['catid'];
}
else {
    echo "<script>window.location ='listcats.php'</script>";
}
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $catName = $_POST['catName'];
    $updateCat = $cat->update_category($catName, $id);
}
?>

<div class="container">

<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-lg-12">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Sửa danh mục sản phẩm</h1>
                    </div>
                    <?php
                    if (isset($updateCat)) {
                        echo $updateCat;
                    }
                    ?>
                    <?php
                    $get_cat_name = $cat->getcatbyId($id);
                    if ($get_cat_name) {
                        while ($result = $get_cat_name->fetch_assoc()) {
                    ?>
                            <form class="user" method="post" action="">
                                <div class="form-group">
                                    <input type="text" value="<?php echo $result['name'] ?>" class="form-control form-control-user" name="catName" aria-describedby="emailHelp" placeholder="Nhập tên danh mục">
                                </div>
                                <input type="submit" class="btn btn-primary btn-user btn-block" value="Xác nhận">
                            </form>
                    <?php
                        }
                    }
                    ?>
                    <hr>

                </div>
            </div>
        </div>
    </div>
</div>

</div>


<?php
include 'includes/footer.php';
?>