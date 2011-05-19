<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
  <head>
    <title>Test</title>
    
    <style type="text/css">
    /* <![CDATA[ */
      body {
        font-family: "Lucida Grande", Helvetica, Arial, sans-serif;
        font-size: 80%;
        background: url(lib/facebook_popup/images/checkered.png);
        margin: 0;
        padding: 10px 20px;
      }
    /* ]]> */
    </style>
	<link rel="stylesheet" type="text/css" href="css/style.css" ></link>
	<script src="lib/facebook_popup/prototype.js" type="text/javascript"></script>
	<script src="lib/facebook_popup/effects.js" type="text/javascript"></script>
	<!-- dragdrop.js is required if you want draggable windows -->
	<script src="lib/facebook_popup/dragdrop.js" type="text/javascript"></script>
	<script src="lib/facebook_popup/lowpro.js" type="text/javascript"></script>
	<script src="lib/facebook_popup/popup.js" type="text/javascript"></script>
	<script src="lib/app-arena/js/aa_fb_framework.js" type="text/javascript"></script>
	<script src="lib/facebook_popup/jquery-1.6.js" type="text/javascript"></script>
	
	<script type="text/javascript">Event.addBehavior({'a.popup': Popup.TriggerBehavior()});</script> 	
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
        Event.observe(window, 'dom:loaded', function() {
          Popup.alert(
            'This little window was created with PopupJS. A javascript library that allows you to easily create Facebook-style windows with LowPro and Prototype.',
            {title: 'Popup Window', width: '28em'}
          )
        });
        
        // Wire in alert, confirm, and dialog links. Standard LowPro stuff.
        Event.addBehavior({
          
          'a#manual:click': function() {
            var popup = new Popup.Window('mpopup');
            popup.show();
          },
          
          'a#alert:click': function() {
            Popup.alert('Hello World!');
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
  </head>
  <body>
    
    <p>
      <!-- A simple popup trigger link -->
      <a class="popup" href="#popup1">Popup</a>
      <!-- Trigger links can reference the same popup -->
      <a class="popup" href="#popup1">Same Popup</a>
    </p>
    
    <p>
      <!-- An ajax popup is as simple using a real URL -->
      <a class="popup" href="./ajax.html">Ajax</a>
    </p>
    
    <p>
      <a class="popup" href="#search">Input</a>
    </p>
    
    <p>
      <a id="manual" href="javascript:void(0)">Manual</a>
    </p>
    
    <p>
      <a id="alert" href="javascript:void(0)">Alert</a>
    </p>
    
    <p>
      <a id="confirm" href="javascript:void(0)">Confirm</a>
    </p>
    
    <p>
      <a id="dialog" href="javascript:void(0)">Dialog</a>
    </p>
    
    <!-- This window will be shown when the page loads -->
    <!-- Commonly inline popups set their display to "none" and may also specify their width -->
    <div class="popup" id="popup1" style="display: none">
      <div class="popup_title">Popup Window</div>
      <div class="popup_content">
        <p>
          Wow! You just clicked on a link.
        </p>
        <p>
          <!-- Elements with the "close_popup" class will hide the popup -->
          <a class="close_popup" href="javascript:void(0)">Close</a>
        </p>
      </div>
    </div>
    
    <div class="popup" id="search" style="display: none">
      <div class="popup_title">Search</div>
      <div class="popup_content">
        <form>
          <p>
            <!-- The first input element on a form will receive the focus when shown -->
            <input id="query" name="query" type="text" value="" />
          </p>
          <p>
            <!-- Demonstrates using the Element.closePopup() function instead of a "close_link" class -->
            <a href="javascript: Element.closePopup('search')">Close</a>
          </p>
        </form>
      </div>
    </div>
    
    <div class="popup" id="mpopup" style="display: none; width: 24em;">
      <div class="popup_title">Manual Popup Window</div>
      <div class="popup_content">
        <p>This window was created by manually creating a popup window object with:</p>
        <pre style="font-size: 120%"><code>var popup = new Popup.Window('mpopup');
popup.show();</code></pre>
        <p>
          <!-- Elements with the "close_popup" class will hide the popup -->
          <a class="close_popup" href="javascript:void(0)">Close</a>
        </p>
      </div>
    </div>
    
  </body>
</html>