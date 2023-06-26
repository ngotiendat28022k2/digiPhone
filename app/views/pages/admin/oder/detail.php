<h1 style="font-size: 21px; margin-top: 10px;text-transform: capitalize;">List oder detail</h1>
<?php
if (!empty($_GET['msg'])) {
    $msg = unserialize(urldecode($_GET['msg']));
    foreach ($msg as $key => $value) {
        echo '<p style="text-align: center; font-size: 16px; background-color: blue; color: white; padding: 5px 0;">' . $value . '</p>';
    }
}

$total = 0;
?>
<table class="table" style="margin-top: 10px;">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Product Name</th>
            <th scope="col">Product Price</th>
            <th scope="col">Product Image</th>
            <th scope="col">Quantily</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data['Oderdetail'] as $row) { ?>
            <tr>
                <th scope="row"><?php echo $row['id'] ?></th>
                <td><?php echo $row['name'] ?></td>
                <td style="color: red;"><?php $total += $row['price'];
                                        echo number_format($row['price'], 0, ',', '.') . ' VNĐ' ?></td>
                <td><img style="max-width: 150px;" src="<?= BASE_URL ?>upload/<?php echo $row['image'] ?>" alt=""></td>
                <td><?php echo $row['quantily'] ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<div style="text-align: right;">
    <h3 style="font-weight: 700; font-size: 21px;">Tổng Tiền Đơn Hàng:</h3>
    <p style="color: red; font-size: 18px; font-weight: 700;"><?= number_format($total, 0, ',', '.') ?></p>
</div>