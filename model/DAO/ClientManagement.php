<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/Rotonda-de-Comida/model/interfaces/InterfaceClient.php';
  require_once $_SERVER['DOCUMENT_ROOT'].'/Rotonda-de-Comida/model/dataSource/Connection.php';
  require_once $_SERVER['DOCUMENT_ROOT'].'/Rotonda-de-Comida/model/transferObject/Client.php';
  /**
   *
   */
  class ClientManagement implements InterfaceClient
  {
    protected $clietLog;

    function __construct()
    {
      parent::__construct();
      $this->clietLog = new Client();
    }

    public function insertClient($client)
    {
      try {
        $client = new Client;
        $statemet = connect() -> prepare('INSERT INTO Clientes (cedula, Nombre, fechaNacimiento, celular) VALUES (:cedula, :nombre, :fechaNacimiento, :celular)');
        $statemet->execute(array(
          ':cedula' => $client -> getIdentification(),
          ':nombre' => $client -> getName(),
          ':fechaNacimiento' => $client -> getBirthdayDate(),
          ':celular' => $client -> getPhone()
        ));
        $statement = null;
      } catch (PDOException $e) {
        $e->getMessage();
      }
      return $client;
    }

    public function getClientXIdentification($identification)
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
    public getPasswordByIdentification($identification){
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
  }

?>
