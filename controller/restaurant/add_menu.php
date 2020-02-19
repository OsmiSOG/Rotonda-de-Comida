<?php
ini_set('display_errors', 1);
error_reporting(-1);

session_start();
include_once '../../model/DAO/MenuManagement.php'; // incluir dao
include_once '../../model/transferObject/Menu.php';
include_once '../../model/DAO/ProductManagement.php';
include_once '../../model/transferObject/Product.php';

$categories = '';
$info = '';
if (isset($_SESSION['restaurant'])) {
  $product = new Product();
  $productDAO = new ProductManagement();
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $menuDAO = new MenuManagement();
    $menu = new Menu();
    $menu -> setName($_POST['name']);
    $menu -> setPrice($_POST['price']);
    $menuDAO -> insertMenuToRestaurant($menu, $_SESSION['restaurant']);
    $menu -> setIdMenu($menuDAO -> getLastIdMenu());
    if(isset($_POST['entrada'])){
      $productDAO -> insertProductToMenu($_POST['entrada'], $menu -> getIdMenu());
    }
    if (isset($_POST['platoFuerte'])) {
      $productDAO -> insertProductToMenu($_POST['platoFuerte'], $menu -> getIdMenu());
    }
    if (isset($_POST['bebida'])) {
      $productDAO -> insertProductToMenu($_POST['bebida'], $menu -> getIdMenu());
    }
    if (isset($_POST['postre'])) {
      $productDAO -> insertProductToMenu($_POST['postre'], $menu -> getIdMenu());
    }
    if (isset($_POST['acompañamiento'])) {
      $productDAO -> insertProductToMenu($_POST['acompañamiento'], $menu -> getIdMenu());
    }
  }
  $info = 'Menu registrado :)';
  $categories = $productDAO -> getProductsByCategories();
} else  {
  header('location: ../index.php');
}

require_once '../../views/restaurant/add_menu.php';
?>
