<?php
class Outcome
{
  function add($name,$image='',$desc='',$type=1)
  {
    $table=new Frd_Table_Common(Config::Outcome_Table,Config::Outcome_Primary); 
    $table->name=$name;
    $table->image=$image;
    $table->desc=$desc;
    $table->type=$type;

    $table->save();

    return $table->lastinsertid();
  }

  function edit($quiz_id,$name,$image='',$desc='')
  {
    $table=new Frd_Table_Common(Config::Outcome_Table,Config::Outcome_Primary); 
    $table->load($quiz_id);

    $table->name=$name;
    $table->image=$image;
    $table->desc=$desc;

    $table->save();
  }

  function delete($outcome_id)
  {
    $table=new Frd_Table_Common(Config::Outcome_Table,Config::Outcome_Primary); 
    $table->delete($$outcome_id);
  }
}
