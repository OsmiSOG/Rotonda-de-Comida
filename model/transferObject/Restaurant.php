<?php
/**
 *
 */
class Restaurant
{
  private $name;
  private $nit;
  private $direction;
  private $specialty;

  function __construct($name=null, $nit=null, $direction=null, $specialty=null)
  {
    $this->name=$name;
    $this->nit=$nit;
    $this->direction=$direction;
    $this->specialty=$specialty;

  }
  public function getName()
  {
    return $this->name;
  }
  public function setName($name)
  {
    $this->name=$name;
  }
  public function setNit()
  {
    return $this->nit;
  }
  public function getNit($nit)
  {
    $this->nit=$nit;
  }
  public function getdirection()
  {
    return $this->direction;
  }
  public function setdirection($direction)
  {
    $this->direction=$direction;
  }
  public function getSpecialty()
  {
    return $this->specialty;
  }
  public function setSpecialty($specialty)
  {
    $this->specialty=$specialty;
  }

}

 ?>
