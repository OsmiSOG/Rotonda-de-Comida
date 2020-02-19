<?php
  /**
   *
   */
  interface InterfaceClient
  {
    public function insertClient($client, $password);
    public function getClientByNumberPhone($numberPhone);
    public function getPasswordByNumberPhone($numberPhone);
    public function getClientByIdentification($identification);
    // public function selectClientsByRestaurants($idRestaurant);
    // public function selectClients();


  }

?>
