<h1 style="font-size: 21px; margin-top: 10px;text-transform: capitalize;">Add category</h1>
<?php
if (!empty($_GET['msg'])) {
    $msg = unserialize(urldecode($_GET['msg']));
    foreach ($msg as $key => $value) {
        echo '<p style="text-align: center; font-size: 16px; background-color: blue; color: white; padding: 5px 0;">' . $value . '</p>';
    }
}
$dataRole = array(
    "Clent",
    "Admin",
)
?>

<form action="<?= BASE_URL ?>/adminuser/aadd" method="POST" enctype="multipart/form-data">
    <div class="mb-3 mt-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" placeholder="Name" name="name" required>
    </div>
    <div class="mb-3 mt-3">
        <label for="name" class="form-label">Email</label>
        <input type="text" class="form-control" id="email" placeholder="Email" name="email" required>
    </div>
    <div class="mb-3 mt-3">
        <label for="name" class="form-label">Password</label>
        <input type="text" class="form-control" id="password" placeholder="******" name="password" required>
    </div>

    <div class="mb-3 mt-3">
        <label for="avatar" class="form-label">Avatar
        </label> <br>
        <label for="avatar" class="btn btn-info">Browser Image
            <input onchange="displayImageName(this)" type="file" class="form-control" style="display: none;" id="avatar" placeholder="Price product" name="avatar">
        </label>
        <small class="file_info text-muted"></small>
    </div>
    <div class="mb-3 mt-3">
        <label for="categories">Role</label>
        <br>
        <select style="width: 200px; padding: 10px 0 10px 10px; outline: none;" class="form-select form-select-lg" name="role" id="role">
            <?php foreach ($dataRole as $index => $value) { ?>
                <option value="<?= $index ?>">
                    <?php echo $value ?>
                </option>
            <?php } ?>
        </select>
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