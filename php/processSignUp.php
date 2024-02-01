<?php
if (empty($_POST["name"])) {
    die("Name is required");
}

if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    die("A valid email is required");
}

if (strlen($_POST["password"]) < 8) {
    die("Password needs to have at least 8 characters!");
}

if (!preg_match("/[a-z]/i", $_POST["password"])) {
    die("Password needs to contain at lest one letter!");
}

if (!preg_match("/[0-9]/i", $_POST["password"])) {
    die("Password needs to contain at lest one number!");
}

if ($_POST["password"] !== $_POST["password_conf"]) {
    die("Passwords needs to match");
}

$passHash = password_hash($_POST["password"], PASSWORD_DEFAULT);

$db = require __DIR__ . "/config.php";

$sql = "INSERT INTO users (name, email, passHash) VALUES (?, ?, ?)";

$stmt = $db->stmt_init();

if (!$stmt->prepare($sql)) {
    die("SQL error: " . $db->error);
}

$stmt->bind_param("sss", $_POST["name"], $_POST["email"], $passHash);
if ($stmt->execute()) {
    header("location: signup-success.html");
    exit;
} else {
    if ($db->errno === 1062) {
        die("Email already used.");
    } else {
        die($db->error . " " . $db->errno);
    }
}
