<?php
/**
 *
 */
class Restaurant
{
  private $name;
  private $nit;
  private $idDirection;
  private $idSpecialty;

  function __construct($name=null, $nit=null, $idDirection=null, $idSpecialty=null)
  {
    $this->name=$name;
    $this->nit=$nit;
    $this->idDirection=$idDirection;
    $this->idSpecialty=$idSpecialty;

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
  public function getIdDirection()
  {
    return $this->idDirection;
  }
  public function setIdDirection($idDirection)
  {
    $this->idDirection=$idDirection;
  }
  public function idSpecialty()
  {
    return $this->specialty;
  }
  public function idSpecialty($idSpecialty)
  {
    $this->idSpecialty=$idSpecialty;
  }

}

 ?>
