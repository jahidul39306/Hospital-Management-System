<?php
    include "../controller/include/header-before-login.php";
    include "../controller/validation/loginAction.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel = "stylesheet" href = "css/login.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js"></script>
    <script src="js/login.js"></script>
</head>
<body>
 
    <form method = "POST" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" name = "loginForm" onsubmit = "return isValid();">
    <div id = "login-flex-container">
        <div id = "loginName">
            <h2>Login Page</h2>
            <!-- <span id = "login-logo"><i class="fas fa-hospital"></i></span> -->
        </div>
        <div id = "loginContent">
            <label for = "username">Username: </label>
            <input type = "text" id = "username" name = "username" value = "<?php echo $_POST["username"] ?? '';?>">
            &nbsp;
            <span id = "usernameErr" style = "color:red"> *<?php echo $usernameErr; ?></span>
            <br><br>
            <label for = "password">Password: </label>
            <input type = "password" id = "password" name = "password">
            &nbsp;
            <span id = "passwordErr" style = "color:red"> *<?php echo $passwordErr; ?></span>
            <br><br>
            <div id = "loginButton"><button id = "button" type="submit" name = "loginButton">Log In</button></div>
            <p style = "color:green"><?php echo $loginSuccessful; ?></p>
            <p style = "color:red"><?php echo $loginErr; ?></p>
            <p>New User? &nbsp;<a href = "registration.php">Registration</a>&nbsp;</p>
        </div>
    </div>  
    </form>
</div>


</body>
</html>
<?php
    include "../controller/include/footer.php";
?>
