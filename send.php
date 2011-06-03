<?php
require_once('init.php');

$page_id=$_GET['page_id'];

//var_dump($page_id);
$init->initFluttery(0,$page_id);

//var_dump($global);
$to_email=$global->config['email'];
var_dump($to_email);

if($to_email != false)
{

  $email=$_POST['email'];
  $from="info@iconsultants.de";
  if($email != false)
  {
    $firstname=$_POST['firstname'];
    $name=$_POST['name'];
    $city=$_POST['city'];
    $postcode=$_POST['postcode'];
    $address=$_POST['address'];


    $message=<<<HTML
     From Quiz   \n <br/>
    ---------------- \n <br/>
    Vorname: $firstname \n <br/>
    Name: $name  \n <br/>
    Adresse: $address  \n <br/>
    Ort: $city \n <br/>
    PLZ:$postcode  \n <br/>
    Email: $email \n <br/>
HTML;


    $subject = "Hotel"; 
    $headers='';
    $headers .= "From: " . $name . " <" . $from . ">\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=utf-8\r\n";
    $headers .= "Content-Transfer-encoding: 8bit\r\n";
    $headers .= "X-Mailer: php" . phpversion(); 

    $ret=mail($to_email,$subject,$message,$headers);

    var_dump($ret);
  }

}
?>
