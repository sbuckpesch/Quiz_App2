<script src="../lib/jFormer/jquery1.4.2.js" type="text/javascript"></script>
<script type="text/javascript" src="../lib/jFormer/jFormer.js" ></script>
<link rel="stylesheet" type="text/css" href="../lib/jFormer/jformer.css" ></link>

<!-- Header -->
<div style="background-image: url(../images/iventus/4.jpg); width: 497px; height: 224px;">

</div>
<!-- Result Part -->
<div style="background-image: url(../images/iventus/8.jpg); width: 497px; height: 283px;">

</div>
<!-- Form Part -->
<div style="background-image: url(../images/iventus/6.jpg); width: 497px; height: 121px;">
<a name="form";></a>
<?php 


    // Create the form
    $contact = new JFormer('contactForm', array(
        'submitButtonText' => 'Send',
     'action' => 'result_expert.php',
        'style' => 'width: 490px;',
    ));

    // Create the form page
    $page = new JFormPage($contact->id.'Page', array());

    // Create the form section
    $section = new JFormSection($contact->id.'Section', array());

    // Add components to the section
    $section->addJFormComponentArray(array(
        new JFormComponentSingleLineText('name', 'Name:', array(
            'width' => 'long',
            'validationOptions' => array('required'),
        )),
        new JFormComponentSingleLineText('firma', 'Firma:', array(
            'width' => 'long',
            'validationOptions' => array('required'),
        )),
        new JFormComponentSingleLineText('email', 'E-mail address:', array(
            'width' => 'long',
            'validationOptions' => array('required', 'email'),
        )),
        new JFormComponentSingleLineText('telefon', 'Telefon:', array(
            'width' => 'longest',
            'validationOptions' => array('required'),
        )),
        new JFormComponentTextArea('message', 'Deine Nachricht:', array(
            'width' => 'long',
            'height' => 'medium',
            'validationOptions' => array('required'),
        )),
    ));

    // Add the section to the page
    $page->addJFormSection($section);

    // Add the page to the form
    $contact->addJFormPage($page);

    ini_set('display_errors',1);

// Set the function for a successful form submission
function onSubmit($formValues) {
//$tracking = new Tracking();
//global $global;
 
 $formValues = $formValues->contactFormPage->contactFormSection;

 
 $message['successPageHtml'] = "Vielen Dank f&uuml;r ihre Anfrage. Wir werden uns umgehend mit Ihnen in Verbindung setzen.";
 
 // Set the form headers    
 $headers='';
 $headers .= "From: " . $formValues->name . " <" . $formValues->email . ">\r\n";
 $headers .= "MIME-Version: 1.0\r\n";
 $headers .= "Content-type: text/html; charset=utf-8\r\n";
 $headers .= "Content-Transfer-encoding: 8bit\r\n";
 $headers .= "X-Mailer: php" . phpversion(); 
 // Set the subject
//   $subject = $global->content['emailRegistrationSubject'];
	$subject = "Facebook Marketing"; 
    // Set the e-mail and replace [formUrl] with the real form URL
    $email_msg = "Name: " . $formValues->name . "<br>";
    $email_msg .= "Firma: " . $formValues->firma . "<br>";
    $email_msg .= "Email: " . $formValues->email . "<br>";
    $email_msg .= "Telefon: " . $formValues->telefon . "<br>";
    $email_msg .= "Nachricht: " . $formValues->message . "<br>";
    // Send the message
    $email="info@iconsultants.de";

    if (mail($email, $subject, $email_msg, $headers)) {
      $message['successPageHtml'] = "Vielen Dank f&uuml;r ihre Anfrage. Wir werden uns umgehend mit Ihnen in </br> Verbindung setzen.";
    }
    else
    {
     $message['failureHtml'] = 'Leider konnte keine Email versandt werden';
    }
    
    return $message;
}

// Process any request to the form
$contact->processRequest();
?>
</div>

<!-- Footer -->
<div style="background-image: url(../images/iventus/7.jpg); width: 497px; height: 311px;">

</div>
