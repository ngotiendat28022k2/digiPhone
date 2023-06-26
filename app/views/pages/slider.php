<div class="header_bottom" style="display: flex; justify-content: space-between; align-items: flex-center;">

    <div class="header_bottom_left">
        <div class="section group">
            <div style="width: 100%; display: flex; justify-content: space-around;align-items: flex-start;flex-wrap: wrap;">
                <?php while ($row = mysqli_fetch_array($data['productSale'])) { ?>
                    <div class="images_1_of_2" style="box-shadow: 0px 0px 3px rgb(150, 150, 150); margin-top: 15px; background-color: #fff; position: relative;">
                        <div class="listimg listimg_2_of_1">
                            <a href="detailproduct/showdata/<?= $row['id'] ?>"> <img src="<?= BASE_URL ?>/upload/<?php echo $row['image'] ?>" alt="" /></a>
                        </div>
                        <div class="text list_2_of_1">
                            <h2><?php echo mb_substr($row['name'], 0, 9, 'UTF-8') ?>...</h2>
                            <p><?php echo mb_substr($row['description'], 0, 40, 'UTF-8') ?>...</p>
                            <div class="button"><span><a href="<?= BASE_URL ?>detailproduct/showdata/<?= $row['id'] ?>" class="details">Buy Now</a></span></div>
                        </div>

                        <!-- <div>
                            <div class="sale" style="
                            position: absolute;
                            right: 0;
                            top: 0;
                            z-index: 99;
                            overflow: hidden;
                            width: 75px;
                            height: 20px;
                            text-align: left;
                            background-color: #D2461E;
                            ">
                                <span style="
                                    font-size: 12px;
                                    font-weight: bold;
                                    color: #fff;
                                    text-transform: uppercase;
                                    text-align: center;
                                    display: block;
                                    line-height: 20px;
                                    ">

                                    Sale <?= round((($row['price'] - $row['sale']) / $row['price']) * 100, 0) ?>%

                                </span>
                            </div>

                        </div> -->
                    </div>
                <?php } ?>
            </div>
        </div>

        <div class="clear"></div>
    </div>
    <div class="header_bottom_right_images">
        <!-- FlexSlider -->
        <section class="slider">
            <div class="flexslider">
                <ul class="slides">
                    <?php while ($row = mysqli_fetch_array($data['banner'])) {
                    ?>
                        <li><a href=" <?= BASE_URL ?>productbycategories/ListData/<?= $row['categories_id'] ?>"><img style="width: 100%; height: 350px;" src="<?= BASE_URL ?>upload/<?php echo $row['image']; ?>" alt="" /></a></li>
                    <?php } ?>
                </ul>
            </div>
        </section>
        <!-- FlexSlider -->
    </div>
    <div class="clear"></div>
</div>