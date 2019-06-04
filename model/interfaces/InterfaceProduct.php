<?php
  /**
   *
   */
  interface InterfaceProcuct
  {
    public function insertProductToMenu($product);
    public function getProductsByMenu($idMenu);
    public function deleteProduct($idProduct);
    // public function getProductsByRestaurant($idRestaurant);
  }

?>
