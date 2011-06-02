<?php
  $q=$this->params['q'];
  $remove_id="q_".$q."_remove";

  if(isset($this->params['question_id']))
  {
    $question_id=$this->params['question_id'];
    $question_name=$this->params['question_name'];
    $question_image=$this->params['question_image'];
    $correct_answer=$this->params['correct'];
  }
  else
  {
    $question_id= false;
    $question_name='';
    $question_image='';
    $correct_answer='';
  }


?>
<div id="q_<?php echo $q; ?>" class="question">

  <div style="display: block;" class="q_content">

  </div>

</div>
