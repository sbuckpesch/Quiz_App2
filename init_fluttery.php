<?php	
/*
 * Initiate Fluttery Framework
 * The Fluttery Object will load all available config values into an array
 * @author Sebastian Buckpesch (s.buckpesch@iconsultans.eu)
 * @version 0.1
 * @date 04.03.2011
 * 
 */ 

// Load configuration and content

if(isset($_GET['instid']))
  $instid=$_GET['instid'];
else
  $instid=null;

try
{
  $page_id=get_page_id();
  $fluttery = new Fluttery_Fluttery($instid,$ic_app_id,$page_id);

  $instid=$fluttery->getInstanceId();

  $config = $fluttery->config;
  $content = $fluttery->content;
  $instance = $fluttery->instance;

  $global->config = $config;
  $global->content = $content;
  $global->instance = $instance;

  $global->app_id= $global->instance['fb_app_id'];
  $global->app_secret= $global->instance['fb_app_secret'];

  $global->baseurl=$global->instance['fb_canvas_url'];
  $global->appurl='http://apps.facebook.com/'.$global->instance['fb_app_url'].'/';
}
catch(Exception $e)
{
  echo $e->getMessage();
  exit();
}

?>
