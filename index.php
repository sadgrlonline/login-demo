<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Index</title>
    <link rel="stylesheet" href="css/style.css" media="all">
</head>

<body>
    <div class="container">
    <?php include "nav.php" ?>
    <h1>Registration & Login Demo</h1>
        <div>
            <p>This is a demo of a working registration and login system. It includes the following:</p>
            <ul>
                <li>Email activation code upon signup</li>
                <li>Securely stores hashed & salted password in db.</li>
                <li>Allows users to create alterate accounts with same email address (for funsies).</li>
                <li>Option included for 'forgot password', will send a reset link to email.</li>
                <li>Option included for 'forgot username', will send an email with list of usernames associated with the
                    email address.</li>
                <li>Uses PHP prepared statements for security.</li>
                <li>Uses parameterized SQL statements for security against injection.</li>
                <li>Upon login, user is redirected to dashboard.php where they can choose to log out.</li>
            </ul>
        </div>
    </div>
</body>
</html>