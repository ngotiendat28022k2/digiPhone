<h1 style="font-size: 21px; margin-top: 10px;text-transform: capitalize;">List Product Comment</h1>
<?php
if (!empty($_GET['msg'])) {
    $msg = unserialize(urldecode($_GET['msg']));
    foreach ($msg as $key => $value) {
        echo '<p style="text-align: center; font-size: 16px; background-color: blue; color: white; padding: 5px 0;">' . $value . '</p>';
    }
}

// echo '<pre>';
// print_r($data['ProductComment']);
// echo '</pre>';

?>
<table class="table" style="margin-top: 10px;">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name Product</th>
            <th scope="col">Image</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data['ProductComment'] as $row) { ?>
            <tr>
                <th scope="row"><?php echo $row['id'] ?></th>
                <td><?php echo $row['name'] ?></td>
                <td><img style="width: 100%; max-width: 200px" src="<?= BASE_URL ?>/upload/<?= $row['image'] ?>" alt=""></td>
                <td>
                    <a class="btn btn-danger" href="<?= BASE_URL ?>/admincomment/detail/<?= $row['id'] ?>">Detail Product Comment</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>