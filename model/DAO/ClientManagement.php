<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/Rotonda-de-Comida/model/interfaces/InterfaceClient.php';
  require_once $_SERVER['DOCUMENT_ROOT'].'/Rotonda-de-Comida/model/dataSource/Connection.php';
  require_once $_SERVER['DOCUMENT_ROOT'].'/Rotonda-de-Comida/model/transferObject/Client.php';
  /**
   *
   */
  class ClientManagement implements InterfaceClient
  {
    public function insertClient($client, $password)
    {
      $dataBase = new ConnectionDB();
      $sql = 'INSERT INTO Clientes (cedula, Nombre, password, celular) VALUES (:cedula, :nombre, :password, :celular)';
      $result = $dataBase->executeInsert($sql, array(
        ':cedula' => $client -> getCedula(),
        ':nombre' => $client -> getName(),
        ':password' => $password,
        ':celular' => $client -> getCellPhone()
      ));
      $sql = 'INSERT INTO DireccionesCliente (idCiudad, direccion, cedulaCliente) VALUES (:idCiudad, :direccion, :cedulaCliente)';
      $result = $dataBase->executeInsert($sql, array(
        ':idCiudad' => $client -> getDirection()[1],
        ':direccion' => $client -> getDirection()[2],
        ':cedulaCliente' => $client -> getCedula()
      ));
      return $result;
    }

    public function getClientByNumberPhone($numberPhone)
    {
      $dataBase = new ConnectionDB();
      $sql = 'SELECT * FROM Clientes WHERE celular = :celular';
      $result = $dataBase->executeQuery($sql, array(':celular'=>$numberPhone));
      $client = null;
      if(!$result){
        $client = new Client();
        $client -> setIdentification($result['cedula']);
        $client -> setName($result['Nombre']);
        $client -> setPhone($result['celular']);
        // $client -> setDirection();
      }
      return $client;
    }

    public function getPasswordByNumberPhone($numberPhone)
    {
      $dataBase = new ConnectionDB();
      $sql = 'SELECT password FROM Clientes WHERE celular = :celular';
      $result = $dataBase -> executeQuery($sql, $array(':celular'=>$numberPhone));
      $password = null;
      if(!$result){
          $password = $result['password'];
      }
      return $password;
    }
    public function getClientByIdentification($identification='')
    {
      $dataBase = new ConnectionDB();
      $sql = 'SELECT * FROM Clientes WHERE cedula = :cedula';
      $result = $dataBase->executeQuery($sql, array(':cedula'=>$identification));
      $client = null;
      if(!$result){
        $client = new Client();
        $client -> setIdentification($result['cedula']);
        $client -> setName($result['Nombre']);
        $client -> setPhone($result['celular']);
        // $client -> setDirection();
      }
      return $client;
    }
  }

?>
