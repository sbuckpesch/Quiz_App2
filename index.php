<?php
include('init.php');

$init->initDb();
$init->initFluttery();
$page_id=$init->initPageId();

echo '<span style="color:red">FF</span>';

include('header.php'); 

//include('take.php');
include('footer.php'); 
?>
