<?php
  $quiz_id=$this->params['quiz_id']; 
  $quiz=Frd::getClass("quiz")->loadQuiz($quiz_id);
?>


  <!-- questions -->
<div id="question_list" class="question_list">
  <div style="text-align:left;padding-left:50px;">
  <div style="padding-bottom:10px">
  <!--
  <a href="create_type.php?quiz_id=<?php //echo $quiz_id; ?>">
  -->
    <h1>
      <?php echo $quiz->name; ?>
    </h1>
    <!--
    </a>
    -->
  </div>
  <?php $questions=Frd::getClass("quiz")->getQuestions($quiz_id); ?>
  <?php foreach($questions as $k=>$question): ?>
        <ul>
            <li>    
                <h2>
                    <?php echo $k+1; ?>. <?php echo $question['name']; ?>
                </h2>
                 <br/>
                  <?php $answers= Frd::getClass("quiz")->getAnswers($question['id']); ?>
                <ol style="list-style-type:lowwer-alpha">
                    <?php foreach($answers as $answer): ?>
                    <li>
                        
                    <?php if($question['correct'] == $answer['id'] ): ?>
                        <span style="color:green"><?php echo $answer['name']; ?></span>
                    <?php else: ?>
                        <?php echo $answer['name']; ?>
                    <?php endif; ?>
                    </li>
                  <?php endforeach; ?>
                </ol>
             </li>
        </ul>
        <?php endforeach; ?>

  <a  href="<?php echo $this->params['global']->pageurl; ?>" class="view_quiz">View Quiz</a>
  </div>


</div>


