<?php
namespace login;
using Crud.php;
class Login
{
    public function login()
    {
        if (empty($_POST["email"])) {
            die("Email is required");
        }
        
        if (empty($_POST["password"])) {
            die("Password is required");
        }
        
        $crud = new Crud();
        
        $sql = "SELECT * FROM users WHERE email = ?";
        
        $stmt = $crud->read($sql);
        
        if ($stmt->num_rows === 0) {
            die("Email not found");
        }
        
        $row = $stmt->fetch();
        
        if (password_verify($_POST["password"], $row["passHash"])) {
            session_start();
            $_SESSION["user"] = $row["username"];
            header("location: index.php");
            exit;
        } else {
            die("Password incorrect");
        }
    }
}