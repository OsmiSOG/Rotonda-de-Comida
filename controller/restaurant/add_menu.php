<?php
session_start();
include_once ''; // incluir dao

if (isset($_SESSION['restaurant'])) {
  // code...
} else  {
  // code...
  header('location: ../index.php');
}

require_once '../../views/restaurant/add_menu.php';
?>
