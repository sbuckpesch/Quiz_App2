<?php $form=new Frd_Form(); ?>
<form onsubmit="show_part2();return false;">
 <table> 
    <tr>
      <td>
        name
      </td>
      <td>
        <?php echo $form->text(array('name'=>'title')); ?>
      </td>
    </tr>
    <tr>
      <td>
        image
      </td>
      <td>
        <?php echo $form->file(array('name'=>'image')); ?>
      </td>
    </tr>
    <tr>
      <td>
        description
      </td>
      <td>
        <?php echo $form->textarea(array('name'=>'description')); ?>
      </td>
    </tr>
    <tr>
      <td>
      </td>
      <td>
        <?php echo $form->submit(array('name'=>'submit')); ?>
      </td>
    </tr>
 </table> 
</form>
<div class="quiz_create">
  <div class="create_new_quiz">
    <h1>Create A New Quiz</h1>
  </div>
  <div class="top-nav"> <a fbcontext="AQDw-piXsi8W" onclick="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_change_part('1');return false;},19827163485],new fbjs_event(event));return true;" id="app19827163485_quiz_part_nav_1" class="step1_active">Part 1 <br>
    <span>Enter quiz info</span></a> <a fbcontext="AQDw-piXsi8W" onclick="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_change_part('2');return false;},19827163485],new fbjs_event(event));return true;" id="app19827163485_quiz_part_nav_2" class="step2">Part 2 <br>
    <span>Create quiz questions</span></a> <a fbcontext="AQDw-piXsi8W" onclick="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_change_part('3');return false;},19827163485],new fbjs_event(event));return true;" id="app19827163485_quiz_part_nav_3" class="step3">Part 3 <br>
    <span>Preview and publish quiz</span></a> </div>
  
  
  <div fbcontext="AQDw-piXsi8W" style="display: block;" id="app19827163485_quiz_part1" class="part1">
      <div class="large-box">
        <div class="number">
          <p>STEP <br>
            <span>1 </span> </p>
        </div>
        
        <h3>Choose a name for your quiz</h3>
        <input type="text" fbcontext="AQDw-piXsi8W" value="Start typing a quiz name" name="quiz_name" id="app19827163485_quiz_name" onfocus="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_check_name()},19827163485],new fbjs_event(event));" onkeyup="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_check_name()},19827163485],new fbjs_event(event));" class="large">
        <div fbcontext="AQDw-piXsi8W" id="app19827163485_quiz_name_note" class="chars">96 characters left.</div>
        <div fbcontext="AQDw-piXsi8W" id="app19827163485_quiz_name_error" style="display: none;" class="q_error">Please input a name for your quiz.</div>
      </div>
      
      <div class="large-box">
        <div class="number">
          <p>STEP <br>
            <span>2 </span> </p>
        </div>
        
        <h3>Upload an image <span>(Optional)</span> </h3>
        <div fbcontext="AQDw-piXsi8W" id="app19827163485_quiz_uploaded_image" class="upload_img"></div>
        <a onclick="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_upload_quiz_image(); return false;},19827163485],new fbjs_event(event));return true;" class="upload"><img src="http://d1bye8fl443jlj.cloudfront.net/prod/images/quiz_upload-image.gif"></a><a fbcontext="AQDw-piXsi8W" style="display: none;" id="app19827163485_quiz_delete_image" onclick="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_delete_quiz_image(); return false;},19827163485],new fbjs_event(event));return true;" class="upload"><img src="http://d1bye8fl443jlj.cloudfront.net/prod/images/quiz_delete-image.gif"></a>
        <input type="hidden" fbcontext="AQDw-piXsi8W" value="" name="quiz_image" id="app19827163485_quiz_image">
        <p class="upload">Maximum image size is 340x300 pixels. We recommend you use at least a 300 pixel tall image because it will look the best in news feed stories.</p>
      </div>
      
      <div style="display: none;" class="large-box">
        <div class="number">
          <p>STEP <br>
            <span>3 </span> </p>
        </div>
        
        <h3>Select who can take your quiz</h3>
        <p class="line">Who can take my quiz? &nbsp; <a onclick="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_explain('group');return false;},19827163485],new fbjs_event(event));return true;">What is this?</a>
          <input type="radio" fbcontext="AQDw-piXsi8W" checked="checked" value="0" onchange="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_hide_error('quiz_participant_error')},19827163485],new fbjs_event(event));" id="app19827163485_quiz_participant_1" class="radio" name="quiz_participant">
          <label>Anyone</label>
          <input type="radio" fbcontext="AQDw-piXsi8W" value="1" onchange="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_hide_error('quiz_participant_error')},19827163485],new fbjs_event(event));" id="app19827163485_quiz_participant_2" class="radio" name="quiz_participant">
          <label>Only My Friends</label>
          <span fbcontext="AQDw-piXsi8W" style="display: none;" class="t_error" id="app19827163485_quiz_participant_error">Please select people who can take your quiz.</span> </p>
      </div>
      
      <div class="large-box">
        <div class="number">
          <p>STEP <br>
            <span>3 </span> </p>
        </div>
        
        <h3>Enter a description <span>(Optional)</span></h3>
        <p class="line2">Creating a description helps users find your quiz and gets them more interested in taking it.
          <textarea fbcontext="AQDw-piXsi8W" onfocus="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_check_description()},19827163485],new fbjs_event(event));" onkeyup="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_check_description()},19827163485],new fbjs_event(event));" name="quiz_description" id="app19827163485_quiz_description" class="short_textarea" rows="1" cols="1">Example: This quiz will show you if you are a real celebrity fashionista! Find out now!</textarea>
        </p>
        <div fbcontext="AQDw-piXsi8W" id="app19827163485_quiz_description_note" class="chars">600 characters left.</div>
      </div>
      
      <div class="g_continue"><a onclick="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_change_part('2');return false;},19827163485],new fbjs_event(event));return true;"><img src="http://d1bye8fl443jlj.cloudfront.net/prod/images/quiz_create-continue.gif"></a></div>
  </div>
  
  
  <div fbcontext="AQDw-piXsi8W" style="display: none;" id="app19827163485_quiz_part2" class="part2">
    <div class="p_header">
      <div class="title">Add Questions</div>
      <div class="note">You must have 5 questions. You must have 2 choices. You can have up to 10 questions and 5 choices per question.</div>
    </div>
    <div class="p_body">
      <div fbcontext="AQDw-piXsi8W" id="app19827163485_questions_container">
        
          

  
  

<span class="fb_protected_wrapper" fb_protected="true">
</span>
<div fbcontext="AQDw-piXsi8W" style="display: block;" id="app19827163485_question_0" class="question">
  <div class="question-line">
    <div class="clear"></div>
    <a fbcontext="AQDw-piXsi8W" title="Question 1" id="app19827163485_question_0_nav" onclick="(new Image()).src = '/ajax/ct.php?app_id=19827163485&amp;action_type=3&amp;post_form_id=609a27b4cb70e71b0741079248b83b40&amp;position=3&amp;' + Math.random();fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_toggle_display('0');return false;},19827163485],new fbjs_event(event));return true;" href="#" class="disable">Question 1</a>
    
      <a fbcontext="AQDw-piXsi8W" style="display: none;" id="app19827163485_question_0_remove" onclick="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_remove_question('0'); return false;},19827163485],new fbjs_event(event));return true;" class="remove">Remove Question</a>
    
    <div class="clear"></div>
  </div>
  <div fbcontext="AQDw-piXsi8W" style="display: none;" id="app19827163485_question_0_content" class="q_content">
     <div class="q_name">
      <div class="a_title">Image or Video: <span>(Optional)</span></div>
      <div class="input_name">
        
          <div class="input">
            <input type="text" fbcontext="AQDw-piXsi8W" onkeyup="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_check_remain_chars('question','question_0')},19827163485],new fbjs_event(event));" onfocus="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_check_remain_chars('question','question_0')},19827163485],new fbjs_event(event));" value="Start typing your question" id="app19827163485_question_0_name" name="question_0_name">
          </div>
          <div class="cnote"><span fbcontext="AQDw-piXsi8W" id="app19827163485_question_0_note">93 characters left.</span><span fbcontext="AQDw-piXsi8W" class="n_error" style="display: none;" id="app19827163485_question_0_error">Please input a name for your question.</span></div>
        
      </div>
      <div class="up_image">
        
        
          <div class="option_img"><img fbcontext="AQDw-piXsi8W" id="app19827163485_question_0_thumbnails" src="http://images.webgiftr.com/v0/tmp/10f2bec020644d12b1a7fc4f61d73f2c?temp=57956808"></div>
          <div class="s_upload2">
           <div fbcontext="AQDw-piXsi8W" id="app19827163485_question_0_upload" style="display: none;">
             
               <div onclick="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_upload_question_image('question_0',a19827163485_question_0_str,'10f2bec020644d12b1a7fc4f61d73f2c',null);return false;},19827163485],new fbjs_event(event));" class="i_up">Upload your <br>own image</div>
             
             <div onclick="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_question_select_hulu_video('question_0');return false;},19827163485],new fbjs_event(event));" class="i_up">Add video from<img src="http://d1bye8fl443jlj.cloudfront.net/prod/images/hulu_font.png"></div>
           </div>
           <div fbcontext="AQDw-piXsi8W" id="app19827163485_question_0_remove_img" style="display: block;" class="c_remove"><a fbcontext="AQDw-piXsi8W" id="app19827163485_question_0_remove_img" onclick="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_remove_question_image('question_0');return false;},19827163485],new fbjs_event(event));return true;">Remove this</a></div>
           <input type="hidden" fbcontext="AQDw-piXsi8W" value="http://images.webgiftr.com/v0/tmp/10f2bec020644d12b1a7fc4f61d73f2c" name="question_0_img" id="app19827163485_question_0_img">
           <input type="hidden" fbcontext="AQDw-piXsi8W" value="" name="question_0_thumbnail" id="app19827163485_question_0_thumbnail">
           <input type="hidden" fbcontext="AQDw-piXsi8W" value="IMAGE" name="question_0_media_type" id="app19827163485_question_0_media_type">
           <input type="hidden" fbcontext="AQDw-piXsi8W" value="" name="question_0_hulu" id="app19827163485_question_0_hulu">
          </div>
        
      </div>
      <div class="clear"></div>
     </div>
    <div class="q_answer">Answers: </div>
    
      <div fbcontext="AQDw-piXsi8W" id="app19827163485_question_0_answers_container">
        




<span class="fb_protected_wrapper" fb_protected="true">
</span>

<div fbcontext="AQDw-piXsi8W" id="app19827163485_q_0_answer_0" class="answer">
  <div class="a_title">Image or Video: <span>(Optional)</span></div>
  <div class="content">
    <div class="left">
      <div class="input">
        <span fbcontext="AQDw-piXsi8W" id="app19827163485_q_0_answer_0_ordinal">a ) </span>

        <input type="text" fbcontext="AQDw-piXsi8W" onkeyup="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_check_remain_chars('answer','q_0_answer_0')},19827163485],new fbjs_event(event));" onfocus="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_check_remain_chars('answer','q_0_answer_0')},19827163485],new fbjs_event(event));" value="" id="app19827163485_q_0_answer_0_name" name="q_0_answer_0_name">
      </div>
      <div class="oper">
        <div class="clear"></div>
        <div fbcontext="AQDw-piXsi8W" id="app19827163485_q_0_answer_0_note" class="text">94 characters left.</div>
        <div class="remove">
          
            <a fbcontext="AQDw-piXsi8W" style="display: none;" id="app19827163485_q_0_answer_0_remove" onclick="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_remove_answer('0','0'); return false;},19827163485],new fbjs_event(event));return true;">Remove Answer</a>
          
        </div>
        <div class="option">
          <input type="radio" fbcontext="AQDw-piXsi8W" id="app19827163485_q_0_answer_0_correct" name="question_0_answer">
          Correct Answer</div>
        <div class="clear"></div>
      </div>
    </div>
    <div class="right">
      
      
        <div class="option_img"><img fbcontext="AQDw-piXsi8W" id="app19827163485_q_0_answer_0_thumbnails" src="http://d1bye8fl443jlj.cloudfront.net/prod/images/quiz_create_part2-img.gif"></div>
        <div class="s_upload2">
          <div fbcontext="AQDw-piXsi8W" id="app19827163485_q_0_answer_0_upload" style="display: block;">
            <div onclick="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_upload_answer_image('q_0_answer_0',a19827163485_q_0_answer_0_str,'9dde6d59294e4a87941736aa579ade82');return false;},19827163485],new fbjs_event(event));" class="i_up">Upload your own image</div>
            <div onclick="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_answer_select_hulu_video('q_0_answer_0');return false;},19827163485],new fbjs_event(event));" class="i_up">Add video from<img src="http://d1bye8fl443jlj.cloudfront.net/prod/images/hulu_font.png"></div>
          </div>
        </div>
        <div fbcontext="AQDw-piXsi8W" id="app19827163485_q_0_answer_0_remove_img" style="display: none;" class="c_remove"><a fbcontext="AQDw-piXsi8W" id="app19827163485_question_0_remove_img" onclick="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_remove_answer_image('q_0_answer_0');return false;},19827163485],new fbjs_event(event));return true;">Remove this</a></div>
        <input type="hidden" fbcontext="AQDw-piXsi8W" value="" name="q_0_answer_0_img" id="app19827163485_q_0_answer_0_img">
        <input type="hidden" fbcontext="AQDw-piXsi8W" value="" name="q_0_answer_0_media_type" id="app19827163485_q_0_answer_0_media_type">
        <input type="hidden" fbcontext="AQDw-piXsi8W" value="" name="q_0_answer_0_hulu" id="app19827163485_q_0_answer_0_hulu">
      
    </div>
    <div class="clear"></div>
  </div>
  
</div>

        




<span class="fb_protected_wrapper" fb_protected="true">
</span>

<div fbcontext="AQDw-piXsi8W" id="app19827163485_q_0_answer_1" class="answer">
  <div class="a_title">Image or Video: <span>(Optional)</span></div>
  <div class="content">
    <div class="left">
      <div class="input">
        <span fbcontext="AQDw-piXsi8W" id="app19827163485_q_0_answer_1_ordinal">b ) </span>

        <input type="text" fbcontext="AQDw-piXsi8W" onkeyup="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_check_remain_chars('answer','q_0_answer_1')},19827163485],new fbjs_event(event));" onfocus="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_check_remain_chars('answer','q_0_answer_1')},19827163485],new fbjs_event(event));" value="" id="app19827163485_q_0_answer_1_name" name="q_0_answer_1_name">
      </div>
      <div class="oper">
        <div class="clear"></div>
        <div fbcontext="AQDw-piXsi8W" id="app19827163485_q_0_answer_1_note" class="text">93 characters left.</div>
        <div class="remove">
          
            <a fbcontext="AQDw-piXsi8W" style="display: none;" id="app19827163485_q_0_answer_1_remove" onclick="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_remove_answer('0','1'); return false;},19827163485],new fbjs_event(event));return true;">Remove Answer</a>
          
        </div>
        <div class="option">
          <input type="radio" fbcontext="AQDw-piXsi8W" id="app19827163485_q_0_answer_1_correct" name="question_0_answer">
          Correct Answer</div>
        <div class="clear"></div>
      </div>
    </div>
    <div class="right">
      
      
        <div class="option_img"><img fbcontext="AQDw-piXsi8W" id="app19827163485_q_0_answer_1_thumbnails" src="http://d1bye8fl443jlj.cloudfront.net/prod/images/quiz_create_part2-img.gif"></div>
        <div class="s_upload2">
          <div fbcontext="AQDw-piXsi8W" id="app19827163485_q_0_answer_1_upload" style="display: block;">
            <div onclick="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_upload_answer_image('q_0_answer_1',a19827163485_q_0_answer_1_str,'324831802d3a496285746cbb8b1bbbbd');return false;},19827163485],new fbjs_event(event));" class="i_up">Upload your own image</div>
            <div onclick="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_answer_select_hulu_video('q_0_answer_1');return false;},19827163485],new fbjs_event(event));" class="i_up">Add video from<img src="http://d1bye8fl443jlj.cloudfront.net/prod/images/hulu_font.png"></div>
          </div>
        </div>
        <div fbcontext="AQDw-piXsi8W" id="app19827163485_q_0_answer_1_remove_img" style="display: none;" class="c_remove"><a fbcontext="AQDw-piXsi8W" id="app19827163485_question_0_remove_img" onclick="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_remove_answer_image('q_0_answer_1');return false;},19827163485],new fbjs_event(event));return true;">Remove this</a></div>
        <input type="hidden" fbcontext="AQDw-piXsi8W" value="" name="q_0_answer_1_img" id="app19827163485_q_0_answer_1_img">
        <input type="hidden" fbcontext="AQDw-piXsi8W" value="" name="q_0_answer_1_media_type" id="app19827163485_q_0_answer_1_media_type">
        <input type="hidden" fbcontext="AQDw-piXsi8W" value="" name="q_0_answer_1_hulu" id="app19827163485_q_0_answer_1_hulu">
      
    </div>
    <div class="clear"></div>
  </div>
  
</div>

      </div>
    
    
      <div class="add_answer"><a onclick="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_add_answer('0');return false;},19827163485],new fbjs_event(event));return true;"><img src="http://d1bye8fl443jlj.cloudfront.net/prod/images/quiz_create_part2-add.gif"></a> </div>
    
  </div>
</div>
        
          

  
  

<span class="fb_protected_wrapper" fb_protected="true">
</span>
<div fbcontext="AQDw-piXsi8W" style="display: block;" id="app19827163485_question_1" class="question">
  <div class="question-line">
    <div class="clear"></div>
    <a fbcontext="AQDw-piXsi8W" title="Question 2" id="app19827163485_question_1_nav" onclick="(new Image()).src = '/ajax/ct.php?app_id=19827163485&amp;action_type=3&amp;post_form_id=609a27b4cb70e71b0741079248b83b40&amp;position=3&amp;' + Math.random();fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_toggle_display('1');return false;},19827163485],new fbjs_event(event));return true;" href="#" class="disable">Question 2</a>
    
      <a fbcontext="AQDw-piXsi8W" style="display: none;" id="app19827163485_question_1_remove" onclick="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_remove_question('1'); return false;},19827163485],new fbjs_event(event));return true;" class="remove">Remove Question</a>
    
    <div class="clear"></div>
  </div>
  <div fbcontext="AQDw-piXsi8W" style="display: none;" id="app19827163485_question_1_content" class="q_content">
     <div class="q_name">
      <div class="a_title">Image or Video: <span>(Optional)</span></div>
      <div class="input_name">
        
          <div class="input">
            <input type="text" fbcontext="AQDw-piXsi8W" onkeyup="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_check_remain_chars('question','question_1')},19827163485],new fbjs_event(event));" onfocus="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_check_remain_chars('question','question_1')},19827163485],new fbjs_event(event));" value="Start typing your question" id="app19827163485_question_1_name" name="question_1_name">
          </div>
          <div class="cnote"><span fbcontext="AQDw-piXsi8W" id="app19827163485_question_1_note">96 characters left.</span><span fbcontext="AQDw-piXsi8W" class="n_error" style="display: none;" id="app19827163485_question_1_error">Please input a name for your question.</span></div>
        
      </div>
      <div class="up_image">
        
        
          <div class="option_img"><img fbcontext="AQDw-piXsi8W" id="app19827163485_question_1_thumbnails" src="http://d1bye8fl443jlj.cloudfront.net/prod/images/quiz_create_part2-img.gif"></div>
          <div class="s_upload2">
           <div fbcontext="AQDw-piXsi8W" id="app19827163485_question_1_upload" style="display: block;">
             
               <div onclick="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_upload_question_image('question_1',a19827163485_question_1_str,'8c30d047e9fd48bf9f34349580875aea',null);return false;},19827163485],new fbjs_event(event));" class="i_up">Upload your <br>own image</div>
             
             <div onclick="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_question_select_hulu_video('question_1');return false;},19827163485],new fbjs_event(event));" class="i_up">Add video from<img src="http://d1bye8fl443jlj.cloudfront.net/prod/images/hulu_font.png"></div>
           </div>
           <div fbcontext="AQDw-piXsi8W" id="app19827163485_question_1_remove_img" style="display: none;" class="c_remove"><a fbcontext="AQDw-piXsi8W" id="app19827163485_question_1_remove_img" onclick="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_remove_question_image('question_1');return false;},19827163485],new fbjs_event(event));return true;">Remove this</a></div>
           <input type="hidden" fbcontext="AQDw-piXsi8W" value="" name="question_1_img" id="app19827163485_question_1_img">
           <input type="hidden" fbcontext="AQDw-piXsi8W" value="" name="question_1_thumbnail" id="app19827163485_question_1_thumbnail">
           <input type="hidden" fbcontext="AQDw-piXsi8W" value="" name="question_1_media_type" id="app19827163485_question_1_media_type">
           <input type="hidden" fbcontext="AQDw-piXsi8W" value="" name="question_1_hulu" id="app19827163485_question_1_hulu">
          </div>
        
      </div>
      <div class="clear"></div>
     </div>
    <div class="q_answer">Answers: </div>
    
      <div fbcontext="AQDw-piXsi8W" id="app19827163485_question_1_answers_container">
        




<span class="fb_protected_wrapper" fb_protected="true">
</span>

<div fbcontext="AQDw-piXsi8W" id="app19827163485_q_1_answer_0" class="answer">
  <div class="a_title">Image or Video: <span>(Optional)</span></div>
  <div class="content">
    <div class="left">
      <div class="input">
        <span fbcontext="AQDw-piXsi8W" id="app19827163485_q_1_answer_0_ordinal">a ) </span>

        <input type="text" fbcontext="AQDw-piXsi8W" onkeyup="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_check_remain_chars('answer','q_1_answer_0')},19827163485],new fbjs_event(event));" onfocus="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_check_remain_chars('answer','q_1_answer_0')},19827163485],new fbjs_event(event));" value="" id="app19827163485_q_1_answer_0_name" name="q_1_answer_0_name">
      </div>
      <div class="oper">
        <div class="clear"></div>
        <div fbcontext="AQDw-piXsi8W" id="app19827163485_q_1_answer_0_note" class="text">96 characters left.</div>
        <div class="remove">
          
            <a fbcontext="AQDw-piXsi8W" style="display: none;" id="app19827163485_q_1_answer_0_remove" onclick="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_remove_answer('1','0'); return false;},19827163485],new fbjs_event(event));return true;">Remove Answer</a>
          
        </div>
        <div class="option">
          <input type="radio" fbcontext="AQDw-piXsi8W" id="app19827163485_q_1_answer_0_correct" name="question_1_answer">
          Correct Answer</div>
        <div class="clear"></div>
      </div>
    </div>
    <div class="right">
      
      
        <div class="option_img"><img fbcontext="AQDw-piXsi8W" id="app19827163485_q_1_answer_0_thumbnails" src="http://d1bye8fl443jlj.cloudfront.net/prod/images/quiz_create_part2-img.gif"></div>
        <div class="s_upload2">
          <div fbcontext="AQDw-piXsi8W" id="app19827163485_q_1_answer_0_upload" style="display: block;">
            <div onclick="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_upload_answer_image('q_1_answer_0',a19827163485_q_1_answer_0_str,'233b089ebb3541be89bc87d8680a78f2');return false;},19827163485],new fbjs_event(event));" class="i_up">Upload your own image</div>
            <div onclick="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_answer_select_hulu_video('q_1_answer_0');return false;},19827163485],new fbjs_event(event));" class="i_up">Add video from<img src="http://d1bye8fl443jlj.cloudfront.net/prod/images/hulu_font.png"></div>
          </div>
        </div>
        <div fbcontext="AQDw-piXsi8W" id="app19827163485_q_1_answer_0_remove_img" style="display: none;" class="c_remove"><a fbcontext="AQDw-piXsi8W" id="app19827163485_question_1_remove_img" onclick="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_remove_answer_image('q_1_answer_0');return false;},19827163485],new fbjs_event(event));return true;">Remove this</a></div>
        <input type="hidden" fbcontext="AQDw-piXsi8W" value="" name="q_1_answer_0_img" id="app19827163485_q_1_answer_0_img">
        <input type="hidden" fbcontext="AQDw-piXsi8W" value="" name="q_1_answer_0_media_type" id="app19827163485_q_1_answer_0_media_type">
        <input type="hidden" fbcontext="AQDw-piXsi8W" value="" name="q_1_answer_0_hulu" id="app19827163485_q_1_answer_0_hulu">
      
    </div>
    <div class="clear"></div>
  </div>
  
</div>

        




<span class="fb_protected_wrapper" fb_protected="true">
</span>

<div fbcontext="AQDw-piXsi8W" id="app19827163485_q_1_answer_1" class="answer">
  <div class="a_title">Image or Video: <span>(Optional)</span></div>
  <div class="content">
    <div class="left">
      <div class="input">
        <span fbcontext="AQDw-piXsi8W" id="app19827163485_q_1_answer_1_ordinal">b ) </span>

        <input type="text" fbcontext="AQDw-piXsi8W" onkeyup="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_check_remain_chars('answer','q_1_answer_1')},19827163485],new fbjs_event(event));" onfocus="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_check_remain_chars('answer','q_1_answer_1')},19827163485],new fbjs_event(event));" value="" id="app19827163485_q_1_answer_1_name" name="q_1_answer_1_name">
      </div>
      <div class="oper">
        <div class="clear"></div>
        <div fbcontext="AQDw-piXsi8W" id="app19827163485_q_1_answer_1_note" class="text">97 characters left.</div>
        <div class="remove">
          
            <a fbcontext="AQDw-piXsi8W" style="display: none;" id="app19827163485_q_1_answer_1_remove" onclick="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_remove_answer('1','1'); return false;},19827163485],new fbjs_event(event));return true;">Remove Answer</a>
          
        </div>
        <div class="option">
          <input type="radio" fbcontext="AQDw-piXsi8W" id="app19827163485_q_1_answer_1_correct" name="question_1_answer">
          Correct Answer</div>
        <div class="clear"></div>
      </div>
    </div>
    <div class="right">
      
      
        <div class="option_img"><img fbcontext="AQDw-piXsi8W" id="app19827163485_q_1_answer_1_thumbnails" src="http://d1bye8fl443jlj.cloudfront.net/prod/images/quiz_create_part2-img.gif"></div>
        <div class="s_upload2">
          <div fbcontext="AQDw-piXsi8W" id="app19827163485_q_1_answer_1_upload" style="display: block;">
            <div onclick="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_upload_answer_image('q_1_answer_1',a19827163485_q_1_answer_1_str,'24d79c7a3c4a42b28e6fde877c8cb60c');return false;},19827163485],new fbjs_event(event));" class="i_up">Upload your own image</div>
            <div onclick="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_answer_select_hulu_video('q_1_answer_1');return false;},19827163485],new fbjs_event(event));" class="i_up">Add video from<img src="http://d1bye8fl443jlj.cloudfront.net/prod/images/hulu_font.png"></div>
          </div>
        </div>
        <div fbcontext="AQDw-piXsi8W" id="app19827163485_q_1_answer_1_remove_img" style="display: none;" class="c_remove"><a fbcontext="AQDw-piXsi8W" id="app19827163485_question_1_remove_img" onclick="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_remove_answer_image('q_1_answer_1');return false;},19827163485],new fbjs_event(event));return true;">Remove this</a></div>
        <input type="hidden" fbcontext="AQDw-piXsi8W" value="" name="q_1_answer_1_img" id="app19827163485_q_1_answer_1_img">
        <input type="hidden" fbcontext="AQDw-piXsi8W" value="" name="q_1_answer_1_media_type" id="app19827163485_q_1_answer_1_media_type">
        <input type="hidden" fbcontext="AQDw-piXsi8W" value="" name="q_1_answer_1_hulu" id="app19827163485_q_1_answer_1_hulu">
      
    </div>
    <div class="clear"></div>
  </div>
  
</div>

      </div>
    
    
      <div class="add_answer"><a onclick="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_add_answer('1');return false;},19827163485],new fbjs_event(event));return true;"><img src="http://d1bye8fl443jlj.cloudfront.net/prod/images/quiz_create_part2-add.gif"></a> </div>
    
  </div>
</div>
        
          

  
  

<span class="fb_protected_wrapper" fb_protected="true">
</span>
<div fbcontext="AQDw-piXsi8W" style="display: block;" id="app19827163485_question_2" class="question">
  <div class="question-line">
    <div class="clear"></div>
    <a fbcontext="AQDw-piXsi8W" title="Question 3" id="app19827163485_question_2_nav" onclick="(new Image()).src = '/ajax/ct.php?app_id=19827163485&amp;action_type=3&amp;post_form_id=609a27b4cb70e71b0741079248b83b40&amp;position=3&amp;' + Math.random();fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_toggle_display('2');return false;},19827163485],new fbjs_event(event));return true;" href="#" class="disable">Question 3</a>
    
      <a fbcontext="AQDw-piXsi8W" style="display: none;" id="app19827163485_question_2_remove" onclick="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_remove_question('2'); return false;},19827163485],new fbjs_event(event));return true;" class="remove">Remove Question</a>
    
    <div class="clear"></div>
  </div>
  <div fbcontext="AQDw-piXsi8W" style="display: none;" id="app19827163485_question_2_content" class="q_content">
     <div class="q_name">
      <div class="a_title">Image or Video: <span>(Optional)</span></div>
      <div class="input_name">
        
          <div class="input">
            <input type="text" fbcontext="AQDw-piXsi8W" onkeyup="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_check_remain_chars('question','question_2')},19827163485],new fbjs_event(event));" onfocus="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_check_remain_chars('question','question_2')},19827163485],new fbjs_event(event));" value="Start typing your question" id="app19827163485_question_2_name" name="question_2_name">
          </div>
          <div class="cnote"><span fbcontext="AQDw-piXsi8W" id="app19827163485_question_2_note">95 characters left.</span><span fbcontext="AQDw-piXsi8W" class="n_error" style="display: none;" id="app19827163485_question_2_error">Please input a name for your question.</span></div>
        
      </div>
      <div class="up_image">
        
        
          <div class="option_img"><img fbcontext="AQDw-piXsi8W" id="app19827163485_question_2_thumbnails" src="http://d1bye8fl443jlj.cloudfront.net/prod/images/quiz_create_part2-img.gif"></div>
          <div class="s_upload2">
           <div fbcontext="AQDw-piXsi8W" id="app19827163485_question_2_upload" style="display: block;">
             
               <div onclick="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_upload_question_image('question_2',a19827163485_question_2_str,'9208b6d710194da98bec046e31ec319c',null);return false;},19827163485],new fbjs_event(event));" class="i_up">Upload your <br>own image</div>
             
             <div onclick="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_question_select_hulu_video('question_2');return false;},19827163485],new fbjs_event(event));" class="i_up">Add video from<img src="http://d1bye8fl443jlj.cloudfront.net/prod/images/hulu_font.png"></div>
           </div>
           <div fbcontext="AQDw-piXsi8W" id="app19827163485_question_2_remove_img" style="display: none;" class="c_remove"><a fbcontext="AQDw-piXsi8W" id="app19827163485_question_2_remove_img" onclick="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_remove_question_image('question_2');return false;},19827163485],new fbjs_event(event));return true;">Remove this</a></div>
           <input type="hidden" fbcontext="AQDw-piXsi8W" value="" name="question_2_img" id="app19827163485_question_2_img">
           <input type="hidden" fbcontext="AQDw-piXsi8W" value="" name="question_2_thumbnail" id="app19827163485_question_2_thumbnail">
           <input type="hidden" fbcontext="AQDw-piXsi8W" value="" name="question_2_media_type" id="app19827163485_question_2_media_type">
           <input type="hidden" fbcontext="AQDw-piXsi8W" value="" name="question_2_hulu" id="app19827163485_question_2_hulu">
          </div>
        
      </div>
      <div class="clear"></div>
     </div>
    <div class="q_answer">Answers: </div>
    
      <div fbcontext="AQDw-piXsi8W" id="app19827163485_question_2_answers_container">
        




<span class="fb_protected_wrapper" fb_protected="true">
</span>

<div fbcontext="AQDw-piXsi8W" id="app19827163485_q_2_answer_0" class="answer">
  <div class="a_title">Image or Video: <span>(Optional)</span></div>
  <div class="content">
    <div class="left">
      <div class="input">
        <span fbcontext="AQDw-piXsi8W" id="app19827163485_q_2_answer_0_ordinal">a ) </span>

        <input type="text" fbcontext="AQDw-piXsi8W" onkeyup="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_check_remain_chars('answer','q_2_answer_0')},19827163485],new fbjs_event(event));" onfocus="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_check_remain_chars('answer','q_2_answer_0')},19827163485],new fbjs_event(event));" value="" id="app19827163485_q_2_answer_0_name" name="q_2_answer_0_name">
      </div>
      <div class="oper">
        <div class="clear"></div>
        <div fbcontext="AQDw-piXsi8W" id="app19827163485_q_2_answer_0_note" class="text">96 characters left.</div>
        <div class="remove">
          
            <a fbcontext="AQDw-piXsi8W" style="display: none;" id="app19827163485_q_2_answer_0_remove" onclick="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_remove_answer('2','0'); return false;},19827163485],new fbjs_event(event));return true;">Remove Answer</a>
          
        </div>
        <div class="option">
          <input type="radio" fbcontext="AQDw-piXsi8W" id="app19827163485_q_2_answer_0_correct" name="question_2_answer">
          Correct Answer</div>
        <div class="clear"></div>
      </div>
    </div>
    <div class="right">
      
      
        <div class="option_img"><img fbcontext="AQDw-piXsi8W" id="app19827163485_q_2_answer_0_thumbnails" src="http://d1bye8fl443jlj.cloudfront.net/prod/images/quiz_create_part2-img.gif"></div>
        <div class="s_upload2">
          <div fbcontext="AQDw-piXsi8W" id="app19827163485_q_2_answer_0_upload" style="display: block;">
            <div onclick="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_upload_answer_image('q_2_answer_0',a19827163485_q_2_answer_0_str,'87f947dbc1b744f88f8caa18be6029e6');return false;},19827163485],new fbjs_event(event));" class="i_up">Upload your own image</div>
            <div onclick="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_answer_select_hulu_video('q_2_answer_0');return false;},19827163485],new fbjs_event(event));" class="i_up">Add video from<img src="http://d1bye8fl443jlj.cloudfront.net/prod/images/hulu_font.png"></div>
          </div>
        </div>
        <div fbcontext="AQDw-piXsi8W" id="app19827163485_q_2_answer_0_remove_img" style="display: none;" class="c_remove"><a fbcontext="AQDw-piXsi8W" id="app19827163485_question_2_remove_img" onclick="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_remove_answer_image('q_2_answer_0');return false;},19827163485],new fbjs_event(event));return true;">Remove this</a></div>
        <input type="hidden" fbcontext="AQDw-piXsi8W" value="" name="q_2_answer_0_img" id="app19827163485_q_2_answer_0_img">
        <input type="hidden" fbcontext="AQDw-piXsi8W" value="" name="q_2_answer_0_media_type" id="app19827163485_q_2_answer_0_media_type">
        <input type="hidden" fbcontext="AQDw-piXsi8W" value="" name="q_2_answer_0_hulu" id="app19827163485_q_2_answer_0_hulu">
      
    </div>
    <div class="clear"></div>
  </div>
  
</div>

        




<span class="fb_protected_wrapper" fb_protected="true">
</span>

<div fbcontext="AQDw-piXsi8W" id="app19827163485_q_2_answer_1" class="answer">
  <div class="a_title">Image or Video: <span>(Optional)</span></div>
  <div class="content">
    <div class="left">
      <div class="input">
        <span fbcontext="AQDw-piXsi8W" id="app19827163485_q_2_answer_1_ordinal">b ) </span>

        <input type="text" fbcontext="AQDw-piXsi8W" onkeyup="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_check_remain_chars('answer','q_2_answer_1')},19827163485],new fbjs_event(event));" onfocus="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_check_remain_chars('answer','q_2_answer_1')},19827163485],new fbjs_event(event));" value="" id="app19827163485_q_2_answer_1_name" name="q_2_answer_1_name">
      </div>
      <div class="oper">
        <div class="clear"></div>
        <div fbcontext="AQDw-piXsi8W" id="app19827163485_q_2_answer_1_note" class="text">94 characters left.</div>
        <div class="remove">
          
            <a fbcontext="AQDw-piXsi8W" style="display: none;" id="app19827163485_q_2_answer_1_remove" onclick="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_remove_answer('2','1'); return false;},19827163485],new fbjs_event(event));return true;">Remove Answer</a>
          
        </div>
        <div class="option">
          <input type="radio" fbcontext="AQDw-piXsi8W" id="app19827163485_q_2_answer_1_correct" name="question_2_answer">
          Correct Answer</div>
        <div class="clear"></div>
      </div>
    </div>
    <div class="right">
      
      
        <div class="option_img"><img fbcontext="AQDw-piXsi8W" id="app19827163485_q_2_answer_1_thumbnails" src="http://d1bye8fl443jlj.cloudfront.net/prod/images/quiz_create_part2-img.gif"></div>
        <div class="s_upload2">
          <div fbcontext="AQDw-piXsi8W" id="app19827163485_q_2_answer_1_upload" style="display: block;">
            <div onclick="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_upload_answer_image('q_2_answer_1',a19827163485_q_2_answer_1_str,'c565760e85b34f1ca5c5d7363396713b');return false;},19827163485],new fbjs_event(event));" class="i_up">Upload your own image</div>
            <div onclick="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_answer_select_hulu_video('q_2_answer_1');return false;},19827163485],new fbjs_event(event));" class="i_up">Add video from<img src="http://d1bye8fl443jlj.cloudfront.net/prod/images/hulu_font.png"></div>
          </div>
        </div>
        <div fbcontext="AQDw-piXsi8W" id="app19827163485_q_2_answer_1_remove_img" style="display: none;" class="c_remove"><a fbcontext="AQDw-piXsi8W" id="app19827163485_question_2_remove_img" onclick="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_remove_answer_image('q_2_answer_1');return false;},19827163485],new fbjs_event(event));return true;">Remove this</a></div>
        <input type="hidden" fbcontext="AQDw-piXsi8W" value="" name="q_2_answer_1_img" id="app19827163485_q_2_answer_1_img">
        <input type="hidden" fbcontext="AQDw-piXsi8W" value="" name="q_2_answer_1_media_type" id="app19827163485_q_2_answer_1_media_type">
        <input type="hidden" fbcontext="AQDw-piXsi8W" value="" name="q_2_answer_1_hulu" id="app19827163485_q_2_answer_1_hulu">
      
    </div>
    <div class="clear"></div>
  </div>
  
</div>

      </div>
    
    
      <div class="add_answer"><a onclick="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_add_answer('2');return false;},19827163485],new fbjs_event(event));return true;"><img src="http://d1bye8fl443jlj.cloudfront.net/prod/images/quiz_create_part2-add.gif"></a> </div>
    
  </div>
</div>
        
          

  
  

<span class="fb_protected_wrapper" fb_protected="true">
</span>
<div fbcontext="AQDw-piXsi8W" style="display: block;" id="app19827163485_question_3" class="question">
  <div class="question-line">
    <div class="clear"></div>
    <a fbcontext="AQDw-piXsi8W" title="Question 4" id="app19827163485_question_3_nav" onclick="(new Image()).src = '/ajax/ct.php?app_id=19827163485&amp;action_type=3&amp;post_form_id=609a27b4cb70e71b0741079248b83b40&amp;position=3&amp;' + Math.random();fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_toggle_display('3');return false;},19827163485],new fbjs_event(event));return true;" href="#" class="disable">Question 4</a>
    
      <a fbcontext="AQDw-piXsi8W" style="display: none;" id="app19827163485_question_3_remove" onclick="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_remove_question('3'); return false;},19827163485],new fbjs_event(event));return true;" class="remove">Remove Question</a>
    
    <div class="clear"></div>
  </div>
  <div fbcontext="AQDw-piXsi8W" style="display: none;" id="app19827163485_question_3_content" class="q_content">
     <div class="q_name">
      <div class="a_title">Image or Video: <span>(Optional)</span></div>
      <div class="input_name">
        
          <div class="input">
            <input type="text" fbcontext="AQDw-piXsi8W" onkeyup="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_check_remain_chars('question','question_3')},19827163485],new fbjs_event(event));" onfocus="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_check_remain_chars('question','question_3')},19827163485],new fbjs_event(event));" value="Start typing your question" id="app19827163485_question_3_name" name="question_3_name">
          </div>
          <div class="cnote"><span fbcontext="AQDw-piXsi8W" id="app19827163485_question_3_note">91 characters left.</span><span fbcontext="AQDw-piXsi8W" class="n_error" style="display: none;" id="app19827163485_question_3_error">Please input a name for your question.</span></div>
        
      </div>
      <div class="up_image">
        
        
          <div class="option_img"><img fbcontext="AQDw-piXsi8W" id="app19827163485_question_3_thumbnails" src="http://d1bye8fl443jlj.cloudfront.net/prod/images/quiz_create_part2-img.gif"></div>
          <div class="s_upload2">
           <div fbcontext="AQDw-piXsi8W" id="app19827163485_question_3_upload" style="display: block;">
             
               <div onclick="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_upload_question_image('question_3',a19827163485_question_3_str,'9c1779223b6e4ef6a5c66f2df5320c34',null);return false;},19827163485],new fbjs_event(event));" class="i_up">Upload your <br>own image</div>
             
             <div onclick="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_question_select_hulu_video('question_3');return false;},19827163485],new fbjs_event(event));" class="i_up">Add video from<img src="http://d1bye8fl443jlj.cloudfront.net/prod/images/hulu_font.png"></div>
           </div>
           <div fbcontext="AQDw-piXsi8W" id="app19827163485_question_3_remove_img" style="display: none;" class="c_remove"><a fbcontext="AQDw-piXsi8W" id="app19827163485_question_3_remove_img" onclick="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_remove_question_image('question_3');return false;},19827163485],new fbjs_event(event));return true;">Remove this</a></div>
           <input type="hidden" fbcontext="AQDw-piXsi8W" value="" name="question_3_img" id="app19827163485_question_3_img">
           <input type="hidden" fbcontext="AQDw-piXsi8W" value="" name="question_3_thumbnail" id="app19827163485_question_3_thumbnail">
           <input type="hidden" fbcontext="AQDw-piXsi8W" value="" name="question_3_media_type" id="app19827163485_question_3_media_type">
           <input type="hidden" fbcontext="AQDw-piXsi8W" value="" name="question_3_hulu" id="app19827163485_question_3_hulu">
          </div>
        
      </div>
      <div class="clear"></div>
     </div>
    <div class="q_answer">Answers: </div>
    
      <div fbcontext="AQDw-piXsi8W" id="app19827163485_question_3_answers_container">
        




<span class="fb_protected_wrapper" fb_protected="true">
</span>

<div fbcontext="AQDw-piXsi8W" id="app19827163485_q_3_answer_0" class="answer">
  <div class="a_title">Image or Video: <span>(Optional)</span></div>
  <div class="content">
    <div class="left">
      <div class="input">
        <span fbcontext="AQDw-piXsi8W" id="app19827163485_q_3_answer_0_ordinal">a ) </span>

        <input type="text" fbcontext="AQDw-piXsi8W" onkeyup="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_check_remain_chars('answer','q_3_answer_0')},19827163485],new fbjs_event(event));" onfocus="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_check_remain_chars('answer','q_3_answer_0')},19827163485],new fbjs_event(event));" value="" id="app19827163485_q_3_answer_0_name" name="q_3_answer_0_name">
      </div>
      <div class="oper">
        <div class="clear"></div>
        <div fbcontext="AQDw-piXsi8W" id="app19827163485_q_3_answer_0_note" class="text">95 characters left.</div>
        <div class="remove">
          
            <a fbcontext="AQDw-piXsi8W" style="display: none;" id="app19827163485_q_3_answer_0_remove" onclick="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_remove_answer('3','0'); return false;},19827163485],new fbjs_event(event));return true;">Remove Answer</a>
          
        </div>
        <div class="option">
          <input type="radio" fbcontext="AQDw-piXsi8W" id="app19827163485_q_3_answer_0_correct" name="question_3_answer">
          Correct Answer</div>
        <div class="clear"></div>
      </div>
    </div>
    <div class="right">
      
      
        <div class="option_img"><img fbcontext="AQDw-piXsi8W" id="app19827163485_q_3_answer_0_thumbnails" src="http://d1bye8fl443jlj.cloudfront.net/prod/images/quiz_create_part2-img.gif"></div>
        <div class="s_upload2">
          <div fbcontext="AQDw-piXsi8W" id="app19827163485_q_3_answer_0_upload" style="display: block;">
            <div onclick="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_upload_answer_image('q_3_answer_0',a19827163485_q_3_answer_0_str,'c16b216bb7684360bd611d1e9bd03815');return false;},19827163485],new fbjs_event(event));" class="i_up">Upload your own image</div>
            <div onclick="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_answer_select_hulu_video('q_3_answer_0');return false;},19827163485],new fbjs_event(event));" class="i_up">Add video from<img src="http://d1bye8fl443jlj.cloudfront.net/prod/images/hulu_font.png"></div>
          </div>
        </div>
        <div fbcontext="AQDw-piXsi8W" id="app19827163485_q_3_answer_0_remove_img" style="display: none;" class="c_remove"><a fbcontext="AQDw-piXsi8W" id="app19827163485_question_3_remove_img" onclick="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_remove_answer_image('q_3_answer_0');return false;},19827163485],new fbjs_event(event));return true;">Remove this</a></div>
        <input type="hidden" fbcontext="AQDw-piXsi8W" value="" name="q_3_answer_0_img" id="app19827163485_q_3_answer_0_img">
        <input type="hidden" fbcontext="AQDw-piXsi8W" value="" name="q_3_answer_0_media_type" id="app19827163485_q_3_answer_0_media_type">
        <input type="hidden" fbcontext="AQDw-piXsi8W" value="" name="q_3_answer_0_hulu" id="app19827163485_q_3_answer_0_hulu">
      
    </div>
    <div class="clear"></div>
  </div>
  
</div>

        




<span class="fb_protected_wrapper" fb_protected="true">
</span>

<div fbcontext="AQDw-piXsi8W" id="app19827163485_q_3_answer_1" class="answer">
  <div class="a_title">Image or Video: <span>(Optional)</span></div>
  <div class="content">
    <div class="left">
      <div class="input">
        <span fbcontext="AQDw-piXsi8W" id="app19827163485_q_3_answer_1_ordinal">b ) </span>

        <input type="text" fbcontext="AQDw-piXsi8W" onkeyup="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_check_remain_chars('answer','q_3_answer_1')},19827163485],new fbjs_event(event));" onfocus="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_check_remain_chars('answer','q_3_answer_1')},19827163485],new fbjs_event(event));" value="" id="app19827163485_q_3_answer_1_name" name="q_3_answer_1_name">
      </div>
      <div class="oper">
        <div class="clear"></div>
        <div fbcontext="AQDw-piXsi8W" id="app19827163485_q_3_answer_1_note" class="text">93 characters left.</div>
        <div class="remove">
          
            <a fbcontext="AQDw-piXsi8W" style="display: none;" id="app19827163485_q_3_answer_1_remove" onclick="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_remove_answer('3','1'); return false;},19827163485],new fbjs_event(event));return true;">Remove Answer</a>
          
        </div>
        <div class="option">
          <input type="radio" fbcontext="AQDw-piXsi8W" id="app19827163485_q_3_answer_1_correct" name="question_3_answer">
          Correct Answer</div>
        <div class="clear"></div>
      </div>
    </div>
    <div class="right">
      
      
        <div class="option_img"><img fbcontext="AQDw-piXsi8W" id="app19827163485_q_3_answer_1_thumbnails" src="http://d1bye8fl443jlj.cloudfront.net/prod/images/quiz_create_part2-img.gif"></div>
        <div class="s_upload2">
          <div fbcontext="AQDw-piXsi8W" id="app19827163485_q_3_answer_1_upload" style="display: block;">
            <div onclick="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_upload_answer_image('q_3_answer_1',a19827163485_q_3_answer_1_str,'9810bdbf13ea4e2aaedfc1beb0c43a76');return false;},19827163485],new fbjs_event(event));" class="i_up">Upload your own image</div>
            <div onclick="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_answer_select_hulu_video('q_3_answer_1');return false;},19827163485],new fbjs_event(event));" class="i_up">Add video from<img src="http://d1bye8fl443jlj.cloudfront.net/prod/images/hulu_font.png"></div>
          </div>
        </div>
        <div fbcontext="AQDw-piXsi8W" id="app19827163485_q_3_answer_1_remove_img" style="display: none;" class="c_remove"><a fbcontext="AQDw-piXsi8W" id="app19827163485_question_3_remove_img" onclick="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_remove_answer_image('q_3_answer_1');return false;},19827163485],new fbjs_event(event));return true;">Remove this</a></div>
        <input type="hidden" fbcontext="AQDw-piXsi8W" value="" name="q_3_answer_1_img" id="app19827163485_q_3_answer_1_img">
        <input type="hidden" fbcontext="AQDw-piXsi8W" value="" name="q_3_answer_1_media_type" id="app19827163485_q_3_answer_1_media_type">
        <input type="hidden" fbcontext="AQDw-piXsi8W" value="" name="q_3_answer_1_hulu" id="app19827163485_q_3_answer_1_hulu">
      
    </div>
    <div class="clear"></div>
  </div>
  
</div>

      </div>
    
    
      <div class="add_answer"><a onclick="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_add_answer('3');return false;},19827163485],new fbjs_event(event));return true;"><img src="http://d1bye8fl443jlj.cloudfront.net/prod/images/quiz_create_part2-add.gif"></a> </div>
    
  </div>
</div>
        
          

  
  

<span class="fb_protected_wrapper" fb_protected="true">
</span>
<div fbcontext="AQDw-piXsi8W" style="display: block;" id="app19827163485_question_4" class="question">
  <div class="question-line">
    <div class="clear"></div>
    <a fbcontext="AQDw-piXsi8W" title="Question 5" id="app19827163485_question_4_nav" onclick="(new Image()).src = '/ajax/ct.php?app_id=19827163485&amp;action_type=3&amp;post_form_id=609a27b4cb70e71b0741079248b83b40&amp;position=3&amp;' + Math.random();fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_toggle_display('4');return false;},19827163485],new fbjs_event(event));return true;" href="#" class="enable">Question 5</a>
    
      <a fbcontext="AQDw-piXsi8W" style="display: none;" id="app19827163485_question_4_remove" onclick="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_remove_question('4'); return false;},19827163485],new fbjs_event(event));return true;" class="remove">Remove Question</a>
    
    <div class="clear"></div>
  </div>
  <div fbcontext="AQDw-piXsi8W" style="display: block;" id="app19827163485_question_4_content" class="q_content">
     <div class="q_name">
      <div class="a_title">Image or Video: <span>(Optional)</span></div>
      <div class="input_name">
        
          <div class="input">
            <input type="text" fbcontext="AQDw-piXsi8W" onkeyup="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_check_remain_chars('question','question_4')},19827163485],new fbjs_event(event));" onfocus="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_check_remain_chars('question','question_4')},19827163485],new fbjs_event(event));" value="Start typing your question" id="app19827163485_question_4_name" name="question_4_name">
          </div>
          <div class="cnote"><span fbcontext="AQDw-piXsi8W" id="app19827163485_question_4_note">94 characters left.</span><span fbcontext="AQDw-piXsi8W" class="n_error" style="display: none;" id="app19827163485_question_4_error">Please input a name for your question.</span></div>
        
      </div>
      <div class="up_image">
        
        
          <div class="option_img"><img fbcontext="AQDw-piXsi8W" id="app19827163485_question_4_thumbnails" src="http://d1bye8fl443jlj.cloudfront.net/prod/images/quiz_create_part2-img.gif"></div>
          <div class="s_upload2">
           <div fbcontext="AQDw-piXsi8W" id="app19827163485_question_4_upload" style="display: block;">
             
               <div onclick="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_upload_question_image('question_4',a19827163485_question_4_str,'e116cb4ac93e4842b6fbb39464ea5eb0',null);return false;},19827163485],new fbjs_event(event));" class="i_up">Upload your <br>own image</div>
             
             <div onclick="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_question_select_hulu_video('question_4');return false;},19827163485],new fbjs_event(event));" class="i_up">Add video from<img src="http://d1bye8fl443jlj.cloudfront.net/prod/images/hulu_font.png"></div>
           </div>
           <div fbcontext="AQDw-piXsi8W" id="app19827163485_question_4_remove_img" style="display: none;" class="c_remove"><a fbcontext="AQDw-piXsi8W" id="app19827163485_question_4_remove_img" onclick="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_remove_question_image('question_4');return false;},19827163485],new fbjs_event(event));return true;">Remove this</a></div>
           <input type="hidden" fbcontext="AQDw-piXsi8W" value="" name="question_4_img" id="app19827163485_question_4_img">
           <input type="hidden" fbcontext="AQDw-piXsi8W" value="" name="question_4_thumbnail" id="app19827163485_question_4_thumbnail">
           <input type="hidden" fbcontext="AQDw-piXsi8W" value="" name="question_4_media_type" id="app19827163485_question_4_media_type">
           <input type="hidden" fbcontext="AQDw-piXsi8W" value="" name="question_4_hulu" id="app19827163485_question_4_hulu">
          </div>
        
      </div>
      <div class="clear"></div>
     </div>
    <div class="q_answer">Answers: </div>
    
      <div fbcontext="AQDw-piXsi8W" id="app19827163485_question_4_answers_container">
        




<span class="fb_protected_wrapper" fb_protected="true">
</span>

<div fbcontext="AQDw-piXsi8W" id="app19827163485_q_4_answer_0" class="answer">
  <div class="a_title">Image or Video: <span>(Optional)</span></div>
  <div class="content">
    <div class="left">
      <div class="input">
        <span fbcontext="AQDw-piXsi8W" id="app19827163485_q_4_answer_0_ordinal">a ) </span>

        <input type="text" fbcontext="AQDw-piXsi8W" onkeyup="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_check_remain_chars('answer','q_4_answer_0')},19827163485],new fbjs_event(event));" onfocus="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_check_remain_chars('answer','q_4_answer_0')},19827163485],new fbjs_event(event));" value="" id="app19827163485_q_4_answer_0_name" name="q_4_answer_0_name">
      </div>
      <div class="oper">
        <div class="clear"></div>
        <div fbcontext="AQDw-piXsi8W" id="app19827163485_q_4_answer_0_note" class="text">95 characters left.</div>
        <div class="remove">
          
            <a fbcontext="AQDw-piXsi8W" style="display: none;" id="app19827163485_q_4_answer_0_remove" onclick="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_remove_answer('4','0'); return false;},19827163485],new fbjs_event(event));return true;">Remove Answer</a>
          
        </div>
        <div class="option">
          <input type="radio" fbcontext="AQDw-piXsi8W" id="app19827163485_q_4_answer_0_correct" name="question_4_answer">
          Correct Answer</div>
        <div class="clear"></div>
      </div>
    </div>
    <div class="right">
      
      
        <div class="option_img"><img fbcontext="AQDw-piXsi8W" id="app19827163485_q_4_answer_0_thumbnails" src="http://d1bye8fl443jlj.cloudfront.net/prod/images/quiz_create_part2-img.gif"></div>
        <div class="s_upload2">
          <div fbcontext="AQDw-piXsi8W" id="app19827163485_q_4_answer_0_upload" style="display: block;">
            <div onclick="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_upload_answer_image('q_4_answer_0',a19827163485_q_4_answer_0_str,'3d2d617bc4d843b48ef9043c0105f707');return false;},19827163485],new fbjs_event(event));" class="i_up">Upload your own image</div>
            <div onclick="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_answer_select_hulu_video('q_4_answer_0');return false;},19827163485],new fbjs_event(event));" class="i_up">Add video from<img src="http://d1bye8fl443jlj.cloudfront.net/prod/images/hulu_font.png"></div>
          </div>
        </div>
        <div fbcontext="AQDw-piXsi8W" id="app19827163485_q_4_answer_0_remove_img" style="display: none;" class="c_remove"><a fbcontext="AQDw-piXsi8W" id="app19827163485_question_4_remove_img" onclick="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_remove_answer_image('q_4_answer_0');return false;},19827163485],new fbjs_event(event));return true;">Remove this</a></div>
        <input type="hidden" fbcontext="AQDw-piXsi8W" value="" name="q_4_answer_0_img" id="app19827163485_q_4_answer_0_img">
        <input type="hidden" fbcontext="AQDw-piXsi8W" value="" name="q_4_answer_0_media_type" id="app19827163485_q_4_answer_0_media_type">
        <input type="hidden" fbcontext="AQDw-piXsi8W" value="" name="q_4_answer_0_hulu" id="app19827163485_q_4_answer_0_hulu">
      
    </div>
    <div class="clear"></div>
  </div>
  
</div>

        




<span class="fb_protected_wrapper" fb_protected="true">
</span>

<div fbcontext="AQDw-piXsi8W" id="app19827163485_q_4_answer_1" class="answer">
  <div class="a_title">Image or Video: <span>(Optional)</span></div>
  <div class="content">
    <div class="left">
      <div class="input">
        <span fbcontext="AQDw-piXsi8W" id="app19827163485_q_4_answer_1_ordinal">b ) </span>

        <input type="text" fbcontext="AQDw-piXsi8W" onkeyup="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_check_remain_chars('answer','q_4_answer_1')},19827163485],new fbjs_event(event));" onfocus="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_check_remain_chars('answer','q_4_answer_1')},19827163485],new fbjs_event(event));" value="" id="app19827163485_q_4_answer_1_name" name="q_4_answer_1_name">
      </div>
      <div class="oper">
        <div class="clear"></div>
        <div fbcontext="AQDw-piXsi8W" id="app19827163485_q_4_answer_1_note" class="text">92 characters left.</div>
        <div class="remove">
          
            <a fbcontext="AQDw-piXsi8W" style="display: none;" id="app19827163485_q_4_answer_1_remove" onclick="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_remove_answer('4','1'); return false;},19827163485],new fbjs_event(event));return true;">Remove Answer</a>
          
        </div>
        <div class="option">
          <input type="radio" fbcontext="AQDw-piXsi8W" id="app19827163485_q_4_answer_1_correct" name="question_4_answer">
          Correct Answer</div>
        <div class="clear"></div>
      </div>
    </div>
    <div class="right">
      
      
        <div class="option_img"><img fbcontext="AQDw-piXsi8W" id="app19827163485_q_4_answer_1_thumbnails" src="http://d1bye8fl443jlj.cloudfront.net/prod/images/quiz_create_part2-img.gif"></div>
        <div class="s_upload2">
          <div fbcontext="AQDw-piXsi8W" id="app19827163485_q_4_answer_1_upload" style="display: block;">
            <div onclick="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_upload_answer_image('q_4_answer_1',a19827163485_q_4_answer_1_str,'007153a76e244a61b3469c94a0ddbb94');return false;},19827163485],new fbjs_event(event));" class="i_up">Upload your own image</div>
            <div onclick="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_answer_select_hulu_video('q_4_answer_1');return false;},19827163485],new fbjs_event(event));" class="i_up">Add video from<img src="http://d1bye8fl443jlj.cloudfront.net/prod/images/hulu_font.png"></div>
          </div>
        </div>
        <div fbcontext="AQDw-piXsi8W" id="app19827163485_q_4_answer_1_remove_img" style="display: none;" class="c_remove"><a fbcontext="AQDw-piXsi8W" id="app19827163485_question_4_remove_img" onclick="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_remove_answer_image('q_4_answer_1');return false;},19827163485],new fbjs_event(event));return true;">Remove this</a></div>
        <input type="hidden" fbcontext="AQDw-piXsi8W" value="" name="q_4_answer_1_img" id="app19827163485_q_4_answer_1_img">
        <input type="hidden" fbcontext="AQDw-piXsi8W" value="" name="q_4_answer_1_media_type" id="app19827163485_q_4_answer_1_media_type">
        <input type="hidden" fbcontext="AQDw-piXsi8W" value="" name="q_4_answer_1_hulu" id="app19827163485_q_4_answer_1_hulu">
      
    </div>
    <div class="clear"></div>
  </div>
  
</div>

      </div>
    
    
      <div class="add_answer"><a onclick="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_add_answer('4');return false;},19827163485],new fbjs_event(event));return true;"><img src="http://d1bye8fl443jlj.cloudfront.net/prod/images/quiz_create_part2-add.gif"></a> </div>
    
  </div>
</div>
        
    </div>
      <div class="add_question"><a onclick="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_add_question();return false;},19827163485],new fbjs_event(event));return true;"><img src="http://d1bye8fl443jlj.cloudfront.net/prod/images/quiz_create_part2-add_q.png"></a> </div>
    </div>
    <div class="g_continue"><a onclick="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_change_part('3'); return false;},19827163485],new fbjs_event(event));return true;"><img src="http://d1bye8fl443jlj.cloudfront.net/prod/images/quiz_create-continue.gif"></a></div>
  </div>
  
  
  <div fbcontext="AQDw-piXsi8W" style="display: none;" id="app19827163485_quiz_part3" class="part3">
    <div class="operation">
      <div fbcontext="AQDw-piXsi8W" id="app19827163485_loading_r_1" class="loading_r"></div>
      <a onclick="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_publish();return false;},19827163485],new fbjs_event(event));return true;"><img src="http://d1bye8fl443jlj.cloudfront.net/prod/images/quiz_create_publish-button1.gif"></a> <a onclick="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_change_part('1');return false;},19827163485],new fbjs_event(event));return true;"><img src="http://d1bye8fl443jlj.cloudfront.net/prod/images/quiz_create_publish-button2.gif"></a> </div>
    
    <div class="quiz_name">
      <div class="thumb"><img alt="" src="http://d1bye8fl443jlj.cloudfront.net/prod/images/quiz_create_image1.gif"></div>
      <div fbcontext="AQDw-piXsi8W" id="app19827163485_quiz_preview_name" class="name">aaaa</div>
    </div>
    <div fbcontext="AQDw-piXsi8W" id="app19827163485_question_list" class="question_list"><div class="question"><div class="top"><div class="t_name">1. afeafew</div><div class="t_oper"><a href="#" title="for_event_0">Edit</a></div></div><ul class="answers"><li><span>a) </span><a href="#" title="for_event_0_0">feaewa</a></li><li><span>b) </span><a href="#" title="for_event_0_1" class="active">feawfea</a></li></ul></div><div class="question"><div class="top"><div class="t_name">2. fawe</div><div class="t_oper"><a href="#" title="for_event_1">Edit</a></div></div><ul class="answers"><li><span>a) </span><a href="#" title="for_event_1_0">feaw</a></li><li><span>b) </span><a href="#" title="for_event_1_1" class="active">efa</a></li></ul></div><div class="question"><div class="top"><div class="t_name">3. feawfew</div><div class="t_oper"><a href="#" title="for_event_2">Edit</a></div></div><ul class="answers"><li><span>a) </span><a href="#" title="for_event_2_0" class="active">fewa</a></li><li><span>b) </span><a href="#" title="for_event_2_1">feawew</a></li></ul></div><div class="question"><div class="top"><div class="t_name">4. feawfeawf</div><div class="t_oper"><a href="#" title="for_event_3">Edit</a></div></div><ul class="answers"><li><span>a) </span><a href="#" title="for_event_3_0">feawe</a></li><li><span>b) </span><a href="#" title="for_event_3_1" class="active">feaeawf</a></li></ul></div><div class="question"><div class="top"><div class="t_name">5. feawfe</div><div class="t_oper"><a href="#" title="for_event_4">Edit</a></div></div><ul class="answers"><li><span>a) </span><a href="#" title="for_event_4_0" class="active">fwafea</a></li><li><span>b) </span><a href="#" title="for_event_4_1">efawewfa</a></li></ul></div></div>
    <div class="operation">
      <div fbcontext="AQDw-piXsi8W" id="app19827163485_loading_r_2" class="loading_r"></div>
      <a onclick="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_publish();return false;},19827163485],new fbjs_event(event));return true;"><img src="http://d1bye8fl443jlj.cloudfront.net/prod/images/quiz_create_publish-button1.gif"></a> <a onclick="fbjs_sandbox.instances.a19827163485.bootstrap();return fbjs_dom.eventHandler.call([fbjs_dom.get_instance(this,19827163485),function(a19827163485_event) {a19827163485_quiz_change_part('1');return false;},19827163485],new fbjs_event(event));return true;"><img src="http://d1bye8fl443jlj.cloudfront.net/prod/images/quiz_create_publish-button2.gif"></a> </div>
  </div>
  
</div>
