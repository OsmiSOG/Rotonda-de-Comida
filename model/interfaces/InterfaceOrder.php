<?php
  /**
   *
   */
  interface InterfaceOrder
  {
    public function InsertOrder($order);
    public function selectOrdersByClient($idClient);
    public function selectLastOrderByRestaurant($idRestaurant);
    public function deleteOrderActive($idClient);
  }

?>
