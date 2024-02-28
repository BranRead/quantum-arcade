<?php

require_once "crud.php";

if (empty($_POST["username"])) {
    die("Username is required");
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

if ($_POST["password"] !== $_POST["passwordConfirm"]) {
    die("Passwords needs to match");
}

$crud = new Crud();

$passHash = password_hash($_POST["password"], PASSWORD_DEFAULT);

$crud->createUser($_POST['username'], $_POST['email'], $passHash);

header("Location: ../play.php");
