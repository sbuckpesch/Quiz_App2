<?php
  $q=$this->params['q'];
  $remove_id="q_".$q."_remove";
?>
<div id="q_<?php echo $q; ?>" class="question">
  <div class="question-line" onclick="part2_toggle_answers(this)">
    <div class="clear"></div>
    <a>Question <?php echo $q; ?></a>
    <a class="question_remove" id="<?php echo $remove_id; ?>" style="display:none" onclick="remove_question(<?php echo $q; ?>)">Remove Question</a>
      <div class="clear"></div>
  </div>

  <div style="display: block;" class="q_content">
    <?php render("block/question_field.php",array('q'=>$q)); ?>
    <div class="q_answer">Answers: </div>
      <div id="question_<?php echo $q; ?>_answers_container">
        <?php render('block/answer.php',array('q'=>$q,'answer'=>1)); ?>
      </div>
  </div>

  <div class="add_answer">
  <a onclick="add_answer(<?php echo $q; ?>);">
      <img src="http://d1bye8fl443jlj.cloudfront.net/prod/images/quiz_create_part2-add.gif">
    </a> 
  </div>
</div>
