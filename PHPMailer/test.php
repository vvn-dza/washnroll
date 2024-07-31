<?php
$to = "jestinejames4@gmail.com";
$subject = "joel test";
$txt = "Hello joel this is autocleanse!";
$headers = "From: autocleanseroll@gmail.com" . "\r\n" .
"CC: somebodyelse@example.com";

mail($to,$subject,$txt,$headers);
?>
