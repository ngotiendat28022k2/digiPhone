<?php

class Carts extends Controller
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

    function addtocart()
    {
        Session::init();
        $CartModel = $this->CModel("Cart");

        $product_id = $_POST['product_id'];
        $user_id = Session::get('user')['id'];

        $cartItem = $CartModel->getData($product_id, $user_id);
        $data = array(
            "name" => $_POST['name'],
            "price" => $_POST['price'],
            "capacity" =>  $_POST['capacity'],
            "color" => $_POST['color'],
            "image" =>  $_POST['image'],
            "quantily" => $_POST['quantily'] +  $cartItem['quantily'],
            "user_id" => $user_id,
            "product_id" => $product_id,
        );

        print_r($cartItem);
        if (isset($cartItem)) {
            $result = $CartModel->updateData($cartItem['product_id'], $cartItem['user_id'], $data);
        } else {
            $result = $CartModel->addData($data);
        }

        if ($result == 1) {
            $message['msg'] = "Add to cart success";
            header("Location:" . BASE_URL . "carts/add?msg=" . urlencode(serialize($message)));
        } else {
            $message['msg'] = "Add to cart false";
            header("Location:" . BASE_URL . "carts/add?msg=" . urlencode(serialize($message)));
        }
    }
    function update($id)
    {
        Session::init();
        $CartModel = $this->CModel("Cart");

        $user_id = Session::get('user')['id'];
        $cartItem = $CartModel->getOneData($id);
        $data = array(
            "name" => $_POST['name'],
            "price" => $_POST['price'],
            "capacity" =>  $_POST['capacity'],
            "color" => $_POST['color'],
            "image" =>  $_POST['image'],
            "quantily" => $_POST['quantily'],
            "user_id" => $user_id,
            "product_id" => $cartItem['product_id'],
        );

        $result = $CartModel->updateData($cartItem['product_id'], $cartItem['user_id'], $data);

        if ($result == 1) {
            $message['msg'] = "Add to cart success";
            header("Location:" . BASE_URL . "carts/add?msg=" . urlencode(serialize($message)));
        } else {
            $message['msg'] = "Add to cart false";
            header("Location:" . BASE_URL . "carts/add?msg=" . urlencode(serialize($message)));
        }
    }

    function remove($id)
    {
        $CartModel = $this->CModel("Cart");
        $result = $CartModel->removeData($id);
        if ($result == 1) {
            $message['msg'] = "Remove product success";
            header("Location:" . BASE_URL . "/carts/?msg=" . urlencode(serialize($message)));
        } else {
            $message['msg'] = "Remove product false";
            header("Location:" . BASE_URL . "/carts/?msg=" . urlencode(serialize($message)));
        }
    }
}
