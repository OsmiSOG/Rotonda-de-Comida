<?php
session_start();
include_once ''; // incluir dao

if (isset($_SESSION['home'])) {
  // code...
} else  {
  // code...
  header('location: ../inicio.php');
}

require_once '../../views/restaurant/home.php';
?>