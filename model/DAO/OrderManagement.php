<?php

require_once $_SERVER['DOCUMENT_ROOT'].'rotonda-de-comida/model/dataSource/Connection.php';
require_once $_SERVER['DOCUMENT_ROOT'].'rotonda-de-comida/model/interfaces/InterfaceOrder.php';
require_once $_SERVER['DOCUMENT_ROOT'].'rotonda-de-comida/model/transferObject/Order.php';


class OrderManagement implements InterfaceOrder
{

	    public function insertOrder($order='')
	    {
				$dataBase = new ConnectionDB();
		    $sql = 'INSERT INTO pedidos (idPedido,horaPedido, informacionPedido,estado,  idCliente, NIT)
				 VALUES ( null,:horaPedido, :informacionPedido,:estado, :idCliente, :NIT)';
		    $result = $dataBase -> executeInsert($sql, array(
					':horaPedido' => $order -> getHourOrder(),
					':informacionPedido' => $order -> getInfoOrder(),
					':estado' => $order -> getState(),
					':idCliente' => $order -> getclient(),
					':NIT' => $order -> getNit()
				));
		    return $result;
	    }

			public function getOrdersByClient($idClient='')
	    {
				$dataBase = new ConnectionDB();
		    $sql = 'SELECT * FROM pedidos WHERE idCliente=:idCliente';
		    $result = $dataBase -> executeQuery($sql, array(
					':idCliente' => $idClient
				));
				$order = null;
				if ($result != false) {
					$order = new Order();
					for ($i=0; $i <count($result) ; $i++) {
						$order -> setIdOrder($result[$i]['idPedido']);
						$order -> setHourOrder($result[$i]['horaPedido']);
						$order -> setInfoOrder($result[$i]['informacionPedido']);
						$order -> setState($result[$i]['estado']);
						$order -> setCedula($result[$i]['idCliente']);
						$order -> setNit($result[$i]['NIT']);
					}
				}
		    return $order;
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
