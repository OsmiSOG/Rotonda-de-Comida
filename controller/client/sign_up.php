<?php
ini_set('display_errors', 1);
error_reporting(-1);

session_start();
include_once '../../model/DAO/ClientManagement.php';
include_once '../../model/transferObject/Client.php';

$error = '';
if (isset($_SESSION['client'])) {
  header('location: restaurants.php');
} else {
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $clientDAO = new ClientManagement();
    $client =  new Client();
    if ($clientDAO -> getClientByIdentification($_POST['identification']) == null) {
      $client -> setName($_POST['name']);
      $client -> setCedula($_POST['identification']);
      $client -> setCellPhone($_POST['cellphone']);
      $client -> setDirection(array($_POST['country'], $_POST['city'], $_POST['nomenclature']));
      $result = $clientDAO -> insertClient($client, password_hash($_POST['password'], PASSWORD_BCRYPT));
      if($result == true){
        $_SESSION['client'] = $client -> getCellPhone();
        header('location: restaurants.php');
      }
    } else {
      $error = 'Este usuario ya existente';
    }
  } else {
<<<<<<< HEAD
=======

>>>>>>> develop
  }
}
require_once '../../views/client/sign_up.php';
?>
