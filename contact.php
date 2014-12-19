<?php
if($_POST) {
    $to_Email = "alan@alanbeam.net"; //Replace with recipient email address
    
    if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
        $output = json_encode(array('type'=>'error', 'text' => 'Request must come from Ajax'));
        die($output);
    } 
    
    if(!isset($_POST["userName"]) || !isset($_POST["userEmail"]) || !isset($_POST["userSubject"]) || !isset($_POST["userMessage"]))
    {
        $output = json_encode(array('type'=>'error', 'text' => 'Input fields are empty!'));
        die($output);
    }

    $user_Name        = filter_var($_POST["userName"], FILTER_SANITIZE_STRING);
    $user_Email       = filter_var($_POST["userEmail"], FILTER_SANITIZE_EMAIL);
    $user_Subject     = filter_var($_POST["userSubject"], FILTER_SANITIZE_STRING);
    $user_Message     = filter_var($_POST["userMessage"], FILTER_SANITIZE_STRING);
    
    $error = "";
    if(strlen($user_Name)<3) // If length is less than 3 it will throw an HTTP error.
    {
        $error .= 'Name is too short.<br />';
    }
    if(!filter_var($user_Email, FILTER_VALIDATE_EMAIL)) //email validation
    {
        $error .= 'Please enter a valid email.<br />';
    }
    if(strlen($user_Subject)<3) // If length is less than 3 it will throw an HTTP error.
    {
        $error .= 'Subject is too short.<br />';
    }
    if(strlen($user_Message)<3) //check emtpy message
    {
    	$error .= 'Message is too short.<br />';
    }
    
    if(!empty($error)) {
    	$output = json_encode(array('type'=>'error', 'text' => $error));
        die($output);
    }
    
    /*
    Incase your host only allows emails from local domain, 
    you should un-comment the first line below, and remove the second header line. 
    Of-course you need to enter your own email address here, which exists in your cp.
    */
    //$headers = 'From: alan@alanbeam.net' . "\r\n" .
    $headers = 'From: '.$user_Email.'' . "\r\n" . //remove this line if line above this is un-commented
    'Reply-To: '.$user_Email.'' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
    
    $sentMail = @mail($to_Email, "AlanBeam.net: ".$user_Subject, $user_Message .'  -'.$user_Name, $headers);
    
    if(!$sentMail) {
        $output = json_encode(array('type'=>'error', 'text' => 'Could not send mail! Please check your PHP mail configuration.'));
        die($output);
    } else {
        $output = json_encode(array('type'=>'message', 'text' => 'Email successfully sent!'));
        die($output);
    }
}