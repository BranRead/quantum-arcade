<?php
use Crud.php;

namespace processSIgnUp;

class processSignUp
{
    public function signUp()
    {
        if (empty($_POST["username"])) {
            die("Username is required");
        }
        
        if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            die("A valid email is required");
        }
        
        if (strlen($_POST["password"]) < 8) {
            die("Password needs to have at least 8 characters!");
        }
        
        if (!preg_match("/[a-z]/i", $_POST["password"])) {
            die("Password needs to contain at lest one letter!");
        }
        
        if (!preg_match("/d/i", $_POST["password"])) {
            die("Password needs to contain at lest one number!");
        }
        
        if ($_POST["password"] !== $_POST["password_conf"]) {
            die("Passwords needs to match");
        }
        
        $crud = new Crud();
        
        $passHash = password_hash($_POST["password"], PASSWORD_DEFAULT);
        
        $crud->create(["username" => $_POST["username"], "email" => $_POST["email"], "passHash" => $passHash], "users");
    }
}
