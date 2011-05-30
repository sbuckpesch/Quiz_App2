<?php
/* html 基本元素
 * 属性：html属性(id,name,class...),值 (<>值</>)
 * 方法：addAttr(增加属性）,deleteAttr(删除属性),setValue(设定值),toHtml(生成html代码)
 *
 */
class Frd_Html_Element
{
  protected $attrs=null; 
  protected $name='';
  protected $value='';
  protected $children=array();

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

  function getLastIndex()
  {
      return count($this->children); 
  }

  function get($index=null)
  {
    if(isset($this->children[$index]) )
      return $this->children[$index];
    else
        throw new Exception("child not exist,index $index");
  }


  function set($index,$name,$attribs=null,$value=null)
  {
      if($name instanceof Frd_Html_Element)
          $child=$name;
      else
          $child=new Frd_Html_Element($name,$attribs,$value);
    $child=new Frd_Html_Element($name,$attribs,$value);

    $this->children[$index]=$child;

    return $index;
  }

  function add($name,$attribs=null,$value=null)
  {
      if($name instanceof Frd_Html_Element)
          $child=$name;
      else
          $child=new Frd_Html_Element($name,$attribs,$value);

    $index=$this->getLastIndex();
    $this->children[$index]=$child;

    return $child;
  }

  function remove($index)
  {
    unset($this->children[$index]); 
  }

  function appendText($str)
  {
    $text=new Frd_Html_Text($str) ;
    $this->children[]=$text;
    return $text;
  }
  function addAttr($key,$value)
  {
    if($this->attrs===null)
    {
      $this->attrs=new Frd_Html_Attributes();
    }
    $this->attrs->add($key,$value);
  }
  function removeAttr($key)
  {
    if($this->attrs===null)
      throw new Exception("delete null Frd_Html_Attributes object!");

    $this->attrs->delete($key);

  }
  function toHtml()
  {
    if($this->attrs instanceof Frd_Html_Attributes )
      $attributes=$this->attrs->toHtml();
    else
      $attributes='';

    if(count($this->children) === 0) 
    {
      $html='<'.$this->name.''.$attributes.'/>';;
    }
    else
    {
      $html='<'.$this->name.''.$attributes.'>';
      foreach($this->children as $element)
      {
        $html.=$element->toHtml();
      }
      $html.='</'.$this->name.'>';
    }
    return $html;
  }
}
