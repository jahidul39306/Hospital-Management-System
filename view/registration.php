<?php
    
    include "../controller/include/header-before-login.php";
    include "../controller/validation/registrationAction.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel = "stylesheet" href = "css/registrationForm.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <script src = "js/registration.js"></script>
</head>
<body id = "main">

    
    <form method = "POST" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" name = "registrationForm" onsubmit = "return isValid(); ">

        <div id = "flex-container">
         
            <div id = "left">
            </div>

            <div id = "middle">

                <div id = "formName">
                    <p>Doctor Registration Form</p>
                </div>
                <div id = "formContent">
                    <fieldset class = "fieldset">
                    <legend>Basic information:</legend>
                    <br>
                    <label for = "fname">First Name: </label>
                    <input type = "text" id = "fname" name = "fname" value = "<?php echo $_POST["fname"] ?? '';?>">&nbsp;
                    <span id = "fnameErr" class = "error" style = "color:red">&nbsp; *<?php echo $fnameErr?></span>
                    <br><br>

                    <label for = "lname">Last Name: </label>
                    <input type = "text" id = "lname" name = "lname" value = "<?php echo $_POST["lname"] ?? '';?>">&nbsp;
                    <span id = "lnameErr" class = "error" style = "color:red">&nbsp; *<?php echo $lnameErr?></span>
                    <br><br>
                    
                    <span id = "registration-gender">
                        <label for = "gender">Gender: </label>
                        <input type = "radio" id = "male" name = "gender" value = "male" <?php if(isset($_POST["gender"]) && $_POST["gender"] == "male") echo "checked";?>>
                        <label for = "male">Male</label>
                        <input type = "radio" id = "female" name = "gender" value = "female" <?php if(isset($_POST["gender"]) && $_POST["gender"] == "female") echo "checked";?>>
                        <label for = "female">Female</label>
                        <input type = "radio" id = "others" name = "gender" value = "others" <?php if(isset($_POST["gender"]) && $_POST["gender"] == "others") echo "checked";?>>
                        <label for = "others">Others</label>
                    </span>
                    
                    <span id = "genderErr" class = "error" style = "color:red">&nbsp; *<?php echo $genderErr?></span>
                    <br><br>

                    <label for = "specialist">Specialist In: </label>
                    <select name = "specialist" id = "specialist">
                        <option value = "select" <?php if(isset($_POST["specialist"]) && $_POST["specialist"] == "select") echo "selected";?>>--Select--</option>
                        <option value = "allergy_and_immunology" <?php if(isset($_POST["specialist"]) && $_POST["specialist"] == "allergy_and_immunology") echo "selected";?>>Allergy and immunology</option>
                        <option value = "dermatology" <?php if(isset($_POST["specialist"]) && $_POST["specialist"] == "dermatology") echo "selected";?>>Dermatology</option>
                        <option value = "emergency_medicine" <?php if(isset($_POST["specialist"]) && $_POST["specialist"] == "emergency_medicine") echo "selected";?>>Emergency medicine</option>
                        <option value = "family_medicine" <?php if(isset($_POST["specialist"]) && $_POST["specialist"] == "family_medicine") echo "selected";?>>Family medicine</option>
                        <option value = "neurology" <?php if(isset($_POST["specialist"]) && $_POST["specialist"] == "neurology") echo "selected";?>>Neurology</option>
                        <option value = "pathology" <?php if(isset($_POST["specialist"]) && $_POST["specialist"] == "pathology") echo "selected";?>>Pathology</option>
                        <option value = "psychiatry" <?php if(isset($_POST["specialist"]) && $_POST["specialist"] == "psychiatry") echo "selected";?>>Psychiatry</option>
                        <option value = "urology" <?php if(isset($_POST["specialist"]) && $_POST["specialist"] == "urology") echo "selected";?>>Urology</option>     
                    </select>
                    &nbsp;
                    <span id = "specialistErr" class = "error" style = "color:red">&nbsp; *<?php echo $specialistErr;?></span>
                    <br>
                    </fieldset>

                    <br>

                    <fieldset class = "fieldset">
                    <legend>Account Information: </legend>
                    <br>

                    <label for = "username">Username: </label>
                    <input type = "text" id = "username" name = "username" value = "<?php echo $_POST["username"] ?? '';?>">
                    &nbsp;
                    <span id = usernameErr class = "error" style = "color:red">&nbsp; *<?php echo $usernameErr?></span>
                    <br><br>

                    <label for = "password">Password: </label>
                    <input type = "password" id = "password" name = "password">
                    &nbsp;
                    <span id = "passwordErr" class = "error" style = "color:red">&nbsp; *<?php echo $passwordErr?></span>
                    <br><br>

                    <label for = "confirmPassword">Confirm password: </label>
                    <input type = "password" id = "confirmPassword" name = "confirmPassword">
                    &nbsp;
                    <span id = "confirmPasswordErr" class = "error" style = "color:red">&nbsp; *<?php echo $confirmPasswordErr?></span>
                
                    </fieldset>
                    <br>
                    <div class = "button25">
                        <button id = "registration-button" type="submit" name = "submitButton">Register</button>
                    </div>
                    <div id = "check"></div>
                    <p class = "regMsg" style = "color:green"><?php echo $successMsg; ?></p>
                    <p class = "regMsg" style = "color:red"><?php echo $failMsg; ?></p>
                    <p class = "regMsg">Already a User? &nbsp;<a href = "login.php">LogIn</a>&nbsp;</p>
                </div>

            </div>

            <div id = "right">

            </div>
        </div>
    </form>

      
</body>
</html>
<?php
       include "../controller/include/footer.php"; 
?>