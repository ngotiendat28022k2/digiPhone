<?php

class App
{
    protected $controller = 'home';
    protected $acction = 'index';
    protected $params = [];

    function __construct()
    {
        $urlArray = $this->UrlProcess();
        if (file_exists('./app/controllers/' . $urlArray[0] . '.controller.php')) {
            $this->controller = $urlArray[0];
            unset($urlArray[0]);
            require_once './app/controllers/' . $this->controller . '.controller.php';
            $this->controller = new $this->controller;

            if (isset($urlArray[1])) {
                if (method_exists($this->controller, $urlArray[1])) {
                    $this->acction = $urlArray[1];
                }
                unset($urlArray[1]);
            }
            $this->params = $urlArray ? array_values($urlArray) : [];

            call_user_func_array([new $this->controller, $this->acction],  $this->params);
        } else {
            header('Location: ' . BASE_URL . 'home');
        }
    }

    function UrlProcess()
    {
        if (isset($_GET['url'])) {
            return explode('/', filter_var(trim($_GET['url'], '/')));
        }
    }
}
