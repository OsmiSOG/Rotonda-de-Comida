<?php

session_start();
include_once ''; // incluir dao

if (isset($_SESSION['client'])) {
  // code...
} else  {
  // code...
  header('location: ../inicio.php');
}

require_once '../../views/client/menu.php';
 ?>
