<?php
require_once "crud.php";
$crud = new crud;

if (isset($_GET['deleteID'])) {
    $accountID = $_GET['deleteID'];

    try {
        $crud->deleteAccount($accountID);
        $crud->deleteScores($accountID);
    } catch (Exception $e) {
        die("err at delete account php: " . $e->getMessage());
    }
    header("Location: ../index.html");
}