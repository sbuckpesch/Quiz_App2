<div class="quiz_create">
  <div class="create_new_quiz">
    <h1>Create A New Quiz</h1>
  </div>

  <!-- waring -->
  <?php //render("block/warning.php"); ?>

  <div class="top-nav"> 
    <?php include("block/create_nav1.php"); ?>
  </div>

<div class="quiz_createWOAY">
  <div id="part1" class="part1">
    <?php include("quiz.php"); ?>
  </div>
  <div id="part2" class="part2">
    <?php include("outcome.php"); ?>
  </div>
  <div id="part3" class="part3">
    <?php include("answer.php"); ?>
  </div>
  <div id="part4" class="part4">
    <?php //include("preview.php"); ?>
  </div>
</div>

</div>
<script type="text/javascript">
  jQuery(document).ready(function(){
      show_part(2,4);
  });
</script>
<?php //include('footer.php'); ?>
