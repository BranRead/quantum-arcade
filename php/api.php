<?php
    session_start();

    if ($_SERVER['REQUEST_METHOD'] == "GET") {
        header("Content-Type: application/json");
        if (!isset($_SESSION['userID'])) {
            echo 1;
        } else {
            echo $_SESSION['userID'];
        }
    }
