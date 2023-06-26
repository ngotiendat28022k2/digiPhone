<?php
// echo '<pre>';
// print_r($data['productOder']);
// echo '</pre>';

$dataStatus = array(
    "Đang lên đơn",
    "Đang vận chuyển",
    "Đơn hàng thành công",
    "Hủy đơn hàng",
)

?>


<main class="container">
    <h2 style="font-size: 18px; color: #333;">Đơn Hàng Của Bạn</h2>
    <?php if (!empty($data['productOder'])) : ?>
        <table class="table table-success table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Payment Method</th>
                    <th scope="col">Date</th>
                    <th scope="col">Status</th>
                    <th scope="col">Tổng Tiền</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data['productOder'] as $product) : ?>
                    <tr>
                        <th scope="row"><?= $product['id'] ?></th>
                        <td><?= $product['payment_method'] ?></td>
                        <td><?= $product['created_date'] ?></td>
                        <td>
                            <?php foreach ($dataStatus as $index => $value) { ?>
                                <?php if ($index == $product['status']) {
                                    echo $value;
                                } ?>

                            <?php } ?>
                        </td>
                        <td style="color: red;"><?= number_format($product['totalmonney'], 0, ',', '.') ?> VNĐ</td>
                        <td><a href="<?= BASE_URL ?>account/detailoder/<?= $product['id'] ?>" class="btn btn-success">Detail Oder</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else : ?>
        <div style="text-align: center;">
            <h3 style="color: red;">Chưa Có Đơn Hàng </h3>
        </div>
    <?php endif; ?>

</main>