<?php
  ini_set('display_errors', 1);
  error_reporting(-1);

  session_start();
  include_once '../../model/DAO/ClientManagement.php';
  include_once '../../model/transferObject/Client.php';

  $runState = '';
  if (isset($_SESSION['client'])) {
    header('location: restaurants.php');
  } else {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $cellphone = $_POST['cellphone'];
      $password = $_POST['password'];
      $clientManagement = new ClientManagement();
      $client = $clientManagement -> getClientByNumberPhone($cellphone);
      if ($client != null) {
           if (password_verify($password, $clientManagement-> getPasswordByNumberPhone($cellphone))) {
             $_SESSION['client'] = $cellphone;
             header('location: restaurants.php');
           } else {
             $runState = 'password incorrecto';
           }
      } else {
        $runState = 'Este cliente no existe ';
      }
    }
  }
  require_once '../../views/client/sign_in.php';
?>
