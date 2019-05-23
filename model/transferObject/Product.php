<?php
/**
 *
 */
class Product
{
  private $name
  private $price;
  private $idProduct;
  private $idCategory;
  private $idIngredient;

  function __construct($name=null, $price=null, $idProduct=null, $idCategory=null, $idIngredient=null)
  {
    $this->name=$name;
    $this->price=$price;
    $this->idProduct=$idProduct;
    $this->idCategory=$idCategory;
    $this->idIngredient=$idIngredient;
  }

  public function getName()
  {
    return $this->name;
  }
  public function setName($name)
  {
    $this->name=$name;
  }
  public function getPrice()
  {
    return $this->price;
  }
  public function setPrice($price)
  {
    $this->price=$price;
  }
  public function getIdProduct()
  {
    return $this->idProduct;
  }
  public function setIdProduct($idProduct)
  {
    $this->idProduct=$idProduct;
  }
  public function getIdCategory()
  {
    return $this->idCategory;
  }
  public function setIdCategory($idCategory)
  {
    $this->idCategory=$idCategory;
  }
  public function getIdIngredient()
  {
    return $this->idIngredient;
  }
  public function setIdIngredient($idIngredient)
  {
    $this->idIngredient=$idIngredient;
  }
}
 ?>
