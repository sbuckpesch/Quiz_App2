<?php
/*
 * 仿照 Zend  文件路径方式
 */
 class Frd_Loader
 {
    public static function loadClass($classname,$dirs=null)
    {
      $dir=str_replace("_","/",$classname);
      require($dir.".php");
    }
    public static function autoload($classname)
    {
      self::loadClass($classname); 
    } 
 }

