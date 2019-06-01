<?php
session_start();
include_once '../../model/DAO/ClientManagement.php';
include_once '../../model/transferObject/Client.php';

$error = '';
if (isset($_SESSION['client'])) {
  header('location: home.php');
} else {
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $clientDAO = new ClientManagement();
    $client =  new Client();
    if ($clientDAO -> getClientXIdentification($_POST['identification']) == null) {
      $client -> setName($_POST['name']);
      $client -> setCedula($_POST['identification']);
      $client -> setCellPhone($_POST['cellphone']);
      $client -> setDirection(array($_POST['country'], $_POST['city'], $_POST['nomenclature']));
      $clientDAO -> insertClient($client, $_POST['password']);
      $_SESSION['client'] = $client -> getCellPhone();
      header('location: home.php');
    } else {
      $error = 'Este usuario ya existente';
    }
  }
}

require_once '../../views/client/sign_up.php';
?>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              
