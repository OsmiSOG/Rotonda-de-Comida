<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/rotonda-de-comida/model/dataSource/Connection.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/rotonda-de-comida/model/interfaces/InterfaceOrder.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/rotonda-de-comida/model/transferObject/Order.php';


class OrderManagement implements InterfaceOrder
{

	    public function insertOrder($order='')
	    {
				$dataBase = new ConnectionDB();
		    $sql = '';
		    $result = $dataBase -> executeInsert($sql);

		    return $result;
	    }

			public function getOrdersByClient($idClient='')
	    {
				$dataBase = new ConnectionDB();
		    $sql = '';
		    $result = $dataBase -> executeQuery($sql);

		    return $result;
	    }
			public function getLastOrderByRestaurant($idRestaurant='')
			{
				$dataBase = new ConnectionDB();
		    $sql = '';
		    $result = $dataBase -> executeQuery($sql);

		    return $result;
			}
			public function updateOrderActive($value='')
			{
				$dataBase = new ConnectionDB();
		    $sql = '';
		    $result = $dataBase -> executeQuery($sql);

		    return $result;
			}
			public function selectOrdersByRestaurant($idRestaurant='')
			{
				$dataBase = new ConnectionDB();
		    $sql = '';
		    $result = $dataBase -> executeQuery($sql);

		    return $result;
			}
			public function selectOrdersActiveByRestaurant($idRestaurant='')
			{
				$dataBase = new ConnectionDB();
		    $sql = '';
		    $result = $dataBase -> executeQuery($sql);

		    return $result;
			}
}
?>
