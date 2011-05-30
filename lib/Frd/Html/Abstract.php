<?php
/* html 基本元素
 * 属性：html属性(id,name,class...),值 (<>值</>)
 * 方法：addAttr(增加属性）,deleteAttr(删除属性),setValue(设定值),toHtml(生成html代码)
 *
 */
Abstract class Frd_Html_Abstract
{
  protected $attrs=null; 
  protected $name='';
  protected $value='';
  protected $childrens=array();

  function __construct($name,$attribs=null,$value=null)
  {
    $this->name=$name; 
    if($attribs!==null)
    {
      $this->attrs=new Frd_Html_Attributes($attribs);
    }

    if($value!=null)
      $this->appendText($value);
  }

  //获取下一个子节点的 index
  function getIndex($index=null)
  {
    if($index != null)
      return $index;
    else
     return count($this->childrens); 
  }

  //增加文本节点
  function addText($str)
  {
    $text=new Frd_Html_Text($str) ;
    $this->childrens[]=$text;
    return $text;
  }

  //增加子节点
  function add($name,$attribs=null,$value=null,$index=null)
  {
    $child=new Frd_Html($name,$attribs,$value);

    $index=$this->getIndex($index);
    $this->childrens[$index]=$child;

    return $child;
  }

  //删除指定节点
  function remove($index)
  {
    unset($this->childrens[$index]); 
  }

  //获取指定节点
  function get($index)
  {
    return ($this->childrens[$index]); 
  }

  //增加属性
  function addAttr($key,$value)
  {
    if($this->attrs===null)
    {
      $this->attrs=new Frd_Html_Attributes();
    }
    $this->attrs->add($key,$value);
  }

  //去除属性
  function removeAttr($key)
  {
    if($this->attrs===null)
      throw new Exception("delete null Frd_Html_Attributes object!");

    $this->attrs->delete($key);

  }

  //生成html
  function toHtml()
  {
    if($this->attrs instanceof Frd_Html_Attributes )
      $attributes=$this->attrs->toHtml();
    else
      $attributes='';

    if(count($this->childrens) === 0) 
    {
      $html='<'.$this->name.''.$attributes.'/>';;
    }
    else
    {
      $html='<'.$this->name.''.$attributes.'>';
      foreach($this->childrens as $element)
      {
        $html.=$element->toHtml();
      }
      $html.='</'.$this->name.'>';
    }
    return $html;
  }
}
