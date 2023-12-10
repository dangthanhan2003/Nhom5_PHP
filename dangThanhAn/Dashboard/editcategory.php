<?php


//lay id goi edit
$id = $_GET['id'];

//tim trong CSDL category co id trung
//ket noi csdl
require('../db/conn.php');

$sql_str = "select * from categories where id=$id";
$res = mysqli_query($conn, $sql_str);

$brand = mysqli_fetch_assoc($res);
if (isset($_POST['btnUpdate'])) {
    //neu nut Cap nhat duoc nhan
    //lay name
    $name = $_POST['name'];
    $status = $_POST['status'];
    //thuc hien viec cap nhat
    $sql_str2 = "update categories set name='$name', status='$status' where id=$id";

    mysqli_query($conn, $sql_str2);

    //chuyen qua trang listcats
    header("location: listcats.php");
} else {
    require('includes/header.php');
?>

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Cập nhật thương hiệu (brand)</h1>
                            </div>
                            <form class="user" method="post" action="#">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="name" name="name" aria-describedby="emailHelp" placeholder="Tên thương hiệu" value=<?php echo $brand['name'] ?>>
                                </div>
                                <div class="form-group">
                                    <select class="form-control" id="status" name="status">
                                        <option value="active" <?php $brand['status'] = 'active'; ?>>Active</option>
                                        <option value="inactive" <?php $brand['status'] = 'inactive'; ?>>Inactive</option>
                                    </select>
                                </div>
                                <button class="btn btn-primary" name="btnUpdate">Cập nhật</button>
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
}
?>