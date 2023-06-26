<?php

class AdminCategory extends Controller
{
    function index()
    {
        $this->ListData();
    }

    function ListData()
    {
        $categoriesModel = $this->CModel("categories");
        $this->CView(
            'admin',
            [
                'Header' => 'header',
                'Page' => 'category/index',
                'Footer' => 'footer',
                'Categories' => $categoriesModel->findData(),
            ]
        );
    }

    function add()
    {
        $this->CView(
            'admin',
            [
                'Header' => 'header',
                'Page' => 'category/add',
                'Footer' => 'footer',
            ]
        );
    }
    function insertcategory()
    {
        $categoriesModel = $this->CModel("categories");
        $name = $_POST['name'];
        $target_dir = $_SERVER['DOCUMENT_ROOT'] . "/digiphone/upload/";
        $imagePath = basename($_FILES['image']['name']);
        $target_file = $target_dir . $imagePath;
        // echo $_SERVER['DOCUMENT_ROOT'] . '/digiphone/';
        move_uploaded_file($_FILES['image']['tmp_name'], $target_file);


        $data = array(
            "name" => $name,
            "image" => $imagePath,
        );
        $result = $categoriesModel->insertcategory($data);
        // echo $result;
        if ($result == 1) {
            $message['msg'] = "Add category success";
            header("Location:" . BASE_URL . "/admincategory/addcategory?msg=" . urlencode(serialize($message)));
        } else {
            $message['msg'] = "Add category false";
            header("Location:" . BASE_URL . "/admincategory/addcategory?msg=" . urlencode(serialize($message)));
        }
    }

    function update($id)
    {
        $categoriesModel = $this->CModel("categories");
        $this->CView(
            'admin',
            [
                'Header' => 'header',
                'Page' => 'category/update',
                'Footer' => 'footer',
                'Category' => $categoriesModel->findOneData($id),
            ]
        );
    }

    function aupdate($id)
    {
        $categoriesModel = $this->CModel("categories");

        $target_dir = $_SERVER['DOCUMENT_ROOT'] . "/digiphone/upload/";
        $imagePath = basename($_FILES['image']['name']);
        $target_file = $target_dir . $imagePath;
        // echo $_SERVER['DOCUMENT_ROOT'] . '/digiphone/';
        move_uploaded_file($_FILES['image']['tmp_name'], $target_file);


        $data = array(
            "name" => $_POST['name'],
            "image" => $imagePath,
        );

        $result = $categoriesModel->editCategory($id, $data);
        if ($result == 1) {
            $message['msg'] = "Update category success";
            header("Location:" . BASE_URL . "/admincategory/?msg=" . urlencode(serialize($message)));
        } else {
            $message['msg'] = "Update category false";
            header("Location:" . BASE_URL . "/admincategory/?msg=" . urlencode(serialize($message)));
        }
    }

    function remove($id)
    {
        $categoriesModel = $this->CModel("categories");
        $result = $categoriesModel->removeCategory($id);
        echo $result;
        if ($result == 1) {
            $message['msg'] = "Remove category success";
            header("Location:" . BASE_URL . "/admincategory/?msg=" . urlencode(serialize($message)));
        } else {
            $message['msg'] = "Remove category false";
            header("Location:" . BASE_URL . "/admincategory/?msg=" . urlencode(serialize($message)));
        }
    }
}
