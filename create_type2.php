<div class="quiz_create">
  <div class="create_new_quiz">
    <h1>Create A New Quiz</h1>
  </div>

    
  <div class="top-nav"> 
    <?php include_once("block/create_nav2.php"); ?>
  </div>

    <input id="quiz_fb_page_id" type="text" value="<?php echo get_page_id(); ?>" />

<div class="quiz_createWOAY">
  <div id="part1" class="part1">
    <?php include("quiz.php"); ?>
  </div>
  <div id="part2" class="part2">
    <?php include("answer.php"); ?>
  </div>
  <div id="part3" class="part3">
    <?php include("preview.php"); ?>
  </div>
</div>

</div>
<script type="text/javascript">
  jQuery(document).ready(function(){
      show_part(1,3);
  });
</script>
<?php //include('footer.php'); ?>
