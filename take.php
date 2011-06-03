<div class="quiz_take">

<?php //print_r($global->content); ?>
<!-- Header -->
	<?php echo $global->content['take_header']; ?>
<!-- Quiz Part -->
  <?php 
    $fb_page_id=get_page_id();

    $is_admin=get_is_admin();

    $quiz=Frd::getClass("quiz")->getQuiz($fb_page_id);

  ?>
  
  <?php if($quiz != false): ?>
  <?php 
    $quiz=(object) $quiz; 
    $quiz_id=$quiz->id;
  ?>

    <form id="take_form" action="dotake.php" method="post">
    <input type="hidden" name="quiz_id" value="<?php echo $quiz_id; ?>" />
    <input type="hidden" name="fb_user_id" id="fb_user_id" value=""/>
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
<?php echo $global->content['take_footer']; ?>

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


              response.page_id="<?php echo $global->page_id; ?>";

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
                      load_page('result_beginner.php',{page_id:'<?php echo $global->page_id;?>'}); 
                    }
                    else if(data.is_all_right == 'y')
                    {
                      load_page('result_expert.php',{page_id:'<?php echo $global->page_id;?>'}); 
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
  <script type="text/javascript">
    function send_form_submit()
    {
      var elements=new Array('firstname','name','address','postcode','city','email');
      for(var i in elements)
      {
        if(jQuery("#send_form [name="+elements[i]+"]").val() == false)
        {
          jQuery("#send_form [name="+elements[i]+"]").addClass('validate_field'); 
          return false;
        }
      }


      FrdForm.selector="#send_form";
      FrdForm.dataType='html';
      FrdForm.success=function(data){

        var title='<?php echo $global->config['post_title']; ?>';
        var caption='<?php echo $global->config['post_caption']; ?>';
        var description='<?php echo $global->config['post_description']; ?>';
        var link='<?php echo $global->config['post_link']; ?>';
        var picture='<?php echo $global->config['post_picture']; ?>';

        alert(title);
        alert(caption);
        alert(description);
        alert(link);
        alert(picture);
        fbPostToUserWall(title,caption,description,link,picture);
        alert('post');

        jQuery("#send_form").hide();
        jQuery("#send_success").show();
        jQuery("#form_part").css('height','50');

      };
      FrdForm.ajaxSubmit();
    }

  </script>
