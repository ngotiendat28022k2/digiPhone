<?php

class Login extends Controller
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
                'Page' => 'login',
                'Footer' => 'footer',
            ]
        );
    }
    function Dashboard()
    {
        Session::checkSession();
        Session::checkClient();
        $ProductModel = $this->CModel("Product");
        $OderModel = $this->CModel("Oder");
        $UserModel = $this->CModel("User");

        $this->CView(
            'admin',
            [
                'Product' => $ProductModel->findData(),
                'Oder' => $OderModel->findData(0),
                'User' => $UserModel->findData(null),
                'Header' => 'header',
                'Page' => 'dashboard',
                'Footer' => 'footer',
            ]
        );
    }

    function AuthLogin()
    {
        $authModel = $this->CModel("Auth");

        $account = $_POST['account'];
        $password = $_POST['password'];
        $res = $authModel->login($account, $password);
        if ($res['errorMessage'] === "" && $res['role'] === 0) {
            Session::init();
            Session::set("role", $res['role']);
            Session::set("user", $res['user']);
            Session::set("islogin", true);
            header("Location:" . BASE_URL . "home");
        } elseif ($res['errorMessage'] === "" && $res['role'] === 1) {
            Session::init();
            Session::set("user", $res['user']);
            Session::set("role", $res['role']);
            Session::set("islogin", true);
            $this->Dashboard();
        } elseif ($res['errorMessage'] !== "") {
            header("Location:" . BASE_URL . "login");
        }
    }

    function logout()
    {
        Session::destroy();
        header("Location:" . BASE_URL . "login");
    }
}
