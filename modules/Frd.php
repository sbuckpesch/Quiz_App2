<?php
class Frd
{
  public static function getClass($str)
  {
    $values=explode('/',$str); 

    foreach($values as $k=>$value)
    {
      $values[$k]=ucfirst($value); 
    }

    $class_name=implode("_",$values);
    $class=new $class_name();
    return $class;
  }

  //getModel('party/party/dev/abc');
  //as Party_Party_Dev_Abc()
  public static function getModel($str)
  {
    $values=explode('/',$str); 

    $model=array_shift($values);
    array_unshift($values,$model,"model");

    foreach($values as $k=>$value)
    {
      $values[$k]=ucfirst($value); 
    }

    $class_name=implode("_",$values);
    $class=new $class_name();
    return $class;
  }

  public static function getResource($str)
  {
    $values=explode('/',$str); 

    $model=array_shift($values);
    array_unshift($values,$model,"resource");

    foreach($values as $k=>$value)
    {
      $values[$k]=ucfirst($value); 
    }

    $class_name=implode("_",$values);
    $class=new $class_name();
    return $class;
  }

  public static function getHelper($str)
  {
    $values=explode('/',$str); 

    $model=array_shift($values);
    array_unshift($values,$model,"helper");

    foreach($values as $k=>$value)
    {
      $values[$k]=ucfirst($value); 
    }

    $class_name=implode("_",$values);
    $class=new $class_name();
    return $class;
  }

  public static function getForm($str)
  {
    $values=explode('/',$str); 

    $model=array_shift($values);
    array_unshift($values,$model,"form");

    foreach($values as $k=>$value)
    {
      $values[$k]=ucfirst($value); 
    }

    $class_name=implode("_",$values);
    $class=new $class_name();
    return $class;
  }

  public static function getConfig($str)
  {
    $values=explode('/',$str); 

    $model=array_shift($values);
    array_unshift($values,$model,"config");

    foreach($values as $k=>$value)
    {
      $values[$k]=ucfirst($value); 
    }

    $class_name=implode("_",$values);
    $class=new $class_name();
    return $class;
  }

  public static function getBlock($str)
  {
    $values=explode('/',$str); 

    $model=array_shift($values);
    array_unshift($values,$model,"block");

    foreach($values as $k=>$value)
    {
      $values[$k]=ucfirst($value); 
    }

    $class_name=implode("_",$values);
    $class=new $class_name();
    return $class;
  }


  /**
   * get db 
   */
  public static function getDb($name="default")
  {
    $db='db_'.$name;
    $registry=Zend_Registry::getInstance();

    return $registry->get($db);
  }

  /**
   * get $global
   *
   * @param  string $key  $global's key
   * @return Object  if $key not false, return $global->$key,else return $global
   */
  public static function getGLobal($key=null)
  {
    $registry=Zend_Registry::getInstance();
    $global=$registry->get("GLOBAL");

    if($key != false)
      return $global->$key;
    else
      return $global;

  }

  public static function setGLobal($key,$value)
  {
    $registry=Zend_Registry::getInstance();
    $global=$registry->get("GLOBAL");

    $global->$key=$value;
  }

  //其它辅助函数
  public static function getLoginUserId()
  {
    $id=intval($_COOKIE['id']); 
    return $id;
  }
}
