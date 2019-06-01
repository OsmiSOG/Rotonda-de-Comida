<?php

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
