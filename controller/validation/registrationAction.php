<?php
    include "../model/DBquery.php";
    $fname = $lname = $gender = $specialist = $username = $password = "";
    $fnameErr = $lnameErr = $genderErr = $specialistErr = $usernameErr = $passwordErr = $confirmPasswordErr = "";
    $hasErr = false;
    $successMsg = $failMsg = "";
    $namePattern = "/^[a-zA-Z-' ]*$/";
    
    if($_SERVER["REQUEST_METHOD"] === "POST"){

        if(empty($_POST["fname"])){
           $fnameErr = "First name field is empty";
           $hasErr = true;
           $failMsg = "Registration Failed";
        }
        if(!preg_match($namePattern, $_POST["fname"]))
        {
            $fnameErr = "Only letters and white spaces";
            $hasErr = true;
            $failMsg = "Registration Failed";
        }
                   
        if(empty($_POST["lname"])){
            $lnameErr = "Last name field is empty";
            $hasErr = true;
            $failMsg = "Registration Failed";
        }
        if(!preg_match($namePattern, $_POST["lname"]))
        {
            $lnameErr = "Only letters and white spaces";
            $hasErr = true;
            $failMsg = "Registration Failed";
        }
        if(empty($_POST["gender"])){
            $genderErr = "Gender field is empty";
            $hasErr = true;
            $failMsg = "Registration Failed";
        }

        if(empty($_POST["specialist"]) || ($_POST["specialist"]) === "select"){
            $specialistErr = "Specialist field is empty";
            $hasErr = true;
            $failMsg = "Registration Failed";
        }

        if(empty($_POST["username"])){
            $usernameErr = "User name field is empty";
            $hasErr = true;
            $failMsg = "Registration Failed";
        }

        if(strlen(test_input($_POST["username"])) < 6 && !$hasErr)
        {
            $usernameErr = "User name must be minimum 6 character";
            $hasErr = true;
            $failMsg = "Registration Failed";
        }

        if(searchUsername($_POST["username"]))
        {
            $usernameErr = "User name already taken. Choose another username";
            $hasErr = true;
            $failMsg = "Registration Failed";
        }
        if(empty($_POST["password"])){
            $passwordErr = "Password field is empty";
            $hasErr = true;
            $failMsg = "Registration Failed";
        }

        if(!empty($_POST["password"]) && strlen(test_input($_POST["password"])) < 5)
        {
            $passwordErr = "Password need to be minimum 5 character";
            $hasErr = true;
            $failMsg = "Registration Failed";
        }

        if($_POST["confirmPassword"] !== $_POST["password"]){
            $confirmPasswordErr = "Password does not match";
            $hasErr = true;
            $failMsg = "Registration Failed";
        }
        if(!$hasErr){
            $fname = test_input($_POST["fname"]);
            $lname = test_input($_POST["lname"]);
            $gender = test_input($_POST["gender"]);
            $specialist = test_input($_POST["specialist"]);
            $username = test_input($_POST["username"]);
            $password = test_input($_POST["password"]); 
            
            $result = registration($fname, $lname, $gender, $specialist, $username, $password);
            if($result)
            {
                $successMsg = "Registration Successful";
                echo "<p class = 'actionMsg' style = \"background-color:LightGreen\"> Information stored successfully. Redirecting to login page within 5 seconds...</p>";
                echo "<meta http-equiv='refresh' content='5; url=\"login.php\"' />";
            }    
        }
        if($hasErr)
        {
            echo "<p class = 'actionMsg' style = \"background-color:red\">Registration failed. READ THE WARNINGS.</p>";
        }
    }
    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>
