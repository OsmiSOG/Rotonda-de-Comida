<?php
  /**
   *
   */
  interface InterfaceProduct
  {
    public function insertProductToMenu($product, $idCategory, $idMenu);
    public function getProductsByMenu($idMenu);
    public function deleteProduct($idProduct);
    // public function getProductsByRestaurant($idRestaurant);
  }

?>
