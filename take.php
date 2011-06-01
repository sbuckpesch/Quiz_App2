<style>
  #question1{
    /*border:solid thin red ;*/
    color:gray;margin-left: 70px; padding-top: 20px;
  }
  #question1_answer{
    color:gray;
    /*border:solid red thin;*/
    margin-left:40px;padding-top:15px; }
  #question1_answer .answer{
    padding-left:10px;
  }

  #question2{
    /*border:solid thin red ;*/
    color:gray;margin-left: 70px; padding-top: 20px;
  }
  #question2_answer{
    color:gray;
    /*border:solid red thin;*/
    margin-left:40px;padding-top:15px; 
  }
  #question2_answer .answer{
    padding-left:10px;
  }

</style>
<div class="quiz_take">

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

<!-- Header -->
<div style="background-image: url(images/iventus/bg1.jpg); width: 492px; height: 502px;">

</div>
<!-- Quiz Part -->
  <?php 
    $fb_page_id=get_page_id();

    $user_id=get_user_id();
    $admin=get_is_admin();

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
    <a href="#" onclick="take_quiz();return false;"> Teilnehmen</a>
<?php else: ?>
<?php endif; ?>
<!-- Footer -->
<div style="background-image: url(images/iventus/bg3.jpg); width: 492px; height: 100px;">
</div>

<script type="text/javascript">
  function take_quiz()
  {
    //jQuery("#take_form").submit();
    //alert('take');
    FrdForm.selector="#take_form";
    FrdForm.dataType='json';
    FrdForm.success=function(data){

      if(FrdForm.dataType == 'json')
      {
        if(data.error==0)
        {
          alert(data.is_all_right);
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
  }
</script>
