<?php
ini_set('display_errors', 1);
error_reporting(-1);

session_start();
include_once ''; // incluir dao

if (isset($_SESSION['restaurant'])) {
  // code...
  header('location: ../index.php');
} else  {
  // code...
}
  require_once '../../views/client/orders.php';
?>
