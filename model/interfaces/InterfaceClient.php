<?php  
  /**
   * 
   */
  interface InterfaceClient
  {
    public function insertClient($client);
    public function selectClientByNumberPhone($numberPhone);
     
  }
  
?>