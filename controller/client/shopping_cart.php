<?php


seccion_start();

include_once'';

if (isset($_SESSION['client']) ) {
	# code...
} else {
	header('location: ../inicio.php')
}

require_once '../../views/client/shopping_cart.php';
?>