<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="../../../assets/css/style.css" media="all">
</head>

    <body>
    <div class="container">
<?php include "../../../nav.php" ?>
        <form method="POST" action="password.php" name="reset">
                <h1>Forgot Password</h1>
                    <div class="form-group">
                        <label><strong>Enter Your Username</strong></label>
                        <input type="username" name="username" placeholder="username" />
                    </div>

                    <input type="submit" class="btn btn-info" value="Reset"></button>
                </div>
        </form>
    </body>
</html>

