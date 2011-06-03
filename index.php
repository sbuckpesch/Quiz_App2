<?php
include('init.php');

session_start();
//$gsession

unset($_SESSION['default']);
//var_dump($_SESSION);

$page_id=$init->initPageId();
$init->initFluttery(0,$page_id);

//print_r($global->config);



include('header.php'); 


include('take.php');
include('footer.php'); 
?>
