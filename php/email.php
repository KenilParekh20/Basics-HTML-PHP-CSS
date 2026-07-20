<?php
$to = 'maryjane@email.com';
$subject = 'IWT - Email Example';
$message = 'Hi KP, this is an example of sending email using PHP.'; 
$from = 'peterparker@email.com';
 
// Sending email
if(mail($to, $subject, $message)){
    echo 'Your mail has been sent successfully.';
} else{
    echo 'Unable to send email. Please try again.';
}
?>