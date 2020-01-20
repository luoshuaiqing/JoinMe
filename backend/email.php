<?php

$code = $_POST["code"];

$to = $_POST["email"];
$subject = "Verification Code from JoinMe";
$txt = "The following is your verification code: " . $code;
$header = "From: shuaiqin@usc.edu";

$retval = mail($to, $subject, $txt, $header);

if ($retval == true) {
    echo "success";
} else {
    echo "Message could not be sent...";
}






