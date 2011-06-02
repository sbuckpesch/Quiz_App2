<?php
class Fluttery
{
  protected $_server_url='http://www.app-arena.com/manager/server/soap.php';
  protected $_app_key;

  protected $_app_id=null;
  protected $_instance_id=null;
  protected $_page_id=null;

  protected $session=null; // instance of Zend_Session_Namespace

  //fluttery data
  //protected $_instance=array();
  //protected $_configs=array();
  //protected $_contents=array();

  //soap client
  protected $_client=null;

  /*
   * init class , need app_key to auth
   */
  function __construct($app_key,$session)
  {
    if($app_key == false)
     throw new Exception('invalid app key');

    if(!($session instanceof Zend_Session_Namespace))
    {
      throw new Exception("Fluttery's session parameter must be instance of Zend_Session_Namespace"); 
    }

    $this->session=$session;
    $this->_app_key=$app_key;

    //init soap client
    $options = array(
      'location' => $this->_server_url,
      'uri'      => $this->_server_url,
    );

    $this->_client = new Zend_Soap_Client(null, $options);  
  }


  function setInstanceId($instance_id)
  {
    $this->_instance_id=$instance_id;
  }
  /*
   * set instance , each app have an app instance  in fluttery,
   * and use instance_id to identify it
   * get instance id have two ways:
   *   1, use ic_app_id and instance_id (ic_app_id is for identify the instance, that make sure you  are not  give the error instance id by mistake
   *   2, use  ic_app_id and page_id
   *
   * @param interger  app_id  app model's id ,it's instance is app instance
   * @param integer   instance_id app instance's primary key
   * @param integer   facebook's page id   like  in fanpage, it will have page id, but canvas page  do not
   *
   */
  function setInstanceIdByPageId($app_id,$page_id)
  {
    if(isset($this->session->instance_id))
    {
      $this->_instance_id=$instance_id;
      return $this->session->instance_id;
    }

    $this->_app_id=$app_id;
    $this->_page_id=$page_id;

    try
    {
      $instance_id = $this->_client->getInstanceId($app_id,$page_id,'');

      if($instance_id != false)
      {
        $this->_instance_id=$instance_id;
      }
      else
      {
        throw new Exception("sorry ,can not get instance id: [ic_app_id:$ic_app_id],[page_id:$page_id]");
      }
    }
    catch(Exception $e)
    {
      echo $e->getMessage();  
    }

    $this->session->instance_id=$this->_instance_id;

    return $this->_instance_id;
  }

  /*
   * get all data from fluttery
   * 
   * @return array(
   *            'config'=>array(...),
   *            'content'=>array(...),
   *            'instance'=>array(...))
   *
   *          if do not have data , will return 
   *         array(
   *            'config'=>array(),
   *            'content'=>array(),
   *            'instance'=>array())
   *
   *          of false, will return false,and throw Exception,that mean you code may not right, like  give a wrong instance id ,and so on.
   */
  function getData()
  {

    if(isset($this->session->data))
    {
      return $this->session->data;
    }

    if($this->_instance_id == false)
      throw new Exception("you have not set instance, please use the method setInstace(APP_ID,INSTANCE_ID,PAGE_ID) set it first ");

    try
    {
      $result = $this->_client->getData($this->_app_key,$this->_app_id,$this->_instance_id);

      if($result != false)
      {
        $this->session->data=$result;
        return $result;
      }
    }
    catch(Exception $e)
    {
       echo $e->getMessage();  
    }
  }

 /* get insatnceid, 
  * if you do not known this, 
  * should use app_id and page_id get it first ,
  * like:
  *   $client->setInstanceId();
  *   $instance_id=$client->getInsatnceId();
  */
  function getInstanceId()
  {
    if($this->_instance_id == false)
      throw new Exception("you have not set instance, please use the method setInstace(APP_ID,INSTANCE_ID,PAGE_ID) set it first ");

    return $this->_instance_id;
  }
}

/*
$app_key='fred';
$client = new Client($app_key);
$client->setInstanceId($ic_app_id,0,$page_id);


$data=$client->getData();

print_r($data);

 */
