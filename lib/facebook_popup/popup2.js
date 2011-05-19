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