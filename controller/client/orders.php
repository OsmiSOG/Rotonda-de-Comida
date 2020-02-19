<?php
ini_set('display_errors', 1);
error_reporting(-1);
session_start();
include_once '../../model/DAO/MenuManagement.php';
include_once '../../model/transferObject/Menu.php';
include_once '../../model/transferObject/Product.php';
include_once '../../model/DAO/RestaurantManagement.php';
include_once '../../model/DAO/ProductManagement.php';
include_once '../../model/transferObject/Restaurant.php';

$orders= array();
if (isset($_SESSION['client'])) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $idClient =$_POST['$idClient'];
      $menuDAO = new MenuManagement();
      $restaurantDAO = new RestaurantManagement();
      $ordersDAO= new OrderManagement();
      $orders = $orderDAO -> getOrdersByClient($idClient);
  }
  }else  {
    header('location: ../index.php');
}
require_once '../../views/client/orders.php';
?>
