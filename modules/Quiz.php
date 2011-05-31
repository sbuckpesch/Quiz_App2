<?php
class Quiz
{
  //get a quiz record
  function getQuiz($quiz_id)
  {
    $table=new Frd_Table_Common(Config::Quiz_Table,Config::Quiz_Primary); 
    $table->load($quiz_id);

    return $table;
  }

  function getQuizType($quiz_id)
  {
    $table=new Frd_Table_Common(Config::Quiz_Table,Config::Quiz_Primary); 
    $table->load($quiz_id);

    return $table->type;
  }

  //get questions
  function getQuestions($quiz_id)
  {
    $db=Frd::getDb(); 
    $select=$db->select();

    $select->from(Config::Question_Table,"*");
    $select->where('quiz_id=?',$quiz_id);

    $rows=$db->fetchAll($select);

    return $rows;
  }
  
  //get answers
  function getAnswers($question_id)
  {
    $db=Frd::getDb(); 
    $select=$db->select();

    $select->from(Config::Answer_Table,"*");
    $select->where('question_id=?',$question_id);

    $rows=$db->fetchAll($select);

    return $rows;
  }

  function add($fb_page_id,$name,$image='',$desc='',$type=1)
  {
    $table=new Frd_Table_Common(Config::Quiz_Table,Config::Quiz_Primary); 
    $table->fb_page_id=$fb_page_id;
    $table->name=$name;
    $table->image=$image;
    $table->description=$desc;
    $table->type=$type;

    $table->save();

    return $table->lastinsertid();
  }

  function edit($quiz_id,$name,$image='',$desc='')
  {
    $table=new Frd_Table_Common(Config::Quiz_Table,Config::Quiz_Primary); 
    $table->load($quiz_id);

    $table->name=$name;
    $table->image=$image;
    $table->description=$desc;

    $table->save();
  }

  function delete($quiz_id)
  {
    $table=new Frd_Table_Common(Config::Quiz_Table,Config::Quiz_Primary); 
    $table->delete($quiz_id);
  }
}
