<?php
//init_facebook();

//var_dump($_POST);

//global $global;

//save data to database


$result=array();

$page_id=get_value('page_id');

if($page_id == false)
{
  $result=array(
    'error'=>1,
    'err_msg'=>'invalid page id', 
  );
  //exception!
  exit();
}


$table=new Frd_Table_Common('users','id');

$table->page_id=$page_id;

$table->form_type=get_value('form_type');
$table->name=get_value('name');
$table->email= get_value('email');
$table->message=get_value('message');

$table->sex=get_value('sex');
$table->nickname=get_value('nickname');
$table->street=get_value('street');
$table->plz=get_value('plz');
$table->ort=get_value('ort');
$table->tel=get_value('tel');
$table->mobile=get_value('mobile');
$table->homepage=get_value('homepage');
$table->information=get_value('information');

$table->created_at=date("Y-m-d H:i:s");


$table->save();


$result=array(
  'error'=>0,
);


echo json_encode($result);
exit();
/*
//post to user's wall
$link=$global->link->createLink('welcome.php',array('instid'=>$global->instid)); 
$photo_url=$global->config['share_photo'];
$description=$global->config['share_desc'];
//postto_facebook($link,$photo_url,$description,'',$table->name);
*/


/*
 * get value from _POST
 */
function get_value($key)
{
  if(isset($_POST[$key])) 
    return  $_POST[$key];
  else
    return '';
}



?>
