<?php
    include "../controller/include/header.php";
    include "../controller/include/navigation.php";
    include "../controller/validation/edit-profileAction.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel = "stylesheet" href = "css/profile.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit profile</title>

</head>
<body>
<!-- <div id = "profile-flex-container"> -->
    <form method = "POST" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        
        <div id = "profile-name">
            <h1>Profile</h1>
        </div>

        <div id = "profile-flex-container">
        <!-- <div id = "profile-element-container"> -->
            <div id = "profile-accountInfo">
                <fieldset>
                    <legend>Account Information: </legend>
                    <br>
                    <img src="../resources/profile-pic.jpeg" alt="Profile Picture">
                    <br><br>
                    <label id = "username" for = "username">Username: </label>
                    <input type = "text" id = "username" readonly name = "username" value = "<?php echo $_POST["username"] ?? '';?>">
                    <br><br><br><br>
                    <span>
                        <a href = "#"><i class="fab fa-facebook-square"></i></a>
                        <a href = "#"><i class="fab fa-google-plus-g"></i></a>
                        <a href = "#"><i class="fab fa-twitter"></i></a>
                    </span>

                </fieldset>
            </div>
            <div class = "profile-gap">

            </div>
            
            <div id = "profile-basicInfo">
                <fieldset>
                    <legend>Basic information:</legend>
                    <br>
                    <label for = "fname">First Name: </label>
                    <input type = "text" id = "fname" name = "fname" readonly value = "<?php echo $_POST["fname"] ?? '';?>">
                    <span id = "fnameErr" class = "error" style = "color:red">&nbsp; *<?php echo $fnameErr?></span>
                    <br><br>

                    <label for = "lname">Last Name: </label>
                    <input type = "text" id = "lname" name = "lname" readonly value = "<?php echo $_POST["lname"] ?? '';?>">
                    <span id = "lnameErr" class = "error" style = "color:red">&nbsp; *<?php echo $lnameErr?></span>
                    <br><br>
                    
                    <label for = "gender">Gender: </label>
                    <input type = "text" id = "gender" name = "gender" readonly value = "<?php echo $_POST["gender"] ?? '';?>">

                    <br><br>

                    <label for = "dob">Date of Birth: </label>
                    <input type = "text" id = "dob" name = "dob" readonly value = "<?php echo $_POST["dob"] ?? '';?>">
                    <br><br>

                    <label for = "religion">Religion: </label>
                    <input type = "text" id = "religion" name = "religion" readonly value = "<?php echo $_POST["religion"] ?? '';?>">
                    <br><br>

                    <label for = "specialist">Specialist In: </label>
                    <input type = "text" id = "specialist" name = "specialist" readonly value = "<?php echo $_POST["specialist"] ?? '';?>">
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
                    <textarea id="presAddress" name="presAddress" rows="5" cols="70" readonly><?php if(isset($_POST["presAddress"])) {echo $_POST["presAddress"];}?></textarea>
                    <br><br>

                    <label for="permAddress">Permanent Address:</label>
                    <br>
                    <textarea id="permAddress" name="permAddress" rows="5" cols="70" readonly><?php if(isset($_POST["permAddress"])) {echo $_POST["permAddress"];}?></textarea>
                    <br><br>

                    <label for="phone">Phone: </label>
                    <input type="tel" id="phone" readonly name="phone" value = "<?php echo $_POST["phone"] ?? '';?>">
                    <br><br>

                    <label for="email">Email: </label>
                    <input type="email" id="email" readonly name="email" value = "<?php echo $_POST["email"] ?? '';?>">
                    <br><br>
                    
                    
                    <label for="website">Personel Website Link: </label>
                    <input type="url" id="website" readonly name="website" value = "<?php echo $_POST["website"] ?? '';?>">
                    <br>

                </fieldset>
            </div>
       
            <br>

            
        </div>
    

        <br><br>
    </form>

</body>
</html>
<?php
    include "../controller/include/footer.php";
?>