<?php
include "../config.php";

// visiting this page directly will always take you to an invalid page
// this logic checks for a referral in the link from the email
// if you want to turn off email verification, you can set the 'active' field's default value to 1
// in the database schema!


if (isset($_GET['email']) && !empty($_GET['email']) and isset($_GET['hash']) && !empty($_GET['hash'])) {
    // Verify data
    $email = mysqli_real_escape_string($con, $_GET['email']); // Set email variable
    $hash = mysqli_real_escape_string($con, $_GET['hash']); // Set hash variable

    $query = "SELECT email, hash, active FROM users WHERE email='" . $email . "' AND hash='" . $hash . "' AND active=' 0 '";
    $result = mysqli_query($con, $query) or die(mysqli_error($con));
    $match = mysqli_num_rows($result);

    if ($match > 0) {
        // We have a match, activate the account
        $updatequery = "UPDATE users SET active='1' WHERE email='" . $email . "' AND hash='" . $hash . "' AND active='0'";
        $updateresult = mysqli_query($con, $updatequery) or die(mysqli_error($con));
        header('location: success.php');
    } else {
        // No match -> invalid url or account has already been activated.
        header('location: failure.php');
        
    }

} else {
    // Invalid approach
    header('location: invalid.php');
}