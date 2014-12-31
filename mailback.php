jjburton.com
============

<?php

// This is the jjburton.com official email address which redirects to jamiejburton@hotmail.co.uk.
$myemail = 'admin@jjburton.com';

// This variable hold the message that the customer will recieve about jjburton.com when they send an email to us.
// The email is a reply to the contact form that the user send through our contact form on our contact page.
// If the message needs to be changed simply change the content within the content of the variable below.
$messageToCustomer = '<html>
    	Thank you for doing business with us.
	At JJBurton we aim to provide a range of services that will enable your business to
	thrive in this economic climate from website design, website development, mobile web
	development, and even graphics design for your printing needs. We are based in both 
	London and Coventry.';

if (empty($_POST) === false) {
    $errors = array();
    
    $name    = $_POST['name'];
    $email   = $_POST['email'];
    $message = $_POST['message'];
    
    if (empty($name) === true || empty($email) === true || empty($message) === true) {
        $errors[] = 'Name, email and message are required!';
    } else {
        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            $errors[] = 'That\'s not a valid email address';
        }
        
    }
    if (empty($errors) === true) {
        
        $subject = 'Thank you for doing business with us ' . $name . '.';
        mail('admin@jjburton.com', 'Message from client', $message, 'From: ' . $email);
        mail($email, $subject, $messageToCustomer, 'From: ' . $myemail);
        header('Location: sent.php');
        
        exit();
    }
    
}

?>
