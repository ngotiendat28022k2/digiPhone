<h1 style="font-size: 21px; margin-top: 10px;text-transform: capitalize;">List Category</h1>
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
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = mysqli_fetch_array($data['Categories'])) { ?>
            <tr>
                <th scope="row"><?php echo $row['id'] ?></th>
                <td><?php echo $row['name'] ?></td>
                <td><img style="width: 100%; max-width: 200px; height: 90px;" src="<?= BASE_URL ?>/upload/<?= $row['image'] ?>" alt=""></td>
                <td>
                    <a class="btn btn-success" href="<?= BASE_URL ?>/admincategory/update/<?= $row['id'] ?>">Update</a>
                    <a class="btn btn-danger" href="<?= BASE_URL ?>/admincategory/remove/<?= $row['id'] ?>">Remove</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>