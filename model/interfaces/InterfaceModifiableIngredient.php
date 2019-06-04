<?php
  /**
   *
   */
  interface InterfaceModifiableIngredient
  {
    public function insertModifiableIngredientToMenu($modifiableIngredient);
    public function getModifiableIngredientByMenu($idMenu);
    public function getModifiableIngredientByProduct($idProduct);
    public function getModifiableIngredientByIngredient($modifiableIngredient);

  }

?>
