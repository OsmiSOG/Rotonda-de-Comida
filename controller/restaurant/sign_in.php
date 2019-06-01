<?php
ini_set('display_errors', 1);
error_reporting(-1);

session_start();

include_once '../../model/DAO/RestaurantManagement.php';
include_once '../../model/transferObject/Restaurant.php';

$runState = '';
if (isset($_SESSION['restaurant'])) {
  header('location: home.php');
} else {
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $nit = $_POST ['NIT'];
      $password = $_POST ['password'];
      $restaurantManagement = new RestaurantManagement();
      $restaurant = $restaurantManagement -> getRestaurantByNit($nit);
      if ($restaurant != null) {
           if (password_verify ( $password , $restaurantManagement-> getPasswordByNit($nit) )) {
             $_SESSION['restaurant']= $nit;
             header('location: home.php');

           }else {
             $runState = 'password incorrecto';
           }
      }else {
        $runState = 'este restaurante no existe ';
      }
  }
}
//
require_once '../../views/restaurant/sign_in.php';
?>
