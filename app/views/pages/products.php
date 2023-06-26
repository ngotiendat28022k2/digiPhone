<div class="main">
    <div class="content">
        <?php
        foreach ($data['productNew'] as $categoryID => $category) {
            $categoryName = $category['name'];
            $products = $category['products'];
            $categoryId = $category['id'];
        ?>
            <div>
                <div class="content_top">
                    <div class="heading" style="display: flex; align-items: center ;">
                        <h3 style="margin-right: 10px;"><?php echo $categoryName; ?>
                        </h3>
                        <iframe src="https://giphy.com/embed/8bYnXt7v4sVfQuc8G2" width="50" height="50" frameBorder="0" class="giphy-embed" allowFullScreen style="border-radius: 50%;"></iframe>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="products">
                    <div class="section group">
                        <?php
                        if ($products) {
                            foreach ($products as $product) {
                                $productName = $product['name'];
                        ?>
                                <div class="grid_1_of_4 images_1_of_4" style="position: relative;">
                                    <a href="detailproduct/showdata/<?= $product['id'] ?>">
                                        <img src="<?= BASE_URL ?>/upload/<?php echo $product['image'] ?>" alt="" />
                                    </a>
                                    <h2><?php echo $productName; ?></h2>
                                    <p><?php echo mb_substr($product['description'], 0, 60, 'UTF-8') ?>...</p>
                                    <p><span class="price"><?php echo number_format($product['price'] - $product['sale'], 0, ',', '.') . ' VND' ?></span></p>
                                    <p><span class="" style="text-decoration: line-through;"><?php echo number_format($product['price'], 0, ',', '.') . ' VND' ?></span></p>
                                    <div class="button"><span><a href="detailproduct/showdata/<?= $product['id'] ?>" class="details">Details</a></span></div>
                                    <div style="position: absolute; top: -3px; left: 0;">
                                        <iframe src="https://giphy.com/embed/FNqoTH4S3ZBheBVYlN" width="70" height="50" frameBorder="0" style=""></iframe>
                                    </div>
                                    <div style="position: absolute; top: -3px; right: 0;">

                                    </div>
                                </div>
                                <!-- Các sản phẩm khác trong danh mục -->
                            <?php }
                        } else {
                            ?>
                            <div style="text-align: center; margin: 20px 0;">Không có sản phẩm</div>
                        <?php
                        } ?>
                    </div>
                </div>
                <?php
                if ($products) {
                ?>
                    <div style="text-align: center; margin: 20px 0;">
                        <button style="padding: 10px 50px;font-size: 15px;"><a href="/digiphone/productbycategories/ListData/<?= $categoryId ?>">More</a></button>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>
    </div>
</div>