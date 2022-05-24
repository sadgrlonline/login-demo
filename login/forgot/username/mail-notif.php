<?php
    // trigger validation email

    $to = $email; 
    $subject = 'Forgot Username';
    $message = '

You recently submitted a request for a forgotten username.

The username(s) associated with this email address are:


' . $username . '

'; // Our message above including the link

    $headers = 'From:noreply@sadgrl.leprd.space' . "\r\n"; // Set from headers
    $headers .= 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    mail($to, $subject, $message, $headers); // Send our email
    ?>