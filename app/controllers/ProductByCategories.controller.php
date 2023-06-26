<?php

class ProductByCategories extends Controller
{

    function index($id)
    {
        $this->ListData($id);
    }
    function ListData($id)
    {
        $CategoriesModel = $this->CModel("Categories");
        $this->CView(
            'client',
            [
                'ProductByCategories' => $CategoriesModel->findProductsByCategoryID($id),
                'Header' => 'header',
                'Page' => 'productsbycategories',
                'Footer' => 'footer',
            ]
        );
    }

    function FindOne()
    {
        echo 'findOne - data';
    }
}
