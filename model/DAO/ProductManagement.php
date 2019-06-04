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
      return $products;
    }
    public function getCategories()
    {
      $dataBase = new ConnectionDB();
      $sql = 'SELECT * FROM Categorias';
      $result = $dataBase -> executeQuery($sql);
      $categories = null;
      if ($result != false) {
        $categories = $result;
      }
      return $categories;
    }
    public function insertProduct($product, $idCategory)
    {
      $dataBase = new ConnectionDB();
      $sql = 'INSERT INTO Productos (idProducto, nombre, precio, idCategoria) VALUES (null, :nombre, :precio, :idCategoria)';
      $result = $dataBase -> executeInsert($sql, array(
        ':nombre' => $product -> getName(),
        ':precio' => $product -> getPrice(),
        ':idCategoria' => $idCategory
      ));
      return $result;
    }
    public function insertProductToMenu($idProduct='', $idMenu){
      $dataBase = new ConnectionDB();
      $sql = 'INSERT INTO MenusPorProductos (idMenu, idProducto) VALUES (:idMenu, :idProduct)';
      $result = $dataBase -> executeInsert($sql, array(
        ':idMenu' => $idMenu,
        ':idProduct'=> $idProduct
      ));
      return $result;
    }
    public function deleteProduct($idProduct='')
    {
      $dataBase = new ConnectionDB();
      $sql = '';
      $result = $dataBase -> executeDelete($sql);

      return $result;
    }
    public function getLastIdProduct()
    {
      $dataBase = new ConnectionDB();
      $idProduct = $dataBase -> executeQuery('SELECT MAX(idProducto) AS lastId FROM Productos');
      return $idProduct[0]['lastId'];
    }
  }

?>
