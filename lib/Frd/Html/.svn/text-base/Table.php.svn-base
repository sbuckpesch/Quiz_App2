<?php
/* Table类，包含 TableBlock,Tr,Td, 需要 HtmlElement,HtmlAttributes
 * Table <= Thead,Tbody,Tfoot, <= Tr <= Td
 * 使用时，尽量保持html代码独立，推荐属性class和id 
 * TableBlock 实现方法，方便从原始数据生成html代码
 *
 * 本系列类目标是实现 从php 数组等原始数据 生成 html代码
 * 在controller 和 view 中增加 view 逻辑层
 * 具体样式，需要在 view 中，借助css,javascript 实现
 * 可以再css和javascript中实现的效果，不应该由此模块扩展实现
 */
class Frd_Html_Table extends Frd_Html_Element
{
  private $head=null;
  private $body=null;
  private $foot=null;


  function __construct($attrs=null)
  {
    parent::__construct('table',$attrs);

    $this->head=new Frd_Html_Table_Block('thead');
    $this->body=new Frd_Html_Table_Block('tbody');
    $this->foot=new Frd_Html_Table_Block('tfoot');
  }
  
  function __get($key)
  {
      /*
    if($this->$key instanceof Frd_Html_Table_Block === false)
    {
      $this->$key= new Frd_Html_Table_Block($key);
    }
       */

    return $this->$key; 
  }

  function toHtml()
  {
    $html='';
    if($this->head instanceof Frd_Html_Table_Block === true)
      $html.=$this->head->toHtml(); 
    if($this->body instanceof Frd_Html_Table_Block === true)
      $html.=$this->body->toHtml(); 
    if($this->foot instanceof Frd_Html_Table_Block === true)
      $html.=$this->foot->toHtml(); 

    $this->appendText($html);
    return parent::toHtml();
  }
}
