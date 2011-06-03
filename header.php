<!DOCTYPE div PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" style="overflow: hidden">

<script type="text/javascript">
window.fbAsyncInit = function() {
FB.Canvas.setSize();
}
// Do things that will sometimes call sizeChangeCallback()
function sizeChangeCallback() {
FB.Canvas.setSize();
}
</script>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $global->config['meta_title']; ?></title>
<link rel="stylesheet" type="text/css" href="css/style.css" ></link>
<script src="http://connect.facebook.net/de_DE/all.js"></script>
<!--
<script type="text/javascript" src="langs/langs.js"></script>
-->
<?php 
addJs('jquery'); 
addJs('jquery.form'); 
addJs('facebookFunctions'); 

addJs('frd'); 
addJs('frd_global'); 
addJs('frd_popup'); 
addJs('frd_dialog'); 
addJs('frd_warning'); 
addJs('frd_loading'); 
addJs('frd_form'); 

addJs('functions'); 
addJs('app'); 

?>
<style>
  <!-- styles -->
  <?php 
    foreach($global->design as $css)
    {
      echo str_replace("<br />",'',$css);  
    }
  ?>
</style>
</head>

<body>
	<div id="fb-root"></div>
	<div id="header">
	</div>

  <div id="wrapper">
