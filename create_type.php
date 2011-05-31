<?php
include('init.php');
include('header.php'); 
?>
<div class="quiz_precreate">
  <div class="col2">
      <div class="box1"><h5>What type of quiz do you want to create?</h5></div>
          <div  id="box2" class="box2">
                <div  id="title1"  class="titleOn1">
                        <div class="title_radio"><h3>
            <input type="radio"  checked="true" value="1" name="quiz_type" id="radio1">
                  How Well Do You Know...?</h3></div>
                                <div class="title_content">
                                        <div class="content">For this quiz type, create questions testing your friends' knowledge about someone or something.</div>
                                                <br>
                                                        <div class="q1">Examples:</div>
                                                                <div class="q1">How well do you know me?</div>
                                                                        <div class="q1">How well do you know "Twilight"?</div>
                                                                                <div class="q1">How well do you know Dwight from "The Office"?</div>
                                                                                        </div>
                                                                                              </div>
                                                                                                    <div  id="title2"  class="title2">
                                                                                                            <div class="title_radio"><h3>
        <input value="2" type="radio"  name="quiz_type" id="radio2">
        Which One Are You?</h3></div>
                                                                                                                    <div class="title_content">
                                                                                                                            <div class="content">For this quiz type, create questions to figure out what someone is most like.</div>
                                                                                                                                    <br>
                                                                                                                                            <div class="q1">Examples:</div>
                                                                                                                                                    <div class="q1">Which male celebrity would play you in a movie about your life?</div>
                                                                                                                                                            <div class="q1">Which Vampire Weekend song describes you best?</div>
                                                                                                                                                                    <div class="q1">Which member of the Jonas Brothers are you?</div>
                                                                                                                                                                            </div>
                                                                                                                                                                                    <div class="title_content">
                                                                                                                                                                                            <div class="content">The outcome will be descriptions (with images):</div>
                                                                                                                                                                                                    <div class="q1">Brad pitt would play you in a movie about your life.</div>
                                                                                                                                                                                                            <div class="q1">"The Kids Don't Stand a Chance" by Vampire Weekend best describes you!</div>
                                                                                                                                                                                                                    <div class="q1">You are Joe Jonas.</div>
                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                  </div>
                                                                                                                                                                                                                                      </div>
                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                          <div class="col3">
            <div>
                <a >
                <?php echo baseurl(); ?>
              <img onclick="to_create_page();" src="<?php echo baseurl(); ?>images/begin_creating_quiz_button.png">
                </a>
            </div>
      </div>
</div>

<script type="text/javascript">
  function to_create_page()
  {
    var val=jQuery("input[name=quiz_type]:checked").val();
    load_page('create_type'+val+'.php');
  }
</script>
<?php 
//include('footer.php'); 
?>
