<h1 style="font-size: 21px; margin-top: 10px;text-transform: capitalize;">Add category</h1>
<?php
if (!empty($_GET['msg'])) {
    $msg = unserialize(urldecode($_GET['msg']));
    foreach ($msg as $key => $value) {
        echo '<p style="text-align: center; font-size: 16px; background-color: blue; color: white; padding: 5px 0;">' . $value . '</p>';
    }
}
?>

<form action="<?= BASE_URL ?>/admincategory/insertcategory" method="POST" enctype="multipart/form-data">
    <div class="mb-3 mt-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" placeholder="Name category" name="name">
    </div>
    <div class="mb-3 mt-3">
        <label for="image" class="form-label">Image
        </label> <br>
        <label for="image" class="btn btn-info">Browser Image
            <input onchange="displayImageName(this)" type="file" class="form-control" style="display: none;" id="image" name="image">
        </label>
        <small class="file_info text-muted"></small>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

<script>
    function displayImageName(input) {
        var fileName = input.files[0].name;
        var fileNameElement = document.querySelector('.file_info');
        fileNameElement.innerHTML = "Selected file: " + fileName;
    }
</script>