<?php
session_start();
require_once 'crud.php';
//require_once 'config.php';

$crud = new crud();

if (isset($_POST["changeUsernameInput"])) {
    $newUsername = $_POST["changeUsernameInput"];
    $userID = $_SESSION["userID"];
    $location = $_POST["location"];

    try {
        $crud->updateUsername($newUsername, $userID, $location);
    } catch (Exception $e) {
        die("err: " . $e->getMessage());
    }
}