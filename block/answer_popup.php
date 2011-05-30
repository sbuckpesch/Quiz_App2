<?php
  $q=$params['q'];
  $answer=$params['answer'];

  $id="q_".$q."_".$answer."_image_popup";

?>
<div id="<?php echo $id; ?>" class="generic_dialog pop_dialog " tabindex="0" role="alertdialog" aria-labelledby="title_dialog_0" style="display:none">
  <div class="generic_dialog_popup" style="top: 253px; width: 467px;">
    <div class="pop_container_advanced">
      <div  class="pop_content">
        <h2 class="dialog_title" id="title_dialog_0">
        <span>Upload Question Photo</span>
        </h2>
        <div class="dialog_content">
          <div class="dialog_body">
            <div class="fb_protected_wrapper" fb_protected="true">
              <div>
                <?php render('block/answer_image_form.php',array('q'=>$q,'answer'=>$answer)); ?>
              </div>
            </div>
          </div>
          <div class="dialog_buttons clearfix">
            <label class="uiButton uiButtonLarge uiButtonConfirm">
            <input type="button" name="button1" value="Save" onclick="answer_save_image(<?php echo $q; ?>,<?php echo $answer; ?>)">
            </label>
            <label class="uiButton uiButtonLarge uiButtonConfirm">
            <input type="button" name="button2" value="Cancel" onclick="answer_hide_image_upload(<?php echo $q; ?>,<?php echo $answer; ?>)">
            </label>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
