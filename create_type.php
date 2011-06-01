<?php
include('init.php');
include('header.php'); 
?>

<script type="text/javascript">
  function to_create_page()
  {
    var val=jQuery("input[name=quiz_type]:checked").val();
    load_page('create_type'+val+'.php');
  }
  //load_page('create_type2.php');
</script>
<?php 
  render("create_type2.php",$_GET);
  include('footer.php'); 
?>
