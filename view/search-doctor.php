<?php
    include "../controller/include/header.php";
    include "../controller/include/navigation.php";
    include "../controller/validation/search-doctorAction.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel = "stylesheet" href = "css/search-doctor.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>search-doctor</title>
    <script src = "js/search-doctor.js"></script>

</head>
<body>
    <h1 id = "search-doctor-logo">Search Doctor</h1>

    <form method = "POST" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" name = "searchDoctorForm" onsubmit = "return false;">
        <div id = "search-doctor-flex">
            <div id = "search-doctor-content">
                <br>
                <label for = "searchDoctor">Search Doctor: </label>
                <input type = "text" id = "search" name = "search">
                &nbsp;&nbsp;<button type="button" name="searchButton" onclick = "searchDoctor();">Search</button>
                &nbsp;&nbsp;
                <button id = "showAll" type="button" name="showAll" onclick = "searchAllDoctor();">Show all doctors</button>
                <br><br>
            </div>
        </div>
        <br><br><br>
        <div id = "doctorTable">
            <script>searchAllDoctor();</script>
        </div>
    </form>
    <br><br>
</body>
</html>

<?php
        include "../controller/include/footer.php";

    
?>