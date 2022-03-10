<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <title>Registration</title>
        <link rel="stylesheet" href="../css/style.css" media="all">
    </head>

    <body>
        <div class="container">
        <?php include "../nav.php" ?>
            <form method="post" action="register.php">
                <h1>Register for an Account</h1>

                <label for="email">Email Address</label>
                <input type="text" name="email" id="email" required="required">
        
                <label for="name">Name</label>
                <input type="text" name="name" id="name" required="required">
            
                <label for="username">Username</label>
                <input type="text" name="username" id="username" required="required">
        
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
            
                <label for="pwd">Confirm Password</label>
                <input type="password" name="confirmpassword" id="confirmpassword"
                    onkeyup='' required="required"><br>
            

                <input type="submit" name="btnsignup" value="Register"></input>
            </form>
        </div>
    </body>
</html>
