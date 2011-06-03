<?php
require("init.php");

$db=Frd::getDb();

echo get_class($db);
exit();
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
