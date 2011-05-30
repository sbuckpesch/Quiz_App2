<?php
class Answer
{
  function add($question_id,$name,$image='')
  {
    $table=new Frd_Table_Common(Config::Answer_Table,Config::Answer_Primary); 
    $table->question_id=$question_id;
    $table->name=$name;
    $table->image=$image;

    $table->save();

    return $table->lastinsertid();
  }

  function edit($answer_id,$name,$image='')
  {
    $table=new Frd_Table_Common(Config::Answer_Table,Config::Answer_Primary); 
    $table->load($answer_id);

    $table->name=$name;
    $table->image=$image;

    $table->save();
  }

  function delete($answer_id)
  {
    $table=new Frd_Table_Common(Config::Answer_Table,Config::Answer_Primary); 
    $table->delete($answer_id);
  }
}
