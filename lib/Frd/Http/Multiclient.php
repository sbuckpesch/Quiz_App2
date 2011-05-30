<?php 
class Frd_Http_Multiclient
{
  public $urls = array();
  public $curlopt_header = 1;
  public $method = "GET";

  function __construct($urls = false)
  {
    $this->urls = $urls;
  }

  function setUrls($urls)
  {
    $this->urls = $urls;
    return $this;
  }

  function isReturnHeader($b)
  {
    $this->curlopt_header = $b;
    return $this;
  }

  function setMethod($m)
  {
    $this->medthod = strtoupper($m);
    return $this;
  }

  function request()
  {
    if(!is_array($this->urls) or count($this->urls) == 0){
      return false;
    }

    $curl = $text = array();

    $handle = curl_multi_init();

    foreach($this->urls as $k=>$v)
    {
      $curl[$k] = $this->addHandle($handle, $v);
    }

    $this->execHandle($handle);

    foreach($this->urls as $k=>$v)
    {
      $text[$k] =  curl_multi_getcontent ($curl[$k]);
      curl_multi_remove_handle($handle, $curl[$k]);
    }

    curl_multi_close($handle);
    return $text;
  }


  private function addHandle(&$handle, $url)
  {
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    //do not need header information
    //curl_setopt($curl, CURLOPT_HEADER, $this->curlopt_header);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_multi_add_handle($handle, $curl);
    return $curl;
  }

  private function execHandle(&$handle)
  {
    $flag = null;
    do {
      curl_multi_exec($handle, $flag);
    } while ($flag > 0);
  }
}
