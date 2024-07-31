<?php
$to_email = "jestinejames4@gmail.com";
$subject = "Varshith's messsage";
$body = "Hi Varshith, Autocleanse here.. Kindly finish your session or else il end your session Warm Regards";
$headers = "From: autocleanseroll@gmail.com";

if (mail($to_email, $subject, $body, $headers)) {
    echo "Email successfully sent to $to_email...";
} else {
    echo "Email sending failed...";
}
