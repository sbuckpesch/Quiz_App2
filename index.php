<?php
include('init.php');
include('header.php'); 

//include('take.php');

$page=$_GET['page'];

//if($page == false)
  $page="take.php";
/*
$global->link->parseRequest();
//$global->link->display();

$page=$global->link->getPage('welcome.php');
$template=$global->link->getParam('template','y');  //does this page need template


if($template == 'n')
{
  include $page;
}
else
{
  include 'header.php';

  echo '<div id="content">';
  echo '</div>';
  include 'footer.php';
}
 */
  include $page;
?>

<!--
<a href="index.php?page=create_type.php">create quiz</a>
-->
<?php 
include('footer.php'); 
?>

