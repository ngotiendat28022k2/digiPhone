<?php

class AdminOder extends Controller
{
    function index()
    {
        $this->ListData();
    }


    function ListData()
    {
        $oderModel = $this->CModel("Oder");
        $status = null;
        if (isset($_GET['status'])) {
            $status = $_GET['status'];
        }
        $this->CView(
            'admin',
            [
                'Oder' => $oderModel->findData($status),
                "Status" => $status,
                'Header' => 'header',
                'Page' => 'oder/index',
                'Footer' => 'footer',
            ]
        );
    }
    function Detail($id)
    {
        $oderModel = $this->CModel("Oder");

        $this->CView(
            'admin',
            [
                'Oderdetail' => $oderModel->oder_detail_find($id),
                'Header' => 'header',
                'Page' => 'oder/detail',
                'Footer' => 'footer',
            ]
        );
    }
    public function Update($id)
    {
        $oderModel = $this->CModel("Oder");
        if (isset($_POST['status'])) {
            $result = $oderModel->aupdate($id, $_POST['status']);
            if ($result) {
                $message['msg'] = "Update status success";
                header("Location:" . BASE_URL . "/adminoder/?msg=" . urlencode(serialize($message)));
            } else {
                $message['msg'] = "UPdate status false";
                header("Location:" . BASE_URL . "/adminoder/?msg=" . urlencode(serialize($message)));
            }
        }
    }
}
