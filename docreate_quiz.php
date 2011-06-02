<?php
require('init.php');

//var_dump($_POST);

if(isset($_POST['quiz_id']))
  $quiz_id=$_POST['quiz_id'];
else
  $quiz_id=false;

//1, add quiz
$quiz=new Quiz();
if($quiz_id > 0)
{
  $quiz->edit($quiz_id,$_POST['quiz_name'],$_POST['quiz_image'],$_POST['quiz_description']);
  $quiz->clear($quiz_id);
}
else
{
  $quiz_id=$quiz->add($_POST['quiz_fb_page_id'],$_POST['quiz_name'],$_POST['quiz_image'],$_POST['quiz_description']);

}


//add outcome
/*
if(isset($_POST['outcomes']))
{
  $outcomes=$_POST['outcomes'];

  foreach($outcomes as $outcome)
  {
    $name=$outcome['name'];  
    $image=$outcome['image'];  
    $description=$outcome['description'];  

    $outcome=new Outcome();
    $outcome_id=$outcome->add($quiz_id,$name,$image,$description);

  }
}
*/

//2, add question

$questions=$_POST['questions'];



foreach($questions as $question)
{
  $name=$question['name'];  
  $correct=$question['correct'];  
  $image=$question['image'];  

  $q=new Question();
  $question_id=$q->add($quiz_id,$name,$image);

  //3, add answer
  $answers=$question['answers'];
  foreach($answers as $k=>$answer)
  {
    $name=$answer['name'];  
    $image=$answer['image'];  

    $answer=new Answer();
    $answer_id=$answer->add($question_id,$name,$image);

    if($k == $correct)
    {
      $q->updateCorrect($question_id,$answer_id);
    }

  }
}



$return=array(
  'error'=>0,
  'quiz_id'=>$quiz_id,
);

echo json_encode($return);
exit();
