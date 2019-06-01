<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/Rotonda-de-Comida/model/dataSource/Connection.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Rotonda-de-Comida/model/interface/interfaceIngredient.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Rotonda-de-Comida/model/transferObject/ingredient.php';

/**
 *
 */
class ingredientManagement implements InterfaceIngredient
{
  public function getIngredients()
  {
    $dataBase = new ConnectionDB();
    $sql = '';
    $result = $dataBase -> executeQuery($sql);

    return $result;
  }
  public function getIngredientsByMenu($idMenu)
  {
    $dataBase = new ConnectionDB();
    $sql = '';
    $result = $dataBase -> executeQuery($sql);

    return $result;
  }
  public function getIngredientsByProduct($idProduct)
  {
    $dataBase = new ConnectionDB();
    $sql = '';
    $result = $dataBase -> executeQuery($sql);

    return $result;
  }
  public function insertIngredientToProduct($ingredient)
  {
    $dataBase = new ConnectionDB();
    $sql = '';
    $result = $dataBase -> executeInsert($sql);

    return $result;
  }
  
}

 ?>
