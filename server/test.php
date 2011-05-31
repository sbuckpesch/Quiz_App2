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
require_once(ROOT_PATH.'/config.php');

/*
$appkey='root';
$app_id=3;
$instance_id=72;

$fluttery=new Fluttery();
$data=$fluttery->getData($appkey,$app_id,$instance_id);

if($data == false)
  echo $fluttery->getError();
else
 var_dump($data);
 */


$content=<<<HTML
<h1 class="einladen">Jetzt kannst Du Deine Freunde einladen und deine Gewinnchance erh&ouml;hen!</h1>
  <p><img src="/manager/uploads/tinymce_images/46/instances/71/fanwin-einladen.gif" alt="Freunde einladen" width="520" height="355" /></p>
  <p>Mach auch Deine Freunde zu Gewinnern und sichere Dir auf diese Weise selber zus&auml;tzliche Lose f&uuml;r alle Spielrunden. F&uuml;r jeden neu geworbenen Mitspieler schenken wir Dir ein weiteres Los, welches f&uuml;r alle k&uuml;nftigen Spielrunden gilt, an denen Du teilnimmst.</p>
  <p>Am besten l&auml;sst Du Deinen Freunden einfach eine pers&ouml;nliche Empfehlung zukommen. Wer sich dann &uuml;ber den mitgesendeten Link anmeldet wird Die automatisch zugerechnet und Du bekommst ein Zusatzlos.</p>
  <p><img src="/manager/uploads/tinymce_images/46/instances/71/posten.gif" alt="Posten" width="520" height="140" /></p>
  <p>&nbsp;<img src="/manager/uploads/tinymce_images/46/instances/71/senden.gif" alt="" width="520" height="140" /></p>
HTML;


$contents[]=$content;
$fluttery=new Fluttery();
$contents= $fluttery->handleImageTag($contents);


echo $contents[0];
