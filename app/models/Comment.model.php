<?php

class Comment extends DB
{
    public function findProductByComment()
    {
        $query = "SELECT * FROM comment";
        $result = mysqli_query($this->conn, $query);

        $comments = array();

        while ($row = mysqli_fetch_assoc($result)) {
            $comments[] = $row;
        }

        return $comments;
    }

    public function findAllCommentByproduct($product_id)
    {
        $query = "SELECT comment.id AS comment_id, comment.content, comment.rating, comment.created_date, user.id AS user_id, user.email FROM comment
                  INNER JOIN user ON comment.user_id = user.id
                  WHERE comment.product_id = '$product_id'";
        $result = mysqli_query($this->conn, $query);

        $comments = array();

        while ($row = mysqli_fetch_assoc($result)) {
            $comments[] = $row;
        }

        return $comments;
    }

    public function findData($product_id)
    {
        $query = "SELECT comment.*, user.email, user.avatar FROM comment INNER JOIN user ON comment.user_id = user.id WHERE comment.product_id = '$product_id'";
        $result = mysqli_query($this->conn, $query);

        $comments = array();

        while ($row = mysqli_fetch_assoc($result)) {
            $comments[] = $row;
        }

        return $comments;
    }
    public function removeComment($id, $product_id)
    {
        $query = "DELETE FROM comment WHERE id = '$id' AND product_id = '$product_id'";
        $result = mysqli_query($this->conn, $query);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function addComment($data)
    {
        $user_id = $data['user_id'];
        $product_id = $data['product_id'];
        $content = $data['content'];
        $rating = $data['rating'];

        $query = "INSERT INTO comment (user_id, product_id, content, rating) VALUES ('$user_id', '$product_id', '$content', '$rating')";
        $result = mysqli_query($this->conn, $query);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function removeCommentById($id)
    {
        $query = "DELETE FROM comment WHERE id = '$id'";
        $result = mysqli_query($this->conn, $query);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}
