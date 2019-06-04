<?php


/**
 *
 */
class Ingredient
{

  private $idIngredient;
  private $name;
  private $quantity;
  private $modifiable;

  function __construct($idIngredient=null, $name=null, $quantity=null, $modifiable=null)
  {
    $this->name=$name;
    $this->idIngredient=$idIngredient;
    $this->quantity=$quantity;
    $this->modifiable=$modifiable;
  }

  public function getName()
  {
    return $this->name;
  }
  public function setName($name)
  {
    $this->name=$name;
  }
  public function getIdIngredient()
  {
    return $this->idIngredient;
  }
  public function setIdIngredient($idIngredient)
  {
    $this->idIngredient=$idIngredient;
  }
  public function getQuantity()
  {
    return $this->cuantity;
  }
  public function setQuantity($quantity)
  {
    $this->quantity=$quantity;
  }
  public function getModifiable()
  {
    return $this->modifiable;
  }
  public function setModifiable($modifiable)
  {
    $this->modifiable=$modifiable;
  }

}

?>
