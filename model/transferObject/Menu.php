<?php
/**
 *
 */
class Menu
{
  private $idMenu;
  private $name;
  private $price;
  private $Products;

  function __construct($name=null, $idMenu=null, $price=null, $idProducts=null)
  {
    $this->name=$name;
    $this->idMenu=$idMenu;
    $this->price=$price;
    $this->idProducts=$idProducts;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setName($name)
  {
    $this->name=$name;
  }
  public function getIdMenu()
  {
    return $this->idMenu;
  }
  public function setIdMenu($idMenu)
  {
    $this->idMenu=$idMenu;
  }
  public function getPrice()
  {
    return $this->price;
  }
  public function setPrice($price)
  {
    $this->price=$price;
  }
  public function getProducts()
  {
    return $this->Products;
  }
  public function setIdProducts($Products)
  {
    $this->Products=$Products;
  }

}

 ?>
