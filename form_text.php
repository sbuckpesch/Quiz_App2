<?php 
$action=$global->link->createBaseLink('form_submit.php',array('instid'=>$global->instid,'template'=>'n')); 

?> 

<div id="form_content">
<form id="join_form" action="<?php echo $action; ?>"
 onsubmit="return form_submit();" method="post">
 <input id="page_id" name="page_id" value="<?php echo $global->page_id; ?>" type="hidden">
 <input id="form_type" name="form_type" value="text" type="hidden">

  <div id="join_form_message"></div>
  <table style="width: 263px;" border="0"
 cellpadding="2" cellspacing="2" width="100%">
    <tbody>
      <tr>
        <td style="width: 94px;">Name: </td>
        <td style="width: 151px;">
          <input name="name" id="name" value="" type="text">
        </td>
      </tr>
      <tr>
        <td style="width: 94px;">Email-Adresse: </td>
        <td style="width: 151px;"><input name="email" id="email"
 value="" type="text"> </td>
      </tr>
      <tr>
        <td style="width: 100px;">Zus&auml;tzliche Informationen </td>
        <td style="width: 149px;"><textarea name="information" rows="2" cols="20"></textarea> </td>
      </tr>
    </tbody>
  </table>
  <br>
    <div class="popup_footer">  
  <input value="submit" type="submit">
  </div>  
</form>
</div>

<script type="text/javascript">
/*
  function form_submit()
  {
    var options={
      type: 'POST',
      success:function(data){
        jQuery("#form_content").html("Thank You");
      }
    }; 
    jQuery("#join_form").ajaxSubmit(options);

    return false;
  }
 */
</script>
