<?php
$total = 0;
$carts = mysqli_fetch_all($data['Cart'], MYSQLI_ASSOC);
$product_id = array();

foreach ($carts as $cart) {
    $product_id[] = $cart['product_id'];
};

?>
<main role="main">
    <div class="container mt-4">
        <form class="needs-validation" method="post" action="<?= BASE_URL ?>payment" style="background-color: #fff; border: none;">

            <div class="py-5 text-center">
                <i class="fa fa-credit-card fa-4x" aria-hidden="true"></i>
                <h2>Thanh toán</h2>
                <p class="lead">Vui lòng kiểm tra thông tin Khách hàng, thông tin Giỏ hàng trước khi Đặt hàng.</p>
            </div>

            <div class="row">
                <div class="col-md-4 order-md-2 mb-4">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted">Giỏ hàng</span>
                    </h4>
                    <ul class="list-group mb-3">
                        <?php
                        foreach ($carts as $row) {
                        ?>
                            <input type="hidden" name="<?= $row['id'] ?>" value="product_id">
                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                <div>
                                    <h6 class="my-0"><?= $row['name'] ?></h6>
                                    <small class="" style="color: red;"><?= number_format($row['price'], 0, ',', '.') ?></small> x
                                    <small class=""><?= $row['quantily'] ?></small>
                                </div>
                                <span class="" style="color: red;">
                                    <?php
                                    $subtotal = $row['price'] * $row['quantily'];
                                    echo number_format($subtotal, 0, ',', '.');
                                    $total += $subtotal;
                                    ?>
                                </span>
                            </li>
                        <?php
                        }
                        ?>

                        <input type="hidden" value="<?= $total ?>" name="total">

                        <li class="list-group-item d-flex justify-content-between">
                            <span>Tổng thành tiền</span>
                            <strong style="color: red; font-weight: 700; font-size: 18px;"><?= number_format($total, 0, ',', '.') . ' VNĐ' ?></strong>
                        </li>
                    </ul>

                </div>
                <div class="col-md-8 order-md-1">
                    <h4 class="mb-3" style="color: #333; text-transform: capitalize;">Thông tin khách hàng</h4>
                    <div class="row">
                        <div class="col-md-12">
                            <label style="color: #333; margin-top: 10px;" for="user_name">Họ tên: </label>
                            <input type="text" class="form-control" name="user_name">
                        </div>
                        <div class="col-md-12">
                            <label style="color: #333; margin-top: 10px;" for="user_numberphone">Số Điện Thoại: </label>
                            <input type="text" class="form-control" name="user_numberphone">
                        </div>
                        <div class="col-md-12">
                            <label style="color: #333; margin-top: 10px;" for="user_address">Địa Chỉ: </label>
                            <input type="text" class="form-control" name="user_address">
                        </div>

                    </div>

                    <h4 class="mb-3" style="color: #333; margin-top: 20px;">Thanh toán</h4>

                    <div class="d-block my-3">
                        <input type="submit" name="payment_methods" value="COD" class="btn btn-success" />
                        <input type="submit" name="payment_methods" value="VNPAY" class="btn btn-primary" />
                    </div>
                </div>
            </div>
        </form>

    </div>
    <!-- End block content -->
</main>