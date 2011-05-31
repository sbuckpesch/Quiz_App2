<?php
require('init.php');
require('header.php');

$question_count=0;
$question_correct=0;

//var_dump($_POST);
$quiz_id=16; 
$quiz=Frd::getClass("quiz")->getQuiz($quiz_id);

$_POST['quiz_name']=$quiz->name;


$quiz->type=2;
if($quiz->type == 1)
{
  $data=check_quiz_type1($_POST);
  render('result_type1.php',$data);
}
else if($quiz->type == 2)
{
  $data=check_quiz_type2($_POST);
  render('result_type2.php',$data);
}



function  check_quiz_type2($params)
{
  $questions=$params['question'];

  //$questions=Frd::getClass("quiz")->getQuestions($quiz_id); 

  $model=new Question();
  $question_count=count($questions);
  foreach($questions as $question_id=>$answer_id)
  {
    if($model->isCorrect($question_id,$answer_id))
    {
      $question_correct+=1;
      $params['question'][$question_id]=array(
        'answer_id'=>$answer_id,
       'correct'=>false,
      );


    }
    else
    {
      $params['question'][$question_id]['correct']=true;

      $params['question'][$question_id]=array(
        'answer_id'=>$answer_id,
       'correct'=>true,
      );
    }
  }


  return $params;
}
