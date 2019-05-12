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
        $statemet = connect() -> prepare();
        $statemet->execute(array(

        ));
        $result = $statemet -> fetch();

      } catch (PDOException $e) {
        $e->getMessage();
      }
      return $client;
    }

    public function getClient($value='')
    {
      $sql;
    }
    public function getRestaurants($value='')
    {
      $sql;
    }

    public function getRestaurantMenus($value='')
    {
      $sql;
    }

    public function getProductosFromMenu($value='')
    {
      $sql;
    }
    public function getIngredientsFromMenu($value='')
    {
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
  }

?>
