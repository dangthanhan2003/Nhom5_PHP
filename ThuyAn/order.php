<?php
require("includes/header.php");
?>
<article>
    <h3>Đơn hàng của bạn</h3>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Người đặt hàng</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Tổng tiền</th>
                <th scope="col">Ngày mua hàng</th>
                <th scope="col">Số điện thoại</th>
                <th scope="col">Địa chỉ</th>
                <th scope="col">#</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            if (isset($_SESSION['user_id'])){
                $user_id = $_SESSION['user_id'];
            }
            $query = $conn->query("SELECT * FROM orders WHERE user_id = $user_id");
            while ($row = $query->fetch_assoc()) {
                $totalAmount = number_format($row['total_amount'],0,',','.');
            ?>
            <tr>
                <td><?=$row['name']?></td>
                <td><?=$row['status']?></td>
                <th><?=$totalAmount?> VNĐ</th>
                <th><?=$row['created_at']?></th>
                <th><?=$row['phone']?></th>
                <td><?=$row['address']?></td>
                <td><a class="btn btn-outline-success" href="./order-detail.php?order_id=<?=$row['id']?>">Chi tiết</a></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</article>
<?php
require("includes/footer.php");
?>
