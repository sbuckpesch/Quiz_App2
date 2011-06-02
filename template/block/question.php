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
  <div class="question-line" onclick="part2_toggle_answers(this)" class="enable">
    <div class="clear"></div>
    <a>Question <?php echo $q; ?></a>
    <a class="question_remove" id="<?php echo $remove_id; ?>" style="display:none" onclick="remove_question(<?php echo $q; ?>)">Remove Question</a>
      <div class="clear"></div>
  </div>

  <div style="display: block;" class="q_content">
    </div>

    <div class="add_answer">
    <a onclick="add_answer(<?php echo $q; ?>);">
        <img src="images/quiz_create_part2-add.gif">
      </a> 
    </div>

</div>
