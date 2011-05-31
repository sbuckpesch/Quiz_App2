<form action="dotake.php" method="post">
<div class="quiz_take">
  <?php 
    $fb_page_id=get_page_id();

    $quiz=Frd::getClass("quiz")->getQuiz($fb_page_id);

    var_dump($quiz);
  ?>
  
  <div class="quiz_name">
    <div class="name">Quiz: <?php echo $quiz->name; ?></div>
    <input type="text" name="quiz_id" value="<?php echo $quiz->id; ?>" />
  </div>

      <div class="q_take">
        <div class="left_column" id="left_column" >

          <?php $questions=Frd::getClass("quiz")->getQuestions($quiz_id); ?>
          <?php foreach($questions as $k=>$question): ?>
          <?php
            if($k != 0)
              $display='display:none';
            else
              $display='';
              $display='';
          ?>
            <div class="question" id="question_<?php echo $k; ?>" style="<?php echo $display; ?>" > 
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


          <div  >
            <a onclick="previous_question()" id="show_previous" style="display:none">Previous</a>
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            <a onclick="next_question()" id="show_next" style="display:noen">Next</a>
          </div>

          <!-- right column -->
          <!--
          <div class="right_column">

            <div class="c_create">
              <a onclick="load_page('create_type.php',{id:1});return false;">
                <?php //addImage('button_create_new_quizz.png'); ?>
              </a>
            </div>
              
              
          <div class="scores">
           <div class="scores_line">
             <div class="scores_line_n">
               <div class="scores_line_n_l">0</div>
             </div>
             <div class="scores_line_p">
               <div class="scores_line_p_l">People have taken this quiz</div>
             </div>
           </div>
          <div class="scores_line n">
           <div class="scores_line_n">
            <div class="scores_line_n_l">0</div>
           </div>
           <div class="scores_line_p">
             <div class="scores_line_p_l">
                 Friends have taken this quiz
             </div>
           </div>
         </div>
        -->

        </div>
    </div>
</div>
<input type="submit" value="finish" />
</form>
      

<div class="c_create">
  <!--
  <a onclick="load_page('create_type.php',{id:1});return false;">
  -->
  <a target="_top" href="<?php echo baseurl(); ?>create_type.php">
    <?php addImage('button_create_new_quizz.png'); ?>
  </a>
</div>

<script type="text/javascript">
  var curquestion=0;
</script>
