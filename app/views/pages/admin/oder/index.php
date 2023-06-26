<h1 style="font-size: 21px; margin-top: 10px;text-transform: capitalize;">List Oder</h1>
<?php
if (!empty($_GET['msg'])) {
    $msg = unserialize(urldecode($_GET['msg']));
    foreach ($msg as $key => $value) {
        echo '<p style="text-align: center; font-size: 16px; background-color: blue; color: white; padding: 5px 0;">' . $value . '</p>';
    }
}

$dataStatus = array(
    "Đang lên đơn",
    "Đang vận chuyển",
    "Đơn hàng thành công",
    "Hủy đơn hàng",
)
?>
<div style="display: flex; justify-content: flex-start; align-items: flex-start;">
    <form action="" style="display: flex; justify-content: flex-start; align-items: flex-start;">
        <select style="width: 200px; padding: 6px 0 6px 10px; outline: none;" class="form-select form-select-lg" name="status" id="status">
            <option value="">
                Find All
            </option>
            <?php foreach ($dataStatus as $index => $value) { ?>
                <option <?php if ($index == $data['Status']) {
                            echo 'selected';
                        } ?> value="<?= $index ?>">
                    <?php echo $value ?>
                </option>
            <?php } ?>
        </select>
        <input class="btn btn-success ml-2" type="submit" value="Find">
    </form>
    <a href="<?= BASE_URL ?>adminoder" class="btn btn-info ml-4">Clear</a>
</div>
<table class="table" style="margin-top: 10px;">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">User Name</th>
            <th scope="col">Phone Number</th>
            <th scope="col">Address</th>
            <th scope="col">Pay Method</th>
            <th scope="col">Vnp Txnref</th>
            <th scope="col">Created Date</th>
            <th scope="col">Total Monney</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = mysqli_fetch_array($data['Oder'])) { ?>
            <form method="POST" action="<?= BASE_URL ?>adminoder/update/<?= $row['id'] ?>">
                <tr>
                    <th scope="row"><?php echo $row['id'] ?></th>
                    <td><?php echo $row['user_name'] ?></td>
                    <td><?php echo $row['user_numberphone'] ?></td>
                    <td><?php echo $row['user_address'] ?></td>
                    <td><?php echo $row['payment_method'] ?></td>
                    <td><?php echo $row['vnp_txnref'] ?></td>
                    <td><?php echo $row['created_date'] ?></td>
                    <td><?php echo number_format($row['totalmonney'], 0, ',', '.') ?></td>
                    <td>
                        <select style="width: 200px; padding: 10px 0 10px 10px; outline: none;" class="form-select form-select-lg" name="status" id="status">
                            <?php foreach ($dataStatus as $index => $value) { ?>
                                <option <?php if ($index == $row['status']) {
                                            echo 'selected';
                                        } ?> value="<?= $index ?>">
                                    <?php echo $value ?>
                                </option>
                            <?php } ?>
                        </select>
                    </td>
                    <td>
                        <?php
                        if ($row['status'] != 3 && $row['status'] != 2) {
                        ?>
                            <button class="btn btn-success">Update</button>
                        <?php
                        }
                        ?>
                        <a class="btn btn-danger" style="margin: 5px 5px;" href="<?= BASE_URL ?>adminoder/detail/<?= $row['id'] ?>">Detail</a>
                    </td>
                </tr>
            </form>
        <?php } ?>
    </tbody>
</table>