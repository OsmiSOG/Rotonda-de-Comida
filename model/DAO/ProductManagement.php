<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/Rotonda-de-Comida/model/interfaces/InterfaceProduct.php';
  require_once $_SERVER['DOCUMENT_ROOT'].'/Rotonda-de-Comida/model/dataSource/Connection.php';
  require_once $_SERVER['DOCUMENT_ROOT'].'/Rotonda-de-Comida/model/transferObject/Product.php';

  /**
   *
   */
  class ProductManagement implements InterfaceProduct
  {
    public function getProductosByMenu($idMenu)
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
    public function insertProductToMenu($product='')
    {
      $dataBase = new ConnectionDB();
      $sql = '';
      $result = $dataBase -> executeInsert($sql);

      return $result;
    }
    public function deleteProduct($idProduct='')
    {
      $dataBase = new ConnectionDB();
      $sql = '';
      $result = $dataBase -> executeDelete($sql);

      return $result;
    }
  }

?>
