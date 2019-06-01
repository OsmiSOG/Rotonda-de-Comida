<?php
  /**
   *
   */
  interface InterfaceOrder
  {
    public function InsertOrder($order);
    public function getOrdersByClient($idClient);
    public function getLastOrderByRestaurant($idRestaurant);
    public function updateOrderActive($idClient);
    public function selectOrdersByRestaurant($idRestaurant);
    public function selectOrdersActiveByRestaurant($idRestaurant);

  }

?>
