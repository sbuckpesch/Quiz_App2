<?php
function get_page_id()
{
  if(isset($_GET['page_id']))
  {
    $page_id=intval($_GET['page_id']);
  }
  else if(isset($_POST['fb_sig_page_id']))
  {
    $page_id=$_POST['fb_sig_page_id'];
  }
  else if(isset($_REQUEST['signed_request']))
  {
    $signed_request = $_REQUEST["signed_request"];
    list($encoded_sig, $payload) = explode('.', $signed_request, 2); 
    $data = json_decode(base64_decode(strtr($payload, '-_', '+/')), true);

    if(isset($data['page']))
      $page_id=$data['page']['id'];
    else
      $page_id=false;
  }
  else
  {
    $page_id=false;
  }

  return $page_id;
}


function get_is_admin()
{
  if(isset($_REQUEST['signed_request']))
  {
    $signed_request = $_REQUEST["signed_request"];
    list($encoded_sig, $payload) = explode('.', $signed_request, 2); 
    $data = json_decode(base64_decode(strtr($payload, '-_', '+/')), true);

    if(isset($data['page']['admin']))
      $is_admin=$data['page']['admin'];
    else
      $is_admin=false;
  }
  else
  {
    $is_admin=false;
  }

  return $is_admin;
}

/* useful functions only for this app 
 *
 * 
 */
/* germany character html 
 * &auml;
 * &uuml;
 * &ouml;
 */

/*
 * add js to page
 */
function addJs($file)
{
  global $global;

  $file=str_replace(".js","",$file);

  //$html='<script type="text/javascript" src="'.$global->baseurl.'js/'.$file.'.js"></script>'."\n";
  $html='<script type="text/javascript" src="js/'.$file.'.js"></script>'."\n";
  echo $html;
}

/*
 * add css to page
 */
function addCss($file)
{
  global $global;

  $file=str_replace(".css","",$file);

  $html='<link href="'.$global->baseurl.'css/'.$file.'.css" media="screen" rel="stylesheet" type="text/css" />'."\n";
  echo $html;
}

/*
 * load a record from table
 *
 * @return table object of this recored, or false if not exists
 */
function app_load_record($table,$primary,$value)
{
  $table=new Frd_Table_Common($table,$primary);
  if( $table->load($value) == false)
    return false;
  else
    return $table;
}



/*
 * get current uri
 */
function app_current_uri()
{
  $url='http://'.$_SERVER['HTTP_HOST'].'/'.$_SERVER['REQUEST_URI'];
  return $url;
}

/*
 * cut the description ,make it no more then 150 characters
 *
 * @param description  string 
 * @return string  less then 150 character
 */
function app_cut_description($description)
{
  $description=mb_substr($description,0,150);

  return $description;
}
/*
 *  handle description  ,delete all \n \r for js function
 *
 * @param description  string 
 * @return string  
 */
function app_handle_description($description)
{
  $description=str_replace("\n","",$description);
  $description=str_replace("\r","",$description);
  $description=str_replace("'","",$description);
  $description=str_replace('"',"",$description);
  $description=htmlentities($description,ENT_QUOTES,"UTF-8");

  return $description;
}
/**
 *
 */
function app_string_to_singleline($str)
{
  $str=str_replace("\n","",$str);
  $str=str_replace("\r","",$str);

  return $str;
}
//after user vote photo ,post this message to his facebook
function postto_facebook($link,$photo_url,$description,$caption="",$name="")
{
  global $global;

  $params=array(
    'link'=>$link,
    'picture'=>$photo_url,
    'name'=>$name,
    'caption'=>$caption,
    'description'=>$description,
  ); 
  $global->facebook->api('/me/feed','post',$params);

}
/*
 * redirect to other url ,form iframe app
 * @param url string 
 */
function redirect($url)
{
  global $global;

  //$url=$global->base_url.$url;

  echo '<script>top.location="' . $url . '";</script>';
  exit();
}




//template functions
/**
 * load php file
 */
function load($path)
{
  include(ROOT_PATH.'/'.$path);
}

//create thumbnail image
function create_thumbnail($newfile,$tmpname,$width)
{
  $image = new Image();
  $image->load($tmpname);
  $image->resizeToWidth($width);
  $image->save($newfile);
}

//render a template file,and return the html
function render($file,$params=array())
{
  global $global;
  $path=dirname(__FILE__);

  $view=new Zend_View();
  $view->setBasePath($path);
  $view->setScriptPath('template');
  $view->params=$params;
  $view->global=$global;

  echo $view->render($file);
}

function baseurl()
{
  return '';
  return "http://apps.facebook.com/new_quiz_app/";
}

function image_src($file)
{
  $src=baseurl().'images/'.$file;
  return $src;
}

function addImage($file,$attrstr='')
{
  $src=baseurl().'images/'.$file;
  $html='<img '.$attrstr.' src="'.$src.'">';

  echo $html;
}
