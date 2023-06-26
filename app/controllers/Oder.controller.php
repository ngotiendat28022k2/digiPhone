<?php

class Oder extends Controller
{
    function index()
    {
        $this->ListData();
    }

    function ListData()
    {
        Session::init();
        $CartModel = $this->CModel("Cart");
        $user_id = '';
        if (isset(Session::get('user')['id'])) {
            $user_id = Session::get('user')['id'];
        }

        $this->CView(
            'client',
            [
                'Header' => 'header',
                'Page' => 'cart',
                'Footer' => 'footer',
                'Cart' => $CartModel->findData($user_id),
            ]
        );
    }
}
