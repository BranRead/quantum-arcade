<?php
    $server = "localhost";
    $userName = "root";
    $pass = ""
    $dbname = "quantumarcade";

    $conn = new mysqli($server, $userName, $pass, $dbname);

    if ($conn->connect_errno) {
        die("Connection Error: " . $conn->connect_errno);
    }

    return $conn;
