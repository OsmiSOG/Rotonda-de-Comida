<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/Rotonda-de-Comida/model/dataSource/Connection.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Rotonda-de-Comida/model/interface/interfacesMenu.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Rotonda-de-Comida/model/transferObject/menu.php';

/**
 *
 */
class menuManagement implements interfacesMenu
{

  public function getRestaurantMenus($idRestaurant)
  {
    try {
      $menus = array();
      $sql = 'SELECT * FROM Menus
              INNER JOIN RestaurantesPorMenus
              ON idMenu = idMenu
              WHERE NITRestaurate = :$idRestaurant';
      $statemet = connect() -> prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
      $statemet -> execute(array(':$idRestaurant' => $idRestaurant));
      while ($row = $statement->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
        $menu = new Menu();
        $menu -> setIdMenu($row[0]);
        $menu -> setPrice($row[1]);
        $menu -> setName($row[2]);
        $menu -> setProdcuts($this->getProductosFromMenu($row[0]));
        array_push($menus, $menu);
      }
      return $menus;
    } catch (PDOException $e) {
      $e->getMessage();
    }

  }
}

?>
