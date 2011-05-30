    <div class="p_header">
      <div class="title">Add Questions</div>
      <div class="note">You must have 5 questions. You must have 2 choices. You can have up to 10 questions and 5 choices per question.</div>
    </div>

    <div class="p_body">
      <div id="questions_container">
        <?php render("block/question.php",array('q'=>1)); ?>
      </div>
      <?php render("block/add_question.php"); ?>
    </div>

    <div class="g_continue">
      <a onclick="show_part(4,4)">
          <img src="http://d1bye8fl443jlj.cloudfront.net/prod/images/quiz_create-continue.gif">
      </a>
   </div>
<script type="text/javascript">
  jQuery(document).ready(function(){
      //add_question();
  });
</script>
