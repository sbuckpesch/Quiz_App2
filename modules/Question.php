<?php
class Question
{
  function add($quiz_id,$correct,$name,$image='')
  {
    $table=new Frd_Table_Common(Config::Question_Table,Config::Question_Primary); 
    $table->quiz_id=$quiz_id;
    $table->correct=$correct;
    $table->name=$name;
    $table->image=$image;

    $table->save();

    return $table->lastinsertid();
  }

  function edit($question_id,$correct,$name,$image='')
  {
    $table=new Frd_Table_Common(Config::Question_Table,Config::Question_Primary); 
    $table->load($question_id);

    $table->name=$name;
    $table->correct=$correct;
    $table->image=$image;

    $table->save();
  }

  function delete($question_id)
  {
    $table=new Frd_Table_Common(Config::Question_Table,Config::Question_Primary); 
    $table->delete($$question_id);
  }
}
