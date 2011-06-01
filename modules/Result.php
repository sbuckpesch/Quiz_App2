<?php
class Result
{
  function save($quiz_id,$fb_user_id,$is_all_right,$value=array())
  {
    $this->clear($quiz_id,$fb_user_id);

    $table=new Frd_Table_Common(Config::Result_Table,Config::Result_Primary); 
    $table->quiz_id=$quiz_id;
    $table->fb_user_id=$fb_user_id;

    $table->is_all_right=$is_all_right;
    $table->value=serialize($value);

    $table->save();

    return $table->lastinsertid();
  }

  function clear($quiz_id,$fb_user_id)
  {
    $db=Frd::getDb(); 

    $table=Config::Result_Table;
    $where=array();
    $where[]=$db->quoteInto('quiz_id=?',$quiz_id);
    $where[]=$db->quoteInto('fb_user_id=?',$fb_user_id);

    $db->delete($table,$where);
  }

}
