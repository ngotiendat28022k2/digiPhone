<?php
if (!empty($_GET['msg'])) {
    $msg = unserialize(urldecode($_GET['msg']));
    foreach ($msg as $key => $value) {
        echo '<p style="text-align: center; font-size: 16px; background-color: blue; color: white; padding: 5px 0;">' . $value . '</p>';
    }
}
$row = $data['product']->fetch_assoc();

$color = '';
$others = json_decode($row['others'], true);
$capacityarr = json_decode($row['capacity'], true);
$colorarr = json_decode($row['color'], true);

$Product_id = $row['id'];

// print_r($data['comments']);

?>


<div class="main">
    <div class="content">
        <div class="section group">
            <div class="cont-desc span_1_of_2">

                <form action="<?= BASE_URL ?>carts/addtocart" method="POST" enctype="" style="background-color: #fff; border: none;">
                    <input type="hidden" value="<?php echo $row['id'] ?>" name="product_id">
                    <input type="hidden" value="<?php echo $row['name'] ?>" name="name">
                    <input type="hidden" value="<?php echo $row['image'] ?>" name="image">
                    <input type="hidden" value="<?php echo $row['price'] - $row['sale'] ?>" name="price">

                    <div class="grid images_3_of_2">
                        <img src="<?= BASE_URL ?>/upload/<?php echo $row['image'] ?>" alt="" style="height: auto;" />
                        <img src="<?php echo $row['image'] ?>" alt="" style="display: none;" name='image' />
                    </div>
                    <div class="desc span_3_of_2">
                        <h2 name="name"><?php echo $row['name'] ?></h2>
                        <div class="price">
                            <p>Price: <span name="price"><?php echo number_format($row['price'] - $row['sale'], 0, ',', '.') . ' VND' ?></span></p>
                            <p style="display: flex; justify-content: flex-start;align-items: center; text-transform: capitalize;">Màu sắc:
                                <?php
                                foreach ($colorarr as $key => $value) { ?>
                                    <input type="radio" name="color" style="margin-left: 10px;" value="<?= $value ?>"><?= $value ?>
                                <?php } ?>

                            </p>
                            <p name="capacity" style="display: flex; justify-content: flex-start;align-items: center; text-transform: capitalize;">Dung lượng:
                                <?php
                                foreach ($capacityarr as $key => $value) { ?>
                                    <input type="radio" name="capacity" style="margin-left: 10px;" value="<?= $value ?>" /><?= $value ?>
                                <?php } ?>
                            </p>
                        </div>
                        <div class="add-cart" style="display: flex; align-items: center;">
                            <input type="number" class="buyfield" name="quantily" value="1" />
                            <input style="margin-left: 20px;" type="submit" class="buysubmit" value="Buy Now" />
                        </div>
                </form>
            </div>
            <div class="product-desc">
                <h2>Miêu Tả Sản Phẩm</h2>
                <p><?php echo $row['description'] ?></p>
            </div>

        </div>
        <div class="rightsidebar span_3_of_1">
            <div>
                <h2>Danh Mục</h2>
                <ul>
                    <?php while ($row = mysqli_fetch_array($data['categories'])) { ?>
                        <li><a href="<?= BASE_URL ?>/productbycategories/ListData/<?= $row['id'] ?>"><?php echo $row['name'] ?></a></li>
                    <?php } ?>
                </ul>
            </div>
            <?php if (isset($others['k'])) { ?>
                <div>
                    <h2>Thông Số Kỹ Thuật</h2>
                    <table class="table table-bordered">
                        <tbody>
                            <?php
                            if (isset($others['k'])) {
                                foreach ($others['k'] as $index => $kValue) : ?>
                                    <tr>
                                        <td><?php echo $kValue; ?></td>
                                        <td><?php echo $others['v'][$index]; ?></td>
                                    </tr>

                            <?php endforeach;
                            } ?>
                        </tbody>
                    </table>

                </div>
            <?php } ?>

        </div>

    </div>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-5 col-md-6 col-12 pb-4">
                    <h1 style="color: #333;">Đánh Giá Sản Phẩm</h1>
                    <?php foreach ($data['comments'] as $key => $value) {
                    ?>
                        <div class="comment mt-4 text-justify float-left" style="width: 100%;">
                            <div style="display: flex; justify-content: space-between; align-items: flex-start;">
                                <div style="display: flex; justify-content: space-between; align-items: flex-start;">
                                    <img src="<?= BASE_URL ?>/upload/<?= $value['avatar'] ?>" alt="" class="rounded-circle" width="30" height="30">
                                    <h4 style="font-size: 16px; margin-left: 10px;"><?= $value['email'] ?></h4>
                                </div>
                                <span><?= $value['created_date'] ?></span>
                            </div>
                            <div style="margin-left: 40px; font-size: 16px;"><span style="margin-right: 4px;"><?= $value['rating'] ?></span><img style="max-width: 25px; width: 100%;" src="<?= BASE_URL ?>/upload/star.png" alt=""></div>
                            <p style="font-size: 15px; margin-top: 10px; text-transform: capitalize;"><?= $value['content'] ?></p>
                            <?php
                            if ($value['user_id'] == Session::get('user')['id']) {
                            ?>
                                <div style="text-align: right;">
                                    <a href="<?= BASE_URL ?>detailproduct/aremovecm/<?= $value['id'] ?>/<?= $value['product_id'] ?>" class="btn btn-danger" style="margin-bottom: 10px;">Remove</a>
                                </div>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>
                <?php
                if (Session::get('islogin')) {
                ?>
                    <div class="col-lg-4 col-md-5 col-sm-4 offset-md-1 offset-sm-1 col-12 mt-4">
                        <form action="<?= BASE_URL ?>detailproduct/aaddcm/" method="POST">
                            <input type="hidden" value="<?= $Product_id ?>" name="product_id">
                            <div class="form-group">
                                <h4>Viết Đánh Giá</h4>
                                <label for="message">Lời Nhắn</label>
                                <textarea name="content" id="" msg cols="30" rows="5" class="form-control" style="background-color: black; color: #fff;" required></textarea>
                            </div>
                            <div class="">
                                <label for="rating">Rating</label>
                                <div style="color: #fff;">
                                    <input type="number" name="rating" min="1" max="5" step="0.5" value="5" required>
                                </div>
                            </div>
                            <div style="text-align: center; margin-top: 20px;">
                                <button type="submit" class="btn btn-info" style="width: 100%;">Gửi</button>
                            </div>
                        </form>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
</div>
</div>