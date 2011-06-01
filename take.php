<form action="dotake.php" method="post">
<div class="quiz_take">
  <?php 
    /////////$fb_page_id=get_page_id();
    $fb_page_id=100;

    $quiz=Frd::getClass("quiz")->getQuiz($fb_page_id);
  ?>
  
  <?php if($quiz != false): ?>
  <?php 
    $quiz=(object) $quiz; 
    $quiz_id=$quiz->id;
  ?>
  <div class="quiz_name">
    <div class="name">Quiz: <?php echo $quiz->name; ?></div>
    <input type="hidden" name="quiz_id" value="<?php echo $quiz->id; ?>" />
  </div>

      <div class="q_take">

          <?php $questions=Frd::getClass("quiz")->getQuestions($quiz_id); ?>
          <?php foreach($questions as $k=>$question): ?>
            <div>
             <h3> Question : 
                  <?php echo $k+1; ?>. <?php echo $question['name']; ?>
            </h3>
            <div>
              <h2>Choices :</h2>
            </div>
            <ul>
            <?php $answers= Frd::getClass("quiz")->getAnswers($question['id']); ?>
              <?php foreach($answers as $kk=>$answer): ?>
              <li>
              <input type="radio" name="question[<?php echo $question['id']; ?>]" value="<?php echo $answer['id']; ?>"/>
                  <?php echo $answer['name']; ?>
              </li>
              <?php endforeach; ?>
            </ul>
          </div>
        <?php endforeach; ?>




    </div>
</div>
<input type="submit" value="finish" />
</form>
      
<?php endif; ?>

  <!--
<div class="c_create">
  <a onclick="load_page('create_type.php',{id:1});return false;">
  -->
  <!--
  <a target="_top" href="<?php //echo $global->appurl; ?>create_type.php">
    <?php //addImage('button_create_new_quizz.png'); ?>
  </a>
</div>
  -->

