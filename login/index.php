<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="../assets/css/style.css" media="all">
</head>
<body>
    <div class="container">
    <?php include "../nav.php" ?>
        <form method="post" action="login.php">
            <h1>Login</h1>
                <div><input type="text" class="textbox" id="username" name="username" placeholder="Username" /></div>
                <div><input type="password" class="textbox" id="password" name="password" placeholder="Password" /></div>
                        <p><a href="forgot/password/index.php">Forgot password?</a><br>
                            <br><a href="forgot/username/">Forgot username?</a>
                        

                        <div>
                            <input type="submit" value="Submit" name="but_submit" id="but_submit" />
                        </div>
                    </div>
            </form>
        </div>
</div>
</body>

</html>