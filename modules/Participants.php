<?php
/**
 * class for operate  table participatns
 *
 */

class Participants
{
  protected $table="participants";
  protected $primary="participant_id";

  /**
   * save user information
   */
  function save($user_id,$params)
  {
    if($user_id == false)
      return false;

    $id=$this->getParticipantId($user_id);

    $table=new Frd_Table_Common($this->table,$this->primary);
    $table->userId=$user_id;

    if(isset($params['username']))
      $table->username=$params['username'];
    if(isset($params['name']))
      $table->name=$params['name'];
    if(isset($params['first_name']))
      $table->first_name=$params['first_name'];
    if(isset($params['middle_name']))
      $table->middle_name=$params['middle_name'];
    if(isset($params['last_name']))
      $table->last_name=$params['last_name'];
    if(isset($params['email']))
      $table->email=$params['email'];
    if(isset($params['gender']))
      $table->gender=$params['gender'];
    if(isset($params['about']))
      $table->about=$params['about'];
    if(isset($params['hometown']))
      $table->hometown=$params['hometown'];
    if(isset($params['location']))
      $table->location=$params['location'];
    if(isset($params['link']))
      $table->link=$params['link'];

    return $table->save();
  }

  /**
   * get participatn id by userid
   *
   * @return integer participatn_id  if not exists,return 0
   */
  function getParticipantId($user_id)
  {
    $db=Frd::getDb(); 
    $select=$db->select();

    $select->from($this->table,$this->primary);
    $select->where('userId=?',$user_id);
    $select->limit(1);


    $id= $db->fetchOne($select);
    if($id = false)
      $id=0;

    return $id;
  }

}

?>
