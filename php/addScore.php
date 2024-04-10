<?php
session_start();
require_once "crud.php";



$crud = new crud;
//    $arr = '{"gameID":1, "score":1}';
//    $json = json_decode($arr);
    $json = json_decode(file_get_contents("php://input"));


//    print($json['data']['gameID']);

    if ($json === null) {
        print_r([], "invalid json");
        die;
    } else {
        $userID = $_SESSION["userID"];
        $gameID = $json->{'gameID'};
        $score = $json->{'score'};

        try {
            $crud->addScore($userID, $gameID, $score);
        } catch (Exception $e) {
            die("err at delete account php: " . $e->getMessage());
        }
    }
}else{
    echo "No data";
}
