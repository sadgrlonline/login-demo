<?php

// include
include "../config.php";

// set time zone
date_default_timezone_set("US/Eastern");
$datetime = date("Y-m-d H:i:s");


// if sign-up button is clicked...
if (isset($_POST['btnsignup'])) {
    $email = trim($_POST['email']);
    $username = trim($_POST['username']);
    $name = trim($_POST['name']);
    $password = trim($_POST['password']);
    $confirmpassword = trim($_POST['confirmpassword']);

    // this generates a random 32-character MD5 hash 
    // which is used for email verification
    $hash = md5(rand(0, 1000));
    
    // this hashes the password
    $hashedpass = password_hash($password, PASSWORD_DEFAULT); # bcrypt

    $botField = $botField = $_POST['botField'];
    $word = "elephant";

    if ($botField !== $word) {
        echo "did not pass bot field";
        return;
    }


// duplicate username check - you can duplicate this area of code to check for dupes in
// other fields as well, like email, etc.
    $stmt = $con->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
   
        // check if confirm password matching or not
        if ($password != $confirmpassword) {
            $error_message = "<div style='color:red; font-weight:strong; text-align:center;'>Your password confirmation did not match. Please go back and try again.</div>";
            echo $error_message;
        // else, if a duplicate exists...
        } else if ($result->num_rows > 0) {
        $error_message = "<div style='color:red; font-weight:strong; text-align:center;'>Username already exists. Please go back and try a different one.</div>";
        echo $error_message;
        $stmt->close();
    } else {
        // else, if no duplicate is detected, insert into table
        $insertSQL = "INSERT INTO users(datetime,email,username,name,password,hash ) values(?,?,?,?,?,?)";
        $stmt = $con->prepare($insertSQL);
        $stmt->bind_param("ssssss", $datetime, $email, $username, $name, $hashedpass, $hash);
        $stmt->execute();
    

    // email verification start
    // this handles the email verification
    // the php mail() functions works out of the box with leprd.space
    // but if you're on a vps, you probably will need to manually configure a mailserver

    include "mail-notif.php";

    $stmt->close();

    // redirects user to the success page
    echo "Success!";
    header('Location: ../login/');
    }
}