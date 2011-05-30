<?php
init_facebook(array('nexturl'=>$global->link->createCanvasLink('thankyou.php',array('instid'=>$global->instid))));

$config=$global->config;
$content=$global->content;
$instance=$global->instance;

//$refLink = $global->link->createCanvasLink('detail.php',array('instid'=>$global->instid,'join_id'=>$join->id));
$refLink=$global->appurl.'index.php';

// Create contact form
$form=new Frd_Form_Common(array('id'=>'emailform','method'=>'post','action'=> $global->baseurl.'sendmail.php'));
//$form->setRender('table','');
//$form->setRender('jform','Plan');
$form->addElement('text','email',array('id'=>"mail_email",'size'=>20));
$form->addElement('text','subject',array('id'=>"mail_subject",'value'=>$config['share_email_subject'],'size'=>20));
$form->addElement('textarea','message',array('id'=>'mail_message','value'=>$config['share_email_body'].$refLink,'cols'=>25,'rows'=>6));
$form->addElement('button','button',array('value'=>'send','onclick'=>'sendmail()'));
$form_html= $form->render();
$form_html=str_replace("\n","",$form_html);

addJs('thankyou');
?>
Thank You
<!--  START CONTENT  -->
<?=$content['page_thankyou_teaser']?>
<div id="content" style="padding-top: 16px;">
	<?=$content['page_thankyou_top']?>
	<div id="btn_container">
		<span class="btn btn_twitter"><a href="http://twitter.com/home?status=<?php echo $config['share_twitter_body'] . $refLink;?>" target="_blank"><?=$content['btn_twitter']?></a></span>
		<span class="btn btn_skype" onclick="fbDialog('<?=app_string_to_singleline($config['share_skype_subject'])?>','<?=app_string_to_singleline($content['share_skype_body'] . $refLink)?>', ' ')"><?=$content['btn_skype']?></span>
		<span class="btn btn_email" onclick="show_email_form(); return false;"><?=$content['btn_email']?></span>
	</div>
</div>

<script type="text/javascript">
function show_email_form()
{
  var dialog=$("#emailform").parents(".fb_dialog");
  if(dialog.html() == null)
  {
  fbDialog('<?=$config['share_email_subject']?>', '<?=app_string_to_singleline($form_html)?>', ' ', 400, 400);
  }
  else
  {
    dialog.show();
  }
  return false;
}

/* 
 * force update like info  in profile 
 * this page is only after upload 
 *
 */
</script>
