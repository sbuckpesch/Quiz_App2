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

/* functions below are only for app , so use prefix app_  
 *
 * @return array of joins or false
 */
function app_get_joins()
{
  global $global;

  $select=$global->db->select();

  $select->from('competition_join','*');
  $select->where('instance_id=?',$global->instid);

  $select->limit(10,0);

  $rows=$global->db->fetchAll($select);

  return $rows;
}

/*
 * get join recored's id by current instance id and user id
 * 
 * @return  competition_join.id  if user has joined or false if has not joined
 */
function app_get_joinid()
{
  global $global;
  if($global->fbme == false)
    throw new Exception('user not auth, are you call this function in wrong page?');

  $user_id=$global->fbme['id'];
  $instance_id=$global->instid;

  $db=$global->db;
  $select=$db->select();
  $select->from('competition_join','id');
  $select->where('instance_id=?',$instance_id);
  $select->where('fb_userid=?',$user_id);

  //echo $select;
  $result=$db->fetchOne($select) ;
  if($result > 0)
    return $result;
  else 
    return false;
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
 * load join's image 
 *
 * @return image's url
 */
function app_join_get_image($path)
{
  global $global;
  $url=$global->baseurl.ltrim($path,"/");

  return $url;
}

/*
 * get username by fbuserid
 *
 * @return username if exists or "" 
 */
function  app_get_name($userid)
{
  $table=new Frd_Table_Common('user_data','id');
  $row=$table->loadBy('user_id',$userid);
  if($row != false)
  {
    return '<a href="'.$row[0]['link'].'" title="'.$row[0]['name'].'">'.$row[0]['name'].'</a>';
  }
  else
  {
    return "";
  }
}
/*
 * get fb username
 */
function  app_get_username($userid)
{
  $table=new Frd_Table_Common('participants','participant_id');
  $row=$table->loadBy('userId',$userid);
  if($row != false)
  {
    return $row[0]['username'];
  }
  else
  {
    return "";
  }
}


/*
 * get fb user's profile photo 
 */
function  app_get_profile_photo($userid,$url)
{
  global $global;
  $photourl=$global->fb_user_data->getProfilePictureUrl($type="small", $userid);

  if($photourl != false)
  {
    $html='<a target="_top" href="'.$url.'">';
    $html.='<img width="50" style="border:solid thin gray" src="'.$photourl.'" />';
    $html.='</a>';

    return $html;
  }
  else
  {
    return "";
  }

}

/*
 * get fb user's profile photo url
 */
function  app_get_profile_photo_Link($userid)
{
  global $global;
  $photourl=$global->fb_user_data->getProfilePictureUrl($type="small", $userid);

  return $photourl;

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
/*
 * get detail url
 *
 * detail url is the href parameter of  facebook like button
 * so the url need rewrite, otherwise  after ? of url ,will be ignore
 *
 * @return string  detail url will need rewrite
 */
function app_get_detail_url($instid,$join_id)
{
  global $global;

  //$url=$global->baseurl.'redirect.php/instid/'.$global->instid.'/join_id/'.$join_id.'/'.time();
  $url=$global->baseurl."like_info.php?instid=".$global->instid."&join_id=".$join_id."&redirect=true";
  return $url;
}
/*
 * get detail url for like button
 *
 * @return string 
 */
function app_get_detail_url_forlike($instid,$join_id)
{
  global $global;

  $url=$global->baseurl.'like_info.php?instid='.$global->instid.'&join_id='.$join_id.'&v=2';

  $url=urlencode($url);
  return $url;
}

/*
 *
 */
function app_string_to_singleline($str)
{
  $str=str_replace("\n","",$str);
  $str=str_replace("\r","",$str);

  return $str;
}
//save facebook obj to $global->facebook
//save fbme to $global->fbme
//if failed ,return false ,and auto redirect
function init_facebook($params=array())
{
  global $global;

  require_once dirname(__FILE__).'/fbapi/facebook.php';

  //$facebook=new Facebook($api_key,$secret);
  $facebook = new Facebook(array(
    'appId' => $global->app_id,
    'secret' => $global->app_secret,
    'cookie' => true));

  $global->facebook=$facebook;
  $session = $facebook->getSession();

  try
  {
    $global->fbme = $facebook->api('/me');  
  } 
  catch (FacebookApiException $e) 
  {
    $global->fbme = false;
    error_log($e);
    //echo $e->getMessage();
  }  

  if ($global->fbme == false) 
  {
    $params['canvas'] =1;
    $params['fbconnect'] = 0;
    $params['req_perms'] = 'publish_stream, email';

    //$params['next'] = $global->link->createLink('index.php',array('instid'=>$global->instid));
    //'cancel_url' => $appurl 

    $login_url = $facebook->getLoginUrl($params);

    echo '<script>top.location="' . $login_url . '";</script>';
    //header("Location:$login_url");
    exit();
  }

  //if($global->fb_user_data != false)
  // $global->fb_user_data->saveUser();
  //recored vister


  return true;
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

/*youtube functions */
/*
$title="TEST";
$description="description";
$tags="tags";
$category="Music";
$nexturl="http://frd.frd.info/youtube.php";
 */

//youtube_createUploadForm($title, $description, $category, $tags, $nexturl);

function youtube_authenticate()
{
  global $global;

  $developerkey=$global->config['youtube_developer_key'];


  $authenticationURL= 'https://www.google.com/youtube/accounts/ClientLogin';
  $httpClient = Zend_Gdata_ClientLogin::getHttpClient(
    $username = $global->config['youtube_username'],
    $password = $global->config['youtube_password'],
    $service = 'youtube',
    $client = null,
    $source = 'multimedia', // a short string identifying your application
    $loginToken = null,
    $loginCaptcha = null,
    $authenticationURL);


  $httpClient->setHeaders('X-GData-Key', "key=${developerkey}");

  $global->httpclient=$httpClient;

}

function youtube_createUploadForm($videoTitle, $videoDescription, $videoCategory, $videoTags, $nextUrl = null)
{
  global $global;
  $httpClient = $global->httpclient;
  //$httpClient = getAuthSubHttpClient();
  $youTubeService = new Zend_Gdata_YouTube($httpClient);
  $newVideoEntry = new Zend_Gdata_YouTube_VideoEntry();

  $newVideoEntry->setVideoTitle($videoTitle);
  $newVideoEntry->setVideoDescription($videoDescription);

  //make sure first character in category is capitalized
  $videoCategory = strtoupper(substr($videoCategory, 0, 1))
    . substr($videoCategory, 1);
  $newVideoEntry->setVideoCategory($videoCategory);

  // convert videoTags from whitespace separated into comma separated
  $videoTagsArray = explode(' ', trim($videoTags));
  $newVideoEntry->setVideoTags(implode(', ', $videoTagsArray));

  $tokenHandlerUrl = 'http://gdata.youtube.com/action/GetUploadToken';
  try {
    $tokenArray = $youTubeService->getFormUploadToken($newVideoEntry, $tokenHandlerUrl);
        /*
        if (loggingEnabled()) {
            logMessage($httpClient->getLastRequest(), 'request');
            logMessage($httpClient->getLastResponse()->getBody(), 'response');
        }
         */
  } catch (Zend_Gdata_App_HttpException $httpException) {
    print 'ERROR ' . $httpException->getMessage()
      . ' HTTP details<br /><textarea cols="100" rows="20">'
      . $httpException->getRawResponseBody()
      . '</textarea><br />'
      . '<a href="session_details.php">'
      . 'click here to view details of last request</a><br />';
    return;
  } catch (Zend_Gdata_App_Exception $e) {
    print 'ERROR - Could not retrieve token for syndicated upload. '
      . $e->getMessage()
      . '<br /><a href="session_details.php">'
      . 'click here to view details of last request</a><br />';
    return;
  }

  $tokenValue = $tokenArray['token'];
  $postUrl = $tokenArray['url'];

  $vars=array(
    'posturl'=>$postUrl,
    'nexturl'=>$nextUrl,
    'tokenvalue'=>$tokenValue
  );

  return $vars;
}

//get video 's falsh url
function youtube_getVideoUrl($id)
{
  global $global;
  $httpClient = $global->httpclient;
  $yt = new Zend_Gdata_YouTube($httpClient);

  $entry=$yt->getVideoEntry($id);
  return $entry->getFlashPlayerUrl();
}

//get video 's data,as array so can extend in the future
function youtube_getVideoData($id)
{
  global $global;
  $httpClient = $global->httpclient;
  $yt = new Zend_Gdata_YouTube($httpClient);

  //$entry=$yt->getVideoEntry($id);
  try
  {
    //  $entry=$yt->getVideoEntry($id,null,true);
    $entry=$yt->getVideoEntry($id);
  }
  catch(Exception $e)
  {
    //echo $e->getMessage();
    return false;
  }

  //set data
  $data=array();

  $thumbnails=$entry->getVideoThumbnails();
  if(count($thumbnails) >0 )
  {
    $data['thumbnail']=$thumbnails[0];
    $data['thumbnails']=$thumbnails;
  }

  $data['flash_url']=$entry->getFlashPlayerUrl();
  $data['is_embeddable']=$entry->isVideoEmbeddable();

  //var_dump(get_class_methods($entry));

  return $data;
}

//delete video in youtube
function youtube_delete($id)
{
  return ;
  global $global;
  $httpClient = $global->httpclient;
  $yt = new Zend_Gdata_YouTube($httpClient);

  //must have null,true parameters for delete
  try
  {
    $entry=$yt->getVideoEntry($id,null,true);
  }
  catch(Exception $e)
  {
    return false;
  }

  $yt->delete($entry);
  return true;
}

//check if this video exists
function youtube_check_code($id)
{
  if($id ==false)
    return false;

  global $global;
  $httpClient = $global->httpclient;
  $yt = new Zend_Gdata_YouTube($httpClient);

  try
  {
    $entry=$yt->getVideoEntry($id,null,true);
  }
  catch(Exception $e)
  {
    return false;
  }

  return $entry->getFlashPlayerUrl();
}

//get code from url
function youtube_getcode($url)
{
  $url=trim($url);
  //$url="http://www.youtube.com/watch?v=h1ZYT97prP8";
  $baseurl="http://www.youtube.com/watch?v=";

  if(strpos($url,$baseurl) === 0)
  {
    $code =str_replace($baseurl,"",$url);
  }
  else
  {
    $code= ""; 
  }

  //if watch?v=CODE&param1=value1&...., 
  //drop the string before &
  if(strpos($code,"&")!= false)
  {
    $pos= strpos($code,"&");

    $code=substr($code,0,$pos);
  }

  return $code;
}

//youtube_id in database
function youtube_get_thumbnails($id)
{
  if($id ==false)
    return false;

  global $global;
  $httpClient = $global->httpclient;
  $yt = new Zend_Gdata_YouTube($httpClient);

  try
  {
    $entry=$yt->getVideoEntry($id,null,true);
  }
  catch(Exception $e)
  {
    return false;
  }

  //will return array of thumbnails
  return $entry->getVideoThumbnails();
}

/* flickr functions */
/*
 * the token must be valid
 * so for user ,it does not auth ,
 * because we have already did the auth
 *
 * @return image id
 */
function flickr_upload($filename,$title,$description)
{
  global $global;

  $f = new phpFlickr($global->config['flickr_app_key'],$global->config['flickr_app_secret']);
  $f->setToken($global->config['flickr_token']);
  $f->auth('write');


  $photo_id=$f->sync_upload ($filename, $title,$description);

  if($photo_id != false)
  {
    $photo=$f->photos_getInfo ($photo_id) ;
    $photo=$photo['photo'];

    //var_dump($photo);

    $url=$f->buildPhotoURL($photo, "square");
    $original_url=$f->buildPhotoURL($photo, "large");
  }
  else
  {
    $url=""; 
    $original_url='';
  }

  return array($url,$original_url);
}

/* facebook functions */
/*
 * create js , it will request the  facebook's  lint tools , 
 * so it will clear cache of like's  information
 *
 * @param like_link  this is the link you liked in facebook
 *
 * @return  javascript  , use jquey to request the lint url
 */
function fb_lint_url_script($like_link)
{
  global $global;

  $baseurl=$global->config['fb_lint_baseurl'];

  $url=$baseurl.=urlencode($like_link);


  $script=<<<HTML

  $(document).ready(function(){
    var url="$url";
    $.get(url,function(data){});
  });
HTML;

  return $script;
}
/* init functions */
function init_autoload()
{


  set_include_path(ROOT_PATH.'/lib/' . PATH_SEPARATOR .
    ROOT_PATH.'/modules/' . PATH_SEPARATOR .
    get_include_path());

  //register autoload
  require_once "Zend/Loader/Autoloader.php";
  Zend_Loader_Autoloader::getInstance()->setFallbackAutoloader(true);
}

function init_db()
{
  global $global;
  global $database_host, $database_name, $database_user,$database_pass;
  $db_config=array(
    'host'=>$database_host,
    'username'=>$database_user,
    'password'=>$database_pass,
    'dbname'=>$database_name
  );
  $db = Zend_Db::factory('pdo_mysql',$db_config);
  $db->query('set names utf8');
  Zend_Db_Table::setDefaultAdapter($db);
  $global->db=$db;

  $registry = Zend_Registry::getInstance();
  $registry->set("db_default",$global->db);

}


function init_fluttery()
{
  global $global;
  global $ic_app_id;

  /*
  $global->baseurl='http://dev.iconsultants.eu/git/Quiz-App/';
  $global->appurl='http://apps.facebook.com/new_quiz_app/';
  $global->instance=array(
    'fb_app_id'=>123474634401897,
    'fb_app_key'=>'3d5d541d21fd51b71e49dc039bed8e0a',
    'fb_app_secret'=>'926edad9a6cb9ab217388876f13aeac6',
  );

  return ;
   */
  if(isset($_GET['instid']))
  {
    $instid=$_GET['instid'];
  }
  else
  {
    if(isset($_POST['instid']))
      $instid=$_POST['instid'];
    else
      $instid=null;
  }

  $page_id=get_page_id();

  if($instid == false && $page_id == false)
    return false;

  $app_key='fred';
  $fluttery = new Fluttery($app_key);
  $fluttery->setInstanceId($ic_app_id,0,$page_id);
  $data=$fluttery->getData();

  $config = $data['config'];
  $content = $data['content'];
  $instance = $data['instance'];

  $global->config = $config;
  $global->content = $content;
  $global->instance = $instance;

  $global->app_id= $global->instance['fb_app_id'];
  $global->app_secret= $global->instance['fb_app_secret'];

  $global->baseurl=$global->instance['fb_canvas_url'];
  $global->appurl='http://apps.facebook.com/'.$global->instance['fb_app_url'].'/';

  $global->instid=$fluttery->getInstanceId();


  /*
  var_dump($global->instid);
  var_dump($global->baseurl);
  var_dump($global->appurl);
   */
}

function init_global()
{
  global $global;
  // classes
  //$global->link=new Link();

  if(isset($_REQUEST['signed_request']))
  {
    $global->fb_user_data= new FacebookUserData($_REQUEST['signed_request']);
    $global->isAdmin=$global->fb_user_data->isAdmin;
  }
  else
  {
    $global->isAdmin=false;
  }

  $global->page_id=get_page_id();


  /*
  $global->translate=new Translate(ROOT_PATH."/langs");
  $global->translate->setLanguage('de');

  if(isset($_REQUEST['signed_request']))
    $global->fb_user_data= new FacebookUserData($_REQUEST['signed_request']);
  else
    $global->fb_user_data= false;
   */

  //variables
}


//template functions
/**
 * load php file
 */
function  load($path)
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
