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

    public function getSpecialtyXIdRestaurant($idSpecialty)
    {
      try {
        $sql = 'SELECT nombre FROM Especialidades WHERE idEspecialidades = :idEspecialidad;'
        $statemet = connect() -> prepare($sql);
        $statemet -> execute(array('idEspecialidad' => $idSpecialty));
        $result = $statemet -> fetch();
        return $result['nombre'];
      } catch (PDOException $e) {
        $e->getMessage();
      }

    }
    public function getRestaurantMenus($idRestaurant)
    {
      try {
        $menus = array();
        $sql = 'SELECT * FROM Menus
                INNER JOIN RestaurantesPorMenus
                ON idMenu = idMenu
                WHERE NITRestaurate = :$idRestaurant';
        $statemet = connect() -> prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
        $statemet -> execute(array(':$idRestaurant' => $idRestaurant));
        while ($row = $statement->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
          $menu = new Menu();
          $menu -> setIdMenu($row[0]);
          $menu -> setPrice($row[1]);
          $menu -> setName($row[2]);
          $menu -> setProdcuts($this->getProductosFromMenu($row[0]));
          array_push($menus, $menu);
        }
        return $menus;
      } catch (PDOException $e) {
        $e->getMessage();
      }

    }

    public function getProductosFromMenu($idMenu)
    {
      try {
        $products=array()
        $sql = 'SELECT * FROM Productos
        INNER JOIN MenusPorProductos
        ON idProducto = idProducto
        WHERE idMenu = :idMenu';
        $statemet = connect() -> prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
        $statemet -> execute(array(':idMenu'=>$idMenu));
        while ($row = $statement->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)){
          $product = new Product();
          $product -> setIdProduct($row[0]);
          $product -> setName($row[1]);
          $product -> setPrice($row[2]);
          $product -> setCategory($this->getProductCategory());
          $product -> setIngredients($this->getIngredientsFromProduct());
          array_push($products, $product);
        }
      } catch (PDOException $e) {

      }

    }
    public function getProductCategory($idCategory)
    {
      try {
        $sql = 'SELECT * FROM Categorias WHERE idCategoria = :idCategory';
        $statemet = connect() -> prepare($sql);
        $statemet -> execute(array(':idCategory' => $idCategory));
      } catch (PDOException $e) {
        $e -> getMessage();
      }

    }

    public function getIngredientsFromProduct($value='')
    {
      try {

      } catch (PDOException $e) {

      }

      $sql = '';
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
