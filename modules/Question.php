<?php
class Question
{
  function add($quiz_id,$name,$image='')
  {
    $table=new Frd_Table_Common(Config::Question_Table,Config::Question_Primary); 
    $table->quiz_id=$quiz_id;
    $table->correct=0;
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

  function updateCorrect($question,$correct_answer_id)
  {
    $table=new Frd_Table_Common(Config::Question_Table,Config::Question_Primary); 
    $table->load($question_id);
    $table->correct=$correct;
    $table->save();
  }
  function isCorrect($question_id,$answer_id)
  {
    $table=new Frd_Table_Common(Config::Question_Table,Config::Question_Primary); 
    $table->load($question_id);

    if($table->correct==$answer_id)
      return true;
    else
      return false;
  }
}
