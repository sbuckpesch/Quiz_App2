    <div class="p_header">
      <div class="title">Add Outcomes</div>
      <div class="note">You may have three to twenty outcomes. These are the results people will obtain by taking your quiz. An example is "What color respresents your personality?" Good outcomes for this would be "Red", "Blue", "Green", etc.</div>
    </div>

    <div class="p_body">
      <div id="outcomes_container">
        
        <!--    outcomes -->
        <?php 
          //render('block/outcome.php');
        ?>

        
      </div>

      <div id="add_outcome_button" class="add_outcome" onclick="add_outcome();return false;">
          <a href="#"><img src="<?php echo baseurl(); ?>images/quiz_outcome.png"></a> 
      </div>
    </div>

    <div class="g_continue">
        <a onclick="show_part(3,4)"><img src="<?php echo image_src('quiz_create-continue.gif'); ?> ">
        </a>
    </div>

<script type="text/javascript">
  jQuery(document).ready(function(){
    add_outcome();
  });
</script>
