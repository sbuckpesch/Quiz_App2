      <div class="large-box">
        <div class="number">
          <p>STEP <br>
            <span>1 </span> </p>
        </div>
        
        <h3>Choose a name for your quiz</h3>
        <input type="hidden" value="<?php echo $fb_page_id; ?>" name="quiz_fb_page_id"  id="quiz_fb_page_id" >
        <?php if($edit == true): ?> 
        <input type="hidden" value="<?php echo $quiz->id; ?>" name="quiz_id" id="quiz_id">
          <input type="text" value="<?php echo $quiz->name; ?>" name="quiz_name" id="quiz_name" class="large" onkeyup="part1_title_check()" onclick="part1_title_check()">
        <?php else: ?>
        <input type="hidden" value="" name="quiz_id" id="quiz_id">
          <input type="text" value="" name="quiz_name" id="quiz_name" class="large" onkeyup="part1_title_check()" onclick="part1_title_check()">
        <?php endif; ?>

        <div id="quiz_name_note" class="chars">100 characters left.</div>
        <div  id="quiz_name_error" style="display: none;" class="q_error">Please input a name for your quiz.</div>
      </div>
      
      <div class="large-box">
        <div class="number">
          <p>STEP <br>
            <span>2 </span> </p>
        </div>
        
        <?php //include("block/warning.php"); ?>

        <?php include("block/popup.php"); ?>
        <h3>Upload an image <span>(Optional)</span> </h3>
        <div id="quiz_uploaded_image" class="upload_img">
          <?php if($edit == true): ?> 
              <?php if(trim($quiz->image) != false): ?>
                <img src="<?php echo $quiz->image; ?>" />
              <?php endif; ?>
          <?php endif; ?>
        </div>
        <a class="upload" onclick="part1_show_image_upload()">
            <img src="http://d1bye8fl443jlj.cloudfront.net/prod/images/quiz_upload-image.gif">
        </a>
        <a onclick="part1_remove_image();" style="display: ;" id="quiz_delete_image" class="upload">
        <img src="http://d1bye8fl443jlj.cloudfront.net/prod/images/quiz_delete-image.gif">
  </a>
        <?php if($edit == true): ?> 
        <input type="hidden" name="quiz_image" id="quiz_image" value="<?php echo $quiz->image; ?> " >
        <?php else: ?>
        <input type="hidden" name="quiz_image" id="quiz_image" >
        <?php endif; ?>
        <p class="upload">
          Maximum image size is 340x300 pixels. We recommend you use at least a 300 pixel tall image because it will look the best in news feed stories.        </p>
      </div>
      
      <div style="display: none;" class="large-box">
        <div class="number">
          <p>STEP <br>
            <span>3 </span> </p>
        </div>
        
        <h3>Select who can take your quiz</h3>
        <p class="line">Who can take my quiz? &nbsp; <a >What is this?</a>
          <input type="radio" checked="checked" value="0" id="quiz_participant_1" class="radio" name="quiz_participant">
          <label>Anyone</label>
          <input type="radio" value="1" id="quiz_participant_2" class="radio" name="quiz_participant">
          <label>Only My Friends</label>
          <span >Please select people who can take your quiz.</span> </p>
      </div>
      
      <div class="large-box">
        <div class="number">
          <p>STEP <br>
            <span>3 </span> </p>
        </div>
        
        <h3>Enter a description <span>(Optional)</span></h3>
        <p class="line2">Creating a description helps users find your quiz and gets them more interested in taking it.
        <?php if($edit == true): ?> 
          <textarea name="quiz_description" id="quiz_description" class="short_textarea" rows="1" cols="1" onclick="part1_description_check();" onkeyup="part1_description_check();"><?php echo $quiz->description; ?></textarea>
        <?php else: ?>
          <textarea name="quiz_description" id="quiz_description" class="short_textarea" rows="1" cols="1" onclick="part1_description_check();" onkeyup="part1_description_check();"></textarea>
        <?php endif; ?>
        </p>
        <div id="quiz_description_note" class="chars">600 characters left.</div>
      </div>
      
  
