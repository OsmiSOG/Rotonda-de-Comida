<?php
  /**
   *
   */
  interface InterfaceProduct
  {
    public function insertProduct($product='', $idCategory);
    public function insertProductToMenu($product, $idMenu);
    public function getProductsByMenu($idMenu);
    public function deleteProduct($idProduct);
    public function getCategories();
    public function getProductsByCategories();
    // public function getProductsByRestaurant($idRestaurant);
  }

?>
