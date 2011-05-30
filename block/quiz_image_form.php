<form id="quiz_image_form" enctype="multipart/form-data">
<div id="add_image" class="add_image">
  <div class="title">
    <span class="normal">Image:</span><span class="special">REQUIRED</span>
    <span id="quiz_image_form_note" style="color:red"></span>
  </div>

  <div class="result" id="quiz_result" style="display:none">
      <div class="line"> <span class="name">Result:</span> <span class="value">Image has been uploaded successfully.</span> </div>
          <div class="line"> 
              <span class="name">Image:</span> 
              <div class="img">
                <img id="quiz_success_image">
              </div>
          </div>
    </div>

  <div class="file">
    <input type="file" size="15" name="image">
  </div>

  <div class="button">
    <a onclick="quiz_upload_image();return false;">
      <img src="http://d1bye8fl443jlj.cloudfront.net/prod/images/ctp_upload.png">
    </a>
  </div>

</div>

</form>
