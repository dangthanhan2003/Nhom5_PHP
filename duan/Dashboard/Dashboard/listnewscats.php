<?php
require('includes/header.php');
?>
<div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh mục tin tức</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Name</th>
                            <th>Operation</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>STT</th>
                            <th>Name</th>
                            <th>Operation</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        require('../db/conn.php');
                        $sql_str = "select * from newscategories order by id desc";
                        $result = mysqli_query($conn, $sql_str);
                        $i =0;
                        while ($row = mysqli_fetch_assoc($result)) {
                            $i++;
                        ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?= $row['name'] ?></td>
                                <td>
                                    <a class="btn btn-warning" href="editnewscategory.php?id=<?= $row['id'] ?>">Edit</a>
                                    <a class="btn btn-danger" href="deletenewscategory.php?id=<?= $row['id'] ?>" onclick="return confirm('Bạn chắc chắn xóa mục này?');">Delete</a>
                                </td>

                            </tr>
                        <?php
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