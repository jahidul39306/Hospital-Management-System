<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel = "stylesheet" href = "../view/css/header.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <script src = "https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script> -->
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js"></script>
</head>

<body>
    <div id = "flex-container-header">
        <div id = "hospital-icon">
            <i class="fas fa-hospital"></i>
        </div>
        <div id = "Hospital-name">
            <h1>AZN Hospital</h1>
        </div>
        <div id = "profile">
        <a href = "../view/profile.php">
                <i class="fas fa-user-circle"></i>
            </a>
        </div>
        <div id = "logout">
            <a href = "../view/logout.php">
                <i class="fas fa-sign-out-alt"></i>
            </a>
        </div>
    </div>

</body>

</html>