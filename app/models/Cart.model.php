<?php

class Cart extends DB
{
    function index($id)
    {
        $this->findData($id);
    }

    function findData($id)
    {

        $qr = "SELECT * FROM cart WHERE  user_id = '$id'";
        return mysqli_query($this->conn, $qr);
    }

    function addData($data)
    {
        $name = $data['name'];
        $price = $data['price'];
        $capacity = $data['capacity'];
        $color = $data['color'];
        $image = $data['image'];
        $quantily = $data['quantily'];
        $user_id = $data['user_id'];
        $product_id = $data['product_id'];

        $qr = "INSERT INTO cart (name, price, capacity, color, image, quantily, user_id, product_id)
                VALUES ('$name', '$price', '$capacity', '$color',  '$image',  '$quantily', '$user_id', '$product_id')";
        $result = mysqli_query($this->conn, $qr);

        return $result ? true : false;
    }

    function updateData($productId, $userId, $data)
    {
        $name = $data['name'];
        $price = $data['price'];
        $capacity = $data['capacity'];
        $color = $data['color'];
        $image = $data['image'];
        $quantily = $data['quantily'];

        $qr = "UPDATE cart SET
                name = '$name',
                price = '$price',
                capacity = '$capacity',
                color = '$color',
                image = '$image',
                quantily = '$quantily'
            WHERE product_id = '$productId' AND user_id = '$userId'";

        $result = mysqli_query($this->conn, $qr);
        return $result ? true : false;
    }

    function getData($productId, $userId)
    {
        $qr = "SELECT * FROM cart WHERE product_id = '$productId' AND user_id = '$userId'";
        $result = mysqli_query($this->conn, $qr);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
            return $row;
        }

        return false;
    }
    function getOneData($id)
    {
        $qr = "SELECT * FROM cart WHERE id = '$id'";
        $result = mysqli_query($this->conn, $qr);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
            return $row;
        }

        return false;
    }
    function removeData($id)
    {
        $query = "DELETE FROM cart WHERE id = '$id'";
        $result = mysqli_query($this->conn, $query);

        return $result ? true : false;
    }
    function removeDataByUser($user_id)
    {
        $query = "DELETE FROM cart WHERE user_id = '$user_id'";
        $result = mysqli_query($this->conn, $query);

        return $result ? true : false;
    }
}
