<?php
  session_start();
  include_once '../../model/DAO/ClientManagement.php';
  include_once '../../model/DAO/Client.php';
 $runState = '';
  if (isset($_SESSION['client'])) {
    header('location: restaurants.php');
  } else {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $cellphone = $_POST ['cellphone'];
      $password = $_POST ['password'];
      $clientManagement = new ClientManagement();
      $client = $clientManagement -> getClientXIdentification($cellphone);
      if ($client != null) {
           if (password_verify ( $password , $clientManagement-> getPasswordByIdentification($cellphone) )) {
             $_SESSION['client']= $cellphone;
             header('location: restaurants.php');

           }else {
             $runState 'password incorrecto';
           }
      }else {
        $runState ' este cliente no existe '
      }

    }
  }


  require_once '../../views/client/sign_in.php';
?>
