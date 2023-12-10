<?php 
require('includes/header.php');
?>
<?php
include 'classes/category.php';
?>
<?php
    $cat = new category();
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $catName = $_POST['catName'];

        $insertCat = $cat->insert_category($catName);
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
                        <h1 class="h4 text-gray-900 mb-4">Thêm mới danh mục sản phẩm</h1>
                    </div>
                    <?php
                    if(isset($insertCat)){
                        echo $insertCat;
                    }
                    ?>
                    <form class="user" method="post" action="themdanhmuc.php">                        
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user"
                            id="name" name="catName" aria-describedby="emailHelp"
                            placeholder="Nhập tên danh mục">
                    </div>
                    <input type="submit" class="btn btn-primary btn-user btn-block" value="Xác nhận">
                    </form>
                    <hr>
                    
                </div>
            </div>
        </div>
    </div>
</div>

</div>

      
<?php
require('includes/footer.php');
?>