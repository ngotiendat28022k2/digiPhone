<?php

class DetailProduct extends Controller
{
    function index($id)
    {
        $this->ShowData($id);
    }

    function ShowData($id)
    {
        $ProductModel = $this->CModel("Product");
        $CategoriesModel = $this->CModel("Categories");
        $CommentModel = $this->CModel("Comment");

        $this->CView(
            'client',
            [
                'product' => $ProductModel->findOneData($id),
                'categories' => $CategoriesModel->findData(),
                'comments' => $CommentModel->findData($id),
                'Header' => 'header',
                'Page' => 'detail',
                'Footer' => 'footer',
            ]
        );
    }

    function aaddcm()
    {
        $CommentModel = $this->CModel("Comment");

        $product_id = $_POST['product_id'];
        $user_id = Session::get('user')['id'];
        $data = array(
            'content' => $_POST['content'],
            'rating' => $_POST['rating'],
            'user_id' => $user_id,
            'product_id' => $product_id,
        );

        $result = $CommentModel->addComment($data);

        if ($result) {
            $message['msg'] = "Add comment success";
            header("Location:" . BASE_URL . "/detailproduct/showdata/" . $product_id . "/add?msg=" . urlencode(serialize($message)));
        } else {
            $message['msg'] = "Add comment false";
            header("Location:" . BASE_URL . "/detailproduct/showdata/" . $product_id . "/add?msg=" . urlencode(serialize($message)));
        }
    }

    function aremovecm($id, $product_id)
    {
        $CommentModel = $this->CModel("Comment");

        $result = $CommentModel->removeComment($id, $product_id);

        if ($result) {
            $message['msg'] = "Remove comment success";
            header("Location:" . BASE_URL . "/detailproduct/showdata/" . $product_id . "/add?msg=" . urlencode(serialize($message)));
        } else {
            $message['msg'] = "Remove comment false";
            header("Location:" . BASE_URL . "/detailproduct/showdata/" . $product_id . "/add?msg=" . urlencode(serialize($message)));
        }
    }
}
