<?php

class Contact extends Controller
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
                'Page' => 'contact',
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
