<?php
class Quiz
{
  //get a quiz record
  function loadQuiz($quiz_id)
  {
    $table=new Frd_Table_Common(Config::Quiz_Table,Config::Quiz_Primary); 
    $table->load($quiz_id);

    return $table;
  }
  //get a quiz record
  function getQuiz($fb_page_id)
  {
    $table=new Frd_Table_Common(Config::Quiz_Table,Config::Quiz_Primary); 
    $rows=$table->loadBy('fb_page_id',$fb_page_id);

    if($rows != false)
      return $rows[0];
    else 
      return false;
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
    //$select->order('id desc');

    $rows=$db->fetchAll($select);

    return $rows;
  }

  function clearQuestions($quiz_id)
  {
    $db=Frd::getDb(); 

    $table=Config::Question_Table;

    $where=$db->quoteInto('quiz_id=?',$quiz_id);

    $db->delete($table,$where);
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

  //get answers
  function clearAnswers($question_id)
  {
    $db=Frd::getDb(); 

    $table=Config::Answer_Table;
    $where=$db->quoteInto('question_id=?',$question_id);


    $db->delete($table,$where);
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

  function clear($quiz_id)
  {
    $questions=$this->getQuestions($quiz_id);
    foreach($questions as $question)
    {
      $question_id=$question['id'] ;
      $this->clearAnswers($question_id);
    }

    $this->clearQuestions($quiz_id);
  }

}
