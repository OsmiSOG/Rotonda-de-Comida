<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/Rotonda-de-Comida/model/dataSource/Connection.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Rotonda-de-Comida/model/interface/interfacesMenu.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Rotonda-de-Comida/model/transferObject/menu.php';

/**
 *
 */
class MenuManagement implements interfacesMenu
{

  public function getRestaurantMenus($idRestaurant)
  {
    $dataBase = new ConnectionDB();
    $menus = array();
    $sql = 'SELECT idMenu, precio, nombre FROM Menus
            INNER JOIN RestaurantesPorMenus
            ON Menus.idMenu = RestaurantesPorMenus.idMenu
            WHERE NITRestaurate = :$idRestaurant';
    $result = $dataBase -> executeQuery($sql, array(':$idRestaurant'=>$idRestaurant));
    for ($i=0; $i < count($result) ; $i++) {
      $menu = new Menu();
      $menu -> setIdMenu($result[$i]['idMenu']);
      $menu -> setName($result[$i]['nombre']);
      $menu -> setPrice($result[$i]['precio']);
      array_push($menus, $menu);
    }
    return $menus;
  }
  public function insertMenuToRestaurant($menu='', $idRestaurant)
  {
    $dataBase = new ConnectionDB();
    $sql = 'INSERT INTO Menus (idMenu, precio, nombre) VALUES (null, :precio, :nombre)';
    $result = $dataBase -> executeInsert($sql, array(
      ':precio' => $ingredient -> getQuantity(),
      ':nombre' => $ingredient -> getName()
    ));
    // $idIngredient = $dataBase -> executeQuery(SELECT MAX(idIngrediente) AS lastId FROM Ingredientes);
    $idMenu = $dataBase -> connect() -> lastInsertId();
    $sql = 'INSERT INTO RestaurantesPorMenus (NITRestaurate, idMenu) VALUES (:idRestaurant, :idMenu)';
    $result2 = $dataBase -> executeInsert($sql, array(
      ':idRestaurant' => $idRestaurant,
      ':idMenu'=> $idMenu
    ));
    return ($result && $result2);
  }
  public function getMenu($idMenu='')
  {
    $dataBase = new ConnectionDB();
    $sql = 'SELECT * FROM Menus WHERE idMenu = :idMenu';
    $result = $dataBase -> executeQuery($sql, array(':idMenu'=>$idMenu));
    $menu = null;
    if ($result != false) {
      $menu = new Menu();
      $menu -> setIdMenu($result[0]['idMenu']);
      $menu -> setName($result[0]['nombre']);
      $menu -> setPrice($result[0]['precio']);
    }
    return $menu;
  }
  public function deleteMenu($idMenu)
  {
    // code...
  }
}

?>
