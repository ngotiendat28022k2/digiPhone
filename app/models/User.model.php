<?php

class User extends DB
{
    public function findData($role)
    {
        $qr = "SELECT * FROM user";

        if ($role !== null) {
            $qr .= " WHERE role = '$role'";
        }

        return mysqli_query($this->conn, $qr);
    }

    function findOneData($id)
    {
        $qr = "SELECT * FROM user WHERE id = '$id'";
        $result = mysqli_query($this->conn, $qr);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
            return $row;
        } else {
            return null;
        }
    }

    public function add($data)
    {
        $name = $data['name'];
        $email = $data['email'];
        $password = $data['password'];
        $avatar = $data['avatar'];
        $role = $data['role'];

        // Check if email or name already exists
        $existingQuery = "SELECT COUNT(*) as count FROM user WHERE email = '$email' OR name = '$name'";
        $existingResult = mysqli_query($this->conn, $existingQuery);
        $existingData = mysqli_fetch_assoc($existingResult);
        $count = $existingData['count'];

        if ($count > 0) {
            return false;
        } else {
            $insertQuery = "INSERT INTO user (name, email, password, avatar, role)
                        VALUES ('$name', '$email', '$password', '$avatar','$role')";
            $result = mysqli_query($this->conn, $insertQuery);

            return $result ? true : false;
        }
    }

    public function updateRole($userId, $newRole)
    {
        $query = "UPDATE user SET role = '$newRole' WHERE id = '$userId'";
        $result = mysqli_query($this->conn, $query);

        return $result ? true : false;
    }
    public function remove($userId)
    {
        $query = "DELETE FROM user WHERE id = '$userId'";
        $result = mysqli_query($this->conn, $query);

        return $result ? true : false;
    }

    public function update($id, $data)
    {
        $name = $data['name'];
        $email = $data['email'];
        $phone = isset($data['phone']) ? $data['phone'] : null;
        $image = isset($data['image']) ? $data['image'] : null;
        $address = isset($data['address']) ? $data['address'] : null;

        $qr = "UPDATE user SET name = '$name', email = '$email'";
        if ($phone !== null) {
            $qr .= ", phone = '$phone'";
        }
        if ($image !== null) {
            $qr .= ", avatar = '$image'";
        }
        if ($address !== null) {
            $qr .= ", address = '$address'";
        }
        $qr .= " WHERE id = $id";

        $result = mysqli_query($this->conn, $qr);

        return $result ? true : false;
    }
}
