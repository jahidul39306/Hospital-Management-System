<?php
    include "../controller/include/header.php";
    include "../controller/include/navigation.php";
    include "../controller/validation/edit-profileAction.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel = "stylesheet" href = "css/edit-profile.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit profile</title>
    <script src = "js/edit-profile.js"></script>
</head>
<body>
    <form method = "POST" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" name = "editProfileForm" onsubmit="return isValid();">
        
        <script>getProfileData();</script>

        <div id = "profile-name">
            <h1>Edit profile</h1>
        </div>
        
        <div id = "profile-flex-container">

            <div id = "profile-accountInfo">
                <fieldset>
                    <legend>Account Information: </legend>
                    <br>

                    <label for = "username">Username: </label>
                    <input type = "text" id = "username" name = "username" value = "<?php echo $_POST["username"] ?? '';?>">
                    <span id = "usernameErr" class = "error" style = "color:red">&nbsp; *<?php echo $usernameErr?></span>
                    <br><br>

                </fieldset>
            </div>


            <div class = "profile-gap">
            
            </div>

            <div id = "profile-basicInfo">
                <fieldset>
                    <legend>Basic information:</legend>
                    <br>
                    <label for = "fname">First Name: </label>
                    <input type = "text" id = "fname" name = "fname" value = "<?php echo $_POST["fname"] ?? '';?>">
                    <span id = "fnameErr" class = "error" style = "color:red">&nbsp; *<?php echo $fnameErr?></span>
                    <br><br>

                    <label for = "lname">Last Name: </label>
                    <input type = "text" id = "lname" name = "lname" value = "<?php echo $_POST["lname"] ?? '';?>">
                    <span id = "lnameErr" class = "error" style = "color:red">&nbsp; *<?php echo $lnameErr?></span>
                    <br><br>
                    <span id = "edit-profile-gender">
                        <label for = "gender">Gender: </label>
                        <input type = "radio" id = "male" name = "gender" value = "male" <?php if(isset($_POST["gender"]) && $_POST["gender"] == "male") {echo "checked";}?>>
                        <label for = "male">Male</label>
                        <input type = "radio" id = "female" name = "gender" value = "female" <?php if(isset($_POST["gender"]) && $_POST["gender"] == "female") {echo "checked";}?>>
                        <label for = "female">Female</label>
                        <input type = "radio" id = "others" name = "gender" value = "others" <?php if(isset($_POST["gender"]) && $_POST["gender"] == "others") {echo "checked";}?>>
                        <label for = "others">Others</label>
                    </span>
                    <span id = "genderErr" class = "error" style = "color:red">&nbsp; *<?php echo $genderErr?></span>
                    <br><br>

                    <label for = "dob">Date of Birth: </label>
                    <input type = "date" id = "dob" name = "dob" value = "<?php echo $_POST["dob"] ?? '';?>">
                    <span id = "dobErr" class = "error" style = "color:red">&nbsp; *<?php echo $dobErr?></span>
                    <br><br>

                    <label for = "religion">Religion: </label>
                    <select name = "religion" id = "religion">
                        <option value = "select" <?php if(isset($_POST["religion"]) && $_POST["religion"] == "select") {echo "selected";}?>>--Select--</option>
                        <option value = "islam"  <?php if(isset($_POST["religion"]) && $_POST["religion"] == "islam") {echo "selected";}?>>Islam</option>
                        <option value = "hindu"  <?php if(isset($_POST["religion"]) && $_POST["religion"] == "hindu") {echo "selected";}?>>Hindu</option>
                        <option value = "christan" <?php if(isset($_POST["religion"]) && $_POST["religion"] == "christan") {echo "selected";}?>>Christan</option>
                        <option value = "other" <?php if(isset($_POST["religion"]) && $_POST["religion"] == "other") {echo "selected";}?>>Other</option>
                    </select>
                    <span id = "religionErr" class = "error" style = "color:red">&nbsp; *<?php echo $religionErr; ?></span>
                    <br><br>

                    <label for = "specialist">Specialist In: </label>
                    <select name = "specialist" id = "specialist">
                        <option value = "select" <?php if(isset($_POST["specialist"]) && $_POST["specialist"] == "select") {echo "selected";}?>>--Select--</option>
                        <option value = "allergy_and_immunology" <?php if(isset($_POST["specialist"]) && $_POST["specialist"] == "allergy_and_immunology") {echo "selected";}?>>Allergy and immunology</option>
                        <option value = "dermatology" <?php if(isset($_POST["specialist"]) && $_POST["specialist"] == "dermatology") {echo "selected";}?>>Dermatology</option>
                        <option value = "emergency_medicine" <?php if(isset($_POST["specialist"]) && $_POST["specialist"] == "emergency_medicine") {echo "selected";}?>>Emergency medicine</option>
                        <option value = "family_medicine" <?php if(isset($_POST["specialist"]) && $_POST["specialist"] == "family_medicine") {echo "selected";}?>>Family medicine</option>
                        <option value = "neurology" <?php if(isset($_POST["specialist"]) && $_POST["specialist"] == "neurology") {echo "selected";}?>>Neurology</option>
                        <option value = "pathology" <?php if(isset($_POST["specialist"]) && $_POST["specialist"] == "pathology") {echo "selected";}?>>Pathology</option>
                        <option value = "psychiatry" <?php if(isset($_POST["specialist"]) && $_POST["specialist"] == "psychiatry") {echo "selected";}?>>Psychiatry</option>
                        <option value = "urology" <?php if(isset($_POST["specialist"]) && $_POST["specialist"] == "urology") {echo "selected";}?>>Urology</option>     
                    </select>
                    <span id = "specialistErr" class = "error" style = "color:red">&nbsp; *<?php echo $specialistErr;?></span>
                    <br>
                </fieldset>
            </div>

            <div class = "profile-gap">

            </div>

            <div id = "profile-contactInfo">
                <fieldset>
                    <legend>Contact information:</legend>
                    <br>

                    <label for="presAddress">Present Address:</label>
                    <br>
                    <textarea id="presAddress" name="presAddress" rows="5" cols="70"><?php if(isset($_POST["presAddress"])) {echo $_POST["presAddress"];}?></textarea>
                    <br><br>

                    <label for="permAddress">Permanent Address:</label>
                    <br>
                    <textarea id="permAddress" name="permAddress" rows="5" cols="70"><?php if(isset($_POST["permAddress"])) {echo $_POST["permAddress"];}?></textarea>
                    <br><br>

                    <label for="phone">Phone: </label>
                    <input type="tel" id="phone" name="phone" value = "<?php echo $_POST["phone"] ?? '';?>">
                    <span id = "phoneErr" class = "error" style = "color:red">&nbsp; *<?php echo $phoneErr?></span>
                    <br><br>

                    <label for="email">Email: </label>
                    <input type="email" id="email" name="email" value = "<?php echo $_POST["email"] ?? '';?>">
                    <span id = "emailErr" class = "error" style = "color:red">&nbsp; *<?php echo $emailErr; ?></span>
                    <br><br>
                    
                    
                    <label for="website">Personel Website Link: </label>
                    <input type="url" id="website" name="website" value = "<?php echo $_POST["website"] ?? '';?>">
                    <br><br>
                </fieldset>
            </div>
        </div>        
        <div class = "button">
            <input id = "submitProfileButton" type="submit" value="Change profile">
        </div>
        
    </form>
</body>
</html>
<?php
    include "../controller/include/footer.php";
?>