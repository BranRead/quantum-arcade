<?php

$crud = new crud;

if (isset($_GET["scoreID"])) {
  $scoreID = $_GET["scoreID"];

  try {
    $crud->deleteScores($scoreID);
  } catch (Exception $e) {
    die("err: " . $e->getMessage());
  }
}