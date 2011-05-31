<?php $number=$this->params['number']; ?>

<div  style="display: block;" id="outcome_<?php echo $number; ?>" class="outcome">
  <div class="outcome-line">
    <div class="clear"></div>
    <a  onclick="toggle_outcome(<?php echo $number; ?>)" title="Outcome <?php echo $number; ?>" id="outcome_<?php echo $number; ?>_nav"  href="#" class="enable">Outcome <?php echo $number; ?></a>
    
      <a  onclick="remove_outcome(<?php echo $number; ?>)" style="display: none;" id="outcome_<?php echo $number; ?>_remove"  class="outcome_remove">Remove Outcome</a>
    
    <div class="clear"></div>
  </div>
  <div   id="outcome_<?php echo $number; ?>_content" class="q_content">
    <div class="text_con">
      <div class="name_des">Name:
        <span class="special">REQUIRED</span>
      </div>
      <div class="name_input">
          <input id="outcome_<?php echo $number; ?>_name" class="outcome_field" type="text" name="">
      </div>
      <div class="cnote">
        <span  id="outcome_1_note">100 characters left.</span>
        <span  class="n_error" style="display: none;" id="outcome_<?php echo $number; ?>_error">Please input a name for the outcome.</span>
      </div>
      
      <div class="name_des">Description:
        <span class="special">REQUIRED</span>
      </div>
      <div class="des_input">
        <textarea name="" id="outcome_<?php echo $number; ?>_description"></textarea>
      </div>
      <div class="cnote">
        <span  id="outcome_<?php echo $number; ?>_description_note">255 characters left.</span>
        <span  class="n_error" style="display: none;" id="outcome_<?php echo $number; ?>_description_error">Please input a description for the outcome.</span>
      </div>
    </div>
    <div class="img_con">
      <div class="required">Image:
        <span class="special">REQUIRED</span>
      </div>
      <div class="snap_up">
        
          <div class="snap"><img  src="http://d1bye8fl443jlj.cloudfront.net/prod/images/incongnit.jpg" id="outcome_<?php echo $number; ?>_thumbnails"></div>
          <div  onclick="outcome_show_image_upload(<?php echo $number; ?>);" id="outcome_<?php echo $number;?>_upload" class="upload"><a >Upload your image</a></div>
          <div  onclick="outcome_remove_image(<?php echo $number; ?>);return false;" id="outcome_<?php echo $number; ?>_remove_img" style="display: none;" class="c_remove"><a >Remove this</a></div>
          <input type="hidden"  value="" name="outcome_<?php echo $number; ?>_img" id="outcome_<?php echo $number; ?>_img">
        
      </div>
    </div>
    <div class="clear"></div>
  </div>
</div>
