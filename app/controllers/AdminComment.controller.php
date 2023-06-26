<?php

class AdminComment extends Controller
{
    function index()
    {
        $this->ListData();
    }

    function ListData()
    {
        $commentModel = $this->CModel("Comment");
        $productModel = $this->CModel("Product");

        $comments = $commentModel->findProductByComment();
        $products = array();

        foreach ($comments as $comment) {
            $product_id = $comment['product_id'];

            if (!isset($products[$product_id])) {
                $product = $productModel->findOneData($product_id);

                if ($row = mysqli_fetch_assoc($product)) {
                    $products[$product_id] = $row;
                }
            }
        }

        $this->CView(
            'admin',
            [
                'ProductComment' => $products,
                'Header' => 'header',
                'Page' => 'comment/index',
                'Footer' => 'footer',
            ]
        );
    }

    function Detail($id)
    {
        $commentModel = $this->CModel("Comment");

        $comments = $commentModel->findAllCommentByproduct($id);

        $this->CView(
            'admin',
            [
                'Comments' => $comments,
                'Header' => 'header',
                'Page' => 'comment/detail',
                'Footer' => 'footer',
            ]
        );
    }
    function Remove($id)
    {
        $commentModel = $this->CModel("Comment");

        $result = $commentModel->removeCommentById($id);

        if ($result) {
            $message['msg'] = "Remove comment success";
            header("Location:" . BASE_URL . "/admincomment/?msg=" . urlencode(serialize($message)));
        } else {
            $message['msg'] = "Remove comment false";
            header("Location:" . BASE_URL . "/admincomment/?msg=" . urlencode(serialize($message)));
        }
    }
}
