<?php

$to_mail = "denras2102@gmail.com";
$subject = "Test email";
$message = "This is a test email";
$headers = "From: denras2102@gmail.com";

if (mail($to_mail, $subject, $message, $headers)) {
    echo "Email sent successfully to $to_mail";
} else {
    echo "Email sending failed...";
}

?>