<?php
  /**
   *
   */
  interface InterfaceRestaurant
  {
    public function getRestaurants();
    public function insertRestaurant($restaurant);
    public function getPasswordByNit($Nit);
    public function getRestaurantByNit($nit);
    // public function deleteRestaurant($idRestaurant);
  }

?>
