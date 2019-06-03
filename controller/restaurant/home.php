<?php
session_start();
<<<<<<< HEAD
include_once '../../model/DAO/MenuManagement.php';
include_once '../../model/transferObject/Menu.php';
include_once '../../model/transferObject/Product.php';
include_once '../../model/DAO/RestaurantManagement,php';
include_once '../../model/DAO/ProductManagement.php';
include_once '../../model/transferObject/Restaurant.php';
$menus = array();
if (isset($_SESSION['home'])) {
$menuDAO = new MenuManagement();
$menus = $menuDAO -> getRestaurantMenus();
=======
include_once ''; // incluir dao

if (isset($_SESSION['restaurant'])) {
  // code...
>>>>>>> develop
} else  {
  header('location: ../index.php');
}

require_once '../../views/restaurant/home.php';
?>
