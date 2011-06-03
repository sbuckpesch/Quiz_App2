<?php
/*
 * Initial process to start the app
 */
// Load config values
error_reporting(E_ALL|E_STRICT);
ini_set('display_errors', 1);
date_default_timezone_set('Europe/Berlin');

//auto load
//set inclclude path
define("ROOT_PATH",realpath(dirname(__FILE__)));

set_include_path(ROOT_PATH.'/lib/' . PATH_SEPARATOR .
  ROOT_PATH.'/modules/' . PATH_SEPARATOR );

//register autoload
require_once "Zend/Loader/Autoloader.php";
Zend_Loader_Autoloader::getInstance()->setFallbackAutoloader(true);

//necessary files
require_once ROOT_PATH.'/config.php';
require_once ROOT_PATH.'/functions.php';

//global  variables
$global=new ArrayObject();
$gsession=new Zend_Session_Namespace('default');

$registry = Zend_Registry::getInstance();
$registry->set("GLOBAL",$global);
$registry->set("GSESSION",$gsession);


//require_once ROOT_PATH.'/lib/iCon/FacebookAuth.php';
//require_once ROOT_PATH.'/lib/iCon/FacebookUserData.php';
//require_once ROOT_PATH.'/lib/iCon/Helper.php';
//require_once ROOT_PATH.'/lib/iCon/Link.php';
//require_once ROOT_PATH.'/lib/iCon/Translate.php';
//require_once ROOT_PATH.'/lib/phpflickr/phpFlickr.php';

//require_once ROOT_PATH.'/lib/jformer.php';

//init 
$init=new Init();
