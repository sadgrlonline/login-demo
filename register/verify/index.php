<?php
include "../../config.php";

// visiting this page directly will always take you to an invalid page
// this logic checks for a referral in the link from the email
// if you want to turn off email verification, you can set the 'active' field's default value to 1
// in the database schema!


if (isset($_GET['email']) && !empty($_GET['email']) and isset($_GET['hash']) && !empty($_GET['hash'])) {
    // verify data
    //$email = mysqli_real_escape_string($con, $_GET['email']); // set email variable
    //$hash = mysqli_real_escape_string($con, $_GET['hash']); // set hash variable
        $email = $_GET['email'];
    $hash = $_GET['hash'];
    echo $email;
    echo $hash;
    $active = 0;

    $stmt = $con->prepare("SELECT email, hash, active FROM users WHERE email = ? AND hash = ? AND active = 0");
    $stmt->bind_param("ss", $email, $hash);
	$stmt->execute();   
    $result = $stmt->get_result();
    $stmt->store_result();
    //$query = "SELECT email, hash, active FROM users WHERE email='" . $email . "' AND hash='" . $hash . "' AND active=' 0 '";
    //$result = mysqli_query($con, $query) or die(mysqli_error($con));
    $match = mysqli_num_rows($result);
    echo "match is..." . $match;
    $stmt->close();

    if ($match > 0) {
        echo "match found";
        // we have a match, activate the account
        $stmt = $con->prepare("UPDATE users SET active = '1' WHERE email = ? AND hash = ? AND active = 0");
        $stmt->bind_param("ss", $email, $hash);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        //$updatequery = "UPDATE users SET active='1' WHERE email='" . $email . "' AND hash='" . $hash . "' AND active='0'";
        //$updateresult = mysqli_query($con, $updatequery) or die(mysqli_error($con));
        include 'success.php';
        echo "<p>Your account has been activated, you can now login.</p>";
        header('location: ../../login/');
    } else {
        // no match -> invalid url or account has already been activated.
        echo "<p>The url is either invalid or you already have activated your account.</p>";
        
    }

} else {
    // invalid approach
    echo "<p>Please use the link that has been send to your email.</p>";
}