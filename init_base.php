<?php
/*
 * Initial process to start the app
 */
// Load config values
include 'config.php';

error_reporting(E_ALL|E_STRICT);
ini_set('display_errors', 0);
date_default_timezone_set('Europe/Berlin');

//set inclclude path
define("ROOT_PATH",realpath(dirname(__FILE__)));
set_include_path(ROOT_PATH.'/lib/' . PATH_SEPARATOR .
  ROOT_PATH.'/modules/' . PATH_SEPARATOR .
  get_include_path());

//register autoload
require_once "Zend/Loader/Autoloader.php";
Zend_Loader_Autoloader::getInstance()->setFallbackAutoloader(true);

$registry = Zend_Registry::getInstance();

/*
//setup database
$db_config=array(
  'host'=>$database_host,
  'username'=>$database_user,
  'password'=>$database_pass,
  'dbname'=>$database_name
);
$db = Zend_Db::factory('pdo_mysql',$db_config);
$db->query('set names utf8');
Zend_Db_Table::setDefaultAdapter($db);
 */
//set global variable
$global=new ArrayObject();
//$global->db=$db;

//require_once 'lib/iCon/FacebookAuth.php';
//require_once 'lib/iCon/FacebookUserData.php';
//require_once 'lib/iCon/Helper.php';
require_once 'lib/iCon/Link.php';
//require_once 'lib/iCon/Translate.php';
require_once dirname(__FILE__).'/functions.php';
//require_once 'lib/phpflickr/phpFlickr.php';
//$helper = new Helper();
//$global->helper = $helper;

//$global->translate=new Translate(dirname(__FILE__)."/langs");
//$global->translate->setLanguage('de');
$global->link=new Link();
// Initialize Fluttery Framework

// some page do not have signed request, 
// e.g.  visit by baseurl+PAGE 
/*
if(isset($_REQUEST['signed_request']))
  $global->fb_user_data= new FacebookUserData($_REQUEST['signed_request']);
else
  $global->fb_user_data= false;
 */


