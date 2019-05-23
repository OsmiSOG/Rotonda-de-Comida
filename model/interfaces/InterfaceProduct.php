<?php
  /**
   *
   */
  interface InterfaceProcuct
  {
    public function insertProduct($product);
    public function selectProductsByMenu($idMenu);
    public function selectProductsByRestaurant($idRestaurant);
    public function deleteProduct($idProduct);
  }

?>
