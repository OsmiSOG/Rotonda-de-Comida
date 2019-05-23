<?php
  session_start();
  include_once '';

  if (isset($_SESSION['client'])) {
    header('location: restaurants.php');
  } else {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    }
  }

  require_once '../../views/client/sign_up.php';
?>
