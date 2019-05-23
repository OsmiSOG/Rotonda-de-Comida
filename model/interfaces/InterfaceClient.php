<?php
  /**
   *
   */
  interface InterfaceClient
  {
    public function insertClient($client);
    public function selectClientByNumberPhone($numberPhone);
    public function deleteClientByNumberPhone($numberPhone);
    public function selectClients();
    public function selectClientsByRestaurants($idRestaurant);

     
  }

?>
