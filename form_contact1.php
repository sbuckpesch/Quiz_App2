<?php 
$action=$global->link->createBaseLink('form_submit.php',array('instid'=>$global->instid,'template'=>'n')); 
?> 

<div id="form_content">
<form id="join_form" action="<?php echo $action; ?>" onsubmit="return form_submit();">
 <input id="page_id" name="page_id" value="<?php echo $global->page_id; ?>" type="hidden">
 <input id="form_type" name="form_type" value="contact1" type="hidden">

  <table style="width: 263px;" border="0"
 cellpadding="2" cellspacing="2" width="100%">
    <tbody>
      <tr>
        <td style="width: 94px;">Vorname: </td>
        <td style="width: 151px;">
          <input name="name" id="name" value="" type="text"></td>
      </tr>
      <tr>
        <td style="width: 94px;">Nachname: </td>
        <td style="width: 151px;">
            <input name="nickname" id="email" value="" type="text"></td>
      </tr>
      <tr>
        <td style="width: 94px;">Stra&szlig;e: </td>
        <td style="width: 151px;">
          <input name="street" id="street" value="" type="text"></td>
      </tr>
      <tr>
        <td style="width: 94px;">PLZ: </td>
        <td style="width: 151px;">
            <input name="plz" id="plz" value="" type="text"></td>
      </tr>
      <tr>
        <td style="width: 94px;">Ort: </td>
        <td style="width: 151px;">
            <input name="ort" id="city" value="" type="text">
        </td>
      </tr>
      <tr>
        <td style="width: 94px;">Email-Adresse: </td>
        <td style="width: 151px;">
          <input name="email" id="email" value="" type="text"> 
        </td>
      </tr>
    </tbody>
  </table>
  <br>
    <div class="popup_footer">  
  <input value="submit" type="submit">
  </div>  
</form>
</div>

