<?php
include "../../../config.php";

if (isset($_POST["email"]) && (!empty($_POST["email"]))) {
    $email = $_POST["email"];
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);

    $stmt = $con->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $rowCount = mysqli_num_rows($result);

        // this checks to ensure there's an account with this email address in the db
        // and displays an error if there isn't.
        if ($rowCount < 1) {
            $error .= "<div style='color:red; font-weight:bold; text-align:center;'>No user is registered with this email address: " . $email . " </div>";
            echo $error;
        } else {
            while ($row = mysqli_fetch_array($result)) {
            $username = $row['username'];
            }
            include "mail-notif.php";

        echo "<div style='color:green; font-weight:bold; text-align:center;'>An email message has been sent to you with your username.</div>";
    
    }
}
