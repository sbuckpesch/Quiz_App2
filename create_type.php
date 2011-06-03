<?php
include('init.php');
include('header.php'); 

$page_id=$_GET['page_id'];
$init->initFluttery(0,$page_id);

var_dump($page_id);
var_dump($global->config);

//load("template/create_type2.php");
//include('footer.php'); 
?>
