<?php  
session_start();
include_once '';

if (isset($_SESSION['restaurant'])) {
  header('location: home.php');
} else {    
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
  }
}

require_once '../../views/restaurant/sign_up.php';
?>
