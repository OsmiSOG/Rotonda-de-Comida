<?php
  /**
   *
   */
  class Client
  {

    private $name;
    private $cedula;
    private $cellPhone;
    private $idDirection;

    function __construct($name=null, $cedula=null, $cellPhone=null, $idDirection=null)
    {
      $this->name=$name;
      $this->cedula=$cedula;
      $this->cellPhone=$cellPhone;
      $this->idDirection=$idDirection;
    }

    public function getName()
    {
      return $this->name;
    }
    public function setName($name)
    {
      $this->name=$name;
    }
    public function getCedula()
    {
      return $this->cedula;
    }
    public function setCedula($cedula)
    {
      $this->cedula=$cedula;
    }
    public function getCellPhone()
    {
      return $this->cellPhone;
    }
    public function setCellPhone($cellPhone)
    {
      $this->cellPhone=$cellPhone;
    }
    public function getIdDirection()
    {
      return $this->idDirection;
    }
    public function setIdDirection($idDirection)
    {
      $this->idDirection=$idDirection;
    }
  }

?>
