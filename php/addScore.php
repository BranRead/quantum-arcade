<?php
session_start();
require_once "crud.php";
$crud = new crud;

$json = json_decode(file_get_contents("php://input"));

    if ($json === null) {
        print_r([], "invalid json");
        die;
    } else {
        $userID = $json -> {'userID'};
        $gameID = $json -> {'gameID'};
        $score = $json -> {'score'};
        try {
            $crud->addScore($userID, $gameID, $score);
        } catch (Exception $e) {
            die("err at delete account php: " . $e->getMessage());
        }
    }
