<?php
  $email=$_POST['email'];
  if($email != false)
  {
    $firstname=$_POST['firstname'];
    $name=$_POST['name'];
    $city=$_POST['city'];
    $postcode=$_POST['postcode'];
    $address=$_POST['address'];


    $message=<<<HTML
     From Quiz
    ----------------
    Vorname: $firstname
    Name: $name
    Adresse: $address
    Ort: $city
    PLZ:$postcode
    Email: $email
HTML;

    $to="iamlosing02@gmail.com";

    $subject = "Hotel"; 
    $headers='';
    $headers .= "From: " . $name . " <" . $email . ">\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=utf-8\r\n";
    $headers .= "Content-Transfer-encoding: 8bit\r\n";
    $headers .= "X-Mailer: php" . phpversion(); 

    $ret=mail($to,$subject,$message,$headers);

    var_dump($ret);
  }

?>
