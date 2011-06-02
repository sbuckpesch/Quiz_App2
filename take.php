<style>
  <?php echo $global->design['css']; ?>
</style>
<div class="quiz_take">


<!-- Header -->
	<?php echo $global->content['take_header']; ?>
<!-- Quiz Part -->
  <?php 
    $fb_page_id=get_page_id();

    $user_id=get_user_id();
    $is_admin=get_is_admin();

    //var_dump($user_id);
    //var_dump($admin);
    //$fb_page_id=100;
    $quiz=Frd::getClass("quiz")->getQuiz($fb_page_id);

  ?>
  
  <?php if($quiz != false): ?>
  <?php 
    $quiz=(object) $quiz; 
    $quiz_id=$quiz->id;
  ?>

    <form id="take_form" action="dotake.php" method="post">
    <input type="hidden" name="quiz_id" value="<?php echo $quiz_id; ?>" />
    <input type="hidden" name="fb_user_id" id="fb_user_id" value="<?php echo $user_id; ?>"/>
    <?php $questions=Frd::getClass("quiz")->getQuestions($quiz_id); ?>
    <?php foreach($questions as $k=>$question): ?>

    <div style="background-image: url(images/iventus/bg2.jpg); width: 492px; height: 110px;">
      <div id="question<?php echo ($k+1); ?>" >
        <?php echo $question['name']; ?>
      </div>
      <div id="question<?php echo ($k+1); ?>_answer">
      <?php $answers= Frd::getClass("quiz")->getAnswers($question['id']); ?>
        <?php foreach($answers as $kk=>$answer): ?>
        <div>
          <input type="radio" name="question[<?php echo $question['id']; ?>]" value="<?php echo $answer['id']; ?>"/>
          <span class="answer">
            <?php echo $answer['name']; ?>
          </span>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
    <?php endforeach; ?>
    </form>
    <a href="#" onclick="take_quiz();return false;">
       <!-- Teilnehmen -->
      <img src="images/iventus/teilnehmen.jpg" />
    </a>
<?php endif; ?>
  
<!-- Footer -->
<div style="background-image: url(images/iventus/bg3.jpg); width: 492px; height: 39px;">
</div>

<?php if($is_admin == true): ?>
  <!-- create link -->
  <hr/>
   
  <?php if($quiz == false): ?>
  <!-- create link -->
  <div>
  <a target="_top" href="<?php echo $global->appurl; ?>create_type.php?page_id=<?php echo $fb_page_id;  ?>">
      Create
    </a>
  </div>
  <?php else: ?>
  <!-- edit link -->
  <?php 
    $quiz=(object) $quiz; 
    $quiz_id=$quiz->id;
  ?>
  <div>
  <a target="_top" href="<?php echo $global->appurl; ?>create_type.php?quiz_id=<?php echo $quiz_id ?>&page_id=<?php echo $fb_page_id; ?>">
      Edit
    </a>
  </div>
  <?php endif; ?>
<?php endif; ?>
<script type="text/javascript">
  function take_quiz()
  {
    FB.ui({
         method: 'permissions.request',
         'perms': 'publish_stream',
         'display': 'popup'
        },
        function(response) {
          if (response.perms != null)
          {
            FB.api('/me',function(response){
              jQuery.post('save_vister.php',response,function(data){
                //alert(data);
              });

              jQuery("#fb_user_id").val(response.id);
              //alert('take');
              FrdForm.selector="#take_form";
              FrdForm.dataType='json';
              FrdForm.success=function(data){

                if(FrdForm.dataType == 'json')
                {
                  if(data.error==0)
                  {
                    //alert(data.is_all_right);
                    if(data.is_all_right == 'n')
                    {
                      load_page('result_beginner.php'); 
                    }
                    else if(data.is_all_right == 'y')
                    {
                      load_page('result_expert.php'); 
                    }

                  }
                  else
                  {
                    showError(data.error_msg);
                  }
                }

              };
              FrdForm.ajaxSubmit();
            });
          }
        }
    );

  }
</script>
