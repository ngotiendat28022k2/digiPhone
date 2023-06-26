<h1 style="font-size: 21px; margin-top: 10px;text-transform: capitalize;">Update Product</h1>
<?php
if (!empty($_GET['msg'])) {
    $msg = unserialize(urldecode($_GET['msg']));
    foreach ($msg as $key => $value) {
        echo '<p style="text-align: center; font-size: 16px; background-color: blue; color: white; padding: 5px 0;">' . $value . '</p>';
    }
}
?>
<?php
$row = $data['Product']->fetch_assoc();
// echo '<pre>';
// print_r($row);
// echo '</pre>';

$capacity = '';
$color = '';
$others = json_decode($row['others'], true);
$capacityarr = json_decode($row['capacity'], true);
$colorarr = json_decode($row['color'], true);
if (isset($capacityarr) && isset($color)) {
    $capacity = implode(', ', $capacityarr);
    $color = implode(', ', $colorarr);
}

?>
<form action="<?= BASE_URL ?>/adminproduct/aupdate/<?= $row['id'] ?>" method="POST" enctype="multipart/form-data">
    <div class="mb-3 mt-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" value="<?= $row['name'] ?>" id="name" placeholder="Name product" name="name" required>
    </div>
    <div class="mb-3 mt-3">
        <label for="price" class="form-label">Price</label>
        <input type="text" class="form-control" value="<?= $row['price'] ?>" id="price" placeholder="Price product" name="price" required>
    </div>
    <div class="mb-3 mt-3">
        <label for="sale" class="form-label">Sale</label>
        <input type="text" class="form-control" value="<?= $row['sale'] ?>" id="sale" placeholder="Sale product" name="sale" required>
    </div>
    <div class="mb-3 mt-3">
        <label for="quantily" class="form-label">Quantily</label>
        <input type="text" class="form-control" value="<?= $row['quantily'] ?>" id="quantily" placeholder="Quantily product" name="quantily" required>
    </div>
    <div class="mb-3 mt-3">
        <label for="image" class="form-label">Image
        </label> <br>
        <img src="<?= BASE_URL ?>/upload/<?= $row['image'] ?>" alt="" style="max-width: 150px; width: 100%;"> <br>
        <label for="image" class="btn btn-info">Browser Image
            <input onchange="displayImageName(this)" type="file" class="form-control" style="display: none;" id="image" placeholder="Price product" name="image">
        </label>
        <small class="file_info text-muted"></small>
    </div>
    <div class="mb-3 mt-3">
        <label for="description" class="form-label">Description</label><br>
        <textarea name="description" id="description" cols="120" rows="10" required><?= $row['description'] ?></textarea>
    </div>
    <div class="mb-3 mt-3">
        <label for="capacity" class="form-label">Capacity</label>
        <input type="text" class="form-control" value="<?= $capacity ?>" id="capacity" placeholder="Capacity product" name="capacity" required>
    </div>
    <div class="mb-3 mt-3">
        <label for="color" class="form-label">Color</label>
        <input type="text" class="form-control" value="<?= $color ?>" id="color" placeholder="Color product" name="color" required>
    </div>
    <div class="mb-3 mt-3">
        <label for="price" class="form-label">Others</label>
        <table class="table table-bordered" id="table-other">
            <tr>
                <th>KEY</th>
                <th>VALUE</th>
                <th>ACTION</th>
            </tr>
            <tr>
                <td><input type="text" name="k[]" class="form-control"></td>
                <td><input type="text" name="v[]" class="form-control"></td>
                <td><input type="text" id="aadd" class="btn btn-warning" style="max-width: 100px;color: #fff; font-weight: 600; cursor: pointer; outline: none;" value="Add"></td>
            </tr>
            <?php
            if (isset($others['k'])) {
                foreach ($others['k'] as $index => $kValue) : ?>
                    <tr>
                        <td><input type="text" name="k[]" class="form-control" value="<?php echo $kValue; ?>"></td>
                        <td><input type="text" name="v[]" class="form-control" value="<?php echo $others['v'][$index]; ?>"></td>
                        <td><input type="button" class="btn btn-danger" id="aremove" value="Remove"></td>
                    </tr>

            <?php endforeach;
            } ?>
        </table>
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

    // dynamic form
    function dynamicForm() {
        const tableOther = document.querySelector('#table-other');
        const inputOtherHTML = `<tr>
    <td><input type="text" name="k[]" class="form-control"></td>
    <td><input type="text" name="v[]" class="form-control"></td>
    <td><input type="text" id="aremove" class="btn btn-danger" style="max-width: 100px;color: #fff; font-weight: 600; cursor: pointer; outline: none;" value="Remove"></td>
    </tr>`;
        document.querySelector('#aadd').addEventListener('click', function() {
            const tempTR = document.createElement('tr');
            tempTR.innerHTML = inputOtherHTML;
            tableOther.appendChild(tempTR);
        });
        tableOther.addEventListener('click', function(event) {
            if (event.target.id === 'aremove') {
                event.target.closest('tr').remove();
            }
        });
    }
    dynamicForm()
</script>