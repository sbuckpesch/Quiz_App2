<?php
 require("init.php");

$participant=new Participants();

var_dump($_POST);
if(isset($_POST['user_id']))
{
  $participant->save($_POST['user_id'],$_POST);
}

?>
