<?php
  /**
   *
   */
  interface InterfaceIngredient
  {
    public function selectIngredients();
    public function selectIngredientsByMenu($idMenu);
    public function selectIngredientsByProduct($idProduct);
    public function selectIngredientsByRestaurant($idRestaurant);
    public function insertIngredient($ingredient);
  }

?>
