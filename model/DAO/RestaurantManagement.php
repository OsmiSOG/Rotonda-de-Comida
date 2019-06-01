<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/Rotonda-de-Comida/model/interfaces/InterfaceRestaurant.php';
  require_once $_SERVER['DOCUMENT_ROOT'].'/Rotonda-de-Comida/model/dataSource/Connection.php';
  require_once $_SERVER['DOCUMENT_ROOT'].'/Rotonda-de-Comida/model/transferObject/Restaurant.php';
  /**
   *
   */
  class RestaurantManagement implements InterfaceRestaurant
  {


    public function getRestaurants()
    {
      try {
        $restaurants = array();
        $sql='SELECT * FROM Restaurantes';
        $statemet = connect() -> prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
        $statemet->execute();
        while ($row = $statement->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
          $restaurant = new Restaurant();
          $restaurant -> setNIT($row[0]);
          $restaurant -> setName($row[1]);
          $restaurant -> setAddress();
          $restaurant -> calculateAvailability($row[2], $row[3]);
          $restaurant -> specialty($this->getSpecialtyXRestaurant($row[5]));
          $restaurant -> setMenus();
          $restaurant -> setProdcuts();
          array_push($restaurants, $restaurant);
        }
        $result = $statemet->fetch();

      } catch (PDOException $e) {
        $e->getMessage();
      }
    }

    public function insertRestaurant($restaurant)
    {
      $dataBase = new ConnectionDB();
      $sql = '';
      $result = $dataBase -> executeInsert($sql);

      return $result;
    }

    public function getPasswordByNit($Nit){
      try {
        $sql = 'SELECT password FROM Restaurant WHERE NIT = :NIT';
        $statemet = connect() -> prepare($sql);
        $statemet->execute(array(':NIT'=>$identification));
        $result = $statemet->fetch();
        $password = null;
        if(!$result){
            $password = $result['password'];
        }
        $statement = null;
        return $password;
      } catch (PDOException $e) {
        echo $e->getMessage;
      }
    }

    public function getRestaurantByNit($nit='')
    {
      $dataBase = new ConnectionDB();
      $sql = '';
      $result = $dataBase -> executeQuery($sql);

      return $result;
    }

  }

?>
