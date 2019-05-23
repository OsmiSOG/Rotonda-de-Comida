<?php
  /**
   *
   */
  interface InterfaceModifiableIngredient
  {
    public function insertModifiableIngredient($modifiableIngredient);
    public function selectModifiableIngredienteByMenu($idMenu);
    public function selectModifiableIngredienteByProduct($idProduct);
    public function selectModifiableIngredienteByIngredient($modifiableIngredient);

  }

?>
