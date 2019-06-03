<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/Rotonda-de-Comida/model/interfaces/InterfaceProduct.php';
  require_once $_SERVER['DOCUMENT_ROOT'].'/Rotonda-de-Comida/model/dataSource/Connection.php';
  require_once $_SERVER['DOCUMENT_ROOT'].'/Rotonda-de-Comida/model/transferObject/Product.php';

  /**
   *
   */
  class ProductManagement implements InterfaceProduct
  {
    public function getProductsByMenu($idMenu)
    {
      $dataBase = new ConnectionDB();
      $sql = 'SELECT Productos.idProducto, Productos.nombre, Productos.precio, Categorias.nombre AS categoria FROM Productos
        INNER JOIN MenusPorProductos ON Productos.idProducto = MenusPorProductos.idProducto
        INNER JOIN Categorias ON Productos.idCategoria = Categorias.idCategoria
        WHERE idMenu = :idMenu';
      $result = $dataBase -> executeQuery($sql, array(':idMenu'=>$idMenu));
      $products = null;
      if ($result != false) {
        $products=array();
        for ($i=0; $i < count($result) ; $i++) {
          $product = new Product();
          $product -> setIdProduct($result[$i]['idProducto']);
          $product -> setName($result[$i]['nombre']);
          $product -> setPrice($result[$i]['precio']);
          $product -> setcategory($result[$i]['categoria']);
          array_push($products, $product);
        }

      }
    }
    public function insertProductToMenu($product='', $idCategory, $idMenu)
    {
      $dataBase = new ConnectionDB();
      $sql = 'INSERT INTO Productos (idProducto, nombre, precio, idCategoria) VALUES (null, :precio, :nombre, :idCategoria)';
      $result = $dataBase -> executeInsert($sql, array(
        ':nombre' => $product -> getName(),
        ':precio' => $product -> getPrice(),
        ':idCategoria' => $idCategory
      ));
      // $idIngredient = $dataBase -> executeQuery(SELECT MAX(idIngrediente) AS lastId FROM Ingredientes);
      $idProduct = $dataBase -> connect() -> lastInsertId();
      $sql = 'INSERT INTO MenusPorProductos (idMenu, idProducto) VALUES (:idMenu, :idProduct)';
      $result2 = $dataBase -> executeInsert($sql, array(
        ':idMenu' => $idMenu,
        ':idProduct'=> $idProduct
      ));
      return ($result && $result2);
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
