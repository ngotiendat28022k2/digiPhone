<?php

class Categories extends DB
{
    public function findData()
    {
        $qr = "SELECT * FROM categories";
        return mysqli_query($this->conn, $qr);
    }
    public function findDataCatergoryByProduct()
    {
        $qr = "SELECT DISTINCT p.`categories_id`, c.`name` FROM `product` p
            INNER JOIN `categories` c ON p.`categories_id` = c.`id`";
        $result = mysqli_query($this->conn, $qr);

        $categories = array();

        while ($row = mysqli_fetch_assoc($result)) {
            $categoryID = $row['categories_id'];
            $categoryName = $row['name'];
            $categoryId = $row['categories_id'];

            $qr_products = "SELECT * FROM `product` WHERE `categories_id` = '$categoryID'";
            $result_products = mysqli_query($this->conn, $qr_products);

            $products = array();
            while ($product_row = mysqli_fetch_assoc($result_products)) {
                $products[] = $product_row;
            }

            $categories[$categoryID] = [
                'name' => $categoryName,
                'id' => $categoryId,
                'products' => $products
            ];
        }

        return $categories;
    }
    public function findDataProductByCategories($categoryId)
    {
        $qr = "SELECT c.*, CONCAT('[', GROUP_CONCAT(CONCAT('{\"name\":\"', p.name, '\", \"image\":\"', p.image, '\", \"description\":\"', p.description, '\", \"price\":\"', p.price, '\", \"sale\":\"', p.sale, '\"}')), ']') AS product
        FROM categories c
        INNER JOIN product p ON c.id = p.categories_id
        WHERE c.id = ?
        GROUP BY c.id";

        $statement = $this->conn->prepare($qr);
        $statement->bind_param("i", $categoryId);
        $statement->execute();

        $result = $statement->get_result();
        $row = $result->fetch_assoc();
        $row['product'] = json_decode($row['product'], true);

        return $row;
    }

    public function insertCategory($data)
    {
        $name = $data['name'];
        $image = $data['image'];

        $existingQuery = "SELECT * FROM categories WHERE name = '$name'";
        $existingResult = mysqli_query($this->conn, $existingQuery);
        $existingCategory = mysqli_fetch_assoc($existingResult);

        if ($existingCategory) {
            return false;
        } else {
            $query = "INSERT INTO categories (name, image) VALUES ('$name', '$image')";
            return mysqli_query($this->conn, $query);
        }
    }

    public function removeCategory($id)
    {
        $qr = "DELETE FROM categories WHERE id = $id";
        return mysqli_query($this->conn, $qr);
    }
    public function editCategory($id, $data)
    {
        $newName = $data['name'];
        $newImage = $data['image'];

        $updateQuery = "UPDATE categories SET name = '$newName', image = '$newImage' WHERE id = $id";
        return mysqli_query($this->conn, $updateQuery);
    }
    public function findOneData($id)
    {
        $selectQuery = "SELECT * FROM categories WHERE id = $id";
        $result = mysqli_query($this->conn, $selectQuery);
        if ($result && mysqli_num_rows($result) > 0) {
            $category = mysqli_fetch_assoc($result);
            return $category;
        } else {
            return null;
        }
    }

    public function findCategoryByID($category_id)
    {
        $query = "SELECT * FROM categories WHERE id = '$category_id'";
        $result = mysqli_query($this->conn, $query);
        $category = mysqli_fetch_assoc($result);

        return $category;
    }

    public function findProductsByCategoryID($category_id)
    {
        $query = "SELECT * FROM product WHERE categories_id = '$category_id'";
        $result = mysqli_query($this->conn, $query);

        $products = array();

        while ($row = mysqli_fetch_assoc($result)) {
            $products[] = $row;
        }

        $category = $this->findCategoryByID($category_id);
        $category_name = $category['name'];
        $category_image = $category['image'];

        return [
            'category_name' => $category_name,
            'category_image' => $category_image,
            'products' => $products,
        ];
    }
}
