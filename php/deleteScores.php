<?php
require_once "crud.php";

$crud = new crud;

if (isset($_GET["scoreID"])) {
  $scoreID = $_GET["scoreID"];

  try {
    $crud->deleteScores($scoreID);
  } catch (Exception $e) {
    die("err: at delete scores " . $e->getMessage());
  }
    header("Location: ../play.php");
}


