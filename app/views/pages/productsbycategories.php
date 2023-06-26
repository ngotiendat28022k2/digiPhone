<?php

$row = $data['ProductByCategories'];


// echo '<pre>';
// print_r($row);
// echo '</pre>';
?>

<div class="main">
    <div class="content">
        <div>
            <div class="content_top">
                <div class="heading">
                    <h3><?= $row['category_name'] ?></h3>
                </div>
                <div class="clear"></div>
            </div>
            <div style="margin-bottom: 10px; text-align: center; max-width: 80%; margin: auto;">
                <img src="<?= BASE_URL ?>/upload/<?= $row['category_image'] ?>" alt="" style="width: 100%;">
            </div>
            <div class="section group mt-4">
                <?php
                foreach ($row['products'] as $product) {
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
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>