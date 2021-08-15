<?php
    include "../controller/include/header.php";
    include "../controller/include/navigation.php";
    include "../controller/validation/change-passwordAction.php"

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel = "stylesheet" href = "css/change-password.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change password</title>
    <script src = "js/change-password.js"></script>
</head>
<body>
    <h1 id = "change-pas-logo">Change Password</h1>
    <form method = "POST" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" name = "changePasswordForm" onsubmit = "return isValid();">
        <div id = "change-pass-flex">
            <div id = "change-pass-content">
                <label for = "oldPassword">Old Password: </label>
                <input type = "password" id = "oldPassword" name = "oldPassword">
                &nbsp;
                <span id = "oldPasswordErr" class = "error">&nbsp; *<?php echo $oldPasswordErr?></span>
                <br><br>

                <label for = "newPassword">New Password: </label>
                <input type = "password" id = "newPassword" name = "newPassword">
                &nbsp;
                <span  id = "newPasswordErr" class = "error">&nbsp; *<?php echo $newPasswordErr?></span>
                <br><br>

                <label for = "confirmNewPassword">Confirm Password: </label>
                <input type = "password" id = "confirmNewPassword" name = "confirmNewPassword">
                &nbsp;
                <span  id = "confirmNewPasswordErr" class = "error">&nbsp; *<?php echo $confirmNewPasswordErr?></span>
                <br>
            </div>
            <br>
        </div>
        <div id = "change-pas-tool">
            <input type = "submit" value="Change password";>
            <br>
            <p style="color:green"><?php echo $msg; ?>
            <p style="color:red"><?php echo $msgErr; ?>
            <br><br>
        </div>
        <!-- </div> -->
    </form>
</body>
</html>
<?php
    include "../controller/include/footer.php";
?>