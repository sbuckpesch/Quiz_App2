<?php $q=$this->params['q']; ?>
<?php
  if(isset($this->params['question_name']))
  {
    $question_name=$this->params['question_name'];
  }
  else
  {
    $question_name='';
  }
  if(isset($this->params['question_image']))
  {
    $question_image=$this->params['question_image'];
  }
  else
  {
    $question_image='';
  }

?>
<div class="q_name">
  <div class="a_title">Image : <span>(Optional)</span></div>
  <div class="input_name">
  <div class="input">
  <input class="question_field" type="text" value="<?php echo $question_name; ?>" id="question_<?php echo $q; ?>_name" name="question_<?php echo $q; ?>_name" onclick="question_title_check(<?php echo $q; ?>);" onkeyup="question_title_check(<?php echo $q; ?>)">
  </div>
  <div class="cnote"><span id="question_<?php echo $q; ?>_note">100 characters left.</span>
    <span class="n_error" style="display: none;" id="question_0_error">Please input a name for your question.</span>
  </div>
</div>
<div class="up_image">
<div class="option_img">
  <?php 
  if($question_image == false) 
        $image= 'http://d1bye8fl443jlj.cloudfront.net/prod/images/quiz_create_part2-img.gif'; 
  else
      $image=$question_image;

  ?>

  <img id="question_<?php echo $q; ?>_thumbnails" src="<?php echo $image; ?>">
</div>
<div class="s_upload2">
<div id="question_<?php echo $q; ?>_upload" style="display: block;">
<div onclick="show_question_image_popup(<?php echo $q; ?>)" class="i_up">Upload your <br>own image</div>
</div>
<div id="question_<?php echo $q; ?>_remove_img" style="display: none;" class="c_remove">
  <a onclick="question_remove_image(<?php echo $q; ?>)" >Remove this</a></div>
<input type="hidden"  value="<?php echo $question_image; ?>" name="question_<?php echo $q; ?>_img" id="question_<?php echo $q; ?>_img">
</div>
</div>
<div class="clear"></div>
</div>
