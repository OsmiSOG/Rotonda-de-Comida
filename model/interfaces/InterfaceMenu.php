<?php
  /**
   *
   */
  interface InterfaceMenu
  {
    public function insertMenuToRestaurant($menu, $idRestaurant);
    public function getMenuByRestaurant($idRestaurant);
    // public function deleteMenu($idMenu);
    public function getRestaurantMenus($idRestaurant);
  }

?>
