<?php

class Home extends Controller
{

    function index()
    {
        $this->ListData();
    }

    function ListData()
    {
        $ProductModel = $this->CModel("Product");
        $categoriesModel = $this->CModel("Categories");
        $bannerModel = $this->CModel("Banner");
        $this->CView(
            'client',
            [

                'categories' => $categoriesModel->findData(),
                'banner' => $bannerModel->findData(),
                'product' => $ProductModel->findData(),
                'productSale' => $ProductModel->findDataBySaleLimit(),
                'Header' => 'header',
                "Slider" => 'slider',
                'categoryByProduct' => $categoriesModel->findDataCatergoryByProduct(),
                'Page' => 'home',
                'Footer' => 'footer',
            ]
        );
    }

    function FindOne()
    {
        echo 'findOne - data';
    }
}
