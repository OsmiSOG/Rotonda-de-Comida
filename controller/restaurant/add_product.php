<?php
ini_set('display_errors', 1);
error_reporting(-1);
session_start();
include_once '../../model/DAO/ProductManagement.php'; // incluir dao
include_once '../../model/transferObject/Product.php';
include_once '../../model/DAO/IngredientManagement.php';
include_once '../../model/transferObject/Ingredient.php';

$categories = array();
$ingredients = array();
$info = '';
if (isset($_SESSION['restaurant'])) {
  $productDAO = new ProductManagement();
  $ingredientDAO = new IngredientManagement();
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $product = new Product();
    $product -> setName($_POST['name']);
    $product -> setPrice((float)$_POST['price']);
    $result = $productDAO -> insertProduct($product, (int)$_POST['category']);
    $product -> setIdProduct($productDAO -> getLastIdProduct());
    for ($i=0; $i < count($_POST['ingredient']); $i++) {
      $ingredientDAO -> insertIngredientToProduct((int)$_POST['ingredient'][$i], $product->getIdProduct());
    }
    if($result != false){
      $info = 'Producto agregado';
    }
  }
  $categories = $productDAO -> getCategories();
  $ingredients = $ingredientDAO -> getIngredients();
} else  {
  header('location: ../index.php');
}
require_once '../../views/restaurant/add_product.php';


?>
