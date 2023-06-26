<?php

class Oder extends DB
{
    public function aadd($data)
    {
        $status = $data['status'];
        $payment_method = $data['payment_method'];
        $user_name = $data['user_name'];
        $vnp_txnref = $data['vnp_txnref'];
        $user_numberphone = $data['user_numberphone'];
        $user_address = $data['user_address'];
        $user_id = $data['user_id'];
        $totalmonney = $data['totalmonney'];

        $qr = "INSERT INTO oder (status, payment_method, user_name, vnp_txnref, user_numberphone, user_address, user_id,totalmonney)
                VALUES ('$status', '$payment_method', '$user_name', '$vnp_txnref', '$user_numberphone', '$user_address', '$user_id', '$totalmonney')";
        $result = mysqli_query($this->conn, $qr);

        return $result ? true : false;
    }
    public function aget($vnp_txnref)
    {
        $qr = "SELECT * FROM oder WHERE vnp_txnref = '$vnp_txnref'";
        $result = mysqli_query($this->conn, $qr);

        if ($result) {
            // Fetch data
            $data = mysqli_fetch_assoc($result);
            mysqli_free_result($result); // Giải phóng bộ nhớ sau khi fetch dữ liệu
            return $data;
        }

        return null;
    }

    public function oder_detail_aadd($data)
    {
        $product_id = $data['product_id'];
        $quantily = $data['quantily'];
        $oder_id = $data['oder_id'];

        $qr = "INSERT INTO oder_detail (product_id	, quantily, oder_id)
                VALUES ('$product_id', '$quantily', '$oder_id')";
        $result = mysqli_query($this->conn, $qr);

        return $result ? true : false;
    }

    public function findData($status = null)
    {
        $qr = "SELECT * FROM `oder`";

        if ($status !== null) {
            $qr .= " WHERE `status` = '$status'";
        }

        $qr .= " ORDER BY `created_date` DESC";

        return mysqli_query($this->conn, $qr);
    }

    public function oder_detail_find($oder_id)
    {
        $query = "SELECT od.*, p.name, p.price, p.image
              FROM oder_detail od
              JOIN oder o ON od.oder_id = o.id
              JOIN product p ON od.product_id = p.id
              WHERE o.id = '$oder_id'";

        $result = mysqli_query($this->conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $data = array();

            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }

            mysqli_free_result($result);
            return $data;
        }

        return null;
    }
    public  function aupdate($id, $status)
    {
        $query = "UPDATE `oder`
        SET `status` = '$status'
        WHERE `id` = '$id'";

        $result = mysqli_query($this->conn, $query);

        if ($result) {
            return true;  // Cập nhật thành công
        } else {
            return false; // Cập nhật không thành công
        }
    }

    // public function my_oder_detail($oder_id)
    // {
    //     $query = "SELECT od.*, p.name, p.price, p.image
    //           FROM oder_detail od
    //           JOIN oder o ON od.oder_id = o.id
    //           JOIN product p ON od.product_id = p.id
    //           WHERE o.id = '$oder_id'";

    //     $result = mysqli_query($this->conn, $query);

    //     if ($result && mysqli_num_rows($result) > 0) {
    //         $data = array();

    //         while ($row = mysqli_fetch_assoc($result)) {
    //             $data[] = $row;
    //         }

    //         mysqli_free_result($result);
    //         return $data;
    //     }

    //     return null;
    // }

    public function my_oder($user_id)
    {
        $qr = "SELECT * FROM `oder`  WHERE `user_id` = '$user_id' ORDER BY `created_date` DESC";

        $result = mysqli_query($this->conn, $qr);
        if ($result) {
            $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
            return $rows;
        } else {
            return null;
        }
    }
}
