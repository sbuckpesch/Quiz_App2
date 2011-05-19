<!DOCTYPE div PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "https://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/style.css" ></link>
<script src="https://connect.facebook.net/de_DE/all.js"></script>    
<!--<script src="lib/facebook_popup/prototype.js" type="text/javascript"></script>-->
<!--<script src="lib/facebook_popup/effects.js" type="text/javascript"></script>-->
<!-- dragdrop.js is required if you want draggable windows -->
<!--<script src="lib/facebook_popup/dragdrop.js" type="text/javascript"></script>-->
<!--<script src="lib/facebook_popup/lowpro.js" type="text/javascript"></script>-->
<!--<script src="lib/facebook_popup/popup.js" type="text/javascript"></script>-->
<!--<script src="lib/app-arena/js/aa_fb_framework.js" type="text/javascript"></script>-->
<script src="lib/facebook_popup/jquery.js" type="text/javascript"></script>


<!--Popup TEST-->
<script type="text/javascript" src="lib/facebook_popup/popup2.js"></script> 
<link rel="stylesheet" type="text/css" href="css/popup.css" ></link>

<!-- Meta Data -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php 

// Page URL
$facebook = "https://www.facebook.com/";
$fb_appid = $session->instance['fb_app_id'];
$fb_pageurl = $session->instance['fb_page_url'];
$fb_appurl = $facebook . $fb_pageurl . '?sk=app_' . $fb_appid;

?>
    <script type="text/javascript">
      //<![CDATA[
        
        // We need to tell Popup.js where our images are. Normally this isn't
        // needed. Just store the images in your "images" folder.
        Popup.BorderImage = 'lib/facebook_popup/images/popup_border_background.png';
        Popup.BorderTopLeftImage = 'lib/facebook_popup/images/popup_border_top_left.png';
        Popup.BorderTopRightImage = 'lib/facebook_popup/images/popup_border_top_right.png';
        Popup.BorderBottomLeftImage = 'lib/facebook_popup/images/popup_border_bottom_left.png';
        Popup.BorderBottomRightImage = 'lib/facebook_popup/images/popup_border_bottom_right.png';
        
        // Every popup should be draggable by the tilebar
        Popup.Draggable = true;
        
        // Focus automatically on first control in popup
        Popup.AutoFocus = true; // here to document feature; true by default
        
        // Add trigger behavior for links with a class of "popup".
        Event.addBehavior({
          'a.popup': Popup.TriggerBehavior({
            reload: true // reload Ajax popups on second click
          })
        });
        
        // This is how you instantiate and show a window without a trigger link.
//        Event.observe(window, 'dom:loaded', function() {
//          Popup.alert(
//            'This little window was created with PopupJS. A javascript library that allows you to easily create Facebook-style windows with LowPro and Prototype.',
//            {title: 'Popup Window', width: '28em'}
//          )
//        });
        
        // Wire in alert, confirm, and dialog links. Standard LowPro stuff.
        Event.addBehavior({
          
          'a#manual:click': function() {
            var popup = new Popup.Window('mpopup');
            popup.show();
          },
          
          'a#alert:click': function() {
            Popup.alert('Leider war das nicht der nicht der richtige Ausschnitt.<br> Versuchen Sie es doch noch einmal.<br> Viel Gl&uuml;ck!');
          },

          'a#alert1:click': function() {
              Popup.alert('Danke f&uuml;r die Teilnahme. <br> Jetzt deinen Freunden per Skype bescheid sagen um das Bild komplett zu l&ouml;sen.<br>Einfach den Link kopieren. <br> <?echo $fb_appurl?>');
            },
          
          'a#confirm:click': function() {
            Popup.confirm('Are you sure?', {
              okay: function() { Popup.alert("Yep, you're sure.") },
              cancel: function() { Popup.alert( "Not sure, eh?") }
            });
          },
          
          'a#dialog:click': function() {
            Popup.dialog({
              title: 'Custom Dialog',
              message: 'This is a completely custom dialog with three buttons.\n\nChoose one.',
              buttons: ['Yes', 'No', 'Maybe'],
              buttonClick: function(button) { Popup.alert('You chose: ' + button) },
              width: '30em'
            });
          }
          
        })
        
      //]]>
    </script>

<style>
  <?php echo $session->config['css']; ?>

/* ***************
 	messages
*************** */

.error-msg,.success-msg,.notice-msg,.note-msg {
	margin-bottom: 1em !important;
	border-style: solid !important;
	border-width: 1px !important;
	padding: 4px 12px !important;
	font-weight: bold !important;
	width: 500px;
}

.error-msg li,.success-msg li,.notice-msg li {
	margin-bottom: .2em;
}

.error-msg {
	border-color: #f16048;
	color: #df280a;
	background: #faebe7;
}

.success-msg {
	border-color: #446423;
	color: #3d6611;
	background: #eff5ea;
}

.notice-msg,.note-msg {
	border-color: #fcd344;
	color: #3d6611;
	background: #fafaec;
}
</style>

</head>

<body>
	<div id="fb-root"></div>
	<div id="header">
	</div>

