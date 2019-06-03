<?php
session_start();
include_once '../../model/DAO/MenuManagement.php';
include_once '../../model/transferObject/Menu.php';
include_once '../../model/transferObject/Product.php';
include_once '../../model/DAO/RestaurantManagement.php';
include_once '../../model/DAO/ProductManagement.php';
include_once '../../model/transferObject/Restaurant.php';
$menus = array();
if (isset($_SESSION['restaurant'])) {
$menuDAO = new MenuManagement();
$menus = $menuDAO -> getRestaurantMenus($_SESSION['restaurant']);
} else  {
  header('location: ../index.php');
}
require_once '../../views/restaurant/home.php';
?>
