    <div class="p_header">
      <div class="title">Add Questions</div>
    </div>

    <div class="p_body">
      <div id="questions_container">
          
          <?php if($edit == true): ?>
            <?php $questions=Frd::getClass("quiz")->getQuestions($quiz_id); ?>
            <?php foreach($questions as $k=>$question): ?>
              <?php //$this->render("block/question.php",array('q'=>($k+1),'question_id'=>$question['id'] ,'question_name'=>$question['name'],'correct'=>$question['correct'],'question_image'=>$question['image']) ); ?>
              <?php render("block/question.php",array('q'=>($k+1),'question_id'=>$question['id'] ,'question_name'=>$question['name'],'correct'=>$question['correct'],'question_image'=>$question['image']) ); ?>
            <?php endforeach; ?>
          <?php endif; ?>
      </div>
      <?php render("block/add_question.php"); ?>
    </div>

<script type="text/javascript">
  jQuery(document).ready(function(){
      <?php if($edit == false): ?>
      add_question();
      <?php endif; ?>
  });
</script>
