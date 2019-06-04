<?php
  /**
   *
   */
  interface InterfaceIngredient
  {
    public function getIngredients();
    public function getIngredientsByMenu($idMenu);
    public function getIngredientsByProduct($idProduct);
    public function insertIngredientToProduct($idIngredient, $idProduct);
    public function insertIngredient($ingredient);
    public function getLastIdIngredient();
    // public function getIngredient($ingredient);
    // public function getIngredientsByRestaurant($idRestaurant);
  }

?>
