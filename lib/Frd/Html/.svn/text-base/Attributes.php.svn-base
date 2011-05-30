<?php
/* Html属性
 *
 * 方法：add(增加属性），delete(删除属性),toHtml(生成html代码，两边没有空格)
 *
 */
class Frd_Html_Attributes
{
  protected $attrs=array();
  function __construct($attribs=null)
  {
    if(is_array($attribs)) 
    {
      foreach($attribs as $k=>$v) 
        $this->add($k,$v);
    }
  }

  function add($key,$value)
  {
    $this->attrs[$key] =$value;
  }

  function delete($key)
  {
    unset($this->attrs[$key]);
  }

  function toHtml()
  {
    $html='';

    foreach($this->attrs as $key=>$value)
    {
        if($value!==null)
            $html.=$key.'="'.$value.'" ';
        else
            $html.=$key;
    }

    return " ".trim($html)."";
  }
}
