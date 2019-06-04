<?php
ini_set('display_errors', 1);
error_reporting(-1);

seccion_start();

include_once'';

if (isset($_SESSION['client']) ) {
	# code...
} else {
	header('location: ../index.php')
}

require_once '../../views/client/shopping_cart.php';
?>
