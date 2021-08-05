<?php
    include "header.php";

    $loginErr = $usernameErr = $passwordErr = "";
    $loginSuccessful = $username = $password = "";
    $hasErr = false;
    define("DOCTOR_INFO", "doctor-info.json");
    if($_SERVER["REQUEST_METHOD"] === "POST")
    {
        if(empty($_POST["username"]))
        {
            $usernameErr = "Username field is empty";
            $loginErr = "Login failed";
            $hasErr = true;
        }
        
        if(empty($_POST["password"]))
        {
            $passwordErr = "Password field is empty";
            $loginErr = "Login failed";
            $hasErr = true;
        }
        if(!$hasErr)
        {
            $username = $_POST["username"];
            $password = $_POST["password"];
            $file = file_get_contents(DOCTOR_INFO);
            $file = json_decode($file);
            
            foreach($file as $obj)
            {
                if($obj -> username === $username && $obj -> password === $password)
                {
                    $_SESSION["username"] = $username;
                    $_SESSION["password"] = $password;
                    $hasErr = false;
                    $loginSuccessful = "Successfully logged in";
                    header("Location: home.php");
                    break;
                }
                else
                {
                    $hasErr = true;
                }
            }
        }
        if($hasErr)
        {
            $loginErr = "Login failed";
        }
    }
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

    <form method = "post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>">

        <fieldset>
            <legend>Login Page</legend>

            <label for = "username">Username: </label>
            <input type = "text" id = "username" name = "username" value = "<?php echo $_POST["username"] ?? '';?>">
            <span style = "color:red">&nbsp; *<?php echo $usernameErr; ?></span>
            <br><br>
            <label for = "password">Password: </label>
            <input type = "password" id = "password" name = "password">
            <span style = "color:red">&nbsp; *<?php echo $passwordErr; ?></span>
            <br><br>
            <input type = "submit" value = "Login">
        </fieldset>
        <p style = "color:green"><?php echo $loginSuccessful; ?></p>
        <p style = "color:red"><?php echo $loginErr; ?></p>
        <p>New User? &nbsp;<a href = "registration.php">Registration</a>&nbsp;</p>
    </form>

</body>
</html>
<?php
    include "footer.php";
?>
