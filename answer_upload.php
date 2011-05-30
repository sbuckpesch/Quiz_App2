<?php
require('init.php');

//$app_id=$global->app_id;
$app_id=1;

$uploader=new Frd_Uploader($_FILES['image']);
$uploader->addAllowType('png');
$uploader->addAllowType('jpg');
$uploader->addAllowType('jpeg');
$uploader->addAllowType('gif');
$uploader->setFileSizeLimit(4000); //1M
$uploader->validate();

if($uploader->errorCode() !=0 )
{
  $return=array(
    'error'=>1, 
    'error_msg'=>$uploader->errorMessage(),
  );
  echo json_encode($return);
  exit();
}
else
{ 
  //handle picture name
  $dest_dir=dirname(__FILE__).'/uploads/'.$app_id;

  if(!file_exists($dest_dir))
  {
    if(mkdir($dest_dir) == false)
    {
      $message="create upload dir failed.";
      $return=array(
        'error'=>1, 
        'error_msg'=>$message,
      );

      echo json_encode($return);
      exit();
    }
  }

  $suffix=$uploader->getFileType($_FILES['image']['name']);
  if($suffix != '')
    $filename=time().md5($_FILES['image']['name']).".".$suffix;
  else
    $filename=time().md5($_FILES['image']['name']);
  //no error
  $dest=$dest_dir.'/'.$filename;
  //$uploader->_upload($dest);
  create_thumbnail($dest,$_FILES['image']['tmp_name'],100);
  $path="/uploads/".$app_id.'/'.$filename;

  $return=array(
    'error'=>0, 
    'path'=>$path,
  );

  echo json_encode($return);
  exit();
}
