<?php
ini_set('display_errors', 1);
error_reporting(-1);

session_start();
include_once '../../model/DAO/RestaurantManagement.php';
include_once '../../model/DAO/DirectionsManagement.php';
include_once '../../model/transferObject/Restaurant.php';

$error = '';
$countries = array();
$cities = array();
$specialties = array();
if (isset($_SESSION['restaurant'])) {
  header('location: home.php');
} else {
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $restaurantDAO = new RestaurantManagement();
    $restaurant =  new Restaurant();
    if ($restaurantDAO -> getRestaurantByNit($_POST['NIT']) == null) {
      $restaurant -> setName($_POST['name']);
      $restaurant -> setNit($_POST['NIT']);
      $restaurant -> setDirection(array($_POST['country'], $_POST['city'], $_POST['nomenclature']));
      $restaurant -> setSpecialty($_POST['specialty']);
      $result = $restaurantDAO -> insertRestaurant($restaurant, $_POST['specialty'], password_hash($_POST['password'], PASSWORD_BCRYPT));
      if ($result != false) {
        $_SESSION['restaurant'] = $restaurant -> getNit();
        header('location: home.php');
      }else {
        $error = 'error en el registro';
      }
    } else {
      $error = 'Este restaurante ya existente';
    }
  } else {
    $locationDao = new DirectionsManagement();
    $restaurantDAO = new RestaurantManagement();
    if(isset($_GET['country'])){
      $cities = $locationDao -> getCitiesByCountry($_GET['country']);
      echo json_encode(array('cities'=>$cities,'success'=>true));
      return;
    } else {
      $countries = $locationDao -> getCountries();
      $specialties = $restaurantDAO -> getSpecialties();
    }
  }
}

require_once '../../views/restaurant/sign_up.php';
?>
