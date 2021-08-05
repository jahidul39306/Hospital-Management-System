<?php
    include "header.php";
    include "navigation.php";

    $username = $oldPassword = $newPassword = "";
    $usernameErr = $oldPasswordErr = $newPasswordErr = $confirmNewPasswordErr = "";
    $hasErr = false;
    $msg = "";
    $msgErr = "";
    define("DOCTOR_INFO", "doctor-info.json");
    $infoBank = json_decode(file_get_contents(DOCTOR_INFO));

    if($_SERVER["REQUEST_METHOD"] === "POST")
    {
        if(empty($_POST["username"]))
        {
            $usernameErr = "User name field is empty";
            $hasErr = true;
        }
        
        if(empty($_POST["oldPassword"]))
        {
            $oldPasswordErr = "Old password field is empty";
            $hasErr = true;
        }

        if(empty($_POST["newPassword"]))
        {
            $newPasswordErr = "New password field is empty";
            $hasErr = true;
        }
        if(!empty($_POST["newPassword"]) && strlen(test_input($_POST["newPassword"])) < 5)
        {
            $newPasswordErr = "Password need to be minimum 5 character";
            $hasErr = true;
        }

        if($_POST["confirmNewPassword"] !== $_POST["newPassword"])
        {
            $confirmNewPasswordErr = "Password does not match";
            $hasErr = true;
        }

        if(!$hasErr)
        {
            $username = test_input($_POST["username"]);
            $oldPassword = test_input($_POST["oldPassword"]);
            $newPassword = test_input($_POST["newPassword"]);
            $result = change_password($infoBank, $username, $oldPassword, $newPassword);
            if($result)
            {
                $msg = "Password changed";
            }
            else{
                $msgErr = "Invalid user";
            }
            
        }


    }
    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    function change_password($data, $username, $oldPassword, $newPassword)
    {
        foreach($data as $obj)
        {
            if($obj -> username === $username && $obj -> password === $oldPassword)
            {
                $obj -> password = $newPassword;
                $_SESSION["password"] = $newPassword;
                $data = json_encode($data, JSON_PRETTY_PRINT);
                file_put_contents(DOCTOR_INFO, $data);
                return true;
            }
        }
        return false;
    }
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change password</title>
</head>
<body>
    <h1>Change Password</h1>
    <form method = "POST" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <fieldset>
            <legend>Change password: </legend>
            <br>

            <label for = "username">Username: </label>
            <input type = "text" id = "username" name = "username" value = "<?php echo $_POST["username"] ?? '';?>">
            <span class = "error" style = "color:red">&nbsp; *<?php echo $usernameErr?></span>
            <br><br>

            <label for = "oldPassword">Old Password: </label>
            <input type = "password" id = "oldPassword" name = "oldPassword">
            <span class = "error" style = "color:red">&nbsp; *<?php echo $oldPasswordErr?></span>
            <br><br>

            <label for = "newPassword">New Password: </label>
            <input type = "password" id = "newPassword" name = "newPassword">
            <span class = "error" style = "color:red">&nbsp; *<?php echo $newPasswordErr?></span>
            <br><br>

            <label for = "confirmNewPassword">Confirm Password: </label>
            <input type = "password" id = "confirmNewPassword" name = "confirmNewPassword">
            <span class = "error" style = "color:red">&nbsp; *<?php echo $confirmNewPasswordErr?></span>
            <br>
        </fieldset>
        <br>
        <input type = "submit" value="Change password";>
        <br><br>
        <p style="color:green"><?php echo $msg; ?>
        <p style="color:red"><?php echo $msgErr; ?>
    </form>
</body>
</html>
<?php
    include "footer.php";
?>