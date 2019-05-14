<?php
/**
 * esta clase ya no esta en el diagrama (revisar)
 */
class ModifiableIngredient
{
  private $modification;
  private $name;

  function __construct($modification=null, $name=null)
  {
    $this->modification=$modification;
    $this->name=$name;
  }
  public function getModification()
  {
    return $this->modification;
  }
  public function setModification($modification)
  {
    $this->modification=$modification;
  }
  public function getName($name)
  {
    return $this->name;
  }
  public function setName($name)
  {
    $this->name=$name;
  }
}

 ?>
