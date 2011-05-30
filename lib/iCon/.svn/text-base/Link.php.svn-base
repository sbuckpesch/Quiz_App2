<?php

/**
 * Link functions for facebook app
 * 
 * functions:
 *  1, craete link
 *  2, get parameter
 *  3, create link html
 *
 * @author fred
 *
 */
class Link 
{
    //current params
    protected $_params=array();

    /**
     * Creates a link to a file which should be shown in the Fanpage tab
     * @param String $file Filename which should be loaded to the Fanpage-Tab
     * @return String Link to show the commited file in the Fanpage Tab
     */
    public function createLink($file,$param=array()) 
    {
        global $global;
        $param['page']=$file;


        $param_str='';
        foreach($param as $k=>$v)
        {
            $param_str.=$k.'='.urlencode($v).'&';
        }

        //$app_data=base64_encode($param_str);
        $app_data=base64_encode($param_str);

        $link = $global->instance['fb_page_url'] . "?sk=app_" . $global->instance['fb_app_id'] . "&app_data=" . $app_data;


        return $link;

    }
    public function createCanvasLink($file,$param=array()) 
    {
      global $global;

      $param['page']=$file;
      $param_str='';
      foreach($param as $k=>$v)
      {
        $param_str.=$k.'='.($v).'&';
      }

      $param_str=trim($param_str,"&");

      $url='http://apps.facebook.com/'.$global->instance['fb_app_url'].'/index.php?'.$param_str;

      return $url;
    }

    public function createBaseLink($file,$param=array()) 
    {
      global $global;

      $param['page']=$file;
      $param_str='';
      foreach($param as $k=>$v)
      {
        $param_str.=$k.'='.($v).'&';
      }

      $param_str=trim($param_str,"&");

      $url=$global->baseurl.'/index.php?'.$param_str;

      return $url;
    }
    /*
     * only for the welcome fanpage , this page does not need any parameter
     *
     */
    public function createIndexLink()
    {
        global $global;

        $link = $global->instance['fb_page_url'] . "?sk=app_" . $global->instance['fb_app_id'] ;

        return $link;
    }

    /*
     * get param from current page, the param is store in _GET['app_data']
     *
     * @param  key   string parameter key
     * @param  default  the default value if not have parameter
     */
    public function getParam($key,$default=false)
    {
        if(isset($_GET[$key]))
            return $_GET[$key];

        if(isset($this->_params[$key]))
            return $this->_params[$key];
        else
            return $default;
    }
    /*
     * get current page
     * @return current page name or false if not exists
     */
    public function getPage($default)
    {
        return self::getParam('page',$default);
    }

    /*
     * parse params from signed_request
     */
    function parseRequest()
    {
      global $global;

      if(!isset($_REQUEST['signed_request']) || isset($global->instance) == false)
      {
        $this->_params=array();
        return false;
      }

      $secret=$global->instance['fb_app_secret'];
      $request=$_REQUEST['signed_request'];

      if($request == false)
      {
        $this->_params=array();
        return false;
      }

      $data = $this->parse_signed_request($request, $secret);
      if(!isset($data['app_data']))
        return false;

      $app_data=base64_decode($data['app_data']);

      $param_str=explode("&",$app_data);

      $params=array();
      foreach($param_str as $v)
      {
        $arr=explode("=",$v);
        if(is_array($arr) && count($arr) == 2)
        {
          list($kk,$vv)=$arr;

          if($kk != false)
            $params[$kk]=$vv;
        }
      }

      $this->_params=$params;
    }

    function parse_signed_request($signed_request, $secret) 
    {
        list($encoded_sig, $payload) = explode('.', $signed_request, 2); 

        // decode the data
        $sig = $this->base64_url_decode($encoded_sig);
        $data = json_decode($this->base64_url_decode($payload), true);

        if (strtoupper($data['algorithm']) !== 'HMAC-SHA256') {
            error_log('Unknown algorithm. Expected HMAC-SHA256');
            return null;
        }

        // check sig
        $expected_sig = hash_hmac('sha256', $payload, $secret, $raw = true);
        if ($sig !== $expected_sig) {
            error_log('Bad Signed JSON signature!');
            return null;
        }

        return $data;
    }

    function display()
    {
        print_r($this->_params);
    }
	 function base64_url_decode($input) {
		return base64_decode(strtr($input, '-_', '+/'));
	}
}
