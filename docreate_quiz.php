<?php
require('init.php');

//var_dump($_POST);


$_POST['fb_page_id']=100;
//1, add quiz
$quiz=new Quiz();
$quiz_id=$quiz->add($_POST['fb_page_id'],$_POST['quiz_name'],$_POST['quiz_image'],$_POST['quiz_description']);

//2, add question

$questions=$_POST['questions'];

foreach($questions as $question)
{
  $name=$question['name'];  
  $correct=$question['correct'];  
  $image=$question['image'];  

  $q=new Question();
  $question_id=$q->add($quiz_id,$correct,$name,$image);

  //3, add answer
  $answers=$question['answers'];
  foreach($answers as $answer)
  {
    $name=$answer['name'];  
    $image=$answer['image'];  

    $answer=new Answer();
    $answer_id=$answer->add($question_id,$name,$image);
  }
}



$return=array(
  'error'=>0,
  'quiz_id'=>$quiz_id,
);

echo json_encode($return);
exit();
