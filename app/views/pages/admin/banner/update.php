<h1 style="font-size: 21px; margin-top: 10px;text-transform: capitalize;">Add banner</h1>
<?php
if (!empty($_GET['msg'])) {
    $msg = unserialize(urldecode($_GET['msg']));
    foreach ($msg as $key => $value) {
        echo '<p style="text-align: center; font-size: 16px; background-color: blue; color: white; padding: 5px 0;">' . $value . '</p>';
    }
}

$row = $data['Banner'];
?>

<form action="<?= BASE_URL ?>/adminbanner/aupdate/<?= $row['id'] ?>" method="POST" enctype="multipart/form-data">
    <div class="mb-3 mt-3">
        <label for="image" class="form-label">Image
        </label> <br>
        <img src="<?= BASE_URL ?>upload/<?= $row['image'] ?>" alt=""><br>
        <label for="image" class="btn btn-info mt-2">Browser Image
            <input onchange="displayImageName(this)" type="file" class="form-control" style="display: none;" id="image" placeholder="Price product" name="image">
        </label>
        <small class="file_info text-muted"></small>
    </div>
    <div class="mb-3 mt-3">
        <label for="categories">Categories</label>
        <br>
        <select style="width: 100%; padding: 10px 0 10px 10px; outline: none;" class="form-select form-select-lg" name="categories" id="categories">
            <?php while ($rows = mysqli_fetch_array($data['Categories'])) { ?>
                <option <?php if ($rows['id'] == $row['categories_id']) {
                            echo 'selected';
                        } ?> value="<?php echo $rows['id'] ?>">
                    <?php echo $rows['name'] ?>
                </option>
            <?php } ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

<script>
    function displayImageName(input) {
        var fileName = input.files[0].name;
        console.log(fileName); // In tên tệp tin trong console

        // Hoặc bạn có thể gán tên tệp tin vào một phần tử HTML khác
        var fileNameElement = document.querySelector('.file_info');
        fileNameElement.innerHTML = "Selected file: " + fileName;
    }
</script>