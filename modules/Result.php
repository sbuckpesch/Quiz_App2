<?php
class Result
{
  function add($quiz_id,$fb_user_id,$is_all_right,$value=array())
  {
    $table=new Frd_Table_Common(Config::Result_Table,Config::Result_Primary); 
    $table->quiz_id=$quiz_id;
    $table->fb_user_id=$fb_user_id;

    $table->is_all_right=$is_all_right;
    $table->value=serialize($value);

    $table->save();

    return $table->lastinsertid();
  }
}
