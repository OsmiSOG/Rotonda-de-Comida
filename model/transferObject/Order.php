<?php

/**
 *
 */
class Order
{

  private $idOrder;
  private $hourOrder;
  private $numberOrder;
  private $infoOrder;
  private $state;
  private $client;

  function __construct($idOrder=null, $hourOrder=null, $numberOrder=null, $infoOrder=null, $client=null, $state=null)
  {
    $this->idOrder=$idOrder;
    $this->hourOrder=$hourOrder;
    $this->numberOrder=$numberOrder;
    $this->infoOrder=$infoOrder;
    $this->client=$client;
    $this->state=$state;
  }
  public function getIdOrder()
  {
    return $this->idOrder
  }
  public function setIdOrder($idOrder)
  {
    $this->idOrder=$idOrder;
  }
  public function getHourOrder()
  {
    return $this->hourOrder;
  }
  public function setHourOrder($hourOrder)
  {
    $this->hourOrder=$hourOrder;
  }
  public function getNumberOrder()
  {
    return $this->numberOrder
  }
  public function setNumberOrder($numberOrder)
  {
    $this->numberOrder=$numberOrder;
  }
  public function getInfoOrder()
  {
    return $this->infoOrder;
  }
  public function setInfoOrder($infoOrder)
  {
    $this->infoOrder=$infoOrder;
  }
  public function getclient()
  {
    return $this->client;
  }
  public function setclient($client)
  {
    $this->client=$client;
  }
  public function getState()
  {
    return $this->state;
  }
  public function setState($state)
  {
    $this->state=$state;
  }
}

?>
