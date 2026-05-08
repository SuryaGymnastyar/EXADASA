<?php

class Login_model
{
    private object $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function login(array $data)
    {
        $username = htmlspecialchars(stripcslashes($data["username"]));
        $password = htmlspecialchars(stripcslashes($data["password"]));
        $remember = $data["remember"];

        try {
            $user = $this->getUserByUsername($username);
            if (!$user)
                throw new PDOException("Username tidak ditemukan");

            if (!password_verify($password, $user["password"]))
                throw new PDOException("Password salah");

            $_SESSION["user"] = [
                "id" => $user["id"],
                "username" => $user["username"],
                "role" => $user["role"]
            ];
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public function getUserByUsername(string $username)
    {
        try {
            $this->db->query("SELECT * FROM users WHERE username = :username");
            $this->db->bind("username", $username);
            return $this->db->single();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}