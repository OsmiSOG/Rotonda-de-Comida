<?php
ini_set('display_errors', 1);
error_reporting(-1);

session_start();
include_once '../../model/DAO/RestaurantManagement.php'; // incluir dao
include_once '../../model/transferObject/Restaurant.php';
$restaurants = array();
if (isset($_SESSION['client'])) {
  $restaurantDAO = new RestaurantManagement();
  $restaurant = new Restaurant();
  $Allrestaurants = $restaurantDAO -> getRestaurants();
} else  {
  header('location: ../index.php');
}

require_once '../../views/client/restaurants.php';
 ?>
