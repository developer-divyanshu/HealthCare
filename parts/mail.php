<?php
$to_email = "divyanshu_mishramca20@jimsindia.org";
$subject = "Simple Email Test via PHP";
$body = "Hi, This is test email send by PHP";
$headers = "From: sender email";

if (mail($to_email, $subject, $body, $headers)) {
    echo "Email successfully sent to $to_email...";
} else {
    echo "Email sending failed...";
}
?>