<?php
  require_once '../Connection.php';
  /**
   *
   */
  class UserManagement extends Connection
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
        $client = new Client();
        if(!$result){
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
          $restaurant -> specialty();
          $restaurant -> setMenus();
          $restaurant -> setProdcuts();
          array_push($this->restaurants, $restaurant);
        }
        $result = $statemet->fetch();

      } catch (PDOException $e) {
        $e->getMessage();
      }

    }

    public function getRestaurantMenus($value='')
    {
      try {
        $sql = ;

      } catch (PDOException $e) {
        $e->getMessage();
      }

    }

    public function getProductosFromMenu($value='')
    {
      try {

      } catch (\Exception $e) {

      }

      $sql;
    }
    public function getIngredientsFromMenu($value='')
    {
      try {

      } catch (\Exception $e) {

      }

      $sql;
    }
    public function getIngredientsFromProduct($value='')
    {
      $sql;
    }
    public function getModifiabelIngredients($value='')
    {
      $sql;
    }
    public function getProductsAndIngredentsFromMenu($value='')
    {
      $sql;
    }
    public function insertClientRestaurant($value='')
    {
      $sql;
    }
    public function insertNewOrder($value='')
    {
      // code...
    }
    public function getOrder($value='')
    {
      // code...
    }
    public function getSpecialtyXRestaurant($value='')
    {

    }
  }

?>
