<?php
/*
 * Microtimer
 */
class Frd_Microtimer
{
  protected $points=array();
  public function start($k)
  {
    if(!isset($this->points[$k]))
    {
      $this->points[$k]['start']=microtime(true);
    }
    else
    {
      throw new Exception('This point is already used!') ;
    }
  }

  public function end($k)
  {
    if(!isset($this->points[$k]))
    {
      throw new Exception('This point is not used!') ;
    }
    else
    {
      $this->points[$k]['end']=microtime(true);
    }
  }

  public function distence($k)
  {
    if(!isset($this->points[$k]['start']) || !isset($this->points[$k]['end']) )
    {
      throw new Exception('need start time and end time!') ;
    }
    else
    {
      return intval($this->points[$k]['end']*1000-$this->points[$k]['start']*1000)/1000;
    }
     
  }
}

