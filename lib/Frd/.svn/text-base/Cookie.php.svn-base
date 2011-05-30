<?php
class Frd_Cookie
{
  public $name=null;
  public $value=null;
  public $expire=0;
  public $path='/';
  public $domain=null;
  public $secure=false;
  public $httponly=false;

  function save()
  {
    if($this->name === null)
    {
      throw new Exception('setcookie must have cookie name'); 
    }

    $ret=setcookie($this->name,$this->value,$this->expire,$this->path,$this->domain,$this->secure,$this->httponly);

    if($ret === false)
    {
      throw new Exception('[save] setcookie failed'); 
    }
  }

  function remove()
  {
    if($this->name === null)
    {
      return false;
    }

    $this->expire=time()-3600;

    $ret=setcookie($this->name,$this->value,$this->expire,$this->path,$this->domain,$this->secure,$this->httponly);

    if($ret === false)
    {
      throw new Exception('[remove] setcookie failed'); 
    }
  }

  function reset()
  {
    $this->name=null;
    $this->value=null;
    $this->expire=0;
    $this->path='/';
    $this->domain=null;
    $this->secure=false;
    $this->httponly=false;
  }


  function loadByName($name)
  {
    if(!isset($_COOKIE[$name])) 
    {
      return false; 
    }

    $this->name=$name;
    $this->value=$_COOKIE[$name];
  }
}
