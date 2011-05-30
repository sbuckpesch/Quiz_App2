<?php
/**
 * Fluttery Interface to communicate with the Fluttery Framework
 * @author Sebastian Buckpesch / Fred Slient
 * @version 0.22
 *
 */
class Fluttery_Fluttery
{
	public $config=null; //config values
	public $content=null; //content elements
	public $instance=null; //instance

	protected $_instance_id=null;

	/**
	 * Intialize the Fluttery Framework and gets the correct app instance
	 * @param int $instance_id App instance to initialize (if available)
	 * @param int $ic_app_id iconsultants/fluttery application model id
	 * @param int $page_id facebook page id of the application
	 * @throws Exception Fluttery intitializing Exception
	 * @return boolean
	 */
	function __construct($instance_id=0, $ic_app_id=0, $page_id=0)
	{
		$db_config=array(
				'host'=>'localhost',
				'username'=>"ic_fluttery",
				'password'=>"Np7CUIy3qzSvHi7xlscc",
				'dbname'=>"ic_fluttery",
				);

		$db = Zend_Db::factory('mysqli',$db_config);
		$db->query('set names utf8');

		$this->_db=$db;

		// Get Instance Id if not available
		if ($instance_id == 0){
			// 1. Check if instance id is available in GET-Param
			if (isset($_GET['instid'])) {
				$instance_id = $_GET['instid'];
				$this->_instance_id=$instance_id;
				$this->getData();
				return true;
			} 

			// 2. Get Instance Id from ic_app_id (config.php) and fb_app_url (URL)

      if(isset($_SERVER['HTTP_REFERER']))
      {
        $url = parse_url($_SERVER['HTTP_REFERER']);
        $path = explode("/", substr($url['path'],1));
        $fb_app_url = $path[0];
        // Get instance id from the database
        $select = $db->select();
        $select->from('app_instance','instance_id');
        $select->where('ic_app_id=?',$ic_app_id);
        $select->where('fb_app_url=?',$fb_app_url);
        $instance_id = $db->fetchOne($select);  
        if($instance_id != false) {
          $this->_instance_id=$instance_id;
          $this->getData();
          return true;
        }
      }

			// 3. Get instance Id from page id
			if($page_id != false) {
				$db=$this->_db;
				$select=$db->select();
				$select->from('app_instance','instance_id');

				$select->where('fb_page_id=?',$page_id);
				$select->where('ic_app_id=?',$ic_app_id);
				$instance_id=$db->fetchOne($select);

				if($instance_id == false) {
					throw new Exception('can not get instance_id from page id '.$page_id); 
					return false;
				}
				$this->_instance_id=$instance_id;
				$this->getData();
				return true;
			} else if($page_id != false) {
				$db=$this->_db;
				$select=$db->select();
				$select->from('app_instance','instance_id');

				$select->where('page_id=?',$page_id);
				$select->where('ic_app_id=?',$ic_app_id);
				$instance_id=$db->fetchOne($select);

				if($instance_id == false) {
					throw new Exception('can not get instance_id from page id '.$page_id); 
				}
				$this->_instance_id=$instance_id;
				$this->getData();
				return true;
			} 
		}
		if($instance_id > 0) {
			$this->_instance_id=$instance_id;
			$this->getData();
			return true;
		}

		//4. get instid from parameter app_data
		/*
		   if(isset($_GET['app_data']))
		   {
		   $data = parse_signed_request($_REQUEST['signed_request'], $global->instance['fb_app_secret']);
		   }
		 */

		throw new Exception('Error while loading the config from Fluttery Framework.'); 
		return false;

	}

	/**
	 * Returns all the available config values for the current instance. Config value identifier are array indexes
	 * @return Array <multitype:, unknown> config values of the app instance as array
	 */
	function getConfigs() {
		$db=$this->_db;
		$select=$db->select();
		$select->from('app_instance','ic_app_id');
		$select->where('instance_id=?',$this->_instance_id);
		$app_id=$db->fetchOne($select);
		$select->reset();
		$select->from('config_value_model','*');
		$select->where('ic_app_id=?',$app_id);
		$rows=$db->fetchAll($select);

		foreach($rows as $k=>$row)
		{
			$select->reset();
			$select->from('config_value_instance','value');
			$select->where('instance_id=?',$this->_instance_id);
			$select->where('identifier=?',$row['identifier']);

			$value=$db->fetchOne($select);

			if($value != false)
				$rows[$k]['default_value']=$value;
		}

		$data=array();
		foreach($rows as $row)
		{
			$data[$row['identifier']]=$row['default_value'];
		}
		return $data;
	}


	/**
	 * Returns all the available conten elements for the current instance. Content Element identifier are array indexes
	 * @return Array <multitype:, unknown> content elements of the app instance as array
	 */
	function getContents($config=false){
		$db=$this->_db;
		$select=$db->select();
		$select->from('app_instance','ic_app_id');
		$select->where('instance_id=?',$this->_instance_id);
		$app_id=$db->fetchOne($select);

		$select->reset();
		$select->from('content_element_model','*');
		$select->where('ic_app_id=?',$app_id);
		$rows=$db->fetchAll($select);


		foreach($rows as $k=>$row)
		{
			$select->reset();
			$select->from('content_element_instance','content');
			$select->where('instance_id=?',$this->_instance_id);
			$select->where('identifier=?',$row['identifier']);

			$value=$db->fetchOne($select);

			if($value != false)
				$rows[$k]['default_value']=$value;
		}

		$data=array();
		foreach($rows as $row)
		{
			$data[$row['identifier']]=$row['default_value'];
		}

		return $data;
	}

	/**
	 * Returns all the basic information of the app instance as an array 
	 * (instance_id, ic_app_id, fb_app_id, fb_api_key, fb_app_secret, fb_app_url, 
	 *  page_id, name, created_at, last_edited, last_modified_by)
	 * @return Array All basic instance values
	 */
	function getInstance(){
		$db=$this->_db;

		$select=$db->select();
		$select->from('app_instance','*');
		$select->where('instance_id=?',$this->_instance_id);

		$instance=$db->fetchRow($select);

		if($instance == false)
			return false;
		else {
			return $instance;
		}
	}

	function getData(){
		$data=array();
		$data['config']=$this->getConfigs();
		$data['content']=$this->getContents();
		$data['content']=$this->handleContentVariables($data['content'],$data['config']);



		$this->config=$data['config'];
		$this->content=$data['content'];
		$this->instance = $this->getInstance();

		return $data;
	}


	/*
	 * replace config variables which in content element with config value
	 *
	 * @param contents  array   content elements
	 * @param config  array   config values
	 * @return contents  array    replaced content elements
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

	function getInstanceId() {
		return $this->_instance_id;
	}


  /*
   * get instid by pageid
   */

  function getInstanceIdByPageId($ic_app_id,$page_id)
  {
    $db=$this->_db;
    $select=$db->select();
    $select->from('apps','instance_id');

    $select->where('page_id=?',$page_id);
    $instance_id=$db->fetchOne($select);

    return $instance_id;
  }
}
