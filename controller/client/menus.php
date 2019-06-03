<?php
ini_set('display_errors', 1);
error_reporting(-1);
session_start();
include_once '../../model/DAO/MenuManagement.php';
include_once '../../model/transferObject/Menu.php';
include_once '../../model/transferObject/Product.php';
include_once '../../model/DAO/RestaurantManagement,php';
include_once '../../model/DAO/ProductManagement.php';
include_once '../../model/transferObject/Restaurant.php';// incluir dao
$menus = array();
if (isset($_SESSION['client'])) {
  $_SESSION['menus']= new Menu();
  $menuDAO = new MenuManagement();
  $menus= $menuDAO -> getRestaurantMenus();
} else  {
  header('location: ../inicio.php');
}
require_once '../../views/client/menus.php';
 ?>
