<?php
include('init.php');

$page_id=$init->initPageId();
$init->initFluttery(0,$page_id);

//print_r($global->config);



include('header.php'); 


include('take.php');
include('footer.php'); 
?>
