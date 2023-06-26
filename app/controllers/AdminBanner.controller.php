<?php

class AdminBanner extends Controller
{
    function index()
    {
        $this->ListData();
    }

    function ListData()
    {
        $bannerModel = $this->CModel("banner");
        $categoriesModel = $this->CModel("categories");

        $this->CView(
            'admin',
            [
                'Banner' => $bannerModel->findData(),
                'Categories' => $categoriesModel->findData(),
                'Header' => 'header',
                'Page' => 'banner/index',
                'Footer' => 'footer',
            ]
        );
    }

    function Update($id)
    {
        $bannerModel = $this->CModel("banner");
        $categoriesModel = $this->CModel("categories");

        $this->CView(
            'admin',
            [
                'Banner' => $bannerModel->findOneData($id),
                'Categories' => $categoriesModel->findData(),
                'Header' => 'header',
                'Page' => 'banner/update',
                'Footer' => 'footer',
            ]
        );
    }

    function Aupdate($id)
    {
        $bannerModel = $this->CModel("banner");

        $target_dir = $_SERVER['DOCUMENT_ROOT'] . "/digiphone/upload/";
        $imagePath = basename($_FILES['image']['name']);
        $target_file = $target_dir . $imagePath;
        move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
        // echo $imagePath;
        $data = array(
            "image" => $imagePath,
            "categories" => $_POST['categories'],
        );

        $result = $bannerModel->update($data, $id);
        echo $result;
        if ($result == 1) {
            $message['msg'] = "Update banner success";
            header("Location:" . BASE_URL . "/adminbanner/?msg=" . urlencode(serialize($message)));
        } else {
            $message['msg'] = "Update banner false";
            header("Location:" . BASE_URL . "/adminbanner/?msg=" . urlencode(serialize($message)));
        }
    }

    function Add()
    {
        $bannerModel = $this->CModel("banner");
        $categoriesModel = $this->CModel("categories");

        $this->CView(
            'admin',
            [
                'Categories' => $categoriesModel->findData(),
                'Header' => 'header',
                'Page' => 'banner/add',
                'Footer' => 'footer',
            ]
        );
    }
    function Aadd()
    {
        $bannerModel = $this->CModel("banner");

        $target_dir = $_SERVER['DOCUMENT_ROOT'] . "/digiphone/upload/";
        $imagePath = basename($_FILES['image']['name']);
        $target_file = $target_dir . $imagePath;
        // echo $_SERVER['DOCUMENT_ROOT'] . '/digiphone/';
        move_uploaded_file($_FILES['image']['tmp_name'], $target_file);

        $data = array(
            "categories" => $_POST['categories'],
            "image" => $imagePath,
        );
        print_r($data);
        $result = $bannerModel->add($data);
        if ($result == 1) {
            $message['msg'] = "Add banner success";
            header("Location:" . BASE_URL . "/adminbanner/?msg=" . urlencode(serialize($message)));
        } else {
            $message['msg'] = "Add banner false";
            header("Location:" . BASE_URL . "/adminbanner/?msg=" . urlencode(serialize($message)));
        }
    }

    function Remove($id)
    {
        $bannerModel = $this->CModel("banner");
        $result = $bannerModel->remove($id);
        if ($result) {
            $message['msg'] = "Add category success";
            header("Location:" . BASE_URL . "/adminbanner/?msg=" . urlencode(serialize($message)));
        } else {
            $message['msg'] = "Add category false";
            header("Location:" . BASE_URL . "/adminbanner/?msg=" . urlencode(serialize($message)));
        }
    }
}
