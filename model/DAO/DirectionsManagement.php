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
      $sql = '';
      $result = $dataBase -> executeQuery($sql);

      return $result;
    }
    public function getCities()
    {
      $dataBase = new ConnectionDB();
      $sql = '';
      $result = $dataBase -> executeQuery($sql);

      return $result;
    }
  }

?>
