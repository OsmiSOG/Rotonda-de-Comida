<?php
  /**
   *
   */
  interface InterfaceRestaurant
  {
    public function getRestaurants();
    public function insertRestaurant($restaurant, $idSpecialty, $password);
    public function getPasswordByNit($Nit);
    public function getRestaurantByNit($nit);
    public function getSpecialties();
    // public function deleteRestaurant($idRestaurant);
  }

?>
