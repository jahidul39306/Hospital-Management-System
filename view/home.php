<?php
    include "../controller/include/header.php";
    include "../controller/include/navigation.php";
    include "../controller/validation/homeAction.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel = "stylesheet" href = "css/home.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <script src="js/home.js"></script>
</head>
<body>
    <div id = "basicInfoContainer">
        <div id = "basicInfo">
            <div id = "profile-pic">
                <img src = "../resources/home-profile.jpg" alt = "profile picture">
            </div>
            <div id = "info-content">
                <label for = "doctorname">Name: </label>
                <input type = "text" id = "doctorname" name = "doctorname" value = "<?php echo $doctorname;?>">
                <br><br>
                <label for = "doctorspec">Speciality: </label>
                <input type = "text" id = "doctorspec" name = "doctorspec" value = "<?php echo $doctorspec;?>">
                <br>
                <p>
                    MBBS in Medicine, Dhaka Medical College<br>
                    FCPS in Neurology, London<br>
                </p>
            </div>
            
        </div>
    </div>
    <br>
    <div id = "text">
        <p>Today's Time Scchedule: </p>
    </div>
    <div id = "showTimeSche">
        <script>showTimeSchedule();</script>
    </div>
    <br>
    <div id = "carrer_container">
        <div id = "content1">
            <p>Appoinments:<br>8</p>
        </div>
        <div class = gap>

        </div>
        <div id = "content2">
            <p>Hospitalized patient:<br>6</p>
        </div>
        <div class = gap>
            
            </div>
        <div id = "content3">
            <p>Surgery:<br>2</p>
        </div>
        <div class = gap>
            
        </div>
        <div id = "content4">
            <p>Critical patient:<br>0</p>
        </div>
    </div>
    <br><br><br>
</body>
</html>
<?php
    include "../controller/include/footer.php";
?>