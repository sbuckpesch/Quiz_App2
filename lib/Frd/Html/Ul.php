<?php
class Frd_Html_Ul extends Frd_Html_Element
{
  function __construct($attrs=null,$value=null)
  {
    parent::__construct('ul',$attrs,$value);
    $this->value=$value;
  }

  function toHtml()
  {
    return "\n".parent::toHtml()."\n";
  } 
}
