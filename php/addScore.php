<?php
require_once "crud.php";
$crud = new crud;

$json = json_decode($_REQUEST['data'], true);

if ($json === null){
    print_r([], "invalid json");
    die;
}

//$userID = $_SESSION["userID"];
$gameID = $json['gameID'];
$score = $json['score'];

try {
    $crud->addScore(1, $gameID, $score);
} catch (Exception $e) {
    die("err at delete account php: " . $e->getMessage());
}