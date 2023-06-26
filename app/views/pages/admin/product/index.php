<h1 style="font-size: 21px; margin-top: 10px;text-transform: capitalize;">List Product</h1>
<?php
if (!empty($_GET['msg'])) {
    $msg = unserialize(urldecode($_GET['msg']));
    foreach ($msg as $key => $value) {
        echo '<p style="text-align: center; font-size: 16px; background-color: blue; color: white; padding: 5px 0;">' . $value . '</p>';
    }
}
?>
<table class="table" style="margin-top: 10px;">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Image</th>
            <th scope="col">Price</th>
            <th scope="col">Sale</th>
            <th scope="col">Quantily</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = mysqli_fetch_array($data['Products'])) { ?>
            <tr>
                <th scope="row"><?= $row['id'] ?></th>
                <td><?= $row['name'] ?></td>
                <td><img style="max-width: 150px;width: 100%;" src="<?= BASE_URL ?>/upload/<?= $row['image'] ?>" alt=""></td>
                <td><?= number_format($row['price'], 0, ',', '.') ?></td>
                <td><?= number_format($row['sale'], 0, ',', '.') ?></td>
                <td><?= $row['quantily'] ?></td>
                <td>
                    <a class="btn btn-success" href="<?= BASE_URL ?>/adminproduct/update/<?= $row['id'] ?>">Update</a>
                    <a class="btn btn-danger" href="<?= BASE_URL ?>/adminproduct/remove/<?= $row['id'] ?>">Remove</a>
                    <a class="btn btn-dark" href="<?= BASE_URL ?>/detailproduct/showdata/<?= $row['id'] ?>">Detail</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>