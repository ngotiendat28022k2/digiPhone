<h1 style="font-size: 21px; margin-top: 10px;text-transform: capitalize;">List Comment</h1>
<?php
if (!empty($_GET['msg'])) {
    $msg = unserialize(urldecode($_GET['msg']));
    foreach ($msg as $key => $value) {
        echo '<p style="text-align: center; font-size: 16px; background-color: blue; color: white; padding: 5px 0;">' . $value . '</p>';
    }
}

// echo '<pre>';
// print_r($data['Comments']);
// echo '</pre>';

?>
<table class="table" style="margin-top: 10px;">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Email Comment</th>
            <th scope="col">Rating</th>
            <th scope="col">Content</th>
            <th scope="col">Creation Time</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data['Comments'] as $row) { ?>
            <tr>
                <th scope="row"><?php echo $row['comment_id'] ?></th>
                <td><?php echo $row['email'] ?></td>
                <td><?php echo $row['rating'] ?></td>
                <td><?php echo $row['content'] ?></td>
                <td><?php echo $row['created_date'] ?></td>
                <td>
                    <a class="btn btn-danger" href="<?= BASE_URL ?>/admincomment/remove/<?= $row['comment_id'] ?>">Remove</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>