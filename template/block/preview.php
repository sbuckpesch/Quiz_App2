<?php
  $quiz_id=$this->params['quiz_id']; 
  $quiz=Frd::getClass("quiz")->loadQuiz($quiz_id);
?>

<div class="quiz_name">
  <div class="thumb">
  </div>
  <div id="quiz_preview_name" class="name"><?php echo $quiz->name; ?></div>
</div>


  <!-- questions -->
<div id="question_list" class="question_list">

  <?php $questions=Frd::getClass("quiz")->getQuestions($quiz_id); ?>
  <?php foreach($questions as $k=>$question): ?>
  <div class="question">
    <div class="top">
      <div class="t_name">
        <?php echo $k+1; ?>. <?php echo $question['name']; ?>
      </div>
    </div>
    <?php $answers= Frd::getClass("quiz")->getAnswers($question['id']); ?>
    <ul class="answers">
      <?php foreach($answers as $kk=>$answer): ?>
      <li>
        <span>a) </span>
        <?php 
          if($question['correct'] == (intval($kk)+1))
            $active="active";
          else
            $active="";
        ?>
        <a class="<?php echo $active; ?>" title="for_event_0_0" href="#">
          <?php echo $answer['name']; ?>
        </a>
      </li>
      <?php endforeach; ?>
    </ul>
  </div>
  <?php endforeach; ?>

</div>
