<?php
$row = $data['Category'];
print_r($row['name']);
?>
<h1 style="font-size: 21px; margin-top: 10px;text-transform: capitalize;">Update category</h1>
<?php
if (!empty($_GET['msg'])) {
    $msg = unserialize(urldecode($_GET['msg']));
    foreach ($msg as $key => $value) {
        echo '<p style="text-align: center; font-size: 16px; background-color: blue; color: white; padding: 5px 0;">' . $value . '</p>';
    }
}
?>

<form action="<?= BASE_URL ?>/admincategory/aupdate/<?= $row['id'] ?>" method="POST">
    <div class="mb-3 mt-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" value="<?= $row['name'] ?>" placeholder="Name category" name="name">
    </div>
    <!-- <div class="mb-3">
        <label for="image" class="btn btn-success text-white">
            <input type="file"  class="form-control" id="image" name="image" style="display: none;">
            Browse Imgae
        </label>
    </div> -->
    <button type="submit" class="btn btn-primary">Submit</button>
</form>