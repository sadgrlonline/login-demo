<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Registration</title>
    <link rel="stylesheet" href="../assets/css/style.css" media="all">
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

                            <label for="botField">Confirm you're not a bot, by typing the word <strong>elephant</strong> below:</label>
                            <input type="text" name="botField" id="botField" required="required">
                        

                        <input type="submit" name="btnsignup" id="submit" value="Register"></input>
            </form>
        </div>
    </div>
    </div>
    </div>
<script>
var botField = document.getElementById('botField');
var submitBtn = document.getElementById('submit');
var word = "elephant";

submitBtn.disabled = true;
botField.addEventListener("keyup", checkIfBot);

function checkIfBot() {
  var value = botField.value;
     if (value == word) {
      submitBtn.disabled = false;
    }
}
</script>

</body>

</html>
