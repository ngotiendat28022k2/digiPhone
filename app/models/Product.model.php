<?php

class Product extends DB
{
    public function findData()
    {
        $qr = "SELECT * FROM product";
        return mysqli_query($this->conn, $qr);
    }
    public function findOneData($id)
    {
        $qr = "SELECT * FROM product WHERE id = '$id'";
        return mysqli_query($this->conn, $qr);
    }
    public function findDataBySaleLimit()
    {
        $qr = "SELECT * FROM product ORDER BY sale DESC LIMIT 4";
        return mysqli_query($this->conn, $qr);
    }

    public function findDataProductNewDay()
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $currentDate = date('Y-m-d', strtotime('now'));
        $fourDaysAgo = date('Y-m-d', strtotime('-4 days'));

        $qr = "SELECT DISTINCT p.`categories_id`, c.`name` FROM `product` p
        INNER JOIN `categories` c ON p.`categories_id` = c.`id`";
        $result = mysqli_query($this->conn, $qr);

        $categories = array();

        while ($row = mysqli_fetch_assoc($result)) {
            $categoryID = $row['categories_id'];
            $categoryName = $row['name'];

            $qr_products = "SELECT * FROM `product` WHERE `categories_id` = '$categoryID' AND `created_date` BETWEEN '$fourDaysAgo' AND '$currentDate'";
            $result_products = mysqli_query($this->conn, $qr_products);

            $products = array();
            while ($product_row = mysqli_fetch_assoc($result_products)) {
                $products[] = $product_row;
            }

            $categories[$categoryID] = [
                'name' => $categoryName,
                'id' => $categoryID,
                'products' => $products
            ];
        }

        return $categories;
    }

    public function insertData($data)
    {
        $name = $data['name'];
        $price = $data['price'];
        $capacity = $data['capacity'];
        $color = $data['color'];
        $description = $data['description'];
        $others = $data['others'];
        $image = $data['image'];
        $categories_id = $data['categories_id'];
        $quantily = $data['quantily'];
        $sale = $data['sale'];

        $qr = "INSERT INTO product (name, price, capacity, color, description, others, image, categories_id, quantily, sale)
                VALUES ('$name', '$price', '$capacity', '$color', '$description', '$others', '$image', '$categories_id', '$quantily', '$sale')";
        $result = mysqli_query($this->conn, $qr);

        return $result ? true : false;
    }
    public function removeData($id)
    {
        $query = "DELETE FROM product WHERE id = '$id'";
        $result = mysqli_query($this->conn, $query);

        return $result ? true : false;
    }
    public function updateData($data, $id)
    {
        $name = $data['name'];
        $price = $data['price'];
        $capacity = $data['capacity'];
        $color = $data['color'];
        $description = $data['description'];
        $others = $data['others'];
        $image = $data['image'];
        $categories_id = $data['categories_id'];
        $quantily = $data['quantily'];
        $sale = $data['sale'];

        $qr = "UPDATE product SET 
            name = '$name',
            price = '$price',
            capacity = '$capacity',
            color = '$color',
            description = '$description',
            others = '$others',
            image = '$image',
            categories_id = '$categories_id',
            quantily = '$quantily',
            sale = '$sale'
            WHERE id = '$id'";

        $result = mysqli_query($this->conn, $qr);

        return $result ? true : false;
    }

    public function searchProductByName($name)
    {
        $searchTerm = mysqli_real_escape_string($this->conn, $name);

        $query = "SELECT * FROM product WHERE name LIKE '%$searchTerm%'";
        $result = mysqli_query($this->conn, $query);

        $products = array();

        while ($row = mysqli_fetch_assoc($result)) {
            $products[] = $row;
        }

        return $products;
    }
}
