<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/Rotonda-de-Comida/model/dataSource/Connection.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Rotonda-de-Comida/model/interface/interfaceIngredient.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Rotonda-de-Comida/model/transferObject/ingredient.php';

/**
 *
 */
class ingredientManagement implements InterfaceIngredient
{
  public function getIngredientsFromProduct($value='')
  {
    try {

    } catch (PDOException $e) {

    }

    $sql = '';
  }
}

 ?>
