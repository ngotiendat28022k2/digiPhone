<?php

class Account extends Controller
{
    function index($id)
    {
        $this->Profile($id);
    }

    function Profile($id)
    {
        if (!Session::get('islogin') || Session::get('user')['id'] != $id) {
            header("Location: " . BASE_URL . "home");
            exit();
        }
        $userModel = $this->CModel("user");



        $this->CView(
            'client',
            [
                "User" => $userModel->findOneData($id),
                'Header' => 'header',
                'Page' => 'account',
                'Footer' => 'footer',
            ]
        );
    }

    function Oder($id)
    {
        if (!Session::get('islogin') || Session::get('user')['id'] != $id) {
            header("Location: " . BASE_URL . "home");
            exit();
        }
        $oderModel = $this->CModel("oder");

        $this->CView(
            'client',
            [
                "productOder" => $oderModel->my_oder($id),
                'Header' => 'header',
                'Page' => 'oder',
                'Footer' => 'footer',
            ]
        );
    }

    function detailoder($id)
    {
        if (!Session::get('islogin')) {
            header("Location: " . BASE_URL . "home");
            exit();
        }
        $oderModel = $this->CModel("Oder");

        $this->CView(
            'client',
            [
                'Oderdetail' => $oderModel->oder_detail_find($id),
                'Header' => 'header',
                'Page' => 'detailoder',
                'Footer' => 'footer',
            ]
        );
    }

    function Aupdate($id)
    {
        $userModel = $this->CModel("user");
        $target_dir = $_SERVER['DOCUMENT_ROOT'] . "/digiphone/upload/";
        $imagePath = basename($_FILES['image']['name']);
        $target_file = $target_dir . $imagePath;
        move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
        // echo $imagePath;
        $data = array(
            "name" => $_POST['name'],
            "image" => $imagePath,
            "email" => $_POST['email'],
            "phone" => $_POST['phone'],
            "address" => $_POST['address'],
        );
        $result = $userModel->update($id, $data);
        if ($result) {
            $message['msg'] = "Update user success";
            header("Location:" . BASE_URL . "account/profile/" . $id . "/?msg=" . urlencode(serialize($message)));
        } else {
            $message['msg'] = "Update user false";
            header("Location:" . BASE_URL . "account/profile/" . $id . "/?msg=" . urlencode(serialize($message)));
        }
    }
}
