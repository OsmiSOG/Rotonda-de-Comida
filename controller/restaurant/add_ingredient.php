<?php
ini_set('display_errors', 1);
error_reporting(-1);

session_start();
include_once '../../model/DAO/IngredientManagement.php'; // incluir dao
include_once '../../model/transferObject/Ingredient.php';
include_once '../../model/DAO/ModifiableManagement.php';
include_once '../../model/transferObject/ModifiableIngredient.php';

$info = '';
if (isset($_SESSION['restaurant'])) {
  $ingredientDAO = new IngredientManagement();
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ingredient = new Ingredient();
    $name = $_POST['name'];
    $quantity = $_POST['quantity'];
    $modifiable = ($_POST['modifiable'] == 'yes') ? 1 : 0 ;
    $modifiableType = '';
    $replacement = '';
    if ($modifiable == 1) {
      $modifiableType = $_POST['modifiable-type'];
      if ($modifiableType == 3) {
        $replacement = $_POST['replacement'];
      }
    }
    $ingredient -> setName($name);
    $ingredient -> setQuantity($quantity);
    $ingredient -> setModifiable($modifiable);
    $ingredientDAO -> insertIngredient($ingredient);
    $ingredient -> setIdIngredient($ingredientDAO -> getLastIdIngredient());
    if ($modifiable == 1) {
      $modifiableDAO = new ModifiableManagement();
      $modifiableIngredient = new ModifiableIngredient();
      $modifiableIngredient -> setModification($modifiableType);
      if ($modifiableType == 3) {
        $modifiableIngredient -> setName($replacement);
      }
      $modifiableDAO -> insertModifiableIngredientToIngredient($modifiableIngredient, $ingredient->getIdIngredient());
    }
    $info = 'Ingrediente agregado';
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
