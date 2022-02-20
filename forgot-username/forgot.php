<?php
include "../config.php";

if (isset($_POST["email"]) && (!empty($_POST["email"]))) {
    $email = $_POST["email"];
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
        $sel_query = "SELECT * FROM users WHERE email='" . $email . "'";
        $result = mysqli_query($con, $sel_query);
        $rowCount = mysqli_num_rows($result);

        // this checks to ensure there's an account with this email address in the db
        // and displays an error if there isn't.
        if ($rowCount < 1) {
            $error .= "<div style='color:red; font-weight:bold; text-align:center;'>No user is registered with this email address: " . $email . " </div>";
        } else {
       
    // trigger validation email

        $to = $email; 
        $subject = 'Forgot Username';
        $message = '

    You recently submitted a request for a forgotten username.

    The usernames associated with this email address are:


    ' . $usernames . '

    '; // Our message above including the link

        $headers = 'From:noreply@sadgrl.leprd.space' . "\r\n"; // Set from headers
        $headers .= 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        mail($to, $subject, $message, $headers); // Send our email

        echo "<div style='color:green; font-weight:bold; text-align:center;'>An email message has been sent to you with your username.</div>";
        include "template.php";
    
    }
}
