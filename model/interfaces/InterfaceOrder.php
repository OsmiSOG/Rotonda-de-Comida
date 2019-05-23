<?php
  /**
   *
   */
  interface InterfaceOrder
  {
    public function InsertOrder($order);
    public function selectOrdersByClient($idClient);
    public function selectLastOrderByRestaurant($idRestaurant);
    public function updateOrderActive($idClient);
    public function selectOrdersByRestaurant($idRestaurant);
    public function selectOrdersActive($idRestaurant);

  }

?>
