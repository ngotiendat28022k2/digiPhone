<?php

class ProductSearch extends Controller
{
    function index()
    {
        $this->search();
    }


    function search()
    {
        $ProductModel = $this->CModel("Product");
        $name = $_GET['search'];
        $this->CView(
            'client',
            [
                'valueSearch' => $ProductModel->searchProductByName($name),
                'Header' => 'header',
                'Page' => 'search',
                'Footer' => 'footer',
                'value' => $ProductModel->findData()
            ]
        );
    }
}
