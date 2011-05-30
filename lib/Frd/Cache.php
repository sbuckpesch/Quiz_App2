<?php
class Frd_Cache
{
  protected $_path='';

  public function __construct($dir)
  {
   $this->_path=$dir; 
  }

  public function save($str,$name)
  {
    file_put_contents($this->_path.'/'.$str,$name); 
  }
  
  public function get($name)
  {
    return file_get_contents($name); 
  }
}
