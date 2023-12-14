<?php
require_once('includes/header.php');
?>
<?php
include_once 'classes/users.php';
include_once 'helpers/format.php';
?>
<?php 
$user = new users();
$fm = new Format(); 
if (isset($_GET['userid'])) {
    $id = $_GET['userid'];
    $delUser = $user->delete_user($id);
}
?>

<div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <?php
                    if(isset($delUser)){
                        echo $delUser;
                    }
                ?>
                <div class="col-xl-9 col-md-6 mb-4">
                    <h6 class="m-0 font-weight-bold text-primary">Người dùng</h6>
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
                            <th>Email</th>
                            <th>Địa chỉ</th>
                            <th>Password</th>
                            <th>SĐT</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Tên</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Password</th>
                            <th>SĐT</th>
                            <th>Hành động</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        $userlist = $user->show_user();
                        if ($userlist) {
                            while ($result = $userlist->fetch_assoc()) {
                        ?>
                                <tr>
                                    <td><?php echo $result['name'] ?></td>
                                    <td><?php echo $result['email'] ?></td>
                                    <td><?php echo $fm->textShorten($result['address'], 10) ?></td>
                                    <td><?php echo $fm->textShorten(md5($result['password']), 5) ?></td>
                                    <td><?php echo $result['phone'] ?></td>
                                    <td>
                                    <a class="btn btn-danger" href="?userid=<?php echo $result['id'] ?>" onclick="return confirm('Bạn chắc chắn xóa người dùng này?');">Delete</a>
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