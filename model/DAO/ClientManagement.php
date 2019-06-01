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
      try {
        $sql = 'SELECT * FROM Clientes WHERE Cedula = :cedula';
        $statemet = connect() -> prepare($sql);
        $statemet->execute(array(':cedula'=>$identification));
        $result = $statemet->fetch();
        $client = null;
        if(!$result){
          $client = new Client();
          $client -> setIdentification($result['cedula']);
          $client -> setName($result['Nombre']);
          $client -> setBirthdayDate($result['fechaNacimiento']);
          $client -> setPhone($result['celular']);
        }
        $statement = null;
        return $client;
      } catch (PDOException $e) {
        echo $e->getMessage;
      }
    }
    
    public function getPasswordByNumberPhone($numberPhone)
    {
      try {
        $sql = 'SELECT password FROM Clientes WHERE Cedula = :cedula';
        $statemet = connect() -> prepare($sql);
        $statemet->execute(array(':cedula'=>$identification));
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
    public function getClientByIdentification($identification='')
    {
      
    }
  }

?>
