<?php
include('init.php');
include('header.php'); 
?>
<div class="quiz_precreate">
  <div class="box1"><h5>What type of quiz do you want to create?</h5></div>
    <div  id="title1"  class="titleOn1">
      <div class="title_radio">
        <h3>
          <input type="radio"  checked="true" value="1" name="quiz_type" id="radio1">
          How Well Do You Know...?
        </h3>
      </div>

      <div class="title_radio">
        <h3>
          <input value="2" type="radio"  name="quiz_type" id="radio2">
          Which One Are You?
        </h3>
      </div>

      <div>
          <a >
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
