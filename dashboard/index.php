<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: ../login/");
    exit();
} ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../css/style.css" media="all">
</head>

<body>
    <div class="container">
    <?php include "../nav.php" ?>
        <div id="div_login">
            <h1>You're signed in!</h1>
            <div>
                <p>You have successfully signed in.</p>
                <p>This page is only available to those who have signed in.</p>
                <p>Try testing it out by copying and pasting the URL of this page in an anonymous browser.</p>
                <p>To log out, click on the 'log out' button at the top right.</p>
            </div>
        </div>