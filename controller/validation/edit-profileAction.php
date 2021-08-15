<?php    
    include "../model/DBquery.php";
    $doctorId = $_SESSION["doctor_id"];
    $doctor = searchDoctorId($doctorId);

    

    if($_SERVER["REQUEST_METHOD"] !== "POST")
    {
        // $_POST["fname"] = $user->fname;
        // $_POST["lname"] = $user->lname;
        // $_POST["gender"] = $user->gender;
        // $_POST["dob"] = $user->dob;
        // $_POST["religion"] = $user->religion;
        // $_POST["specialist"] = $user->specialist;
        // $_POST["presAddress"] = $user->presAddress;
        // $_POST["permAddress"] = $user->permAddress;
        // $_POST["phone"] = $user->phone;
        // $_POST["email"] = $user->email;
        // $_POST["website"] = $user->website;
        // $_POST["username"] = $user->username;

        $_POST["fname"] = $doctor[0]["doctor_firstName"];
        $_POST["lname"] = $doctor[0]["doctor_lastName"];
        $_POST["gender"] = $doctor[0]["doctor_gender"];
        $_POST["dob"] = $doctor[0]["doctor_dob"];
        $_POST["religion"] = $doctor[0]["doctor_religion"];
        $_POST["specialist"] = $doctor[0]["doctor_speciality"];
        $_POST["presAddress"] =$doctor[0]["doctor_presentAddress"];
        $_POST["permAddress"] =$doctor[0]["doctor_permanentAddress"];
        $_POST["phone"] = $doctor[0]["doctor_phone"];
        $_POST["email"] = $doctor[0]["doctor_email"];
        $_POST["website"] = $doctor[0]["doctor_website"];
        $_POST["username"] = $doctor[0]["doctor_username"];
    
    }
    


    $fnameErr = $lnameErr = $genderErr = $dobErr = $religionErr = $specialistErr = $phoneErr = $emailErr = $usernameErr = $passwordErr = "";
    $hasErr = false;
    $confirmPasswordErr = "";
    $successMsg = $failMsg = "";
    $namePattern = "/^[a-zA-Z-' ]*$/";
    $phonePattern = "/^0{1}[0-9]{10}|^(\+880){1}[0-9]{10}/";
    
    
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
        if(empty($_POST["dob"])){
            $dobErr = "Date of birth field is empty";
            $hasErr = true;
            $failMsg = "Registration Failed";
        }
        if(empty($_POST["religion"]) || ($_POST["religion"]) === "select"){
            $religionErr = "Religion field is empty";
            $hasErr = true;
            $failMsg = "Registration Failed";
        }
        if(empty($_POST["specialist"]) || ($_POST["specialist"]) === "select"){
            $specialistErr = "Specialist field is empty";
            $hasErr = true;
            $failMsg = "Registration Failed";
        }
        // if(empty($_POST["phone"])) {
        //     $phoneErr = "Phone field is empty";
        //     $hasErr = true;
        //     $failMsg = "Registration Failed";
        // }
        
        if(!(preg_match($phonePattern, $_POST["phone"])) && !empty($_POST["phone"])) {
            $phoneErr = "Invalid phone number";
            $hasErr = true;
            $failMsg = "Registration Failed";
        }
        
        // if(empty($_POST["email"])){
        //     $emailErr = "Email field is empty";
        //     $hasErr = true;
        //     $failMsg = "Registration Failed";
        // }
        if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) && !empty($_POST["email"])){
            $emailErr = "Ivalid email format";
            $hasErr = true;
            $failMsg = "Registration Failed";
        }
        if(empty($_POST["username"])){
            $usernameErr = "User name field is empty";
            $hasErr = true;
            $failMsg = "Registration Failed";
        }

        if(strlen(test_input($_POST["username"])) < 6)
        {
            $usernameErr = "User name must be minimum 6 character";
            $hasErr = true;
            $failMsg = "Registration Failed";
        }
        
        if(searchUsername($_POST["username"]) && $doctor[0]["doctor_username"] !== $_POST["username"])
        {
            $usernameErr = "User name already taken. Choose another username";
            $hasErr = true;
            $failMsg = "Registration Failed";
        }
        if($hasErr)
        {
            echo "<p class = 'edit-profile-msg' style = \"background-color:red\">Error in changing profile. READ THE WARNING.</p>";
        }
          
        if(!$hasErr){
            $fname = test_input($_POST["fname"]);
            $lname = test_input($_POST["lname"]);
            $gender = test_input($_POST["gender"]);
            $dob = test_input($_POST["dob"]);
            $religion = test_input($_POST["religion"]);
            $specialist = test_input($_POST["specialist"]);
            $presAddress = test_input($_POST["presAddress"]);
            $permAddress = test_input($_POST["permAddress"]);
            $phone = test_input($_POST["phone"]);
            $email = test_input($_POST["email"]);
            $website = test_input($_POST["website"]);
            $username = test_input($_POST["username"]);
            
            $result = editProfile($fname, $lname, $gender, $dob, $specialist, $presAddress, $permAddress, $email, $phone, $religion, $username, $website, $doctorId);
            if($result)
            {
                echo "<p class = 'edit-profile-msg' style = \"background-color:LightGreen\">Profile changed successfully</p>";
            }
            
        }
    }
    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>