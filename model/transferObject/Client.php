<?php
  /**
   *
   */
  class Client
  {

    private $name;
    private $cedula;
    private $cellPhone;
    private $direction;

    function __construct($name=null, $cedula=null, $cellPhone=null, $direction=null)
    {
      $this->name=$name;
      $this->cedula=$cedula;
      $this->cellPhone=$cellPhone;
      $this->direction=$direction;
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
    public function getDirection()
    {
      return $this->direction;
    }
    public function setDirection($direction)
    {
      $this->direction=$direction;
    }
  }

?>
