<?php
include('init.php');

$init->initDb();
$page_id=$init->initPageId();
$init->initFluttery($page_id);


var_dump($global);
echo '<span style="color:red">FF</span>';

include('header.php'); 


//include('take.php');
include('footer.php'); 
?>
