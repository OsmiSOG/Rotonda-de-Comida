<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/Rotonda-de-Comida/model/dataSource/Connection.php';
  /**
   *
   */
  class DirectionsManagement
  {

    public function getCountries()
    {
      $dataBase = new ConnectionDB();
      $sql = 'SELECT * FROM Paises';
      $result = $dataBase -> executeQuery($sql);

      return $result;
    }
    public function getCitiesByCountry($idCountry)
    {
      $dataBase = new ConnectionDB();
      $sql = 'SELECT idCiudad, ciudad FROM Ciudades WHERE idPais = :idPais';
      $result = $dataBase -> executeQuery($sql, array($idCountry));

      return $result;
    }
  }

?>
