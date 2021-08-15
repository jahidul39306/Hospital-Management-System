<?php
    include "../controller/include/header.php";
    include "../controller/include/navigation.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel = "stylesheet" href = "css/hospitalizedPatient.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospitalized patient</title>
    <script src="js/hospitalizedPatient.js"></script>

</head>
<body>
    <p>Hospitalized Patient</p>
    <br>
    <div id = "hospitalPatientTable">
        <script>showHospitalizedPatient();</script>
    </div>
    <br><br><br><br><br><br>

</body>
</html>
<?php
    include "../controller/include/footer.php";
?>