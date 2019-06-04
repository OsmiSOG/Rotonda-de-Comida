<?php
ini_set('display_errors', 1);
error_reporting(-1);

session_start();
include_once '../../model/DAO/ClientManagement.php'; // incluir dao
include_once '../../model/DAO/DirectionsManagement.php';
include_once '../../model/transferObject/Client.php';

$countries = '';
$cities = '';
if (isset($_SESSION['client'])) {
  $locationDao = new DirectionsManagement();
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $client =  new Client();
    $clientDAO = new ClientManagement();
    $client = $clientDAO -> getClientByNumberPhone($_SESSION['client']);
    $client -> setDirection(array($_POST['country'], $_POST['city'], $_POST['nomenclature']));
    $clientDAO -> insertNewDirection($client);
  }else{
    if(isset($_GET['country'])){
      $cities = $locationDao -> getCitiesByCountry($_GET['country']);
      echo json_encode(array('cities'=>$cities,'success'=>true));
      return;
    }
  }
  $countries = $locationDao -> getCountries();
} else  {
  // code...
  header('location: ../index.php');
}

require_once '../../views/client/add_direction.php';
 ?>
