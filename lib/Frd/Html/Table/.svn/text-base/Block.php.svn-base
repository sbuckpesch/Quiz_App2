<?php
class Frd_Html_Table_Block extends Frd_Html_Element
{
  private $trs=array();


  function __construct($name,$attrs=null)
  {
    parent::__construct($name,$attrs); 
  }

  function addTr($tr=null)
  {
    
    if($tr == false || get_class($tr) != 'Frd_Html_Tr')
        $tr=new Frd_Html_Tr();

    $this->trs[]=$tr;

    return $tr;
  }

  function deleteTr($index)
  {
    unset($this->trs[$index]);
  }
  function addTrAttr($indexs,$key,$value)
  {
    if(is_numeric($indexs))
      $indexs=array($indexs);
    foreach($indexs as $index)
    {
      $index=$index-1;
      if(!isset($this->trs[$index]))
        throw new Exception('none tr index'. $index .' exists');

      $this->trs[$index]->addAttr($key,$value) ;
    }
  }
  function addRowAttr($rows,$key,$value)
  {
    if(is_numeric($rows))
      $rows=array($rows);
    foreach($rows as $row)
    {
      $row=$row-1;
      if(!isset($this->trs[$row]))
        throw new Exception('none tr index'. $row .' exists');
      $this->trs[$row]->addTdAttr("ALL",$key,$value) ;
    }
  }

  function addColAttr($cols,$key,$value)
  {
    if(is_numeric($cols))
      $cols=array($cols);
    $rows=array_keys($this->trs);
    foreach($rows as $row)
    {
      $this->trs[$row]->addTdAttr($cols,$key,$value) ;
    }
  }


  function toHtml()
  {
    $html='';
    foreach($this->trs as $tr)
      $html.=$tr->toHtml();

    $this->appendText($html);
    return "\n".parent::toHtml()."\n";
  }
}
