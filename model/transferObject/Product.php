<?php
/**
 *
 */
class Product
{
  private $name;
  private $price;
  private $idProduct;
  private $category;
  private $ingredient;

  function __construct($name=null, $price=null, $idProduct=null, $category=null, $ingredient=null)
  {
    $this->name=$name;
    $this->price=$price;
    $this->idProduct=$idProduct;
    $this->category=$category;
    $this->ingredient=$ingredient;
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
  public function getcategory()
  {
    return $this->category;
  }
  public function setcategory($category)
  {
    $this->category=$category;
  }
  public function getingredient()
  {
    return $this->ingredient;
  }
  public function setingredient($ingredient)
  {
    $this->ingredient=$ingredient;
  }
}
 ?>
