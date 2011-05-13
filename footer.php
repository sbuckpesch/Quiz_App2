<div id="footer">
  <?php //echo $content['pageFooter']; ?>
</div>


<br />
<hr />
<div style="color:grey; float:left; width:60%;">
<a href="https://www.instantssl.com/">Instant SSL Certificate Secured</a><br>
</div>
<div style="color:grey; float:right; width:40%;">
<a href="https://www.iconsultants.eu/de/facebook-applikationen.html" target=_blank>App powered by iConsultants</a>
</div>
<div style="clear:both;"></div>
</div>

<script>
   FB.init({
     appId  : '<?=$session->instance['fb_app_id']?>',
     status : true, // check login status
     cookie : true, // enable cookies to allow the server to access the session
     xfbml  : true  // parse XFBML
   });
   FB.Canvas.setAutoResize();
</script>
</body>
</html>
