<?php
ini_set('display_errors', 1);
error_reporting(-1);

session_start();
include_once '../../model/DAO/MenuManagement.php'; // incluir dao
include_once '../../model/transferObject/Menu.php';

if (isset($_SESSION['restaurant'])) {
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  }
} else  {
  header('location: ../index.php');
}

require_once '../../views/restaurant/add_menu.php';
?>
