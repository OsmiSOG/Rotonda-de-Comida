<?php
  /**
   *
   */
  interface InterfaceModifiableIngredient
  {
    public function insertModifiableIngredientToIngredient($modifiableIngredient, $idIngredient);
    public function getModifiableIngredientByMenu($idMenu);
    public function getModifiableIngredientByProduct($idProduct);
    public function getModifiableIngredientByIngredient($idIngredient);

  }

?>
