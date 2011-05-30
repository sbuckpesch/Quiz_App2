<?php 

init_facebook(array('nexturl'=>$global->link->createLink('welcome.php',array('instid'=>$global->instid))));

$action=$global->link->createBaseLink('form_submit.php',array('instid'=>$global->instid,'template'=>'n')); 


//echo $config['form_type'];
?> 
<div id="form_content">
<form id="join_form" action="<?php echo $action; ?>" onsubmit="return form_submit();">
<div id="form_message">
</div>

  Name: <input type="text" id="name" value="" /> <br/>
  Email-Adresse: <input type="text" id="email" value="" /> <br/>
  <input type="submit" value="sumbit" />
</form>
<div>

<script type="text/javascript">
  function form_submit()
  {
    /*
    if($("#join_form").find("[name=title]").val() == '')
    {
      $("#form_message") 
    }
     */
    var options={
      success:function(data){
      <?php //$link= $global->link->createBaseLink('thankyou.php',array('instid'=>$_GET['instid'],'template'=>'n')); ?>
        $("#form_content").html("Thankyou.php");
        //top.location='<?php echo $link; ?>';
      }
    }; 
    $("#join_form").ajaxSubmit(options);

    return false;
  }
</script>
