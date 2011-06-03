<div class="quiz_create">
  <div class="create_new_quiz">
    <h1>Create A New Quiz</h1>
  </div>



  <div class="top-nav"> 
    <?php include_once(dirname(__FILE__)."/block/create_nav2.php"); ?>
  </div>
<?php
  if(isset($_GET['quiz_id']))
  {
    $quiz_id=$_GET['quiz_id'];

    $quiz=Frd::getClass("quiz")->loadQuiz($quiz_id);
    $fb_page_id=$quiz->fb_page_id;

    $edit=true; 
  }
  else
  {
    $edit=false; 
  }
  
  if(isset($_GET['page_id']))
    $fb_page_id=$_GET['page_id'];

?>

<div class="quiz_createWOAY">
  <div id="part1" class="part1">
    <?php include(dirname(__FILE__)."/quiz.php"); ?>
  </div>
  <div id="part2" class="part2">
    <?php include(dirname(__FILE__)."/answer.php"); ?>
  </div>
  <div id="part3" class="part3">
    <div id="quiz_preview">
    </div>
  </div>
</div>

</div>
<script type="text/javascript">
  var page_id='<?php echo $global->page_id; ?>';
  jQuery(document).ready(function(){
      show_part(1,3);
  });
</script>
<?php //include('footer.php'); ?>
