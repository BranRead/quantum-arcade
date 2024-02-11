<?php
namespace processSignUp;

use Crud;
class processSignUp
{
    public function signUp()
    {
        if (empty($_POST["userNameRegister"])) {
            die("Username is required");
        }
        
        if (!filter_var($_POST["emailRegister"], FILTER_VALIDATE_EMAIL)) {
            die("A valid email is required");
        }
        
        if (strlen($_POST["passwordRegister"]) < 8) {
            die("Password needs to have at least 8 characters!");
        }
        
        if (!preg_match("/[a-z]/i", $_POST["passwordRegister"])) {
            die("Password needs to contain at lest one letter!");
        }
        
        if (!preg_match("/d/i", $_POST["passwordRegister"])) {
            die("Password needs to contain at lest one number!");
        }
        
        if ($_POST["passwordRegister"] !== $_POST["passwordRegisterConfirm"]) {
            die("Passwords needs to match");
        }
        
        $crud = new Crud();
        
        $passHash = password_hash($_POST["passwordRegister"], PASSWORD_DEFAULT);
        
        $crud->create(["username" => $_POST["userNameRegister"], "email" => $_POST["emailRegister"], "passHash" => $passHash], "useraccounts");

        header("Location: ../play.php");
    }
}
