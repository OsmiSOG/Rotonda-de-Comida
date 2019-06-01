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
    $sql = 'SELECT * FROM Ingredientes';
    $result = $dataBase -> executeQuery($sql);
    $ingredients = array();
    for ($i=0; $i < count($result); $i++) {
      $ingredient = new Ingredient();
      $ingredient -> setIdIngredient($result[$i]['idIngrediente']);
      $ingredient -> setName($result[$i]['nombre']);
      $ingredient -> setQuantity($result[$i]['cantidad']);
      $ingredient -> setModifiable($result[$i]['modificable']);
      array_push($ingredients, $ingredient);
    }
    return $ingredients;
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
    $sql = 'SELECT * FROM Ingredientes JOIN IngredientesPorProductos
    ON Ingredientes.idIngrediente = IngredientesPorProductos.idIngrediente
    WHERE IngredientesPorProductos.idProducto = :idProduct';
    $result = $dataBase -> executeQuery($sql, array(':idProduct'=>$idProduct));
    for ($i=0; $i < count($result); $i++) {
      $ingredient = new Ingredient();
      $ingredient -> setIdIngredient($result[$i]['idIngrediente']);
      $ingredient -> setName($result[$i]['nombre']);
      $ingredient -> setQuantity($result[$i]['cantidad']);
      $ingredient -> setModifiable($result[$i]['modificable']);
      array_push($ingredients, $ingredient);
    }
    return $result;
  }
  public function insertIngredientToProduct($ingredient, $idProduct)
  {
    $dataBase = new ConnectionDB();
    $sql = 'INSERT INTO Ingredientes (idIngrediente, nombre, cantidad, modificable) VALUES (null, :nombre, :cantidad, :modificable)';
    $result = $dataBase -> executeInsert($sql, array(
      ':nombre' => $ingredient -> getName(),
      ':cantidad' => $ingredient -> getQuantity(),
      ':modificable' => $ingredient -> getModifiable()
    ));
    // $idIngredient = $dataBase -> executeQuery(SELECT MAX(idIngrediente) AS lastId FROM Ingredientes);
    $idIngredient = $dataBase -> connect() -> lastInsertId();
    $sql = 'INSERT INTO IngredientesPorProductos (idProducto, idIngrediente) VALUES (:idProducto, :idIngrediente)';
    $result2 = $dataBase -> executeInsert($sql, array(
      ':idProducto' => $idProduct,
      ':idIngrediente'=> $idIngredient
    ));
    return ($result && $result2);
  }

}

 ?>
