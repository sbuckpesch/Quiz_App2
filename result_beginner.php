<?php 
include_once('init.php');
//include_once('header.php');

    // Create the form
    $contact = new JFormer('contactForm', array(
        'submitButtonText' => 'Send',
     'action' => 'template/result_beginner.php',
        'style' => 'width: 490px;',
    ));

    // Create the form page
    $page = new JFormPage($contact->id.'Page', array());

    // Create the form section
    $section = new JFormSection($contact->id.'Section', array());

    // Add components to the section
    $section->addJFormComponentArray(array(
    	new JFormComponentSingleLineText('vorname', 'Vorname', array(
    	'width' => 'long',    	
		)),	
		new JFormComponentSingleLineText('address', 'Adresse', array(
		'width' => 'long',    	
		)),	    				
		new JFormComponentSingleLineText('singleLineTextValidation-email', 'Email', array(
        'validationOptions' => array('email'),
		'width' => 'longest',
    	)),	
    	new JFormComponentSingleLineText('name', 'Name', array(
    	'width' => 'long',
		)),	
		new JFormComponentSingleLineText('plz', 'PLZ', array(
		'maxLength' => 5,
		'width' => 'short',
		)),	
		new JFormComponentSingleLineText('city', 'Ort', array(
    	'width' => 'long',
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
	$subject = "Hotel"; 
    // Set the e-mail and replace [formUrl] with the real form URL
    $email_msg = "Vorname: " . $formValues->vorname . "<br>";
    $email_msg = "Name: " . $formValues->name . "<br>";
    $email_msg .= "Adresse: " . $formValues->address . "<br>";    
    $email_msg .= "PLZ: " . $formValues->plz . "<br>";
    $email_msg .= "Ort: " . $formValues->city . "<br>";
    $email_msg .= "Email: " . $formValues->email . "<br>";
    // Send the message
    $email="v.klein@iconsultants.de";

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
