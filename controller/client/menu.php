<?php
ini_set('display_errors', 1);
error_reporting(-1);
session_start();
include_once '../../model/DAO/MenuManagement.php';
include_once '../../model/transferObject/Menu.php';
include_once '../../model/transferObject/Product.php';
include_once '../../model/DAO/RestaurantManagement,php';
include_once '../../model/DAO/ProductManagement.php';
include_once '../../model/transferObject/Restaurant.php';

$menu = array();
$products = array();
if (isset($_SESSION['client'])) {
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $idMenu =$_SESSION'$idMenu'];
  $menuDAO = new MenuManagement();
  $productsDAO = new ProductManagement();
  $menu = $menuDAO -> getMenuByRestaurant($idMenu);
  $products = $productsDAO -> getProductsByMenu($idMenu);
  $menu -> setIdProduct($products);
    if (isset($_POST['menu'] ){
      $_SESSION['menusOfCar']= array();
      array_push($_SESSION['menusOfCar'],$_POST['menu']  )
    }
  }
} else  {
    header('location: ../index.php');
}

require_once '../../views/client/menu.php';
?>
