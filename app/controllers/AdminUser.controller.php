<?php

class AdminUser extends Controller
{
    function index()
    {
        $this->ListData();
    }

    function ListData()
    {
        $userModel = $this->CModel("User");
        $role = null;
        if (isset($_GET['role'])) {
            $role = $_GET['role'];
        }

        $this->CView(
            'admin',
            [
                'Role' => $role,
                'User' => $userModel->findData($role),
                'Header' => 'header',
                'Page' => 'user/index',
                'Footer' => 'footer',
            ]
        );
    }
    function Add()
    {
        $this->CView(
            'admin',
            [
                'Header' => 'header',
                'Page' => 'user/add',
                'Footer' => 'footer',
            ]
        );
    }
    function aadd()
    {
        print_r($_POST);
        $userModel = $this->CModel("User");
        $target_dir = $_SERVER['DOCUMENT_ROOT'] . "/digiphone/upload/";
        $imagePath = basename($_FILES['avatar']['name']);
        $target_file = $target_dir . $imagePath;
        // echo $_SERVER['DOCUMENT_ROOT'] . '/digiphone/';
        move_uploaded_file($_FILES['avatar']['tmp_name'], $target_file);

        $data = array(
            "name" => $_POST['name'],
            "email" => $_POST['email'],
            "password" => md5($_POST['password']),
            "avatar" =>  $imagePath,
            "role" => $_POST['role'],
        );

        $result = $userModel->add($data);
        if ($result) {
            $message['msg'] = "Add user success";
            header("Location:" . BASE_URL . "/adminuser/?msg=" . urlencode(serialize($message)));
        } else {
            $message['msg'] = "Add user false";
            header("Location:" . BASE_URL . "/adminuser/?msg=" . urlencode(serialize($message)));
        }
    }

    function aupdate($id)
    {
        $userModel = $this->CModel("User");


        $result = $userModel->updateRole($id, $_POST['role']);
        if ($result) {
            $message['msg'] = "Add user success";
            header("Location:" . BASE_URL . "/adminuser/?msg=" . urlencode(serialize($message)));
        } else {
            $message['msg'] = "Add user false";
            header("Location:" . BASE_URL . "/adminuser/?msg=" . urlencode(serialize($message)));
        }
    }
    public function aremove($id)
    {
        $userModel = $this->CModel("User");

        $result = $userModel->remove($id);
        if ($result) {
            $message['msg'] = "Remove user success";
            header("Location:" . BASE_URL . "/adminuser/?msg=" . urlencode(serialize($message)));
        } else {
            $message['msg'] = "Remove user false";
            header("Location:" . BASE_URL . "/adminuser/?msg=" . urlencode(serialize($message)));
        }
    }
}
