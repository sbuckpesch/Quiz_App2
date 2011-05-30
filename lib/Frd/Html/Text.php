<?php
/* html 文本元素
 * 不同于其它元素，文本元素没有标签,没有属性，只有文本
 */
class Frd_Html_Text
{
  protected $value='';

  function __construct($value)
  {
    $this->value=$value; 
  }

  function toHtml()
  {
    return $this->value;
  }
}
