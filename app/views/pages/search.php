<?php

$products = $data['valueSearch'];

// print_r($products);
?>

<div style="text-align: center;">
    <h2>Từ Khóa Bạn Tìm Kiếm: '<?php echo $_GET['search'] ?>'</h2>
</div>
<div class="products">
    <div class="section group">
        <?php
        if (isset($products) && $products !== []) {
            foreach ($products as $product) {
        ?>
                <div class="grid_1_of_4 images_1_of_4">
                    <a href="<?= BASE_URL ?>detailproduct/showdata/<?= $product['id'] ?>"><img src="<?= BASE_URL ?>/upload/<?php echo $product['image'] ?>" alt="" /></a>
                    <h2><?php echo $product['name']; ?></h2>
                    <p><?php echo mb_substr($product['description'], 0, 60, 'UTF-8') ?>...</p>
                    <?php if ($product['sale'] != 0) :
                    ?>
                        <p><span class="price"><?php echo number_format($product['price'] - $product['sale'], 0, ',', '.') . ' VND'; ?></span></p>
                        <p><span class="" style="text-decoration: line-through;"><?php echo number_format($product['price'], 0, ',', '.') . ' VND'; ?></span></p>
                    <?php else : ?>
                        <p><span class="price"><?php echo number_format($product['price'], 0, ',', '.') . ' VND'; ?></span></p>
                    <?php endif; ?>

                    <div class="button"><span><a href="<?= BASE_URL ?>detailproduct/showdata/<?= $product['id'] ?>" class="details">Details</a></span></div>
                </div>
                <!-- Các sản phẩm khác trong danh mục -->
            <?php }
        } else {
            ?>
            <div style="background-color: #333; color: #fff; padding: 200px 0; text-align: center;">
                <h2>Không Tìm Thấy Sản Phẩm</h2>
            </div>
        <?php
        } ?>
    </div>
</div>