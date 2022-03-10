<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link rel="stylesheet" href="../css/style.css" media="all">
    </head>

    <body>
        <div class="container">
        <?php include "../nav.php" ?>
            <form method="post" action="login.php">
                <h1>Login</h1>
                <div>
                    <input type="text" class="textbox" id="username" name="username" placeholder="Username" />
                </div>
                <div>
                    <input type="password" class="textbox" id="password" name="password" placeholder="Password" />
                </div>
                <p><a href="../forgot-password/">Forgot password?</a></p>
                <p><a href="../forgot-username/">Forgot username?</a></p>
                <div>
                    <input type="submit" value="Submit" name="but_submit" id="but_submit" />
                </div>
            </form>
        </div>
    </body>
</html>