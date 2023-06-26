<?php

class Auth extends DB
{
    public function login($account, $password)
    {
        $res = array();
        $stmt = $this->conn->prepare("SELECT * FROM user WHERE email = ? OR name = ?");
        $stmt->bind_param("ss", $account, $account);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            $hashedPassword = md5($password);
            if ($hashedPassword === $row['password']) {
                $res['errorMessage'] = "";
                $res['role'] = $row['role'];
                $res['user'] = $row;
            } else {
                $res['errorMessage'] = "Tài khoản hoặc Mật khẩu không đúng.";
            }
        } else {
            $res['errorMessage'] = "Tài khoản không tồn tại.";
        }
        return $res;
    }
}
