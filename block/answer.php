<?php
  $q=$params['q'];
  $answer=$params['answer'];
  $name="q[".$q."][answer][".$answer."][name]";
  $correct="q_".$q."_correct";
  $remove_id="q_".$q."_answer_".$answer."_remove_image";
?>
  <div id="q_<?php echo $q; ?>_answer_<?php echo $answer; ?>" class="answer">
  <div class="a_title">Image or Video: <span>(Optional)</span></div>

  <div class="content">
    <div class="left">
      <div class="input">
      <span><?php echo $answer; ?> ) </span>
      <input onclick="answer_title_check(<?php echo $q; ?>,<?php echo $answer; ?>)" onkeyup="answer_title_check(<?php echo $q; ?>,<?php echo $answer; ?>)" id="q_<?php echo $q; ?>_answer_<?php echo $answer; ?>_name" class="answer_field" type="text"  value="" name="<?php echo $name; ?>">
      </div>
      <div class="oper">
        <div class="clear"></div>
        <div id="q_<?php echo $q; ?>_answer_<?php echo $answer; ?>_note" class="text">100 characters left</div>
        <div class="remove">
            <a onclick="remove_answer(<?php echo $q;?>,<?php echo $answer; ?>);" style="display: none;" id="q_<?php echo $q;?>_answer_<?php echo $answer; ?>_remove" >Remove Answer</a>
        </div>
        <div class="option">
        <input value="<?php echo $answer; ?>" type="radio"  class="<?php echo $correct; ?>" name="<?php echo $correct; ?>">
          Correct Answer</div>
        <div class="clear"></div>
      </div>
    </div>
    <!-- left end -->

    <?php render("block/answer_popup.php",array('q'=>$q,'answer'=>$answer)); ?>
    <div class="right">
        <div class="option_img">
          <img id="q_<?php echo $q; ?>_answer_<?php echo $answer; ?>_thumbnails" src="http://d1bye8fl443jlj.cloudfront.net/prod/images/quiz_create_part2-img.gif"></div>
        <div class="s_upload2">
          <div  id="q_<?php echo $q; ?>_answer_<?php echo $answer; ?>_upload" style="display: block;">

          <div onclick="show_answer_image_popup(<?php echo $q; ?>,<?php echo $answer; ?>)" class="i_up">Upload your own image</div>
            <div class="i_up">Add video from<img src="http://d1bye8fl443jlj.cloudfront.net/prod/images/hulu_font.png"></div>
          </div>
        </div>
        <div id="<?php echo $remove_id; ?>" style="display: none;" class="q_<?php echo $q; ?>_remove">
        <a onclick="answer_remove_image(<?php echo $q;?>,<?php echo $answer; ?>);" >Remove this</a>
        </div>
        <input type="hidden"  value="" name="q_<?php echo $q; ?>_answer_<?php echo $answer; ?>_img" id="q_<?php echo $q; ?>_answer_<?php echo $answer; ?>_img">
        <input type="hidden"  value="" name="q_0_answer_1_media_type" id="q_0_answer_1_media_type">
        <input type="hidden" value="" name="q_0_answer_1_hulu" id="q_0_answer_1_hulu">
      
    </div>
    <div class="clear"></div>
  </div>
  <!-- content end -->
</div>
