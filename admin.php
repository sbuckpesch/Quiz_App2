<?php
//recenet user list
require_once('user_paginator.php');
$user_paginator=new User_Paginator();

$user_paginator->setPage(1);
$user_paginator->setPageCount(15);
$user_paginator->setOrder('created_at','desc');
$users=$user_paginator->getList();
?>

<?php if($users != false): ?>

<?php  foreach($users as $user):  ?>
  <h5><?php echo ($user['name']); ?></h5>
  <div><?php echo ($user['email']); ?></div>
  <p><?php echo ($user['message']); ?></p>
<?php endforeach; ?>

<?php echo $user_paginator->getPageLink(); ?>
<?php endif; ?> 
