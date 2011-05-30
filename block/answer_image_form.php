<?php
  $q=$params['q'];
  $answer=$params['answer'];
?>

<form id="q_<?php echo $q; ?>_<?php echo $answer; ?>_image_form" enctype="multipart/form-data">

<div id="add_image" class="add_image">
  <div class="title">
    <span class="normal">Image:</span><span class="special">REQUIRED</span>
    <span id="q_<?php echo $q; ?>_<?php echo $answer; ?>_image_form_note" style="color:red">    </span>
  </div>

  <div class="result" id="q_<?php echo $q; ?>_<?php echo $answer; ?>_result" style="display:none">
      <div class="line"> 
          <span class="name">Result:</span> 
          <span class="value">Image has been uploaded successfully.</span> 
      </div>
      <div class="line"> 
          <span class="name">Image:</span> 
          <div class="img">
            <img id="q_<?php echo $q; ?>_<?php echo $answer; ?>_success_image">
          </div>
      </div>
  </div>

    <div class="file">
      <input type="file" size="15" name="image">
    </div>

    <div class="button">
    <a onclick="answer_upload_image(<?php echo $q; ?>,<?php echo $answer; ?>);return false;">
        <img src="http://d1bye8fl443jlj.cloudfront.net/prod/images/ctp_upload.png">
      </a>
    </div>
  </div>

</form>

