<script type="text/javascript" src="lib/facebook_popup/jquery-1.6.js"></script> 
<script language="javascript">
function loadPopup()
{
 $("#backgroundPopup").css({"opacity": "0.1"});
 $("#backgroundPopup").fadeIn("fast");
 $("#popupContact").slideDown("slow");
}
function disablePopup()
{
 $("#backgroundPopup").fadeOut("slow");
 $("#popupContact").slideUp("slow");
}
function centerPopup()
{
 var windowWidth = document.documentElement.clientWidth;
 var windowHeight = document.documentElement.clientHeight;
 var popupHeight = $("#popupContact").height();
 var popupWidth = $("#popupContact").width();
 $("#popupContact").css({"position": "absolute","top": windowHeight/2-popupHeight/2,"left": windowWidth/2-popupWidth/2});
 $("#backgroundPopup").css({"height": windowHeight});
}

$(document).ready(function()
{
 $("#btn").click(function()
 {
  centerPopup();
  loadPopup();
 });
 
 $("#popupContactClose, .c_btn").click(function()
 {
  disablePopup();
 });
  
 $(document).keypress(function(e)
 {
  if(e.keyCode==27)//Disable popup on pressing `ESC`
  {
   disablePopup();
  }
 });
});
</script>

<style>
<!--
#main{
width:500px;
text-align:center;
margin:100px;
font-family:"lucida grande",tahoma,verdana,arial,sans-serif;
}
#btn{
border:2px solid #00999999;
background-color:#3366FF;
color:#FFFFFF;
font-size:14px;
width:100px;
height:30px;
}

#popupContact *{
border:0pt none;
margin:0pt;
padding:0pt;
color:#333333;
text-align:left;
}
#popupContact body{
background:#fff none repeat scroll 0%;
line-height:1;
font-size: 12px;
margin:0pt;
height:100%;
}
#popupContact a{
cursor: pointer;
text-decoration:none;
font-size:10px;
}
#backgroundPopup{
display:none;
position:fixed;
_position:absolute; /* hack for internet explorer 6*/
height:100%;
width:100%;
top:0;
left:0;
background:#000000; 
z-index:1;
}
#popupContact{
background-color:#fff;
display:none;
position:fixed;
_position:absolute; /* hack for internet explorer 6*/
height:250px;
width:450px;
border:10px solid #999999;
z-index:2;
-moz-border-radius: 9px;
-webkit-border-radius: 9px;
}
#popupContact h1{ 
background:#6D84B4 none repeat scroll 0 0;
border-color:#3B5998 #3B5998 -moz-use-text-color;
border-style:solid solid none;
border-width:1px 1px medium;
color:#FFFFFF;
font-size:14px;
font-weight:bold;
padding:3px;
margin:0;
}
#popupContactClose{
line-height:14px;
right:6px;
top:4px;
position:absolute;
display:block;
color:#FFFFFF;
}
#personal{
padding:5px;
font-weight:bold;
font-size:12px;
}
#popupContact #buttonArea{
background:#F2F2F2;
border-top:1px solid #CCCCCC;
height:34px;
margin:0px;
position:absolute;
bottom:0px;
width:100%;
padding-top:5px;
}
#contactArea #text{
border:2px solid #cccccc;
margin:5px;
height:50px;
width:95%;
padding:0;
}
#buttonArea .SharingOptions_Text{
padding:3px;
float:left;
}
#buttonArea .SharingOptions_Text a{
color:#3B5998;
font-size:11px;
}
#Sharer_btns{
float:right;
}
#Sharer_btns .s_btn{
margin:2px 6px 6px 5px;
font-size:13px;
background-color:#5B74A8;
background-position:0 -48px;
border-color:#29447E #29447E #1A356E;
color:#FFFFFF;
padding:2px 6px;
text-align:center;
text-decoration:none;
vertical-align:middle;
white-space:nowrap;
}

#Sharer_btns .c_btn{
margin:2px 6px 6px 5px;
border-color:#999999 #999999 #888888;
border-style:solid;
border-width:1px;
color:#333333;
cursor:pointer;
display:inline-block;
font-size:11px;
font-weight:bold;
padding:2px 6px;
text-align:center;
text-decoration:none;
vertical-align:middle;
white-space:nowrap;
}
-->
</style>


<body>
<div id="main">
 <div id="btn">Load Popup</div>
 <div id="backgroundPopup"></div>
 <div id="popupContact">
  <a id="popupContactClose">Close</a>
  <div id="popup_head"><h1>WebSpeaks.in</h1></div>
  <div id="personal">Post to Profile<br><br><br></div>
  <div id="contactArea">
   <textarea id="text"></textarea>
  </div>
  <div id="buttonArea">
   <div class="SharingOptions_Text">
    <a href="#" style="color:#3B5998;">Send as a Message instead</a>
   </div>
   <div id="Sharer_btns">
    <input type="button" value="Share" class="s_btn"/>
    <input type="button" value="Cancel" class="c_btn"/>
   </div>
  </div>
 </div>
</div>
</body>