<?php
include('init.php');

$ic_app_id=48;
$page_id="150427118343402";
$app_key='fred';
$fluttery = new Fluttery($app_key);
$fluttery->setInstanceId($ic_app_id,0,$page_id);
$data=$fluttery->getData();

print_r($data);


echo "TSST";
