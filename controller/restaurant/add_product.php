<?php
session_start();
include_once ''; // incluir dao

if (isset($_SESSION['restaurant'])) {
  // code...
} else  {
  header('location: ../index.php');
}

require_once '../../views/restaurant/add_product.php';


?>
