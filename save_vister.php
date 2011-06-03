<?php
require("init.php");

$page_id=$_POST['page_id'];
$init->initFluttery(0,$page_id);

$participant=new Participants();

//var_dump($_POST);
if(isset($_POST['id']))
{
  $participant->save($_POST['id'],$_POST);
  //echo 'save';
}
//else
//echo 'not save';
?>
