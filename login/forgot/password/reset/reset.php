<?php
include "../../../../config.php";

if (isset($_GET["key"]) && isset($_GET["username"]) && isset($_GET["action"])
    && ($_GET["action"] == "reset") && !isset($_POST["action"])) {
    $key = $_GET["key"];
    $username = $_GET["username"];
    $curDate = date("Y-m-d H:i:s");
    
    $stmt = $con->prepare("SELECT * FROM password_reset_temp WHERE `key`= ? AND username = ?");
    $stmt->bind_param("ss", $key, $username);
	$stmt->execute();
    $result = $stmt->get_result();
    //$query = mysqli_query($con,
    //    "SELECT * FROM `password_reset_temp` WHERE `key`='" . $key . "' and `username`='" . $username . "';"
    
    $row = mysqli_num_rows($result);
    if ($row == "") {
     echo " <p>The link is invalid/expired. Either you did not copy the correct link from the email, or you have already used it.</p>";
    } else {
        while ($row = $result->fetch_assoc()) {
            $expDate = $row['expDate'];
            if ($expDate >= $curDate) {
                include "template.php";
            } else {
                echo "</p>The link is expired. You are trying to use the expired link which is only valid for 24 hours after the request.</p>";
            }
        }
        }
    if ($error != "") {
        echo "<div class='error'>" . $error . "</div><br />";
    }
} // isset email key validate end

if (isset($_POST["username"]) && isset($_POST["action"]) &&
    ($_POST["action"] == "update")) {
    $error = "";
    $pass1 = mysqli_real_escape_string($con, $_POST["pass1"]);
    $pass2 = mysqli_real_escape_string($con, $_POST["pass2"]);
    $username = $_POST["username"];
    $curDate = date("Y-m-d H:i:s");
    if ($pass1 != $pass2) {
         echo "<div style='color:red; font-weight:bold; text-align:center;'>Error: Passwords must match.</div>";
    } else {
        $hashed_pass = password_hash($pass1, PASSWORD_DEFAULT);
        
        //mysqli_query($con, "UPDATE `users` SET `password`='" . $hashed_pass . "' WHERE `username`='" . $username . "';");
        
        $stmt = $con->prepare("UPDATE users SET password = ? WHERE username = ?");
      	$stmt->bind_param("ss", $hashed_pass, $username);
      	$stmt->execute();
      	$result = $stmt->get_result();
      	$stmt->close();
      	
      	$stmt = $con->prepare("DELETE FROM password_reset_temp WHERE username = ?");
    	$stmt->bind_param("s", $username);
    	$stmt->execute();
    	$stmt->close();

        //mysqli_query($con, "DELETE FROM `password_reset_temp` WHERE `username`='" . $username . "';");

        echo "<div style='color:green; font-weight:bold; text-align:center;'>Success! Please wait while you are being redirected.</div>";
        include "template.php";
        echo "<meta http-equiv='refresh' content='2; URL=/login-demo/login/' />";
    }
}
?>