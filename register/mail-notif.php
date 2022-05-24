<?php
    // you'll want to change the $subject, $message, and $headers to reflect your server setup
    $to = $email; // grabs the address from the registration input
    $subject = 'Demo Login Verification'; // you can change the subject

    // you can use variables in the message, just remember to concatenate them!
    // remember to set your own URL here!
    $message = '

    Your account has been created, you can log in with the following credentials after you have activated your account by pressing the url below.

    ------------------------
    Username: ' . $username . '
    ------------------------

    Please click this link to activate your account:
    https://sadgrl.leprd.space/login-demo/register/verify/index.php?email=' . $email . '&hash=' . $hash . '

    ';

    // make sure to change the domain for the headers!
    $headers = 'From:noreply@sadgrl.leprd.space' . "\r\n";
    mail($to, $subject, $message, $headers); // this actually sends the message!
    // email verification end
    ?>