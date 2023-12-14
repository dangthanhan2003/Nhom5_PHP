<?php
require("includes/header.php");
?>
<article style="width:800px; margin: auto;">
    <h3>Chi tiết đơn hàng</h3>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Sản phẩm</th>
                <th scope="col">Giá</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Tổng tiền</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            if(isset($_GET['order_id'])) {
                $id = $_GET['order_id'];
            }
            $query = $conn->query("SELECT * FROM order_details AS O INNER JOIN products AS P ON O.product_id = P.id WHERE order_id=$id");
            while($row = $query->fetch_assoc()) {
                $price = number_format($row['price'],0,',','.');
                $total = $row['price'] * $row['qty'];
                $totalF = number_format($total,0,',','.');
            ?>
            <tr>
                <td>
                    <img style="width: 80px;" src="../Dashboard/Dashboard/uploads/<?=$row['images']?>" alt="">
                    <strong><?=$row['name']?></strong>
                </td>
                <th><?=$price?> VNĐ</th>
                <td><?=$row['qty']?></td>
                <th><?=$totalF?> VNĐ</th>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</article>
<?php
require("includes/footer.php");
?>