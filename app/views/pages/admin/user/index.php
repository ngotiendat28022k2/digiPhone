<h1 style="font-size: 21px; margin-top: 10px;text-transform: capitalize;">List Oder</h1>
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

<div style="display: flex; justify-content: flex-start; align-items: flex-start;">
    <form action="" style="display: flex; justify-content: flex-start; align-items: flex-start;">
        <select style="width: 200px; padding: 6px 0 6px 10px; outline: none;" class="form-select form-select-lg" name="role" id="role">
            <?php foreach ($dataRole as $index => $value) { ?>
                <option <?php if ($index == $data['Role']) {
                            echo 'selected';
                        } ?> value="<?= $index ?>">
                    <?php echo $value ?>
                </option>
            <?php } ?>
        </select>
        <input class="btn btn-success ml-2" type="submit" value="Find">
    </form>
    <a href="<?= BASE_URL ?>adminuser" class="btn btn-info ml-4">Clear</a>
</div>
<table class="table" style="margin-top: 10px;">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Avatar</th>
            <th scope="col">Role</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = mysqli_fetch_array($data['User'])) { ?>
            <form method="POST" action="<?= BASE_URL ?>adminuser/aupdate/<?= $row['id'] ?>">
                <tr>
                    <th scope="row"><?php echo $row['id'] ?></th>
                    <td><?php echo $row['name'] ?></td>
                    <td><?php echo $row['email'] ?></td>
                    <td><img style="width: 100%; max-width: 100px;" src="<?= BASE_URL ?>/upload/<?php echo $row['avatar'] ?>" alt=""></td>
                    <td>
                        <select style="width: 200px; padding: 10px 0 10px 10px; outline: none;" class="form-select form-select-lg" name="role" id="role">
                            <?php foreach ($dataRole as $index => $value) { ?>
                                <option <?php if ($index == $row['role']) {
                                            echo 'selected';
                                        } ?> value="<?= $index ?>">
                                    <?php echo $value ?>
                                </option>
                            <?php } ?>
                        </select>
                    </td>
                    <td>
                        <input type="submit" value="Update" class="btn btn-success">
                        <a class="btn btn-danger" style="margin: 5px 5px;" href="<?= BASE_URL ?>adminuser/aremove/<?= $row['id'] ?>">Remove</a>
                    </td>
                </tr>
            </form>
        <?php } ?>
    </tbody>
</table>

<script>
    function displayImageName(input) {
        var fileName = input.files[0].name;
        console.log(fileName); // In tên tệp tin trong console

        // Hoặc bạn có thể gán tên tệp tin vào một phần tử HTML khác
        var fileNameElement = document.querySelector('.file_info');
        fileNameElement.innerHTML = "Selected file: " + fileName;
    }
</script>