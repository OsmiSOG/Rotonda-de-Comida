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
          $restaurant -> setNit($result[$i]['NIT']);
          $restaurant -> setName($result[$i]['nombre']);
          // $restaurant -> setDirection();
          $restaurant -> setSpecialty($result[$i]['idEspecialidad']);
          array_push($restaurants, $restaurant);
        }
      }
      return $restaurants;
    }

    public function insertRestaurant($restaurant, $idSpecialty, $password)
    {
      $dataBase = new ConnectionDB();
      $sql = 'INSERT INTO Restaurantes (NIT, nombre, password, idEspecialidad) VALUES (:NIT, :nombre, :password, :idEspecialidad)';
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
        ':NITRestaurate' => $restaurant -> getNit()
      ));
      return $result;
    }

    public function getPasswordByNit($Nit){
      $dataBase = new ConnectionDB();
      $sql = 'SELECT password FROM Restaurantes WHERE NIT = :NIT';
      $result = $dataBase -> executeQuery($sql, array(':NIT'=>$Nit));
      $password = null;
      if($result != false){
          $password = $result[0]['password'];
      }
      return $password;

    }

    public function getRestaurantByNit($nit='')
    {
      $dataBase = new ConnectionDB();
      $sql = 'SELECT NIT, Restaurantes.nombre AS restaurante, password, Especialidades.nombre AS especialidad FROM Restaurantes JOIN Especialidades
      ON Restaurantes.idEspecialidad = Especialidades.idEspecialidades
      WHERE NIT = :NIT';
      $result = $dataBase -> executeQuery($sql, array(':NIT'=>$nit));
      $restaurant = null;
      if ($result != false) {
        $restaurant = new Restaurant();
        $restaurant -> setName($result[0]['restaurante']);
        $restaurant -> setNit($result[0]['NIT']);
        $sqlDir = 'SELECT idDireccionesRestaurante, ciudad, direccion FROM DireccionesRestaurante JOIN Ciudades
        ON DireccionesRestaurante.idCiudad = Ciudades.idCiudad
        WHERE NITRestaurate = :NIT';
        $restaurant -> setDirection($dataBase -> executeQuery($sqlDir, array(':NIT'=>$nit)));
        $restaurant -> setSpecialty($result[0]['especialidad']);
      }
      return $result;
    }

    public function getSpecialties()
    {
      $dataBase = new ConnectionDB();
      $sql = 'SELECT * FROM Especialidades';
      $result = $dataBase -> executeQuery($sql);

      return $result;
    }
  }

?>
