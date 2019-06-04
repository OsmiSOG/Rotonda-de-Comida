<?php

session_start();
include_once '../../model/DAO/ClientManagement.php'; // incluir dao
include_once '../../model/transferObject/Restaurant.php';
$restaurants = array();
if (isset($_SESSION['client'])) {
  $restaurantDAO = new ClientManagement();
  $restaurant = new Restaurant();
  $Allrestaurants = $restaurantDAO -> getRestaurants($nit);
} else  {
  // code...
  header('location: ../inicio.php');
}

require_once '../../views/client/restaurants.php';
 ?>
