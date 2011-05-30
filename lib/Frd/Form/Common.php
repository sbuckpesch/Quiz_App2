<?php
/*
 * a common form object,
 * have validate
 * render form use table 
 *
 */
class Frd_Form_Common
{
  protected $_form_params=array();
  protected $_form_method='get';
  protected $_form=null;
  protected $_form_data=array();
  protected $_form_title='';

  protected $_render="Frd_Form_Render_Table";

  protected $_elements=array();
  protected $_validates=array();
  protected $_validate_messages=array();

  protected $flag_get_data=false;  //has call the getData
  protected $flag_trim=true;  //trim value or not , only in getValue

  function __construct($params=array())
  {
    $this->_form=new Frd_Form();
    $this->_form_params=$params; 

    if(isset($params['method']))
      $this->setMethod($params['method']);
  }

  function setRender($render,$title='')
  {
    $this->_render="Frd_Form_Render_". ucwords($render);
    $this->_form_title=($title);

  }

  function setFlag($flag,$value)
  {
    if($flat == 'trim')
      $this->flag_trim=$value;
  }

  function setAction($action)
  {
    $this->_form_params['action']=$action;

  }
  function setMethod($method)
  {
    if($method == 'post')
      $this->_form_method='post'; 
    else
      $this->_form_method='get'; 

  }

  function addElement($type,$name,$params=array(),$options=array(),$selected=null)
  {
    $params['type']=$type;
    $params['name']=$name;

    $this->_elements[$name]=array($params,$options,$selected);
  }

  function addValidate($name,$validate,$params=array())
  {
    $this->_validates[$name][]=array($validate,$params);
  }

  function isValid()
  {
    $valid=true;
    //get data
    if($this->_form_method=='post')
    {
      $data=$_POST;
    }
    else
    {
      $data=$_GET;
    }

    //var_dump($this->_validates);
    foreach($this->_validates as $name=>$validates)
    {
      foreach($validates as $validate)
      {
        $validate_name=$validate[0];
        $validate_param=$validate[1];
        //var_dump($validate_name);

        if($validate_name == 'required')
        {
          if(!isset($data[$name]))
            $value='';
          else
            $value=$data[$name];

          if(trim($value) == '')
          {
            $message='field '.$name.' required';
            $this->_validate_messages[$name][]=$message;
            $valid=false;
          }
        }


        if($validate_name == 'alpha')
        {
          if(!isset($data[$name]))
            $value='';
          else
            $value=$data[$name];


          $validator=new Zend_Validate_Alpha();
          if($validator->isValid($value))
          {
          }
          else
          {
            foreach($validator->getMessages() as $message)
            {
              $this->_validate_messages[$name][]=$message;
            }
            $valid=false;
          }
        }


        if($validate_name == 'email')
        {
          if(!isset($data[$name]))
            $value='';
          else
            $value=$data[$name];

          $validator=new Zend_Validate_EmailAddress();
          if($validator->isValid($value))
          {
            //return true; 
          }
          else
          {
            foreach($validator->getMessages() as $message)
            {
              $this->_validate_messages[$name][]=$message;
            }
            $valid=false;
          }
        }
      }
    }

    return $valid;
  }

  //it will only check is have $_POST['KEY'] !!!
  //so do not forget this field in the form
  function isSubmit($key='submit')
  {
    if($this->_form_method == 'post' && isset($_POST[$key]))
      return true;
    else if($this->_form_method == 'get' && isset($_GET[$key]))
      return true;
    else
      return false;
  }

  function render()
  {
    $render=new $this->_render($this->_form_data,$this->_form,$this->_elements,$this->_validate_messages,$this->_form_params,$this->_form_title);

    return $render->render();

  }

  function populate()
  {
    if( $this->has_get_data == false)
    {
      $this->getData(); 
    }

    return $this->render();
  }

  function getData()
  {
    if($this->_form_method=='post')
    {
      $this->_form_data=($_POST);
    }
    else
    {
      $this->_form_data=($_GET);
    }

    $this->has_get_data=true;
    return $this->_form_data;
  }
  function setData($data)
  {
    $this->_form_data=$data;

    $this->has_get_data=true;
  }

  function getValue($key,$default='')
  {
    if($this->flag_get_data ==false)
      $this->getData();

    if(isset($this->_form_data[$key]))
    {
      if($this->flag_trim == true)
        return trim($this->_form_data[$key]);
      else
        return $this->_form_data[$key];
    }
    else
    {
      return $default;
    }
  }

}
