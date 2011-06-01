<?php
require('init.php');
//require('header.php');

$question_count=0;
$question_correct=0;


$quiz_id=$_POST['quiz_id'];

if(!isset($_POST['question']))
{
  $result=array(
  'error'=>1,
  'error_msg'=>'please choose the answer', 
  );

  echo json_encode($result);
  exit();
}
$quiz=Frd::getClass("quiz")->loadQuiz($quiz_id);

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

  $result=array(
    'error'=>0,
    'is_all_right'=>$data['is_all_right'], 
  );

  echo json_encode($result);
  exit();
  //render('result_type2.php',$data);
}



function  check_quiz_type2($params)
{
  $questions=$params['question'];

  //$questions=Frd::getClass("quiz")->getQuestions($quiz_id); 

  $model=new Question();
  $question_count=count($questions);
  $is_all_right='y';
  foreach($questions as $question_id=>$answer_id)
  {
    if($model->isCorrect($question_id,$answer_id))
    {
      $params['question'][$question_id]=array(
        'answer_id'=>$answer_id,
       'correct'=>1,
      );
    }
    else
    {
      $params['question'][$question_id]['correct']=true;

      $params['question'][$question_id]=array(
        'answer_id'=>$answer_id,
       'correct'=>0,
      );

      $is_all_right='n';
    }
  }

  $params['is_all_right']=$is_all_right;


  save_result($params);
  return $params;
}

function save_result($params)
{
  $quiz_id=$params['quiz_id'];
  $fb_user_id=$params['fb_user_id'];
  $is_all_right=$params['is_all_right'];
  $value=$params['question'];

  $result=new Result();
  $result->save($quiz_id,$fb_user_id,$is_all_right,$value);

}

