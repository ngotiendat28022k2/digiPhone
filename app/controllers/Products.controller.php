<?php

class Products extends Controller
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
                'productNew' => $ProductModel->findDataProductNewDay(),
                'Header' => 'header',
                'Page' => 'products',
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
