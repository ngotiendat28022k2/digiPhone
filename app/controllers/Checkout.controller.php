<?php

class Checkout extends Controller
{
    function index()
    {
        $this->ListData();
    }

    function ListData()
    {
        Session::init();
        $CartModel = $this->CModel("Cart");
        $user_id = Session::get('user')['id'];

        $this->CView(
            'client',
            [
                'Header' => 'header',
                'Page' => 'checkout',
                'Footer' => 'footer',
                'Cart' => $CartModel->findData($user_id),
            ]
        );
    }
    function successpayment()
    {
        if (isset($_GET['vnp_Amount'])) {
            $data = array(
                "vnp_amount" => $_GET['vnp_Amount'],
                "vnp_BankCode" => $_GET['vnp_BankCode'],
                "vnp_BankTranNo" => $_GET['vnp_BankTranNo'],
                "vnp_CardType" => $_GET['vnp_CardType'],
                "vnp_OrderInfo" => $_GET['vnp_OrderInfo'],
                "vnp_PayDate" => $_GET['vnp_PayDate'],
                "vnp_TmnCode" => $_GET['vnp_TmnCode'],
                "vnp_TransactionNo" => $_GET['vnp_TransactionNo'],
                "vnp_TxnRef" => $_GET['vnp_TxnRef'],
            );
        }

        $this->CView(
            'client',
            [
                'Header' => 'header',
                'Page' => 'thanks',
                'Footer' => 'footer',
            ]
        );
    }
}
