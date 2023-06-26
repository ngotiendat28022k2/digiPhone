<div class="main">
    <div class="content">
        <?php foreach ($data['categoryByProduct'] as $categoryID => $category) {
            $categoryName = $category['name'];
            $categoryId = $category['id'];
            $products = $category['products'];
        ?>
            <div>
                <div class="content_top">
                    <div class="heading">
                        <h3><?php echo $categoryName; ?></h3>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="products">
                    <div class="section group">
                        <?php foreach ($products as $product) {
                            $productName = $product['name'];
                        ?>
                            <div class="grid_1_of_4 images_1_of_4">
                                <a href="<?= BASE_URL ?>detailproduct/showdata/<?= $product['id'] ?>"><img src="<?= BASE_URL ?>/upload/<?php echo $product['image'] ?>" alt="" /></a>
                                <h2><?php echo $productName; ?></h2>
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
                        <?php } ?>
                    </div>
                </div>
                <div style="text-align: center; margin: 20px 0;">
                    <button style="padding: 10px 50px;font-size: 15px;"><a href="<?= BASE_URL ?>productbycategories/ListData/<?= $categoryId ?>">More</a></button>
                </div>
            </div>
        <?php } ?>
    </div>
</div>