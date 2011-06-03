<?php
include('init.php');

$init->initDb();
$page_id=$init->initPageId();
$init->initFluttery($page_id);



include('header.php'); 


//include('take.php');
include('footer.php'); 
?>
