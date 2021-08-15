<?php 
    
    include "../model/DBquery.php";
    $loginErr = $usernameErr = $passwordErr = "";
    $loginSuccessful = $username = $password = "";
    $hasErr = false;
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
            $username = test_input($username);
            $password = test_input($password);

            $doctor = searchDoctor($username, $password);

            if($doctor != null)
            {
                $_SESSION["doctor_id"] = $doctor[0]["doctor_id"];
                $doctorName = $doctor[0]["doctor_firstName"] . "&nbsp;" . $doctor[0]["doctor_lastName"];
                setcookie("doctorName", $doctorName);
                setcookie("doctor_speciality", $doctor[0]["doctor_speciality"]);
                setcookie("doctor_email", $doctor[0]["doctor_email"]);
                setcookie("doctor_phone", $doctor[0]["doctor_phone"]);
                
                if(isset($_POST['remember-me-checkbox']))
                {
                    setcookie("username", $_POST["username"], time() + (86400 * 30));
                    setcookie("password", $_POST["password"], time() + (86400 * 30));
                }
                $hasErr = false;
                $loginSuccessful = "Successfully logged in";
                header("Location: home.php");
            }
            else
            {
                $hasErr = true;
                $loginErr = "Login failed. Incorrect password or username.";
            }
            
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