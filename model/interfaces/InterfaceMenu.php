<?php
  /**
   *
   */
  interface InterfaceMenu
  {
    public function insertMenu($menu);
    public function selectMenuByRestaurant($idRestaurant);
    public function deleteMenu($idMenu);
  }

?>
