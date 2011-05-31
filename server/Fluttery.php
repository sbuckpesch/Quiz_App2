<?php
/**
 * Fluttery Interface to communicate with the Fluttery Framework
 * @author Sebastian Buckpesch / Fred Slient
 * @version 0.25
 * @copyright  Copyright (c) 2011 iConsultants UG (http://www.iconsultants.eu)
 * @license    License LGPL (http://www.gnu.org/copyleft/lgpl.html)
 */
class Fluttery
{
  public $config=null; //config values
  public $content=null; //content elements
  public $instance=null; //instance

  protected $_instance_id=null;

  protected $_last_error_msg='';
  /**
   * Intialize the Fluttery Framework and gets the correct app instance
   * @param int $instance_id App instance to initialize (if available)
   * @param int $ic_app_id iconsultants/fluttery application model id
   * @param int $page_id facebook page id of the application
   * @throws Exception Fluttery intitializing Exception
   * @return boolean
   */
  function __construct()
  {
    global $database_host , $database_name , $database_user , $database_pass ;

    $db_config=array(
      'host'=>$database_host ,
      'username'=>$database_user ,
      'password'=>$database_pass ,
      'dbname'=> $database_name ,
    );

    $db = Zend_Db::factory('mysqli',$db_config);
    $db->query('set names utf8');

    $this->_db=$db;
  }
  /**
   * check app key if validate
   */
  function checkAppkey($appkey)
  {
    $db=$this->_db;

    $select=$db->select();
    $select->from('admin_user_data','uid');
    $select->where('username=?',$appkey);

    $data=$db->fetchOne($select);

    if($data == false)
    {
      $this->_last_error_msg='invalid app key:'.$appkey;
      return false;
    }

    return true;
  }

  /**
   * Returns all the available config values for the current instance. Config value identifier are array indexes
   * @return Array <multitype:, unknown> config values of the app instance as array
   */
  function getConfigs($app_id,$instance_id)
  {
    $db=$this->_db;
    $select=$db->select();

    //get all instance values
    $select->from('app_instance_config','*');
    $select->where('instance_id=?',$instance_id);
    $rows=$db->fetchAll($select);

    if($rows == false)
    {
      $instance_values=array();
    }
    else
    {
      $instance_values=array();
      foreach($rows as $row)
      {
        $instance_values[$row['identifier']]=$row['value'];
      }
    }


    //get all model default values
    //if have instance value, replaced with instance value
    $select->reset();
    $select->from('app_model_config','*');
    $select->where('ic_app_id=?',$app_id);
    $rows=$db->fetchAll($select);

    $data=array();
    foreach($rows as $k=>$row)
    {
      if( isset($instance_values[$row['identifier']]) && $instance_values[$row['identifier']] !== false )
        $data[$row['identifier']]= $instance_values[$row['identifier']];
      else
        $data[$row['identifier']]= $row['default_value'];

    }

    return $data;
  }


  /**
   * Returns all the available design values for the current instance. Config value identifier are array indexes
   * @return Array <multitype:, unknown> config values of the app instance as array
   */
  function getDesigns($app_id,$instance_id)
  {
    $db=$this->_db;
    $select=$db->select();

    //get all instance values
    $select->from('app_instance_design','*');
    $select->where('instance_id=?',$instance_id);
    $rows=$db->fetchAll($select);

    if($rows == false)
    {
      $instance_values=array();
    }
    else
    {
      $instance_values=array();
      foreach($rows as $row)
      {
        $instance_values[$row['identifier']]=$row['content'];
      }
    }


    //get all model default values
    //if have instance value, replaced with instance value
    $select->reset();
    $select->from('app_model_design','*');
    $select->where('ic_app_id=?',$app_id);
    $rows=$db->fetchAll($select);

    $data=array();
    foreach($rows as $k=>$row)
    {
      if( isset($instance_values[$row['identifier']]) && $instance_values[$row['identifier']] != false )
        $data[$row['identifier']]= $instance_values[$row['identifier']];
      else
        $data[$row['identifier']]= $row['default_value'];

    }

    return $data;
  }

  /**
   * Returns all the available conten elements for the current instance. Content Element identifier are array indexes
   * @return Array <multitype:, unknown> content elements of the app instance as array
   */
  function getContents($app_id,$instance_id)
  {
    $db=$this->_db;
    $select=$db->select();


    //get instance values
    $select->from('app_instance_content','*');
    $select->where('instance_id=?',$instance_id);
    $rows=$db->fetchAll($select);
    if($rows == false)
    {
      $instance_values=array();
    }
    else
    {
      $instance_values=array();
      foreach($rows as $row)
      {
        $instance_values[$row['identifier']]=$row['content'];
      }
    }

    //get all model default values
    //if have instance value, replaced with instance value
    $select->reset();
    $select->from('app_model_content','*');
    $select->where('ic_app_id=?',$app_id);
    $rows=$db->fetchAll($select);

    $data=array();
    foreach($rows as $k=>$row)
    {
      if( isset($instance_values[$row['identifier']]) && $instance_values[$row['identifier']] != false )
        $data[$row['identifier']]= $instance_values[$row['identifier']];
      else
        $data[$row['identifier']]= $row['default_value'];
    }

    return $data;
  }

  /**
   * Returns all the basic information of the app instance as an array 
   * (instance_id, ic_app_id, fb_app_id, fb_api_key, fb_app_secret, fb_app_url, 
   *  page_id, name, created_at, last_edited, last_modified_by)
   * @return Array All basic instance values
   */
  function getInstance($app_id,$instance_id)
  {
    $db=$this->_db;

    $select=$db->select();
    $select->from('app_instance','*');
    $select->where('instance_id=?',$instance_id);
    $select->where('ic_app_id=?',$app_id);

    $instance=$db->fetchRow($select);

    if($instance == false)
      return false;
    else 
    {
      return $instance;
    }
  }

  /** 
   * Get all data from App-Arena Database
   * @param String app_key
   * @param int app_id
   * @param int instance_id
   * @return Returns an array with all app-arena data available for one instance_id
   */
  	function getData($aa_api_key, $aa_app_id, $instance_id){
	    if($this->checkAppkey($aa_api_key) == false){
	    	throw new Exception("Invalid App-Arena API key: " . $aa_api_key);
	      	return false;
	    }
	    
	    $data=array();
	    $data['instance']= $this->getInstance($aa_app_id,$instance_id);
	    $data['config']  = $this->getConfigs($aa_app_id,$instance_id);
	    $data['content'] = $this->getContents($aa_app_id,$instance_id);
	
	    $data['content'] = $this->handleContentVariables($data['content'],$data['config']);
      $data['content'] = $this->handleImageTag($data['content']);

	    $data['design']  = $this->getDesigns($aa_app_id,$instance_id);
      //$data['design'] = $this->handleImageTag($data['design']);
	
	    return $data;
  	}


  /**
   * replace config variables which in content element with config value
   *
   * @param Array contents  array   content elements
   * @param Array  config  array   config values
   * @return Array contents  array    replaced content elements
   */
  function handleContentVariables($contents,$configs)
  {
    if(!is_array($contents))
      return $contents;

    foreach($contents as $k=>$content)
    {
      $pattern="/{{config\.(.[^}]*)}}/m"; //match {{*****}}
      $matches=array();
      $count=preg_match_all($pattern,$content,$matches);

      if($count > 0)
      {
        foreach($matches[1] as $match)
        {
          $value=$configs[$match]; 
          if($value != false)
          {
            $content=str_replace("{{config.".$match."}}",$value,$content);
          }
        }
        $contents[$k]=$content;
      }
    }
    foreach($contents as $k=>$content)
    {
      $pattern="/{{content\.(.[^}]*)}}/m"; //match {{*****}}
      $matches=array();
      $count=preg_match_all($pattern,$content,$matches);

      if($count > 0)
      {
        foreach($matches[1] as $match)
        {
          $value=$contents[$match]; 
          if($value != false)
          {
            $content=str_replace("{{content.".$match."}}",$value,$content);
          }
        }
        $contents[$k]=$content;
      }
    }

    return $contents;
  }
  /**
   * if image's src do not set domain , then add this server's domain for it 
   * 
   */
  function handleImageTag($contents)
  {
    global $domain;
    $pattern="/<img[^>]*src=\"([^\"]*)\"[^>]*>/im"; //match src=""
    $matches=array();

      foreach($contents as $k=>$content)
      {
        $count=preg_match_all($pattern,$content,$matches);

        if($count > 0)
        {
          foreach($matches[1] as $match)
          {
            if(strpos($match,"http:") !== false 
              || strpos($match,"https:")!== false)

              continue;

            $value='src="'.$match.'"';
            $newvalue='src="'.rtrim($domain,"/").'/'.ltrim($match,"/").'"';

            $contents[$k]=str_replace($value,$newvalue,$contents[$k]);
          }
        }
      }

      return $contents;
  }

  /**
   * Returns the instance_id through a db-query. Instance_id can be queried via (aa_app_id and fb_page_id) or
   * via (aa_app_id and fb_app_url)
   * @param integer aa_app_id App-Arena App-Id. Id of the App-Model in App-Manager
   * @param integer fb_page_id Facebook Page Id, where the instance should be integrated
   * @param integer  fb_app_url Facebook App Url for Canvas Page Apps. E.g. http://apps.facebook.com/myappname/
   * @return integer  instanceid or false and throw exception
   */
  	function getInstanceId($aa_app_id, $fb_page_id, $fb_app_url){
  		
  		// Use Page Id + App Model Id to request Instance_Id
  		if ($fb_page_id != "") {
	  		$db = $this->_db;
	  		$select = $db->select();
	  		$select->from('app_instance','instance_id');
	  		$select->where('fb_page_id=?',$fb_page_id);
	  		$select->where('ic_app_id=?',$aa_app_id);
	  		$instance_id = $db->fetchOne($select);
	
	  		if($instance_id == false)
	  		{
	  			throw new Exception('Can not get instance_id from page id '.$page_id);
	  			return false;
	  		}
	  		return $instance_id;
  		}
  		
  		// Use App Url (Canvas Page) + App Model Id to request Instance_Id
  		if ($fb_app_url != "") {
	  		// Extract the name from the Url
  			$url = parse_url($fb_app_url);
			$path = explode("/", substr($url['path'],1));
			$fb_app_name = $path[0];
  			
  			$db = $this->_db;
	  		$select = $db->select();
	  		$select->from('app_instance','instance_id');
	  		$select->where('fb_app_url=?',$fb_app_name);
	  		$select->where('ic_app_id=?',$aa_app_id);
	  		$instance_id = $db->fetchOne($select);
	
	  		if($instance_id == false)
	  		{
	  			throw new Exception('Can not get instance_id from FB App Url '.$fb_app_url);
	  			return false;
	  		}
	  		return $instance_id;
  		}	
	
	    throw new Exception("Can't get instance_id from page_id: " . $fb_page_id . ", App_Url: " . $fb_app_url . " and  
	    		App-Model-Id: " . $aa_app_id); 
	    return false;
	  }
	}
