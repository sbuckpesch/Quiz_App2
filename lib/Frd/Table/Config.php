<?php
/*
 *
 */
class Frd_Table_Config 
{
  protected $_db='';
  protected $_name='';
  protected $_key='name';
  protected $_value='value';

  function __construct($db,$name,$keyname,$valuename)
  {
    $this->_db=$db; 
    $this->_name=$name; 
    $this->_key=$keyname; 
    $this->_value=$valuename; 
  }
  function  get($key)
  {
    $sql=sprintf("select %s from %s where %s='%s'",$this->_value,$this->_name,$this->_key,$key);
    $row=$this->_db->fetchOne($sql);
    return $row;
  }

  function set($key,$value)
  {
    if($this->has($key))
    {
      $sql=sprintf("update %s set %s='%s' where %s='%s'",$this->_name,$this->_value,$value,$this->_key,$key);
    }
    else
    {
      $sql=sprintf("insert into %s (%s,%s) values('%s','%s')",$this->_name,$this->_key,$this->_value,$key,$value);
    }
    $this->_db->query($sql);
		return true;
  }

  function has($key)
  {
    if($this->get($key) === false) 
      return false;
    else
      return true;
  }
}
