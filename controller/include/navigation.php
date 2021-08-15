<!DOCTYPE html>
<html lang="en">
<head>
    <link rel = "stylesheet" href = "../view/css/navigation.css"> 
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src = "https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
    <script src = "../view/js/navigation.js"></script>
</head>
<body>
    <div id = "content">
        <span class = "slide">
            <a href = "#" onclick="openSlideMenu()">
                <i class = "fas fa-bars"></i>
            </a>
        </span>
        <div id = "menu" class = "nav">
            <a href= "#" class = "close" onclick="closeSideMenu()">
                <i class = "fas fa-times"></i>
            </a>
            <a href = "../view/home.php">Home</a>
            <a href = "../view/change-password.php">Change Password</a>
            <a href = "../view/time-schedule.php">Edit Time Schedule</a>
            <a href = "../view/prescription.php">Prescription</a> 
            <a href = "../view/search-doctor.php">Search Doctor</a>
            <a href = "../view/salary.php">Salary</a>
            <a href = "../view/hospitalizedPatient.php">Hospitalized Patient</a>
            <a href = "../view/patientReport.php">Patient Report</a>
            <a href = "../view/edit-profile.php">Edit Profile</a> 
        </div>
    </div>
    <!-- <P style = background-color:orange>
        &nbsp; <a href="../view/home.php">Home</a>&nbsp;
        &nbsp; <a href="../view/edit-profile.php">Edit Profile</a>&nbsp;
        &nbsp; <a href="../view/change-password.php">Change Password</a>&nbsp;
        &nbsp; <a href="../view/time-schedule.php">Time Schedule</a>&nbsp;
        &nbsp; <a href="../view/prescription.php">Prescription</a>&nbsp;
        &nbsp; <a href="../view/search-doctor.php">Search Doctor</a>&nbsp;
        &nbsp; <a href="../view/salary.php">Salary</a>&nbsp;
        &nbsp; <a href="../view/hospitalizedPatient.php">Hospitalized Patient</a>&nbsp;
        &nbsp; <a href="../view/patientReport.php">Patient Report</a>&nbsp;
        &nbsp; <a href="../view/logout.php">LogOut</a>&nbsp;
       
    </P> -->
</body>
</html>