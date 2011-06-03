<?php
/**
 * this is for init db,fluttery,global varialbes, aut facebook and so on
 * so in other page can only call method which it needed, but do not init all the things as before
 */
class Init
{

  /**
   * init db connection
   * after that $db=Frd::getDb()  can work,or $global->db
   */
  function initDb()
  {
    global $database_host, $database_name, $database_user,$database_pass;

    $global=Frd::getGlobal();

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

  /**
   * use soap to get instance data from server
   * this need instance id or page id
   */
  function initFluttery($instid=null,$page_id=null)
  {
    global $ic_app_id;
    global $gsession;

    $global=Frd::getGlobal();


    if($instid == false && $page_id == false)
      return false;

    $app_key='fred';

    $fluttery = new Fluttery($app_key,$gsession);
    if($instid >0 )
      $fluttery->setInstanceId($instid);
    else
      $fluttery->setInstanceIdByPageId($ic_app_id,$page_id);

    $data=$fluttery->getData();

    $config = $data['config'];
    $content = $data['content'];
    $instance = $data['instance'];
    $design = $data['design'];

    $global->config = $config;
    $global->content = $content;
    $global->instance = $instance;
    $global->design = $design;

    $global->instid=$fluttery->getInstanceId();
    $global->page_id=$page_id; //page id may not exists
    $global->app_id= $global->instance['fb_app_id'];
    $global->app_secret= $global->instance['fb_app_secret'];

    $global->baseurl=$global->instance['fb_canvas_url'];
    $global->appurl='http://apps.facebook.com/'.$global->instance['fb_app_url'].'/';
    $global->pageurl="http://www.facebook.com/apps/application.php?id=".$global->instance['fb_page_id']."&sk=app_".$global->app_id;

  }

  /**
   * get page id ,only work in fanpage
   *
   * @return string  $page_id , if not exists, return false
   */
  function initPageId()
  {
    $global=Frd::getGlobal();

    if(isset($_REQUEST['signed_request']))
    {
      $global->page_id=get_page_id();
      return $global->page_id;
    }

    return false;
  }

  /**
   * auth facebook use php 
   * this need next url and cancel url,
   * if missed, may have problem
   */
  function authFacebook($next='',$cancel_url='')
  {
    global $global;

    require_once dirname(__FILE__).'/lib/fbapi/facebook.php';

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

    return true;
  }

  /**
   * save visiter's information to database
   * but should create the tables first
   */
  function saveVister()
  {
  
  }
}
