<?php 
    include "../model/DBquery.php";
    $username = $oldPassword = $newPassword = "";
    $usernameErr = $oldPasswordErr = $newPasswordErr = $confirmNewPasswordErr = "";
    $hasErr = false;
    $msg = "";
    $msgErr = "";
    $doctorId = $_SESSION["doctor_id"];
    $doctor = searchDoctorId($doctorId);
  

    if($_SERVER["REQUEST_METHOD"] === "POST")
    {
        
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
            $oldPassword = test_input($_POST["oldPassword"]);
            $newPassword = test_input($_POST["newPassword"]);
            if($oldPassword === $doctor[0]["doctor_password"])
            {
                $result = change_password($doctorId, $newPassword);
                if($result)
                {
                    $msg = "Password changed";
                }
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

?>