<?php $q=$this->params['q']; ?>
<div class="q_name">
  <div class="a_title">Image or Video: <span>(Optional)</span></div>
  <div class="input_name">
  <div class="input">
  <input class="question_field" type="text" value="Start typing your question" id="question_<?php echo $q; ?>_name" name="question_<?php echo $q; ?>_name" onclick="question_title_check(<?php echo $q; ?>);" onkeyup="question_title_check(<?php echo $q; ?>)">
  </div>
  <div class="cnote"><span id="question_<?php echo $q; ?>_note">100 characters left.</span>
    <span class="n_error" style="display: none;" id="question_0_error">Please input a name for your question.</span>
  </div>
</div>
<?php //render("block/question_popup.php",array('q'=>$q)); ?>
<div class="up_image">
<div class="option_img"><img id="question_<?php echo $q; ?>_thumbnails" src="http://d1bye8fl443jlj.cloudfront.net/prod/images/quiz_create_part2-img.gif"></div>
<div class="s_upload2">
<div id="question_<?php echo $q; ?>_upload" style="display: block;">
<div onclick="show_question_image_popup(<?php echo $q; ?>)" class="i_up">Upload your <br>own image</div>
 <div class="i_up">Add video from<img src="http://d1bye8fl443jlj.cloudfront.net/prod/images/hulu_font.png"></div>
</div>
<div id="question_<?php echo $q; ?>_remove_img" style="display: none;" class="c_remove">
  <a onclick="question_remove_image(<?php echo $q; ?>)" >Remove this</a></div>
<input type="text"  value="" name="question_<?php echo $q; ?>_img" id="question_<?php echo $q; ?>_img">
<input type="hidden"  value="" name="question_<?php echo $q; ?>_thumbnail" id="question_<?php echo $q; ?>_thumbnail">
<input type="hidden" value="" name="question_<?php echo $q; ?>_media_type" id="question_<?php echo $q; ?>_media_type">
<input type="hidden"  value="" name="question_<?php echo $q; ?>_hulu" id="question_0_hulu">
</div>
</div>
<div class="clear"></div>
</div>
