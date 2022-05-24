<?php
// this sends the email
$to = $email; // Send email to our user
$subject = 'Forgot Password'; // Give the email a subject
$message = '

Please click on the following link to reset your password.

https://sadgrl.leprd.space/login-demo/login/forgot/password/reset/index.php?
key=' . $key . '&username=' . $username . '&action=reset

The link will expire after 1 day for security reasons.

If you did not request this forgotten password email, no action
is needed, your password will not be reset. However, you may want to log into
your account and change your security password as someone may have guessed it.

'; // Our message above including the link

$headers = 'From:noreply@sadgrl.leprd.space' . "\r\n"; // Set from headers
mail($to, $subject, $message, $headers); // Send our email
?>