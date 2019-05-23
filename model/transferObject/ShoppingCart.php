<?php
/**
 *
 */
class ShoppingCart
{
  private $order;
  private $products = array();
  private $menus =array();

  function __construct($order=null, $products=null, $menus=null)
  {
    $this->order=$order;
    $this->product=$products;
    $this->menu=$menus;
  }
  public function getOrder()
  {
    return $this->order;
  }
  public function setOrder($order)
  {
    $this->order=$order;
  }
  public function getProducts()
  {
    return $this->product;
  }
  public function setProducts($products)
  {
    $this->product=$products;
  }
  public function getMenus()
  {
    return $this->menu;
  }
  public function setMenus($menus)
  {
    $this->menu=$menus;
  }
}


?>
