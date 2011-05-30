<?php 
$action=$global->link->createBaseLink('form_submit.php',array('instid'=>$global->instid,'template'=>'n')); 

?> 

<div id="form_content">
<form id="join_form" action="<?php echo $action; ?>" onsubmit="return form_submit();">
 <input id="page_id" name="page_id" value="<?php echo $global->page_id; ?>" type="hidden">
 <input id="form_type" name="form_type" value="newsletter" type="hidden">

  <table style="text-align: left; width: 259px; height: 64px;"
 border="0" cellpadding="2" cellspacing="2">
    <tbody>
      <tr>
        <td align="undefined" valign="undefined">Name:</td>
        <td ><input id="name" name="name" value="" type="text"></td>
      </tr>
      <tr>
        <td align="undefined" valign="undefined">Email-Adresse:</td>
        <td><input id="email" name="email" value="" type="text"></td>
      </tr>
    </tbody>
  </table>
  <div class="popup_footer">  
  <input value="submit" type="submit">
  </div>  
</form>
</div>
