<?php
session_start();
require_once "crud.php";
$crud = new crud;

if (isset($_POST['data'])) {
    $json = $_POST['data'];
    $json = json_decode($json, true);

    if ($json === null) {
        print_r([], "invalid json");
        die;
    } else {
        $userID = $_SESSION["userID"];
        $gameID = $json['gameID'];
        $score = $json['score'];

        try {
            $crud->addScore($userID, $gameID, $score);
        } catch (Exception $e) {
            die("err at delete account php: " . $e->getMessage());
        }
    }
}else{
    echo "No data";
}
