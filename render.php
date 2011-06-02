<?php
require('init.php');
//return  rendered  template file


if(isset($_POST['page']) )
{
  $page=$_POST['page'];
  $params=$_POST;
}
else if(isset($_GET['page']) )
{
  $page=$_GET['page'];
  $params=$_GET;
}

unset($params['page']);

if(isset($_POST['page_id']))
{
  $_GET['page_id']=$_POST['page_id'];
  init_fluttery();
  $params['global']=$global;
}

render($page,$params);
  /*
else
{
$template=$_POST['template'];
  $page=$_POST['template'];

  if($template == 'question')
  {
    render("block/question.php",$_POST);
  }
  if($template == 'answer')
  {
    render("block/answer.php",$_POST);
  }
  if($template == 'warning')
  {
    render("block/warning.php",$_POST);
  }
  if($template == 'outcome')
  {
    render("block/outcome.php",$_POST);
  }
}
   */
