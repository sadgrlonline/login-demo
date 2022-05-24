<?php
include "../../../config.php";

if (isset($_POST["username"]) && (!empty($_POST["username"]))) {
    $username = $_POST["username"];

    $stmt = $con->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // number of rows found
    $numRow = mysqli_num_rows($result);
    // checks if username exists in db
    if ($numRow < 1) {
        // tell the template page to do something
       echo "<div style='color:red; font-weight:bold; text-align:center;'>That username doesn't exist, please go back and try again.</div>";
    } else {
        echo "<div style='color:green; font-weight:bold; text-align:center;'>Please check your email.</div>";

        $expFormat = mktime(
            date("H"), date("i"), date("s"), date("m"), date("d") + 1, date("Y")
        );
        $expDate = date("Y-m-d H:i:s", $expFormat);
        $key = md5((2418 * 2) + ($username));
        $addKey = substr(md5(uniqid(rand(), 1)), 3, 10);
        $key = $key . $addKey;
        //echo $key . "<br>";
        //echo $expDate . "<br>";
        //echo $username . "<br>";

        while ($row = mysqli_fetch_array($result)) {
            $email = $row["email"];
        }
        
        $stmt->close();
    
        $stmt = $con->prepare("INSERT INTO password_reset_temp(username, `key`, expDate) VALUES (?,?,?)");
        $stmt->bind_param("sss", $username, $key, $expDate);
        $stmt->execute();
        $result = $stmt->get_result();
        include "mail-notif.php";
    }
}