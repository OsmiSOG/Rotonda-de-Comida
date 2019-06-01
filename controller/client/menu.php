<?php
ini_set('display_errors', 1);
error_reporting(-1);

session_start();
include_once ''; // incluir dao

if (isset($_SESSION['client'])) {
  // code...
  header('location: ../inicio.php');
} else  {
  // code...
  require_once '../../views/client/menu.php';
}

 ?>
