<?php

class Payment extends Controller
{
    function index()
    {
        $this->checkPayment();
    }

    function checkPayment()
    {
        Session::init();
        $payment_methods = $_POST['payment_methods'];
        $this->$payment_methods();
    }


    function COD()
    {
        $oderModel = $this->CModel('Oder');
        $CartModel = $this->CModel("Cart");
        $user_id = Session::get('user')['id'];
        $vnp_txnref = rand(0, 9999);
        $data = array(
            "status" => 0,
            "payment_method" => $_POST['payment_methods'],
            "vnp_txnref" => $vnp_txnref,
            "user_name" => $_POST['user_name'],
            "user_numberphone" => $_POST['user_numberphone'],
            "user_address" => $_POST['user_address'],
            "user_id" => $user_id,
            "totalmonney" => $_POST['total'],
        );
        $oderModel->aadd($data);
        $oder = $oderModel->aget($vnp_txnref);
        $carts = array();
        $result = $CartModel->findData($user_id);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $carts[] = $row;
            }

            mysqli_free_result($result);
        }
        foreach ($carts as $cart) {
            $data = array(
                "product_id" => $cart['product_id'],
                "quantily" => $cart['quantily'],
                "oder_id" => $oder['id'],
            );
            $result = $oderModel->oder_detail_aadd($data);
            if ($result) {
                $CartModel->removeDataByUser($user_id);
                header('Location:' . BASE_URL . 'checkout/successpayment');
            }
        }
    }
    function VNPAY()
    {
        require_once './app/core/config_vnpay.php';
        $user_id = Session::get('user')['id'];
        $oderModel = $this->CModel('Oder');
        $CartModel = $this->CModel("Cart");
        $oder_id = rand(1, 10000);
        $vnp_TxnRef = $oder_id; //Mã giao dịch thanh toán tham chiếu của merchant
        $vnp_Amount = $_POST['total']; // Số tiền thanh toán
        $vnp_Locale = 'vn'; //Ngôn ngữ chuyển hướng thanh toán
        $vnp_BankCode = 'NCB'; //Mã phương thức thanh toán
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR']; //IP Khách hàng thanh toán

        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount * 100,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => "Thanh toan GD:" . $vnp_TxnRef,
            "vnp_OrderType" => "other",
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
            "vnp_ExpireDate" => $expire
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }

        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }

        $data = array(
            "status" => 0,
            "payment_method" => $_POST['payment_methods'],
            "user_name" => $_POST['user_name'],
            "vnp_txnref" => $vnp_TxnRef,
            "user_numberphone" => $_POST['user_numberphone'],
            "user_address" => $_POST['user_address'],
            "user_id" => $user_id,
            "totalmonney" => $_POST['total'],
        );
        $oderModel->aadd($data);
        $oder = $oderModel->aget($oder_id);
        $carts = array();
        $result = $CartModel->findData($user_id);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $carts[] = $row;
            }

            mysqli_free_result($result);
        }
        foreach ($carts as $cart) {
            $data = array(
                "product_id" => $cart['product_id'],
                "quantily" => $cart['quantily'],
                "oder_id" => $oder['id'],
            );
            $result = $oderModel->oder_detail_aadd($data);
            if ($result) {
                $CartModel->removeDataByUser($user_id);
            }
        }

        header('Location: ' . $vnp_Url);
        die();
    }
}
