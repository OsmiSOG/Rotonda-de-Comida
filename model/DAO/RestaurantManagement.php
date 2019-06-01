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
      $dataBase = new ConnectionDB();
      $sql='SELECT * FROM Restaurantes';
      $result = $dataBase -> executeQuery($sql);
      $restaurants = null;
      if($result != false){
        $restaurants = array();
        for ($i=0; $i < count($result) ; $i++) {
          $restaurant = new Restaurant();
          $restaurant -> setNit();
          $restaurant -> setName();
          // $restaurant -> setDirection();
          $restaurant -> setSpecialty();
          array_push($restaurants, $restaurant);
        }
      }
      return $restaurants;
    }

    public function insertRestaurant($restaurant, $idSpecialty, $password)
    {
      $dataBase = new ConnectionDB();
      $sql = 'INSERT INTO Restaurates (NIT, nombre, password, idEspecialidad) VALUES (:NIT, :nombre, :password, :idEspecialidad)';
      $result = $dataBase -> executeInsert($sql, array(
        ':NIT'=>$restaurant->getNit(),
        ':nombre'=>$restaurant->getName(),
        ':password'=>$password,
        ':idEspecialidad'=>$idSpecialty
      ));
      $sql = 'INSERT INTO DireccionesRestaurante (idDireccionesRestaurante, idCiudad, direccion, NITRestaurate) VALUES (null, :idCiudad, :direccion, :NITRestaurate)';
      $result = $dataBase->executeInsert($sql, array(
        ':idCiudad' => $restaurant -> getDirection()[1],
        ':direccion' => $restaurant -> getDirection()[2],
        ':NITRestaurate' -> getNit()
      ));
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
