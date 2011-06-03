<?php
include('init.php');
$page_id=$init->initPageId();
$init->initFluttery(0,$page_id);

include('header.php'); 


$is_fan=is_fan();
?>
<?php if($is_fan == false): ?>

  <div class="pageLandingNonFans"> 
   <div class="buttonNonFans">
     <?=$global->content['no_fan_img']?>
   </div>
  </div>  

<?php endif; ?>
<?php include('take.php'); ?>

<?php include('footer.php'); ?>
