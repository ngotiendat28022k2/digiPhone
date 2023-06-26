<h1 style="font-size: 21px; margin-top: 10px;text-transform: capitalize;">List Banner</h1>
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
            <th scope="col">Image</th>
            <th scope="col">Categories</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = mysqli_fetch_array($data['Banner'])) { ?>
            <tr>
                <th scope="row"><?php echo $row['id'] ?></th>
                <!-- <td><img src="<?= BASE_URL ?>upload/<?php echo $row['image'] ?>" alt=""></td> -->
                <td><img style="max-width: 400px; width: 100%;" src="<?= BASE_URL ?>/upload/<?php echo $row['image'] ?>" alt=""></td>
                <td><span><?= $row['category_name'] ?></span>
                </td>
                <td>
                    <a class="btn btn-success" href="<?= BASE_URL ?>/adminbanner/update/<?= $row['id'] ?>">Update</a>
                    <a class="btn btn-danger" href="<?= BASE_URL ?>/adminbanner/remove/<?= $row['id'] ?>">Remove</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>