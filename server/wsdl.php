<?php
error_reporting(E_ALL|E_STRICT);
ini_set('display_errors', 1);
#date_default_timezone_set('Asia/shanghai');

//定义根路径
define("ROOT_PATH",realpath(dirname(__FILE__)."/.."));


//设置基本路径
set_include_path(ROOT_PATH.'/lib/');

require_once "Zend/Loader/Autoloader.php";
Zend_Loader_Autoloader::getInstance()->setFallbackAutoloader(true);


require_once(ROOT_PATH.'/server/Fluttery.php');

$uri='http://www.app-arena.com/manager/server/soap.php';
$server=new Zend_Soap_AutoDiscover();
$server->setUri($uri);

$server->setClass('Fluttery');

$server->handle();
