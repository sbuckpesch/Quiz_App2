<?php
class Frd_Debug_Timer
{
  protected $start_time=0;
  protected $end_time=0;
  public function start()
  {
    $this->start_time=$this->microtime();
  }
  public function end()
  {
    $this->end_time=$this->microtime();
  }

  public function info()
  {
    echo "\n"."Used: ".$this->distence($this->start_time,$this->end_time)."\n";
  }

  private function microtime()
  {
    return microtime(true); 
  }

  private function distence($time_start,$time_end)
  {
    return $time_end-$time_start; 
  }
}
?>
