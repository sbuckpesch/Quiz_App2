<?php 
$action=$global->link->createBaseLink('form_submit.php',array('instid'=>$global->instid,'template'=>'n')); 

?> 

<div id="form_content">
<form id="join_form" action="<?php echo $action; ?>" onsubmit="return form_submit();">
 <input id="page_id" name="page_id" value="<?php echo $global->page_id; ?>" type="hidden">
 <input id="form_type" name="form_type" value="contact2" type="hidden">

  <table style="width: 266px;" border="0" cellpadding="2" cellspacing="2" width="100%">
    <tbody>
<tr>
        <td style="width: 100px;">Geschlecht: </td>
        <td style="width: 149px;">
          <input type="radio" name="sex" value="male" /> Männlich<br />
        <input type="radio" name="sex" value="female" /> Weiblich</td>
      </tr>
    	<tr>
        <td style="width: 100px;">Vorname: </td>
        <td style="width: 149px;">
          <input name="name" id="name" value="" type="text">
        </td>
      </tr>
    <!--
      <tr>
        <td style="width: 100px;">Vorname: </td>
        <td style="width: 149px;">
        <input id="name" value="" type="text"></td>
      </tr>
      -->
      <tr>
        <td style="width: 100px;">Nachname: </td>
        <td style="width: 149px;">
          <input name="nickname"  value="" type="text"></td>
      </tr>
      <tr>
        <td style="width: 100px;">Stra&szlig;e&nbsp;+Nr.:
        </td>
        <td style="width: 149px;"> 
          <input name="street" id="street" value="" type="text">
        </td>
      </tr>
      <tr>
        <td style="width: 100px;">PLZ: </td>
        <td style="width: 149px;">
          <input name="plz" id="plz" value="" type="text"></td>
      </tr>
      <tr>
        <td style="width: 100px;">Ort: </td>
        <td style="width: 149px;">
            <input name="ort" id="city" value="" type="text"></td>
      </tr>
      <tr>
        <td style="width: 100px;">Telefonnummer: </td>
        <td style="width: 149px;">
            <input name="tel" id="number" value="" type="text"></td>
      </tr>
      <tr>
        <td style="width: 100px;">Mobilnummer: </td>
        <td style="width: 149px;">
            <input name="mobile" id="number" value="" type="text"></td>
      </tr>
      <tr>
        <td style="width: 100px;">Homepage: </td>
        <td style="width: 149px;">
          <input name="homepage" id="homepage" value="" type="text"></td>
      </tr>
      <tr>
        <td style="width: 100px;">Email-Adresse: </td>
        <td style="width: 149px;">
          <input name="email" id="email" value="" type="text"> 
        </td>
      </tr>
<tr>
        <td style="width: 100px;">Zus&auml;tzliche Informationen </td>
        <td style="width: 149px;">
            <textarea name="information" rows="2" cols="20"></textarea> </td>
      </tr>
    </tbody>
  </table>
  <br>
    <div class="popup_footer">  
  <input value="submit" type="submit">
  </div>  
</form>
</div>

