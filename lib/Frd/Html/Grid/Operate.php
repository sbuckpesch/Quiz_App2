<?php
/* 操作的栏目
 *
 */
class Frd_Html_Grid_Operate
{

  protected $_operates=array();

  function __construct()
  {
    $this->add("add","Add");
    $this->add("show","Show");
    $this->add("edit","Edit");
    $this->add("del","Delete");
  }

  function add($action,$label)
  {
    $action=strtolower($action);
    $this->_operates[$action]=sprintf('<a id="%s" name="%s" href="#" style="padding-left:10px">%s</a>',"grid_".$action,"grid_".$action,$label);

  }

  function remove($action)
  {
    $action=strtolower($action);
    unset($this->_operates[$action]);
  }

  function toHtml()
  {
    $html='';
    foreach($this->_operates  as $link)
    {
      $html.=$link;
    }

    return $html;
  }
}
