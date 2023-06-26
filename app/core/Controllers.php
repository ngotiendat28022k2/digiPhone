<?php

class Controller
{
    public function CModel($model)
    {
        require_once './app/models/' . $model . '.model.php';
        return new $model;
    }
    public function CView($view, $data = [])
    {
        require_once './app/views/' . $view . '.php';
    }
    public function PaymentConfig($config)
    {
        require_once './app/core/' . $config . '.php';
    }
}
