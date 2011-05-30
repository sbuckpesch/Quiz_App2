<?php
include('init.php');

include('header.php');
?>

<div class="quiz_create">
  <div class="create_new_quiz">
    <h1>Create A New Quiz</h1>
  </div>

  <!-- waring -->
  <?php render("block/warning.php"); ?>

  <?php include("create_nav.php"); ?>

  <div id="part1" class="part1">
    <?php include("create_part1.php"); ?>
  </div>
  <div id="part2" class="part2">
    <?php include("create_part2.php"); ?>
  </div>
  <div id="part3" class="part3">
    <?php include("create_part3.php"); ?>
  </div>

</div>
<script type="text/javascript">
  jQuery(document).ready(function(){
      //show_part1();
      show_part3();
  });
</script>
<?php //include('footer.php'); ?>
