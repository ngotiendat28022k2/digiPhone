<?php

class AdminProduct extends Controller
{
    function index()
    {
        $this->ListData();
    }


    function ListData()
    {
        $productModel = $this->CModel("Product");

        $this->CView(
            'admin',
            [
                'Products' => $productModel->findData(),
                'Header' => 'header',
                'Page' => 'product/index',
                'Footer' => 'footer',
            ]
        );
    }

    function update($id)
    {
        $productModel = $this->CModel("product");
        $categoriesModel = $this->CModel("categories");

        $this->CView(
            'admin',
            [
                'Header' => 'header',
                'Page' => 'product/update',
                'Footer' => 'footer',
                'Product' => $productModel->findOneData($id),
                'Categories' => $categoriesModel->findData(),

            ]
        );
    }
    function remove($id)
    {
        $productModel = $this->CModel("product");
        $result = $productModel->removeData($id);
        echo $result;
        if ($result == 1) {
            $message['msg'] = "Remove product success";
            header("Location:" . BASE_URL . "/adminproduct/?msg=" . urlencode(serialize($message)));
        } else {
            $message['msg'] = "Remove product false";
            header("Location:" . BASE_URL . "/adminproduct/?msg=" . urlencode(serialize($message)));
        }
    }
    function add()
    {
        $categoriesModel = $this->CModel("categories");

        $this->CView(
            'admin',
            [
                'Header' => 'header',
                'Page' => 'product/add',
                'Footer' => 'footer',
                'Categories' => $categoriesModel->findData(),
            ]
        );
    }
    function aadd()
    {
        $productModel = $this->CModel("product");

        $others = new stdClass();
        $k = $_POST['k'];
        $v = $_POST['v'];
        $others->k = $k;
        $others->v = $v;

        $color = explode(',', $_POST['color']);
        $capacity = explode(',', $_POST['capacity']);

        $target_dir = $_SERVER['DOCUMENT_ROOT'] . "/digiphone/upload/";
        $imagePath = basename($_FILES['image']['name']);
        $target_file = $target_dir . $imagePath;
        // echo $_SERVER['DOCUMENT_ROOT'] . '/digiphone/';
        move_uploaded_file($_FILES['image']['tmp_name'], $target_file);

        $data = array(
            "name" => $_POST['name'],
            "price" => $_POST['price'],
            "description" => $_POST['description'],
            "capacity" =>  json_encode($capacity),
            "color" =>  json_encode($color),
            "others" =>  json_encode($others),
            "image" =>  $imagePath,
            "categories_id" => $_POST['categories'],
            "quantily" => $_POST['quantily'],
            "sale" => $_POST['sale'],
        );

        $result = $productModel->insertData($data);
        echo $result;
        if ($result == 1) {
            $message['msg'] = "Add product success";
            header("Location:" . BASE_URL . "/adminproduct/add?msg=" . urlencode(serialize($message)));
        } else {
            $message['msg'] = "Add product false";
            header("Location:" . BASE_URL . "/adminproduct/add?msg=" . urlencode(serialize($message)));
        }
    }

    function aupdate($id)
    {
        $productModel = $this->CModel("product");

        $others = new stdClass();
        $k = $_POST['k'];
        $v = $_POST['v'];
        $others->k = $k;
        $others->v = $v;

        $color = explode(',', $_POST['color']);
        $capacity = explode(',', $_POST['capacity']);

        $target_dir = $_SERVER['DOCUMENT_ROOT'] . "/digiphone/upload/";
        $imagePath = basename($_FILES['image']['name']);
        $target_file = $target_dir . $imagePath;
        move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
        echo $imagePath;
        if ($imagePath != '') {
            $data = array(
                "name" => $_POST['name'],
                "price" => $_POST['price'],
                "description" => $_POST['description'],
                "capacity" =>  json_encode($capacity),
                "color" =>  json_encode($color),
                "others" =>  json_encode($others),
                "image" =>  $imagePath,
                "categories_id" => $_POST['categories'],
                "quantily" => $_POST['quantily'],
                "sale" => $_POST['sale'],
            );
        } else {
            $data = array(
                "name" => $_POST['name'],
                "price" => $_POST['price'],
                "description" => $_POST['description'],
                "capacity" =>  json_encode($capacity),
                "color" =>  json_encode($color),
                "others" =>  json_encode($others),
                "categories_id" => $_POST['categories'],
                "quantily" => $_POST['quantily'],
                "sale" => $_POST['sale'],
            );
        }

        // print_r($data);
        $result = $productModel->updateData($data, $id);
        echo $result;
        if ($result == 1) {
            $message['msg'] = "Update product success";
            header("Location:" . BASE_URL . "/adminproduct/?msg=" . urlencode(serialize($message)));
        } else {
            $message['msg'] = "Update product false";
            header("Location:" . BASE_URL . "/adminproduct/?msg=" . urlencode(serialize($message)));
        }
    }
}
