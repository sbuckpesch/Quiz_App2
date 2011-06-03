<?php
class Result
{
  function save($quiz_id,$fb_user_id,$is_all_right,$value=array())
  {
    //$this->clear($quiz_id,$fb_user_id);
    $result_id=$this->getResultId($quiz_id,$fb_user_id);

    $table=new Frd_Table_Common(Config::Result_Table,Config::Result_Primary); 
    if($result_id > 0)
      $table->load($result_id);

    $table->quiz_id=$quiz_id;
    $table->fb_user_id=$fb_user_id;

    $time=$this->getParticipantTime($quiz_id,$fb_user_id);

    $time=$time+1;

    $table->participant_time=$time;

    $table->is_all_right=$is_all_right;
    $table->value=serialize($value);

    $table->save();

    return $table->lastinsertid();
  }

  function getParticipantTime($quiz_id,$fb_user_id)
  {
    $db=Frd::getDb(); 

    $select=$db->select();

    $select->from(Config::Result_Table,'participant_time');
    $select->where('quiz_id=?',$quiz_id);
    $select->where('fb_user_id=?',$fb_user_id);

    echo $select;
    $time=$db->fetchOne($select);

    var_dump($time);

    return intval($time);
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

  function getResultId($quiz_id,$fb_user_id)
  {
    $db=Frd::getDb(); 

    $select=$db->select();

    $select->from(Config::Result_Table,Config::Result_Primary);
    $select->where('quiz_id=?',$quiz_id);
    $select->where('fb_user_id=?',$fb_user_id);

    $id=$db->fetchOne($select);


    return $id;
  }

}
