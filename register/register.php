<?php

// include
include "../config.php";

// set time zone
date_default_timezone_set("US/Eastern");
$datetime = date("Y-m-d H:i:s");


// Register user
if (isset($_POST['btnsignup'])) {
    $email = trim($_POST['email']);
    $username = trim($_POST['username']);
    $name = trim($_POST['name']);
    $password = trim($_POST['password']);
    $confirmpassword = trim($_POST['confirmpassword']);
    $hash = md5(rand(0, 1000)); // this generates a random 32 character hash and assign it to a local variable.
    // example hash output: f4552671f8909587cf485ea990207f3b
    $hashedpass = password_hash($password, PASSWORD_DEFAULT);

// duplicate username check - you can duplicate this area of code to check for dupes in
// other fields as well, like email, etc.
    $stmt = $con->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
   
        // Check if confirm password matching or not
        if ($password != $confirmpassword) {
            $error_message = "<div style='color:red; font-weight:strong; text-align:center;'>Your password confirmation did not match. Please go back and try again.</div>";
            echo $error_message;
        // else, if a duplicate exists...
        } else if ($result->num_rows > 0) {
        $error_message = "<div style='color:red; font-weight:strong; text-align:center;'>Username already exists. Please go back and try a different one.</div>";
        echo $error_message;
        $stmt->close();
    } else {
        // else, if no duplicate is detected...
        $insertSQL = "INSERT INTO users(datetime,email,username,name,password,hash ) values(?,?,?,?,?,?)";
        $stmt = $con->prepare($insertSQL);
        $stmt->bind_param("ssssss", $datetime, $email, $username, $name, $hashedpass, $hash);
        $stmt->execute();
    

    // email verification start
    // this handles the email verification
    // the php mail() functions works out of the box with leprd.space
    // but if you're on a vps, you probably will need to manually configure a mailserver

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
    https://sadgrl.leprd.space/login-demo/verify/?email=' . $email . '&hash=' . $hash . '

    ';

    // make sure to change the domain for the headers!
    $headers = 'From:noreply@sadgrl.leprd.space' . "\r\n";
    mail($to, $subject, $message, $headers); // this actually sends the message!
    // email verification end

    $stmt->close();

    // redirects user to the success page
    header('Location: ../success/');
    }
}