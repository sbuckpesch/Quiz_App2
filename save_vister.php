<?php
require("init.php");

$page_id=$init->initPageId();
$init->initFluttery(0,$page_id);

$db=Frd::getDb();

$participant=new Participants();

$global=Frd::getGlobal();

print_r($global->config);
//var_dump($_POST);
if(isset($_POST['id']))
{
  $participant->save($_POST['id'],$_POST);
  echo 'save';
}
else
echo 'not save';
?>
