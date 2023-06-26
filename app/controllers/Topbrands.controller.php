<?php

class Topbrands extends Controller
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
                'Header' => 'header',
                'Page' => 'topbrands',
                'Footer' => 'footer',
                'value' => $ProductModel->findData()
            ]
        );
    }

    function FindOne()
    {
        echo 'findOne - data';
    }
}
