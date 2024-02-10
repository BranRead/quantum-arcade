<?php

$crud = new crud;

if (isset($_GET['DeleteID'])) {
  $accountID = $_GET['DeleteID'];

  try {
    $crud->deleteAccount($accountID);
  } catch (Exception $e) {
    die("err: " . $e->getMessage());
  }
}
