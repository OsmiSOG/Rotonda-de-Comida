<?php

session_start();
include_once '../../model/DAO/ClientManagement.php'; // incluir dao
include_once '../../model';
if (isset($_SESSION['client'])) {
  // code...
} else  {
  // code...
  header('location: ../inicio.php');
}

require_once '../../views/client/add_direction.php';
 ?>
