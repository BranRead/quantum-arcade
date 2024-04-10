<?php
session_start();
require_once 'crud.php';

$crud = new crud();

if (isset($_POST["newPasswordConfirm"])) {

    check_password($_POST["oldPassword"]);
    $passHash = $crud->readPassword($_SESSION["userID"]);


    if(password_verify($_POST["oldPassword"], $passHash) && $_POST["newPasswordConfirm"] == $_POST["newPassword"]){
        $newPassword = password_hash($_POST["newPassword"], PASSWORD_DEFAULT);
        $userID = $_SESSION["userID"];
        $location = $_POST["location"];

        try {
            $crud->updatePassword($newPassword, $userID, $location);
        } catch (Exception $e) {
            die("err: " . $e->getMessage());
        }
    }
}

function check_password($password){
    if (strlen($password) < 8) {
        die("Password needs to have at least 8 characters!");
    }

    if (!preg_match("/[a-z]/i", $password)) {
        die("Password needs to contain at lest one letter!");
    }

    if (!preg_match("/[0-9]/i", $password)) {
        die("Password needs to contain at lest one number!");
    }
}
