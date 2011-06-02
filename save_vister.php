<?php
 require("init.php");

$participant=new Participants();

//var_dump($_POST);
if(isset($_POST['id']))
{
  $participant->save($_POST['id'],$_POST);
}

?>
