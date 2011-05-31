<?php
class Outcome
{
  function add($quiz_id,$name,$image,$desc)
  {
    $table=new Frd_Table_Common(Config::Outcome_Table,Config::Outcome_Primary); 
    $table->quiz_id=$quiz_id;
    $table->name=$name;
    $table->image=$image;
    $table->desc=$desc;

    $table->save();

    return $table->lastinsertid();
  }

  function edit($outcome_id,$name,$image,$desc)
  {
    $table=new Frd_Table_Common(Config::Outcome_Table,Config::Outcome_Primary); 
    $table->load($outcome_id);

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
