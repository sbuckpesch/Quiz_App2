<?php
/*æ–‡ä»¶ä¸Šä¼ 
 *å�Žç¼€æ£€æµ‹ï¼Œæ–‡ä»¶å¤§å°�æ£€æµ‹ï¼Œä¸Šä¼ åˆ°æŸ�è·¯å¾„
 * æ–‡ä»¶å�Žç¼€å��æ£€æµ‹ï¼Œé‡‡ç”¨æˆ–è€…æŒ‰å…�è®¸ ï¼Œæˆ–è¿™æŒ‰ç¦�æ­¢ï¼Œå“ªä¸ªæ•°æ�®ä¸�ä¸ºç©ºï¼Œå°±ç”¨å“ªä¸ªï¼Œ
 * å¦‚æžœéƒ½ä¸�ä¸ºç©ºï¼Œä½¿ç”¨å…�è®¸è§„åˆ™
 */
class Frd_Uploader
{
	const NO_ERROR=0;
	const VALIDATE_SIZE=1;
	const VALIDATE_TYPE=2;

	protected $_error_code=0;
	protected $_error_message="no error";

	protected $_size_limit=0;
	protected $_allow_types=array();
	protected $_deny_types=array();


	protected $_file=null;
	function __construct($file)
	{
		if(!is_array($file)	 || empty($file) )
			throw new Exception("validate file to upload");

		$this->_file=$file;
		$this->init();
	}

	//é¢„ç•™æŽ¥å�£
	function init()
	{
	
	}
	//å¢žåŠ æ–‡ä»¶å��å�Žç¼€é™�åˆ¶
	function addAllowType($type)
	{
		if(is_string($type) )	
			$type=array($type);

		$this->_allow_types=array_merge($this->_allow_types,$type);
	}

	//å¢žåŠ æ–‡ä»¶å��å�Žç¼€é™�åˆ¶
	function addDenyType($type)
	{
		if(is_string($type) )	
			$type=array($type);

		$this->_deny_types=array_merge($this->_deny_types,$type);
	}

	//è®¾ç½®æ–‡ä»¶å¤§å°�é™�åˆ¶,å­—èŠ‚ä¸ºå�•ä½�,0æ˜¯ä¸�é™�åˆ¶
	function setFileSizeLimit($size)
	{
		$size=intval($size);	

		$this->_size_limit=$size;
	}

	//å¯¹æ–‡ä»¶è¿›è¡Œæ£€æµ‹
	function validate()
	{
		if(ceil($this->_file['size']/1000) > $this->_size_limit)		
		{
				//var_dump($this->_file['size']);
				$this->_error_code=self::VALIDATE_SIZE;
				$this->_error_message="File size is too large";
				return false;
		}

		$type=$this->_getFileType($this->_file['name']);


		if(!empty($this->_allow_types))
		{
			if(in_array($type,$this->_allow_types) == false)
			{
				$this->_error_code=self::VALIDATE_TYPE;
				$this->_error_message="File type not allowed";
				return false;
			}
		}
		else if(!empty($this->_deny_types))
		{
			if(in_array($type,$this->_deny_types))
			{
				$this->_error_code=self::VALIDATE_TYPE;
				$this->_error_message="File type not allowed";
				return false;
			}
		
		}


		return true;
	}

	//èŽ·å�–æ–‡ä»¶å��å�Žç¼€
	protected function _getFileType($name)
	{
		if(strpos($name,".") === false)
		{
			return "";
		}
		else
		{
			$arr=explode('.', $name);
			return strtolower(array_pop($arr));
		}
	}
	//get filename's suffix
	function getFileType($name)
  {
    return $this->_getFileType($name); 
  }

	function errorCode()
	{
		return $this->_error_code;	
	}

	function errorMessage()
	{
		return $this->_error_message;
	}

	function _upload($dest)
	{
		move_uploaded_file($this->_file['tmp_name'], $dest);
	}
}
