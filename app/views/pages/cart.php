<?php
if (!empty($_GET['msg'])) {
    $msg = unserialize(urldecode($_GET['msg']));
    foreach ($msg as $key => $value) {
        echo '<p style="text-align: center; font-size: 16px; background-color: blue; color: white; padding: 5px 0;">' . $value . '</p>';
    }
}
$total = 0;

// print_r($data['Cart']->num_rows);
?>
<div class="main">
    <div class="content">
        <div class="cartoption">
            <div class="cartpage">
                <h2>Your Cart</h2>
                <table class="tblone">
                    <thead>
                        <tr>
                            <th width="20%">Product Name</th>
                            <th width="10%">Image</th>
                            <th width="15%">Price</th>
                            <th width="25%">Quantity</th>
                            <th width="20%">Total Price</th>
                            <th width="10%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_array($data['Cart'])) { ?>
                            <tr>
                                <td>
                                    <span style="text-transform: capitalize; font-size: 16px; font-weight: 600;"><?= $row['name'] ?></span>
                                    <p style="margin-top: 20px;text-transform: capitalize; font-size: 14px;color:#333">color:<?= $row['color'] ?> - capacity<?= $row['capacity'] ?></p>
                                </td>
                                <td><img style="width: 100%; height: auto;" src="<?= BASE_URL ?>/upload/<?= $row['image'] ?>" alt="" /></td>
                                <td style="color: red; font-weight: 700;"><?= number_format($row['price'], 0, ',', '.') ?></td>
                                <td>
                                    <form action="<?= BASE_URL ?>carts/update/<?= $row['id'] ?>" method="POST">
                                        <input type="hidden" value="<?= $row['name'] ?>" name="name">
                                        <input type="hidden" value="<?= $row['image'] ?>" name="image">
                                        <input type="hidden" value="<?= $row['price'] ?>" name="price">
                                        <input type="hidden" value="<?= $row['color'] ?>" name="color">
                                        <input type="hidden" value="<?= $row['capacity'] ?>" name="capacity">

                                        <input type="number" name="quantily" value="<?= $row['quantily'] ?>" />
                                        <input type="submit" name="submit" value="Update" />
                                    </form>
                                </td>
                                <td style="color: red; font-weight: 700;"><?php
                                                                            $subtotal = $row['price'] * $row['quantily'];
                                                                            $total += $subtotal;
                                                                            echo  number_format($subtotal, 0, ',', '.') ?></td>
                                <td><a href="<?= BASE_URL ?>carts/remove/<?= $row['id'] ?>">X</a></td>
                            </tr>
                        <?php } ?>
                    </tbody>


                </table>
                <table style="float:right;text-align:left; margin-top: 20px;" width="30%;">
                    <tr>
                        <th>Tổng Tiền Thanh Toán : </th>
                        <td style="color: red; font-weight: 700;"><?= number_format($total, 0, ',', '.') . ' VNĐ' ?></td>
                    </tr>
                </table>
            </div>
            <div class="shopping">
                <div class="shopleft">
                    <a href="<?= BASE_URL ?>home"> <img src="<?= BASE_URL ?>/upload/shop.png" alt="" /></a>
                </div>
                <div class="shopright">
                    <?php
                    if (isset(Session::get('user')['id']) && $data['Cart']->num_rows > 0) {
                    ?>
                        <a href="<?= BASE_URL ?>checkout/"> <img src="<?= BASE_URL ?>/upload/check.png" alt="" /></a>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>