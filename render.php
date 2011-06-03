<?php
require('init.php');

$page_id=$_POST['page_id'];
$init->initFluttery(0,$page_id);
//return  rendered  template file


if(isset($_POST['page']) )
{
  $page=$_POST['page'];
  $params=$_POST;
}

//render
$path=dirname(__FILE__);

$view=new Zend_View();
$view->setBasePath($path);
$view->setScriptPath('template');
$view->global=$global;
$view->page_id=$page_id;
$view->params=$params;

echo $view->render($page);
