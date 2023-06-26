<?php

class Register extends Controller
{
    function index()
    {
        $this->ListData();
    }
    function ListData()
    {
        $ProductModel = $this->CModel("Product");
        $this->CView(
            'client',
            [
                'value' => $ProductModel->findData(),
                'Header' => 'header',
                'Page' => 'register',
                'Footer' => 'footer',
            ]
        );
    }

    function aadd()
    {
        print_r($_POST);
        $userModel = $this->CModel("User");

        $data = array(
            "name" => $_POST['name'],
            "email" => $_POST['email'],
            "password" => md5($_POST['password']),
        );

        $result = $userModel->add($data);
        if ($result) {
            $message['msg'] = "Register user success";
            header("Location:" . BASE_URL . "register/?msg=" . urlencode(serialize($message)));
        } else {
            $message['msg'] = "Register user false";
            header("Location:" . BASE_URL . "register/?msg=" . urlencode(serialize($message)));
        }
    }
}
