<?php
$products = mysqli_fetch_all($data['Product'], MYSQLI_ASSOC);
$oders = mysqli_fetch_all($data['Oder'], MYSQLI_ASSOC);
$users = mysqli_fetch_all($data['User'], MYSQLI_ASSOC);

$productsLength = count($products);
$odersLength = count($oders);
$usersLength = count($users);
?>

<main style="margin-top: 30px;">
    <div style="margin: 30px 0; display: flex; justify-content: flex-start; align-items: flex-start;">
        <a href="<?= BASE_URL ?>adminproduct" style="max-width: 250px; width: 100%;">
            <div style="margin: 0 20px; border: 1px solid #4B50B4; text-align: center; padding: 20px 0; border-radius: 10px; background-color: #4B50B4; color: #fff;">
                <h2 style="font-size: 23px;">Sản Phẩm</h2>
                <span style="font-size: 21px;"><?= $productsLength ?></span>
            </div>
        </a>
        <a href="<?= BASE_URL ?>adminoder/?status=0" style="max-width: 250px; width: 100%;">
            <div style="margin: 0 20px; border: 1px solid #4B50B4; text-align: center; padding: 20px 0; border-radius: 10px; background-color: #4B50B4; color: #fff;">
                <h2 style="font-size: 23px;">Đơn Chưa Xử Lý</h2>
                <span style="font-size: 21px;"><?= $odersLength ?></span>
            </div>
        </a>
        <a href="<?= BASE_URL ?>adminuser" style="max-width: 250px; width: 100%;">
            <div style="margin: 0 20px; border: 1px solid #4B50B4; text-align: center; padding: 20px 0; border-radius: 10px; background-color: #4B50B4; color: #fff;">
                <h2 style="font-size: 23px;">Số Lượng User Client</h2>
                <span style="font-size: 21px;"><?= $usersLength ?></span>
            </div>
        </a>


    </div>
    <div>
        <h2 style="font-size: 21px;">Thống Kê Đơn Hàng:</h2>
        <div id="myfirstchart" style="height: 250px;"></div>
    </div>
</main>