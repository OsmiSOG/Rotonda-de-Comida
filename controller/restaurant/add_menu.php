<?php
ini_set('display_errors', 1);
error_reporting(-1);

session_start();
include_once '../../model/DAO/MenuManagement.php'; // incluir dao
include_once '../../model/transferObject/Menu.php';
include_once '../../model/DAO/ProductManagement.php';
include_once '../../model/transferObject/Product.php';

$entrada = '';
$platoFuerte = '';
$bebida = '';
$postre = '';
$acompañamiento = '';
if (isset($_SESSION['restaurant'])) {
  $product = new Product();
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  }

} else  {
  header('location: ../index.php');
}

require_once '../../views/restaurant/add_menu.php';
?>
