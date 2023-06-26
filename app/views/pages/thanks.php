<?php
// print_r(Session::get('user')['id']);
?>
<div style="background-color: #217DE2; padding: 150px 0; text-align: center; color: #fff;">
    <h3 style="font-weight: 600; text-transform: capitalize; font-size: 21px;">Đơn hàng của bạn đã được đặt thành công</h3>
    <span style="font-weight: 400; text-transform: capitalize; font-size: 14px;">Vui lòng đợi admin xác nhận nhé</span>

    <div style="margin-top: 30px;">
        <a href="<?= BASE_URL ?>account/oder/<?= Session::get('user')['id'] ?>" class="btn btn-success">Đơn hàng</a>
        <a href="<?= BASE_URL ?>home" class="btn btn-info" style="margin-left: 20px; color: #333;">Home</a>
    </div>
</div>