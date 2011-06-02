<?php
/*
 * Initial process to start the app
 */
// Load config values
error_reporting(E_ALL|E_STRICT);
ini_set('display_errors', 1);
date_default_timezone_set('Europe/Berlin');

//set inclclude path
define("ROOT_PATH",realpath(dirname(__FILE__)));
$global=new ArrayObject();

set_include_path(ROOT_PATH.'/lib/' . PATH_SEPARATOR .
  ROOT_PATH.'/modules/' . PATH_SEPARATOR .
  get_include_path());

//register autoload
require_once "Zend/Loader/Autoloader.php";
Zend_Loader_Autoloader::getInstance()->setFallbackAutoloader(true);

require_once ROOT_PATH.'/config.php';
require_once ROOT_PATH.'/functions.php';

$registry = Zend_Registry::getInstance();

//require_once ROOT_PATH.'/lib/iCon/FacebookAuth.php';
//require_once ROOT_PATH.'/lib/iCon/FacebookUserData.php';
//require_once ROOT_PATH.'/lib/iCon/Helper.php';
//require_once ROOT_PATH.'/lib/iCon/Link.php';
//require_once ROOT_PATH.'/lib/iCon/Translate.php';
//require_once ROOT_PATH.'/lib/phpflickr/phpFlickr.php';

require_once ROOT_PATH.'/lib/jformer.php';

$gsession=new Zend_Session_Namespace('default');

init_db();
init_fluttery();
init_global();

//$next='http://www.facebook.com/apps/application.php?id='.$global->instance['fb_page_id'].'&sk=app_'.$global->instance['fb_app_id'];
//$cancel_url='http://www.facebook.com/apps/application.php?id='.$global->instance['fb_page_id'].'&sk=app_'.$global->instance['fb_app_id'];

//init_facebook(array('next'=>$next,'cancel_url'=>$cancel_url));
//$userdata=new FacebookUserData();

//$registry->set("GLOBAL",$global);
