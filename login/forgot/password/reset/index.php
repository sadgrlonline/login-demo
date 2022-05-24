<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <title>Reset Password</title>
        <link rel="stylesheet" href="../../../../assets/css/style.css" media="all">
    </head>

    <body>
    <div class="container">
        <?php include "../../../../nav.php" ?>
    <h1>Reset Password</h1>
    <div>
    <form method="post" action="reset.php" name="update">
        <input type="hidden" name="action" value="update" />
        <label><strong>Enter New Password:</strong></label><br />
        <input type="password" name="pass1" maxlength="15" required /><br>
        <label><strong>Re-Enter New Password:</strong></label><br />
        <input type="password" name="pass2" maxlength="15" required />
        <?php 
        $username = $_GET['username'];
        ?>
        <input type="hidden" name="username" value="<?php echo $username; ?>" /><br><br>
        <input type="submit" value="Reset" />
        </div>
    </form>
    </div>
    </body>
</html>