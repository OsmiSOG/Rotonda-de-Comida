<?php
ini_set('display_errors', 1);
error_reporting(-1);

session_start();
include_once '../../model/DAO/ClientManagement.php'; // incluir dao


if (isset($_SESSION['client'])) {
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $client =  new Client();
    if ($clientDAO -> getClientByIdentification($_POST['identification']) == null) {
      $error = 'El usuario no existente';
    }else {
      $client -> setDirection(array($_POST['country'], $_POST['city'], $_POST['nomenclature']));
    }
  }else{
    $locationDao = new DirectionsManagement();
    if(isset($_GET['country'])){
      $cities = $locationDao -> getCitiesByCountry($_GET['country']);
      echo json_encode(array('cities'=>$cities,'success'=>true));
      return;
    } else {
      $countries = $locationDao -> getCountries();
    }
  }
} else  {
  // code...
  header('location: ../index.php');
}

require_once '../../views/client/add_direction.php';
 ?>
