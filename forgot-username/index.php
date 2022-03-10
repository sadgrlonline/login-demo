<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <title>Forgot Username</title>
        <link rel="stylesheet" href="../css/style.css" media="all">
    </head>

    <body>
        <div class="container">
        <?php include "../nav.php" ?>
            <form method="post" action="forgot.php" name="reset">
                <h1>Forgot Username</h1>
                    <label><strong>Enter Your Email:</strong></label>
                    <div>
                        <input type="email" name="email" placeholder="username@email.com" />
                    </div>
                    <input type="submit" value="Remind" />
            </form>
        </div>
    </body>
</html>