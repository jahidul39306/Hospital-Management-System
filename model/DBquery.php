<?php
    require "DBconnect.php";

    function registration($fname, $lname, $gender, $specialistIn, $username, $password)
    {
        $conn = connect();
        $sql = $conn->prepare("INSERT INTO doctor_information (doctor_firstName, doctor_lastName, doctor_gender, doctor_speciality,
                                doctor_username, doctor_password) VALUES(?, ?, ?, ?, ?, ?)");
        
        $sql->bind_param("ssssss", $fname, $lname, $gender, $specialistIn, $username, $password);
        return $sql->execute();  
    }

    
    function searchUsername($username)
    {
        $conn = connect();
        $sql = $conn->prepare("SELECT * FROM doctor_information WHERE doctor_username = ?");
        $sql->bind_param("s", $username);
        $sql->execute();
        $res = $sql->get_result();
        return $res->num_rows;
    } 

    function searchDoctor($username, $password)
    {
        $conn = connect();
        $sql = $conn->prepare("SELECT * FROM doctor_information WHERE doctor_username = ? AND doctor_password = ?");
        $sql->bind_param("ss", $username, $password);
        $sql->execute();
        $res = $sql->get_result();
        return $res->fetch_all(MYSQLI_ASSOC);
    }

    function searchDoctorId($doctorId)
    {
        $conn = connect();
        $sql = $conn->prepare("SELECT * FROM doctor_information WHERE doctor_id = ?");
        $sql->bind_param("i", $doctorId);
        $sql->execute();
        $res = $sql->get_result();
        return $res->fetch_all(MYSQLI_ASSOC);
    }

    function editProfile($fname, $lname, $gender, $dob, $specialistIn, $presAdd, $permAdd, $email, $phone, $religion, $username,  $website, $doctorId)
    {
        $conn = connect();
        $sql = $conn->prepare("UPDATE doctor_information SET doctor_firstName = ?, doctor_lastName = ?, doctor_gender = ?, doctor_dob = ?, doctor_speciality = ?,
                                doctor_presentAddress = ?, doctor_permanentAddress = ?, doctor_email = ?, doctor_phone = ?, doctor_religion = ?, 
                                doctor_username = ?, doctor_website = ? WHERE doctor_id = ?");
        
        $sql->bind_param("ssssssssssssi", $fname, $lname, $gender, $dob, $specialistIn, $presAdd, $permAdd, $email, $phone, $religion, $username, $website, $doctorId);
        return $sql->execute();  
    }

    function change_password($doctorId, $newPassword)
    {
        $conn = connect();
        $sql = $conn->prepare("UPDATE doctor_information SET doctor_password = ? WHERE doctor_id = ?");
        $sql->bind_param("si", $newPassword, $doctorId);
        return $sql->execute();
    }

    function searchDoctorSpe($search)
    {
        $search = "%" . $search . "%";
        $conn = connect();
        $sql = $conn->prepare("SELECT * FROM doctor_information WHERE doctor_firstName LIKE ? OR doctor_lastName LIKE ? OR doctor_speciality LIKE ?");
        $sql->bind_param("sss", $search, $search, $search);
        $sql->execute();
        $res = $sql->get_result();
        return $res->fetch_all(MYSQLI_ASSOC);
    }

    function searchAllDoctor()
    {
        $conn = connect();
        $sql = $conn->prepare("SELECT * FROM doctor_information");
        $sql->execute();
        $res = $sql->get_result();
        return $res->fetch_all(MYSQLI_ASSOC);
    }

    function addTimeSchedule($doctorId, $activity, $startTime, $endTime)
    {
        $conn = connect();
        $sql = $conn->prepare("INSERT INTO doctor_timeSchedule (doctor_activity, doctor_timeStart, doctor_idFk, doctor_timeEnd) VALUES (?, ?, ?, ?)");
        $sql->bind_param("ssis", $activity, $startTime, $doctorId, $endTime);
        return $sql->execute();
    }

    function getTimeSchedule($doctorId)
    {
        $conn = connect();
        $sql = $conn->prepare("SELECT * FROM doctor_timeSchedule WHERE doctor_idFk = ?");
        $sql->bind_param("i", $doctorId);
        $sql->execute();
        $res = $sql->get_result();
        return $res->fetch_all(MYSQLI_ASSOC);
    }

    function deleteTimeSchedule($scheduleId)
    {
        $conn = connect();
        $sql = $conn->prepare("DELETE FROM doctor_timeSchedule WHERE doctor_timeSchedule_id = ?");
        $sql->bind_param("i", $scheduleId);
        return $sql->execute();
    }

    function getSalary($doctorId)
    {
        $conn = connect();
        $sql = $conn->prepare("SELECT * FROM doctor_salary WHERE doctor_id = ?");
        $sql->bind_param("i", $doctorId);
        $sql->execute();
        $res = $sql->get_result();
        return $res->fetch_all(MYSQLI_ASSOC);
    }

    function updateSalary($doctorId, $salary)
    {
        $conn = connect();
        $sql = $conn->prepare("UPDATE doctor_salary SET doctor_salary = ? WHERE doctor_id = ?");
        $sql->bind_param("di", $salary, $doctorId);
        return $sql->execute();
    }

    function addSalaryHistory($category, $amount, $doctorId, $accountNumber)
    {
        $date = date("Y/m/d"); 
        $conn = connect();
        $sql = $conn->prepare("INSERT INTO doctor_salaryHistory(transactionType, amount, transactionDate, doctorId, account_number) VALUES (?, ?, ?, ?, ?)");
        $sql->bind_param("sssis", $category, $amount, $date, $doctorId, $accountNumber);
        return $sql->execute();
    }

    function showSalaryHistory($doctorId)
    {
        $conn = connect();
        $sql = $conn->prepare("SELECT * FROM doctor_salaryHistory WHERE doctorId = ?");
        $sql->bind_param("i", $doctorId);
        $sql->execute();
        $res = $sql->get_result();
        return $res->fetch_all(MYSQLI_ASSOC);
    }

?>