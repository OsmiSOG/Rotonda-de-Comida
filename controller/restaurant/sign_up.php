<?php
ini_set('display_errors', 1);
error_reporting(-1);

session_start();
include_once '../../model/DAO/RestaurantManagement.php';
include_once '../../model/transferObject/Restaurant.php';

$error = '';
if (isset($_SESSION['restaurant'])) {
  header('location: home.php');
} else {
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $restaurantDAO = new RestaurantManagement();
    $restaurant =  new Restaurant();
    if ($restaurantDAO -> getClientXIdentification($_POST['NIT']) == null) {
      $restaurant -> setName($_POST['name']);
      $restaurant -> setNit($_POST['NIT']);
      $restaurant -> setDirection(array($_POST['country'], $_POST['city'], $_POST['nomenclature']));
      $restaurantDAO -> insertClient($restaurant, $_POST['password']);
      $_SESSION['restaurant'] = $restaurant -> getNit();
      header('location: home.php');
    } else {
      $error = 'Este restaurante ya existente';
    }
  }
}

require_once '../../views/restaurant/sign_up.php';
?>
