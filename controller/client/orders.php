<?php
ini_set('display_errors', 1);
error_reporting(-1);
include_once '../../model/DAO/MenuManagement.php';
include_once '../../model/transferObject/Menu.php';
include_once '../../model/transferObject/Product.php';
include_once '../../model/DAO/RestaurantManagement,php';
include_once '../../model/DAO/ProductManagement.php';
include_once '../../model/transferObject/Restaurant.php';
session_start();
include_once ''; // incluir dao
$orders= array();
if (isset($_SESSION['client'])) {
  $menuDAO = new MenuManagement();
  $menus = $menuDAO -> getRestaurantMenus();

} else  {
  // code...
  header('location: ../index.php');
}
require_once '../../views/client/orders.php';
?>
