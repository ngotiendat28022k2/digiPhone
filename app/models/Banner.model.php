<?php

class Banner extends DB
{
    public function findData()
    {
        $query = "SELECT banner.*, categories.name AS category_name
                  FROM banner
                  INNER JOIN categories ON banner.categories_id = categories.id";
        return mysqli_query($this->conn, $query);
    }

    public function remove($id)
    {
        $query = "DELETE FROM banner WHERE id = '$id'";
        $result = mysqli_query($this->conn, $query);

        return $result ? true : false;
    }

    public function update($data, $id)
    {
        $categories_id = isset($data['categories']) ? $data['categories'] : null;
        $image = isset($data['image']) ? $data['image'] : null;

        $query = "UPDATE banner SET ";

        if ($categories_id !== null) {
            $query .= "categories_id = '$categories_id'";
        }

        if ($image !== null) {
            if ($categories_id !== null) {
                $query .= ", ";
            }
            $query .= "image = '$image'";
        }

        $query .= " WHERE id = '$id'";

        return mysqli_query($this->conn, $query);
    }

    public function add($data)
    {
        $categories_id = $data['categories'];
        $image = $data['image'];

        $query = "INSERT INTO banner (categories_id, image)
                  VALUES ('$categories_id', '$image')";

        return mysqli_query($this->conn, $query);
    }

    public function findOneData($id)
    {
        $selectQuery = "SELECT * FROM banner WHERE id = $id";
        $result = mysqli_query($this->conn, $selectQuery);
        if ($result && mysqli_num_rows($result) > 0) {
            $banner = mysqli_fetch_assoc($result);
            return $banner;
        } else {
            return null;
        }
    }
}
