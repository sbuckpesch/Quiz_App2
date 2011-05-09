<?php
include('init.php');
// Set The Instance ID to Cookie
$instid= $global->instance['instance_id'];
setcookie("img_participant", $instid);

include 'header.php';

  
  
// Request User Data  
$fb_user_data = new FacebookUserData($_REQUEST['signed_request']);
$fb_user_data->saveUser();
 
$config=$global->config;
$content=$global->content;
$instance=$global->instance;

addJs('thankyou');
  
// Get Post Variable and Instance_ID
$row = $_POST['Row'];
$col = $_POST['Column'];


// Page URL
$facebook = "https://www.facebook.com/";
$fb_appid = $global->instance['fb_app_id'];
$fb_pageurl = $global->instance['fb_page_url'];
$fb_appurl = $facebook . $fb_pageurl . '?sk=app_' . $fb_appid;

// Save the Image in Database
$sql = "INSERT INTO `image_parts` SET `instance_id`='$instid', `column`='$col', `row`='$row', `clear`=1";
$res = $global->db->query($sql);

//Share Messages
$message = $config['share_message'];
$caption = $config['share_caption'];
$desc = $config['share_desc'];
$link = $fb_appurl;
$image = $config['share_image'];

?>
<body onload="postToFacebook('<?=$message?>', '<?=$caption?>', '<?=$desc?>', '<?=$link?>', '<?=$image?>')"; style="margin:0px;">
	<div id="lp-container">
		<div class="teilnehmen-landing-page">
			<?=$content['page_thankyou_teaser']?>
			<!--  Like Button -->
			<div class="likebutton" >
<script src="https://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:send href="<?echo $fb_appurl?>" font="arial"></fb:send></div>
			<!--  Share Buttons-->
<!--			<span class="fb-share-button" onclick="postToFacebook(body: 'test', message: 'Ich habe gerade ein Teil des Bildes geöffnet. Hilf mir jetzt das ganze Bild zu öffnen.', link: 'https://www.facebook.com/pages/ICon-Apps-Beta/150427118343402?sk=app_159924464068645', picture: 'https://dev.iconsultants.eu/facebook/bibi/img_clear_020.jpg');"><?=$content['btn_facebook']?></span>-->
			<div class="twitter-share-button"><a href="https://twitter.com/home?status=Jetzt%20Teilnehmen%20<?echo $fb_appurl?>" target="_blank"><?=$content['btn_twitter']?></a></div>
			<span class="skype-share-button"><a id="alert1" href="javascript:void(0)"><?=$content['btn_skype']?></a></span>
			<div class="email-share-button"><a href="mailto:?subject=Bilderraetsel&body=Ich%20habe%20gerade%20erfolgreich%20ein%20Teil%20des%20großen%20Bilder%20Raetsels%20gelüftet!%0ASei%20auch%20du%20dabei!%0AEinfach%20auf%20den%20Link%20klicken%20und%20teilnehmen:%0A<?echo $fb_appurl?>"><?=$content['btn_email']?></a></div>
		</div>
		<div class="backFanpage"><a href="<?echo $fb_appurl?>" target="_top"><img src="images/btn_backtofanpage-german.jpg" alt="Zur&uuml;ck zur Fanpage" /></a></div>
</div>
   
    
    
</body>
<?
  include 'footer.php';  
?>