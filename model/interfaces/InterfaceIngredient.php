<?php
  /**
   *
   */
  interface InterfaceIngredient
  {
    public function getIngredients();
    public function getIngredientsByMenu($idMenu);
    public function getIngredientsByProduct($idProduct);
    public function insertIngredientToProduct($ingredient);
    // public function getIngredient($ingredient);
    // public function getIngredientsByRestaurant($idRestaurant);
  }

?>
