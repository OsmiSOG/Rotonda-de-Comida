<?php
ini_set('display_errors', 1);
error_reporting(-1);

session_start();
include_once '../../model/DAO/IngredientManagement.php'; // incluir dao
include_once '../../model/transferObject/Ingredient.php';

if (isset($_SESSION['restaurant'])) {
  $ingredientDAO = new IngredientManagement();
  $ingredient = new Ingredient();
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  } else {
    if(isset($_GET['ingredients'])) {
      $ingredients = $ingredientDAO -> getIngredients();
      $ingredientsResponse = array();
      for ($i=0; $i < count($ingredients); $i++) {
        array_push($ingredientsResponse, array('id'=>$ingredients[$i] -> getIdIngredient(), 'name'=>$ingredients[$i] -> getName()));
      }
      echo json_encode(array('ingredients'=>$ingredientsResponse, 'success'=>true));
      return;
    }
  }
} else  {
  header('location: ../index.php');
}

require_once '../../views/restaurant/add_ingredient.php';
?>
